<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entertainment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Entertainment = Entertainment::where([
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

        return view('admin/package/entertainment/index', compact('Entertainment'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package/entertainment/create');
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
            'gambar' => 'required'
        ]);

        $photo      = $request->file('gambar');
        $photo_name = time() . '_photo_' . $photo->getClientOriginalExtension();
        $photo_path = $photo->storeAs('fotoEntertainment', $photo_name, 'public');
        Entertainment::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $photo_path,
        ]);

        return redirect()->route('entertainment.index')
        ->with('success', 'Data Entertainment Berhasil Ditambahkan');
    }


    public function show($id)
    {
        // $Entertainment = Entertainment::find($id);
        // return view('admin/package/Entertainment/detail');
    }


    public function edit($id)
    {
        $Entertainment = Entertainment::find($id);
        // echo json_encode($Entertainment);die();
        return view('admin/package/entertainment/update', compact('Entertainment'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $update = Entertainment::find($id);
        $update->nama = $request->get('nama');

        if ($request->hasFile('gambar')) {
            $photo = $request->file('gambar');
            $photo_name = time() . '_photo_gambar.' . $photo->getClientOriginalExtension();
            $photo_path = $photo->storeAs('gambar', $photo_name, 'public');
            $update->gambar = $photo_path;
        }

        $update->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('entertainment.index')
            ->with('success', 'Entertainment Berhasil Diupdate');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Entertainment::find($id)->delete();
        return redirect('/admin/entertainment')
            ->with('success', 'Data Entertainment Berhasil Dihapus');
    }
}
