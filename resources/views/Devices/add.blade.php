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
            <form class="row g-3" action="{{route('postdevice')}}" method="post">
              @csrf
              <div class="col-md-12">
                <input placeholder="Enter Device Model Number..." type="text" name="modelnumber" class="form-control" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Choose Student Id</label>
                <select id="inputState" name="studentid" class="form-control js-example-responsive"  >
                  @foreach($students as $student)
                  <option value="{{$student->id}}">{{$student->id}} ({{$student->name}})</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="inputState" class="form-label">Choose Device Type</label>
                <select id="inputState2" name="categoryid" class="form-control js-example-responsive">
                  @foreach($categories as $category)
                  <option  value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-outline-primary confirm" style="float: right;">Add Device</button>
              </div>
            </form><!-- End Multi Columns Form -->
            <script src="sweetalert2.all.min.js"></script>
            <script>
              // Get all elements with the 'confirm' class
              var confirmButtons = document.getElementsByClassName('confirm');

              // Iterate over each confirm button
              Array.from(confirmButtons).forEach(function(button) {
                button.addEventListener('click', function(event) {
                  // Get the closest form to the button
                  var form = button.closest('form');

                  // Prevent the default form submission
                  event.preventDefault();

                  // Configure SweetAlert alert as you wish
                  Swal.fire({
                    title: 'Proceed to add the record?',
                    cancelButtonText: "Cancel",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Proceed'
                  }).then(function(result) {
                    // In case of deletion confirmation, submit the form
                    if (result.isConfirmed) {
                      form.submit();
                      Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Added Successfully',
                        showConfirmButton: false,
                        timer: 1000
                      });
                    }
                  });
                });
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