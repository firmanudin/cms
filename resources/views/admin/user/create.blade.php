@extends('admin.app')
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
        <form action="{{ url('admin/user/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Name</label>
            <input type="name" name="name" class="form-control">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
            <label for="role">Role</label>
            <select name="role" class="form-control">
                <option value="">-- Pilih Role --</option>
                <option value="Admin">Admin</option>
                <option value="Author">Author</option>
            </select>
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control"><br>
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/user') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
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
