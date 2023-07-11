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
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Age</th>
                <th scope="col">Start Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Brandon Jacob</td>
                <td>Designer</td>
                <td>28</td>
                <td>2016-05-25</td>
              </tr>
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