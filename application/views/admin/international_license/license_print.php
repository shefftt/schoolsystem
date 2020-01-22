<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>طباعه رخصه</title>
</head>
<body>
<center>
	<h2>اكاديميه جدو لتعلم قياده </h2>
	<hr>
	<h3>رخصه دوليه</h3>
	<u>
	<h2> صاحب الرخصه : <?= $print->name ?></h2>
	<h2>  الفرع : <?= $print->school_id ?></h2>
	<h2>  الموظف : <?= user_info($print->user_id)->name ?></h2>
</u>
		<h2>
			 <?= $print->created_at ?>
	</h2>
	<h3>الختم</h3>
</center>
</body>
</html>


