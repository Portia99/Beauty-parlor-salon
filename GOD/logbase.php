<?php
$errors = [];
$loginError = "";

$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Please enter your email";
    }

    if (empty($password)) {
        $errors["password"] = "Please enter your password";
    }

    if (empty($errors)) {
        // Validation passed, no validation errors, proceed with the login logic
        $link = mysqli_connect('localhost', 'root', '', 'lastyear');

        if ($link === false) {
            die("not connected");
        } else {
            $stmt = $link->prepare("SELECT * FROM admin WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                $data = $stmt_result->fetch_assoc();
                if ($data['password'] == $password) {
                    // Redirect to admin.php after successful login
                    header("Location: admin.php");
                    exit; // Always exit after a header redirect
                } else {
                    $loginError = "Incorrect email or password";
                }
            } else {
                $loginError = "Incorrect email or password";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Add your CSS and other head content here -->
</head>	


<style>
body {
    background-image: url('home.jpg');
    background-size: cover;
    margin: 0;
    padding: 0;
	background-image: url('home.jpg');
    font-family: Arial, sans-serif;
	color:#FFFADA;
}

.form-container {
    background-color: rgba(255, 255, 255, 0.7); /* Adjust the last value (0.7) for transparency */
    width: 50%;
    margin: 10% auto;
    padding: 20px;
	 background-color: rgba(150, 150, 150, 0.4); /* Adjust the last value (0.7) for transparency */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  
    text-align: center;
}

h1 {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

form {
    text-align: left;
}

form input[type="text"],
form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
	background-color: rgba(260, 260, 260, 0.7);
	
}

form input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	
}

form input[type="submit"]:hover {
    background-color: #555;
}

span {
    color: red;
}
</style>










<body>
    <div class="background-image">
        <div class="form-container">
            <h1>Login</h1>
	<?php
			if(isset($_POST['error'])){?>
			
			<p class="error"><?php echo $_POST['error'];?></p>
			
			<?php
			}
			?>
            <form action="logbase.php" method="post" >
			
			 Email<input type="text" name="email" value="<?php echo $email; ?>">
                <span class="errors">*<?php echo $errors["email"] ?? ""; ?></span><br>
           		Password<input type="password" name="password" value="<?php echo $password; ?>">
                <span class="errors">*<?php echo $errors["password"] ?? ""; ?></span><br>
       
              

                <input type="submit" name="login" value="Login">
            </form>
           
        </div>
    </div>
</body>
</html>
