<?php

	session_start();
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/styles.css">
		<script src="JS/main.js"></script>
		<script src="https://kit.fontawesome.com/a118157f67.js" crossorigin="anonymous"></script>
		<title>Builds of Legends | Signin-Signup</title>
    </head>

    <body>
        <header>
            <div id="loginBar">
                <?php
                    if(isset($_SESSION['UserID']))
                    {
                        echo'<form action="includes/logout.php" method="post"><button class="topButton" type="submit" name="logout-button">Log Out</button></form>';
                    }
                    else
                    {
                        echo'<form><button class="topButton" type="submit" name="signin-button" formaction="login.php">Log In | Sign Up</button></form>';
                    }
                ?>
            </div>

            <h1 id=Title>Builds of Legends</h1>

            <div id="navigationBar">
                <ul id="navigation">
                    <li class="navigationList"><a class="nav" href="Home.php">Home</a></li>
                    <li class="navigationList"><a class="nav" href="Guides.php">Browse Guides</a></li>
                    <li class="navigationList"><a class="nav" href="WriteGuide.php">Write a Guide</a></li>
                    <li class="navigationList"><a class="nav" href="Profile.php">Profile</a></li>
                </ul>
            </div>
		</header>

        <div id="signin-signup">
            <div id="signin">
                <h2 class="signin">Existing User? Sign in</h3>
                <form action="includes/signin.php" method="post">
                    <div class="form-field">
                        <input class="field" type="text" name="Username" placeholder="Username">
                    </div>
                    <div class="form-field">
                        <input class="field" type="password" name="pwd" placeholder="Password">
                    </div>
                    <div class="form-field">
                        <button class="button" type="submit" name="login-sumbit">Login</button>
                    </div>
                </form>
                <div class="form-field">
                     <?php
                        if (isset($_GET["error"])) 
                        {
                            if ($_GET["error"] == "emptyfields") 
                            {
                                echo '<p class="errorMsg">Error: You must fill in all fields</p>';
                            }
                            else if($_GET["error"] == "wrongpassword")
                            {
                                echo '<p class="errorMsg">Error: Incorrect Password</p>';
                            }
                            else if($_GET["error"] == "nouser")
                            {
                                echo '<p class="errorMsg">Error: Username does not exist</p>';
                            }
                        }
                        else if (isset($_GET["login"])) {
                            if ($_GET["login"] == "success") 
                            {
                              echo '<p class="errorMsg">Login Successful</p>';
                            }
                        }
                     ?>   
                </div>
            </div>
            <div id="signup">
                <h2 class="signin">New User? Sign Up</h3>
                <form action="includes/signup.php" method="post">
                    <div class="form-field">
                        <input class="field" type="text" name="email" placeholder="Email">
                    </div>
                    <div class="form-field">
                        <input class="field" type="text" name="Username" placeholder="Username">
                    </div>
                    <div class="form-field">
                    <select class="field" name="Region">
                        <option value="" disabled selected>Region</option>
                        <option value="BR">BR</option>
                        <option value="CN">CN</option>
                        <option value="EUNE">EUNE</option>
                        <option value="EUW">EUW</option>
                        <option value="JP">JP</option>
                        <option value="KR">KR</option>
                        <option value="LAN">LAN</option>
                        <option value="LAS">LAS</option>
                        <option value="NA">NA</option>
                        <option value="OCE">OCE</option>
                        <option value="PH">PH</option>
                        <option value="RU">RU</option>
                        <option value="SG">SG</option>
                        <option value="TH">TH</option>
                        <option value="TR">TR</option>
                        <option value="TW">TW</option>
                        <option value="VN">VN</option>
                    </select>
                    </div>
                    <div class="form-field">
                    <select class="field" name="Rank">
                        <option value="" disabled selected>Rank</option>
                        <option value="Unranked">Unranked</option>
                        <option value="Iron">Iron</option>
                        <option value="Bronze">Bronze</option>
                        <option value="Silver">Silver</option>
                        <option value="Gold">Gold</option>
                        <option value="Platinum">Platinum</option>
                        <option value="Diamond">Diamond</option>
                        <option value="Master">Master</option>
                        <option value="Grandmaster">Grandmaster</option>
                        <option value="Challenger">Challenger</option>
                    </select>
                    </div>
                    <div class="form-field">
                    <select class="field" name="Lvl">
                        <option value="" disabled selected>Level</option>
                        <option value="Under 30">Under 30</option>
                        <option value="30-99">30-99</option>
                        <option value="100-199">100-199</option>
                        <option value="200-299">200-299</option>
                        <option value="300-399">300-399</option>
                        <option value="400-499">400-499</option>
                        <option value="500+">500+</option>
                    </select>
                    </div>
                    <div class="form-field">
                        <input class="field" type="password" name="pwd" placeholder="Password">
                    </div>
                    <div class="form-field">
                        <input class="field" type="password" name="pwd-confirm" placeholder="Confirm Password">
                    </div>
                    <div class="form-field">
                        <button class="button" type="submit" name="signup-sumbit">Sign Up</button>
                    </div>
                </form>
                <div class="form-field">
                     <?php
                        if (isset($_GET["error"])) 
                        {
                            if ($_GET["error"] == "emptyfields") 
                            {
                                echo '<p class="errorMsg">Error: You must fill in all fields</p>';
                            }
                            else if($_GET["error"] == "invalidemail")
                            {
                                echo '<p class="errorMsg">Error: Email address is not valid</p>';
                            }
                            else if($_GET["error"] == "uselectedfields")
                            {
                                echo '<p class="errorMsg">Error: You must select an option from all drop-down menus</p>';
                            }
                            else if($_GET["error"] == "passwordcheck")
                            {
                                echo '<p class="errorMsg">Error: Passwords do not match</p>';
                            }
                            else if($_GET["error"] == "usernametaken")
                            {
                                echo '<p class="errorMsg">Error: That Username is already taken</p>';
                            }
                        }
                        else if (isset($_GET["signup"])) {
                            if ($_GET["signup"] == "success") 
                            {
                              echo '<p class="errorMsg">Signup Successful!</p>';
                            }
                        }
                     ?>   
                </div>
            </div>
        </div>

    </body>
    
</html>