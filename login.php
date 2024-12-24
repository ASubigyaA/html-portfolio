<html>

    <head>
        
        <title>
            Crossway- For Crunchy Chicken And Crispy Burger
        </title>

        <link rel="stylesheet" href="Register.css">

    </head>


    <body>


        <?php 

            require "conn.php";
            $usererr="";$passerr="";$varname="";$count=0;$varpass="";$same="";$varname1="";$varpass1="";

            function test($a){
                $a=trim($a);
                $a=stripslashes($a);
                $a=htmlspecialchars($a);
                return $a;
            }

            if(isset($_POST["nb"]))
            {
                

                if($_SERVER['REQUEST_METHOD']== "POST")
                {

                    $uname=test($_POST["uname"]);
                    $pass=test($_POST["pass"]);
                
                    if(empty($uname))
                    {
                        $usererr="field required";
                    }
                    elseif (!preg_match("/^[a-zA-Z-' ]*$/",$uname)) 
                    {
                        $usererr = "Only letters and white space allowed";
                    }
                    else
                    {
                        $sql1="SELECT * FROM `customers` WHERE `Username`='$uname'";
                        $varname=mysqli_query($conn,$sql1);
                        if(mysqli_num_rows($varname)==1)
                        {
                            $varname1=mysqli_fetch_assoc($varname);
                            if ($varname1['Username'] != $uname) 
                            {
                                $usererr="Wrong Username";
                            }
                        }
                    }

                    if(empty($pass))
                    {
                        $passerr="field required";
                    }
                    else
                    { 
                        $sql2="SELECT * FROM `customers` WHERE `P_assword`='$pass'";
                        $varpass=mysqli_query($conn,$sql2);
                        if(mysqli_num_rows($varpass)==1)
                            {
                                $varpass1=mysqli_fetch_assoc($varpass);
                                if ($varpass1['P_assword'] != $pass) 
                                {
                                    $passerr="Incorrect Password";
                                    exit();
                                }
                            }
                    }

                    $sql3="SELECT * FROM `customers` WHERE `Username`='$uname' AND `P_assword`='$pass'";
                    $same=mysqli_query($conn,$sql3);
                    if(mysqli_num_rows($same)==1)
                    {
                        $row=mysqli_fetch_assoc($same);
                        session_start();
                        $_SESSION['C_Id']=$row['C_Id'];
                        $_SESSION['f_name'] = $row['f_name'];
                        $_SESSION['s_name'] = $row['s_name'];
                        $_SESSION['Username'] = $row['Username'];
                        $_SESSION['P_assword']=$row['P_assword'];
                        $_SESSION['Email'] = $row['Email'];
                        $_SESSION['Phone_no'] = $row['Phone_no'];

                        header("Location: Myaccount.php");
                    }
                    else{
                        $usererr="Wrong Username or password";
                    }

                    mysqli_close($conn);
                }
            
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

                            

                            <tr> <td> <label>Username: </label> </td> <td> <input type="text" name="uname" value="" placeholder="Username"></td>
                            <td> <label>&emsp;Password: </label> </td> <td> <input type="password" name="pass" value="" placeholder="Password"></td></tr>

                            <tr> <td colspan="2"> <span class="error"><?php echo $usererr; ?> </span> </td>
                            <td colspan="2"> <span class="error"><?php echo "&emsp;&ensp;".$passerr; ?></span> </td> </tr>

                            

                            <tr><td colspan="4"><button type="submit" name="nb">Login</button></td></tr>

                    </form>
                </table>
                </div>
            
    </body>


</html>