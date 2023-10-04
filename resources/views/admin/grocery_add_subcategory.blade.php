@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 col-lg-12 well" id="content">
                    <a href="groceryitems" class="btn btn-primary" style="margin:5px">Show Items</a>
                    <a href="addgrocery" class="btn btn-primary" style="margin:5px">Add Grocery Item</a>
                    <a href="addgrocerysubcategory" class="btn btn-primary" style="margin:5px">Add Grocery Subcategory</a>
                    <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      @if(Session::has('alert-' . $msg))
                      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                      @endif
                    @endforeach
                  </div>
      <p>Please fill form to add grocery item:</p>
  <form action="/submitgrocerysubcategory" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

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
    <label for="email">Subcategory Name:</label>
    <input type="text" class="form-control" id="category_name" name="category_name">
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
