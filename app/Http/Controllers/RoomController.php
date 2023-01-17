<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Type;

use App\Models\Image;
use App\Models\RoomStatus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    

    //index:one by one display
    public function index(Request $request)
    {
 
      $rooms = Room::with('type', 'roomStatus')->orderBy('number');
      if (!empty($request->search)) {
        $rooms = $rooms->where('number', 'LIKE', '%' . $request->search . '%');
    }
  
    $rooms = $rooms->paginate(5);
        //$rooms=Room::withCount('image')->first();

        return view('Rooms.index',[
            'rooms'=>$rooms,
               ]);
     }

  //show:all display
  public function show($id)
  {

    $room=Room::findOrFail($id);
      //dd(\App\Models\Post::find($id));
      return view('Rooms.show',[
          'room'=>$room,
      ]);
  }
  //create
  public function create( ){
    $types=Type::all();
    $roomstatus=RoomStatus::all();
    return view('Rooms.create',[
      'types'=>$types,
      'roomstatus'=>$roomstatus,
  ]);
    }
    //store
    public function store(StoreRoomRequest  $request ){
     
   
          // if ( $request->hasFile('picture')) {
        // $file=$request->file('picture')->store('Images');
       //dump($file->store('imagesDos'));
      // dump(Storage::putFile('imagesDos',$file));
     //dump(Storage::disk('local')->putFile('imagesDos',$file));
     //$name1=$file->storeAs('imagesDos',random_int(1,100) .'.'.$file->guessExtension());
    // $name2=Storage::disk('local')->putFileAs('imagesDos',$file,random_int(1,100) .'.'.$file->guessExtension());
    //dump(Storage::url($name1));
   // dump(Storage::disk('local')->url($name2)); }

   
  
      $data=$request->only([
        'type_id',
      'room_status_id',
      'number',
      'capacity',
      'price',
      'view']);
      $room=Room::create($data);

      //Upload Image
      if ( $request->hasFile('picture')) {
     $url=$request->file('picture')->store('Images');
     $image=new Image(['url'=>$url]);
     $room->image()->save($image);
    // 'room_id'=> $room->id
     
    }

      $request->session()->flash('status',  'Room ' . $room->number . ' created !!');
      return redirect()->route('room.index');
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $types=Type::all();
      $roomstatuses=RoomStatus::all();
      $room=Room::findOrFail($id);
      return view('Rooms.edit',[
        'room'=>$room,
        'roomstatuses'=>$roomstatuses,
        'types'=>$types,
      ]);
   }


/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(StoreRoomRequest $request,$id){
      $room=Room::findOrFail($id);
      $room->type_id=$request->input('type_id');
      $room->room_status_id=$request->input('room_status_id');
      $room->number=$request->input('number');
      $room->capacity=$request->input('capacity');
      $room->price=$request->input('price');
      $room->view=$request->input('view');

// Upload Image
   if ( $request->hasFile('picture')) {

    $url=$request->file('picture')->store('Images');
    $image=new Image(['url'=>$url]);
    $room->image()->save($image);
    
  }
  
  //end
      $request->session()->flash('status','The Room was updated !!');
      return redirect()->route('room.index');
   
     
    }


/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request,$id)
{
  Room::destroy($id);
  $request->session()->flash('status','The Room was Deleted !!');
  return redirect()->route('room.index');

}

















}

