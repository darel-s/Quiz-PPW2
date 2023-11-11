<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buku;  
use App\Models\Gallery;
use Intervention\Image\Facades\Image;

class ControllerBuku extends Controller
{


    
    public function index(){
        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage()-1);
        $total_harga = Buku::sum('harga');
        return view('buku.index', compact('data_buku', 'no', 'total_harga','jumlah_buku'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $batas = 5;
        
        $data_buku = Buku::where('judul', 'like', '%' . $search . '%')
            ->orWhere('penulis', 'like', '%' . $search . '%')
            ->orWhere('harga', 'like', '%' . $search . '%')
            ->orWhere('tgl_terbit', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate($batas);

        $no = $batas * ($data_buku->currentPage() - 1);
        $total_harga = Buku::sum('harga');
        $jumlah_buku = $data_buku->count();

        return view('buku.index', compact('data_buku', 'no', 'total_harga', 'jumlah_buku'));
    }

    public function create() {
        return view('buku.create');
    }

    public function store(Request $request) {
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit
        ]);
        return redirect('/buku');
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }

    public function edit($id) {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
{
    // Validate the request...
    $request->validate([
        'judul' => 'required',
        'penulis' => 'required',
        'harga' => 'required',
        'tgl_terbit' => 'required',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $buku = Buku::findOrFail($id);

    // Check if a file was uploaded
    if ($request->hasFile('file')) {
        $filename = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('public/images', $filename);
        $buku->filepath = 'storage/images/' . $filename;
    }

    // Check if gallery files were uploaded
    if ($request->file('gallery')) {
        foreach($request->file('gallery') as $key => $file) {
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $gallery = Gallery::create([
                'nama_galeri'   => $fileName,
                'path'          => '/storage/' . $filePath,
                'foto'          => $fileName,
                'buku_id'       => $id
            ]);
        }
    }

    $buku->judul = $request->judul;
    $buku->penulis = $request->penulis;
    $buku->harga = $request->harga;
    $buku->tgl_terbit = $request->tgl_terbit;

    $buku->save();

    return redirect('/buku')->with('message', 'Buku berhasil diupdate');
}
}
