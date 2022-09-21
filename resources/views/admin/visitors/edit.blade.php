@extends('admin.layouts.app')
@section('page-title', 'Visitor Information')
@section('content')

@include('admin.message.error')

  <div class="container-fluid">
       
      <div class="card">
          <div class="card card-outline card-primary">
          </div>

          <div class="row">
            {{-- <div class="col-12"> --}}
            <div class="col-md-6">

                <!-- /.card-header -->
                <div class="card-body">
        
                  <form action="{{route('admin.visitors.update',$visitor->id)}}" method="post">
                    @csrf  
                    @method('PUT')

                      <div class="form-group row">
                        <label for="visitor_name" class="col-sm-3 col-form-label">Fullname</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="visitor_name" value="{{$visitor->visitor_name}}" readonly>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="mobile_num" class="col-sm-4 col-form-label">Contact Number</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="mobile_num" value="{{$visitor->mobile_num}}" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-9">
                          <select name="gender" class="form-control">
                            <option>{{Str::ucfirst($visitor->gender)}}</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="address" rows="3" readonly>{{$visitor->address}}</textarea>
                        </div>
                      </div>

                </div>
                <!-- /.card-body -->
                
              {{-- </div> --}}
              
              <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
    
                <!-- /.card-header -->
                <div class="card-body">
                      
                      <div class="form-group row">
                        <label for="whom_to_meet" class="col-sm-3 col-form-label">Whom to Visit</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="whom_to_meet" value="{{$visitor->whom_to_meet}}" readonly>
                        </div>
                      </div>
                      
                      {{-- <div class="form-group row">
                        <label for="apartment_num" class="col-sm-4 col-form-label">Apartment Number</label>
                        <div class="col-sm-8">
                          <select name="apartment_num" class="form-control">
                                <option value="">-Select Apartment Number-</option>
                            @foreach ($apartments as $apartment)
                                <option value="{{$apartment->apartment_num}}">{{$apartment->apartment_num}}</option>
                            @endforeach
                          </select>
                      </div>
                      </div> --}}

                      <div class="form-group row">
                        <label for="reason" class="col-sm-3 col-form-label">Reason</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="reason" rows="3" readonly>{{$visitor->reason}}</textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="created_at" class="col-sm-3 col-form-label">Entry Time</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="created_at" value="{{$visitor->created_at}} ({{$visitor->created_at->diffForHumans()}})" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="remarks" class="col-sm-3 col-form-label">Remarks</label>
                        <div class="col-sm-9">
                          <textarea class="form-control @error('remarks') is-invalid @enderror" name="remarks" rows="3" placeholder="Input Remarks" ></textarea>
                        </div>
                      </div>
               
                        <div class="form-group row">
                          <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">  <i class="fas fa-sign-out-alt" aria-hidden="true"></i> CHECK-OUT</button>
                            <button type="button" class="btn btn-secondary" onclick="window.location='{{ URL::route('admin.visitors.checkoutList') }}'">Cancel</button>
                          </div>
                        </div>
            
                  </form>

                </div>
                <!-- /.card-body -->
                
              {{-- </div> --}}
              
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

      </div>
      <!-- /.card -->
  </div>

@endsection

