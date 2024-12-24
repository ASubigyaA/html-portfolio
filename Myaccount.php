<html>
    <head>
        <title>
            Crossway- For Crunchy Chicken And Crispy Burger
        </title>
        <link rel="stylesheet" href="MyAcc.css">
        <script src="Jquery.js"></script>
        <script>
            /*$(document).ready(function(){
            $(".texture").click(function(){
                $(".asd").slideDown("slow");
            });
            });*/
        </script>
    </head>
    <body>

        <?php 
        session_start();
        
        ?>

        <div class="banner">
            <center><h3>
            <div class="purple">
                <br>
                CROSSWAY RESTAURANT, Tylanglphat,Kirtipur Phone no: 986901496
                <br>
                <br>
            </div> 
            </center></h3>
                
            <div class="texture">
                <h1>WHERE HEALTHY FOOD <br>MEETS HEALTHY PEOPLE</h1>
                <ul>
                    <li><a href="Homepage1.html">Home</a></li>
                    <li><a href="Aboutus.html">About Us</a></li>
                    <li><a href="Menu.html">Menu</a></li>
                    <li><a href="#">Order</a></li>
                    <li class="asd"><a href="#">My Account</a></li>
                </ul>
            </div>
        </div>
        
        <div class="Content">
        <div class="wrapper">
        <img src="prof.png" >
        <table>
            <tr>
                <td>First Name: </td><td><?php  echo $_SESSION['f_name'];?></td>
            </tr>
            <tr>
                <td>Last Name: </td><td><?php  echo $_SESSION['s_name'];?></td>
            </tr>
            <tr>    
                <td>Username: </td><td><?php  echo $_SESSION['Username'];?> </td>
            </tr>
            <tr>
                <td>Phone no: </td><td><?php  echo $_SESSION['Phone_no'];?></td>
            </tr>
            <tr>
                <td>Email: </td><td><?php  echo $_SESSION['Email'];?></td>
            </tr>
            <tr> <td colspan="2">   <a href="update.php"><button type="button" >Update</button></a>
                                    <a href="delete.php"><button type="button" >Delete</button></a> 
            </td></tr>
        </table>
        </div>
        
        </div>
    </body>
    </html>