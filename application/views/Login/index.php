<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>اكاديميه جدو تسجيل الدخول</title>
</head>
<body>
	<br>
	<br>
	<br>
	<br>

	

<center>
    <h1>
        <?= $this->session->flashdata('Error_massege'); ?>
    </h1>
    <form action="<?= base_url()?>index.php/login/login_post" method="post">
        <div class="form-group">
            <label for="">البريد</label>
            <input  required="true"  type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
        </div>
		<br>
        <div class="form-group">
            <label for="">كلمه السر</label>
            <input required="true" type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">دخول</button>
    </form>
</center>

</body>
</html>
