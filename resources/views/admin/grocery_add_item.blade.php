@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 col-lg-12 well" id="content">
                    <a href="groceryitems" class="btn btn-primary" style="margin:5px">Show Items</a>
                    <a href="addcategory" class="btn btn-primary" style="margin:5px">Add Category</a>
                    <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      @if(Session::has('alert-' . $msg))
                      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                      @endif
                    @endforeach
                  </div>
      <p>Please fill form to add grocery item:</p>
  <form action="/submitgroceryitem" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="col-md-6">
        <div class="form-group">
      <label for="sel1">Select Category:</label>
      <select class="form-control" id="grocerycategory" name="category">
        <option value="">Select Category</option>
        @foreach($categories as $key=>$value)
        <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
      </select>
  </div>
  <div class="form-group">
      <label for="sel2">Select Subcategory:</label>
      <select class="form-control" id="grocerysubcategory_fill" name="subcategory">
        <option value="">Please Select Category First</option>
      </select>
    </div>

      <div class="form-group">
    <label for="email">Product Title:</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>


      <div class="form-group">
  <label for="comment">Product Details:</label>
  <textarea class="form-control" rows="5" id="comment" name="details"></textarea>
</div>


      <div class="form-group">
    <label for="email">Qty:</label>
    <input type="text" class="form-control" id="qty" name="qty">
  </div>

  <div class="form-group">
    <label for="email">Unites:</label>
    <select class="form-control" id="unit" name="unit">
         <option value="Kg">Kg</option>
        <option value="gms">GMS</option>
        <option value="ml">ML</option>
        <option value="L">L</option>
      </select>
  </div>

  <div class="form-group">
    <label for="email">Images:</label>
    <input type="file" class="form-control" id="photo" name="photo">
  </div>

  <div class="form-group">
    <label for="email">Price:</label>
    <input type="text" class="form-control" id="price" name="price">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    

  </form>

               </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
