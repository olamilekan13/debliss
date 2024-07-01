<!DOCTYPE html>
<html>
<head>
    <title>Contact Us Submission</title>
</head>
<body>
    <h1>Contact Us Submission</h1>
    <p><strong>Name:</strong> {{ $emailData['name'] }}</p>
    <p><strong>Email:</strong> {{ $emailData['email'] }}</p>
    <p><strong>Phone Number:</strong> {{ $emailData['phone_number'] }}</p>
    <p><strong>Check In Time:</strong> {{ $emailData['check_in'] }}</p>
    <p><strong>Check Out Time:</strong> {{ $emailData['check_out'] }}</p>
    <p><strong>Room Type:</strong> {{ $emailData['room_type'] }}</p>
    <p><strong>Adult No:</strong> {{ $emailData['adult'] }}</p>
    <p><strong>Children No:</strong> {{ $emailData['children'] }}</p>
    <p><strong>Room :</strong> {{ $emailData['room'] }}</p>
   
</body>
</html>
