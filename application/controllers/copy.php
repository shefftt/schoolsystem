<!DOCTYPE html>
<html>
<head>
	<title><?= $titel ?></title>
	<style>
		@page { margin: 0 }
body { margin: 0 }
.sheet {
  margin: 0;
  overflow: hidden;
  position: relative;
  box-sizing: border-box;
  page-break-after: always;
}

/** Paper sizes **/
body.A3           .sheet { width: 297mm; height: 419mm }
body.A3.landscape .sheet { width: 420mm; height: 296mm }
body.A4           .sheet { width: 210mm; height: 296mm }
body.A4.landscape .sheet { width: 297mm; height: 209mm }
body.A5           .sheet { width: 148mm; height: 209mm }
body.A5.landscape .sheet { width: 210mm; height: 147mm }

/** Padding area **/
.sheet.padding-10mm { padding: 10mm }
.sheet.padding-15mm { padding: 15mm }
.sheet.padding-20mm { padding: 20mm }
.sheet.padding-25mm { padding: 25mm }

/** For screen preview **/
@media screen {
  body { background: #e0e0e0 }
  .sheet {
    background: white;
    box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
    margin: 5mm;
  }
}

/** Fix for Chrome issue #273306 **/

@page {
  size: landscape;
  margin: 0;
}
@media print {
  html, body , .A4 {
    width: 210mm;
    height: 297mm;
  }
  /* ... the rest of the rules ... */
}
html
  {
    overflow:scroll;    
  }
	</style>
</head>
<body>
<div class="A4">
<div style="  height: auto;background-image: url('<?= base_url()?>certificate.jpg'); background-size: cover;height: 225mm; width:150%;
    margin:0 0 0 0;">
	<h6 style="direction: rtl; margin-top: 316px;position: absolute;float: right;margin-left: 50%;font-size: 43px;">
		<?= $name ?>
	</h6>

	<h6 style="direction: rtl;margin-top: 130px;position: absolute;float: right;margin-left: 39%;font-size: 47px;">
		نظرى
	</h6>

	<h6 style="direction: rtl; margin-top: 400px;position: absolute;float: right;margin-left: 28%;font-size: 53px;">
		عامه
	</h6>
	<h6 style="direction: rtl; margin-top: 400px;position: absolute;float: right;margin-left: 80%;font-size: 47px;">
		<?= $gender ?>
	</h6>	

	<h6 style="direction: rtl; margin-top: 490px;position: absolute;float: right;margin-left: 48%;font-size: 47px;">
		<?= date("Y-m-d") ?>
	</h6>

	<h6 style="direction: rtl; margin-top: 490px;position: absolute;float: right;margin-left: 16%;font-size: 47px;">
		<?= get_school_info(auth_user()->school_id)->name ?>
	</h6>
</div>
</div>
</body>
</html>