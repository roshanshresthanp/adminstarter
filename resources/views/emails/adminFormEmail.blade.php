<!DOCTYPE html>
<html>
<head>
    <title>Form Email Received</title>
</head>
<body>
    <p>You have received a new form request from email : {{ $userEmail }} .</p><br>
    <p>Regards,</p>
    <h3>{{ env("APP_NAME") }}.</h3>
</body>
</html>
