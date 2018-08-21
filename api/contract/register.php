<?php 
    //session_start();
    include("../common/db.php");
    if(empty($_POST))
    die("Invalid Argumanets");

    //if(isset($_POST) && !empty($_POST)) {

        $firstname = stripslashes($_POST["fname"]); 
        $firstname = mysqli_real_escape_string($conn,$_POST["fname"]);
        //echo $firstname;

        $lastname = stripslashes($_POST["lname"]); 
        $lastname = mysqli_real_escape_string($conn,$_POST["lname"]);

    	$username = stripslashes($_POST["email"]); 
		$username = mysqli_real_escape_string($conn,$_POST["email"]);

        $password = stripslashes($_POST["psw"]); 
		$password = mysqli_real_escape_string($conn,$_POST["psw"]);

		$password = md5($password);

        $passwordagain = stripslashes($_POST["psw-repeat"]); 
        $passwordagain = mysqli_real_escape_string($conn,$_POST["psw-repeat"]);

        $passwordagain = md5($passwordagain);

        if($password == $passwordagain){
            $usernamesql = "SELECT * FROM dd_login WHERE `username` = '".$username."'";
            $usernameres = mysqli_query($conn, $usernamesql);
            $count = mysqli_num_rows($usernameres);
            if($count==1){
                echo "Username exists in database ,please try different username";
                //window.alert("Username exists in database ,please try different username");
                //window.alert("Hello world!");

                return false;
            }

        $result = mysqli_query($conn,"INSERT INTO `dd_login`(`first_name`, `last_name`, `username`, `password`, `type`) VALUES ('".$firstname."','".$lastname."','".$username."','".$password."',0)");
        echo $result;
         if($result){
            echo "User registered succesfully";
         }
         else
         {
            echo "Failed to register user";
         }
         }
        else{
            echo "password not matching";
        } 
    
           
	//}
?>