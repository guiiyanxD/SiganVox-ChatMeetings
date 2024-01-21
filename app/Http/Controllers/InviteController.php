<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use Illuminate\Http\Request;
use Junges\InviteCodes\Facades\InviteCodes;

class InviteController extends Controller
{
    public function store( $max = null, $fecha = null )
    {

        //no tiene limites
        if ($max == null && $fecha == null )
        {
            $code = InviteCodes::create()->save();

            //tiene limite y no tiene expiracion
        }
        else if($max != null && $fecha == null)
        {
            $code = \Junges\InviteCodes\Facades\InviteCodes::create()
                ->maxUsages($max)
                ->save();

            //ilimitado y tiene expiracion
        }
        else if($max == null && $fecha != null)
        {
            $code = \Junges\InviteCodes\Facades\InviteCodes::create()
                ->expiresAt($fecha)
                ->save();

        }
        else
        {
            $code = \Junges\InviteCodes\Facades\InviteCodes::create()
                ->maxUsages($max)
                ->expiresAt($fecha)
                ->save();
        }

        return $code;
    }

    public function getInvitation($inviteCode){
        return Invite::where('code', $inviteCode)->first();
    }


    public function canJoin($invite)
    {
        $dateVerified = ($invite->expires_at != null)
            ? $this->verifyingDate($invite->expires_at) : true;
        $usagesVerified = ($invite->max_usages != null)
            ? $this->verifyingUsages($invite) : true;

        return (($dateVerified || $usagesVerified) && $usagesVerified);
    }
    private function verifyingUsages($invite) : bool
    {
        if($invite->uses +1 <= $invite->max_usages)
        {
            $invite->uses = $invite->uses + 1;
            $invite->save();
            return true;
        }
        return false;
    }

    private function verifyingDate($fechaExpiracion) : bool
    {
        return now() <= $fechaExpiracion;
    }

}
