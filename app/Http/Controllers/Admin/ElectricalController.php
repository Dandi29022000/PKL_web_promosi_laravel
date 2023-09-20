<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Electrical;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ElectricalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Electrical = Electrical::where([
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nama', 'LIKE', '%' . $term . '%')
                        ->orWhere('deskripsi', 'LIKE', '%' . $term . '%')
                        ->orWhere('usia', 'LIKE', '%' . $term . '%')
                        ->orWhere('ukuran', 'LIKE', '%' . $term . '%')
                        ->orWhere('crew', 'LIKE', '%' . $term . '%')
                        ->orWhere('listrik', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(10);

        return view('admin/package/electrical/index', compact('Electrical'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package/electrical/create');
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'ukuran' => 'required',
            'listrik' => 'required',
            'usia' => 'required',
            'crew' => 'required',
            'gambar' => 'required'
        ]);

        $photo      = $request->file('gambar');
        $photo_name = time() . '_photo_' . $photo->getClientOriginalExtension();
        $photo_path = $photo->storeAs('fotoElectrical', $photo_name, 'public');
        Electrical::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'ukuran' => $request->ukuran,
            'listrik' => $request->listrik,
            'usia' => $request->usia,
            'crew' => $request->crew,
            'gambar' => $photo_path,
        ]);

        return redirect()->route('electrical.index')
        ->with('success', 'Data Electrical Berhasil Ditambahkan');
    }


    public function show($id)
    {
        // $Electrical = Electrical::find($id);
        // return view('admin/package/Electrical/detail');
    }


    public function edit($id)
    {
        $Electrical = Electrical::find($id);
        // echo json_encode($Electrical);die();
        return view('admin/package/electrical/update', compact('Electrical'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'ukuran' => 'required',
            'listrik' => 'required',
            'usia' => 'required',
            'crew' => 'required',
        ]);

        $update = Electrical::find($id);
        $update->nama = $request->get('nama');
        $update->ukuran = $request->get('ukuran');
        $update->listrik = $request->get('listrik');
        $update->usia = $request->get('usia');
        $update->crew = $request->get('crew');

        if ($request->hasFile('gambar')) {
            $photo = $request->file('gambar');
            $photo_name = time() . '_photo_gambar.' . $photo->getClientOriginalExtension();
            $photo_path = $photo->storeAs('gambar', $photo_name, 'public');
            $update->gambar = $photo_path;
        }

        $update->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('electrical.index')
            ->with('success', 'Electrical Berhasil Diupdate');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Electrical::find($id)->delete();
        return redirect('/admin/electrical')
            ->with('success', 'Data Electrical Berhasil Dihapus');
    }
}
