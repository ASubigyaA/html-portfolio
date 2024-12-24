<?php
$conn=mysqli_connect("localhost","root","","client");
if(!$conn)
{
    die("Connectionfailed.".mysqli_connect_error());
}
?>
