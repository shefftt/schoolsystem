<div class="container">
<form action="<?= base_url()?>index.php/admin/trainers_for_period" method="post">
<div class="form-group">
        <label for="">بدايه الفتره</label>
        <input type="date" class="form-control" name="date_from" id="" aria-describedby="helpId" placeholder="">
    </div>

	<div class="form-group">
        <label for="">نهايه الفتره</label>
        <input type="date" class="form-control" name="date_to" id="" aria-describedby="helpId" placeholder="">
    </div>
	<div class="form-group">
	<button type="submit" class="btn btn-primary">بحث</button>
    </div>

</form>

</div>
