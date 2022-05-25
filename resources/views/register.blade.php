@extends('layouts.app')

@section('login_register')
    
<div class="login-card">
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="row" style="scale: 90%">
            <div class="alert alert-success mx-auto col-11 col-lg-6">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
            </div>
        </div>
@endif
        <div class="card col-12 col-lg-6 shadow" style="scale: 90%" >
            <div class="card-header">
                <h2 class="text-center my-2">Register</h2>
            </div>
            <form action="{{ route('register.register') }}" method="post">

                @csrf
                @method('POST')

                <div class="card-body">
                    <div class="form-group my-1">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" id="" aria-describedby="helpId" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group my-1">
                        <label for="">NIK</label>
                        <input type="text" class="form-control" name="nik" id="" aria-describedby="helpId" placeholder="Masukkan NIK" required>
                    </div>
                    <div class="form-group my-1">
                        <label for="">Sekolah</label>
                        <input type="text" class="form-control" name="sekolah" id="" aria-describedby="helpId" placeholder="Masukkan Nama Sekolah" required>
                    </div>
                    <div class="form-group my-1">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group my-1">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Masukkan Password" required>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-primary col-10 col-md-12" href="{{ route('login.login') }}"
                            style="width: 150px; height: 40px;">Back</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn col-10 col-md-12"
                            style="width: 150px; height: 40px;">Register</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection