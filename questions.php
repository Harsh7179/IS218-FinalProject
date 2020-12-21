<?php
$userses=$_SESSION['userid'];
if (!isset($userses)){
	 header("Location: index.php");
}
?>
<?php include 'views/header.php'; ?>
     <div style="padding-top:50px;" class="container">
   <div class="row">
    <div style="padding-top:40px;" class="col-md-12 mx-auto">
<div class = "panel panel-danger">
   <div class = "panel-heading">
        <b> All  Your Added Questions </b>
   </div>
   
   <div class = "panel-body">
   <div class = "panel-body text-center">
      This is the list of your all added questions
      </div>
        <table class = "table">
          <tr>
		  <th>ID</th>
           <th>Title</th>
           <th>Creation Date</th>
		    <th>Body </th>
		    <th>Skills </th>
		    <th>Score</th>
			 <th class="center">User Action</th>
		</tr>
		
           <?php
              $sqlq= questionData::all_user_questions($userses);
			 while ($que=$sqlq->fetch(PDO::FETCH_ASSOC)){
			     ?>
            <tr>
		 <td><?php echo $que['id']; ?></td>
         <td><?php echo $que['title']; ?></td>
         <td><?php echo $que['createddate']; ?></td>
		 <td><?php echo $que['body']; ?></td>
         <td><?php echo $que['skills']; ?></td>
		 <td><?php echo $que['score']; ?></td>
     <td> <br> <a href="index.php?action=display_edit_question&id=<?php echo $que['id']; ?>"><button class="btn btn-xs btn-primary" > Update </button></a> </td>
     <td> <br> <a href="index.php?action=delete_question&id=<?php echo $que['id']; ?>"><button class="btn btn-xs btn-danger" > Delete </button></a> </td>
             </tr>
		    <?php } ?>
       </table>
    </div>
       </div>
     </div>
	
   </div>
 </div>
<?php include 'views/footer.php'; ?>