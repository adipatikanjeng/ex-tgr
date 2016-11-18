
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
	Hey {{$name}}, Welcome Tigaraksa. <br>
	Please click <a href="{{ url(App::getLocale().'/customers/email-confirmation').'/'.$activation_code }}" > Here</a> to confirm email
</body>
</html>