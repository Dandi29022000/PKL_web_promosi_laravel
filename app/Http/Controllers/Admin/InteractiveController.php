<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interactive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class InteractiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Interactive = Interactive::where([
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

        return view('admin/package/interactive/index', compact('Interactive'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package/interactive/create');
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
        $photo_path = $photo->storeAs('fotoInteractive', $photo_name, 'public');
        Interactive::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'ukuran' => $request->ukuran,
            'listrik' => $request->listrik,
            'usia' => $request->usia,
            'crew' => $request->crew,
            'gambar' => $photo_path,
        ]);

        return redirect()->route('interactive.index')
        ->with('success', 'Data Interactive Berhasil Ditambahkan');
    }


    public function show($id)
    {
        // $Interactive = Interactive::find($id);
        // return view('admin/package/Interactive/detail');
    }


    public function edit($id)
    {
        $Interactive = Interactive::find($id);
        // echo json_encode($Interactive);die();
        return view('admin/package/interactive/update', compact('Interactive'));
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

        $update = Interactive::find($id);
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
        return redirect()->route('interactive.index')
            ->with('success', 'Interactive Berhasil Diupdate');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Interactive::find($id)->delete();
        return redirect('/admin/interactive')
            ->with('success', 'Data Interactive Berhasil Dihapus');
    }
}
