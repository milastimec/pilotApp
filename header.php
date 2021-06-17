<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8">
        <meta name="description" content="something">
        <meta name=viewport content= "width=device-width, initial-scale=1">
        <title>PilotApp</title>
        <!-- stylesheet comes here, don't forget to add classes so you can style things down below -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </head>
    <body style= "margin: 0;
    display: flex;
    min-height: 100vh;
    flex-direction: column;">
        <header style="width=80%;">
            <nav class = "row container" style=" background-color: #0d6efd; color:white; margin: auto;">

                <ul style= "list-style-type: none; padding-top: 20px;  margin-top: 5px; display: block; overflow: hidden; padding: 8px; float: left;">
                    <div style="float: left; margin-right: 20px;display: block; text-decoration: none;"><li><a href="index.php" style="color:white;">Home</a></li> </div>
                    <div style="float: left; margin-right: 20px;display: block; text-decoration: none;"><li><a href="#" style="color:white;">Q&A</a></li> </div>
                    <div style="float: left; margin-right: 20px;display: block; text-decoration: none;"> <li><a href="#" style="color:white;">About us</a></li> </div>
                    <div style="float: left; margin-right: 20px;display: block; text-decoration: none;"><li><a href="#" style="color:white;">Contact</a></li> </div>
                </ul>
                
                <div style="float: right; margin-top: 5px; position: relative; display: block; overflow: hidden; padding: 8px;">
                    <?php
                        if(isset($_SESSION['user']) || isset($_SESSION['newuser'])){
                            echo '<form action="includes/logout.inc.php" method="post"> <!--.inc - only executive files, you cannot see them-->
                                    <button type="submit" name="logout-submit" class="btn btn-secondary"> LogOut </button>
                                    </form>';
                            
                        }
                        else{
                            echo '
                            
                            <form action="includes/login.inc.php" method="post" class="form-inline" >
                            <div class="form-group mb-1 row">
                                <div class= "col-md-2 mb-1 col">
                             <input type="text" name="mail" placeholder="e-mail" class="form-control" style="width: 200px; margin: 10px;">
                                </div>
                                <div class= "col-md-2 mb-1 col">
                             <input type="password" name="pwd" placeholder="password" class="form-control" style="width: 200px;margin: 10px;">
                                </div>
                             <div class="col-mb-1 col ">
                             <button type="submit" name="login-submit" class="btn btn-secondary" style="width: 100px;margin: 10px;"> Login </button>
                             </div></div></form>
                             <a href="signup.php" class="float-right" style= "color: white;  position: relative;"> Sign Up </a>';
                            //you see the first page explaining who we are (index.php)
                        }

                    ?>
                    
                    
                </div>
            </nav>
        </header>

    </body>
</html>