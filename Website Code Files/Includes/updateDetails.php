<?php

    session_start();

if (isset($_POST['edit-sumbit']))
{
    require 'dbh.php';

    $id = $_SESSION['UserID'];
    $email = $_POST['email'];
    $username = $_POST['Username'];
    $region = $_POST['Region'];
    $rank = $_POST['Rank'];
    $lvl = $_POST['Lvl'];
    $currentPassword = $_POST['Currentpwd'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-confirm'];

    if(empty($email) || empty($username))
    {
        header("Location: ../editProfile.php?error=emptyfields&username=".$username."&email=".$email."&region=".$region."&rank=".$rank."&lvl=".$lvl);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../editProfile.php?error=invalidemail&username=".$username."&region=".$region."&rank=".$rank."&lvl=".$lvl);
        exit();
    }
    else if($password !== $passwordRepeat)
    {
        header("Location: ../editProfile.php?error=passwordcheck&username=".$username."&email=".$email."&region=".$region."&rank=".$rank."&lvl=".$lvl);
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
            $row = mysqli_fetch_assoc($statement);
            if($Username !=$row['Username'] && $resultCheck > 0)
            {
                header("Location: ../editProfile.php?error=usernametaken&email=".$email."&region=".$region."&rank=".$rank."&lvl=".$lvl);
                exit();
            }
            else if (empty($password))
            {
                $sql = "UPDATE users SET Username=?, email=?, Region=?, Division=?, Lvl=? WHERE ID='$id';";
                $statement = mysqli_stmt_init($connection);
                if(!mysqli_stmt_prepare($statement, $sql))
                {
                    header("Location: ../editProfile.php?error=sqlerror");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($statement, "sssss", $username, $email, $region, $rank, $lvl);
                    mysqli_stmt_execute($statement);
                    header("Location: ../editProfile.php?edit=success");
                    exit();
                }
            }
            else if(!empty($password))
            {
                $sqlPwd = "SELECT Pwd FROM users WHERE ID=$id;";
                $resultPwd = mysqli_query($connection, $sqlPwd);

                $rowPwd = mysqli_fetch_assoc($resultPwd);
                $passwordCheck = password_verify($currentPassword, $rowPwd['Pwd']);
                if($passwordCheck == false)
                {
                    header("Location: ../editProfile.php?error=wrongpassword");
                    exit();
                }
                else if($passwordCheck == true)
                {
                    $sql = "UPDATE users SET Username=?, email=?, Region=?, Division=?, Lvl=?, Pwd=? WHERE ID='$id';";
                    $statement = mysqli_stmt_init($connection);
                    if(!mysqli_stmt_prepare($statement, $sql))
                    {
                        header("Location: ../editProfile.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($statement, "ssssss", $username, $email, $region, $rank, $lvl, $hashedPwd);
                        mysqli_stmt_execute($statement);
                        header("Location: ../editProfile.php?edit=success");
                        exit();
                    }
                    
                }
            }
        }
    }
    mysqli_stmt_close($statement);
    mysqli_close($connection);
}
else
{
    header("Location: ../editProfile.php");
}