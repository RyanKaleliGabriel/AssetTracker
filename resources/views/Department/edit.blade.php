@extends('layouts.app')

@section('content')





<main id="main" class="main">

  <div class="pagetitle">
    <h1>Department Module</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Department</li>
        <li class="breadcrumb-item active">Update</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update {{$department->name}}</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{route('updatedepartment', $department->id)}}" method="post" id="deviceForm">
              @csrf
              @method('PUT')
              <div class="col-md-12">
                <input value="{{$department->name}}" placeholder="Enter Department Name..." name="name" type="text" class="form-control" id="inputName5">
              </div>
              @error('name')
                <span class="text-danger">{{ $message }} <a href="{{route('managedepartments')}}">Delete</a> or <a href="{{route('adddepartment')}}">add</a> a new One</span>
                @enderror
              <div class="text-center">
                <button style="float: right;" type="submit" class="btn btn-outline-primary confirm">Update</button>
              </div>
            </form><!-- End Multi Columns Form -->
            <script src="sweetalert2.all.min.js"></script>
            <script>
              // Get the device form element
              var deviceForm = document.getElementById('deviceForm');

              // Submit event listener for the form
              deviceForm.addEventListener('submit', function(event) {
                // Prevent the form from submitting
                event.preventDefault();

                // Check if the form is valid
                if (deviceForm.checkValidity()) {
                  // Configure SweetAlert alert
                  Swal.fire({
                    title: 'Proceed to update the record?',
                    cancelButtonText: 'Cancel',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Proceed'
                  }).then(function(result) {
                    // If the user confirms, submit the form
                    if (result.isConfirmed) {
                      deviceForm.submit();
                    }
                  });
                } else {
                  deviceForm.classList.add('was-validated');
                }
              });
            </script>
          </div>
        </div>
      </div>


    </div>
  </section>

</main><!-- End #main -->

@endsection