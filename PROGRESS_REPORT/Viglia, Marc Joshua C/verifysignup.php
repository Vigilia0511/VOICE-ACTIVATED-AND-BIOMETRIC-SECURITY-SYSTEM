<?php  
    session_start();
    require "include/connect.php";
?>
<?php 
    if(isset($_POST['sub'])){
        $username=addslashes($_POST['username']);
        $password=sha1(md5($_POST['password']));
        $fname=addslashes(ucwords(strtolower(trim($_POST['fname']))));
        $lname=addslashes(ucwords(strtolower(trim($_POST['lname']))));
        $mname=addslashes(ucwords(strtolower(trim($_POST['mname']))));
        $sex=$_POST['sex'];

        $checkuser=$db->query("SELECT * FROM users WHERE username='$username'") or die($db-error);
        $countuser=$checkuser->num_rows;

        if($countuser==0){
            $insert=$db->query("INSERT INTO users (username, password) VALUES('$username', '$password')") or die($db->error);
            $insert=$db->query("INSERT INTO profiles (lname, fname, mname, sex) VALUES('$lname', '$fname', '$mname', '$sex')") or die($db->error);

            $_SESSION['msg1']="SUCSESSFUL";
            header("Location: index.php");
        }else{
            $_SESSION['msg']="USERBNAME ALREADY TAKEN";
            header("Location: signup.php");
        }
    }
?>
