<?php

if (isset($_POST['signup-sumbit']))
{
    require 'dbh.php';

    $email = $_POST['email'];
    $username = $_POST['Username'];
    $region = $_POST['Region'];
    $rank = $_POST['Rank'];
    $lvl = $_POST['Lvl'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-confirm'];

    if(empty($email) || empty($username) || empty($password) || empty($passwordRepeat))
    {
        header("Location: ../login.php?error=emptyfields&username=".$username."&email=".$email."&region=".$region."&rank=".$rank."&lvl=".$lvl);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../login.php?error=invalidemail&username=".$username."&region=".$region."&rank=".$rank."&lvl=".$lvl);
        exit();
    }
    else if($region == '' || $rank == '' || $lvl == '') 
    {
        header("Location: ../login.php?error=unselectedfields&username=".$username."&email=".$email."&region=".$region."&rank=".$rank."&lvl=".$lvl);
        exit();
    }
    else if($password !== $passwordRepeat)
    {
        header("Location: ../login.php?error=passwordcheck&username=".$username."&email=".$email."&region=".$region."&rank=".$rank."&lvl=".$lvl);
        exit();
    }
    else
    {
        $sql = "SELECT Username FROM users WHERE Username=? AND Region=?;";
        $statement = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($statement, $sql))
        {
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($statement, "ss", $username, $region);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            $resultCheck = mysqli_stmt_num_rows($statement);
            if($resultCheck > 0)
            {
                header("Location: ../login.php?error=usernametaken&email=".$email."&region=".$region."&rank=".$rank."&lvl=".$lvl);
                exit();
            }
            else
            {
                $sql = "INSERT INTO users (Username, email, Region, Division, Lvl, Pwd) VALUES (?, ?, ?, ?, ?, ?);";
                $statement = mysqli_stmt_init($connection);
                if(!mysqli_stmt_prepare($statement, $sql))
                {
                    header("Location: ../login.php?error=sqlerror");
                    exit();
                }
                else
                {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($statement, "ssssss", $username, $email, $region, $rank, $lvl, $hashedPwd);
                    mysqli_stmt_execute($statement);
                    header("Location: ../login.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($statement);
    mysqli_close($connection);
}
else
{
    header("Location: ../login.php");
} 