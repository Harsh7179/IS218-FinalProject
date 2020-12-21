<?php 
if (isset($_GET['id'])){
	$qid=$_GET['id'];
  }
  
$userses=$_SESSION['userid'];
  if (!isset($userses)){
	   header("Location: index.php");
     }
?>
<?php include 'views/header.php'; ?>
 <div class="container">
<div class="col-md-4" style="background:#dff7df;" >
	<div class="single">
	<?php
	     $qclass= new questionData();
		$viewq=questionData::view_one_question($qid);
      ?>
<h2> <br>  You are Viewing Question ID (<?php echo $qid; ?>)</h2>

		  <div class="form-group">
			 <label class="left"> The Title of the Question: </label>
			 <br>
		     <?php echo $viewq['title'];?>
		  </div>
		  <div class="form-group">
			 <label class="left"> The Skills: </label>
			 <br>
			 <?php echo $viewq['skills'];?>
		  </div>
		  <div class="form-group">
	      <label class="left"> The Body: </label>
		  <br>
	      <?php echo $viewq['body']; ?></textarea>
		  </div>
		  <div class="form-group">
			 <label class="left"> Score: </label>
			 <br>
		    <?php echo $viewq['score'];?> 
		      </div>
		  <div class="form-group">
			 <label class="left"> Created on: </label>
			 <br>
		  <?php echo $viewq['createddate'];?>
		  </div>
		 <div class="form-group">
			 <label class="left"> Owner Email: </label>
			 <br>
		  <?php echo $viewq['owneremail'];?>
	 </div>
   </div>
</div>
  <div class="col-md-5">
	<div class="single">
	  <h2> <br>  Answers to This Question </h2>
	  <?php
	      $aclass= new answersData();
	    $quea=answersData::get_answers($qid);
		 if($quea->rowCount() == 0){
			    ?>
			 <p class="alert alert-info" > * The Question has no Answeres yet * </p>
			 <?php
		 }else{
		   while ($ans=$quea->fetch(PDO::FETCH_ASSOC)){
			     ?>
				 <div class="col-md-9">
                    <p class="alert alert-info" >  <?php echo $ans['answer'];?> 
					</div>
					<div class="col-md-3">
                    Score:
					<br>
				<b>	
               <a href="index.php?action=upvote_answer&aid=<?php echo $ans['aid']; ?>"> <span style='font-size:27px; color:blue;'>&#8687;</span></a> 
                      <?php echo $ans['answerscore'];?> 
			   <a href="index.php?action=downvote_answer&aid=<?php echo $ans['aid']; ?>"> <span style='font-size:27px; color:red; '>&#8681;</span></a> 
					 </b>
					</div>
			   </p>
          <?php 
		    }
		  }
	   ?>
</div>
</div>
<?php include 'views/post-answer.php'; ?>
 </div>

<?php include 'views/footer.php'; ?>