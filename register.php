<?php 
require('model/database.php');
require('model/accounts_db.php');
?>

<?php include 'views/header.php';?>

   <div style="padding-top:50px;" class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Register An Account
            </h1>
            <h2 class="wv-heading--subtitle">
               You will get to Post your questions and also view you previously posted questions
			  
			  <div> <br><a href="index.php"><button class="btn btn-md btn-warning" > Click here Login </button></a></div> 
            </h2>
         </div>
      </div>
      <div class="row">
         <div style="padding-top:40px; background: #ccbf73;" class="col-md-4 mx-auto">
            <p class="alert alert-info" > * Ensure that all details are valid! </p>
			<div class="myform form">
			     <?php
				if(isset($err)) {
					?>
				 <center> <p class="alert alert-danger"><?php  echo $err; ?>  </p></center>
					<?php
				        } 
				     ?>
				   <?php
				if (isset($success)) {
					?>
				 <center> <p class="alert alert-danger"><?php  echo $success; ?>  
				 Log In now <a href="index.php"> <button class="btn btn-md btn-warning" ></button></a></p></center>
					<?php
				      } 
				  ?>
               <form action="index.php" method="post" name="login">
			   <input type="hidden" name="action" value="reg_user">
                  <div class="form-group">
                     <input type="email" name="email" type="email" class="form-control my-input" id="name" placeholder="Your Email Address" required>
                  </div>
				  <div class="form-group">
                     <input type="text" name="fname" type="text" class="form-control my-input" id="name" placeholder="Your First Name" required>
                  </div>
				  <div class="form-group">
                     <input type="text" name="lname" type="text" class="form-control my-input" id="name" placeholder="Your Last Name" required>
                  </div>
				  <div class="form-group">
                     <input type="text" name="birthday" type="text" class="form-control my-input" id="name" placeholder="Your Birth Day (YYYY-MM-DD)" required>
                  </div>
                  <div class="form-group">
                     <input type="text" name="password" type="password" class="form-control my-input" id="email" placeholder="Your Password" required>
                  </div>
                  <div class="text-center ">
                     <button type="submit" name="register" class=" btn btn-block btn-warning send-button tx-tfm">Register Now</button>
					   <p class="alert alert-sucess"> After registration, Proceed and Login</p>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   
  <?php  include 'views/footer.php'; ?>
