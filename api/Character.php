<!DOCTYPE html>
<html>
	<body>
		<h1>
			<pre>
			<?php
				$username = "impignorate";

				$url = "https://secure.runescape.com/m=hiscore/index_lite.ws?player=";

				$url .= $username;

				// Initialize a CURL session.
				$ch = curl_init();
 
				// Return Page contents.
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				//grab URL and pass it to the variable.
				curl_setopt($ch, CURLOPT_URL, $url);
                
				$result  = curl_exec($ch);

                $err     = curl_error($ch);
                if ($err) {
                    echo "cURL Error #:" . $err;
                    die();
                }
                curl_close($ch);

				$stat_array = explode("\n", $result);
				array_splice($stat_array, 29);

				$stats = array(
                    "Username" => $username,
                    "Overall" => "not assigned", 
                    "Attack" => "not assigned", 
                    "Defence" => "not assigned", 
                    "Strength" => "not assigned", 
                    "Constitution" => "not assigned", 
                    "Ranged" => "not assigned", 
                    "Prayer" => "not assigned", 
                    "Magic" => "not assigned", 
                    "Cooking" => "not assigned", 
                    "Woodcutting" => "not assigned", 
                    "Fletching" => "not assigned", 
                    "Fishing" => "not assigned", 
                    "Firemaking" => "not assigned", 
                    "Crafting" => "not assigned", 
                    "Smithing" => "not assigned", 
                    "Mining" => "not assigned", 
                    "Herblore" => "not assigned", 
                    "Agility" => "not assigned", 
                    "Thieving" => "not assigned", 
                    "Slayer" => "not assigned", 
                    "Farming" => "not assigned", 
                    "Runecrafting" => "not assigned", 
                    "Hunter" => "not assigned", 
                    "Construction" => "not assigned", 
                    "Summoning" => "not assigned", 
                    "Dungeoneering" => "not assigned", 
                    "Divination" => "not assigned", 
                    "Invention" => "not assigned", 
                    "Archaeology" => "not assigned");

				for($i = 0; $i < count($stat_array); $i++){
					$stats[stat_translation($i)] = $stat_array[$i];
				}

				/*
				for($i = 0; $i < count($stat_array); $i++){
					echo stat_translation($i) . ":\n";
					$split = explode(",", $stat_array[$i]);
					echo "Level: ". $split[1] . ", XP: " . $split[2] . ", Rank: " . $split[0] . "\n";
				}
				*/

				function stat_translation(int $id){
					$stat_list = array("Overall", "Attack", "Defence", "Strength", "Constitution", "Ranged", "Prayer", "Magic", "Cooking", "Woodcutting", "Fletching", "Fishing", "Firemaking", "Crafting", "Smithing", "Mining", 
					"Herblore", "Agility", "Thieving", "Slayer", "Farming", "Runecrafting", "Hunter", "Construction", "Summoning", "Dungeoneering", "Divination", "Invention", "Archaeology");
					return $stat_list[$id];
				}
				

				var_dump($stats); 
			?>	
			</pre>
		</h1>
	</body>
</html>