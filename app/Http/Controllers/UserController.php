<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(Request $request)
    {
       
        $users = User::with('roles')->orderBy('id', 'ASC');
        if (!empty($request->search)) {
            $users = $users->where('email', 'LIKE', '%' . $request->search . '%');
        }
        $users=$users->get();
        
        return view('Users.index', compact('users'));
    }

    public function create()
    {
        

        $roles = Role::pluck('title', 'id');

        return view('Users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
       // $user = User::create($request->validated());
       $user=User::create([  
        'name'           => request('name'),
        'email'          => request('email'),
        'password'       => bcrypt(request('password')),
        'remember_token' => null,
    ]);
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('user.index');
          
    }

    public function show(User $user)
    {
     
 
        return view('Users.show', compact('user'));
    }

    public function edit(User $user)
    {
      

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('Users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        

        $user->delete();

        return redirect()->route('user.index');
    }
}
