@extends('frontend.layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center mx-auto mt-5">
        <h4 class="text-center font-weight-bold m-4">ENTERTAINMENT</h4>
        @foreach($Entertainment as $Ent)
            <div class="card bg-light ml-2 mr-4 mb-4" style="width: 18rem;" >
                <img width="150px" src="{{asset('storage/'.$Ent->gambar)}}"  class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $Ent->nama }}</h5>
                    <i class="fas fa-star text-success"></i>
                    <i class="fas fa-star text-success"></i>
                    <i class="fas fa-star text-success"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="fas fa-star"></i>
                    <br>
                    <a href="{{ route('frontend.entertainment-detail', $Ent->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i> Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
