@extends('layouts.master')
@section('content')
<div class="container pt-5">
  @if (session('success'))
    <div class="alert alert-success">
    {{session('success')}}
    </div>
  @endif
<div class='row'>
  <div class="col-lg-5"
    <div class="container">
      <div class="card">
        <h2><center>Profile</center></h2>
        <div class="d-flex flex-column align-items-center text-center">
          <img src="{{Auth::user()->photo}}" width="200px" class="rounded-circle">
          <p>Name: {{Auth::user()->name}}</p>
          <p>Email: {{Auth::user()->email}}</p>
          <p>Address: {{Auth::user()->address}}</p>
          <p>Phone: {{Auth::user()->phone}}</p>

        </div>
      </div>
    </div>
    
    <div class="col-lg-7"> 
        <div class="card ">
            <div class="p-1">
              <h3><center>Update Profile</center></h3>
        	      <form method="post" action="{{url('updateProfile')}}" enctype="multipart/form-data" >
                  @csrf
                  @method('put')
                  <input type="hidden" name="id" class="form-control" value="{{Auth::user()->id}}">
                  <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>

                    <div class="form-group">
                      <label>Phone no.</label>
                      <input type="number" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                    </div>

                    <div class="form-group">
                      <label>address</label>
                      <input type="text" name="address" class="form-control" value="{{Auth::user()->address}}">
                    </div>


                    <div class="form-group">
                      <label>Gender</label>
                      <select name="gender" class="form-control">
                        <option value="{{Auth::user()->gender}}" selected hidden>{{Auth::user()->gender}}</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                        <option value="other">other</option>
                        
                      </select>
                  {{-- <input type="text" name="name" class="form-control" value="{{Auth::user()->gender}}">  --}}
                    </div>

                    <div class="form-group">
                      <label>Photo</label>
                      <input type="file" name="photo" class="form-control" value="{{Auth::user()->photo}}">
                    </div>


                    <div id="Error"></div>
                    <div class="form-group">
                      <input type="submit" value="Submit" name="Submit" class="btn btn-primary">
                      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Change Password
                      </button>
                    </div>

                    <div class="form-group">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('changePassword')}}" enctype="multipart/form-data">
          @csrf
         
          <input type="hidden" name="id" value="{{Auth::user()->id}}" class="form-control">
          <div class="form-group">
              <label>Old Password</label>
              <input type="password" name="old" id="old" class="form-control">
          </div>

            <div class="form-group">
              <label>New Password</label>
              <input type="password" name="new" id="new" class="form-control">
            </div>

            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name="confirm" id="confirm" class="form-control">
            </div>
            <span id='Error'></span>
            <button type="submit" class="btn btn-success" name="submit">Save changes</button>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
   $('#confirm').keyup(function(){
      var password = $('#new').val();
      var confirmpassword = $('#confirm').val();
      console.log(password);
  if(confirmpassword!=password){
    $('#Error').html('**Password Not Matched**');
    $('#Error').css('color','red');
    return false;
  } else{
        $('#Error').html('**Password Matched**');
        $('#Error').css('color','green');
          return true;
    }
  });
});
</script>