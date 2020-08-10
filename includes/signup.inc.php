<?php
if(isset($_POST['signup-submit']))
{
    require "dbh.inc.php";

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat))
    {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username))
    {
        header("Location: ../signup.php?error=invalidemailuid");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../signup.php?error=invalidemail&uid=".$username);
        exit();
    }
    // Inside the preg_match function we write the SEARCH PATTERN which contains the tokens whose combinations are allowed as the value of the variable
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
    {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if($password !== $passwordRepeat)
    {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else                                                        // Checking that if the username is already taken 
    {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0)
            {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else
            {
                $sql = "INSERT INTO users(uidUsers,emailUsers,pwdUsers) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else
                {
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);                        // Hashed the password So that if any hacker gets access to our database so the password is not flat-out written but encrypted

                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedpwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../signup.php");
    exit();
}

?>