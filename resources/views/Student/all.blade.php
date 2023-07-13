@extends('layouts.app')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Students</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Students</li>
      <li class="breadcrumb-item active">All</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Record of all students</h5>

           <!-- Table with stripped rows -->
           <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">UiD</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
              <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->department->name}}</td>
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