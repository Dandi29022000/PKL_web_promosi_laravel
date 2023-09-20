@extends('frontend.layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{ url('frontend-dashboard') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <!-- <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('frontend-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div> -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                    @if(!empty($Sewa))
                    <p align="right">Tanggal Pesan : {{ $Sewa->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Permainan</th>
                                <th>Lama Sewa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($Sewa_details as $Sewa_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{asset('storage/'.$Sewa_detail->Inflatable->gambar)}}" width="200" alt="...">
                                </td>
                                <td>{{ $Sewa_detail->Inflatable->nama }}</td>
                                <td>{{ $Sewa_detail->lama_sewa }} hari</td>
                                <td>
                                    <form action="{{ url('frontend/check-out') }}/{{ $Sewa_detail->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="right"></td>
                                <td>
                                    <a href="{{ url('frontend/check-out/konfirmasi') }}" class="btn btn-success mt-3" onclick="return confirm('Anda yakin akan Check Out ?');">
                                        <i class="fa fa-shopping-cart"></i> Check Out
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection