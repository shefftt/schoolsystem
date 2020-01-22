<div class="container mt-5">


    <center>
     <b>
	 <u>
	   <h2>
            كشف حساب من
            <?= $date_from ?>

            -
            الى
            <?= $date_to ?>

        </h2>
		</u>
		</b>
    </center>
    <table class="table table-striped table-inverse">
        <thead class="thead-inverse">
            <!-- trainers `name`, `phone`, `car_id`, `address`, `gender`, `status` -->
            <tr>
                <th>#</th>
                <th>اسم المدرب</th>
                <th> عدد الحصص</th>
                <th>الحصص الفاضيه </th>
                <th>الحصص الغياب </th>
                <th>السلفيات</th>
                <th>المستحق</th>
                <th>الصافى</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($trainers as $trainer) : ?>
            <!-- courses `id`, `price`, `name`, `allowance`, `category_id`, `number_of_days`, `vip`, `created_at` -->
            <tr>
                <td scope="row"><?= $i++ ?></td>
                <td><?= $trainer->name ?></td>
                <td><?= trainer_pay($trainer->id , $date_from  , $date_to) ?></td>
                <td>فاضيه</td>
                <td><?= trainer_absence($trainer->id , $date_from  , $date_to) ?></td>
                <td><?= trainer_loans($trainer->id , "in" , "trainers") - trainer_loans($trainer->id , "out" , "trainers")?></td>
                <td>20</td>
                <td>20</td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
