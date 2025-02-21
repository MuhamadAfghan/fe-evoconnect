<!DOCTYPE html>

<html>

<head>

    <title>EVOConnect.com</title>

</head>

<body>

    <h1>{{ $mailData['subject'] }}</h1>


    <p>{{ $mailData['name'] . ' | ' . $mailData['phone'] . ' | ' . $mailData['email'] }}</p>

    <p>{{ $mailData['message'] }}</p>

    <p>Thank you</p>

</body>

</html>
