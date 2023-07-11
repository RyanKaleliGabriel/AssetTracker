@extends('layouts.app')

@section('content')


<main id="main" class="main">

<div class="pagetitle">
  <h1>Device Types</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Device</li>
      <li class="breadcrumb-item active">Category</li>
      <li class="breadcrumb-item active">Add</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add new Device type</h5>

          <!-- Multi Columns Form -->
          <form class="row g-3" method="post" action="{{route('postcategory')}}">
          @csrf
            <div class="col-md-12">
              <input name="devicetype" placeholder="Device Type Name..." type="text" class="form-control" id="inputName5">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-outline-primary">Add Device Type</button>
            </div>
          </form><!-- End Multi Columns Form -->
        </div>
      </div>
    </div>


  </div>
</section>

</main><!-- End #main -->

@endsection