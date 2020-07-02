<?php

	session_start();

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
		<title>Builds of Legends | Write a Guide</title>
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
                    <li class="navigationList"><a id="selected" class="nav" href="WriteGuide.php">Write a Guide</a></li>
                    <li class="navigationList"><a class="nav" href="Profile.php">Profile</a></li>
                </ul>
            </div>
		</header>

		<div id="guidePage">
			<?php
				if(isset($_SESSION['UserID']))
				{
					?>
					<div id="guideForm">
						<h4 class="subheading">Guide Title</h4>
							<div class="form-field">
									<input class="field" id="guide-title" type="text" name="title" placeholder="Guide Title"/>
							</div>
							<h4 class="subheading">Champion</h4>
							<div class="form-field">
								<input class="field" id="champion" type="text" name="champion" list="champions" placeholder="Start typing Champion name..."/>
								<datalist id="champions">
									<option>Ahri</option>
									<option>Anivia</option>
									<option>Annie</option>
									<option>Aurelion Sol</option>
									<option>Azir</option>
									<option>Bard</option>
									<option>Brand</option>
									<option>Cassiopeia</option>
									<option>Diana</option>
									<option>Ekko</option>
									<option>Elise</option>
									<option>Ezreal</option>
									<option>Fiddlesticks</option>
									<option>Fizz</option>
									<option>Galio</option>
									<option>Gragas</option>
									<option>Heimerdinger</option>
									<option>Ivern</option>
									<option>Janna</option>
									<option>Karma</option>
									<option>Karthus</option>
									<option>Kassadin</option>
									<option>Katarina</option>
									<option>Kayle</option>
									<option>Kennen</option>
									<option>Leblanc</option>
									<option>Lissandra</option>
									<option>Lulu</option>
									<option>Lux</option>
									<option>Malzahar</option>
									<option>Morgana</option>
									<option>Nami</option>
									<option>Neeko</option>
									<option>Nidalee</option>
									<option>Orianna</option>
									<option>Rumble</option>
									<option>Ryze</option>
									<option>Sona</option>
									<option>Soraka</option>
									<option>Swain</option>
									<option>Sylas</option>
									<option>Syndra</option>
									<option>Taliyah</option>
									<option>Teemo</option>
									<option>Twisted Fate</option>
									<option>Veigar</option>
									<option>Vel Koz</option>
									<option>Viktor</option>
									<option>Vladimir</option>
									<option>Xerath</option>
									<option>Yuumi</option>
									<option>Ziggs</option>
									<option>Zilean</option>
									<option>Zoe</option>
									<option>Zyra</option>
								</datalist>
							</div>
							<h4 class="subheading">Patch</h4>
							<div class="form-field">
								<select class="field" id="patch" name="patch">
									<option value="" disabled selected>Patch</option>
									<option value="10.7">10.7</option>
									<option value="10.6">10.6</option>
									<option value="10.5">10.5</option>
									<option value="10.4">10.4</option>
									<option value="10.3">10.3</option>
									<option value="10.2">10.2</option>
									<option value="10.1">10.1</option>
								</select>
							</div>
						<div id="image_container">
							<h4 class="subheading">Role</h4>
							<img class="roleIcon" id="Top"  name="role" src="Assets/Images/Roles/Top_icon.png" alt="Top"/>
							<img input class="roleIcon" id="Jung" name="role" src="Assets/Images/Roles/Jungle_icon.png" alt="Jungle"/>
							<img class="roleIcon" id="Mid" name="role" src="Assets/Images/Roles/Middle_icon.png" alt="Mid"/>
							<img class="roleIcon" id="Bot" name="role" src="Assets/Images/Roles/Bottom_icon.png" alt="Bottom"/>
							<img class="roleIcon" id="Supp" name="role" src="Assets/Images/Roles/Support_icon.png" alt="Support"/>
						</div>
						<h4 class="subheading">Core Build</h4>
						<div id="buildcontainer">
						<div id="build" class="core">
							<div class="itemSlot droppable"></div>
							<div class="itemSlot droppable"></div>
							<div class="itemSlot droppable"></div>
							<div class="itemSlot droppable"></div>
							<div class="itemSlot droppable"></div>
							<div class="itemSlot droppable"></div>
						</div>
						<h4 class="subheading">Description</h4>
						<div class="form-field">
							<textarea class="description" id="core-desc" name="desc" placeholder="Explain this build. . ."></textarea>
						</div>
						</div>
						<button class="button" id="addBuildbtn"><i class="fas fa-plus"></i> Add a Build Adaptation</button>
						<div class="form-field" id="guideButton">
							<button class="button" id="guide-button" type="submit" name="guide-sumbit">Submit Guide</button>
						</div>
					</div>
					<div id="items">
						<h4 class="subheading">Drag and drop items onto the build slots...</h4>
						<img src="Assets/Images/Items/Abyssal_Mask.png" name="Abyssal_Mask" title="Abyssal Mask" alt="Abyssal Mask" class="item draggable">
						<img src="Assets/Images/Items/Archangels_Staff.png" name="Archangels_Staff" title="Archangel's Staff" alt="Archangel's Staff" class="item draggable">
						<img src="Assets/Images/Items/Ardent_Censer.png" name="Ardent_Censer" title="Ardent Censer" alt="Ardent Censer" class="item draggable">
						<img src="Assets/Images/Items/Athenes_Unholy_Grail.png" name="Athenes_Unholy_Grail" title="Athene's Unholy Grail" alt="Athene's Unholy Grail" class="item draggable">
						<img src="Assets/Images/Items/Banshees_Veil.png" name="Banshees_Veil" title="Banshee's Veil" alt="Banshee's Veil" class="item draggable">
						<img src="Assets/Images/Items/Berserkers_Greaves.png" name="Berserkers_Greaves" title="Berserker's Greaves" alt="Berserker's Greaves" class="item draggable">
						<img src="Assets/Images/Items/Boots_of_Mobility.png" name="Boots_of_Mobility" title="Boots of Mobility" alt="Boots of Mobility" class="item draggable">
						<img src="Assets/Images/Items/Boots_of_Swiftness.png" name="Boots_of_Swiftness" title="Boots of Swiftness" alt="Boots of Swiftness" class="item draggable">
						<img src="Assets/Images/Items/Frozen_Heart.png" name="Frozen_Heart" title="Frozen Heart" alt="Frozen Heart" class="item draggable">
						<img src="Assets/Images/Items/Guinsoos_Rageblade.png" name="Guinsoos_Rageblade" title="Guinsoo's Rageblade" alt="Guinsoo's Rageblade" class="item draggable">
						<img src="Assets/Images/Items/Hextech_GLP-800.png" name="Hextech_GLP-800" title="Hextech GLP-800" alt="Hextech GLP-800" class="item draggable">
						<img src="Assets/Images/Items/Hextech_Gunblade.png" name="Hextech_Gunblade" title="Hextech Gunblade" alt="Hextech Gunblade" class="item draggable">
						<img src="Assets/Images/Items/Hextech_Protobelt-01.png" name="Hextech_Protobelt-01" title="Hextech Protobelt-01" alt="Hextech Protobelt-01" class="item draggable">
						<img src="Assets/Images/Items/Ionian_Boots_of_Lucidity.png" name="Ionian_Boots_of_Lucidity" title="Ionian Boots of Lucidity" alt="Ionian Boots of Lucidity" class="item draggable">
						<img src="Assets/Images/Items/Liandrys_Torment.png" name="Liandrys_Torment" title="Liandry's Torment" alt="Liandry's Torment" class="item draggable">
						<img src="Assets/Images/Items/Lich_Bane.png" name="Lich_Bane" title="Lich Bane" alt="Lich Bane" class="item draggable">
						<img src="Assets/Images/Items/Locket_of_the_Iron_Solari.png" name="Locket_of_the_Iron_Solari" title="Locket of the Iron Solari" alt="Locket of the Iron Solari" class="item draggable">
						<img src="Assets/Images/Items/Ludens_Echo.png" name="Ludens_Echo" title="Luden's Echo" alt="Luden's Echo" class="item draggable">
						<img src="Assets/Images/Items/Mejais_Soulstealer.png" name="Mejais_Soulstealer" title="Mejai's Soulstealer" alt="Mejai's Soulstealer" class="item draggable">
						<img src="Assets/Images/Items/Mercurys_Treads.png" name="Mercurys_Treads" title="Mercury's Treads" alt="Mercury's Treads" class="item draggable">
						<img src="Assets/Images/Items/Mikaels_Crucible.png" name="Mikaels_Crucible" title="Mikael's Crucible" alt="Mikael's Crucible" class="item draggable">
						<img src="Assets/Images/Items/Morellonomicon.png" name="Morellonomicon" title="Morellonomicon" alt="Morellonomicon" class="item draggable">
						<img src="Assets/Images/Items/Nashors_Tooth.png" name="Nashors_Tooth" title="Nashor's Tooth" alt="Nashor's Tooth" class="item draggable">
						<img src="Assets/Images/Items/Ninja_Tabi.png" name="Ninja_Tabi" title="Ninja Tabi" alt="Ninja Tabi" class="item draggable">
						<img src="Assets/Images/Items/Perfect_Hex_Core.png" name="Perfect_Hex_Core" title="Perfect Hex Core" alt="Perfect Hex Core" class="item draggable">
						<img src="Assets/Images/Items/Rabadons_Deathcap.png" name="Rabadons_Deathcap" title="Rabadon's Deathcap" alt="Rabadon's Deathcap" class="item draggable">
						<img src="Assets/Images/Items/Redemption.png" name="Redemption" title="Redemption" alt="Redemption" class="item draggable">
						<img src="Assets/Images/Items/Righteous_Glory.png" name="Righteous_Glory" title="Righteous Glory" alt="Righteous Glory" class="item draggable">
						<img src="Assets/Images/Items/Rod_of_Ages.png" name="Rod_of_Ages" title="Rod of Ages" alt="Rod of Ages" class="item draggable">
						<img src="Assets/Images/Items/Runaans_Hurricane.png" name="Runaans_Hurricane" title="Runaan's Hurricane" alt="Runaan's Hurricane" class="item draggable">
						<img src="Assets/Images/Items/Rylais_Crystal_Scepter.png" name="Rylais_Crystal_Scepter" title="Rylai's Crystal Scepter" alt="Rylai's Crystal Scepter" class="item draggable">
						<img src="Assets/Images/Items/Seraphs_Embrace.png" name="Seraphs_Embrace" title="Seraph's Embrace" alt="Seraph's Embrace" class="item draggable">
						<img src="Assets/Images/Items/Shard_of_True_Ice.png" name="Shard_of_True_Ice" title="Shard of True Ice" alt="Shard of True Ice" class="item draggable">
						<img src="Assets/Images/Items/Shurelyas_Reverie.png" name="Shurelyas_Reverie" title="Shurelya's Reverie" alt="Shurelya's Reverie" class="item draggable">
						<img src="Assets/Images/Items/Sorcerers_Shoes.png" name="Sorcerers_Shoes" title="Sorcerer's Shoes" alt="Sorcerer's Shoes" class="item draggable">
						<img src="Assets/Images/Items/Spellbinder.png" name="Spellbinder" title="Spellbinder" alt="Spellbinder" class="item draggable">
						<img src="Assets/Images/Items/Trinity_Force.png" name="Trinity_Force" title="Trinity Force" alt="Trinity Force" class="item draggable">
						<img src="Assets/Images/Items/Twin_Shadows.png" name="Twin_Shadows" title="Twin Shadows" alt="Twin Shadows" class="item draggable">
						<img src="Assets/Images/Items/Void_Staff.png" name="Void_Staff" title="Void Staff" alt="Void Staff" class="item draggable">
						<img src="Assets/Images/Items/Wits_End.png" name="Wits_End" title="Wit's End" alt="Wit's End" class="item draggable">
						<img src="Assets/Images/Items/Zekes_Convergence.png" name="Zekes_Convergence" title="Zeke's Convergence" alt="Zeke's Convergence" class="item draggable">
						<img src="Assets/Images/Items/Zhonyas_Hourglass.png" name="Zhonyas_Hourglass" title="Zhonya's Hourglass" alt="Zhonya's Hourglass" class="item draggable">




					</div>
			<?php
				}
				else
				{
					echo '<p id="loginMsg">You must Log In to Write a Guide.</p>';
				}
			?>
		</div>

		<div class="footer">
		</div>
				
	</body>
	
</html>