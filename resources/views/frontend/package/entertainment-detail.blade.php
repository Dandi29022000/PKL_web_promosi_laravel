@extends('frontend.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row justify-content-center">
		<!-- <div class="col-md-8 mt-2">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('frontend-dashboard') }}">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ $Entertainment->nama }}</li>
				</ol>
			</nav>
		</div> -->

		<div class="col-md-8">
			
			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card card-primary card-outline">
					<h1 class="h3 mb-2 text-gray-800 text-center font-weight-bold m-4">Detail Produk</h1>
					<div class="card-body box-profile  ml-4 mr-4">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle" width="400px" src="{{asset('storage/'.$Entertainment->gambar)}}" alt="User profile picture">
						</div>
						<br>

						<form method="post" action="{{ route('frontend.entertainment-sewa', $Entertainment->id) }}">
							@csrf
							<h3 class="profile-username text-center">{{ $Entertainment->nama }}</h3>

							<p class="text-muted text-justify">{{ $Entertainment->deskripsi }}</p>

							<div class="card-body">
								<div class="input-group mb-4">
									<label for="lama_sewa" class="col-md-6 col-form-label">{{ __('Lama Sewa') }}</label>
									<input class="form-control" name="lama_sewa" placeholder="Lama Sewa" type="text" required=""><p class="ml-2 mt-1">Hari</p>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<a href="{{ route('frontend.entertainment') }}" class="btn btn-warning btn-block"><b>Kembali</b></a>
								</div>
								<div class="col-md-6">
									<button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-cart-shopping"></i><b> Masukkan Keranjang</b></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection