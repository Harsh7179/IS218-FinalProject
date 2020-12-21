<?php include_once 'DB_connect.php'; 

if(isset($_POST['submitq']))
{
	$title =trim($_POST['title']);
	$skills=trim($_POST['skills']);
	$body=trim($_POST['body']);
	$getemail=$DB_con->prepare("SELECT * FROM accounts WHERE id='$userses' ");
	$getemail->execute();
	$name=$getemail->fetch(PDO::FETCH_ASSOC); 
	$e=$name['email'];
	$d= date("Y-m-d h:i:s");

	if (empty($title)){
			$err="Please provide your Title!";
		}else if (empty($skills)){
			$err="Please provide Skills!";
		}else if (empty($body)){
			$err="Please add the Body!";
		}
		if(empty($err)){
		  try
			{
				$add = $DB_con->prepare("INSERT INTO questions(owneremail, ownerid, createddate, title, body, skills)VALUES(:oe, :oi, :cd, :t, :b, :s)");
				$add->bindparam(":oe",$e);
				$add->bindparam(":oi",$userses);
				$add->bindparam(":cd",$d);
				$add->bindparam(":t",$title);
				$add->bindparam(":b",$body);
				$add->bindparam(":s",$skills);
				$add->execute();	
			}
			catch(PDOException $e)
				{
			echo $e->getMessage(); 
			}
			if($add){
				?>
			  <script type="text/javascript">alert("Your Question has been added Successifully. Go to the dashboard and View");</script>
			  <?php
			("Location: dashboard.php"); 
		}

	}
}

?>
