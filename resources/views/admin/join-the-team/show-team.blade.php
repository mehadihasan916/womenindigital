@extends('layouts.admin.admin-layouts')
@section('page-title','Team-Show | Women In Digital | Admin')
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
              <h4 class="page-title float-left"><i class="icon-people"></i> Join Team Show</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.join-team.index') }}" class="btn btn-danger">
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
                  <div class="col ">
                    <p class="p-2 d-block m-0 d-flex">CV of <strong class="pl-2"> {{ $join_team->name }} </strong></p>
                    <iframe id="iframe-pdf" src="{{ asset('uploads/join-teams-cv/'.$join_team->cv) }}" frameborder="0"></iframe>
                    <div>
                        <a href="{{ asset('uploads/join-teams-cv/'.$join_team->cv) }}" target="blank"><strong>Click For Download The CV</strong></a>
                    </div>
                  </div>
                </div>
                <table class="table">
                  <tbody class="border border-top-0">
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">Name <span>:</span>
                        </th>
                      <td class="col-md-10">{{ $join_team->name }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                        <th scope="row" class="col-md-2 d-flex justify-content-between">
                          Email <span>:</span></th>
                        <td class="col-md-10">{{ $join_team->email }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">Phone
                        <span>:</span>
                      </th>
                        <td class="col-md-10">{{ $join_team->phone }}</td>
                    </tr>
                    <tr class="row m-0 w-100">
                      <th scope="row" class="col-md-2 d-flex justify-content-between">
                        Bio <span>:</span></th>
                      <td class="col-md-10">{{ $join_team->bio }}</td>
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
   function approveTestmonal(id) {
    swal({
        title: 'Are you sure?',
        text: "You went to approve this Testimonial ",
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
 </script>
@endpush
