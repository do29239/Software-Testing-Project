<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StylistInvitationCode;
use App\Services\InvitationCodeService;
use App\Services\RequestStylistService;
use Illuminate\Http\Request;

class InvitationCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $codeService;
    public function __construct(InvitationCodeService $codeService)
    {
        $this->codeService = $codeService;
    }

    public function index()
    {
        return view('admin.InvitationCodes.codes', ['codes'=>$this->codeService->getCodes()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $generatecode=new RequestStylistService();
        $generatecode->generateStylistCode(auth()->id());
        return redirect()->back()->with('message','Code created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(StylistInvitationCode $code)
    {
        return view('admin..InvitationCodes.show-code', compact('code'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StylistInvitationCode $code)
    {
        $this->codeService->delete($code);
        return redirect()->back()->with('message', 'Code deleted successfully');
    }
}
