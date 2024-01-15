<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::get();
        return view('admin.category.index', compact('data'));
    }

    public function insert(Request $request)
    {
        $request->validate(Comment::$rules);
        $requests = $request->all();

        $comment = Comment::create($requests);
        if($comment){
            return redirect()->back()->with('status', 'Komentar berhasil dibuat !');
        }

        return redirect()->back()->with('status', 'Gagal memberikan komentar!');
    }

    public function delete($id)
    {
        $data = Comment::find($id);
        if ($data == null) {
            return redirect('admin/comment')->with('status', 'Data tidak ditemukan !');
        }

        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/comment')->with('status', 'Berhasil hapus comment !');
        }
        return redirect('admin/comment')->with('status', 'Gagal hapus comment !');
    }
}
