@extends('layouts.master')
@section('content')

  <div class="card text-center">
    <div class="card-header d-flex justify-content-end">
   <!-- <button class="btn btn-success" id="newProduct"  data-bs-toggle="modal" data-bs-target="#exampleModal">New</button> -->
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">S.N</S></th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Quantity</th>
                <th scope="col">Rate</th>
                <th scope="col">Unit</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php $row=1; ?>
              @foreach($result as $r)
              <tr>
                  <th scope="row">{{ $row++}}</th>
                  <td>{{$r->title}}</td>
                  <td>{{$r->category}}</td>
                  <td>{{$r->quantity}}</td>
                  <td>{{$r->rate}}</td>
                  <td>{{$r->unit}}</td>
                  <td>{{$r->base_price}}</td>
                  <td>{{$r->description}}</td>
                  <td class="justify-content-between">
                    <button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                    <button class="btn btn-danger">Delete</button></td>

              </tr>
          @endforeach

            </tbody>

        </table>


  </div>
</div>


<!--
<h2 class=""><center></center></h2>
-->
<script>
              $("#enterProduct").click(function() {
              let title = $("#title").val();
              let category = $("#category").val();
              let quantity = $("#quantity").val();
              let baseprice = $("#base_price").val();
              let description = $("#description").val();

              let _token = $('input[name="_token"]').val();
            //  console.log(title, category, quantity, baseprice, description, _token);
              $.ajax({
                   type: 'POST',
                    url: 'productEntry',
                   data: {
                         title: title,
                         category: category,
                         quantity: quantity,
                         base_price: baseprice,
                         description: description,
                         _token: _token
              },
              success: function(data) {
              // alert(data.success);
              }
              });
              });
  </script>

@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <!-- <form class="" method="post" enctype="multipart/form-data" action="productEntry"> -->
        <form>
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
            <label for="description" class="form-label">Description:</label>
          <textarea name="description" rows="4" cols="80" class="form-control" id="description" ></textarea>
          </div>
          <button type="submit" id="enterProduct" class="btn btn-primary">Submit</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancel"></button>
      </div>
      <div class="modal-body">
         <!-- <form class="" method="post" enctype="multipart/form-data" action="productEntry"> -->
        <form>
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
            <label for="description" class="form-label">Description:</label>
          <textarea name="description" rows="4" cols="80" class="form-control" id="description" ></textarea>
          </div>
          <button type="submit" id="editProduct" class="btn btn-primary">Submit</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

      </div>
    </div>
  </div>
</div>
