<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'level' => ['required', 'string', 'in:customer'],
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'alamat' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambarPath = $gambar->storeAs('gambar', $gambarName, 'public');
        }

        User::create([
            'name' => $request->name,
            'level' => 'customer',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'gambar' => $gambarPath,
        ]);

        return redirect('login')->with('success', 'Berhasil mendaftar, silahkan melakukan login!');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $Slide = Slide::active()->orderBy('position', 'ASC')->get();
        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->level == 'admin') {
                return view('admin.package.dashboard')->with('success', 'Selamat datang ' . auth()->user()->name);
            } elseif (auth()->user()->level == 'customer') {
                return view('frontend.package.dashboard', compact('Slide'))->with('success', 'Selamat datang ' . auth()->user()->name);
            } else {
                return redirect('login');
            }
        }
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}