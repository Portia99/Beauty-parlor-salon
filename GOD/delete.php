
<?php
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $link = mysqli_connect('localhost', 'root', '', 'lastyear');
    
    if ($link === false) {
        die("Error: Could not connect. " . mysqli_connect_error());
    }
    
    $sql = "DELETE FROM user WHERE id = $id";
    
    if (mysqli_query($link, $sql)) {
        echo "Booking deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    
    mysqli_close($link);
    
    // Redirect back to the admin page
    header('Location: admin.php');
} else {
    echo "Please select an action to perform on the booking.";
}
?>