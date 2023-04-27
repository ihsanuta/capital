<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artikel;
use App\Models\PointArtikel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(){
        $user = Auth::user();
        if($user){
            return redirect()->route('user.profile');
        }else{
            return view('login');
        }
	}

	public function register(){
		return view('register');
	}

	public function profile(){
        $artikel = Artikel::all();
		return view('profile', ['artikels'=>$artikel]);
	}

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'ktp' => 'required|min:16',
            'hp' => 'required|min:10',
            'password' => 'required|confirmed|min:6',
            'kota' => 'required',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = trim($request->input('email'));
        $user->password = bcrypt($request->input('password'));
        $user->ktp = trim($request->input('ktp'));
        $user->hp = trim($request->input('hp'));
        $user->kota = trim($request->input('kota'));
        $user->jenis_kelamin = trim($request->input('jeniskelamin'));
        $user->save();

        return redirect()->route('user.login');

    }

    public function signin(LoginRequest $request){
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);

    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function artikel(string $artikel_id){
        $user = Auth::user();
        $artikel = Artikel::where('id','=', $artikel_id)->first();
        $artikel->get_point = true;

        if($artikel->point == 'single'){
            $cek = PointArtikel::where('artikel_id','=', $artikel->id)->where('user_id','=',$user->id)->first();
            if ($cek) {
                $artikel->get_point = false;
            }
        }
        return view('artikel', ['data'=>$artikel]);
    }

    public function point($artikel_id, $id){
        $user = USER::where('id','=', $id)->first();

        $user->point += 1;
        $user->save();

        $artikel = Artikel::where('id','=', $artikel_id)->first();
        if($artikel && $artikel->point == 'single'){
            $point_artikel = new PointArtikel;
            $point_artikel->artikel_id = $artikel_id;
            $point_artikel->user_id = $id;
            $point_artikel->save();
        }

        return $user;
    }

    public function withdraw(){
        $auth = Auth::user();
        $user = USER::where('id','=', $auth->id)->first();
        $konversi = $user->point * 0.002;

        if($konversi < 100000){
            return "Withdraw minimum Rp.100.000";
        }

        $user->point = 0;
        $user->save();

        return "Withdraw success";
    }

     /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }
}
