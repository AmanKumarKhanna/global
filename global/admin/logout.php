<?php
			session_start();
			unlink($session);
			session_destroy();

			header("location:../index.php");
?>