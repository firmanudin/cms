@extends('admin.app')
@section('css')
<style>
    .menu-link {
        color: black;
    }

    .menu-link:hover {
        text-decoration: none;
    }
</style>
@endsection
@section('content')
<h2>Dashboard</h2>
<hr>

<div class="row">

    <div class="col-lg-3">
        <a href="{{ url('admin/category') }}" class="menu-link">
            <div class="card card-menu">
                <div class="card-body text-center">
                    <i class="fas fa-list"></i> Category
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3">
        <a href="{{ url('admin/slider') }}" class="menu-link">
            <div class="card card-menu">
                <div class="card-body text-center">
                    <i class="far fa-images"></i> Slider
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3">
        <a href="{{ url('admin/post') }}" class="menu-link">
            <div class="card card-menu">
                <div class="card-body text-center">
                    <i class="fas fa-newspaper"></i> POSTS
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3">
        <a href="{{ url('admin/profile/'.session('admin_id')) }}" class="menu-link">
            <div class="card card-menu">
                <div class="card-body text-center">
                    <i class="far fa-user"></i> Profile
                </div>
            </div>
        </a>
    </div>


</div>
@endsection
