<?php


$Username = $_POST['username'];
$Password = $_POST['password'];
$Age = $_POST['age'];

echo  "<h1 style='color: black ; text-align: center; ;>Welcome $Username <br>Password: $Password <br>Age: $Age </h1>";


if(isset($_POST['username'])) {
    echo $_POST['username'];
}else {
    echo "ada";
}
?>



