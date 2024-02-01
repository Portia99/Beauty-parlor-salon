
<head>
<style>


body {
    background-image: url('home.jpg');
	color:#FFFADA;
	 
}

/* Table styles */
table {
    background-color: rgba(150, 150, 150, 0.4); /* change all  */
    width: 75%;
    margin: 20px auto;
    border-collapse: collapse;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

table th, table td {
    padding: 8px 12px; /* Adjust padding to make rows smaller */
    text-align: left;
    font-size: 20px; /* Adjust font size */
}

table th {
    background-color: #333; /* head*/
    color: #fff;
}

table tr:nth-child(even) {
    background-color: rgba(242, 242, 242, 0.6); /* Adjust the alpha value for row transparency    colordark*/
}


</style>
</head>


<!-- In admin.php -->
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
		  <th>Time</th>
        <th>Date</th>
		 <th>Style</th>
        <th>Contact Details</th>
        <th>Actions</th>
    </tr>

<?php
$link = mysqli_connect('localhost', 'root', '', 'lastyear');

if ($link === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT id, name, email, time, date, style, contact_details FROM user";
$result = mysqli_query($link, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['style'] . "</td>";
        echo "<td>" . $row['contact_details'] . "</td>";

        echo "<td>";
        
		echo "<form method='POST' action='delete.php'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
        echo "<form method='POST' action='edit.php'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='submit' name='edit' value='Edit'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    mysqli_free_result($result);
} else {
    echo "No bookings yet.";
}

mysqli_close($link);
?>

