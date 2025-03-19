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
              <h4 class="page-title float-left"><i class="icon-earphones-alt"></i> Mentor Application Show</h4>
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
            <div class="col-md-9">
              <div class="card-box">
                <div class="row mb-3">
                  <div class="col">
                    <img src="{{ asset('uploads/mentor-application/'.$mentor->thumbnail) }}" width="100" height="100" style="object-fit: cover">
                  </div>
                  <div class="col d-flex justify-content-end approve-icon">
                    @if($mentor->status == false)
                    <button type="button" class="btn btn-info" onclick="approveMentor({{ $mentor->id }})" style="height: 40px;">
                      <i class="zmdi zmdi-check-circle"></i>
                      <span>Approve</span>
                    </button>
                    <form method="post" action="{{ route('admin.approve.mentor',$mentor->id) }}" id="approval-form" style="display: none">
                        @csrf
                        @method('PUT')
                    </form>
                    @else
                    <button type="button" class="btn btn-success mr-2" style="height: 40px;" disabled>
                      <i class="zmdi zmdi-shield-check"></i>
                      <span>Already Approved</span>
                    </button>
                    <button type="button" class="btn btn-danger" onclick="rejectMentor({{ $mentor->id }})" style="height: 40px;">
                      <i class="zmdi zmdi-info-outline"></i>
                      <span>Now Rejecte ?</span>
                    </button>
                    <form method="post" action="{{ route('admin.reject.mentor',$mentor->id) }}" id="approval-form" style="display: none">
                        @csrf
                        @method('PUT')
                    </form>
                    @endif
                  </div>
                </div>
                <table class="table">
                  <tbody class="border border-top-0">
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">Name <span>:</span>
                        </th>
                      <td class="col-md-10">{{ $mentor->name }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                        <th scope="row" class="col-md-2 d-flex justify-content-between">
                          Email <span>:</span></th>
                        <td class="col-md-10">{{ $mentor->email }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">Phone
                        <span>:</span>
                      </th>
                        <td class="col-md-10">{{ $mentor->phone }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">NID
                        <span>:</span>
                      </th>
                        <td class="col-md-10">{{ $mentor->nid }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">Profession
                        <span>:</span>
                      </th>
                        <td class="col-md-10">{{ $mentor->profession }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">
                        Bio <span>:</span></th>
                      <td class="col-md-10">{{ $mentor->bio }}</td>
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
