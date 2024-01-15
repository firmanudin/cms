<?php

namespace App\Http\Controllers;

use Spatie\ImageOptimizer\OptimizerChainFactory;
use Spatie\ImageOptimizer\Optimizers\Jpegoptim;
use Spatie\ImageOptimizer\Optimizers\Pngquant;
use Spatie\ImageOptimizer\Optimizers\Svgo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::get();
        return view('admin.post.index', compact('data'));
    }

    public function index2()
    {
        $data = Post::get();
        return view('author.post.index', compact('data'));
    }

    public function create()
    {
        $category = Category::get();
        return view('admin.post.create', compact('category'));
    }

    public function create2()
    {
        $category = Category::get();
        return view('author.post.create', compact('category'));
    }

    public function insert(Request $request)
    {
        $request->validate(Post::$rules);
        $requests = $request->all();
        $requests['banner'] = "";

        if ($request->hasFile('banner')) {
            $files = Str::random("20") . "-" . $request->banner->getClientOriginalName();
            $request->file('banner')->move("file/post/", $files);
            $requests['banner'] = "file/post/" . $files;
        }

        $requests['slug'] = Str::slug($requests['title'], '-');

        $cat = Post::create($requests);
        if ($cat) {
            return redirect('admin/post')->with('status', 'Berhasil menambah data !');
        }

        return redirect('admin/post')->with('status', 'Gagal menambah data !');
    }


    public function insert2(Request $request)
    {
        $request->validate(Post::$rules);
        $requests = $request->all();
        $requests['banner'] = "";

        if ($request->hasFile('banner')) {
            $files = Str::random("20") . "-" . $request->banner->getClientOriginalName();
            $request->file('banner')->move("file/post/", $files);
            $requests['banner'] = "file/post/" . $files;
        }

        $requests['slug'] = Str::slug($requests['title'], '-');

        $cat = Post::create($requests);
        if ($cat) {
            return redirect('author/post')->with('status', 'Berhasil menambah data !');
        }

        return redirect('author/post')->with('status', 'Gagal menambah data !');
    }

    public function edit($id)
    {
        $data = Post::find($id);
        $category = Category::get();
        return view('admin.post.edit', compact('data', 'category'));
    }

    public function edit2($id)
    {
        $data = Post::find($id);
        $category = Category::get();
        return view('author.post.edit', compact('data', 'category'));
    }


    public function update(Request $request, $id)
    {
        $d = Post::find($id);
        if ($d == null) {
            return redirect('admin/post')->with('status', 'Data tidak ditemukan !');
        }

        $req = $request->all();

        if ($request->hasFile('banner')) {
            if ($d->banner !== null) {
                File::delete("$d->banner");
            }
            $post = Str::random("20") . "-" . $request->banner->getClientOriginalName();
            $request->file('banner')->move("file/post/", $post);
            $req['banner'] = "file/post/" . $post;
        }

        $req['slug'] = Str::slug($req['title'], '-');

        $data = Post::find($id)->update($req);
        if ($data) {
            return redirect('admin/post')->with('status', 'Post berhasil diedit !');
        }
        return redirect('admin/post')->with('status', 'Gagal edit post !');
    }

    public function update2(Request $request, $id)
    {
        $d = Post::find($id);
        if ($d == null) {
            return redirect('admin/post')->with('status', 'Data tidak ditemukan !');
        }

        $req = $request->all();

        if ($request->hasFile('banner')) {
            if ($d->banner !== null) {
                File::delete("$d->banner");
            }
            $post = Str::random("20") . "-" . $request->banner->getClientOriginalName();
            $request->file('banner')->move("file/post/", $post);
            $req['banner'] = "file/post/" . $post;
        }

        $req['slug'] = Str::slug($req['title'], '-');

        $data = Post::find($id)->update($req);
        if ($data) {
            return redirect('admin/post')->with('status', 'Post berhasil diedit !');
        }
        return redirect('admin/post')->with('status', 'Gagal edit post !');
    }

    public function delete($id)
    {
        $data = Post::find($id);
        if ($data == null) {
            return redirect('admin/post')->with('status', 'Data tidak ditemukan !');
        }
        if ($data->image !== null || $data->image !== "") {
            File::delete("$data->image");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/post')->with('status', 'Berhasil hapus post !');
        }
        return redirect('admin/post')->with('status', 'Gagal hapus category !');
    }

    public function delete2($id)
    {
        $data = Post::find($id);
        if ($data == null) {
            return redirect('author/post')->with('status', 'Data tidak ditemukan !');
        }
        if ($data->image !== null || $data->image !== "") {
            File::delete("$data->image");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('author/post')->with('status', 'Berhasil hapus post !');
        }
        return redirect('author/post')->with('status', 'Gagal hapus category !');
    }
}