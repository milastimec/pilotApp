<?php
    require "header.php"
?>
 
    <main>
        <div>
            <section>
                <h1> Signup</h1>
                <span>

                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == "emptyfields"){
                            echo '<p class="signuperror"> Fill in all the fields! </p>';
                        }
                        else if($_GET['error'] == "invalidemail"){
                            echo '<p class="signuperror"> Enter a real E-mail! </p>';
                        }
                        else if($_GET['error'] == "invalidname"){
                            echo '<p class="signuperror"> Enter a correct name! </p>';
                        }
                        else if($_GET['error'] == "passerror"){
                            echo '<p class="signuperror"> The passwords are not the same! </p>';
                        }
                        else if($_GET['error'] == "mysqlerror"){
                            echo '<p class="signuperror">Sorry, we are having problems with database! </p>';
                        }
                        else if($_GET['error'] == "emailtaken"){
                            echo '<p class="signuperror">Sorry, looks like you already have an account! </p>';
                        }
                    }

                ?>
                </span>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="mail" placeholder="E-mail">
                    <input type="text" name="name" placeholder="name">
                    <input type="text" name="surname" placeholder="surname">
                    
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                    <button type="submit" name="signup-submit"> Sign Up </button>
                </form>

            </section>
        </div>

    </main>


<?php
     require "footer.html"
?>