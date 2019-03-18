<?php
    $servername = "*";
    $dbUsername = "*";
    $dbPassword = "*";
    $database = "*";
    
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $mailingAddress = $_POST["mailingAddress"];
    $postcode = $_POST["postcode"];
    $cardNumber = $_POST["cardNumber"];
    $cardExpirePOST = $_POST["cardExpire"];
	$cardExpire = str_replace("/", "", $cardExpirePOST);
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = mysqli_connect($servername,$dbUsername,$dbPassword);
    mysqli_select_db($conn,$database);
    $sql = "SELECT * FROM TBLUSERS WHERE USERNAME = '$email'";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        echo "<script>alert('registered email!')</script>";
        echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=registration.html">';
    }
    $sql = "INSERT INTO TBLUSERS (FIRSTNAME,LASTNAME,ADDRESS,POSTCODE,
        CreditCardNum,CreditCardExpireDate,USERNAME,PASSWORD) VALUES ('$firstName','$lastName',
        '$mailingAddress','$postcode','$cardNumber','$cardExpire','$email','$password')";//
    $res = mysqli_query($conn,$sql);
    if($res)
    {   
        echo "<script>alert('reg success!')</script>";
        //echo "<p>registration success,after 3s jump to log-in page</p>";
        echo "<p>Hello, <b>$firstName $lastName</b>!</p>";
        echo "<p>Here is your regitration information:</p>";
        echo "<p>Your first name is: <b>$firstName</b></p>";
        echo "<p>Your last name is: <b>$lastName</b></p>";
        echo "<p>Your mailing address is: <b>$mailingAddress</b></p>";
		echo "<p>Your postcode is: <b>$postcode</b></p>";
		echo "<p>Your card number is: <b>$cardNumber</b></p>";
		echo "<p>Your card expire date is: <b>$cardExpirePOST</b></p>";
		echo "<p>Your email[username] is: <b>$email</b></p>";
		echo "<p>Your password is: <b>$password</b></p>";

        echo "<p>Now you can log in with your email <b>$email</b> and pick the books you like!</p>";
		echo "<a href='log-in.html'>Click here to log in</a>";
        
    }else{
        echo "<script>alert('reg failed~')</script>";
        echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=registration.html">';
    }
       
?>      
