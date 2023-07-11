@extends('layouts.app')

@section('content')



<main id="main" class="main">
  <div class="pagetitle">
    <h1>Device Categories</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Device</li>
        <li class="breadcrumb-item active">Manage Categories</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->



  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage all Device Categories</h5>

            <a href="{{route('addcategory')}}" style="float: right;">
              <button type="button" class="btn btn-outline-primary">
                Add Device Category
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
                  <th scope="col">Model Number</th>
                  <th scope="col">Type</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>AGSYF573582</td>
                  <td>Laptop</td>
                  <td>
                    <a href="{{route('editcategory')}}">
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