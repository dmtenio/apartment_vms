@extends('admin.layouts.app')
@section('page-title', 'New Visitor')
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
        
                  <form action="{{route('admin.visitors.store')}}" method="post">

                      @csrf

                      <div class="form-group row">
                        <label for="visitor_name" class="col-sm-3 col-form-label">Fullname</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('visitor_name') is-invalid @enderror" name="visitor_name" placeholder="Input Fullname">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="mobile_num" class="col-sm-4 col-form-label">Contact Number</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control @error('mobile_num') is-invalid @enderror" name="mobile_num" placeholder="Input Contact Number">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-9">
                          <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                            <option value="">-Select a Gender-</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                          <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="3" placeholder="Input Address" ></textarea>
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
                          <input type="text" class="form-control @error('whom_to_meet') is-invalid @enderror" name="whom_to_meet" placeholder="Input Name to Visit">

                        </div>
                      </div>

                
                      
                      <div class="form-group row">
                        <label for="apartment_num" class="col-sm-4 col-form-label">Apartment Number</label>
                        <div class="col-sm-8">
                          <select name="apartment_num" class="form-control @error('apartment_num') is-invalid @enderror">
                                <option value="">-Select Apartment Number-</option>
                            @foreach ($apartments as $apartment)
                                <option value="{{$apartment->apartment_num}}">{{$apartment->apartment_num}}</option>
                            @endforeach
                          </select>
                      </div>
                      </div>

                      <div class="form-group row">
                        <label for="reason" class="col-sm-3 col-form-label">Reason</label>
                        <div class="col-sm-9">
                          <textarea class="form-control @error('reason') is-invalid @enderror" name="reason" rows="3" placeholder="Input Reason" ></textarea>
                        </div>
                      </div>

                        <div class="form-group row">
                          <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" onclick="window.location='{{ URL::route('admin.dashboard') }}'">Cancel</button>
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

