<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\RequestEdit;
use App\Models\ModelRequest;
use App\Models\RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{

    // Menampilkan semua mahasiswa dalam kelas dosen
    public function index(Request $request)
    {
        $user = Auth::user();
        $dosen = $user->dosen; // Mengambil data dosen yang sedang login
        $isDosenWali = $request->attributes->get('is_dosen_wali');

        // Tentukan nama kelas atau kosongkan jika bukan dosen wali
        $kelas = $isDosenWali && $dosen->kelas ? $dosen->kelas->name : '';

        if ($isDosenWali) {
            // Dosen wali melihat mahasiswa yang mereka walikan
            $mahasiswas = Mahasiswa::where('kelas_id', $dosen->kelas_id)->get();
        } else {
            // Dosen biasa hanya bisa melihat data mahasiswa
            $mahasiswas = Mahasiswa::all();
        }

        return view('dashboard', [
            'mahasiswas' => $mahasiswas,
            'isDosenWali' => $isDosenWali,
            'dosenName' => $dosen->name,  // Mengirim nama dosen ke view
            'kelasName' => $kelas,       // Mengirim nama kelas ke view
            'nip' => $dosen->nip         // Mengirim NIP dosen ke view
        ]);
    }

    // Menampilkan form untuk menambah mahasiswa
    public function create()
    {
        return view('create');
    }

    // Menyimpan data mahasiswa baru
    public function store(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $user = Auth::user();

        Mahasiswa::create([
            'user_id' => $user->id,
            'kelas_id' => $user->dosen->kelas_id, // Asumsi user yang login adalah dosen wali
            'nim' => $request->nim,
            'name' => $request->name,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect('/dosen')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit data mahasiswa
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('edit', ['mahasiswa' => $mahasiswa]);
    }

    // Mengupdate data mahasiswa
    public function update(Request $request, $id)
    {
        // Validasi inputan
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->name = $request->name;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->save();

        return redirect('/dosen')->with('success', 'Data mahasiswa berhasil diupdate');
    }

    // Menghapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect('/dosen')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    // menampilkan halaman request
    public function request(Request $request)
    {
        $user = Auth::user();
        $isDosenWali = $request->attributes->get('is_dosen_wali');

        if ($isDosenWali) {
            // Dosen wali melihat permintaan edit dari mahasiswa yang mereka walikan
            $requestEdit = RequestEdit::whereHas('mahasiswa', function ($query) use ($user) {
                $query->where('kelas_id', $user->dosen->kelas_id);
            })->with('mahasiswa', 'kelas')->get();
        } else {
            // Dosen biasa hanya bisa melihat permintaan edit dari mahasiswa kelasnya
            $requestEdit = RequestEdit::whereHas('mahasiswa', function ($query) use ($user) {
                $query->where('kelas_id', $user->dosen->kelas_id);
            })->with('mahasiswa', 'kelas')->get();
        }

        return view('requestmhs', ['requestEdit' => $requestEdit]);
    }

    public function updateEdit(Request $request)
    {
        $mahasiswa = Mahasiswa::where('id', $request->id)->first();
        $mahasiswa->update([
            'edit' => $request->edit
        ]);
        $requestEdit = RequestEdit::where('mahasiswa_id', $request->id)->first();
        if ($requestEdit) {
            $requestEdit->delete();
        }
        return redirect()->route('request.index');
    }

    public function filterByClass(Request $request)
    {
        $kelas_id = $request->get('kelas_id');

        if ($kelas_id) {
            // Ambil mahasiswa berdasarkan kelas yang dipilih
            $mahasiswas = Mahasiswa::where('kelas_id', $kelas_id)->get();
        } else {
            // Jika tidak ada kelas yang dipilih, kosongkan daftar mahasiswa
            $mahasiswas = [];
        }

        // Ambil semua kelas untuk ditampilkan pada dropdown
        $kelas = Kelas::all();

        return view('mahasiswa', ['mahasiswas' => $mahasiswas, 'kelas' => $kelas]);
    }

    // Metode pencarian mahasiswa
    public function search(Request $request)
    {
        $user = Auth::user();
        $dosen = $user->dosen;
        $isDosenWali = $request->attributes->get('is_dosen_wali');
        $kelasName = $isDosenWali && $dosen->kelas ? $dosen->kelas->name : '';

        // Mendapatkan input pencarian
        $search = $request->input('search');

        // Mulai query untuk mahasiswa
        $query = Mahasiswa::query();

        // Menambahkan kondisi pencarian jika ada input
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // Filter berdasarkan dosen wali jika berlaku
        if ($isDosenWali) {
            $query->where('kelas_id', $dosen->kelas_id);
        }

        // Ambil hasil pencarian dengan paginasi
        $mahasiswas = $query->paginate(10);

        return view('dosen', [
            'mahasiswas' => $mahasiswas,
            'isDosenWali' => $isDosenWali,
            'dosenName' => $dosen->name,
            'kelasName' => $kelasName,
            'nip' => $dosen->nip
        ]);
    }

    // Metode pencarian mahasiswa berdasarkan mahasiswa_id
    public function searchMahasiswa(Request $request)
    {
        $mahasiswa_id = $request->input('mahasiswa_id');

        // Mencari data berdasarkan mahasiswa_id
        $requestEdit = RequestEdit::whereHas('mahasiswa', function ($query) use ($mahasiswa_id) {
            $query->where('id', $mahasiswa_id);
        })->get();

        return view('requestmhs', compact('RequestEdit'));
    }


     // Method untuk menyimpan request
    public function storeRequest(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'mahasiswa_id' => 'required',
            'keterangan' => 'required',
        ]);

        RequestEdit::create([ 
            'kelas_id' => $request->input('kelas_id'),
            'mahasiswa_id' => $request->input('mahasiswa_id'),
            'keterangan' => $request->input('keterangan'),
            'edit' => $request->input('edit', 0),
        ]);

        return redirect()->back()->with('success', 'Permintaan berhasil diajukan.');
    }

    // Method untuk menampilkan data request
    public function showRequests()
    {
        $requestEdit = RequestEdit::all();
        return view('requestmhs', compact('RequestEdit'));
    }
}
