<?php

namespace App\Http\Controllers;

use App\Models\Room_Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomTypeController extends Controller
{
    // fetch all data from dbase
    public function index()
    {
        $roomtype = new Room_Type();
        $data = $roomtype->select('id', 'type', 'description', $roomtype::raw('FORMAT(rate, 2) as rate'), $roomtype::raw('id as Actions'))->get();
        $records = count($data);
        $perpage = 20;
        $meta = [
            'page' => 1,
            'pages' => ceil($records / $perpage),
            'perpage' => -1,
            'total' => $records,
            'sort' => 'asc',
            'field' => 'ID'
        ];

        return json_encode(array('meta' => $meta, 'data' => $data));
    }

    public function index1(){
        $roomtypes = Room_Type::all();
        return json_encode($roomtypes);
    }

    public function create()
    {
        $page_title = 'Room Type';
        $page_description = 'Form for adding new Room Type';
        $form_title = 'Room Type - Add';
        $form_description = 'Enter details to add new room type, field with * are required.';
        return view('rooms.types.room_type_add', compact('page_title', 'page_description', 'form_title', 'form_description'));
    }

    public function show()
    {
    }

    public function store()
    {

        Room_Type::create(
            request()->validate([
                'type'  => 'required',
                'description' => 'nullable',
                'rate' =>  ['required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
                'user_id' => 'required'
            ])
        );

        return redirect(route('roomtypes'));
    }

    public function edit(Room_Type $type)
    {
        $page_title = 'Room Type';
        $page_description = 'Form for editing selected record';
        $form_title = 'Room Type - Edit';
        $form_description = 'Enter details to add new room type, field with * are required.';
        return view('rooms.types.room_type_edit', compact('page_title', 'page_description', 'form_title', 'form_description', 'type'));
    }

    public function update(Room_Type $type){
       
       // dd(request());
        $type->update(request()->validate([
            'type'  => 'required',
            'description' => 'nullable',
            'user_id' =>'required',
            'rate' => ['required', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/']
        ]));
       
        return redirect(route('roomtypes')); 
    }

    public function destroy(Room_Type $type){
        $type->user_id = Auth::user()->id;
        $type->save();
        $type->delete();
    }
}
