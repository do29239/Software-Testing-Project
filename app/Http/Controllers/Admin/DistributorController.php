<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DistributorController extends Controller
{
    public function index()
    {
        // Retrieve all users with role 3 (distributors)
        $distributors = User::where('role', 3)->get();
        return view('admin.distributors.distributors', compact('distributors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
        ]);

        User::create($validatedData + [
                'password' => Hash::make('defaultpassword'),
                'role' => 3 // Set the role as 3 by default
            ]);

        return redirect()->back()->with('success', 'Distributor created successfully.');
    }

    public function show(User $distributor)
    {
        return view('admin.distributors.show-distributor', compact('distributor'));
    }

    public function edit(User $distributor)
    {
        return view('admin.distributors.edit-distributor', compact('distributor'));
    }

    public function update(Request $request, User $distributor)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $distributor->id],
            'address' => ['required', 'string'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
        ]);

        $distributor->update($validatedData);

        return redirect()->back()->with('success', 'Distributor updated successfully.');
    }

    public function destroy(User $distributor)
    {
        $distributor->delete();

        return redirect()->back()->with('success', 'Distributor deleted successfully.');
    }
}
