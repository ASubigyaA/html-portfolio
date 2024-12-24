

<html>
    <head>
    <link rel="stylesheet" href="Register.css">
    </head>
   
    <body>
    <?php
session_start();
require "conn.php";
$firsterr="";$lasterr="";$usererr="";$passerr="";$phoneerr="";$mailerr="";$count=0;$fname="";$sname="";
$uname="";$email="";$pass="";$phone=0;
function test($a){
    $a=trim($a);
    $a=stripslashes($a);
    $a=htmlspecialchars($a);
    return $a;
}

if(isset($_POST["nb"]))
{
    require "Untitled-1.php";

    if($_SERVER['REQUEST_METHOD']== "POST")
    {
        $fname=test($_POST["fname"]);
        $sname=test($_POST["sname"]);
        $uname=test($_POST["uname"]);
        $email=test($_POST["mail"]);
        $pass=test($_POST["pass"]);
        $phone=test($_POST["phone"]);

        if(empty($fname))
        {
            $firsterr="field required";
        }
        elseif (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) 
        {
            $firsterr = "Only letters and white space allowed";
        }
        else{ $count=$count+1;}
        
        if(empty($sname))
        {
            $lasterr="field required";
        }
        elseif (!preg_match("/^[a-zA-Z-' ]*$/",$sname)) 
        {
            $lasterr = "Only letters and white space allowed";
        }
        else{ $count=$count+1;}
        
        if(empty($uname))
        {
            $usererr="field required";
        }
        elseif (!preg_match("/^[a-zA-Z-' ]*$/",$uname)) 
        {
            $usererr = "Only letters and white space allowed";
        }
        else{ $count=$count+1;}

        if(empty($email))
        {
            $mailerr="field required";
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $mailerr = "Invalid email format";
        }
        else{ $count=$count+1;}
        
        if(empty($pass))
        {
            $passerr="field required";
        }
        else{ $count=$count+1;}

        if(empty($phone))
        {
            $phoneerr="field required";
        }
        else{ $count=$count+1;}
}

if($count==6)
{
    execute();
}
}
function execute()
{
    require "conn.php";
    $_SESSION['f_name']=test($_POST["fname"]);
    $_SESSION['s_name']=test($_POST["sname"]);
    $_SESSION['Username']=test($_POST["uname"]);
    $_SESSION['Email']=test($_POST["mail"]);
    $_SESSION['P_assword']=test($_POST["pass"]);
    $_SESSION['Phone_no']=test($_POST["phone"]);

 
$id = $_SESSION['C_Id'];

$sql = "SELECT * FROM customers where C_Id='$id'";

$data = mysqli_query($conn, $sql);
foreach($data as $row){
       var_dump($row['C_Id']);
}
header("Location: updatedata.php");
}
?>
<div class="banner">

<center><h3>
<div class="purple">
    <br>
    CROSSWAY RESTAURANT, Tylanglphat,Kirtipur Phone no: 986901496
    <br>
</div> 
</center></h3>

<div class="blue">
    <h1>CROSSWAY RESTAURANT</h1>
</div>
</p>

<div class="wrapper">

    <table>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                            <tr><td><label>First Name: </label></td> <td><input type="text" name="fname" readonly value="<?php echo $_SESSION['f_name'];?>"> </td>
                            <td><label>&emsp;Last Name: </label></td> <td><input type="text" name="sname" readonly value="<?php echo $_SESSION['s_name'];?>"> </td> </tr>

                            <tr> <td colspan="2"> <span class="error"><?php echo $firsterr; ?></span> </td>
                            <td colspan="2"> <span class="error"><?php echo "&emsp;&ensp;".$lasterr; ?></span> </td> </tr>

                            <tr> <td> <label>Username: </label> </td> <td> <input type="text" name="uname" value="<?php echo $_SESSION['Username'];?>"></td>
                            <td> <label>&emsp;Password: </label> </td> <td> <input type="password" name="pass" value="<?php echo $_SESSION['P_assword'];?>"></td></tr>

                            <tr> <td colspan="2"> <span class="error"><?php echo $usererr; ?> </span> </td>
                            <td colspan="2"> <span class="error"><?php echo "&emsp;&ensp;".$passerr; ?></span> </td> </tr>

                            <tr> <td> <label>Email: </label> </td> <td> <input type="e-mail" name="mail" value="<?php echo $_SESSION['Email'];?>">
                            <td> <label>&emsp;Phone no: </label></td><td><input type="number" name="phone" value="<?php echo $_SESSION['Phone_no'];?>"> </tr>
                            
                            <tr> <td colspan="2"> <span class="error"><?php echo $mailerr; ?></span> </td>
                            <td colspan="2"> <span class="error"><?php echo "&emsp;&ensp;".$phoneerr; ?></span> </td> </tr>

                            <tr><td colspan="4"><button type="submit" name="nb">Update</button></td></tr>

        
        </form>
        </table>
                </div>
    </body>
</html>