<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            background-image: url('home.jpg');
            color: #FFFADA;
        }

        h1 {
            text-align: center;
            color: #FFFADA;
            background-color: #333;
            height: 60px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: rgba(150, 150, 150, 0.4);
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="time"],
        input[type="date"],
        select,
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            height: auto;
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

        .error {
            color: red;
        }
    </style>
    <title>Booking Form</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>
<body>
<h1>Booking Form</h1>
<?php
if (isset($_POST['error'])) {
    ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
    <?php
}
?>
<form method="POST" action="bookingbase.php">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <span id="emailError" class="error"></span>
    </div>

    <div>
        <label for="time">Time:</label>
        <input type="time" name="time" id="time" min="07:00" max="19:00" required>
    </div>

    
    <div>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required>
    </div>

    <label>Select Style:</label>
    <select name="style" id="style">
        <option value="Extention">Extention</option>
        <option value="Make-up">Make-up</option>
        <option value="Nails">Nails</option>
        <option value="Hair cut">Hair cut</option>
        <option value="Color and highlight">Color and highlight</option>
        <option value="Hair treatment">Hair treatment</option>
    </select><br>

    <label for="contact_details">Contact details</label>
    <input type="tel" name="contact_details" id="contact_details" pattern="[0-9]{10}" required>

    <input type="submit" value="Book Now">
</form>
<script>
    var dateInput = document.getElementById("date");
    var today = new Date();
    today.setDate(today.getDate() + 1); // Tomorrow's date
    var minDate = today.toISOString().split("T")[0];
    dateInput.setAttribute("min", minDate);
	
	
    var nameInput = document.getElementsByName("name")[0];
    nameInput.addEventListener("input", function () {
        var value = nameInput.value;
        var regex = /^[a-zA-Z\s]*$/;
        if (!regex.test(value)) {
            nameInput.setCustomValidity("Name should not contain numbers.");
        } else {
            nameInput.setCustomValidity("");
        }
    });
	
    var emailInput = document.getElementById("email");
    var emailError = document.getElementById("emailError");

    emailInput.addEventListener("input", function () {
        var email = emailInput.value;
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if (!emailPattern.test(email)) {
            emailError.textContent = "Invalid email address";
            emailInput.setCustomValidity("Invalid email address");
        } else {
            emailError.textContent = "";
            emailInput.setCustomValidity("");
        }
    });
</script>
</body>
</html>
