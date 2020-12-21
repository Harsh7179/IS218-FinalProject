<?php 
$userses=$_SESSION['userid'];
if (!isset($userses)){
	 header("Location: index.php");
   }
?>
<?php include 'views/header.php'; ?>
<?php include 'views/view-user.php'; ?>
  <div class="container" style="padding-top:10px;">
    <div class="col-md-5 mx-auto">
<div class = "panel panel-danger">
   <div class = "panel-heading">
        <b>Recently Added Question</b>
   </div>
   
   <div class = "panel-body">
   <div class = "panel-body text-center">
      This is your newly added question
      </div>
        <table class = "table">
            <tr>
          <th>Title</th>
          <th>Creation Date</th>
		  <th>Body </th>
		  <th>Skills </th>
		  <th>Score</th>
				</tr>
        <?php
			    $qclass= new questionData();
              $sql1=questionData::latest_question($userses);
			  while($que1=$sql1->fetch(PDO::FETCH_ASSOC)){
			    ?>
            <tr>
         <td><?php echo $que1['title']; ?></td>
         <td><?php echo $que1['createddate']; ?></td>
		 <td><?php echo $que1['body']; ?></td>
         <td><?php echo $que1['skills']; ?></td>
		 <td><?php echo $que1['score']; ?></td>
			 <?php } ?>
       </table>
    </div>
      
       </div>
	 <div><br> <a href="index.php?action=display_questions"><center><button class="btn btn-lg btn-success center" > All My Questions Page </button></a></div> 
     </div>
	 
<div class="col-md-7 mx-auto">
    <div class = "panel panel-danger">
	  <div class = "panel-heading">
		<b>Questions Toggle : Dynamic Tabs </b>
	</div>
	  <div class = "panel-body">
   <div class = "panel-body text-center">
        <ul class="nav nav-tabs">  
    <li class="active"><a data-toggle="tab" href="#home">My Questions</a></li>  
    <li><a data-toggle="tab" href="#menu1"> View All Questions</a></li>
  </ul>  
      </div>
	   <div class="tab-content">  
    <div id="home" class="tab-pane fade in active">
              <table class = "table">
            <tr>
		  <th>ID</th>
          <th>Title</th>
          <th>Creation Date</th>
		  <th>Body </th>
		  <th>Skills </th>
		  <th>Score</th>
				</tr>
           <?php
              $sqlq=questionData::all_user_questions($userses);
			    while ($quemy=$sqlq->fetch(PDO::FETCH_ASSOC)){
			     ?>
            <tr>
		 <td><?php echo $quemy['id']; ?></td>
        <td><a href="index.php?action=single_question_view&id=<?php echo $quemy['id']; ?>"> <?php echo $quemy['title']; ?> </a> </td>
         <td><?php echo $quemy['createddate']; ?></td>
		 <td><?php echo $quemy['body']; ?></td>
         <td><?php echo $quemy['skills']; ?></td>
		 <td><?php echo $quemy['score']; ?></td>
			 <?php } ?>
       </table> 
    </div>  
	
	
    <div id="menu1" class="tab-pane fade">
                      <table class = "table">
          <tr>
		  <th>ID</th>
           <th>Title</th>
           <th>Creation Date</th>
		    <th>Body </th>
		    <th>Skills </th>
		    <th>Score</th>
		</tr>
		
           <?php
              $sqla= questionData::all_questions();
			     while ($quea=$sqla->fetch(PDO::FETCH_ASSOC)){
			     ?>
            <tr>
		 <td><?php echo $quea['id']; ?></td>
         <td><a href="index.php?action=single_question_view&id=<?php echo $quea['id']; ?>"> <?php echo $quea['title']; ?> </a> </td>
         <td><?php echo $quea['createddate']; ?></td>
		 <td><?php echo $quea['body']; ?></td>
         <td><?php echo $quea['skills']; ?></td>
		 <td><?php echo $quea['score']; ?></td>
             </tr>
		    <?php } ?>
       </table>
    </div>   
  </div> 
     </div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</div>
 </div>
<?php include 'views/footer.php'; ?>