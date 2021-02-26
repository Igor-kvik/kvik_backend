<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\CustomStuff\CustomClass\GetNumberReg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public static $callValid;

    public function create()
    {
        return view("user.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|digits:10|numeric|unique:users',
            'password' => 'required|confirmed',
        ]);

        $callValid = new GetNumberReg('+7'.$request->all()['phone']);

        session(['callValid' => $callValid->getNumberUsers(),
            'name' => $request->all()['name'],
            'phone' => $request->all()['phone'],
            'password' => Hash::make($request->all()['password']),
            ]);

        return view('user.confirmForm');
    }


    public function numberConfirm(Request $request){

        if ($request->all()['inputNumber'] == session('callValid')){
            $user = User::create([
                'name' => session('name'),
                'phone' => session('phone'),
                'password' => session('password'),
            ]);
            session()->flash('success', 'Регистрация завершена');
            Auth::login($user);
            return redirect()->route('home');
        } else {
            session()->flash('warning','Регистрация не завершена. Ошибка при вводе проверочных цифр');
            return redirect()->route('register.create');
        }
    }

    public function loginForm(){
        return view('user.login');
    }

    public function login(Request $request){
        $request->validate([
            'phone' => 'required|digits:10|numeric|exists:users',
            'password' => 'required',
        ]);
        $credentials = $request->only('phone', 'password');
        if (Auth::attempt(['phone' => $credentials["phone"], 'password' => $credentials["password"], 'blocked' => false])) {
            $request->session()->regenerate();
//            session()->flash('success', 'Авторизация успешна');
            return redirect()->intended(route('home'));
        }
        session()->flash('warning','Некорректный телефон или пароль');
        return redirect()->route('login');
    }

    public function logout(){
        Auth::logout();
//        session()->flash('success', 'Успешный выход из авторизации');
//        return redirect()->route('login');
        return redirect()->back();
    }
}
