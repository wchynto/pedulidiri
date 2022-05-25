<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perjalanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerjalananExample extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perjalanan = Perjalanan::with('user')->get();
        $user_profile = User::get();

        return view('perjalanan', [
            'nama' => 'perjalanan',
            'perjalanan' => $perjalanan,
            'profile' => $user_profile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'suhu_tubuh' => 'required'
        ]);

        $perjalanan = new Perjalanan;

        $perjalanan->tanggal = $request->tanggal;
        $perjalanan->waktu = $request->waktu;
        $perjalanan->lokasi = $request->lokasi;
        $perjalanan->suhu_tubuh = $request->suhu_tubuh;
        $perjalanan->user_id = Auth::user()->id;

        $perjalanan->save();

        return redirect('perjalanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'suhu_tubuh' => 'required'
        ]);

        dd(Perjalanan::find($id));

        Perjalanan::find($id)->update($request->all());

        return redirect('perjalanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Perjalanan::find($id)->delete();

        DB::statement('ALTER TABLE perjalanan AUTO_INCREMENT = ' . $id - 1);

        return redirect('perjalanan');
    }
}
