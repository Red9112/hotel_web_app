<?php

namespace App\Http\Controllers;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index(Request $request)
    {
        
      //  $types = DB::table('types')->paginate(5);
        $types=Type::orderBy('id', 'ASC');
        if (!empty($request->search)) {
            $types = $types->where('name', 'LIKE', '%' . $request->search . '%');
        }
        $types= $types->paginate(5);
        return view('Types.index',[
     'types'=>$types,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreTypeRequest  $request ){
        $data=$request->only(['name','description']);
        $type=Type::create($data);
        $request->session()->flash('status','a Type was created !!');
        return redirect()->route('type.index');
      
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id){
        $type=Type::findOrFail($id);
        return view('Types.edit',['type'=>$type]);
     }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
        public function update(StoreTypeRequest $request,$id){
            $type=Type::findOrFail($id);
            $type->name=$request->input('name');
            $type->description=$request->input('description');
            $type->save();
            $request->session()->flash('status','The Type was updated !!');
            return redirect()->route('type.index');

        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Type::destroy($id);
        $request->session()->flash('status','The Type was Deleted !!');
        return redirect()->route('type.index');

    }

    


}
