@extends('layouts.app')

@section('content')



<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Layouts</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Layouts</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add new Device</h5>

          <!-- Multi Columns Form -->
          <form class="row g-3">
            <div class="col-md-12">
              <input placeholder="Device Type Name..." type="text" class="form-control" id="inputName5">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-outline-primary">Add Device</button>
            </div>
          </form><!-- End Multi Columns Form -->
        </div>
      </div>
    </div>


  </div>
</section>

</main><!-- End #main -->

@endsection