@extends('author.app')
@section('content')
    <h3>Create Posts</h3>
    <hr>
    <div class="col-lg-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('author/post/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
            <label for="banner">Banner</label>
            <input type="file" name="banner" class="form-control">
            <label for="category">Category</label>
            <select class="form-control" name="categories_id" id="category">
                @foreach ($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->category_id}}</option>
                @endforeach
            </select>
            <label for="headline">Headline</label>
            <select class="form-control" name="is_headline" id="is_headline">
                <option value="0">Tidak Headline</option>
                <option value="1">Headline</option>
            </select>
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="1">Publish</option>
                <option value="0">Tidak Publish</option>
            </select>
            <br>
            <textarea id="content" class="form-control" name="content" rows="10" cols="50"></textarea><br>
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('author/post') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </form>
    </div>


@endsection
@section('js')
<script src="{{url('assets/ckeditor/ckeditor.js')}}"></script>
<script>
   var content = document.getElementById("content");
     CKEDITOR.replace(content,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
</script>
@endsection
