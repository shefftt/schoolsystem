<div class="container mt-4">
    <form action="<?= base_url()?>index.php/admin/trainers_for_period" method="post">
        <div class="row">
		<div class="form-group col-md-6">
            <label for="">بدايه الفتره</label>
            <input type="date" class="form-control" name="date_from" id="" aria-describedby="helpId" placeholder="">
        </div>

        <div class="form-group col-md-6">
            <label for="">نهايه الفتره</label>
            <input type="date" class="form-control" name="date_to" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">بحث</button>
        </div>
		</div>

    </form>

</div>
