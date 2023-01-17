<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;

class CustomerController extends Controller
{
    
    public function index(Request $request) 
    {
      //  $types = DB::table('types')->paginate(5);
        $customers=Customer::orderBy('id', 'ASC');
        if (!empty($request->search)) { 
      $customers = $customers->where('name', 'LIKE', '%' . $request->search . '%');
        } 

        $customers = $customers->paginate(5);
        return view('Customers.index',[
     'customers'=>$customers,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreCustomerRequest  $request ){
    

        $customer=Customer::create([
            'name' => request('name'),
            'adress' => request('adress'),
            'cne'=> request('cne'),
            'num_passport'=> request('num_passport'),
            'gender'=> request('gender'),
            'user_id' => auth()->id(),
        ]);
       
       
        $request->session()->flash('status','a new Customer was created !!');
        return redirect()->route('customer.index');
      
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
        $customer=Customer::findOrFail($id);
        $user=auth()->user();
        
        return view('Customers.edit',['customer'=>$customer]);
     }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idcustomer
     * @return \Illuminate\Http\Response
     */
    
        public function update(StoreCustomerRequest $request,$id){
            $customer=Customer::findOrFail($id);
            $customer->name=$request->input('name');
            $customer->adress=$request->input('adress');
            $customer->cne=$request->input('cne');
            $customer->num_passport=$request->input('num_passport');
            $customer->gender=$request->input('gender');
            $customer->save();
            $request->session()->flash('status','The Customer was updated !!');
            return redirect()->route('customer.index');

            }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id) 
    {
        Customer::destroy($id);
        $request->session()->flash('status','The Customer was Deleted !!');
        return redirect()->route('customer.index');

    }
}
