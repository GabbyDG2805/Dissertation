<?php

if (isset($_POST['login-sumbit']))
{
    require 'dbh.php';

    $username = $_POST['Username'];
    $password = $_POST['pwd'];

    if(empty($username) || empty($password))
    {
        header("Location: ../login.php?error=emptyfields&username=".$username);
        exit();
    }
    else
    {
        $sql = "SELECT * FROM users WHERE Username=?;";
        $statement = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($statement, $sql))
        {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($statement, "s", $username);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            if($row = mysqli_fetch_assoc($result))
            {
                $passwordCheck = password_verify($password, $row['Pwd']);
                if($passwordCheck == false)
                {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
                else if($passwordCheck == true)
                {
                    session_start();
                    $_SESSION['UserID'] = $row['ID'];
                    $_SESSION['Username'] = $row['Username'];
                    $_SESSION['Region'] = $row['Region'];
                    $_SESSION['Rank'] = $row['Division'];
                    $_SESSION['Level'] = $row['Lvl'];

                    header("Location: ../login.php?login=success");
                    exit();
                }
                else
                {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
            }
            else
            {
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }

}
else
{
    header("Location: ../login.php");
    exit();
}