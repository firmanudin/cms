<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $data = User::get();
        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        return view('admin.user.create');
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
            return redirect('admin/user')->with('status', 'Berhasil Tambah User !');
        }

        return redirect('admin/user')->with('status', 'Gagal Tambah User !');

    }

    public function edit($id)
    {
        $data       = User::find($id);
        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $d = User::find($id);
        if ($d == null) {
            return redirect('admin/user/' . $id)->with('status', 'Data tidak ditemukan !');
        }

        $req = $request->all();

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
            return redirect('admin/user/edit/' . $id)->with('status', 'User berhasil diedit !');
        }
        return redirect('admin/user/' . $id)->with('status', 'Gagal edit Profile !');
    }

    public function delete($id)
    {
        $data = User::find($id);
        if ($data == null) {
            return redirect('admin/user')->with('status', 'Data tidak ditemukan !');
        }
        if ($data->image !== null || $data->image !== "") {
            File::delete("$data->image");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/user')->with('status', 'Berhasil hapus data !');
        }
        return redirect('admin/user')->with('status', 'Gagal hapus data !');
    }
}