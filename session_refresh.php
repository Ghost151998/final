<?php
	session_start();
	if(session_id() != "" || isset($_SESSION)){
		session_unset(); // unset $_SESSION variable for the run-time 
		session_destroy(); // destroy session data in storage
	}
	session_start(); //start a new session
?>