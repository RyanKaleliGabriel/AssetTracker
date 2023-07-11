@extends('layouts.app')

@section('content')


<main id="main" class="main">
  <div class="pagetitle">
    <h1>Department</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Department</li>
        <li class="breadcrumb-item active">Manage</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->



  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage All Department Records</h5>

            <a href="{{route('adddepartment')}}" style="float: right;">
              <button type="button" class="btn btn-outline-primary">
                Add Department
                <i class="bi bi-plus"></i>
              </button>
            </a>
            <br>
            <br>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Computer Science</td>
                  <td>
                    <a href="{{route('editdepartment')}}">
                      <button type="button" class="btn btn-info"><i class="bi bi-pen"></i></button>
                    </a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                  </td>

                </tr>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->

@endsection