

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Body background image */
        body {
            background-image: url('home.jpg'); /* Replace with your background image path */
            background-size: cover;
            margin: 0;
            padding: 0;
			color:#FFFADA;
        }

        /* Styles for the form */
        h2 {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(150, 150, 150, 0.4); /* Adjust the last value (0.7) for transparency */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Additional styles for form elements */
        input[type="text"],
        input[type="email"],
        input[type="time"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>

</html>



<?php
if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    $link = mysqli_connect('localhost', 'root', '', 'lastyear');
    
    if ($link === false) {
        die("Error: Could not connect. " . mysqli_connect_error());
    }
	
    
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($link, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        
        // Display a form to edit the booking details with data pre-filled.
        echo "<h2>Edit Booking</h2>";
        echo "<form method='POST' action='update.php'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "Name: <input type='text' name='name' value='" . $row['name'] . "' required><br>";
        echo "Email: <input type='email' name='email' value='" . $row['email'] . "' required><br>";
        echo "Time: <input type='time' name='time' value='" . $row['time'] . "' required><br>";
        echo "Date: <input type='date' name='date' value='" . $row['date'] . "' required><br>";
        echo "Select hairstyle: ";
        echo "<select name='style' size='4' multiple>";
        echo "<option value='Extention' " . (in_array('Extention', explode(',', $row['style'])) ? 'selected' : '') . ">Extention</option>";
        echo "<option value='Make-up' " . (in_array('Make-up', explode(',', $row['style'])) ? 'selected' : '') . ">Make-up</option>";
        echo "<option value='Nails' " . (in_array('Nails', explode(',', $row['style'])) ? 'selected' : '') . ">Nails</option>";
        echo "<option value='Hair cut' " . (in_array('Hair cut', explode(',', $row['style'])) ? 'selected' : '') . ">Hair cut</option>";
        echo "<option value='Color and highlight' " . (in_array('Color and highlight', explode(',', $row['style'])) ? 'selected' : '') . ">Color and highlight</option>";
        echo "<option value='Hair treatment' " . (in_array('Hair treatment', explode(',', $row['style'])) ? 'selected' : '') . ">Hair treatment</option>";
        echo "</select><br>";
        echo "Contact Details: <input type='text' name='contact_details' value='" . $row['contact_details'] . "' required><br>";
        echo "<input type='submit' name='update' value='Update'>";
        echo "</form>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    
    mysqli_close($link);
} else {
    echo "Please select an action to perform on the booking.";
}
?>