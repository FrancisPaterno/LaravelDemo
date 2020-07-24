<?php

namespace App\Http\Controllers;

use App\models\Room_Type;
use App\models\Rooms;
use App\models\RoomStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Rooms::join('room_types', 'room_type_id', '=', 'room_types.id')
        ->join('room_status', 'room_status_id', 'room_status.id')
        ->select('rooms.id', 'rooms.room', 'rooms.description', 'room_types.type', 'room_status.status')
        ->get();

        $records = count($rooms);
        $meta = [
            'page' => 1,
            'pages' => ceil($records/-1),
            'perpage' => -1,
            'sort' => 'asc',
            'field' => 'ID'
        ];

        return json_encode(array('meta'=> $meta, 'data' => $rooms));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = Room_Type::all('id', 'type');
        $statuses = RoomStatus::all('id', 'status');
        $form_title = 'Room - Add';
        $form_description = 'Enter details to add new room, field with * are required.';
        return view('rooms.room_add', compact('form_title', 'form_description', 'types', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Rooms::create(
            request()->validate([
                'room'=>'required',
                'description' => 'nullable',
                'room_type_id' => 'required',
                'room_status_id' => 'required',
                'user_id' => 'required'
            ])
        );
        return redirect('/rooms/room');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function show(Rooms $rooms)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function edit(Rooms $room)
    {
        //
        $types = Room_Type::all('id', 'type');
        $statuses = RoomStatus::all('id', 'status');
        $page_title = 'Room';
        $page_description = 'Form for editing selected record';
        $form_title = 'Room - Edit';
        $form_description = 'Enter details to edit room, field with * are required.';
        return view('rooms.room_edit', compact('form_title', 'form_description', 'room', 'types', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rooms $room)
    {
        //
        $room->update(
            request()->validate([
                'room'=>'required',
                'description' => 'nullable',
                'room_type_id' => 'required',
                'room_status_id' => 'required',
                'user_id' => 'required'
            ])
        );
        return redirect('/rooms/room');
    }

    public function updateStatus(Rooms $room){
        $room->room_status_id = request('room_status_id');
        $room->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rooms $room)
    {
        //
        $room->user_id = Auth::user()->id;
        $room->save();
        $room->delete();
    }
}
