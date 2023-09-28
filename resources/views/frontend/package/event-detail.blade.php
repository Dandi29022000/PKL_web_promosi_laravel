@extends('frontend.layouts.app')
@section('content')

<div
    class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url({{ asset('img/2.jpg') }})"
>
<div class="container">
    <div class="row same-height justify-content-center">
        <div class="col-md-6">
        <div class="post-entry text-center">
            <h1 class="mb-4">{{ $Event->judul }}</h1>
        </div>
        </div>
    </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row blog-entries element-animate">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="post-content-body">
                    <p>
                        {{ $Event->deskripsi}}
                    </p>
                    <div class="row my-4">
                    <div class="col-md-12 mb-4">
                        <img
                        src="{{ Storage::url($Event->gambar) }}"
                        alt="Image placeholder"
                        class="img-fluid rounded"
                        />
                    </div>
                    </div>
                </div>
            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Catalogue</h3>
                    <ul class="categories">
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
                <!-- END sidebar-box -->
            </div>
            <!-- END sidebar -->
        </div>
    </div>
</section>

@endsection