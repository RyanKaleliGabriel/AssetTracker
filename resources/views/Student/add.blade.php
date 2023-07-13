@extends('layouts.app')

@section('content')



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Student Module</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Student</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Register new Student</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{route('poststudent')}}" method="post" id="deviceForm">
              @csrf
              <div class="col-md-12">
                <input placeholder="Enter student full name..." type="text" name="name" class="form-control" id="inputName5">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-md-12">
                <label for="inputState" class="form-label">Department</label>
                <select name="deptid" id="inputState" class="form-control js-example-responsive">
                  @foreach($departments as $department)
                  <option value="{{$department->id}}">{{$department->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="text-center">
                <button type="submit" style="float: right;" class="btn btn-outline-primary confirm">Register</button>
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
                    title: 'Proceed to add the record?',
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