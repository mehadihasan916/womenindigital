@extends('layouts.admin.admin-layouts')
@section('page-title','Ambassador-List | Women In Digital | Admin')
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
              <i class="ti-crown"></i> Ambassador Application</h4>
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
                      <th>Avater</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Bio</th>
                      <th>Institution</th>
                      <th>Facebook</th>
                      <th>Linkedin</th>
                      <th>Joined At</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($ambassadors as $key=>$ambassador)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td class="d-flex">
                        <div class="avater">
                          <img width="40" height="40" class="rounded-circle"
                          src="{{ $ambassador->thumbnail != null ? asset('uploads/ambassadors/'. $ambassador->thumbnail) : asset('assets/application-default/img/user-avater.jpg') }}" alt="blog-avatar">
                        </div>
                      </td>
                      <td>{{ $ambassador->name }}</td>
                      <td>{{ $ambassador->email }}</td>
                      <td>{{ $ambassador->phone }}</td>
                      <td>{{ $ambassador->bio }}</td>
                      <td>{{ $ambassador->institution }}</td>
                      <td>{{ $ambassador->facebook }}</td>
                      <td>{{ $ambassador->linkedin }}</td>
                      <td>{{ $ambassador->created_at->diffForHumans() }}</td>
                      <td class="btn-group action-button">
                        <a href="{{ route('admin.ambassador-application.show',$ambassador->id) }}" class="btn btn-info btn-sm">
                          <i class="ion-ios7-eye-outline"></i>
                        </a>
                        <button type="button" onclick="deleteData({{ $ambassador->id }})"  class="btn btn-danger rounded-right btn-sm">
                          <i class="fa fa-trash-o"></i>
                        </button>
                        <form id="delete-form-{{ $ambassador->id }}" action="{{ route('admin.ambassador-application.destroy', $ambassador->id) }}" method="POST" style="display: none;">
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
  </script>
@endpush
