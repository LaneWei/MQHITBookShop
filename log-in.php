<?php
session_start();

$testUS = $_POST["username"];
$testPW = $_POST["password"];

$servername = "202.118.249.4";
$username = "*";
$password = "*";
$database = "*";

$conn = mysqli_connect($servername, $username, $password);

if (mysqli_connect_errno()) {
    die("Connection failed to database: " . mysqli_connect_error());
} else {
    echo "Connection to database successful\n";
    echo "<br />";
}

// Use database
mysqli_select_db($conn, $database);

function loginCheck($conn, $StrU, $StrP)
{
    $sql = "select * from TBLUSERS 
            WHERE USERNAME = '$StrU'
            AND PASSWORD = '$StrP';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($result) {
                echo "<p>Log-In success, redirecting to bookstore page in 3s</p>";
                echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=bookshop.php">';
                return $StrU;
            }
        }
    }
    echo "<script>alert('Log-In failed')</script>";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=log-in.html">';
}

?>

<html>
<head>
<meta charset="utf-8"/>
</head>
<body>

<?php
$_SESSION["testUS"] = loginCheck($conn, $testUS, $testPW);
?>
</body>
</html> 