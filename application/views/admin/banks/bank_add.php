<div class="container mt-5">
<form action="<?= base_url()?>index.php/admin/bank_add_post" method="post">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="">المبلغ</label>
            <input type="text" required="true" class="form-control" name="balance" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group col-md-6">
            <label for="">البنك</label>
            <select class="form-control" name="bank_id" id="">
                <?php foreach ($banks as $bank) : ?>
                <option value="<?=  $bank->id ?>"><?=  $bank->name ?> - <?=  $bank->account ?></option>
                <?php endforeach ; ?>

            </select>
        </div>
        <div class="form-group col-md-6">
		<div class="form-group">
		  <label for=""></label>
		  <input type="submit" class="btn btn-md btn-primary btn-sm" value="ايداع">
		</div>
        </div>
    </div>
</form>

</div>
