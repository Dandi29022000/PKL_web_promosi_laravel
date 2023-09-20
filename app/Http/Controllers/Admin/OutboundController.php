<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outbound;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class OutboundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Outbound = Outbound::where([
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nama', 'LIKE', '%' . $term . '%')
                        ->orWhere('deskripsi', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(10);

        return view('admin/package/outbound/index', compact('Outbound'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package/outbound/create');
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
        $photo_path = $photo->storeAs('fotoOutbound', $photo_name, 'public');
        Outbound::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $photo_path,
        ]);

        return redirect()->route('outbound.index')
        ->with('success', 'Data Outbound Berhasil Ditambahkan');
    }


    public function show($id)
    {
        // $Outbound = Outbound::find($id);
        // return view('admin/package/Outbound/detail');
    }


    public function edit($id)
    {
        $Outbound = Outbound::find($id);
        // echo json_encode($Outbound);die();
        return view('admin/package/outbound/update', compact('Outbound'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $update = Outbound::find($id);
        $update->nama = $request->get('nama');

        if ($request->hasFile('gambar')) {
            $photo = $request->file('gambar');
            $photo_name = time() . '_photo_gambar.' . $photo->getClientOriginalExtension();
            $photo_path = $photo->storeAs('gambar', $photo_name, 'public');
            $update->gambar = $photo_path;
        }

        $update->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('outbound.index')
            ->with('success', 'Outbound Berhasil Diupdate');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Outbound::find($id)->delete();
        return redirect('/admin/outbound')
            ->with('success', 'Data Outbound Berhasil Dihapus');
    }
}