<?php

    session_start();
	include 'includes/dbh.php';
	$id = $_SESSION['UserID'];
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/styles.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://kit.fontawesome.com/a118157f67.js" crossorigin="anonymous"></script>
		<script src="JS/main.js"></script>
		<title>Builds of Legends | Edit Profile</title>
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

        <?php

            $sql = "SELECT * FROM users WHERE ID='$id';";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result)

        ?>
        
        <div id="signin-signup">
            <h2 class="heading" id="editTitle">Edit Profile</h2>
            <div id="signin">
                <h2 class="signin">Change Your Profile Picture</h3>
                <img src="Assets/Images/ProfilePics/Ancient_Golem_profileicon.png" name="Ancient_Golem" alt="Ancient Golem" class="profilePic">
                <img src="Assets/Images/ProfilePics/Blue_Caster_Minion_profileicon.png" name="Blue_Caster_Minion" alt="Blue Caster Minion" class="profilePic">
                <img src="Assets/Images/ProfilePics/Blue_Melee_Minion_profileicon.png" name="Blue_Melee_Minion" alt="Blue Melee Minion" class="profilePic">
                <img src="Assets/Images/ProfilePics/Blue_Mountain_profileicon.png" name="Blue_Mountain" alt="Blue Mountain" class="profilePic">
                <img src="Assets/Images/ProfilePics/Blue_Siege_Minion_profileicon.png" name="Blue_Siege_Minion" alt="Blue Siege Minion" class="profilePic">
                <img src="Assets/Images/ProfilePics/Blue_Super_Minion_profileicon.png" name="Blue_Super_Minion" alt="Blue Super Minion" class="profilePic">
                <img src="Assets/Images/ProfilePics/Cannonball_profileicon.png" name="Cannonball" alt="Cannonball" class="profilePic">
                <img src="Assets/Images/ProfilePics/Daggers_profileicon.png" name="Daggers" alt="Daggers" class="profilePic">
                <img src="Assets/Images/ProfilePics/Debonair_Rose_profileicon.png" name="Debonair_Rose" alt="Debonair Rose" class="profilePic">
                <img src="Assets/Images/ProfilePics/Fully_Stacked_Mejais_profileicon.png" name="Fully_Stacked_Mejais" alt="Fully Stacked Mejais" class="profilePic">
                <img src="Assets/Images/ProfilePics/Hammer_Time_profileicon.png" name="Hammer_Time" alt="Hammer Time" class="profilePic">
                <img src="Assets/Images/ProfilePics/Level_One_Critter_profileicon.png" name="Level_One_Critter" alt="Level One Critter" class="profilePic">
                <img src="Assets/Images/ProfilePics/Level_Two_Critter_profileicon.png" name="Level_Two_Critter" alt="Level Two Critter" class="profilePic">
                <img src="Assets/Images/ProfilePics/Lil_Sprout_profileicon.png" name="Lil_Sprout" alt="Lil Sprout" class="profilePic">
                <img src="Assets/Images/ProfilePics/Lizard_Elder_profileicon.png" name="Lizard_Elder" alt="Lizard Elder" class="profilePic">
                <img src="Assets/Images/ProfilePics/Mix_Mix_profileicon.png" name="Mix_Mix" alt="Mix Mix" class="profilePic">
                <img src="Assets/Images/ProfilePics/Ole_Paw_profileicon.png" name="Ole_Paw" alt="Ole Paw" class="profilePic">
                <img src="Assets/Images/ProfilePics/Purple_Caster_Minion_profileicon.png" name="Purple_Caster_Minion" alt="Purple Caster Minion" class="profilePic">
                <img src="Assets/Images/ProfilePics/Purple_Melee_Minion_profileicon.png" name="Purple_Melee_Minion" alt="Purple Melee Minion" class="profilePic">
                <img src="Assets/Images/ProfilePics/Purple_Siege_Minion_profileicon.png" name="Purple_Siege_Minion" alt="Purple Siege Minion" class="profilePic">
                <img src="Assets/Images/ProfilePics/Purple_Super_Minion_profileicon.png" name="Purple_Super_Minion" alt="Purple Super Minion" class="profilePic">
                <img src="Assets/Images/ProfilePics/Revive_profileicon.png" name="Revive" alt="Revive" class="profilePic">
                <img src="Assets/Images/ProfilePics/Shuriman_Pyramids_profileicon.png" name="Shuriman_Pyramids" alt="Shuriman Pyramids" class="profilePic">
                <img src="Assets/Images/ProfilePics/Spike_Shield_profileicon.png" name="Spike_Shield" alt="Spike Shield" class="profilePic">
                <img src="Assets/Images/ProfilePics/Targon_profileicon.png" name="Targon" alt="Targon" class="profilePic">
                <img src="Assets/Images/ProfilePics/Tree_of_Life_profileicon.png" name="Tree_of_Life" alt="Tree of Life" class="profilePic">
                <img src="Assets/Images/ProfilePics/Winged_Sword_profileicon.png" name="Winged_Sword" alt="Winged Sword" class="profilePic">
                <img src="Assets/Images/ProfilePics/Wraith_profileicon.png" name="Wraith" alt="Wraith" class="profilePic">
                
                
            </div>
            <div id="signup">
                <h2 class="signin">Edit Your Details</h3>
                <form action="includes/updateDetails.php" method="post">
                    <p>Email</p>
                    <div class="form-field">
                        <?php
                        echo'<input class="field" type="text" name="email" value='.$row['Email'].'>';
                        ?>
                    </div>
                    <p>Username</p>
                    <div class="form-field">
                        <?php
                        echo'<input class="field" type="text" name="Username" value='.$row['Username'].'>';
                        ?>
                    </div>
                    <p>Region</p>
                    <div class="form-field">
                    <select class="field" name="Region">
                        <?php
                        echo'<option value='.$row['Region'].'>'.$row['Region'].'</option>';
                        ?>
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
                    <p>Rank</p>
                    <div class="form-field">
                    <select class="field" name="Rank">
                        <?php
                        echo'<option value='.$row['Division'].'>'.$row['Division'].'</option>';
                        ?> 
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
                    <p>Level</p>
                    <div class="form-field">
                    <select class="field" name="Lvl">
                        <?php
                        echo'<option value='.$row['Lvl'].'>'.$row['Lvl'].'</option>';
                        ?>
                        <option value="Under 30">Under 30</option>
                        <option value="30-99">30-99</option>
                        <option value="100-199">100-199</option>
                        <option value="200-299">200-299</option>
                        <option value="300-399">300-399</option>
                        <option value="400-499">400-499</option>
                        <option value="500+">500+</option>
                    </select>
                    </div>
                    <p>Change your Password</p>
                    <div class="form-field">
                        <input class="field" type="password" name="Currentpwd" placeholder="Current Password">
                    </div>
                    <div class="form-field">
                        <input class="field" type="password" name="pwd" placeholder="New Password">
                    </div>
                    <div class="form-field">
                        <input class="field" type="password" name="pwd-confirm" placeholder="Confirm New Password">
                    </div>
                    <div class="form-field">
                        <button class="button" type="submit" name="edit-sumbit">Confirm</button>
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
                            else if($_GET["error"] == "wrongpassword")
                            {
                                echo '<p class="errorMsg">Error: Incorrect Password</p>';
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
                        else if (isset($_GET["edit"])) {
                            if ($_GET["edit"] == "success") 
                            {
                              echo '<p class="errorMsg">Your Details have been successfully Updated!</p>';
                            }
                        }
                     ?>   
                </div>
            </div>
        </div>
		
		<div class="footer">
		</div>
				
	</body>
	
</html>