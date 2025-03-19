@extends('layouts.admin.admin-layouts')
@section('page-title','Mentor-Details-Show | Women In Digital | Admin')
@push('page-css')
<style>
  .approve-icon i{
    font-size: 17px;
  }
  .page-title-box{
    padding: 14px 20px !important;
  }
  #iframe-pdf{
      border: 2px solid gray;
  }
</style>
@endpush
@section('page-content')
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="page-title-box">
            <div class="d-flex justify-content-between align-items-center text-muted">
              <h4 class="page-title float-left"><i class="ion-bookmark"></i> Hired Mentor Show</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.testimonial.index') }}" class="btn btn-danger">
                    <i class="fa fa-arrow-circle-o-left"></i>
                    <span>Back to list</span>
                  </a>
                </li>
              </ol>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-md-6">
              <div class="card-box">
                <h5>Requested Person Information</h5>
                <table class="table">
                  <tbody class="border border-top-0">
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">Name <span>:</span>
                        </th>
                      <td class="col-md-10">{{ $hire_mentor->name }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                        <th scope="row" class="col-md-2 d-flex justify-content-between">
                          Email <span>:</span></th>
                        <td class="col-md-10">{{ $hire_mentor->email }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">Phone
                        <span>:</span>
                      </th>
                      <td class="col-md-10">{{ $hire_mentor->phone }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-box">
                <h5>Hired Mentor Information</h5>
                <table class="table">
                  <tbody class="border border-top-0">
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">Name <span>:</span>
                        </th>
                      <td class="col-md-10">{{ $hire_mentor->mentor_name }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                        <th scope="row" class="col-md-2 d-flex justify-content-between">
                          Email <span>:</span></th>
                        <td class="col-md-10">{{ $hire_mentor->mentor_email }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">Phone
                        <span>:</span>
                      </th>
                        <td class="col-md-10">{{ $hire_mentor->mentor_phone }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- end row -->
    </div> <!-- container -->
  </div>
  <!-- content -->
@endsection
@push('page-js')
 <!-- Sweet Aleart Js -->
 <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
 <script type="text/javascript">
   function approveMentor(id) {
    swal({
        title: 'Are you sure?',
        text: "You went to approve this Mentor ",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approve it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('approval-form').submit();
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                'Cancelled',
                'The post remain pending :)',
                'info'
            )
        }
    })
  }


  function rejectMentor(id) {
    swal({
        title: 'Are you sure?',
        text: "You went to Reject this Mentor ",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Reject it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('approval-form').submit();
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                'Cancelled',
                'The post remain pending :)',
                'info'
            )
        }
    })
  }
 </script>
@endpush
