@extends('layouts.app')

@section('login_register')
    
<div class="login-card">
    <div class="container">
        @if (session()->has('danger'))
 <div class="row">
    <div class="alert alert-danger mx-auto col-11 col-lg-6">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{session()->get('danger')}}</strong>
      </div>
 </div>
@endif

<div class="card col-12 col-md-6 shadow">
    <div class="card-header">
        <h2 class="text-center my-2">Login</h2>
    </div>
    <form action="/" method="post">

        @csrf

        <div class="card-body">
            <div class="form-group">
                <label for="">NIK</label>
                <input type="text" class="form-control" name="nik" id="" aria-describedby="helpId" placeholder="Masukkan NIK" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Masukkan Password" required>
            </div>
        </div>
        <div class="card-footer text-center">
            <div class="row">
                <div class="col-6">
                    <a class="btn btn-primary col-10 col-md-12" href="{{ route('register.index') }}"
                    style="width: 150px; height: 40px;">Register</a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn col-10 col-md-12"
                    style="width: 150px; height: 40px;">Login</button>
                </div>
            </div>
        </div>
    </form>
</div>
    </div>
</div>

@endsection