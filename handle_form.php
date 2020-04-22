<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Retrieving Information</title>
    </head>
    <body>
        <?php 
            $firstName = $_REQUEST['firstName'];
            $email = $_REQUEST['email'];
            $trueOrFalse = $_REQUEST['trueOrFalse'];
            $colorChoice = $_REQUEST['color'];
            $feedback = $_REQUEST['comments'];
            $daysOfWeek = [1 => 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            echo $daysOfWeek[3];
            $days = range(1, 31);
            echo $days[25];
            $states = ['ID' => 'Idaho',
                      'WA' => 'Washington',
                      'OR' => 'Oregon'];
            
            
            
            
            if($trueOrFalse == "true" && $colorChoice == "red") {
                echo "<h1>Congratulations, you are very special indeed! True and red are the best options!</h1>";
            }
        
            if ($firstName != NULL || !empty($firstName)) {
                echo "<p>Hi $firstName!<br>";
            } else {
                $firstName = "Howdy Doody";
                echo "<p>Your name is now $firstName, Hi $firstName!<br>";
            }
        
            echo "I have your email as $email.<br>";

            if($trueOrFalse == "true") {
                echo "You opted in!<br>";
            } else {
                echo "You opted out!<br>";
            }
        
            switch($colorChoice) {
                case 'red':
                    echo "Red is the color of fire trucks.<br>";
                    break;
                case 'green':
                    echo "Green is the color of money.<br>";
                    break;
                default:
                    echo "Blue is the color of a blue book.<br>";
                    break;
            }

            echo "Thanks for the following feedback:<br> $feedback</p>";
        
            foreach ($states as $abbr => $state) {
                echo $abbr."--".$state."<br>";
            }
        
            foreach ($days as $key => $day) {
                echo $key." is ".$day."<br>";
            }
        
            echo count($states)."<br>";
            
            $primes = [2, 3, 5, 7];
            $odds = [1, 3, 5, 7, 9];
            $evens = [2, 4, 6, 8];
            $numbers = [
                'p' => $primes,
                'o' => $odds,
                'e' => $evens];
            foreach($numbers as $n) {
                foreach($n as $item) {
                    echo $item;
                }
                echo "<br>";
            }
        
        ?>
    </body>
</html>
    
    
    
    