<?php

namespace App\Http\Controllers;

use App\Models\Carnival;
use Illuminate\Http\Request;
use App\Models\Inflatable;
use App\Models\Interactive;
use App\Models\User;
use App\Models\Sewa;
use App\Models\SewaDetail;
use App\Models\Water;
use App\Models\Electrical;
use App\Models\Funny;
use App\Models\Outbound;
use App\Models\Entertainment;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $Inflatable = Inflatable::all();

        return view('frontend/package/dashboard', compact('Inflatable'));
    }

    public function inflatables(){
        $Inflatable = Inflatable::all();
       
        return view('frontend/package/inflatables', compact('Inflatable'));
    }

    public function inflatablesShow($id)
    {
        $Inflatable = Inflatable::where('id', $id)->first();
        return view('frontend/package/inflatables-detail', compact('Inflatable'));
    }

    public function inflatablesSewa(Request $request, $id)
    {
        $Inflatable = Inflatable::where('id', $id)->first();
        $tanggal = Carbon::now();

        //Cek Validasi
        $cek_validasi = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_validasi))
        {
            // Simpan ke database sewa
            $Sewa = new Sewa;
            $Sewa->user_id = Auth::user()->id;
            $Sewa->tanggal = $tanggal;
            $Sewa->status = 0;
            $Sewa->save();
        }

        // Simpan ke database sewa detail
        $SewaBaru = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Cek Sewa Detail
        $cek_sewa_detail = SewaDetail::where('permainan_id', $Inflatable->id)->where('sewa_id', $SewaBaru->id)->first();

        if(empty($cek_sewa_detail))
        {
            $SewaDetail = new SewaDetail;
            $SewaDetail->permainan_id = $Inflatable->id;
            $SewaDetail->sewa_id = $SewaBaru->id;
            $SewaDetail->lama_sewa = $request->lama_sewa;
            $SewaDetail->save();
        } 
        else
        {
            $sewa_detail = SewaDetail::where('permainan_id', $Inflatable->id)->where('sewa_id', $SewaBaru->id)->first();
            $sewa_detail->lama_sewa = $sewa_detail->lama_sewa + $request->lama_sewa;
            $sewa_detail->update();
        }

        Alert::success('Success', 'Sewa Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function interactive(){
        $Interactive = Interactive::all();
       
        return view('frontend/package/interactive', compact('Interactive'));
    }

    public function interactiveShow($id)
    {
        $Interactive = Interactive::where('id', $id)->first();
        return view('frontend/package/interactive-detail', compact('Interactive'));
    }

    public function interactiveSewa(Request $request, $id)
    {
        $Interactive = Interactive::where('id', $id)->first();
        $tanggal = Carbon::now();

        //Cek Validasi
        $cek_validasi = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_validasi))
        {
            // Simpan ke database sewa
            $Sewa = new Sewa;
            $Sewa->user_id = Auth::user()->id;
            $Sewa->tanggal = $tanggal;
            $Sewa->status = 0;
            $Sewa->save();
        }

        // Simpan ke database sewa detail
        $SewaBaru = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Cek Sewa Detail
        $cek_sewa_detail = SewaDetail::where('permainan_id', $Interactive->id)->where('sewa_id', $SewaBaru->id)->first();

        if(empty($cek_sewa_detail))
        {
            $SewaDetail = new SewaDetail;
            $SewaDetail->permainan_id = $Interactive->id;
            $SewaDetail->sewa_id = $SewaBaru->id;
            $SewaDetail->lama_sewa = $request->lama_sewa;
            $SewaDetail->save();
        } 
        else
        {
            $sewa_detail = SewaDetail::where('permainan_id', $Interactive->id)->where('sewa_id', $SewaBaru->id)->first();
            $sewa_detail->lama_sewa = $sewa_detail->lama_sewa + $request->lama_sewa;
            $sewa_detail->update();
        }

        Alert::success('Success', 'Sewa Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }    

    public function carnival(){
        $Carnival = Carnival::all();
       
        return view('frontend/package/carnival', compact('Carnival'));
    } 

    public function carnivalShow($id)
    {
        $Carnival = Carnival::where('id', $id)->first();
        return view('frontend/package/carnival-detail', compact('Carnival'));
    }

    public function carnivalSewa(Request $request, $id)
    {
        $Carnival = Carnival::where('id', $id)->first();
        $tanggal = Carbon::now();

        //Cek Validasi
        $cek_validasi = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_validasi))
        {
            // Simpan ke database sewa
            $Sewa = new Sewa;
            $Sewa->user_id = Auth::user()->id;
            $Sewa->tanggal = $tanggal;
            $Sewa->status = 0;
            $Sewa->save();
        }

        // Simpan ke database sewa detail
        $SewaBaru = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Cek Sewa Detail
        $cek_sewa_detail = SewaDetail::where('permainan_id', $Carnival->id)->where('sewa_id', $SewaBaru->id)->first();

        if(empty($cek_sewa_detail))
        {
            $SewaDetail = new SewaDetail;
            $SewaDetail->permainan_id = $Carnival->id;
            $SewaDetail->sewa_id = $SewaBaru->id;
            $SewaDetail->lama_sewa = $request->lama_sewa;
            $SewaDetail->save();
        } 
        else
        {
            $sewa_detail = SewaDetail::where('permainan_id', $Carnival->id)->where('sewa_id', $SewaBaru->id)->first();
            $sewa_detail->lama_sewa = $sewa_detail->lama_sewa + $request->lama_sewa;
            $sewa_detail->update();
        }

        Alert::success('Success', 'Sewa Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function water(){
        $Water = Water::all();
       
        return view('frontend/package/water', compact('Water'));
    }

    public function waterShow($id)
    {
        $Water = Water::where('id', $id)->first();
        return view('frontend/package/water-detail', compact('Water'));
    }

    public function waterSewa(Request $request, $id)
    {
        $Water = Water::where('id', $id)->first();
        $tanggal = Carbon::now();

        //Cek Validasi
        $cek_validasi = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_validasi))
        {
            // Simpan ke database sewa
            $Sewa = new Sewa;
            $Sewa->user_id = Auth::user()->id;
            $Sewa->tanggal = $tanggal;
            $Sewa->status = 0;
            $Sewa->save();
        }

        // Simpan ke database sewa detail
        $SewaBaru = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Cek Sewa Detail
        $cek_sewa_detail = SewaDetail::where('permainan_id', $Water->id)->where('sewa_id', $SewaBaru->id)->first();

        if(empty($cek_sewa_detail))
        {
            $SewaDetail = new SewaDetail;
            $SewaDetail->permainan_id = $Water->id;
            $SewaDetail->sewa_id = $SewaBaru->id;
            $SewaDetail->lama_sewa = $request->lama_sewa;
            $SewaDetail->save();
        } 
        else
        {
            $sewa_detail = SewaDetail::where('permainan_id', $Water->id)->where('sewa_id', $SewaBaru->id)->first();
            $sewa_detail->lama_sewa = $sewa_detail->lama_sewa + $request->lama_sewa;
            $sewa_detail->update();
        }

        Alert::success('Success', 'Sewa Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function electrical(){
        $Electrical = Electrical::all();
       
        return view('frontend/package/electrical', compact('Electrical'));
    }

    public function electricalShow($id)
    {
        $Electrical = Electrical::where('id', $id)->first();
        return view('frontend/package/electrical-detail', compact('Electrical'));
    }

    public function electricalSewa(Request $request, $id)
    {
        $Electrical = Electrical::where('id', $id)->first();
        $tanggal = Carbon::now();

        //Cek Validasi
        $cek_validasi = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_validasi))
        {
            // Simpan ke database sewa
            $Sewa = new Sewa;
            $Sewa->user_id = Auth::user()->id;
            $Sewa->tanggal = $tanggal;
            $Sewa->status = 0;
            $Sewa->save();
        }

        // Simpan ke database sewa detail
        $SewaBaru = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Cek Sewa Detail
        $cek_sewa_detail = SewaDetail::where('permainan_id', $Electrical->id)->where('sewa_id', $SewaBaru->id)->first();

        if(empty($cek_sewa_detail))
        {
            $SewaDetail = new SewaDetail;
            $SewaDetail->permainan_id = $Electrical->id;
            $SewaDetail->sewa_id = $SewaBaru->id;
            $SewaDetail->lama_sewa = $request->lama_sewa;
            $SewaDetail->save();
        } 
        else
        {
            $sewa_detail = SewaDetail::where('permainan_id', $Electrical->id)->where('sewa_id', $SewaBaru->id)->first();
            $sewa_detail->lama_sewa = $sewa_detail->lama_sewa + $request->lama_sewa;
            $sewa_detail->update();
        }

        Alert::success('Success', 'Sewa Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function funny(){
        $Funny = Funny::all();
       
        return view('frontend/package/funny', compact('Funny'));
    }

    public function funnyShow($id)
    {
        $Funny = Funny::where('id', $id)->first();
        return view('frontend/package/funny-detail', compact('Funny'));
    }

    public function funnySewa(Request $request, $id)
    {
        $Funny = Funny::where('id', $id)->first();
        $tanggal = Carbon::now();

        //Cek Validasi
        $cek_validasi = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_validasi))
        {
            // Simpan ke database sewa
            $Sewa = new Sewa;
            $Sewa->user_id = Auth::user()->id;
            $Sewa->tanggal = $tanggal;
            $Sewa->status = 0;
            $Sewa->save();
        }

        // Simpan ke database sewa detail
        $SewaBaru = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Cek Sewa Detail
        $cek_sewa_detail = SewaDetail::where('permainan_id', $Funny->id)->where('sewa_id', $SewaBaru->id)->first();

        if(empty($cek_sewa_detail))
        {
            $SewaDetail = new SewaDetail;
            $SewaDetail->permainan_id = $Funny->id;
            $SewaDetail->sewa_id = $SewaBaru->id;
            $SewaDetail->lama_sewa = $request->lama_sewa;
            $SewaDetail->save();
        } 
        else
        {
            $sewa_detail = SewaDetail::where('permainan_id', $Funny->id)->where('sewa_id', $SewaBaru->id)->first();
            $sewa_detail->lama_sewa = $sewa_detail->lama_sewa + $request->lama_sewa;
            $sewa_detail->update();
        }

        Alert::success('Success', 'Sewa Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function outbound(){
        $Outbound = Outbound::all();
       
        return view('frontend/package/outbound', compact('Outbound'));
    }

    public function outboundShow($id)
    {
        $Outbound = Outbound::where('id', $id)->first();
        return view('frontend/package/outbound-detail', compact('Outbound'));
    }

    public function outboundSewa(Request $request, $id)
    {
        $Outbound = Outbound::where('id', $id)->first();
        $tanggal = Carbon::now();

        //Cek Validasi
        $cek_validasi = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_validasi))
        {
            // Simpan ke database sewa
            $Sewa = new Sewa;
            $Sewa->user_id = Auth::user()->id;
            $Sewa->tanggal = $tanggal;
            $Sewa->status = 0;
            $Sewa->save();
        }

        // Simpan ke database sewa detail
        $SewaBaru = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Cek Sewa Detail
        $cek_sewa_detail = SewaDetail::where('permainan_id', $Outbound->id)->where('sewa_id', $SewaBaru->id)->first();

        if(empty($cek_sewa_detail))
        {
            $SewaDetail = new SewaDetail;
            $SewaDetail->permainan_id = $Outbound->id;
            $SewaDetail->sewa_id = $SewaBaru->id;
            $SewaDetail->lama_sewa = $request->lama_sewa;
            $SewaDetail->save();
        } 
        else
        {
            $sewa_detail = SewaDetail::where('permainan_id', $Outbound->id)->where('sewa_id', $SewaBaru->id)->first();
            $sewa_detail->lama_sewa = $sewa_detail->lama_sewa + $request->lama_sewa;
            $sewa_detail->update();
        }

        Alert::success('Success', 'Sewa Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function entertainment(){
        $Entertainment = Entertainment::all();
       
        return view('frontend/package/entertainment', compact('Entertainment'));
    }

    public function entertainmentShow($id)
    {
        $Entertainment = Entertainment::where('id', $id)->first();
        return view('frontend/package/entertainment-detail', compact('Entertainment'));
    }

    public function entertainmentSewa(Request $request, $id)
    {
        $Entertainment = Entertainment::where('id', $id)->first();
        $tanggal = Carbon::now();

        //Cek Validasi
        $cek_validasi = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($cek_validasi))
        {
            // Simpan ke database sewa
            $Sewa = new Sewa;
            $Sewa->user_id = Auth::user()->id;
            $Sewa->tanggal = $tanggal;
            $Sewa->status = 0;
            $Sewa->save();
        }

        // Simpan ke database sewa detail
        $SewaBaru = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();

        //Cek Sewa Detail
        $cek_sewa_detail = SewaDetail::where('permainan_id', $Entertainment->id)->where('sewa_id', $SewaBaru->id)->first();

        if(empty($cek_sewa_detail))
        {
            $SewaDetail = new SewaDetail;
            $SewaDetail->permainan_id = $Entertainment->id;
            $SewaDetail->sewa_id = $SewaBaru->id;
            $SewaDetail->lama_sewa = $request->lama_sewa;
            $SewaDetail->save();
        } 
        else
        {
            $sewa_detail = SewaDetail::where('permainan_id', $Entertainment->id)->where('sewa_id', $SewaBaru->id)->first();
            $sewa_detail->lama_sewa = $sewa_detail->lama_sewa + $request->lama_sewa;
            $sewa_detail->update();
        }

        Alert::success('Success', 'Sewa Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function check_out()
    {
        $Sewa = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();
 	$Sewa_details = [];
        if(!empty($Sewa))
        {
            $Sewa_details = SewaDetail::where('sewa_id', $Sewa->id)->get();

        }
        
        return view('frontend/package/pesan/check-out', compact('Sewa', 'Sewa_details'));
    }

    public function delete($id)
    {
        $Sewa_detail = SewaDetail::where('id', $id)->first();

        $Sewa_detail->delete();

        Alert::error('Deleted', 'Sewa Permainan Berhasil Dihapus!');
        return redirect()->route('frontend.check-out');
    }

    public function konfirmasi()
    {
        $Sewa = Sewa::where('user_id', Auth::user()->id)->where('status',0)->first();
        $Sewa_id = $Sewa->id;
        $Sewa->status = 1;
        $Sewa->update();

        $Sewa_details = SewaDetail::where('sewa_id', $Sewa_id)->get();
        foreach ($Sewa_details as $Sewa_detail) {
            $Inflatable = Inflatable::where('id', $Sewa_detail->permainan_id)->first();
            $Inflatable->update();
        }

        Alert::success('Success', 'Berhasil Check Out Silahkan Lanjutkan Proses Pembayaran');
        return redirect()->route('frontend.check-out');

    }

    public function konfirmasiWhatsApp()
    {
        // Mendapatkan nilai-nilai yang ingin Anda sertakan dalam pesan
        $Sewa = Sewa::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $Sewa_details = SewaDetail::where('sewa_id', $Sewa->id)->get();
        
        $tanggalPesan = $Sewa->tanggal;
        $pesan = "Halo, saya ingin memesan permainan:\n\n";
        
        foreach ($Sewa_details as $Sewa_detail) {
            $Inflatable = Inflatable::where('id', $Sewa_detail->permainan_id)->first();
            $namaPermainan = $Inflatable->nama;
            $lamaSewa = $Sewa_detail->lama_sewa . " hari";
            
            $pesan .= "Tanggal Pesan: $tanggalPesan, Nama Permainan: $namaPermainan\n,Lama Sewa: $lamaSewa\n";
        }

        // Membuat link WhatsApp dengan pesan yang sesuai
        $linkWhatsApp = "https://api.whatsapp.com/send?phone=6287846184617&text=" . urlencode($pesan);

        // Mengarahkan pengguna ke link WhatsApp
        return redirect($linkWhatsApp);
    }

}
