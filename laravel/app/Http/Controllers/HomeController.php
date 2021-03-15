<?php


namespace App\Http\Controllers;


use App\Http\Requests\WriteRecordingRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController{

    public function index(){
        $clients = Client::orderBy('id', 'DESC')->get();
        return view('home', compact('clients'));
    }

    public function add_recording(WriteRecordingRequest $request){
        $item = $request->all();
        Client::create($item);
        return redirect()->route('home')->with(['success' => 'Успешно добавлено']);
    }

    public function auth_admin(Request $request){
        if(!empty($_POST)){

            $user = User::where('email', '=', $request->get('email'))->orWhere('password', '=', $request->get('password'))->first();
            if(empty($user)){
                return redirect()->route('auth_admin')->with(['error' =>'У вас ошибка логин или пароль']);
            }else{//Авторизацию не доделал, не могу поставить laravel/ui
                $_SESSION['user_id'] = base64_decode($user->id);
                return redirect()->route('home')->with(['success' =>'Поздравляю вы успешно были авторизированые']);
            }
        }
        return view('auth_admin');
    }

}
