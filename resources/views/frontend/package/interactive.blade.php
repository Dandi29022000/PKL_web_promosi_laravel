@extends('frontend.layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center mx-auto mt-5">
        <h4 class="text-center font-weight-bold m-4">INTERACTIVE</h4>
        @foreach($Interactive as $Int)
            <div class="card bg-light ml-2 mr-4 mb-4" style="width: 18rem;" >
                <img width="150px" src="{{asset('storage/'.$Int->gambar)}}"  class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $Int->nama }}</h5>
                    <i class="fas fa-star text-success"></i>
                    <i class="fas fa-star text-success"></i>
                    <i class="fas fa-star text-success"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="fas fa-star"></i>
                    <br>
                    <a href="{{ route('frontend.interactive-detail', $Int->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i> Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
