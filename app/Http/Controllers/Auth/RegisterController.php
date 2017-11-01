<?php

namespace App\Http\Controllers\Auth;

use App\Tenant;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Webpatser\Uuid\Uuid;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'country' => 'required'
        ];
        $messages = [
            'name.required' => 'Please enter your business name',
            'category_id' => 'You haven\'t select business category',
            'email.required' => 'PLease enter your email address',
            'email.unique' => 'This email address has already taken',
            'password.required' => 'Please enter your password',
            'country.required' => 'You haven\'t choose country'
        ];
        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        dd($data);
        $tenant = Tenant::create([
            'id' => Uuid::generate(3,$data['email'], Uuid::NS_DNS),
            'name' => $data['name'],
            'email' => $data['email'],
            'category_id' => $data['category_id'],
            'country' => $data['country'],
            'description' => $data['description']
        ]);

        return User::create([
            'id' => Uuid::generate(3,$data['email'], Uuid::NS_DNS),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tenant_id' => $tenant->id,
            'user_type_id' => 1
        ]);
    }
}
