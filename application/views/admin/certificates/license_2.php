<!DOCTYPE html>
<html>
<head>
	<title><?= $titel ?></title>
	<style>
		@page {
  size: A4;
  margin: 0;
}
@media print {
  html, img {
    /*width: 100vw;*/
  }
}
.rotate{-webkit-transform: rotate(270deg);transform: rotate(270deg);}
	</style>

</head>
<body>
<div>
	<img  style="width: 100%; z-index: 1" src="<?= base_url()?>certificate.jpg">
	<h1 style="/* position: absolute; */margin-top: -1000px;margin-right: 18%;font-size: 40px;" class="rotate">احمد  حمد وسف</h1>
</div>
</body>
</html>