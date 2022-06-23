@extends('layouts.master')
@section('content')

<div class="container pt-5">
 <h1><center>Farmer Profile</center></h1>

        <section class="container">
        	 <div class="card">
             <div class="col p-4">
               <p>Name: {{Auth::user()->name}}</p>
           	 	<p>Email: {{Auth::user()->email}}</p>
           	 	<p>Gender:</p>
               <p>Addess:</p>
             </div>

        	 </div>

        </section>
        <br>


        <section class="container-fluid">
        	<div class="card pl-2 pr-2 ">
            <div class="col p-5">

<!--
        		<header><h5 class="text-uppercase pl-2 pt-2"><u>Change Password</u></h5></header>
        	<form method="post" action="User/passwordChange">
                    <div class="form-group">
                      <label>Current Password</label>
                      <input type="password" placeholder="Password" name="Current" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                      <label>New Password</label>
                      <input type="password" id="pwd" placeholder="Password" name="New" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                      <label>Confirm New Password</label>
                      <input type="password" id="cpwd" placeholder="Password" name="confirm" class="form-control" required="true">
                    </div>
                     <div id="Error"></div>
                    <div class="form-group">
                      <input type="submit" value="Submit" name="Submit" class="btn btn-primary">
                    </div>
                  </form> -->
                    </div>
              </div>
        </section>
        </div>

@endsection 