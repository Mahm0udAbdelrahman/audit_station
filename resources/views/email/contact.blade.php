
<!-- resources/views/emails/contact.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body>
    <h1>New Contact Created</h1>

    <p><strong>Name:</strong> {{ $contactUs->name }}</p>
    <p><strong>Email:</strong> {{ $contactUs->email }}</p>
    <p><strong>Phone:</strong> {{ $contactUs->phone }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $contactUs->message }}</p>

    <p>Thank you for reaching out to us!</p>
</body>
</html>
