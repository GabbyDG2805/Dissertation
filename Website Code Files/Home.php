<?php

	session_start();
	include 'includes/dbh.php';
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/styles.css">
		<script src="JS/main.js"></script>
		<script src="https://kit.fontawesome.com/a118157f67.js" crossorigin="anonymous"></script>
		<title>Builds of Legends | Home</title>
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
                    <li class="navigationList"><a id="selected" class="nav" href="Home.php">Home</a></li>
                    <li class="navigationList"><a class="nav" href="Guides.php">Browse Guides</a></li>
                    <li class="navigationList"><a class="nav" href="WriteGuide.php">Write a Guide</a></li>
                    <li class="navigationList"><a class="nav" href="Profile.php">Profile</a></li>
                </ul>
            </div>
		</header>

		<div class="page">
				<h2 class=heading>Recent Guides</h2>
				<?php
				//Here is an example where we use the connection to take data from our database, and show it in the browser
				$build = [];

				//Here we mix PHP and SQL in order to have a statement ready that we can refer to later on
				$sql = "SELECT * FROM guides ORDER BY DateUploaded DESC limit 3;";
				//Here we "query" the SQL statement in the database using our connection variable
					$result = mysqli_query($connection, $sql);
				//Here we get the number of results the query returned from the database
					$resultCheck = mysqli_num_rows($result);

				//We then check if we had atleast 1 result from the database
					if ($resultCheck > 0) {
					//If we had a result, then we use a while loop to spit out our rows of data, one by one
					//At the same time we also assign the database data to a variable named $row
						while ($row = mysqli_fetch_assoc($result)) {
					//We can spit out the data by refering to our database column names
						$authorID = $row['AuthorID'];
						echo '<a class="clickableLink" href="guideDetails.php?guideID='.$row['ID'].'">
						<div class="GuideResult">';
							if($row['Champion'] == 'Ahri') {
								echo '<img class="champImage" src="Assets/Images/Champions/Ahri.png" alt="Ahri">';
							}
							else if($row['Champion'] == 'Anivia') {
								echo '<img class="champImage" src="Assets/Images/Champions/Anivia.png" alt="Anivia">';
							}
							else if($row['Champion'] == 'Annie') {
								echo '<img class="champImage" src="Assets/Images/Champions/Annie.png" alt="Annie">';
							}
							else if($row['Champion'] == 'Aurelion Sol') {
								echo '<img class="champImage" src="Assets/Images/Champions/Aurelion_Sol.png" alt="Aurelion_Sol">';
							}
							else if($row['Champion'] == 'Azir') {
								echo '<img class="champImage" src="Assets/Images/Champions/Azir.png" alt="Azir">';
							}
							else if($row['Champion'] == 'Bard') {
								echo '<img class="champImage" src="Assets/Images/Champions/Bard.png" alt="Bard">';
							}
							else if($row['Champion'] == 'Brand') {
								echo '<img class="champImage" src="Assets/Images/Champions/Brand.png" alt="Brand">';
							}
							else if($row['Champion'] == 'Cassiopeia') {
								echo '<img class="champImage" src="Assets/Images/Champions/Cassiopeia.png" alt="Cassiopeia">';
							}
							else if($row['Champion'] == 'Diana') {
								echo '<img class="champImage" src="Assets/Images/Champions/Diana.png" alt="Diana">';
							}
							else if($row['Champion'] == 'Ekko') {
								echo '<img class="champImage" src="Assets/Images/Champions/Ekko.png" alt="Ekko">';
							}
							else if($row['Champion'] == 'Elise') {
								echo '<img class="champImage" src="Assets/Images/Champions/Elise.png" alt="Elise">';
							}
							else if($row['Champion'] == 'Ezreal') {
								echo '<img class="champImage" src="Assets/Images/Champions/Ezreal.png" alt="Ezreal">';
							}
							else if($row['Champion'] == 'Fiddlesticks') {
								echo '<img class="champImage" src="Assets/Images/Champions/Fiddlesticks.png" alt="Fiddlesticks">';
							}
							else if($row['Champion'] == 'Fizz') {
								echo '<img class="champImage" src="Assets/Images/Champions/Fizz.png" alt="Fizz">';
							}
							else if($row['Champion'] == 'Galio') {
								echo '<img class="champImage" src="Assets/Images/Champions/Galio.png" alt="Galio">';
							}
							else if($row['Champion'] == 'Gragas') {
								echo '<img class="champImage" src="Assets/Images/Champions/Gragas.png" alt="Gragas">';
							}
							else if($row['Champion'] == 'Heimerdinger') {
								echo '<img class="champImage" src="Assets/Images/Champions/Heimerdinger.png" alt="Heimerdinger">';
							}
							else if($row['Champion'] == 'Ivern') {
								echo '<img class="champImage" src="Assets/Images/Champions/Ivern.png" alt="Ivern">';
							}
							else if($row['Champion'] == 'Janna') {
								echo '<img class="champImage" src="Assets/Images/Champions/Janna.png" alt="Janna">';
							}
							else if($row['Champion'] == 'Karma') {
								echo '<img class="champImage" src="Assets/Images/Champions/Karma.png" alt="Karma">';
							}
							else if($row['Champion'] == 'Karthus') {
								echo '<img class="champImage" src="Assets/Images/Champions/Karthus.png" alt="Karthus">';
							}
							else if($row['Champion'] == 'Kassadin') {
								echo '<img class="champImage" src="Assets/Images/Champions/Kassadin.png" alt="Kassadin">';
							}
							else if($row['Champion'] == 'Katarina') {
								echo '<img class="champImage" src="Assets/Images/Champions/Katarina.png" alt="Katarina">';
							}
							else if($row['Champion'] == 'Kayle') {
								echo '<img class="champImage" src="Assets/Images/Champions/Kayle.png" alt="Kayle">';
							}
							else if($row['Champion'] == 'Kennen') {
								echo '<img class="champImage" src="Assets/Images/Champions/Kennen.png" alt="Kennen">';
							}
							else if($row['Champion'] == 'LeBlanc') {
								echo '<img class="champImage" src="Assets/Images/Champions/LeBlanc.png" alt="LeBlanc">';
							}
							else if($row['Champion'] == 'Lissandra') {
								echo '<img class="champImage" src="Assets/Images/Champions/Lissandra.png" alt="Lissandra">';
							}
							else if($row['Champion'] == 'Lulu') {
								echo '<img class="champImage" src="Assets/Images/Champions/Lulu.png" alt="Lulu">';
							}
							else if($row['Champion'] == 'Lux') {
								echo '<img class="champImage" src="Assets/Images/Champions/Lux.png" alt="Lux">';
							}
							else if($row['Champion'] == 'Malzahar') {
								echo '<img class="champImage" src="Assets/Images/Champions/Malzahar.png" alt="Malzahar">';
							}
							else if($row['Champion'] == 'Morgana') {
								echo '<img class="champImage" src="Assets/Images/Champions/Morgana.png" alt="Morgana">';
							}
							else if($row['Champion'] == 'Nami') {
								echo '<img class="champImage" src="Assets/Images/Champions/Nami.png" alt="Nami">';
							}
							else if($row['Champion'] == 'Neeko') {
								echo '<img class="champImage" src="Assets/Images/Champions/Neeko.png" alt="Neeko">';
							}
							else if($row['Champion'] == 'Nidalee') {
								echo '<img class="champImage" src="Assets/Images/Champions/Nidalee.png" alt="Nidalee">';
							}
							else if($row['Champion'] == 'Orianna') {
								echo '<img class="champImage" src="Assets/Images/Champions/Orianna.png" alt="Orianna">';
							}
							else if($row['Champion'] == 'Rumble') {
								echo '<img class="champImage" src="Assets/Images/Champions/Rumble.png" alt="Rumble">';
							}
							else if($row['Champion'] == 'Ryze') {
								echo '<img class="champImage" src="Assets/Images/Champions/Ryze.png" alt="Ryze">';
							}
							else if($row['Champion'] == 'Sona') {
								echo '<img class="champImage" src="Assets/Images/Champions/Sona.png" alt="Sona">';
							}
							else if($row['Champion'] == 'Soraka') {
								echo '<img class="champImage" src="Assets/Images/Champions/Soraka.png" alt="Soraka">';
							}
							else if($row['Champion'] == 'Swain') {
								echo '<img class="champImage" src="Assets/Images/Champions/Swain.png" alt="Swain">';
							}
							else if($row['Champion'] == 'Sylas') {
								echo '<img class="champImage" src="Assets/Images/Champions/Sylas.png" alt="Sylas">';
							}
							else if($row['Champion'] == 'Syndra') {
								echo '<img class="champImage" src="Assets/Images/Champions/Syndra.png" alt="Syndra">';
							}
							else if($row['Champion'] == 'Taliyah') {
								echo '<img class="champImage" src="Assets/Images/Champions/Taliyah.png" alt="Taliyah">';
							}
							else if($row['Champion'] == 'Teemo') {
								echo '<img class="champImage" src="Assets/Images/Champions/Teemo.png" alt="Teemo">';
							}
							else if($row['Champion'] == 'Twisted Fate') {
								echo '<img class="champImage" src="Assets/Images/Champions/Twisted_Fate.png" alt="Twisted Fate">';
							}
							else if($row['Champion'] == 'Veigar') {
								echo '<img class="champImage" src="Assets/Images/Champions/Veigar.png" alt="Veigar">';
							}
							else if($row['Champion'] == 'Vel Koz') {
								echo '<img class="champImage" src="Assets/Images/Champions/VelKoz.png" alt="Vel Koz">';
							}
							else if($row['Champion'] == 'Viktor') {
								echo '<img class="champImage" src="Assets/Images/Champions/Viktor.png" alt="Viktor">';
							}
							else if($row['Champion'] == 'Vladimir') {
								echo '<img class="champImage" src="Assets/Images/Champions/Vladimir.png" alt="Vladimir">';
							}
							else if($row['Champion'] == 'Xerath') {
								echo '<img class="champImage" src="Assets/Images/Champions/Xerath.png" alt="Xerath">';
							}
							else if($row['Champion'] == 'Yuumi') {
								echo '<img class="champImage" src="Assets/Images/Champions/Yuumi.png" alt="Yuumi">';
							}
							else if($row['Champion'] == 'Ziggs') {
								echo '<img class="champImage" src="Assets/Images/Champions/Ziggs.png" alt="Ziggs">';
							}
							else if($row['Champion'] == 'Zilean') {
								echo '<img class="champImage" src="Assets/Images/Champions/Zilean.png" alt="Zilean">';
							}
							else if($row['Champion'] == 'Zoe') {
								echo '<img class="champImage" src="Assets/Images/Champions/Zoe.png" alt="Zoe">';
							}
							else if($row['Champion'] == 'Zyra') {
								echo '<img class="champImage" src="Assets/Images/Champions/Zyra.png" alt="Zyra">';
							}
							if($row['Role'] == 'Top') {
								echo '<img class="roleIcon" src="Assets/Images/Roles/Top_icon.png" title="Top" alt="Top">';
							}
							else if ($row['Role'] == 'Jung') {
								echo '<img class="roleIcon" src="Assets/Images/Roles/Jungle_icon.png" title="Jungle" alt="Jungle">';
							}
							else if ($row['Role'] == 'Mid') {
								echo '<img class="roleIcon" src="Assets/Images/Roles/Middle_icon.png" title="Mid" alt="Mid">';
							}
							else if ($row['Role'] == 'Bot') {
								echo '<img class="roleIcon" src="Assets/Images/Roles/Bottom_icon.png" title="Bottom" alt="Bottom">';
							}
							else if ($row['Role'] == 'Supp') {
								echo '<img class="roleIcon" src="Assets/Images/Roles/Support_icon.png" title="Support" alt="Support">';
							}
							echo'<h2 class="patch">'.$row['Patch'].'</h2>';
							echo'<h2 class="guideTitle">'.$row['GuideTitle'].'</h2>';

							$build = json_decode($row['CoreBuild']);
							$build = $build;
							foreach ($build as $item)
							{
								$item = (array)$item;
								foreach($item as $pic)
								{
									echo '<img class="item" src="'.$pic.'">';
								}
							}
							$sqlAuthor = "SELECT * FROM users WHERE ID='$authorID';";
							$resultAuthor = mysqli_query($connection, $sqlAuthor);
							$resultCheckAuthor = mysqli_num_rows($resultAuthor);
								if ($resultCheckAuthor > 0) {
									while ($rowAuthor = mysqli_fetch_assoc($resultAuthor)) {
										$region = $rowAuthor['Region'];
										$rank = $rowAuthor['Division'];
										$level = $rowAuthor['Lvl'];
										if($region == 'EUW') {
											echo '<div class="column"><img src="Assets/Images/Regions/EUW.png" alt="EUW"></div>';
										}
										else if($region == 'BR') {
											echo '<div class="column"><img src="Assets/Images/Regions/BR.png" alt="BR"></div>';
										}
										else if($region == 'EUNE') {
											echo '<div class="column"><img src="Assets/Images/Regions/EUNE.png" alt="EUNE"></div>';
										}
										else if($region == 'JP') {
											echo '<div class="column"><img src="Assets/Images/Regions/JP.png" alt="JP"></div>';
										}
										else if($region == 'LAN') {
											echo '<div class="column"><img src="Assets/Images/Regions/LAN.png" alt="LAN"></div>';
										}
										else if($region == 'LAS') {
											echo '<div class="column"><img src="Assets/Images/Regions/LAS.png" alt="LAS"></div>';
										}
										else if($region == 'NA') {
											echo '<div class="column"><img src="Assets/Images/Regions/NA.png" alt="NA"></div>';
										}
										else if($region == 'OCE') {
											echo '<div class="column"><img src="Assets/Images/Regions/OCE.png" alt="OCE"></div>';
										}
										else if($region == 'RU') {
											echo '<div class="column"><img src="Assets/Images/Regions/RU.png" alt="RU"></div>';
										}
										else if($region == 'TR') {
											echo '<div class="column"><img src="Assets/Images/Regions/TR.png" alt="TR"></div>';
										}
										if($rank == 'Gold')
										{
											echo '<div class="column"><img src="Assets/Images/Ranks/Gold.png" alt="Gold"></div>';
										}
										else if($rank == 'Unranked')
										{
											echo '<div class="column"><img src="Assets/Images/Ranks/Unranked.png" alt="Unranked"></div>';
										}
										else if($rank == 'Iron')
										{
											echo '<div class="column"><img src="Assets/Images/Ranks/Iron.png" alt="Iron"></div>';
										}
										else if($rank == 'Bronze')
										{
											echo '<div class="column"><img src="Assets/Images/Ranks/Bronze.png" alt="Bronze"></div>';
										}
										else if($rank == 'Silver')
										{
											echo '<div class="column"><img src="Assets/Images/Ranks/Silver.png" alt="Silver"></div>';
										}
										else if($rank == 'Platinum')
										{
											echo '<div class="column"><img src="Assets/Images/Ranks/Plat.png" alt="Platinum"></div>';
										}
										else if($rank == 'Diamond')
										{
											echo '<div class="column"><img src="Assets/Images/Ranks/Diamond.png" alt="Diamond"></div>';
										}
										else if($rank == 'Master')
										{
											echo '<div class="column"><img src="Assets/Images/Ranks/Master.png" alt="Master"></div>';
										}
										else if($rank == 'Grandmaster')
										{
											echo '<div class="column"><img src="Assets/Images/Ranks/Grandmaster.png" alt="Grandmaster"></div>';
										}
										else if($rank == 'Challenger')
										{
											echo '<div class="column"><img src="Assets/Images/Ranks/Challenger.png" alt="Challenger"></div>';
										}
										if($level == '100-199')
										{
											echo '<div class"column"><img class="lvlimg" src="Assets/Images/Levels/100-199.png" alt="level 100-199"></div>';
										}
										else if($level == 'Under 30')
										{
											echo '<div class"column"><img src="Assets/Images/Levels/U30.png" alt="Under level 30"></div>';
										}
										else if($level == '30-99')
										{
											echo '<div class"column"><img src="Assets/Images/Levels/30-99.png" alt="level 30-99"></div>';
										}
										else if($level == '100-199')
										{
											echo '<div class"column"><img src="Assets/Images/Levels/100-199.png" alt="level 100-199"></div>';
										}
										else if($level == '200-299')
										{
											echo '<div class"column"><img src="Assets/Images/Levels/200-299.png" alt="level 200-299"></div>';
										}
										else if($level == '300-399')
										{
											echo '<div class"column"><img src="Assets/Images/Levels/300-399.png" alt="level 300-399"></div>';
										}
										else if($level == '400-499')
										{
											echo '<div class"column"><img src="Assets/Images/Levels/400-499.png" alt="level 400-499"></div>';
										}
										else if($level == '500+')
										{
											echo '<div class"column"><img src="Assets/Images/Levels/500+.png" alt="level 500+"></div>';
										}
										echo'<div class="columnb"><p>'.$rowAuthor['Region'].'</p></div>
										<div class="columnb" <p>'.$rowAuthor['Division'].'</p></div>
										<div class="columnb" <p>'.$rowAuthor['Lvl'].'</p></div>';
									}
								}
							echo'<p>'.$row['Description'].'</p>';
							echo'</div>
							</a>';
							
						}
					}
				?>
		</div>
		
		<footer class="footer">
		</footer>
				
	</body>
	
</html>