<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Get the data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // 2. Validate
    if ( empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please complete the form and try again.";
        exit;
    }

    // 3. Set the recipient (YOUR EMAIL)
    $recipient = "info@ifuturecorporation.com";
    $subject = "New Contact from $name";

    // 4. Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // 5. Build the email headers
    // FIX: Send FROM your own domain, not the user's email.
    $email_headers = "From: Website Form <noreply@ifuturecorporation.com>\r\n";
    
    // FIX: Add Reply-To so when you click reply, it goes to the user.
    $email_headers .= "Reply-To: $name <$email>\r\n";
    
    // Optional: Content-type for better formatting
    $email_headers .= "X-Mailer: PHP/" . phpversion();
    
    // 6. Send
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Redirect back to the homepage with a success message
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    echo "There was a problem with your submission, please try again.";
}
?>