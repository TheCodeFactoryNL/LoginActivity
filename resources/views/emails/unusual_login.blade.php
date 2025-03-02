<!DOCTYPE html>
<html>
<head>
    <title>Unusual login</title>
</head>
<body>
<p>Hello {{ $user->name }},</p>
<p>We detected a login attempt from a new device or location:</p>
<ul>
    <li><strong>IP-address:</strong> {{ $ip }}</li>
    <li><strong>Device:</strong> {{ $device }}</li>
</ul>
<p>Wasn't this you? We recommend changing your password.</p>
</body>
</html>
