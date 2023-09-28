@extends('frontend.layouts.app')
@section('content')

<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('img/2.jpg') }})">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>dengan berbagai macam permainan</h2>
            <ul>
                <li><a href="#">home</a></li>
                <li>Outbound</li>
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
                                <li><a href="/frontend-inflatables">Inflatables <span>{{ $jumlahData1 }}</a></li>
                                <li><a href="/frontend-interactive">Interactive <span>{{ $jumlahData2 }}</a></li>
                                <li><a href="/frontend-carnival">Carnival <span>{{ $jumlahData3 }}</a></li>
                                <li><a href="/frontend-water">Water <span>{{ $jumlahData4 }}</a></li>
                                <li><a href="/frontend-electrical">Electrical <span>{{ $jumlahData5 }}</a></li>
                                <li><a href="/frontend-funny">Funny <span>{{ $jumlahData6 }}</a></li>
                                <li><a href="/frontend-outbound">Outbound <span>{{ $jumlahData7 }}</a></li>
                                <li><a href="/frontend-entertainment">Entertainment <span>{{ $jumlahData8 }}</a></li>
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

                                <h4 class="text-center font-weight-bold m-4">OUTBOUND</h4>
                                <!-- grid view -->
                                <div class="row">
                                    
                                    @forelse ($Outbound as $Out)
                                        <!-- grid box -->
                                        <div class="col-md-6 col-xl-4">
                                            <div class="product-wrapper mb-30">
                                                <div class="product-img">
                                                    <a href="{{ url('/frontend-outbound') }}">
                                                        <img src="{{asset('storage/'.$Out->gambar)}}"  alt="{{ $Out->nama }}">
                                                    </a>
                                                    <span>hot</span>
                                                    <div class="product-action">
                                                        <a class="btn-primary text-center" href="{{ route('frontend.outbound-detail', $Out->id) }}">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-content text-center">
                                                    <h4><a href="{{ url('/frontend-outbound') }}">{{ $Out->nama }}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end -->
                                    @empty
                                        No product found!
                                    @endforelse
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
