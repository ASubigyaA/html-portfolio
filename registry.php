<html>

    <head>
        
        <title>
            Crossway- For Crunchy Chicken And Crispy Burger
        </title>

        <link rel="stylesheet" href="Register.css">

    </head>


    <body>


        <?php 

            $firsterr="";$lasterr="";$usererr="";$passerr="";$phoneerr="";$mailerr="";$count=0;
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
                $fname=test($_POST["fname"]);
                $sname=test($_POST["sname"]);
                $uname=test($_POST["uname"]);
                $email=test($_POST["mail"]);
                $pass=test($_POST["pass"]);
                $phone=test($_POST["phone"]);

            
            $sql1="INSERT INTO customers VALUES('','$fname','$sname','$uname','$email','$pass','$phone')";
            mysqli_query($conn,$sql1);
            mysqli_close($conn);
            
            header("Location: login.php");

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

                            <tr><td><label>First Name: </label></td> <td><input type="text" name="fname" value="" placeholder="First Name"> </td>
                            <td><label>&emsp;Last Name: </label></td> <td><input type="text" name="sname" value="" placeholder="Enter email"> </td> </tr>

                            <tr> <td colspan="2"> <span class="error"><?php echo $firsterr; ?></span> </td>
                            <td colspan="2"> <span class="error"><?php echo "&emsp;&ensp;".$lasterr; ?></span> </td> </tr>

                            <tr> <td> <label>Username: </label> </td> <td> <input type="text" name="uname" value="" placeholder="Username"></td>
                            <td> <label>&emsp;Password: </label> </td> <td> <input type="password" name="pass" value="" placeholder="Password"></td></tr>

                            <tr> <td colspan="2"> <span class="error"><?php echo $usererr; ?> </span> </td>
                            <td colspan="2"> <span class="error"><?php echo "&emsp;&ensp;".$passerr; ?></span> </td> </tr>

                            <tr> <td> <label>Email: </label> </td> <td> <input type="e-mail" name="mail" placeholder="E-Mail">
                            <td> <label>&emsp;Phone no: </label></td><td><input type="number" name="phone" placeholder="Phone no."> </tr>
                            
                            <tr> <td colspan="2"> <span class="error"><?php echo $mailerr; ?></span> </td>
                            <td colspan="2"> <span class="error"><?php echo "&emsp;&ensp;".$phoneerr; ?></span> </td> </tr>

                            <tr><td colspan="4"><button type="submit" name="nb">Register</button></td></tr>

                    </form>
                </table>
                </div>
            
    </body>


</html>

                


       