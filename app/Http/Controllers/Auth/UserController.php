<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\UserRequest;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Webpatser\Uuid\Uuid;

class UserController extends Controller
{
    public function index() {
        $users = User::where('tenant_id', Auth::user()->tenant_id)->orderBy('user_type_id', 'asc')->get();
        return view('auth.user.user_index', compact('users'));
    }

    public function create() {
        $userTypes = UserType::all()->pluck('name', 'id');
        return view('auth.user.add_user', compact('userTypes'));
    }

    public function store(UserRequest $request) {
        User::create([
            'id' => Uuid::generate(3, $request->email, Uuid::NS_DNS),
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => bcrypt($request->input('password')),
            'tenant_id' => $request->tenant_id,
            'user_type_id' => $request->input('user_type_id')
        ]);
        return redirect('user')->with('status', 'User has been added');
    }

    public function edit(User $user) {
        $userTypes = UserType::all()->pluck('name', 'id');
        return view('auth.user.edit_user', compact('user','userTypes'));
    }

    public function update(UserRequest $request, User $user) {
        $user->update($request->all());
        return redirect('user')->with('status', 'User has been updated');
    }

    public function deleteUser(Request $request) {
        $user = User::findOrFail($request->user_id);
        if($user != null) {
            $user->delete();
            return redirect('user')->with('status', 'User has been deleted');
        } else {
            return redirect('user')->with('error','User not found');
        }
    }
}
