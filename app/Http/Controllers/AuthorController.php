<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class AuthorController extends Controller
{
    public function index()
    {
        return view('author.dashboard');
    }

    public function postRegister(Request $request)
    {
        $request->validate(User::$rules);
        $requests = $request->all();
        $requests['password'] = Hash::make($request->password);
        $requests['image'] = "";
        if ($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/admin/", $files);
            $requests['image'] = "file/admin/" . $files;
        }

        $user = User::create($requests);
        if ($user) {
            return redirect('register')->with('status', 'Berhasil mendaftar !');
        }

        return redirect('register')->with('status', 'Gagal Register Account !');

    }
    
    public function logout()
    {
        Session::flush();
        return redirect('login')->with('status', 'Berhasil logout !');
    }

    public function dashboard()
    {
        return view('author.dashboard');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('author.profile.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $d = User::find($id);
        if ($d == null) {
            return redirect('author/profile/' . $id)->with('status', 'Data tidak ditemukan !');
        }

        $req = $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'old_password' => 'required_with:new_password,confirm_password',
            'new_password' => 'required_with:old_password,confirm_password|same:confirm_password',
            'confirm_password' => 'required_with:old_password,new_password'
        ]);

        if ($request->old_password) {
            if (!Hash::check($request->old_password, $d->password)) {
                return redirect('author/profile/' . $id)->with('status', 'Old password does not match !');
            } else {
                $req['password'] = Hash::make($request->new_password);
            }
        }

        if ($request->hasFile('image')) {
            if ($d->image !== null) {
                File::delete("$d->image");
            }
            $admin = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/admin/", $admin);
            $req['image'] = "file/admin/" . $admin;
        }

        $data = User::find($id)->update($req);
        if ($data) {
            return redirect('author/profile/' . $id)->with('status', 'Profile berhasil diedit !');
        }
        return redirect('author/profile/' . $id)->with('status', 'Gagal edit Profile !');
    }

}