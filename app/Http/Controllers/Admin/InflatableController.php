<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inflatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class InflatableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Inflatable = Inflatable::where([
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

        return view('admin/package/inflatable/index', compact('Inflatable'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package/inflatable/create');
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
        $photo_path = $photo->storeAs('fotoInflatable', $photo_name, 'public');
        Inflatable::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'ukuran' => $request->ukuran,
            'listrik' => $request->listrik,
            'usia' => $request->usia,
            'crew' => $request->crew,
            'gambar' => $photo_path,
        ]);

        return redirect()->route('inflatable.index')
        ->with('success', 'Data Inflatable Berhasil Ditambahkan');
    }


    // public function inflatablesShow()
    // {
    //     $Inflatable = Inflatable::all();
    //     return view('admin/package/Inflatable/inflatables-detail', compact('Inflatable'));
    // }


    public function edit($id)
    {
        $Inflatable = Inflatable::find($id);
        // echo json_encode($Inflatable);die();
        return view('admin/package/inflatable/update', compact('Inflatable'));
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

        $update = Inflatable::find($id);
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
        return redirect()->route('inflatable.index')
            ->with('success', 'Inflatable Berhasil Diupdate');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Inflatable::find($id)->delete();
        return redirect('/admin/inflatable')
            ->with('success', 'Data Inflatable Berhasil Dihapus');
    }
}
