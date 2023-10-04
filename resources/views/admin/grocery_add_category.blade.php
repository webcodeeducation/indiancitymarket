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

                          <table class="table table-bordered table-striped" id="tblgroceryitemsjson22" width="100%">
        <thead>
        <tr>
        <td>Category</td>
        <td>Photo</td>
        <td>Action</td>
       </tr>
   </thead>
   <tbody>
    @foreach($categories as $key=>$value)
        <tr>
        <td>{{$value->name}}</td>
        <td><img src="{{ URL::asset('groceryapp/assets/categories') }}/{{$value->img}}" alt="Category" style="margin:10px;width:80px"></td>
        <td><a class="btn btn-danger" href="/deletecategory?id={{$value->id}}&name={{$value->name}}">Delete</a></td>
       </tr>
       @endforeach
        </tbody>
      </table>

                    <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      @if(Session::has('alert-' . $msg))
                      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                      @endif
                    @endforeach
                  </div>
      <p>Please fill form to add grocery item:</p>
  <form action="/submitgrocerycategory" method="post" enctype="multipart/form-data">
    {{csrf_field()}}



      <div class="form-group">
    <label for="email">Category Name:</label>
    <input type="text" class="form-control" id="category_name" name="category_name">
  </div>


  <div class="form-group">
    <label for="email">Images:</label>
    <input type="file" class="form-control" id="photo" name="photo">
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
