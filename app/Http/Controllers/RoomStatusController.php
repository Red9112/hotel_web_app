<?php

namespace App\Http\Controllers;

use App\Models\RoomStatus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomStatusRequest;


class RoomStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $roomstatus=RoomStatus::orderBy('id');
        if (!empty($request->search)) {
            $roomstatus = $roomstatus->where('name', 'LIKE', '%' . $request->search . '%');
        }
        $roomstatus=$roomstatus->paginate(4);
        return view('RoomStatus.index',[
     'roomstatus'=>$roomstatus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('RoomStatus.create');
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomStatusRequest  $request ){
        $data=$request->only(['name','code','information']);
        $roomstatus=RoomStatus::create($data);
        $request->session()->flash('status','a new Status was created !!');
        return redirect()->route('roomstatus.index');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $roomstatus=RoomStatus::findOrFail($id);
        return view('RoomStatus.edit',['roomstatus'=>$roomstatus]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoomStatusRequest $request,$id){
        $roomstatus=RoomStatus::findOrFail($id);
        $roomstatus->name=$request->input('name');
        $roomstatus->code=$request->input('code');
        $roomstatus->information=$request->input('information');
        $roomstatus->save();
        $request->session()->flash('status','The Status was updated !!');
        return redirect()->route('roomstatus.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        RoomStatus::destroy($id);
        $request->session()->flash('status','The Status was Deleted !!');
        return redirect()->route('roomstatus.index');

    }
}
