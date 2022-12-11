<?php 
hello
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"ajaxcurd");

$sql = "select * from ajaxinsert";
$result = mysqli_query($con,$sql);
 $rowcount=mysqli_num_rows($result);
if($rowcount > 0)
{
	while($row = mysqli_fetch_array($result))
	{?>
		<tr>
			<td><?php echo $row['id'] ?></td>
			<td><?php echo $row['username'] ?></td>
			<td><?php echo $row['password'] ?></td>
			<td><button onclick=" return editUser(<?php echo $row['id'] ?>)" class="btn btn-info">Edit</button></td>
			<td><button onclick=" return deleteUser( <?php echo $row['id'] ?>)" class="btn btn-danger">Edit</button></td>
			
		</tr>
	<?php
	} 
} 
 ?>
 
 <!DOCTYPE html>
 <html>
 <head>
 </head>
 <body>
 <script type="text/javascript">
 	function deleteUser(id)
 	{
 		$.ajax({
 			url:"delete.php",
 			type:"POST",
 			data:{id:id},
 			 success:function(data)
 			 {
 			 	console.log(data);
 			 }
 		});
 	}

 	function editUser(id)
 	{
 		$.ajax({
 			url:"edit.php",
 			type:"POST",
 			data:
 			success:function(data)
 			{
 				$("#edit").html(data);
 			}
 		});
 	}
 </script>
 </body>
 </html>

