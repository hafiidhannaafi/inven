<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JenisBarang;
use App\Models\Barang;
use App\Models\DataJenisAset;
use App\Models\DataAsalPerolehan;
use App\Models\Peminjaman;
use App\Models\StatusPeminjaman;
use App\Models\StatusKonfirmasi;
use App\Models\Satuan;
use App\Models\User;

class PeminjamanController extends Controller
{
    //MENAMPILKAN DATA MASTER KE FORM
    public function index()
    {
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();

        // $akun = request()->user();
        // $a = User::where('users_id' , $akun->id)->get();
        // $akun = User::all();

        return view('peminjaman.form',[
            "title" => "riwayat",
            "jenisbarang" => $jenisbarang,
            "jenisaset" => $datajenisaset,
            "dataasalperolehan" => $dataasalperolehan,
            "datasatuan" =>$datasatuan,
            "inputbarang"=> $inputbarang,
            // "akun"=> $akun,
            // "a"=>$a
        ]);
       
    }

    //MENAMPILKAN DATA MASTER KE FORM
    public function peminjaman()
    {
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();
        $peminjaman = Peminjaman::all();
        $akun = User::all();
        return view('peminjaman.riwayat',[
            "title" => "riwayat",
            "jenisbarang" => $jenisbarang,
            "jenisaset" => $datajenisaset,
            "dataasalperolehan" => $dataasalperolehan,
            "datasatuan" =>$datasatuan,
            "inputbarang"=> $inputbarang,
            "peminjaman"=> $peminjaman,
            "akun" => $akun
        ]);
       
    }

    //MENAMPILKAN DATA MASTER KE FORM
    public function pengajuan()
    {
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();
        // $akun = User::all();

        $akun = request()->user();
        $peminjaman = Peminjaman::where('users_id' , $akun->id)->get();
      

        return view('peminjaman.pengajuan',[
            "title" => "pengajuan",
            "jenisbarang" => $jenisbarang,
            "jenisaset" => $datajenisaset,
            "dataasalperolehan" => $dataasalperolehan,
            "datasatuan" =>$datasatuan,
            "inputbarang"=> $inputbarang,
            "peminjaman"=> $peminjaman,
            "akun"=> $akun
        ]);
       
    }

    //MENAMPILKAN DATA MASTER KE FORM
    public function riwayat()
    {
        $dataasalperolehan = DataAsalPerolehan::all();
        $datajenisaset = DataJenisAset::all();
        $jenisbarang = JenisBarang::all();
        $datasatuan = Satuan::all();
        $inputbarang = Barang::all();
        $akun = User::all();
        $peminjaman = Peminjaman::all();
        return view('peminjaman.peminjaman',[
            "title" => "pengajuan",
            "jenisbarang" => $jenisbarang,
            "jenisaset" => $datajenisaset,
            "dataasalperolehan" => $dataasalperolehan,
            "datasatuan" =>$datasatuan,
            "inputbarang"=> $inputbarang,
            "peminjaman"=> $peminjaman,
            "akun"=> $akun
        ]);
       
    }

    //INPUT PEMINJAMAN
    public function create(Request $request)
    {

        $peminjaman = \App\Models\Peminjaman::create($request->all());
        if($request->hasFile('surat_pinjam'))
        {
             $request->file('surat_pinjam')->move('surat/', $request->file('surat_pinjam')->getClientOriginalName());
             $peminjaman->surat_pinjam = $request->file('surat_pinjam')->getClientOriginalName();
             $peminjaman->save();    
         }
         return redirect('/peminjaman/form')->with('success', 'Data Berhasil Ditambahkan!');
            

    }

    public function status_setuju($id)
    {
        $datapinjam = Peminjaman::find($id);
        $datapinjam->status_konfirmasis_id = 2;
        $datapinjam->save();
        $databarang= Barang::where('id', $datapinjam->barangs_id)->first();
        $databarang->jumlah -= (int)$datapinjam->jumlah_pinjam;
        $databarang->save();
        return redirect('/peminjaman/riwayat')->with('success', 'Disetujui');
    }
    
    public function status_ditolak($id)
    {
        $datapinjam = Peminjaman::find($id);
        $datapinjam->status_konfirmasis_id = 3;
        $datapinjam->save();
        return redirect('/peminjaman/riwayat')->with('warning', 'Ditolak');
    }

}
