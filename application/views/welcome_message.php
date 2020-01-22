<!DOCTYPE html>
<html>
<head>
	<title>ddd</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
	<style>
		#container{
			
			background-image: url('<?= base_url() ?>certificate.jpg');
			background-size: cover;
			overflow: hidden;
			background-size: #ddd;
			border: 1px solid;
			background-color: red;
		}
		p{
			font-size: 50px;
			text-align: center;
			color: green;
		}
	</style>
</head>
<body >


	 <div id="container">
    
      <p><font  color="red">print this to pdf</font></p>
      <p><font  color="red">print this to pdf</font></p>
      <p><font  color="red">print this to pdf</font></p>
      <p><font >print this to pdf</font></p>
    </div>


<script>
	// return
var doc = new jsPDF('p', 'pt', 'letter');
 // var doc = new jsPDF('l', 'pt', 'a4')         
var elementHandler = {
  '#ignorePDF': function (element, renderer) {
    return true;
  }
};
var source = window.document.getElementsByTagName("body")[0];
doc.fromHTML(
    source,
    15,
    15,
    {
      // 'width': 180,
      'elementHandlers': elementHandler
    });

doc.output("dataurlnewwindow");

</script>
</body>
</html>