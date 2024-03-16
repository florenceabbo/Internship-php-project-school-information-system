<?php
// Start the session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "sms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Defined variables and initialized with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Redirect user to welcome page
                            header("location: index.php");
                            exit;
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- sample.css -->
    <link rel="stylesheet" href="login1.css">
    <!-- Custom styles -->
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
input[type="email"],
input[type="password"] {
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


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group">
                    <h4>OSP DIGITAL COLLEGE</h4>
                    <img src="osplogo.png" alt="OSP Logo" class="osplogo">
                        <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email; ?>">
                        <small id="emailHelp" class="form-text text-muted"></small>
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group">
                        
                        <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                   
                    <button type="submit" class="button">Login</button>
                    <p class="mb-1">
                        <a href="forgot.php">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="register1.php" class="text-center">Don't have an account, Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
