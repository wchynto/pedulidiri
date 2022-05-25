
@extends('layouts.app')

@section('pages')

<div class="container">
    <div class="mt-5 mb-4">
        @foreach ($profile as $p)
        @if ($p->id == Auth::user()->id)
        <div class="row">
            <div class="col-5 col-lg-3 text-center">
                @if ($p->foto == null)
                <img class="img-fluid mx-auto rounded-circle" src="{{ asset('images/profile.png') }}" style="width: 200px; height: 200px; object-fit: cover" alt="" srcset="">
                @else
                <img class="img-fluid mx-auto rounded-circle" src="{{ Storage::url('profile_images/' . $p->foto) }}" style="width: 200px; height: 200px; object-fit: cover" alt="" srcset="">s
                @endif
                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#model-profile{{$p->id}}">
                    Edit Profil <i class="fas fa-edit    "></i>
                </button>
            </div>
            <div class="col-7 col-lg-9">
                <h2> {{$p->nama}} </h2>
                <h4> {{$p->sekolah}} </h4>
                <h4> {{$p->email}} </h4>
                <h4> {{$p->nik}} </h4>
            </div>
        </div>

        @include('partials.modal_profil')

        @endif
    @endforeach
    </div>
   <div class="row">
    <div class="col-12 mx-auto">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="#catatanPerjalanan" data-toggle="tab" href="#catatanPerjalanan"
                    role="tab" aria-controls="catatanPerjalanan" aria-selected="true">Catatan Perjalanan</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="#dataPerjalanan" data-toggle="tab" href="#dataPerjalanan" role="tab"
                    aria-controls="dataPerjalanan" aria-selected="false">Tambah Catatan</a>
            </li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="catatanPerjalanan" role="tabpanel"
                aria-labelledby="catatanPerjalanan-tab">
                <div class="my-4">
                    <form action="{{ route('perjalanan.filter') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="text-center col-4 col-lg-2">
                                <label for="" style="font-size: 20px;">Urutkan</label>
                            </div>
                            <div class="col-4 col-lg-2">
                                <select class="custom-select" name="select" id="">
                                    <option selected value="select">Select</option>
                                    <option value="waktu">Waktu</option>
                                    <option value="lokasi">Lokasi</option>
                                    <option value="tanggal">Tanggal</option>
                                    <option value="suhu">Suhu</option>
                                </select>
                            </div>
                            <div class="col-4 col-lg-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-responsive-lg text-center">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Suhu Tubuh</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perjalanan as $d)
                            @if ($d->user->id == Auth::user()->id)
                            <tr>
                                <td  scope="row"> {{$d->tanggal}} </td>
                                <td> {{$d->waktu}} </td>
                                <td> {{$d->lokasi}} </td>
                                <td> {{$d->suhu_tubuh}} </td>
                                <td>
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#model{{$d->id}}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#model-delete{{$d->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            @include('partials.modal_edit')
                            @include('partials.modal_delete')

                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="dataPerjalanan" role="tabpanel" aria-labelledby="dataPerjalanan-tab">

                <div class="mt-4 mx-5">
                    <form action="/perjalanan" method="post">

                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Tanggal</label>
                                </div>

                                <div class="col-8">

                                    <input type="date" class="form-control" name="tanggal" id="inputTanggal"
                                        aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Waktu</label>
                                </div>

                                <div class="col-8">

                                    <input type="time" class="form-control" name="waktu" id="" aria-describedby="helpId"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Lokasi</label>
                                </div>

                                <div class="col-8">

                                    <input type="text" class="form-control" name="lokasi" id="" aria-describedby="helpId"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Suhu Tubuh</label>
                                </div>

                                <div class="col-8">

                                    <input type="text" class="form-control" name="suhu_tubuh" id="" aria-describedby="helpId"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="float: right;" class="btn btn-primary my-4 ">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
   </div>
</div>

<script>
   
</script>

@endsection