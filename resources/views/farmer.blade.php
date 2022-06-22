@extends('layouts.master')
@section('content')
<script src="{{ asset('js/jquery.js')}}"></script>
    <div class="container"><br><br><br><br>
        <div class="row">

                <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">View Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Product Entry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Approve Biding</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link profile" href="FarmerProfile">Profile</a>
                </li> 
                 </ul>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Rate</th>
                <th scope="col">Quantity</th>
                <th scope="col">Unit</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>   
                </tr>
            </thead>
            <?php $row = "1"; ?>
            <tbody>
            @foreach($result as $r)
                <tr>
                    <th scope="row">{{$row++}}</th>
                    <td>{{$r->title}}</td>
                    <td>{{$r->category}}</td>
                    <td>{{$r->base_price}}</td>
                    <td>{{$r->quantity}}</td>
                    <td>{{$r->unit}}</td>
                    <td>{{$r->description}}</td>
                    <td>
                        <button type="button" onclick="showProductEditInfo('{{ $r->Pid }}','{{ $r->title }}','{{ $r->category }}','{{ $r->quantity }}','{{ $r->base_price }}','{{ $r->unit }}','{{ $r->description }}')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal" >Delete</a>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#placeToBidModal">Place to bid</button>
                    </td>
                    
                </tr>
            @endforeach   
            </tbody>
        </table>
    </div>

@endsection

<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Add product </h5>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle"        data-bs-dismiss="modal" aria-label="Close"    
 viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>
      </div>
      <div class="modal-body">
<form  method="post" enctype="multipart/form-data" action="{{route('ProductEntry')}}">
@csrf
<div class="mb-3">
<label for="title" class="form-label">Product Name:</label>
<input type="text" class="form-control" id="title" name="title">
</div>
<div class="mb-3">
<label for="category" class="form-label">category:</label>
<input type="text" class="form-control" id="category" name="category">
</div>
<div class="mb-3">
<label for="quantity" class="form-label">Product Quantity:</label>
<input type="number" class="form-control" id="quantity" name="quantity">
</div>
<div class="mb-3">
<label for="base_price" class="form-label">Product Rate:</label>
<input type="number" class="form-control" id="base_price" name="base_price">
</div>
<div class="mb-3">
<label for="unit" class="form-label">Unit:</label>
<input type="text" class="form-control" id="unit" name="unit">
</div>
<div class="mb-3">
<label for="description" class="form-label">Description:</label>
<textarea name="description" rows="4" cols="80" class="form-control" id="description" ></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>


</form>
      </div>
      <div class="modal-footer">
        <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button> -->
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      
    </div>
  </div>
</div>

<!-- Show function for obtaining info on editModal -->
  <script>
    function showProductEditInfo(eid, etitle, ecategory, equantity, erate, eunit, edescription) {
                $("#eid").val(eid);
                $("#etitle").val(etitle);
                $("#ecategory").val(ecategory);
                $("#equantity").val(equantity);
                $("#erate").val(erate);
                $("#eunit").val(eunit);
                $("#edescription").val(edescription);
                console.log(eid);
                $('input[name="_token"]').val();
              }
  </script>



<!-- Edit modal button-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="" method="post" enctype="multipart/form-data" action="{{route('ProductUpdate')}}"> 
        
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Product Name:</label>
            <input type="text" class="form-control" id="etitle" name="etitle">
          </div>
          <input type="hidden" id="eid" name="eid">
          <div class="mb-3">
            <label for="category" class="form-label">category:</label>
            <input type="text" class="form-control" id="ecategory" name="ecategory">
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Product Quantity:</label>
            <input type="number" class="form-control" id="equantity" name="equantity">
          </div>
          <div class="mb-3">
            <label for="base_price" class="form-label">Product Rate:</label>
            <input type="number" class="form-control" id="erate" name="erate">
          </div>

          <div class="mb-3">
            <label for="unit" class="form-label">Unit:</label>
            <input type="text" class="form-control" id="eunit" name="eunit">
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
          <textarea name="edescription" rows="4" cols="80" class="form-control" id="edescription" ></textarea>
          </div>
          <button type="submit" id="editProduct" class="btn btn-primary">Submit</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


<!-- Place to bid button -->


<div class="modal fade" id="placeToBidModal" tabindex="-1" aria-labelledby="placeToBidModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="" method="post" enctype="multipart/form-data" action="{{route('ProductUpdate')}}"> 
        
          @csrf
          
          <div class="mb-3">
            <label for="startingBid" class="form-label">Starting Bid(In Rs):</label>
            <input type="number" class="form-control" id="startingBid" name="startingBid">
          </div>

          <div class="mb-3">
            <label for="bidTime" class="form-label">Time In Hours:(Minimum 3 hours)</label>
            <input type="number" class="form-control" id="bidTime" name="bidTime" placeholder="XX">
          </div>

          <button type="submit" id="editProduct" class="btn btn-primary">Submit</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- Confirm Modal PopUp -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModal">Delete Product</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a type="confirm" id="confirmModal" class="btn btn-primary" href="{{route('ProductDelete',$r->Pid)}}" >Yes</a>
      </div>
    </div>
  </div>
</div>