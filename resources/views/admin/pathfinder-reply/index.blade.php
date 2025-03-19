@extends('layouts.admin.admin-layouts')
@section('page-title','Page-Builder List | Women In Digital | Admin')
@push('page-css')
<!-- DataTables -->
<link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style>
  .avater img{
    object-fit: cover;
  }
  .page-title-box{
    padding: 20px 20px !important;
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
              <h4 class="page-title float-left">
              <i class="zmdi zmdi-translate"></i> Path Finder Answer</h4>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">
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
            <div class="card-box table-responsive">
              <table id="responsive-datatable" class="table dt-responsive nowrap table-striped" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                    <th>#SL</th>
                    <th>Answer</th>
                    <th>Publish Status</th>
                    <th>Joined At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($path_finder_replies as $key=>$path_reply)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ Str::words($path_reply->reply, 10, '[..]')  }}</td>
                      <td>
                        @if($path_reply->is_publish == false)
                        <button type="button" class="btn btn-info btn-sm" onclick="approveReply({{ $path_reply->id }})">
                        <i class="zmdi zmdi-info-outline"></i>
                        <span>Approve Answer</span>
                        </button>
                        <form id="approve-form-{{ $path_reply->id }}" method="post" action="{{ route('admin.approve.reply',$path_reply->id) }}" id="approval-form" style="display: none">
                            @csrf
                            @method('PUT')
                        </form>
                        @else
                        <button type="button" class="btn btn-success btn-sm" onclick="rejectReply({{ $path_reply->id }})">
                        <i class="zmdi zmdi-check-circle"></i>
                        <span>Approved, Rejecte Answer ?</span>
                        </button>
                        <form id="reject-form-{{ $path_reply->id }}" method="post" action="{{ route('admin.reject.reply',$path_reply->id) }}" id="approval-form" style="display: none">
                            @csrf
                            @method('PUT')
                        </form>
                        @endif
                       </td>
                      <td>{{ $path_reply->created_at->diffForHumans() }}</td>

                      <td class="btn-group action-button">
                        <a href="{{ route('admin.path-finder-reply.edit',$path_reply->id) }}" class="btn btn-warning btn-sm">
                          <i class="zmdi zmdi-eye"></i>
                          <span>View Answer</span>
                        </a>
                        {{-- <a href="{{ route('admin.page-builder.edit',$path_finder->id) }}" class="btn btn-dark btn-sm">
                          <i class="fa fa-edit"></i>
                        </a> --}}
                        <button type="button" class="btn btn-danger rounded-right btn-sm" onclick="deleteData({{ $path_reply->id }})"  >
                          <i class="fa fa-trash-o"></i>
                        </button>
                        <form id="delete-form-{{ $path_reply->id }}" action="{{ route('admin.path-finder.destroy', $path_reply->id) }}" method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
        </div>
    </div>
    <!-- end row -->
    </div> <!-- container -->
  </div>
  <!-- content -->
@endsection
@push('page-js')
  <!-- Required datatable js -->
  <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Responsive examples -->
  <script src="{{ asset('assets/admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
  <script>
    $(document).ready(function() {
        // Default Datatable
        $('#datatable').DataTable();
        // Responsive Datatable
        $('#responsive-datatable').DataTable();
    } );
  </script>

  <!-- Sweet Aleart Js -->
  <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
  <script type="text/javascript">
    function deleteData(id) {
      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                'Cancelled',
                'Your data is safe :)',
                'error'
            )
        }
      })
    }

    // Approve Path Finder
    function approveReply(id) {
    swal({
        title: 'Are you sure?',
        text: "You went to approve this Reyply ",
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
            document.getElementById('approve-form-'+id).submit();
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                'Cancelled',
                'The Reply remain pending :)',
                'info'
            )
        }
    })
  }


  function rejectReply(id) {
    swal({
        title: 'Are you sure?',
        text: "You went to Reject this Reply ",
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
            document.getElementById('reject-form-'+id).submit();
        } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                'Cancelled',
                'The Reply remain pending :)',
                'info'
            )
        }
    })
  }
  </script>
@endpush
