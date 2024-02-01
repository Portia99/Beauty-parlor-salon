<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $contact_details = $_POST['contact_details'];
    $style = $_POST['style'];

    $link = mysqli_connect('localhost', 'root', '', 'lastyear');

    if ($link === false) {
        die("Error: Could not connect. " . mysqli_connect_error());
    }

    $sql = "UPDATE user SET name='$name', email='$email', time='$time', date='$date', style='$style', contact_details='$contact_details' WHERE id = $id";

    if (mysqli_query($link, $sql)) {
        echo "Booking updated successfully!";
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
