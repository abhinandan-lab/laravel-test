<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    function register(Request $r)
    {
        if($r->session()->has('user_login')){
            return redirect('/home');
        }

        $email = $r->post('email');
        $phone = $r->post('phone');
        $gender = $r->post('gender');
        $pass = $r->post('password');

        if ($email == null || $phone == null || $gender == null || $pass == null) {
            return 'Empty fields not allowed';
        } else {

            $checkcopy = DB::table('accounts')->where(['email' => $email], ['phone' => $phone], ['gender' => $gender])->count();

            if ($checkcopy == 0) {
                $modal = new Account();
                $modal->email = $email;
                $modal->phone = $phone;
                $modal->gender = $gender;
                $modal->password = Hash::make($pass);
                $modal->save();

                return 'Signup Success';
            } else {
                return 'already registered';
            }
        }
        // return [$email,$phone,$gender,$pass];
    }


    function loginProcess(Request $r){

        // if($r->session()->has('user_login')){
        //     return redirect('/home');
        // }


        $email = $r->post('email');
        $password = $r->post('password');

        $user = DB::table('accounts')->where(['email'=>$email])->count();
        $userRow = DB::table('accounts')->where(['email'=>$email])->get();

        if($user==0){
            $user = DB::table('accounts')->where(['phone'=>$email])->count();
            $userRow = DB::table('accounts')->where(['phone'=>$email])->get();
            if($user==0){
                return 'Invalid username';
            }
        }

        // username is valid here
        $passwordCheck = Hash::check($password, $userRow[0]->password);

        if($passwordCheck==1){
            // login success
            $r->session()->put('user_login',true);
            $r->session()->put('user_id',$userRow[0]->id);
            return 'login success';
        }
        else {
            return 'login failed, wrong password';
        }
    }


    function home(Request $r)
    {

        if($r->session()->has('user_login')==false){
            return redirect('/');
        }

        $result['data'] = Account::all();
        //return $result;

        return view('home', $result);
    }

    function search(Request $r)
    {
        if($r->session()->has('user_login')==false){
            return redirect('/');
        }
        return view('search');
    }


    function searching(Request $r, $email, $phone, $gender)
    {
        if($r->session()->has('user_login')==false){
            return redirect('/');
        }


        if ($email == '0') {
            $email = '';
        }
        if ($phone == '0') {
            $phone = '';
        }
        if ($gender == 'all') {
            $gender = '';
        }

        // return [$email, $phone, $gender];

        $result;

        if ($email == '' && $phone == '' && $gender == '') {
            return $result['data'] = Account::all();
            // return view('search',$result);

        }

        else {

            // email
            if ($email != '' && $phone == '' && $gender == '') {
                $result['data'] = DB::select('SELECT `id`, `email`, `phone`, `gender` FROM `accounts` WHERE email LIKE "%' . $email . '%"');
                return $result['data'];
            }

            // phone
             else if ($email == '' && $phone != '' && $gender == '') {
                $result['data'] = DB::select('SELECT `id`, `email`, `phone`, `gender` FROM `accounts` WHERE phone LIKE "%' . $phone . '%"');
                return $result['data'];
            }

            // gender
             else if ($email == '' && $phone == '' && $gender != '') {
                $result['data'] = DB::select('SELECT `id`, `email`, `phone`, `gender` FROM `accounts` WHERE gender LIKE "' . $gender . '"');
                return $result['data'];
            }

            // email and phone
             else if ($email != '' && $phone != '' && $gender == '') {
                $result['data'] = DB::select('SELECT `id`, `email`, `phone`, `gender` FROM `accounts` WHERE email LIKE "%' . $email . '%" AND phone LIKE "%' . $phone . '%"');
                return $result['data'];
            }

            // phone and gender
             else if ($email == '' && $phone != '' && $gender != '') {
                $result['data'] = DB::select('SELECT `id`, `email`, `phone`, `gender` FROM `accounts` WHERE phone LIKE "%' . $phone . '%" AND gender LIKE "' . $gender . '"');
                return $result['data'];
            }

            // email and gender
             else if ($email != '' && $phone == '' && $gender != '') {
                $result['data'] = DB::select('SELECT `id`, `email`, `phone`, `gender` FROM `accounts` WHERE email LIKE "%' . $email . '%" AND gender LIKE "' . $gender . '"');
                return $result['data'];
            }

            // all three
             else {
                $result['data'] = DB::select('SELECT `id`, `email`, `phone`, `gender` FROM `accounts` WHERE email LIKE "%' . $email . '%" AND phone LIKE "%' . $phone . '%" AND gender LIKE "' . $gender . '"');
                return $result['data'];
            }

        }
    }
}
