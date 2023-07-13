@extends('layouts.app')

@section('content')


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Device</li>
        <li class="breadcrumb-item active">Update</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update {{$device->modelnumber}}</h5>

            <!-- Multi Columns Form -->
            <form class="row g-3" action="{{route('updatedevice', $device->id)}}" method="post" id="deviceForm">
              @csrf
              @method('PUT')
              <div class="col-md-12">
                <input value="{{$device->modelnumber}}" placeholder="Enter Device Model Number..." type="text" name="modelnumber" class="form-control" id="inputName5">
              </div>
              @error('modelnumber')
                <span class="text-danger">{{ $message }} <a href="{{route('managedevices')}}">Delete</a> or <a href="{{route('adddevice')}}">add</a> a new One</span>
                @enderror
              <div class="col-md-6">
                <label for="inputState" class="form-label">Choose Student Id</label>
                <select id="inputState" name="studentid" class="form-control js-example-responsive">
                  <option value="" disabled selected>{{$device->student->id}} ({{$device->student->name}})</option>
                  @foreach($students as $student)
                  <option value="{{$student->id}}">{{$student->id}} ({{$student->name}})</option>
                  @endforeach
                </select>
                @error('studentid')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Choose Device Type</label>
                <select id="inputState2" name="categoryid" class="form-control js-example-responsive">
                  <option value="" disabled selected> {{$device->category->name}}</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
                @error('categoryid')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-outline-primary confirm" style="float: right;">Update Device</button>
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
>



@endsection