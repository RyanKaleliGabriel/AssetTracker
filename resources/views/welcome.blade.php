@extends('layouts.app')

@section('content')



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Students </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$students}}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Devices</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-power"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$devices}}</h6>


                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->


          <!-- Reports -->
          <div class="col-12">
            <div class="card" >
              
            <h5 class="card-title" style="margin-left: 20px;">Devices per Category</h5>
              <div class="card-body" style="height: 300px;" >
                {!! $barchart->container() !!}
              </div>
            </div>
          </div><!-- End Reports -->
        </div>
      </div><!-- End Left side columns -->
      {!! $barchart->script() !!}


      <!-- Right side columns -->
      <div class="col-lg-4">
        <div class="card">
        <h5 class="card-title" style="margin-left: 20px;">Students in Each Department</h5>
          <div class="card-body pb-0">
            {!! $piechart->container() !!}
          </div>
        </div>
      </div>
  </section>

</main><!-- End #main -->

{!! $piechart->script() !!}




@endsection