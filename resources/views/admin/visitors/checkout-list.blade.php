@extends('admin.layouts.app')
@section('page-title', 'Current Visitors')
@section('content')
@include('admin.message.success')
@include('admin.message.error')

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card card-outline card-primary">
          </div>

          <div class="card-header">
            <h3 class="card-title">List of Current Visitors</h3>
               <div class="card-tools">
                 <a href="{{route('admin.visitors.create')}}" class="btn btn-primary btn-sm float-right">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Add Visitor
                  </a>
               </div>

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
              
                <th class="text-center">Action</th>
              </tr>
              </thead>


              <tbody>

                @foreach ($currentVisitors as $currentVisitor)
                <tr>

                  <td>{{$loop->iteration }}</td>
                  <td>{{$currentVisitor->visitor_name}}</td>
                  {{-- <td>{{ !is_null($visitor->position) ? $visitor->position->name : ''}}</td> --}}
                  <td>{{ $currentVisitor->mobile_num}}</td>
                  <td>{{ $currentVisitor->address}}</td>
                  <td>{{ Str::ucfirst($currentVisitor->gender)}}</td>
                  <td>{{ $currentVisitor->apartment_num}}</td>
                  <td>
                         @if ($currentVisitor->remarks==NULL)
                           <span class="badge badge-primary">CHECK-IN</span>    
                         @else
                           <span class="badge badge-success">CHECK-OUT</span>    
                         @endif
                   </td>
                   <td>{{ $currentVisitor->created_at->diffForHumans()}}</td>
                  
                   <td class="text-center">
                   <div class="btn-group" role="group" aria-label="Basic example">
 
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-primary btn-sm" title="CHECK-OUT" data-toggle="modal" data-target="#modelId-{{$currentVisitor->id}}">
                              <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                              {{-- CHECK-OUT --}}
                            </button>
 
                            <a href="{{route('admin.visitors.edit', $currentVisitor->id)}}" class="btn btn-success btn-sm" title="View">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                              {{-- View --}}
                          </a>

                   </div>
 
               </td>
 

                 <!-- Modal for edit-->
    <div class="modal fade" id="modelId-{{$currentVisitor->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Check-Out Visitor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
                    <form action="{{route('admin.visitors.update',$currentVisitor->id)}}" method="post">
                            @csrf  
                            @method('PUT')  
                            <div class="modal-body">

                                <div class="form-group">
                                  Are you sure to CHECK-OUT Visitor: <strong>{{$currentVisitor->visitor_name}}</strong> ?
                                </div>

                                <div class="form-group">
                                  <label for="remarks">Remarks</label>
                                    <textarea class="form-control @error('remarks') is-invalid @enderror" name="remarks" rows="3" placeholder="Input Remarks" ></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Checkout</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                    </form>
        </div>
      </div>
    </div>

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
</script>
@endpush

