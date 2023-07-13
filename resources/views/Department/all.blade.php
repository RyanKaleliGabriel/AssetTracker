

@extends('layouts.app')

@section('content')


<main id="main" class="main">

<div class="pagetitle">
  <h1>All Departments</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Department</li>
      <li class="breadcrumb-item active">All</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Department Records</h5>

           <!-- Table with stripped rows -->
           <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">UiD</th>
                <th scope="col">Name</th>

              </tr>
            </thead>
            <tbody>
              @foreach($departments as $department)
              <tr>
                <th scope="row">{{$department->id}}</th>
                <td>{{$department->name}}</td>
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