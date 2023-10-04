<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Cart with Vue.js</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  
  <style>
   .modal-mask {
     position: fixed;
     z-index: 9998;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     background-color: rgba(0, 0, 0, .5);
     display: table;
     transition: opacity .3s ease;
   }

   .modal-wrapper {
     display: table-cell;
     vertical-align: middle;
   }
  </style>
 </head>
 <body>
  <div class="container" id="crudApp">
   <br />
   <h3 align="center">Cart Items</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-6">
       <h3 class="panel-title">Indiancitymarket</h3>
      </div>
      <div class="col-md-6" align="right">
       <input type="button" class="btn btn-success btn-xs" @click="openModel" value="Add" />
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      
      <table class="table table-bordered table-striped">
       <tr>
        <th>Product Name</th>
        <th>Price</th>
        <!--th>Edit</th-->
        <th>Delete</th>
       </tr>
       <tr v-for="(data, name, index) in allData">
        <td>@{{ index }} @{{ data.name }}</td>
        <td> @{{ data.price }}</td>
        <!--td><button type="button" name="edit" class="btn btn-primary btn-xs edit" @click="fetchData(row.id)">Edit</button></td-->
        <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" @click="deleteData(row.id)">Delete</button></td>
       </tr>
      </table>
      <input type="button" class="btn btn-danger btn-xs" @click="deleteModel" value="Empty Cart" />
     </div>
    </div>
   </div>
   <div v-if="myModel">
    <transition name="model">
     <div class="modal-mask">
      <div class="modal-wrapper">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" @click="myModel=false"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">@{{ dynamicTitle }}</h4>
         </div>
         <div class="modal-body">
          <div class="form-group">
           <label>Enter First Name</label>
           <input type="text" class="form-control" v-model="name" />
          </div>
          <div class="form-group">
           <label>Enter Last Name</label>
           <input type="text" class="form-control" v-model="price" />
          </div>
          <br />
          <div align="center">
           <input type="hidden" v-model="hiddenId" />
           <input type="button" class="btn btn-success btn-xs" v-model="actionButton" @click="submitData" />
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </transition>
   </div>
   
  </div>
 </body>
</html>

<script>

var application = new Vue({
 el:'#crudApp',
 data:{
  allData:'',
  myModel:false,
  actionButton:'Insert',
  dynamicTitle:'Add Data',
  dynamicTitle2:'Empty Cart Data',
 },
 methods:{
  fetchAllData:function(){
   axios.get('fetchAllDatavuejsdata', {
    //action:'fetchall'
   }).then(function(response){
    console.log(response);
    application.allData = response.data;
   });
  },
  fetchAllData_backup:function(){ //fetchAllDatavuejsdata
   axios.get('https://jsonplaceholder.typicode.com/users', {
    //action:'fetchall'
   }).then(response=> {
    console.log(response);
    console.log(response.data);
    application.allData = response.data;
    console.log(response.data);

   }).
   catch(error =>{
    console.log(error);
   });
  },
  openModel:function(){
   application.name = '';
   application.price = '';
   application.actionButton = "Insert";
   application.dynamicTitle = "Add Data";
   application.myModel = true;
  },
  deleteModel:function(){
   //application.actionButton = "Empty";
   //application.dynamicTitle2 = "Clear Cart Data";
   //application.deleteModel = false;
    if(confirm("Are you sure you want to remove this data?"))
   {
    //alert('clear Cart Data');
    axios.get('/clearcart', {
      action:'empty',
     }).then(function(response){
      application.fetchAllData();
      alert(response.data.message);
      //alert('clear Cart Data');
     });
   }
   /**/
  },
  submitData:function(){
   if(application.name != '' && application.price != '')
   {
    if(application.actionButton == 'Insert')
    {
     axios.post('action.php', {
      action:'insert',
      firstName:application.name, 
      lastName:application.price
     }).then(function(response){
      application.myModel = false;
      application.fetchAllData();
      application.name = '';
      application.price = '';
      alert(response.data.message);
     });
    }
    if(application.actionButton == 'Update')
    {
     axios.post('action.php', {
      action:'update',
      firstName : application.name,
      lastName : application.price,
      hiddenId : application.hiddenId
     }).then(function(response){
      application.myModel = false;
      application.fetchAllData();
      application.name = '';
      application.price = '';
      application.hiddenId = '';
      alert(response.data.message);
     });
    }
   }
   else
   {
    alert("Fill All Field");
   }
  },
  fetchData:function(id){
   axios.post('action.php', {
    action:'fetchSingle',
    id:id
   }).then(function(response){
    application.name = response.data.name;
    application.price = response.data.price;
    application.hiddenId = response.data.id;
    application.myModel = true;
    application.actionButton = 'Update';
    application.dynamicTitle = 'Edit Data';
   });
  },
  deleteData:function(id){
   if(confirm("Are you sure you want to remove this data?" + id))
   {
    axios.post('action.php', {
     action:'delete',
     id:id
    }).then(function(response){
     application.fetchAllData();
     alert(response.data.message);
    });
   }
  }
 },
 created:function(){
  this.fetchAllData();
 }
});

</script>