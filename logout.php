<?php
session_start();
    session_unset($userses);
	session_destroy($userses);
	header("Location: index.php");
?>