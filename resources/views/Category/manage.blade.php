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
                  <th scope="col">UiD</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>

                  <th scope="row">{{$category->id}}</th>
                  <td>{{$category->name}}</td>
                  <td>
                    <a href="{{route('editcategory', $category->id)}}">
                      <button type="button" class="btn btn-info"><i class="bi bi-pen"></i></button>
                    </a>
                  </td>
                  <td>
                    <form action="{{route('deletecategory', $category->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger confirm"><i class="bi bi-trash"></i></button>
                    </form>
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
                            title: 'Are you sure you want to delete?',
                            text: "You won't be able to revert this!",
                            cancelButtonText: "Cancel",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Delete'
                          }).then(function(result) {
                            // In case of deletion confirmation, submit the form
                            if (result.isConfirmed) {
                              form.submit();
                              Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Deleted Successfully',
                                showConfirmButton: false,
                                timer: 1500
                              });
                            }
                          });
                        });
                      });
                    </script>
                  </td>
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
</main>
<!-- End #main -->



@endsection