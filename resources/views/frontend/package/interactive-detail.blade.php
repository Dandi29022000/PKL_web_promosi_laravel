@extends('frontend.layouts.app')
@section('content')


<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('img/1.jpg') }})">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
			<h2>dengan berbagai macam permainan</h2>
            <ul>
                <li><a href="#">home</a></li>
                <li>Interactives</li>
            </ul>
        </div>
    </div>
</div>

<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
					<!-- sidebar -->
                    <div class="shop-sidebar mr-50">
                        <div class="sidebar-widget mb-45">
                            <h3 class="sidebar-title">Catalogue</h3>
                            <div class="sidebar-categories">
                                <ul>
                                    <li><a href="/frontend-inflatables">Inflatables</a></li>
                                    <li><a href="/frontend-interactive">Interactive</a></li>
                                    <li><a href="/frontend-carnival">Carnival</a></li>
                                    <li><a href="/frontend-water">Water</a></li>
                                    <li><a href="/frontend-electrical">Electrical</a></li>
                                    <li><a href="/frontend-funny">Funny</a></li>
                                    <li><a href="/frontend-outbound">Outbound</a></li>
                                    <li><a href="/frontend-entertainment">Entertainment</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
				</div>
				<div class="col-lg-9">
					<div class="shop-product-wrapper res-xl">
						<div class="shop-bar-area">
							<div class="shop-product-content tab-content">
								<div id="grid-sidebar3" class="tab-pane fade active show">

									<div class="card card-primary card-outline">
										<h1 class="h3 mb-2 text-gray-800 text-center font-weight-bold m-4">Detail Produk</h1>
										<div class="card-body box-profile  ml-4 mr-4">
											<div class="text-center">
												<img class="profile-user-img img-fluid img-circle" width="400px" src="{{asset('storage/'.$Interactive->gambar)}}" alt="User profile picture">
											</div>
											<br>

											<form method="post" action="{{ route('frontend.interactive-sewa', $Interactive->id) }}">
												@csrf
												<h3 class="profile-username text-center">{{ $Interactive->nama }}</h3>

												<p class="text-muted text-justify">{{ $Interactive->deskripsi }}</p>

												<ul class="list-group list-group-unbordered mb-4">
													<li class="list-group-item">
														<b>Ukuran</b> <b class="float-right">{{ $Interactive->ukuran }}</b>
													</li>
													<li class="list-group-item">
														<b>Listrik</b> <b class="float-right">{{ $Interactive->listrik }}</b>
													</li>
													<li class="list-group-item">
														<b>Usia</b> <b class="float-right">{{ $Interactive->usia }}</b>
													</li>
													<li class="list-group-item">
														<b>Crew</b> <b class="float-right">{{ $Interactive->crew }}</b>
													</li>
												</ul>

												<div class="card-body">
													<div class="input-group mb-4">
														<label for="lama_sewa" class="col-md-6 col-form-label">{{ __('Lama Sewa') }}</label>
														<input class="form-control" name="lama_sewa" placeholder="Lama Sewa" type="text" required=""><p class="ml-2 mt-1">Hari</p>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<a href="{{ route('frontend.interactive') }}" class="btn btn-warning btn-block"><b>Kembali</b></a>
													</div>
													<div class="col-md-6">
														<button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-cart-shopping"></i><b> Masukkan Keranjang</b></button>
													</div>
												</div>
											</form>
										</div>
									</div>
                                <!-- end -->
								</div>
								
							</div>
						</div>
					</div>
					<div class="mt-50 text-center">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection