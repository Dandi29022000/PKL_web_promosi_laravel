@extends('frontend.layouts.app')
@section('content')

<div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
	<div class="container-fluid">
		<div class="section-title-6 text-center mb-50">
            <div class="flex">
                <h2>Global Kidz</h2>
                <p>Global Kidz adalah penyedia jasa sewa permainan No.1 di indonesia. Kami juga menyediakan jasa sewa games, game event, dan game activation.
                     Global Kidz senantiasa menjaga profesionalitasnya sejak berdirinya yaitu Tahun 2004.</p>

                <div class="social-links">
                    <a href="https://web.facebook.com/profile.php?id=100063912703503&locale=id_ID"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/Globalkidz_EO"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com/globalkidzeo?igshid=MzRlODBiNWFlZA=="><i class="fab fa-instagram"></i></a>
                    <a href="https://id.pinterest.com/gmgcoid/"><i class="fab fa-pinterest"></i></a>
                </div>

                <a href="" class="btn btn-primary">Learn More</a>
            </div>

            <div class="flex">
            <img src="{{ asset('img/About-Us.jpg') }}"  alt="">
            </div>
        </div>
    </div>
</div>

@endsection