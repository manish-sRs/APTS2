@extends('layouts.master')
@section('content')

<div class="row">

                <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Open Bidding</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Product Entry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Your Biding</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link profile" href="Profile">Profile</a>
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
                <th scope="col">Starting Bid</th>
                <th scope="col">Time for bid(Hours)</th>
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
                    <td>{{$r->startingAmount}}</td>
                    <td>{{$r->timePeriod}}</td>    
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#placeBidModal">Place your bid</button>
                    </td>
                    
                </tr>
            @endforeach   
            </tbody>
        </table>    





<div class="modal fade" id="placeBidModal" tabindex="-1" aria-labelledby="placeBidModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Place your bid</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="" method="post" enctype="multipart/form-data" action="{{route('ProductBid')}}"> 
        
          @csrf
          
          <input type="hidden" id="pid" name="pid">

          <div class="mb-3">
            <label for="bidAmount" class="form-label">Your bid (In Rs):</label>
            <input type="number" class="form-control" id="bidAmount" name="bidAmount" placeholder="XXXX">
          </div>

          <button type="submit" id="submit" class="btn btn-primary">Submit</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>










@endsection