@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data Event</h1>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Input Data Event</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <label for="judul" class="col-md-4 col-form-label text-md-end">{{ __('Judul') }}</label>
                            <input class="form-control" name="judul" placeholder="Judul" type="text">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">{{ __('Deskripsi') }}</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" type="text"></textarea>
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal') }}</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="tanggal" placeholder="dd-mm-yyyy" value="{{ old('tanggal') }}" min="1950-01-01" max=<?php echo date('Y-m-d'); ?>
                                placeholder="Pilih Tanggal">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="jenis" class="col-md-4 col-form-label text-md-end">Jenis Event</label>
                            <input class="form-control" name="jenis" placeholder="Jenis Event" type="text">
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
                                <button type="button" class="btn btn-warning btn-block" onclick="kembaliEvent();">Cancel</button>
                            </div>
                        </div>
                    </form>
                        
                    <!-- Script -->
                    <script>
                        function kembaliEvent() {
                            window.location.href = "/admin/Event";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection