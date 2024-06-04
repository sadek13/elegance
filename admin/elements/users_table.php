
<table id='usersTable' class="table table-bordered table-hover">
      

  

      <thead>
    <tr>

     

 <th>First Name</th>
 <th>Last Name</th>
 <th>Email</th>
 <th>Password</th>
 <th>City</th>
 <th>Mobile</th>
      
  
</tr>

        </thead>
<tbody>
<?php 

foreach($allUsers as $sub){ ?>

<tr id="<?php echo $sub['userID']?>">
<td><?php echo $sub['first_name']?></td>
<td><?php echo $sub['last_name']?></td>
<td><?php echo $sub['email']?></td>
<td><?php echo $sub['password']?></td>
<td><?php echo $sub['city']?></td>
<td><?php echo $sub['mobile']?></td>



<?php } ?>
</tr>

</tbody>

</table>


