<?php
$userses=$_SESSION['userid'];
   if(!isset($userses)){
	 header("Location: index.php");
   }
?>
<?php include 'views/header.php'; ?>
<section class="question">
<div class="container">
<div class="row">
<div class="col-sm-12">
    <form action="" method="post" name="squestion">
		 <input type="hidden" name="action" value="post_question">
	<div class="single">
<h2>Submit a new Question</h2>
		<?php
			if (isset($err)) {
				?>
					<center> <p class="alert alert-danger"><?php  echo $err; ?> </p></center>
					<?php
				} 
			?>
		  <div class="form-group">
			 <label class="left"> The Title of the Question </label>
			 <input name="title" type="text" class="form-control my-input" id="name" placeholder="Question Title" required>
		  </div>
		  <div class="form-group">
			 <label class="left"> The Skills </label>
			 <input type="text" name="skills" class="form-control my-input" id="name" placeholder="Skills" required>
		  </div>
		  <div class="form-group">
			   <label class="left"> The Body </label>
			   <textarea class="form-control" name="body" rows="4" cols="50" id="exampleFormControlTextarea1" rows="3"></textarea>
		  </div>
		  <div class="text-center ">
			 <button type="submit" name="submitq" class="btn btn-block btn-warning">Submit Now</button>
		  </div>
</div>
	</form>
</div>
</div>
</div>
</section>
  <?php  include 'views/footer.php'; ?>