<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function registrationView()
    {
        return view('main.auth.registration');
    }

    public function registration(RegistrationRequest $request)
    {
        $validatedFields = $request->validated();

        event(new Registered(
            $user = $this->create($validatedFields)
        ));

        $this->guard()->login($user, true);

        return redirect()->route('home')->with('success', sprintf(
           'Пользователь %s, успешно зарегистрирован!',
           $user->name
        ));

//        if($user->role_id == 3){
//            return redirect()->route('user.profile')->with('success', sprintf(
//                'Пользователь %s успешно зарегестрирован!',
//                $user->name
//            ));
//        }
//
//        return redirect()->route('user.admin')->with('success', sprintf(
//            'Пользователь %s успешно зарегестрирован!',
//            $user->name
//        ));
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'phone' => $data['phone'],
            'role_id' => 3,
            'email' => $data['email'],
            'password' => Hash::make($data['email'])
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
