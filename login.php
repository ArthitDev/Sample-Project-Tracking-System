<?php

include('header.php');

$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);
// output any connection error
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = $_POST['password'];

    $fetch = $mysqli->query("SELECT * FROM `employees` WHERE username='$username'");

    if ($fetch) {
        $row = $fetch->fetch_assoc();

        if ($row && password_verify($password, $row['password'])) {
            $_SESSION['login_username'] = $row['username'];
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo "Query failed: " . $mysqli->error;
    }
} else {
    header("Location: index.php");
}

?>

<?php include('footer.php'); ?>
