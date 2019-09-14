<?php if(isset($_SESSION['user']) && $_SESSION['user']->role_id==="1"): ?>

<div class="site-section bg-light">
      <div class="container">
      <h3 class="h5 text-black mb-3">Manage: Click on button to manage categories of site </h3>
      <div class="row">
            <input type="button" value="Users" id="btnUsers" name="btnUsers" class="btn btn-primary pill text-white px-5 py-2">
            <br/>
            <input type="button" value="Destinations" id="btnDest" name="btnDest" class="btn btn-primary pill text-white px-5 py-2"> 
            <br/>
            <input type="button" value="Statistics" id="btnShow" name="btnShow" class="btn btn-primary pill text-white px-5 py-2">

</div>
        
       
<br/>
<div class="row" id="users">

<!-- LIST OF USERS AND DELETE OPTION -->

    <div class="col-md-12 col-lg-8 mb-5 bg-white" id="listUsers">
        <br/>
        <br/>
        <h3 class="mb-5">All users</h2>
        <br/>
    <table class='table'>
<thead>
<tr>
<th scope='col'>First Name</th>
<th scope='col'>Last name</th>
<th scope='col'>Email</th>
<th scope='col'>Date of reg</th>
<th scope='col'>Role</th>
<th scope='col'>Delete</th>

</tr>
</thead>
<tbody>
<?php
include "models/users/get_users.php";
$users=getUsers();
           
            foreach($users as $user): ?>

<tr>
<td><?= $user->first_name ?> </td>
<td><?= $user->last_name?></td>
<td><?= $user->email?></td>
<td><?= $user->reg_date?></td>
<td><?= $user->role_id ?> </td>
<td> <a href='#' class='delete-user' data-id='<?= $user->id?>'>DELETE</a></td>

</tr>
<?php endforeach; ?>

</tbody>
</table>
</div>



<!-- FORM FOR ADD NEW USER -->
          <div class="col-md-12 col-lg-8 mb-5" id="addUpdateUser">
       <form  method="POST" action="models/users/insert.php"class="p-5 bg-white" enctype="multipart/form-data">
            <h3 class="mb-5" >Add user</h2>

            <input type="hidden" id="hdnId" name="id" value=""/>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="name">First Name</label>
                  <input type="text" id="tbAddName" name="tbAddName" class="form-control" placeholder="First Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="name">Last Name</label>
                  <input type="text" id="tbAddLast" name="tbAddLast" class="form-control" placeholder="Last Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="text" id="tbAddEmail" name="tbAddEmail" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Password</label>
                  <input type="password" id="tbAddLozinka" name="tbAddLozinka" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Role id</label>
                  <input type="text" id="tbRole" name="tbRole" class="form-control" placeholder="Role id">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Add user" id="btnAddUser" name="btnAddUser" class="btn btn-primary pill text-white px-5 py-2">
                </div>
                <br/>
                <br/>
              
              </div>

  
            </form>

          
          </div>
         
    


</div>
<br/>

<div class="row" id="dest">


<div class="col-md-12 col-lg-8 mb-5 bg-white" id="listDest">
        <br/>
        <br/>
        <h3 class="mb-5">All destinations</h2>
        <br/>
    <table class='table'>
<thead>
<tr>
<th scope='col'> Name</th>
<th scope='col'>Description</th>
<th scope='col'>Picture</th>
<th scope='col'>Price</th>
<th scope='col'>Hot</th>
<th scope='col'>Delete</th>

</tr>
</thead>
<tbody>
<?php
include "models/destinations/get_destinations.php";
$destinations=getDestinations();
           
            foreach($destinations as $d): ?>

<tr>
<td><?= $d->name ?> </td>
<td><?= $d->description?></td>
<td><?= $d->picture?></td>
<td><?= $d->price?></td>
<td><?= $d->hot ?> </td>
<td> <a href='#' class='delete-dest' data-id='<?= $d->dest_id?>'>DELETE</a></td>
</tr>
<?php endforeach; ?>

</tbody>
</table>
</div>



<!-- FORM FOR ADD NEW USER -->
          <div class="col-md-12 col-lg-8 mb-5" id="addUpdateDest">
       <form  method="POST" action="models/destinations/insert.php"class="p-5 bg-white" enctype="multipart/form-data">
            <h3 class="mb-5" >Add destination</h2>

            <input type="hidden" id="hiddenId" />

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="name">Name</label>
                  <input type="text" id="dName" name="dName" class="form-control" placeholder="Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="name">Description</label>
                  <textarea id="dDesc" name="dDesc" class="form-control" placeholder="Add description"></textarea>
                </div>
              </div>

              <div class="row form-group">
                  <div class="col-md-12 mb-3 mb-md-0">
                      <label class="font-weight-bold" for="name">Photo</label>
                      <input type="file" id="dImg" name="dImg" class="form-control" placeholder="Choose Image">
            </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Price</label>
                  <input type="text" id="dPrice" name="dPrice" class="form-control" placeholder="Price">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Hot</label>
                  <input type="text" id="dHot" name="dHot" class="form-control" placeholder="Is on dicount">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Add destination" id="btnAddDest" name="btnAddDest" class="btn btn-primary pill text-white px-5 py-2">
                </div>
                <br/>
                <br/>
              
              </div>

  
            </form>

          
          </div>
         
    


</div>
<br/>


</div>
<br/>
<div class="row" id="statistics">
<?php
include "models/users/access_functions.php"; 

   $pages=allPages();
   $br=count($pages);
   $acces=accessPercentage();
   $log=numberOfLoged();
  ?>
<p> Number of logged users now: <?=$log ?> </p>
<br/>
<p>&nbsp;</p>
<p> Number of pages: <?=$br; ?> </p>

<table class="table table-hover">

<thead class="text-warning">
<?php foreach($pages as $p): ?>
    <th><?=$p?></th>
<?php endforeach; ?>
</thead>

<tbody id="stat">

  <tr>
  <?php foreach ($acces as $a) :?>
  <td><?=$a?> % </td>
<?php endforeach; ?>
  </tr>

</tbody>
</table>

</div>

<br/>







        
        </div>
        </div>





<?php else: ?>
<?php header("Location: index.php?page=login"); ?>
<?php endif; ?>