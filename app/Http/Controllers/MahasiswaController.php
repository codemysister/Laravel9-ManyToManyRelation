<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function all()
    {
        $mahasiswas = Mahasiswa::all();
        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->id | $mahasiswa->nim | ";
            echo "$mahasiswa->nama | $mahasiswa->jurusan <br>";
        }
    }

    public function attach()
    {
        $mahasiswa = Mahasiswa::find(3);
        $matakuliah = Matakuliah::find(4);

        // Lakukan proses attach, yakni hubungkan mahasiswa dan matakuliah
        $mahasiswa->matakuliahs()->attach($matakuliah);

        echo "Proses attach berhasil";
    }

    public function attachArray()
    {

        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();
        $matakuliahs = Matakuliah::find([1, 2, 3]);

        $mahasiswa->matakuliahs()->attach($matakuliahs);

        echo "Proses attach berhasil";
    }

    public function attachWhere()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Hesti Ramadan')->first();
        $matakuliahs = Matakuliah::where('jumlah_sks', 3)->get();

        $mahasiswa->matakuliahs()->attach($matakuliahs);

        echo "Proses attach berhasil";
    }

    public function tampil()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();
        dump($mahasiswa->matakuliahs);

        echo "## Daftar mata kuliah yang diambil $mahasiswa->nama ## ";
        echo "<hr>";

        // pakai perulangan untuk menampilkan setiap object matakuliah
        foreach ($mahasiswa->matakuliahs as $matakuliah) {
            echo "$matakuliah->id | $matakuliah->kode:

 $matakuliah->nama ($matakuliah->jumlah_sks sks) <br>";
        }
    }

    public function relationshipCount()
    {
        $mahasiswas = Mahasiswa::withCount('matakuliahs')->get();

        foreach ($mahasiswas as $mahasiswa) {
            echo "$mahasiswa->nama sudah mengambil
 $mahasiswa->matakuliahs_count matakuliah <br> ";
        }
    }

    public function detach()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();
        $matakuliah = Matakuliah::where('nama', "Kriptografi")->first();

        $mahasiswa->matakuliahs()->detach($matakuliah);

        echo "Proses detach berhasil";
    }

    public function sync()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();
        $matakuliahs = Matakuliah::find([4, 5]);

        $mahasiswa->matakuliahs()->sync($matakuliahs);

        echo "Proses sync berhasil";
    }

    public function syncLagi()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();
        $matakuliahs = Matakuliah::find([2, 3, 4]);

        $mahasiswa->matakuliahs()->sync($matakuliahs);
        echo "Proses sync berhasil";
    }

    public function syncChaining()
    {
        Mahasiswa::where('nama', 'Tiara Siregar')->first()->matakuliahs()
            ->sync(Matakuliah::find([1, 5]));

        echo "Proses sync berhasil";
    }

    public function syncWithout()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();
        $matakuliahs = Matakuliah::find([3, 4]);

        $mahasiswa->matakuliahs()->syncWithoutDetaching($matakuliahs);

        echo "Proses syncWithoutDetaching berhasil";
    }

    public function toggle()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();
        $matakuliahs = Matakuliah::where('nama', 'Kriptografi')->get();

        $mahasiswa->matakuliahs()->toggle($matakuliahs);

        echo "Proses toggle berhasil";
    }

    public function delete()
    {
        $mahasiswa = Mahasiswa::where('nama', 'Tiara Siregar')->first();
        $mahasiswa->delete();
        echo "Data $mahasiswa->nama berhasil di hapus";
    }
}
