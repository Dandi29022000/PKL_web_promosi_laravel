@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data Water</h1>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Input Data Water</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('water.store') }}" enctype="multipart/form-data">
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
                            <label for="ukuran" class="col-md-4 col-form-label text-md-end">{{ __('Ukuran') }}</label>
                            <input class="form-control" name="ukuran" placeholder="Ukuran" type="text">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="listrik" class="col-md-4 col-form-label text-md-end">{{ __('Listrik') }}</label>
                            <input class="form-control" name="listrik" placeholder="Listrik" type="text">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="usia" class="col-md-4 col-form-label text-md-end">{{ __('Usia') }}</label>
                            <input class="form-control" name="usia" placeholder="Usia" type="text">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="crew" class="col-md-4 col-form-label text-md-end">{{ __('Crew') }}</label>
                            <input class="form-control" name="crew" placeholder="Crew" type="text">
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
                                <button type="button" class="btn btn-warning btn-block" onclick="kembaliWater();">Cancel</button>
                            </div>
                        </div>
                    </form>
                        
                    <!-- Script -->
                    <script>
                        function kembaliWater() {
                            window.location.href = "/admin/water";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection