<?php
session_start();
function logout()
{
    unset($_SESSION["testUS"]);
    echo "<p>Log-out success, redirecting to Log-In page in 3s</p>";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=log-in.html">';
}
?>

<html>
<head>
<meta charset="utf-8"/>
</head>
<body>

<?php
logout();
?>

</body>
</html>
