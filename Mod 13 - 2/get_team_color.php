<?php
    function get_color_gradient(string $team_name) : string{
        $gradients = [
            "Cardinals"   => "linear-gradient(195deg, rgba(151,95,63,0.95), rgba(255,182,18,0.95))",      
            "Falcons"     => "linear-gradient(195deg, rgba(167,25,48,0.95), rgba(0,0,0,0.95))",     
            "Ravens"      => "linear-gradient(195deg, rgba(36,23,115,0.95), rgba(158,124,12,0.95))",     
            "Bills"       => "linear-gradient(195deg, rgba(0,51,141,0.95), rgba(198,12,48,0.95))",     
            "Panthers"    => "linear-gradient(195deg, rgba(0,133,202,0.95), rgba(16,24,32,0.95))",
            "Bears"       => "linear-gradient(195deg, rgba(11,22,42,0.95), rgba(200,56,3,0.95))",     
            "Bengals"     => "linear-gradient(195deg, rgba(251,79,20,0.95), rgba(0,0,0,0.95))",     
            "Browns"      => "linear-gradient(195deg, rgba(49,29,0,0.95), rgba(255,60,0,0.95))",
            "Cowboys"     => "linear-gradient(195deg, rgba(0,34,68,0.95), rgba(134,147,151,0.95))", 
            "Broncos"     => "linear-gradient(195deg, rgba(0,34,68,0.95), rgba(251,79,20,0.95))",     
            "Lions"       => "linear-gradient(195deg, rgba(0,118,182,0.95), rgba(195,172,175,0.95))", 
            "Packers"     => "linear-gradient(195deg, rgba(24,54,44,0.95), rgba(255,182,18,0.95))",
            "Texans"      => "linear-gradient(195deg, rgba(3,32,63,0.95), rgba(167,25,48,0.95))", 
            "Colts"       => "linear-gradient(195deg, rgba(0,44,95,0.95), rgba(195,172,175,0.95))", 
            "Jaguars"     => "linear-gradient(195deg, rgba(0,103,120,0.95), rgba(211,188,141,0.95))",     
            "Chiefs"      => "linear-gradient(195deg, rgba(227,24,55,0.95), rgba(255,182,18,0.95))",     
            "Raiders"     => "linear-gradient(195deg, rgba(0,0,0,0.95), rgba(195,172,175,0.95))",     
            "Chargers"    => "linear-gradient(195deg, rgba(0,114,197,0.95), rgba(255,182,18,0.95))",
            "Rams"        => "linear-gradient(195deg, rgba(0,53,148,0.95), rgba(255,209,0,0.95))", 
            "Dolphins"    => "linear-gradient(195deg, rgba(0,142,151,0.95), rgba(245,130,32,0.95))",     
            "Vikings"     => "linear-gradient(195deg, rgba(79,38,131,0.95), rgba(255,198,47,0.95))",     
            "Patriots"    => "linear-gradient(195deg, rgba(0,34,68,0.95), rgba(198,12,48,0.95))",
            "Saints"      => "linear-gradient(195deg, rgba(211,188,141,0.95), rgba(0,0,0,0.95))",
            "Giants"      => "linear-gradient(195deg, rgba(11,34,101,0.95), rgba(167,25,48,0.95))",      
            "Jets"        => "linear-gradient(195deg, rgba(18,87,64,0.95), rgba(0,0,0,0.95))", 
            "Eagles"      => "linear-gradient(195deg, rgba(0,76,84,0.95), rgba(195,172,175,0.95))", 
            "Steelers"    => "linear-gradient(195deg, rgba(255,182,18,0.95), rgba(16,24,32,0.95))", 
            "49ers"       => "linear-gradient(195deg, rgba(170,0,0,0.95), rgba(179,153,93,0.95))",
            "Seahawks"    => "linear-gradient(195deg, rgba(0,34,68,0.95), rgba(105,190,40,0.95))",
            "Buccaneers"  => "linear-gradient(195deg, rgba(213,10,10,0.95), rgba(52,48,43,0.95))", 
            "Titans"      => "linear-gradient(195deg, rgba(12,95,64,0.95), rgba(75,146,219,0.95))",    
            "Commanders"  => "linear-gradient(195deg, rgba(119,49,95,0.95), rgba(255,182,18,0.95))",     
        ];
        

        return $gradients[$team_name] ?? "linear-gradient(195deg, #CCCCCC, #888888)";
    }
?>