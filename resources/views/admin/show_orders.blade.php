@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 col-lg-12 well" id="content">
                    <a href="addgrocery" class="btn btn-primary" style="margin:5px">Add Item</a>
      <table class="table table-bordered table-striped tblordersjson" id="tblordersjson" width="100%">
        <thead>
        <tr>
        <td>Contact</td>
         <td>Delivery Type</td>
        <td>Time</td>
        <td>Address</td>
        <td>Larndmark</td>
        <td>City</td>
        <td>Action</td>
       </tr>
   </thead>
   <tbody>
            <tr>
        <td>Contact</td>
         <td>Delivery Type</td>
        <td>Time</td>
        <td>Address</td>
        <td>Larndmark</td>
        <td>City</td>
        <td>Action</td>
    </tr>
        </tbody>
      </table>

               </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
