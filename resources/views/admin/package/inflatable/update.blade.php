@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data Inflatable</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Update Data Inflatable</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('inflatable.update', $Inflatable->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Id') }}</label>
                            <input class="form-control" name="id" placeholder="Id" type="text" value="{{ $Inflatable->id }}" readonly>
                        </div>
                        <br>
                            <div class="input-group">
                                <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                                <input class="form-control" name="nama" placeholder="Name" type="text" value="{{ $Inflatable->nama }}">
                            </div>
                        <br>
                            <div class="input-group">
                                <label for="deskripsi" class="col-md-4 col-form-label text-md-end">{{ __('Deskripsi') }}</label>
                                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" rows="4" value="{{ $Inflatable->deskripsi }}"></textarea>
                            </div>
                        <br>
                        <div class="input-group">
                            <label for="ukuran" class="col-md-4 col-form-label text-md-end">{{ __('Ukuran') }}</label>
                            <input class="form-control" name="ukuran" placeholder="Ukuran" type="text" value="{{ $Inflatable->ukuran }}">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="listrik" class="col-md-4 col-form-label text-md-end">{{ __('Listrik') }}</label>
                            <input class="form-control" name="listrik" placeholder="Listrik" type="text" value="{{ $Inflatable->listrik }}">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="usia" class="col-md-4 col-form-label text-md-end">{{ __('Usia') }}</label>
                            <input class="form-control" name="usia" placeholder="Usia" type="text" value="{{ $Inflatable->usia }}">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="crew" class="col-md-4 col-form-label text-md-end">{{ __('Crew') }}</label>
                            <input class="form-control" name="crew" placeholder="Crew" type="text" value="{{ $Inflatable->crew }}">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="gambar" class="col-md-4 col-form-label text-md-end">{{ __('Masukkan Foto') }}</label>
                            <input class="form-control" name="gambar" type="file" value="{{ $Inflatable->gambar }}">
                            <img width="150px" src="{{asset('storage/'.$Inflatable->gambar)}}">
                        </div>
                        <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-warning btn-block" onclick="kembaliinflatable();">Cancel</button>
                                </div>
                            </div>
                    </form>

                    <script>
                        function kembaliinflatable() {
                            window.location.href = "/admin/inflatable";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection