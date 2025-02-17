<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user=\App\Models\User::find(1);
        \App::setLocale($user->lang);
        $registerPage=getSettingsValByName('register_page');

        if($registerPage =='on'){
            return view('auth.register');
        }else{
            return view('auth.login');
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'owner',
            'lang' => 'english',
            'subscription' => 1,
            'parent_id' => 1,
        ]);
        event(new Registered($user));
        $role_r = Role::findByName('owner');
        $user->assignRole($role_r);
        Auth::login($user);
        defaultEmployeeCreate($user->id);
        return redirect(RouteServiceProvider::HOME);
    }
}
