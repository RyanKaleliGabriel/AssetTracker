
@extends('layouts.app')

@section('content')





<main id="main" class="main">

    <div class="pagetitle">
      <h1>Department Module</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Department</li>
          <li class="breadcrumb-item active">Add</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Register new Department</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="{{route('postdepartment')}}" method="post">
                @csrf
                <div class="col-md-12">
                  <input placeholder="Enter Department Name..." name="deptname" type="text" class="form-control" id="inputName5">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-outline-primary">Register</button>
                </div>
              </form><!-- End Multi Columns Form -->
            </div>
          </div>
        </div>


      </div>
    </section>

  </main><!-- End #main -->

  @endsection