<?php

namespace App\Http\Controllers;

use App\Events\UserMeetAccess;
use App\Models\Meet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userMeetController = new UserMeetController();
        $meets = $userMeetController->getMeetsByUser();
        return view('chats.index', ['meets'=>$meets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Crea una nueva sala que genera un codigo de invitacion con las restricciones que el usuario configura.
     */
    public function storeAsHost(Request $request)
    {
        $fecha = Carbon::parse($request->meet_expiration)->toDateString();
//        return dd($fecha);

        if($fecha > now()){
            $inviteController = new InviteController();
            $code = $inviteController->store($request->meet_qty, $fecha);


            $meet = Meet::create([
                'invite_id' => $code->id,
                'name' => $request->meet_name,
                'description' => $request->meet_description,
            ]);
            $room  = $code->code;
            event(new UserMeetAccess($meet, Auth::user(), 1));
//            broadcast(new PeopleSeeingMeeting($meet));
            return redirect()->route('salasChats.chat', ['username' => urlencode(Auth::user()->name), 'room' => $room,'mute' => urlencode(Auth::user()->is_mute)]);
        }else{
            return redirect()->route('salasChats.index')->with('error_message', "Asegurese de completar todos los campos requeridos");

        }
    }

    public function storeAsGuest(Request $request){

        try {
            $inviteController = new InviteController();

            $invite = $inviteController->getInvitation($request->meet_code);
            $meet = $this->searchMeetByInvitationCode($invite->id);

            $room = $request->meet_code;


            $exist = $invite != null;
            $canJoin = $inviteController->canJoin($invite);

            if($canJoin && $exist)
            {

               $this->isNewMemberOnMeet($meet);
               return redirect()->route('salasChats.chat', ['username' => urlencode(Auth::user()->name), 'room' => $room, 'mute' => urlencode(Auth::user()->is_mute) ]);

/*                return redirect()->route('salasChats.chat')->with(['username' => Auth::user()->name, 'room' => $room]);
 */
            }
        }catch (\Exception $e){
            return redirect()->route('salasChats.index')
                ->with('error_message',"Verifica que el codigo este correcto.");
        }

    }

    private function isNewMemberOnMeet( $meet ){
        $participationController = new ParticipationTypeController();
        $isHost = $participationController->isHost($meet);
        $isGuest = $participationController->isGuest($meet);

        /**
         * Si el usuario no es ni Host, ni Invitado, quiere decir que se esta uniendo a la sala por primera vez como
         * invitado, entonces se registra el ingreso del usuario
         * pero, si el usuario es Host o Invitado, se registra que este usuario esta entrando al meet una vez mas.
         */
        if(!$isHost && !$isGuest ){
            event(new UserMeetAccess($meet, Auth::user(),2));
        }else{
            $participationController->addUserEntries($meet);
        }
//                broadcast(new PeopleSeeingMeeting($meet));
    }

    private function searchMeetByInvitationCode($inviteId)
    {
        return Meet::where('invite_id', $inviteId)->first();
    }
    public function showChat(Request $request){
        $username = $request->query('username');
        $room = $request->query('room');

        // Resto del código de tu controlador

        return view('chats.chat', compact('username', 'room'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Meet $sala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meet $sala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meet $sala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meet $sala)
    {
        //
    }
}
