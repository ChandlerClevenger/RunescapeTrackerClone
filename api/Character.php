<?php
    $username = "impignorate";

    $url = "https://secure.runescape.com/m=hiscore/index_lite.ws?player=";

    $url .= $username;

    // Initialize a CURL session.
    $ch = curl_init();

    // Set CURL options.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    
    $result  = curl_exec($ch);
    $err     = curl_error($ch);
    if ($err) {
        echo "cURL Error #:" . $err;
        header("HTTP/1.1 500 Internal Server Error");
        die();
    }
    curl_close($ch);

    $stat_array = explode("\n", $result);

    for($i = 0; $i < count($stat_array) - 1; $i++){
        $stats[stat_translation($i)] = $stat_array[$i];
    }

    function stat_translation(int $id){
        $fields_list = array(
            "Overall", "Attack", 
            "Defence", "Strength", "Constitution", "Ranged", "Prayer", "Magic", 
            "Cooking", "Woodcutting", "Fletching", "Fishing", "Firemaking", "Crafting", 
            "Smithing", "Mining", "Herblore", "Agility", "Thieving", 
            "Slayer", "Farming", "Runecrafting", "Hunter", "Construction", 
            "Summoning", "Dungeoneering", "Divination", "Invention", "Archaeology",

            "Bounty Hunter", "B.H. Rogues", "Dominion Tower", "The Crucible", 
            "Castle Wars games", "B.A. Attackers", "B.A. Defenders", "B.A. Collectors", 
            "B.A. Healers", "Duel Tournament", "Mobilising Armies", 
            "Conquest", "Fist of Guthix", "GG: Athletics", "GG: Resource Race", 
            "WE2: Armadyl Lifetime Contribution", "WE2: Bandos Lifetime Contribution", 
            "WE2: Armadyl PvP kills", "WE2: Bandos PvP kills", "Heist Guard Level", 
            "Heist Robber Level", "CFP: 5 game average", "AF15: Cow Tipping", 
            "AF15: Rats killed after the miniquest", "RuneScore", 
            "Clue Scrolls Easy", "Clue Scrolls Medium", "Clue Scrolls Hard", 
            "Clue Scrolls Elite", "Clue Scrolls Master"
        );
        return $fields_list[$id];
    }

    var_dump($stats); 
?>
