<?php
require "header.php";
?>

<main>
    <div class="wrapper-main">
        <section class="section-default">
            <h1>Signup</h1>
            <!-- Error Messages -->
            <?php
                if(isset($_GET['error']))
                {
                    if($_GET['error'] == "emptyfields")
                    {
                        echo '<p class = "signuperror">Fill in all fields!</p>';
                    }
                    else if($_GET['error'] == "invalidemailuid")
                    {
                        echo '<p class = "signuperror">E-mail and Username both do not match!</p>';
                    }
                    else if($_GET['error'] == "invalidemail")
                    {
                        echo '<p class = "signuperror">E-mail do not match!</p>';
                    }
                    else if($_GET['error'] == "invaliduid")
                    {
                        echo '<p class = "signuperror">The username is wrong!</p>';
                    }
                    else if($_GET['error'] == "passwordcheck")
                    {
                        echo '<p class = "signuperror">Your Password do not match!</p>';
                    }
                    else if($_GET['error'] == "usertaken")
                    {
                        echo '<p class = "signuperror">Username already taken!</p>';
                    }
                }
                else if(isset($_GET['signup']))
                {
                    if($_GET['signup'] == "success")
                    {
                    echo '<p class = "signupsuccess">Signup Successful!</p>';
                    }
                }
            ?>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
                <button type="submit" name="signup-submit">Signup</button>
        </form>
        </section>
    </div>
</main> 


<?php
require "footer.php";
?> 