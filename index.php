<?php
require('model/database.php');
require('model/accounts_db.php');
require('model/questions_db.php');
//// log the user into the account
$action = filter_input(INPUT_POST, 'action');
  if(empty($action)){
   $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
       include 'views/login.php';
     }
   
   }else if ($action == 'show_register') {
      include('register.php');  
         }
  else if($action == 'reg_user'){
    $email=trim($_POST['email']);
	$fname=trim($_POST['fname']);
	$lname=trim($_POST['lname']);
	$bd=trim($_POST['birthday']);
    $pass=trim($_POST['password']);
	   if(empty($email)){ $err="please provide your Email!"; 
		    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $err="Enter a valid email address";
			}else if (empty($fname)){ $err="please provide your First Name!";
			}else if (empty($lname)){ $err="please provide your Last Name!";
			}else if (empty($bd)){ $err="please provide your Birthday!";
			}else if (empty($pass)){ $err="please provide your Passoword!"; }
	     if(empty($err)){
			           $newuser= new userData();
			    if (userData::reg_user($email, $fname, $lname, $bd, $pass)){
				    ?>
			  <script type="text/javascript">
			  alert("Your Account have been created Successifully. You will be redirected to the Login page in a Second");		  
			    </script>
				<?php
		    header("refresh: 1");
			}
		}
  }
  
  if($action == 'log_user'){
	//if(isset($_POST['login'])){
	$email =trim($_POST['email']);
    $pass = trim($_POST['password']);
	
	if(empty($email)){$err="Please provide your Email!";
		}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {$err="Enter a valid email address";
		}else if (empty($pass)){$err="Please provide your passoword!";}
	      if(empty($err)){
                $newuser= new userData();
			   if(userData::check_user($email, $pass)){
				   // created user session successifully //
			        header("Location: index.php?action=display_new_question");
			  }else{
			$err="Incorrect Login information !";
		  }
	  }
  }
else if($action == 'create_new_question'){
		include('post-question.php');
	}
	
else if($action == 'post_question'){	
	if(isset($_POST['submitq'])) {
		$userses=$_SESSION['userid'];  
		$title =trim($_POST['title']);
		$skills=trim($_POST['skills']);
		$body=trim($_POST['body']);
		
		// Question Class //
		$qclass= new questionData();
		   
          $ee=questionData::check_useremail($userses);
		  $e=$ee['email'];
		  $d= date("Y-m-d h:i:s");

	if(empty($title)){$err="Please provide your Title!";
		}else if (empty($skills)){$err="Please provide Skills!";
		  }else if (empty($body)){$err="Please add the Body!";}
		   if(empty($err)){
              questionData::create_new_question($e,$userses,$d,$title,$body,$skills);
		header("Location: index.php?action=display_new_question", 3); 
	}
  }
}

 else if ($action == 'display_questions'){
	 include('questions.php');
    } 
	
 else if ($action == 'display_new_question'){
	 include('dashboard.php');
   }
   
 else if ($action == 'display_edit_question'){
	 include('show_edit_questions.php');
 }	
 
 else if ($action == 'single_question_view'){
	 include('single-question-view.php');
 }	

 else if ($action == 'edit_question'){
   if (isset($_POST['updateq'])) {
		$title =trim($_POST['title']);
		$skills=trim($_POST['skills']);
		$body=trim($_POST['body']);
		$score=trim($_POST['score']);
		$qid=$_GET['id'];
		
	if (empty($title)){$err="Please provide your Title!";
	    }else if (empty($skills)){$err="Please provide Skills!";
		 }else if (empty($body)){$err="Please add the Body!";}
		  }else if (empty($score)){$err="Please add the Score!";}
		    if(empty($err)){
			   if (questionData::update_question($qid,$title,$body,$skills,$score)){
				   				    ?>
			  <script type="text/javascript">
			  alert("Question Updated Successifully");		  
			    </script>
				<?php
			header("Location: index.php?action=display_questions", 3);
		}
	}
  }
  else if ($action == 'post_answer'){
   if (isset($_POST['submita'])) {
		$answer =trim($_POST['answer']);
		$qid=$_GET['id'];

	if (empty($answer)){$err="Please provide answer!";
		} if(empty($err)){
			    $aclass= new answersData();
			   answersData::new_answer($qid,$answer);
			header("Location: index.php?action=single_question_view&id=$qid", 3);
	     }
     }
  
 } 
 
 else if ($action == 'upvote_answer'){
	   if (isset($_GET['aid'])){
				$aid=$_GET['aid'];
			   }
	          $aclass= new answersData();
	          $scorevalue=answersData::get_answers_vote($aid);
              $currentscore= $scorevalue['answerscore'];
			  $quesid=$scorevalue['questionid'];
              $newscore=$currentscore+1;
			  
			   answersData::update_answer_score($aid,$newscore);
			  header("Location: index.php?action=single_question_view&id=$quesid", 3);
 }
 else if ($action == 'downvote_answer'){
	   if (isset($_GET['aid'])){
				$aid=$_GET['aid'];
			   }
	          $aclass= new answersData();
	          $scorevalue=answersData::get_answers_vote($aid);
              $currentscore= $scorevalue['answerscore'];
			  $quesid=$scorevalue['questionid'];
              $newscore=$currentscore-1;
			  
			   answersData::update_answer_score($aid,$newscore);
			  header("Location: index.php?action=single_question_view&id=$quesid", 3);
 }
 else if ($action == 'delete_question'){
   include('show_delete_question.php');
 }
  
 else if ($action == 'del_question'){
	 $qid=$_GET['id'];
	 $qclass= new questionData();
	 questionData::delete_question($qid);
	 header("Location: index.php?action=display_questions", 3);
}
?>