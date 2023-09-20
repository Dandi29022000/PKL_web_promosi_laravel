@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data Outbound</h1>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Input Data Outbound</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('outbound.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                            <input class="form-control" name="nama" placeholder="Name" type="text">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">{{ __('Deskripsi') }}</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" rows="4"></textarea>
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="gambar" class="col-md-4 col-form-label text-md-end">{{ __('Masukkan Foto') }}</label>
                            <input class="form-control" name="gambar" type="file" value="{{ old('gambar') }}">
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-warning btn-block" onclick="kembaliOutbound();">Cancel</button>
                            </div>
                        </div>
                    </form>
                        
                    <!-- Script -->
                    <script>
                        function kembaliOutbound() {
                            window.location.href = "/admin/outbound";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection