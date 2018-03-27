<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h3>Welcome</h3>

		<p><b>Account:</b> {{ $email }} has been created successfully,</p>
		<p>To activate your account, <a href="{{ route('auth.activation.attempt', urlencode($code)) }}">click here.</a></p>
		<p>Thank you!</p>
	</body>
</html>