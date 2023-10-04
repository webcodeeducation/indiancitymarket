@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 col-lg-12 well" id="content">
                    
        <form id="configform" method="post">
            {{csrf_field()}}
            <?php
                    foreach($settings as $key=>$value){
                        ?>
                        <div class="checkbox">
      <label><input id="{{$value->keyy}}" type="checkbox" value="{{$value->id}}">{{$value->keyy}}&nbsp;<input type="text" class="{{$value->keyy}}" name="{{$value->keyy}}" value="{{$value->valuee}}" style="display:none"></label>
    </div>
    <?php
          }
        ?>
    <input type="button" class="btn btn-primary btnSubmitGroceryConfigForm" name="submit" value="Save">
  </form>

               </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

<script>
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        //console.log('show next');
        var elem = $(this).attr('id');
        $('.'+elem).toggle();
        //$("." + inputValue).toggle();
    });
});
</script>
@endsection
