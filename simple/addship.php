<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$ship = $year = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Get ship & year 
        $ship = trim($_POST["Ship"]);
        $year = trim($_POST["Year"]);   
        
    // Prepare an insert statement
    $sql = "INSERT INTO p_ships (ship, year) VALUES (?, ?)";
         
        // Use DB info in $link from config.php to construct MySQL message/command
        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_ship, $param_year);
            
            // Set parameters
            $param_ship = $ship;
            $param_year = $year; 
            
            // Attempt to EXECUTE the prepared statement
            mysqli_stmt_execute($stmt);            

            // Close statement
            mysqli_stmt_close($stmt);
            $message = "Congratulations! You Have Added A New Ship!";

        } else {
                 $message = "Problems with inserting to Database";            
        }

    // Close connection
    mysqli_close($link);
}
?>

<html>
<head>
    <title>AddShip</title>
</head>
<body>

<?php echo $message; ?>
 
</body>
</html>
