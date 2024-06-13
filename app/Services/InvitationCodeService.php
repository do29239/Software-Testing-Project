<?php

namespace App\Services;

use App\Models\StylistInvitationCode;

class InvitationCodeService
{
    public function getCodes()
    {
        return StylistInvitationCode::with(['creator', 'user'])->get();
    }

    public function delete(StylistInvitationCode $code)
    {
        $code->delete();
    }


}
