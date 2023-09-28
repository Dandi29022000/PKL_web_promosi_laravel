<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Event = Event::where([
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('judul', 'LIKE', '%' . $term . '%')
                        ->orWhere('deskripsi', 'LIKE', '%' . $term . '%')
                        ->orWhere('tanggal', 'LIKE', '%' . $term . '%')
                        ->orWhere('jenis', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(10);

        return view('admin/package/event/index', compact('Event'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package/event/create');
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'gambar' => 'required'
        ]);

        $photo      = $request->file('gambar');
        $photo_name = time() . '_photo_' . $photo->getClientOriginalExtension();
        $photo_path = $photo->storeAs('fotoEvent', $photo_name, 'public');
        Event::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'gambar' => $photo_path,
        ]);

        return redirect()->route('event.index')
        ->with('success', 'Data Event Berhasil Ditambahkan');
    }


    public function show($id)
    {
        // $Event = Event::find($id);
        // return view('admin/package/Event/detail');
    }


    public function edit($id)
    {
        $Event = Event::find($id);
        // echo json_encode($Event);die();
        return view('admin/package/event/update', compact('Event'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'gambar' => 'required'
        ]);

        $update = Event::find($id);
        $update->judul = $request->get('judul');
        $update->deskripsi = $request->get('deskripsi');
        $update->tanggal = $request->get('tanggal');
        $update->jenis = $request->get('jenis');

        if ($request->hasFile('gambar')) {
            $photo = $request->file('gambar');
            $photo_name = time() . '_photo_gambar.' . $photo->getClientOriginalExtension();
            $photo_path = $photo->storeAs('gambar', $photo_name, 'public');
            $update->gambar = $photo_path;
        }

        $update->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('event.index')
            ->with('success', 'Event Berhasil Diupdate');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Event::find($id)->delete();
        return redirect('/admin/event')
            ->with('success', 'Data Event Berhasil Dihapus');
    }
}
