@extends('admin.layouts.app')


@section('page-title', 'Apartments')


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
            <h3 class="card-title">List of Apartments</h3>
            <div class="card-tools">
                                   
               {{-- <a href="{{route('admin.apartments.create')}}" class="btn btn-primary btn-sm float-right">
                              Add apartment</a> --}}
                                         
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                    Add apartment
                              </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">New Apartment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <form action="{{route('admin.apartments.store')}}" method="post">
                                                                              
                          @csrf    
                      
                              <div class="modal-body">
                              
                                {{-- Body --}}
                                  <div class="form-group">
                                    <label for="apartment_num">Apartment Number</label>
                                    <input class="form-control @error('apartment_num') is-invalid @enderror"  type="text" name="apartment_num" placeholder="Input Apartment Number" value="{{ old('apartment_num')}}">

                                  </div>

                                  <div class="form-group">
                                    <label for="building_num">Building Number</label>
                                     <select name="building_num" class="form-control">
                                        <option value="">-Choose Building Number-</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                      </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="status">Status</label>
                                      <select name="status" class="form-control">
                                        <option value="">-Choose Status-</option>
                                        <option value="owned">Owned</option>
                                        <option value="empty">Empty</option>
                                      </select>
                                  </div>

                                  

      
                              </div>

                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Save</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  </div>
                        </form>

                      </div>
                    </div>
                  </div>

              </div>

          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th style="width:5%">#</th>
                <th>Apartment Number</th>
                <th>Building Number</th>
                <th>Status</th>
                <th class="text-center">Action</th>
              </tr>
              </thead>
        
              <tbody>
                           
                @foreach ($apartments as $apartment )
                <tr>
              
                 <td>{{$loop->iteration }}</td>
                 <td>{{$apartment->apartment_num}}</td>
                 <td>{{$apartment->building_num}}</td>
                 <td class="text-center">
                    @if ($apartment->status=='empty')
                      <span class="badge badge-secondary">{{Str::ucfirst($apartment->status)}}</span>    
                    @else
                      <span class="badge badge-success">{{Str::ucfirst($apartment->status)}}</span>    
                    @endif
                </td>
            
                 <td class="text-center">

                  {{-- <a href="{{route('admin.apartments.show', $apartment->id)}}" class="btn btn-success btn-sm" title="Edit"> --}}
                      {{-- <i class="fa fa-eye" aria-hidden="true"></i> --}}
                      {{-- View --}}
                  {{-- </a> --}}

                  {{-- <a href="{{route('admin.apartments.edit', $apartment->id)}}" class="btn btn-primary btn-sm" title="Edit"> --}}
                      {{-- <i class="fa fa-edit" aria-hidden="true"></i> --}}
                      {{-- Edit --}}
                  {{-- </a> --}}

                  <div class="btn-group" role="group" aria-label="Basic example">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" title="Edit" data-toggle="modal" data-target="#modelId-{{$apartment->id}}">
                                  <i class="fa fa-edit" aria-hidden="true"></i>
                                  {{-- Edit --}}
                                </button>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#modelIdDelete-{{$apartment->id}}">
                                  <i class="fa fa-trash" aria-hidden="true"></i> 
                                  {{-- Delete --}}
                                </button>
                  </div>

                  
                           
              </td>

    <!-- Modal for edit-->
    <div class="modal fade" id="modelId-{{$apartment->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Apartment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
                    <form action="{{route('admin.apartments.update',$apartment->id)}}" method="post">
                            @csrf  
                            @method('PUT')  
                            <div class="modal-body">

                                <div class="form-group">
                                  <label for="apartment_num">Apartment Number</label>
                                  <input class="form-control @error('apartment_num') is-invalid @enderror" type="text" name="apartment_num" placeholder="Input Apartment Number" value="{{ old('apartment_num',$apartment->apartment_num)}}">

                                </div>

                                <div class="form-group">
                                  <label for="building_num">Building Number</label>
                                   <select name="building_num" class="form-control">
                                      <option value="">-Choose Building Number-</option>
                                      <option value="A"@if($apartment->building_num=='A')
                                        selected
                                      @endif>A</option>
                                      <option value="B"@if($apartment->building_num=='B')
                                        selected
                                      @endif>B</option>
                                      <option value="C"@if($apartment->building_num=='C')
                                        selected
                                      @endif>C</option>
                                      <option value="D"@if($apartment->building_num=='D')
                                        selected
                                      @endif>D</option>
                                      {{-- if($user['country'] == '1') { ?> selected="selected" --}}
                                    </select>
                                </div>

                                <div class="form-group">
                                  <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                      <option value="">-Choose Status-</option>
                                      <option value="owned"@if($apartment->status=='owned')
                                        selected
                                      @endif>Owned</option>
                                      <option value="empty"@if($apartment->status=='empty')
                                        selected
                                      @endif>Empty</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                    </form>
        </div>
      </div>
    </div>

    <!-- Modal for delete -->
    <div class="modal fade" id="modelIdDelete-{{$apartment->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{route('admin.apartments.delete', $apartment->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                Are you sure to delete Apartment: <strong>{{$apartment->apartment_num}}</strong> ?
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm</button>
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
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
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

