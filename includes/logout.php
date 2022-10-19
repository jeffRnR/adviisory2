<?php
session_start();

if (session_destroy()){
	header("Location: ../patient/index.php");
}

?>