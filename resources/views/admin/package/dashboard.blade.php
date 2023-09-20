@extends('admin.layouts.app')
@section('content')

<div class="content">
  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">About This System</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                src="{{ asset('img/Global-Kidz.jpg') }}">
                        </div>
                        <p>Global Kidz adalah penyedia jasa sewa permainan No.1 di indonesia. Kami juga menyediakan jasa sewa games, game event, dan game activation, 
                          Global Kidz senantiasa menjaga profesionalitasnya sejak berdirinya yaitu Tahun 2004.
                        </p>
                    </div>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
    <!-- /.content -->
</div>
@endsection