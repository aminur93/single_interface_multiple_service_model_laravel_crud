
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Application</title>
</head>
<body style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">

    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f8f8f8; border-radius: 5px;">

        <h2>Welcome to Our Application!</h2>

        <p>Dear {{ $user->name }},</p>

        <p>We are excited to welcome you to our community. Thank you for joining us!</p>

        <p>Your account has been successfully created. Here are your account details:</p>

        <ul>
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
        </ul>

        <p>If you have any questions or need assistance, feel free to contact us.</p>

        <p>Thank you again for joining!</p>

        <p>Best regards,<br>
        Your Application Team</p>

    </div>

</body>
</html>


