<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
?>  
<link rel="stylesheet" href="include/style1.css">
    <a href="logout.php" id="nav">LOGOUT</a>
    <center>
     <h1> <?php echo $_SESSION['username'];?></h1>
    </center> 
<?php
    }else{
        header("Location: index.php");
    }
?>
	