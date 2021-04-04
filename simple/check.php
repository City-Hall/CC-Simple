<?php
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$ship = $year = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

        $ship = trim($_POST["Ship"]);
        $year = trim($_POST["Year"]);
  
    // Validate

        // Prepare a select statement
        $sql = "SELECT ship, year FROM p_ships WHERE ship = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_ship);
            
            // Set parameters
            $param_ship = $ship;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if ship exists, if yes then verify year
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $ship, $h_year);
                    if(mysqli_stmt_fetch($stmt)){
                        if($year == $h_year){
                            // Password is correct Display a message that it's OK
                            $message = "That is the correct year";

                        } else{
                            // Display an error message if password is not valid
                            $message = "the correct year is " . $h_year;
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $message = "ship was not found";
                }           
            } 

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<html>
<head>
    <title>Login</title>
</head>
<body>

<?php echo $message; ?>

</body>
</html>

