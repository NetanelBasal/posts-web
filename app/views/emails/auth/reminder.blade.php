<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>איפוס סיסמא</h2>

		<div>
			על מנת לאפס את הסיסמא כנס לקישור הבא: {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>