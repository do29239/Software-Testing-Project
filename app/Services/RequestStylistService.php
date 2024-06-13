<?php

namespace App\Services;

use App\Models\RequestStylist;
use App\Models\StylistInvitationCode;
use App\Models\StylistProfile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestDenied;
use Illuminate\Support\Str;

class RequestStylistService
{
    public function getAllRequests()
    {
        return RequestStylist::with('user')->get();
    }

    public function createRequest($user, $data)
    {
        $request = $user->request()->create($data);
        $user->update(['request_submitted' => true]);
        return $request;
    }

    public function approveRequest(RequestStylist $request)
    {
        $user = $request->user;
        $cartService = new CartService();

        if ($user && $user->role === 0) {
            DB::beginTransaction();
            try {


                $this->createStylist($request,$user->id);

                $request->delete();
                $this->changeRole($request->user(),2);
                $cartService->deleteCart($user);
                DB::commit();
                return true;
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }

        throw new \Exception("Invalid user status or role.");
    }

    public function createStylist($stylistData,$userId)
    {
        StylistProfile::create([
            'user_id' => $userId,
            'saloon_name' => $stylistData['saloon_name'],
            'saloon_city' => $stylistData['saloon_city'],
            'saloon_address' => $stylistData['saloon_address'],
            'saloon_phone' => $stylistData['saloon_phone'],
        ]);
        Log::info('Stylist profile created', ['user_id' => $userId]);
    }

    public function denyRequest(RequestStylist $request)
    {
        $user = $request->user;

        if ($user && $user->role === 0) {
            $request->delete();
            Mail::to($user->email)->send(new RequestDenied($user));
            return true;
        }

        throw new \Exception("Invalid user status or role.");
    }


    public function generateStylistCode($distributorId)
    {
        $code = Str::random(10);
        StylistInvitationCode::create([
            'code' => $code,
            'expires_at' => now()->addHours(24),
            'used' => false,
            'created_by' => $distributorId
        ]);
        return $code;
    }

    public function redeemStylistCode($codeInput, $stylistData)
    {
        $code = StylistInvitationCode::where('code', $codeInput)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$code) {
            throw new \Exception("Invalid or expired code.");
        }


        $user=auth()->user();
        if (!$user) {
            throw new \Exception("No authenticated user found.");
        }
        DB::beginTransaction();
        try {
            $code->used = true;
            $code->used_by = $user->id;  // Save the new stylist's user ID
            $code->save();

            $this->createStylist($stylistData,$user->id);

            $this->changeRole($user, 2);  // Upgrade user to stylist
            $user->update(['request_submitted' => 1]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return true;
    }



    public function changeRole($user, $newRole)
    {
        $user->update(['role' => $newRole]);
    }
}

