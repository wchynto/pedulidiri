<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perjalanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\File;

class PerjalananController extends Controller
{
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

    public function insert(Request $request)
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

        Alert::success('Catatan berhasil ditambahkan');

        return redirect('perjalanan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'suhu_tubuh' => 'required'
        ]);

        DB::statement(
            'UPDATE perjalanan SET tanggal = ?, waktu = ?, lokasi = ?, suhu_tubuh = ? WHERE id = ?',
            [$request->tanggal, $request->waktu, $request->lokasi, $request->suhu_tubuh, $id]
        );

        Alert::success('Catatan berhasil dirubah');

        return redirect('perjalanan');
    }

    public function delete($id)
    {
        Perjalanan::find($id)->delete();

        DB::statement('ALTER TABLE perjalanan AUTO_INCREMENT = ' . $id - 1);

        Alert::success('Catatan berhasil dihapus');

        return redirect('perjalanan');
    }

    public function filterData(Request $request)
    {
        $filter = $request->select;

        $perjalanan = Perjalanan::with('user')->get();
        $user_profile = User::all();

        switch ($filter) {

            case 'waktu':

                $perjalanan = $perjalanan->sortBy('waktu');

                break;

            case 'lokasi':

                $perjalanan = $perjalanan->sortBy('lokasi');

                break;

            case 'tanggal':

                $perjalanan = $perjalanan->sortBy('tanggal');

                break;

            case 'suhu':

                $perjalanan = $perjalanan->sortBy('suhu_tubuh');

                break;

            default:

                return redirect('perjalanan')->update();
        }

        return view('perjalanan_filter', [
            'nama' => 'perjalanan',
            'perjalanan' => $perjalanan,
            'profile' => $user_profile
        ]);
    }

    public function updateProfile(Request $request, $id)
    {

        // $path = public_path('storage\\profile_images\\');

        $request->validate([
            'foto' => 'required|file|mimes:png,jpg',
            'nama' => 'required',
            'sekolah' => 'required'
        ]);

        $current_image =  User::find($id);

        // if (!file_exists($path)) {

        //     unlink(public_path($path . $current_image->foto));
        // }

        $image =  $request->file('foto');

        $image_name = $image->getClientOriginalName();

        Storage::putFileAs('public/profile_images', $image, $image_name);

        DB::statement(
            'UPDATE user SET foto = ?, nama = ?, email = ?, sekolah = ? WHERE id = ?',
            [$image_name, $request->nama, $request->email, $request->sekolah, $id]
        );

        Alert::success('Profil berhasil dirubah');

        return redirect('perjalanan');
    }
}
