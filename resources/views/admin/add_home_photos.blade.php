@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12" id="content">
                  <div class="row">
                <div class="col-md-8">
                    <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      @if(Session::has('alert-' . $msg))
                      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                      @endif
                    @endforeach
                  </div>
                    <!-- Form Start-->
                    <form class="form-horizontal" action="/submithomephoto" method="post" id="productform" enctype="multipart/form-data">
                    {{csrf_field()}}

       <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Home Image</label>
  <div class="col-md-4">
    <input id="filebutton" name="image" class="input-file" type="file" required="required">
    <span class="filename">Nothing selected</span>
  </div>
</div>



    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary btnSaveProduct1">Submit</button>
      </div>
    </div>
  </form>
                    <!-- Form End -->



                </div>
            </div>
                </div>
                </div>
    
                </div>
            </div>
            <!--row -->

        </div>
        <!-- /.container-fluid -->
    </div>
@endsection