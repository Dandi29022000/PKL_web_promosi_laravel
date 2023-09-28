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
use App\Models\Event;
use App\Models\Slide;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $Slide = Slide::active()->orderBy('position', 'ASC')->get();

        return view('frontend/package/dashboard', compact('Slide'));
    }

    public function about() {
        return view('frontend/package/about-us');
    }

    public function event() {
        $Event = Event::all();
        $Inflatable = Inflatable::all();
        $jumlahData1 = $Inflatable->count();

        $Interactive = Interactive::all(); 
        $jumlahData2 = $Interactive->count(); 
        
        $Carnival = Carnival::all();
        $jumlahData3 = $Carnival->count();

        $Water = Water::all();
        $jumlahData4 = $Water->count();

        $Electrical = Electrical::all();
        $jumlahData5 = $Electrical->count();

        $Funny = Funny::all();
        $jumlahData6 = $Funny->count();

        $Outbound = Outbound::all();
        $jumlahData7 = $Outbound->count();

        $Entertainment = Entertainment::all();
        $jumlahData8 = $Entertainment->count();

        return view('frontend/package/event', compact('Event','jumlahData1', 'jumlahData2','jumlahData3'
    , 'jumlahData4', 'jumlahData5', 'jumlahData6', 'jumlahData7', 'jumlahData8'));
    }
    

    public function inflatables(){
        $Inflatable = Inflatable::all();
        $jumlahData1 = $Inflatable->count();

        $Interactive = Interactive::all(); 
        $jumlahData2 = $Interactive->count(); 
        
        $Carnival = Carnival::all();
        $jumlahData3 = $Carnival->count();

        $Water = Water::all();
        $jumlahData4 = $Water->count();

        $Electrical = Electrical::all();
        $jumlahData5 = $Electrical->count();

        $Funny = Funny::all();
        $jumlahData6 = $Funny->count();

        $Outbound = Outbound::all();
        $jumlahData7 = $Outbound->count();

        $Entertainment = Entertainment::all();
        $jumlahData8 = $Entertainment->count();
       
        return view('frontend/package/inflatables', compact('Inflatable', 'jumlahData1', 'jumlahData2','jumlahData3'
        , 'jumlahData4', 'jumlahData5', 'jumlahData6', 'jumlahData7', 'jumlahData8'));
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

        Alert::success('Success', 'Permainan Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function interactive(){
        $Inflatable = Inflatable::all();
        $jumlahData1 = $Inflatable->count();

        $Interactive = Interactive::all(); 
        $jumlahData2 = $Interactive->count(); 
        
        $Carnival = Carnival::all();
        $jumlahData3 = $Carnival->count();

        $Water = Water::all();
        $jumlahData4 = $Water->count();

        $Electrical = Electrical::all();
        $jumlahData5 = $Electrical->count();

        $Funny = Funny::all();
        $jumlahData6 = $Funny->count();

        $Outbound = Outbound::all();
        $jumlahData7 = $Outbound->count();

        $Entertainment = Entertainment::all();
        $jumlahData8 = $Entertainment->count();
       
        return view('frontend/package/interactive', compact('Interactive', 'jumlahData1', 'jumlahData2','jumlahData3'
        , 'jumlahData4', 'jumlahData5', 'jumlahData6', 'jumlahData7', 'jumlahData8'));
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

        Alert::success('Success', 'Permainan Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }    

    public function carnival(){
        $Inflatable = Inflatable::all();
        $jumlahData1 = $Inflatable->count();

        $Interactive = Interactive::all(); 
        $jumlahData2 = $Interactive->count(); 
        
        $Carnival = Carnival::all();
        $jumlahData3 = $Carnival->count();

        $Water = Water::all();
        $jumlahData4 = $Water->count();

        $Electrical = Electrical::all();
        $jumlahData5 = $Electrical->count();

        $Funny = Funny::all();
        $jumlahData6 = $Funny->count();

        $Outbound = Outbound::all();
        $jumlahData7 = $Outbound->count();

        $Entertainment = Entertainment::all();
        $jumlahData8 = $Entertainment->count();
       
        return view('frontend/package/carnival', compact('Carnival', 'jumlahData1', 'jumlahData2','jumlahData3'
        , 'jumlahData4', 'jumlahData5', 'jumlahData6', 'jumlahData7', 'jumlahData8'));
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

        Alert::success('Success', 'Permainan Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function water(){
        $Inflatable = Inflatable::all();
        $jumlahData1 = $Inflatable->count();

        $Interactive = Interactive::all(); 
        $jumlahData2 = $Interactive->count(); 
        
        $Carnival = Carnival::all();
        $jumlahData3 = $Carnival->count();

        $Water = Water::all();
        $jumlahData4 = $Water->count();

        $Electrical = Electrical::all();
        $jumlahData5 = $Electrical->count();

        $Funny = Funny::all();
        $jumlahData6 = $Funny->count();

        $Outbound = Outbound::all();
        $jumlahData7 = $Outbound->count();

        $Entertainment = Entertainment::all();
        $jumlahData8 = $Entertainment->count();
       
        return view('frontend/package/water', compact('Water', 'jumlahData1', 'jumlahData2','jumlahData3'
        , 'jumlahData4', 'jumlahData5', 'jumlahData6', 'jumlahData7', 'jumlahData8'));
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

        Alert::success('Success', 'Permainan Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function electrical(){
        $Inflatable = Inflatable::all();
        $jumlahData1 = $Inflatable->count();

        $Interactive = Interactive::all(); 
        $jumlahData2 = $Interactive->count(); 
        
        $Carnival = Carnival::all();
        $jumlahData3 = $Carnival->count();

        $Water = Water::all();
        $jumlahData4 = $Water->count();

        $Electrical = Electrical::all();
        $jumlahData5 = $Electrical->count();

        $Funny = Funny::all();
        $jumlahData6 = $Funny->count();

        $Outbound = Outbound::all();
        $jumlahData7 = $Outbound->count();

        $Entertainment = Entertainment::all();
        $jumlahData8 = $Entertainment->count();
       
        return view('frontend/package/electrical', compact('Electrical', 'jumlahData1', 'jumlahData2','jumlahData3'
        , 'jumlahData4', 'jumlahData5', 'jumlahData6', 'jumlahData7', 'jumlahData8'));
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

        Alert::success('Success', 'Permainan Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function funny(){
        $Inflatable = Inflatable::all();
        $jumlahData1 = $Inflatable->count();

        $Interactive = Interactive::all(); 
        $jumlahData2 = $Interactive->count(); 
        
        $Carnival = Carnival::all();
        $jumlahData3 = $Carnival->count();

        $Water = Water::all();
        $jumlahData4 = $Water->count();

        $Electrical = Electrical::all();
        $jumlahData5 = $Electrical->count();

        $Funny = Funny::all();
        $jumlahData6 = $Funny->count();

        $Outbound = Outbound::all();
        $jumlahData7 = $Outbound->count();

        $Entertainment = Entertainment::all();
        $jumlahData8 = $Entertainment->count();
       
        return view('frontend/package/funny', compact('Funny', 'jumlahData1', 'jumlahData2','jumlahData3'
        , 'jumlahData4', 'jumlahData5', 'jumlahData6', 'jumlahData7', 'jumlahData8'));
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

        Alert::success('Success', 'Permainan Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function outbound(){
        $Inflatable = Inflatable::all();
        $jumlahData1 = $Inflatable->count();

        $Interactive = Interactive::all(); 
        $jumlahData2 = $Interactive->count(); 
        
        $Carnival = Carnival::all();
        $jumlahData3 = $Carnival->count();

        $Water = Water::all();
        $jumlahData4 = $Water->count();

        $Electrical = Electrical::all();
        $jumlahData5 = $Electrical->count();

        $Funny = Funny::all();
        $jumlahData6 = $Funny->count();

        $Outbound = Outbound::all();
        $jumlahData7 = $Outbound->count();

        $Entertainment = Entertainment::all();
        $jumlahData8 = $Entertainment->count();
       
        return view('frontend/package/outbound', compact('Outbound', 'jumlahData1', 'jumlahData2','jumlahData3'
        , 'jumlahData4', 'jumlahData5', 'jumlahData6', 'jumlahData7', 'jumlahData8'));
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

        Alert::success('Success', 'Permainan Berhasil Masuk Keranjang!');
        return redirect()->route('frontend.dashboard');
    }

    public function entertainment(){
        $Inflatable = Inflatable::all();
        $jumlahData1 = $Inflatable->count();

        $Interactive = Interactive::all(); 
        $jumlahData2 = $Interactive->count(); 
        
        $Carnival = Carnival::all();
        $jumlahData3 = $Carnival->count();

        $Water = Water::all();
        $jumlahData4 = $Water->count();

        $Electrical = Electrical::all();
        $jumlahData5 = $Electrical->count();

        $Funny = Funny::all();
        $jumlahData6 = $Funny->count();

        $Outbound = Outbound::all();
        $jumlahData7 = $Outbound->count();

        $Entertainment = Entertainment::all();
        $jumlahData8 = $Entertainment->count();
       
        return view('frontend/package/entertainment', compact('Entertainment', 'jumlahData1', 'jumlahData2','jumlahData3'
        , 'jumlahData4', 'jumlahData5', 'jumlahData6', 'jumlahData7', 'jumlahData8'));
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

        Alert::success('Success', 'Permainan Berhasil Masuk Keranjang!');
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
        $Sewa_id = $Sewa->id;
        $Sewa->status = 1;
        $Sewa->update();

        $Sewa_details = SewaDetail::where('sewa_id', $Sewa_id)->get();
        
        $tanggalPesan = $Sewa->tanggal;

        // Mendapatkan nama pengguna yang sedang login
        $namaUser = Auth::user()->name;
        $pesan = "Halo, saya $namaUser! ingin memesan permainan:\n\n";
        
        foreach ($Sewa_details as $Sewa_detail) {
            $Inflatable = Inflatable::where('id', $Sewa_detail->permainan_id)->first();
            $namaPermainan = $Inflatable->nama;
            $lamaSewa = $Sewa_detail->lama_sewa . " hari";
            
            $pesan .= "Tanggal Pesan: $tanggalPesan, Nama Permainan: $namaPermainan\n,Lama Sewa: $lamaSewa\n";
            $Inflatable->update();
        }

        // Membuat link WhatsApp dengan pesan yang sesuai
        $linkWhatsApp = "https://api.whatsapp.com/send?phone=6287846184617&text=" . urlencode($pesan);

        // Mengarahkan pengguna ke link WhatsApp
        return redirect($linkWhatsApp);
    }

}
