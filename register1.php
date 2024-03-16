<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Registration Form</title>
    <link rel="stylesheet" href="register1.css">
  
    <link
    href="https://fonts.googleapis.com/css2? 
    family=Ubuntu+Mono&display=swap" 
    rel="stylesheet">
    <style>
        body {
            background-image: url('mak.jpg');
            background-size: cover;
            background-position: center;
            margin: 0px;
            height: 100vh;
            display: flex;
            /*justify-content: center;*/
            align-items: center;
        }

        h4 {
            font-size: 15px;
            color: orange;
        }

        .container {
            text-align: center;
            background-color: rgb(0,0,0,0.4);
            background-size: cover;
            background-position: center;
            width:100%;
            height: 100%;
        }

        .invalid-feedback {
            color: red;
        }

        /* Center the image */
        .osplogo {
            width: 150px; /* Set the width of the image */
            height: 150px;
            margin-bottom: 20px; /* Add some space below the image */
        }
        form {
    background-color: white; /* Set form background color to white */
    padding: 25px 9px;
    border-radius: 10px;
    width: 400px;
    margin: 0 auto;
    margin-top: 60px;
   
    
}
input[type="name"],
input[type="email"]
input[type="password"]
input[type="confirm password"]
{
    width: calc(100% - 150px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #200190; 
    border-radius: 5px;
}

button{
    padding: 10px;
    background-color: orange;
    width: calc(100% - 135px);
    border-radius: 10px;
    border: none;
}
    </style>
    
</head>
<body>

<?php
// initializing an empty array to store validation errors
$errors = array();

// Database connection parameters having variables to store the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sms";

// Created connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Checking if there was an error in database connection, then terminates the script
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Checking if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $name = $_POST['name']; // Retieves the name submitted
    //Checks if the name wasn't provided then displays error
    if (empty($name)) {
        $errors[] = "Name is required";
    }

    // Validate email
    $email = $_POST['email'];
     //Checks if the email wasn't provided then displays error
    if (empty($email)) {
        $errors[] = "Email is required";
    // Using the !filter_var function to validate the email value
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate password
    $password = $_POST['password'];
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // Validate confirm password
    $confirmPassword = $_POST['confirm_password'];
    if (empty($confirmPassword)) {
        $errors[] = "Confirm Password is required";
    } elseif ($confirmPassword !== $password) {
        $errors[] = "Passwords do not match";
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        // Set parameters and execute
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password before storing

        if ($stmt->execute()) {
            // Redirect to login1.php
            header("Location: login1.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // If there are errors, display them
        echo "<h2>Error occurred:</h2>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}

// Close connection
$conn->close();
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<h4>OSP DIGITAL COLLEGE</h4>
                    <img src="osplogo.png" alt="OSP Logo" class="osplogo">
    
    <input type="text"  placeholder= "Enter full name" id="name" name="name"><br><br>

   
    <input type="email" placeholder= "Enter  valid email" id="email" name="email"><br><br>

  
    <input type="password"  placeholder= "Enter password" id="password" name="password"><br><br>

   
    <input type="password" placeholder= "Confirm password" id="confirm_password" name="confirm_password"><br><br>

    <input type="submit" value="Register">
    <button name="submit">submit</button>
</form>

</body>
</html>
