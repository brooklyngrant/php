<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Multidimensional Arrays</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <style type="text/css">
            body {
                background-color: lightcoral;
                font-family: 'Open Sans', sans-serif;
            }
            h1 {
                padding: 10px;
                border: black 2px solid;
            }
            h2 {
                border-bottom: black 1px solid;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <p>Some North American States, Provinces, and Territories: </p>
        <?php # Script 2.7 - multi.php
            
        //array
        $mexico = ['YU' => 'Yucatan',
                  'BC' => 'Baja California',
                  'OA' => 'Oaxaca'];
        
        $us = ['MD' => 'Maryland',
                  'IL' => 'Illinois',
                  'PA' => 'Pennsylvania',
                  'IA' => 'Iowa'];
        
        $canada = ['QC' => 'Quebec',
                  'AB' => 'Alberta',
                  'NT' => 'Northwest Territories',
                  'YT' => 'Yukon',
                  'PE' => 'Prince Edward Island'];
        
        $n_america = ['Mexico' => $mexico,
                  'United States' => $us,
                  'Canada' => $canada];
        
        //Loop through the countries:
        foreach ($n_america as $country => $list) {
            
            //print a heading
            echo "<h2>$country</h2><ul>";
            
            //print each state, providence, or territory: 
            foreach ($list as $k => $v) {
                echo "<li>$k - $v</li>\n";
            }
            
            //close the list:
            echo "</ul>";
        }
        
        
        
        
        ?>
    </body>
</html>