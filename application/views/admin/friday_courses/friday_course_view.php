<div class="container mt-5">
    <form action="<?= base_url() ?>index.php/admin/friday_course_view_get" method="post">
	<div class="row">
        <div class="form-group col-md-6">
            <label for="">اختر الجمعه</label>
            <input type="date" class="form-control" required="true" name="day" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group col-md-6">
		<label for="">'</label>
		<br>	
            <input class="btn btn-primary" type="submit" value="بحث">
        </div>
	</div>
    </form>

</div>
