<?php 
$page_title = "Temperature Converter";
$page_heading = "Temperature Converter";
require('top.html'); ?>


<!--- Create a form that will take a temperature in Fahrenheit, Celsius, or Kelvin. -->

<form action="" method="post">
    
    <label>Temperature:</label>
    <input name="insert" type="number" value="<?php if(isset($_POST['insert'])) echo $_POST['insert'];?>"/>
    <select name="tempOptions">
        <option value="fah">Fahrenheit</option>
        <option value="cel">Celsius</option>
        <option value="kel">Kelvin</option>
    </select>
    <input type="submit"/>
    
    <!--- Return selected temperature values. Results should be displayed on the same page. -->
    <?php 
        $tempOptions = $_REQUEST['tempOptions'];
    
        function fahCon() {
            $insert = $_REQUEST['insert'];
            $cel = ($insert - 32) * (5/9);
            $kel = ($insert - 32) * (5/9) + 273.15;
            echo "<br/>Celsius: " . $cel . "<br/>Kelvin: " . $kel;
        }
    
        function celCon() {
            $insert = $_REQUEST['insert'];
            $fah = ($insert * (9/5)) + 32;
            $kel = $insert + 273.15;
            echo "<br/>Fahrenheit: " . $fah . "<br/>Kelvin: " . $kel;
        }
    
        function kelCon() {
            $insert = $_REQUEST['insert'];
            $fah = (($insert - 273.15) * (9/5)) + 32; 
            $cel = $insert - 273.15;
            echo "<br/>Fahrenheit: " . $fah . "<br/>Celsius: " . $cel;
        }
        
        
        switch($tempOptions) {
                case 'fah':
                    fahCon();
                    break;
                case 'cel':
                    celCon();
                    break;
                case 'kel':
                    kelCon();
                    break;
            }
    ?>
</form>





<?php require('bottom.html'); ?>