<?php
require 'conn.php';

session_start();
    $id = $_SESSION['C_Id'];
    $fname = $_SESSION['f_name'];
    $sname = $_SESSION['s_name'];
    $user = $_SESSION['Username'];
    $email = $_SESSION['Email'];
    $word=$_SESSION['P_assword'];
    $phone=$_SESSION['Phone_no'];
   
    $sql = "UPDATE customers SET f_name = '$fname',
                s_name = '$sname',
                Username = '$user',
                Email = '$email',
                P_assword='$word',
                Phone_no='$phone'
                where C_Id = '$id'";

    $data = mysqli_query($conn,$sql);

    if ($data)
    {
        header("Location: Myaccount.php");
       
    ?>
        <META HTTP-EQUIV="refresh"  CONTENT="10; URL=Myaccount.php"&gt;
    <?php
    }
    else
    {
        echo " record not updated ";
    }

   
?>