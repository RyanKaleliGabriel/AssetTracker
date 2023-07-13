@extends('layouts.app')

@section('content')





<main id="main" class="main">

<div class="pagetitle">
  <h1>Devices</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Devices</li>
      <li class="breadcrumb-item active">All</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Record of all devices</h5>

           <!-- Table with stripped rows -->
           <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">UiD</th>
                <th scope="col">ModelNumber</th>
                <th scope="col">Device Category</th>
                <th scope="col">Device Owner</th>
              </tr>
            </thead>
            <tbody>
              @foreach($devices as $device)
              <tr>
                <th scope="row">{{$device->id}}</th>
                <td>{{$device->modelnumber}}</td>
                <td>{{$device->category->name}}</td>
                <td>{{$device->student->name}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
          </div>
        </div>
    </div>
  </div>
</section>

</main><!-- End #main -->


@endsection