<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Mainmenu;

class MainmenuController extends Controller
{
    public function index()
    {
        $data = Mainmenu::get();
        return view('admin.mainmenu.index', compact('data'));
    }

    public function create()
    {
        $parent = Mainmenu::get();
        return view('admin.mainmenu.create', compact('parent'));
    }

    public function insert(Request $request)
    {
        $request->validate(Mainmenu::$rules);
        $requests = $request->all();
        $requests['file'] = "";
        if ($request->hasFile('file')) {
            $files = Str::random("20") . "-" . $request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/", $files);
            $requests['file'] = "file/mainmenu/" . $files;
        }

        $cat = Mainmenu::create($requests);
        if($cat){
            return redirect('admin/mainmenu')->with('status', 'Berhasil menambah data !');
        }

        return redirect('admin/mainmenu')->with('status', 'Gagal menambah data !');
    }

    public function edit($id)
    {
        $parent = Mainmenu::get();
        $data = Mainmenu::find($id);
        return view('admin.mainmenu.edit', compact('data', 'parent'));
    }

    public function update(Request $request, $id)
    {

        $d = Mainmenu::find($id);
        if ($d == null) {
            return redirect('admin/mainmenu')->with('status', 'Data tidak ditemukan !');
        }

        $req = $request->all();

        if ($request->hasFile('file')) {
            if ($d->file !== null) {
                File::delete("$d->file");
            }
            $mainmenu = Str::random("20") . "-" . $request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/", $mainmenu);
            $req['file'] = "file/mainmenu/" . $mainmenu;
        }


        $data = Mainmenu::find($id)->update($req);
        if ($data) {
            return redirect('admin/mainmenu')->with('status', 'mainmenu berhasil diedit !');
        }
        return redirect('admin/mainmenu')->with('status', 'Gagal edit mainmenu !');

    }

    public function delete($id)
    {
        $data = Mainmenu::find($id);
        if ($data == null) {
            return redirect('admin/mainmenu')->with('status', 'Data tidak ditemukan !');
        }
        if ($data->image !== null || $data->image !== "") {
            File::delete("$data->image");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/mainmenu')->with('status', 'Berhasil hapus mainmenu !');
        }
        return redirect('admin/mainmenu')->with('status', 'Gagal hapus mainmenu !');
    }
}
