@extends('admin.layouts.app')
@section('page-title', 'Search Visitors')
@section('content')
@include('admin.message.success')



  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card card-outline card-primary">
          </div>

          <div class="card-header">
            <h3 class="card-title">Displaying Requested Record - "{{$search_text}}" - Keyword</h3>
               {{-- <div class="card-tools">
                 <a href="{{route('admin.visitors.create')}}" class="btn btn-primary btn-sm float-right">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Add Visitor
                  </a>
               </div> --}}

          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>

                <th>#</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Gender</th>
                <th>Building</th>
                <th>Apartment</th>
                <th>Status</th>
                <th>Entry Time</th>
                <th>Exit Time</th>
                <th class="text-center">Action</th>
              </tr>
              </thead>


              <tbody>

                @foreach ($visitors as $visitor)
                <tr>

                 <td>{{$loop->iteration }}</td>
                 <td>{{$visitor->visitor_name}}</td>
                 {{-- <td>{{ !is_null($visitor->position) ? $visitor->position->name : ''}}</td> --}}
                 <td>{{ $visitor->mobile_num}}</td>
                 <td>{{ $visitor->address}}</td>
                 <td>{{ Str::ucfirst($visitor->gender)}}</td>
                 <td>{{ $visitor->apartment_num}}</td>
                 <td>
                      @if ($visitor->remarks==NULL)
                        <span class="badge badge-primary">CHECK-IN</span>    
                      @else
                        <span class="badge badge-success">CHECK-OUT</span>    
                      @endif
                  </td>
                  <td>{{ $visitor->created_at}}</td>
               
                  <td>{{$visitor->updated_at}}</td>
             
                  <td class="text-center">

                  <div class="btn-group" role="group" aria-label="Basic example">

                  <a href="{{route('admin.visitors.show', $visitor->id)}}" class="btn btn-success btn-sm" title="View">
                       <i class="fa fa-eye" aria-hidden="true"></i>
                       {{-- View --}}
                   </a>

                  </div>

              </td>



             </tr>
                @endforeach




              </tbody>


              <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Gender</th>
                <th>Building</th>
                <th>Apartment</th>
                <th>Status</th>
                <th>Entry Time</th>
                <th>Exit Time</th>
                <th class="text-center">Action</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>

        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>


@endsection

@push('page-scripts')
  <!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
//   $(document).ready(function () {
//     $('#example1').DataTable({
//         search: {
//             return: true,
//         },
//     });
// });
</script>
@endpush

