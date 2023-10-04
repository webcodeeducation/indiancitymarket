@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 col-lg-12 well" id="content">
                    <a href="addgrocery" class="btn btn-primary" style="margin:5px">Add Item</a>
      <table class="table table-bordered table-striped tblgroceryitemsjson" id="tblgroceryitemsjson" width="100%">
        <thead>
        <tr>
        <td>Category</td>
        <td>Subcategory</td>
        <td>Product</td>
        <td>Details</td>
        <td>Qty</td>
        <td>Unites</td>
        <td>Images</td>
        <td>Price</td>
    <td>Action</td>
       </tr>
   </thead>
   <tbody>
            <tr>
        <td>Category</td>
        <td>Subcategory</td>
        <td>Product</td>
        <td>Details</td>
        <td>Qty</td>
        <td>Unites</td>
        <td>Images</td>
        <td>Price</td>
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
