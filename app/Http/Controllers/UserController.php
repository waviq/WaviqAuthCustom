<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Mail;
use Redirect;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function getSignIn()
    {
        return view('users.login');
    }

    public function postSignIn()
    {
        $remember = Input::has('remember') ? true:false;

        $auth = Auth::attempt(array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'active'    =>1,

        ),$remember);

        if ($auth) {
            alert()->success('selamat anda sukses login');
            return Redirect::intended('home');
        }else{
            alert()->error('Id/email anda salah atau belom di aktivkan via email');
            return redirect('account/login');
        }
    }

    public function getCreateAccount()
    {
        return view('users.register');
    }

    public function postCreateAccount(RegisterRequest $request)
    {
        $name = Input::get('name');
        $username = Input::get('username');
        $email = Input::get('email');
        $password = bcrypt(Input::get('password'));
        $code = str_random(60);

        $userCreate = User::create([
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'code' => $code,
            'active' => 0,

        ]);

        if ($userCreate) {

            Mail::send('email.actived', array(
                'link' => \URL::route('account-actived', $code),
                'username' => $username,

            ), function ($message) use ($userCreate) {
                $message->to($userCreate->email, $userCreate->username)
                    ->subject('actived your email');

            });

            alert()->success('selamat sukses melakukan registrasi, cek emai anda n aktivkan account anda', 'registration');
        } else {
            alert()->error('gagal melakukan registrasi');
        }

        return redirect('account');
    }

    public function getActived($code)
    {
        $user = User::where('code', '=', $code)->where('active', '=', 0);


        if ($user->count()) {

            $user = $user->first();

            //update isi DB
            $user->code = '';
            $user->active = 1;

            if ($user->save()) {

                alert()->success('akun anda sudah aktif, terimakasih');
                return redirect('home');
            }
        }
        alert()->error('gagal melakukan aktivasi');
        return redirect('account');

    }

    public function home()
    {
        return view('users.home');
    }

    public function getSignOut()
    {
        Auth::logout();

        return redirect('account');
    }

    public function getChangePassword()
    {
        return view('users.changePassword');
    }

    public function postChangePassword()
    {
        $user = User::find(Auth::user()->id);

        $oldPassword = Input::get('oldPassword');
        $newPassword = Input::get('newPassword');

        if(Hash::check($oldPassword, $user->getAuthPassword())){
            $user->password = Hash::make($newPassword);

            if($user->save()){
                alert()->success('selamat sukses mengganti password');
                return redirect('home');
            }
        }
    }

    public function getResetPassword()
    {
        return view('users.password.reset');
    }

    public function postResetPassword()
    {
        $user = User::where('email', '=', Input::get('email'));

        if($user->count()){
            $user = $user->first();

            //generate new code n password
            $code = str_random(60);
            $password = str_random(10);

            $user->code = $code;
            $user->password_tmp = bcrypt($password);

            if($user->save()){

                Mail::send('email.resetSendEmail',array(
                    'link' =>\URL::action('UserController@getRecoverPassword',$code),
                    'username' => $user->username,
                    'password' => $password
                ),function($message)use ($user){
                    $message->to($user->email, $user->username)
                            ->subject('new your password');
                });

                return redirect('account');
            }
        }else{
            echo 'gagal reset, email salah';
        }
    }

    public function getRecoverPassword($code)
    {
        return $code;
    }
}
