<?php
$link = mysqli_connect('localhost', 'root', '', 'lastyear');

if ($link === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$time = $_POST['time'];
$date = $_POST['date'];
$style = $_POST['style'];
$contact_details = $_POST['contact_details'];

// Create a prepared statement
$stmt = mysqli_prepare($link, "INSERT INTO `user` (`name`, `email`, `time`, `date`, `style`, `contact_details`) VALUES (?, ?, ?, ?, ?, ?)");

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $time, $date, $style, $contact_details);

if (mysqli_stmt_execute($stmt)) {
     header("Location: successfully.php"); 
} else {
    echo "Error: " . mysqli_error($link);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($link);
?>
 <?php

    $errors = [];
    $name = "";
    $email = "";
    $date = "";
    $time = "";
    $style = "";
	$contact_details="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $time = $_POST["time"];
        $date = $_POST["date"];
        $style = $_POST["style"];
		$contact_details = $_POST["contact_details"];

        if (empty($name)) {

            $errors["name"] = "enter name";
        } else {
            echo $name . "<br>";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "enter email";
        } else {
            echo $email;
        }

        if (empty($time)) {
            $errors["time"] = "Please enter the time";
        } else {
            echo $time . "<br>";
        }

        if (empty($date)) {
            $errors["date"] = "Please enter the date";
        } else {
            echo $date . "<br>";
        }

        if (empty($style)) {
            $errors["style"] = "Please choose at least one style";
        } else {
            echo $style . "<br>";
	}
	
	        if (empty($contact_details)) {
            $errors["contact_details"] = "Please enter your contact details";
        } else {
            echo $style . "<br>";
	}
	
	}
	?>
	
	

<!DOCTYPE html>
<html>
<head>
</head>
<body>
   	
     <form method="POST" action="bookingbase.php">
         <div>
                Name
				<input type="text" name="name" value="<?php echo $name; ?>">
                <span class="errors">*<?php echo $errors["name"] ?? ""; ?></span><br>
            </div>
            <div>
                Email<input type="text" name="email" value="<?php echo $email; ?>">
                <span class="errors">*<?php echo $errors["email"] ?? ""; ?></span><br>
            </div>
            <div>
                <label for="time">Time:</label>
                <input type="time" name="time" id="time" value="<?php echo $time; ?>">
                <span class="error">* <?php echo $errors["time"] ?? ""; ?></span><br>
            </div>
            <div>
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" value="<?php echo $date; ?>">
                <span class="error">* <?php echo $errors["date"] ?? ""; ?></span><br>
            </div>
      Select style <select name="style" id="style">
	  
            <option value="Extention">Extention</option>
            <option value="Make-up">Make-up</option>
            <option value="Nails">Nails</option>
            <option value="Hair cut">Hair cut</option>
            <option value="Color and highlight">Color and highlight</option>
            <option value="Hair treatment">Hair treatment</option>
        </select><br> 
		
		      <label for="contact details">Contact details</label>
                <input type="number" name="contact_details" id="date" value="<?php echo $contact_details; ?>">
                <span class="error">* <?php echo $errors["contact_details"] ?? ""; ?></span><br>
            </div>
        <input type="submit" value="Insert Data">
    </form>
    </form>
</body>
</html>
