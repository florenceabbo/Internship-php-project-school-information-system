<?php
// Include your database connection file
include('dbconn.php');

// Function to generate a random token
function generateToken() {
    return bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted with an email
    if (isset($_POST['email'])) {
        // Validate the email
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        if (!$email) {
            // Handle invalid email
            echo "Invalid email address";
            exit;
        }

        // Check if the email exists in your database
        // Assuming you have a table named 'users' with columns 'id' and 'email'
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Generate a unique token
            $token = generateToken();

            // Store the token in your database with the user's id
            $stmt = $pdo->prepare("INSERT INTO password_resets (user_id, token) VALUES (?, ?)");
            $stmt->execute([$user['id'], $token]);

            // Send an email to the user with a password reset link
            $resetLink = "http://yourwebsite.com/reset_password.php?token=$token";
            $to = $email;
            $subject = "Password Reset Request";
            $message = "Click the following link to reset your password: $resetLink";
            $headers = "From: your_email@example.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Password reset link has been sent to your email address";
            } else {
                echo "Failed to send password reset email";
            }
        } else {
            echo "Email address not found";
        }
    }
}
?>
