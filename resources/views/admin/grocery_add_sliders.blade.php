@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 col-lg-12 well" id="content">
                    <h1>Grocery Sliders</h1>
      <table class="table table-bordered table-striped" id="tblgroceryitemsjson22" width="100%">
        <thead>
        <tr>
        <td>Slider</td>
        <td>Action</td>
       </tr>
   </thead>
   <tbody>
    @foreach($sliders as $key=>$value)
        <tr>
        <td><img src="{{ URL::asset('groceryapp/attachments/sliders') }}/{{$value->image}}" alt="Slider Image" style="margin:10px;width:250px"></td>
        <td><a class="btn btn-danger" href="/deleteslider?id={{$value->id}}&name={{$value->image}}">Delete</a></td>
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
  <form action="/submitgroceryslider" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
    <label for="banner">Type:</label>
    <select class="form-control" name="type" id="type">
      <option value="">Select Type</option>
      <option value="topshopslider">Top Shop Slider</option>
      <option value="categoryslider">Category Slider</option>
    </select>
  </div>
    <div class="form-group">
    <label for="banner">Slider:</label>
    <input type="file" class="form-control" id="slider" name="slider">
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
