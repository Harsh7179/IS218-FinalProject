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
<section class="question">
<div class="container">
<div class="row">
<div class="col-sm-12">
    <form action="" method="post" name="squestion">
	 <input type="hidden" name="action" value="edit_question">
	<div class="single">
	<?php
	 $qclass= new questionData();
		$qedit=questionData::view_edit_question($qid);
      ?>
<h2>Show and Edit Question <br>  The ID of the question below is (<?php echo $qid;  ?> )</h2>

		  <div class="form-group">
			 <label class="left"> The Title of the Question </label>
			 <input name="title" type="text" class="form-control my-input" id="name" value="<?php echo $qedit['title'];?>" required>
		  </div>
		  <div class="form-group">
			 <label class="left"> The Skills </label>
			 <input type="text" name="skills" class="form-control my-input" id="name" value="<?php echo $qedit['skills'];?>" required>
		  </div>
		  <div class="form-group">
			   <label class="left"> The Body </label>
			   <textarea class="form-control" name="body" rows="4" cols="50" id="exampleFormControlTextarea1" rows="3"> <?php echo $qedit['body'];?></textarea>
		  </div>
		  <div class="form-group">
			 <label class="left"> Score </label>
			 <input type="text" name="score" class="form-control my-input" id="name" value="<?php echo $qedit['score'];?>" required>
		  </div>
		  <div class="text-center ">
			 <button type="submit" name="updateq" class="btn btn-block btn-warning">Update This Question</button>
		  </div>
</div>
	</form>
</div>
</div>
</div>
</section>
  <?php  include 'views/footer.php'; ?>