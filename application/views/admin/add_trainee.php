<div class="card m-5" id="app">
	<div class="card-body">
		<form>
			<div class="row">
				<div class="col-md-6 mt-2">
					<input type="text" class="form-control" v-model="name" placeholder="اسم المتدرب">
				</div>
				<div class="col-md-6 mt-2">
					<input type="text" class="form-control" v-model="phone" placeholder="الهاتف">
				</div>
				<div class="col-md-6 mt-2">
					<label for="">المبلغ</label>

					<input type="text" class="form-control" v-model="amount" placeholder="المبلغ">
				</div>
				<div class="col-md-6 mt-2">
					<label for="">فرع المسافه</label>

					<input type="text" class="form-control" v-model="distance_cost" placeholder="فرق المسافه">
				</div>
				<div class="col-md-6 mt-2">
					<div class="form-group">
						<label for="">طريقه الدفع</label>
						<select v-model="bank_account" class="form-control" name="" id="">
							<option value="0">كاش</option>
							<?php $i = 1;
							foreach ($banks as $bank) : ?>

								<option value="<?= $bank->id ?>"><?= $bank->name ?> <?= $bank->account ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="col-md-6 mt-2">
					<div class="form-group">
						<label for="">السكن</label>
						<select v-model="address" class="form-control" name="" id="">
							<!-- ام درمان – الخرطوم – شر النيل – بحرى – ام بده – كررى – جبل اوليا – اخرى  -->
							<option>ام درمان</option>
							<option>الخرطوم</option>
							<option>شرق النيل</option>
							<option>ام بده</option>
							<option>جبل اوليا</option>
							<option>اخرى</option>
						</select>
					</div>
				</div>
				<div class="col-md-6 mt-2">
					<div class="form-group">
						<label for="">نوع التسجيل</label>
						<select v-model="resgistration_type" class="form-control" name="" id="">
							<!-- ام درمان – الخرطوم – شر النيل – بحرى – ام بده – كررى – جبل اوليا – اخرى  -->
							<option>new</option>
							<option>old</option>
						</select>
					</div>
				</div>
				<div class="col-md-6 mt-2">
					<label for="invti"></label>
					<input id="invti" type="text" class="form-control" v-model="invited_from" placeholder="جاى من طرف منو " name="">
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="form-group">
					<label>تعرفت علينا عن طريق</label>
					<br>
					<br>
					<div class="kt-checkbox-inline">
						<label class="kt-checkbox">
							<input type="checkbox"> صديق
							<span></span>
						</label>
						<label class="kt-checkbox">
							<input type="checkbox"> اعلانات ورقيه
							<span></span>
						</label>
						<label class="kt-checkbox">
							<input type="checkbox"> الانترنت
							<span></span>
						</label>
					</div>
				</div>
			</div>
			<hr>

		</form>
	</div>

	<hr>

	<div class="row">
		<div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
			<!--begin:: Widgets/Download Files-->
			<div class="kt-portlet kt-portlet--height-fluid">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							الكورسات
						</h3>
					</div>

				</div>
				<div class="kt-portlet__body">
					<!--begin::k-widget4-->
					<div class="kt-widget4">

						<div v-for="cat in cats" class="kt-widget4__item">
							<div class="kt-widget4__pic kt-widget4__pic--icon">
								<img src="<?= base_url() ?>/assets/media/files/pdf.svg" alt="">
							</div>
							<p v-on:click="get_sub(cat)" key="cat.id" class="kt-widget4__title">
								{{cat.name}}
							</p>
							<div class="kt-widget4__tools">
								<a href="#" class="btn btn-clean btn-icon btn-sm">
									<i class="flaticon2-download-symbol-of-down-arrow-in-a-rectangle"></i>

								</a>
							</div>
						</div>


					</div>
					<!--end::Widget 9-->
				</div>
			</div>
			<!--end:: Widgets/Download Files-->
		</div>
		<div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
			<!--begin:: Widgets/Download Files-->
			<div class="kt-portlet kt-portlet--height-fluid">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							{{cat_name}}
						</h3>
					</div>

				</div>
				<div class="kt-portlet__body">
					<!--begin::k-widget4-->
					<div class="kt-widget4">

						<div v-for="cat in sub" class="kt-widget4__item">
							<div class="kt-widget4__pic kt-widget4__pic--icon">
								<img src="<?= base_url() ?>/assets/media/files/pdf.svg" alt="">
							</div>
							<p v-on:click="course_selection(cat)" class="kt-widget4__title">
								{{cat.name}}
							</p>
							<div class="kt-widget4__tools">
								<a href="#" class="btn btn-clean btn-icon btn-sm">
									<i class="flaticon2-download-symbol-of-down-arrow-in-a-rectangle">{{cat.price}} </i>
									جنيه
								</a>
							</div>
						</div>


					</div>
					<!--end::Widget 9-->
				</div>
			</div>
			<!--end:: Widgets/Download Files-->
		</div>
		<div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
			<!--begin:: Widgets/Download Files-->
			<div class="kt-portlet kt-portlet--height-fluid">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							بيانات العميل
						</h3>
					</div>

				</div>
				<div class="kt-portlet__body">
					<!--begin::k-widget4-->
					<div class="kt-widget4">

						<div class="kt-widget4__item">
							<div class="kt-widget4__pic kt-widget4__pic--icon">
							</div>
							<p class="kt-widget4__title">
								- اسم المتدرب
								: {{name}}
							</p>
							<div class="kt-widget4__tools">
								<a href="#" class="btn btn-clean btn-icon btn-sm">
									<i class="flaticon2-download-symbol-of-down-arrow-in-a-user"></i>
								</a>
							</div>
						</div>
						<div class="kt-widget4__item">
							<div class="kt-widget4__pic kt-widget4__pic--icon">
							</div>
							<p class="kt-widget4__title">
								الهاتف
								: {{phone}}
							</p>
							<div class="kt-widget4__tools">
								<a href="#" class="btn btn-clean btn-icon btn-sm">
									<i class="flaticon2-download-symbol-of-down-arrow-in-a-user"></i>
								</a>
							</div>
						</div>
						<div class="kt-widget4__item">
							<div class="kt-widget4__pic kt-widget4__pic--icon">
							</div>
							<p class="kt-widget4__title">
								العنوان
								: {{address}}
							</p>
							<div class="kt-widget4__tools">
								<a href="#" class="btn btn-clean btn-icon btn-sm">
									<i class="flaticon2-download-symbol-of-down-arrow-in-a-user"></i>
								</a>
							</div>
						</div>
						<div class="kt-widget4__item">
							<div class="kt-widget4__pic kt-widget4__pic--icon">
							</div>
							<p class="kt-widget4__title">
								جاى من طرف
								: {{invited_from}}
							</p>
							<div class="kt-widget4__tools">
								<a href="#" class="btn btn-clean btn-icon btn-sm">
									<i class="flaticon2-download-symbol-of-down-arrow-in-a-user"></i>
								</a>
							</div>
						</div>
						<div class="kt-widget4__item">
							<div class="kt-widget4__pic kt-widget4__pic--icon">
							</div>
							<p class="kt-widget4__title">
								المبلغ
								: {{ amount }}
							</p>
							<div class="kt-widget4__tools">
								<a href="#" class="btn btn-clean btn-icon btn-sm">
									<i class="flaticon2-download-symbol-of-down-arrow-in-a-user"></i>
								</a>
							</div>
						</div>
						<div class="kt-widget4__item form-group">

							<button @click="add_trainee" class="btn-info btn btn-md">اضافة متدرب</button>
						</div>

					</div>
					<!--end::Widget 9-->
				</div>
			</div>
			<!--end:: Widgets/Download Files-->
		</div>
	</div>


</div>

<script>
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	var app = new Vue({
		el: '#app',
		data: {
			posts: [],
			resgistration_type : 'new',
			sub: [],
			cats: [],
			cat_name: 'تقاصيل الكورسات',

			//	trainers info `name`, `phone`, `address`, `invited_from`
			name: '',
			phone: '',
			address: 'ام درمان',
			invited_from: '',
			amount: 0,
			distance_cost: 0,
			course_id: 0,
			number_of_days: 0,
			bank_account: 0,
		},
		mounted() {

			//  this.tampil();
			this.get_cat()
		},
		methods: {

			add_trainee1() {

				window.open('<?= base_url() ?>index.php/admin/print_billing/1', '_blank');
			},
			add_trainee() {
				if (this.name == "")

					toastr["error"]('اسم المتدرب اجبارى', "خطاء")

				else if (this.phone == "")
					toastr["error"]('رقم المتدرب اجبارى', "خطاء")

				else if (this.phone < 1)
					toastr["error"]('عفوا يجب ادخال الدفعيه', "خطاء")

				else if (this.course_id == 0)
					toastr["error"]('الرجاء تحديد الكورس', "خطاء")

				else if (this.amount == 0)
					toastr["error"]('الرجاء اضافة المقدم ', "خطاء")

				else {
					axios.get('<?= base_url() ?>index.php/api/add_trainee_post', {
							params: {
								name: this.name,
								phone: this.phone,
								address: this.address,
								invited_from: this.invited_from,
								amount: this.amount,
								distance_cost: this.distance_cost,
								number_of_days: this.number_of_days,
								course_id: this.course_id,
								bank_account: this.bank_account,
								resgistration_type: this.resgistration_type,
							}
						})
						.then(function(response) {

							this.name = ''
							this.phone = ''
							this.address = ''
							this.invited_from = ''
							this.amount = 0
							this.course_id = 0
							this.number_of_days = 0

							console.log(response.data)
							// var response_obj = JSON.parse(response)
							
							if (response.data.erorr === 'true') {
								toastr["error"](response.data.message, "خطاء")
							} else {

								toastr["success"](response.data.message, "نجاح")
								// location.reload();
								window.open('<?= base_url() ?>index.php/admin/print_billing/' + response.data.course_id, '_blank');
								
							}





						})
						.catch(function(error) {
							console.log(error);
						})
						.then(function() {
							// always executed
						});
				}
			},
			course_selection(cat) {

				this.course_id = cat.id;
				this.number_of_days = cat.number_of_days;
				console.log(cat)
			},
			get_sub(cat) {

				this.cat_name = " كورسات " + cat.name;

				this.course_id = 0;
				this.number_of_days = 0;
				console.log(cat)
				axios.get("<?= base_url() ?>index.php/api/get_course/" + cat.id).then(response => (
					this.sub = response
					.data))

			},
			get_cat() {
				axios.get("<?= base_url() ?>index.php/api/get_all_courses").then(response => (this
					.cats = response.data))
			},
		}
	})
</script>
