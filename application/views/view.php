<html>

<head>
	<title>PNR Status</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body style="background-color:#ebebeb">
	<div class="row" style="margin-top:10%">
		<div class="container">
			<div class="col col-md-12">
				<h3 class="text-center bg-primary" style="padding: 7px;">
					Passenger Current Status Enquiry
					</h3>
					<input type="text" class="pnr" placeholder="ENTER PNR No." />
					<button type="button" id="status" class="btn btn-success">Get your train status</button>

					<p class="trainName"></p>

				</div>
			</div>
		</div>
</body>
<script>
	$(document).ready(function () {
		$('#status').click(function () {
			var pnr = $('.pnr').val();
			$.ajax({
				url: 'index.php/welcome/get_status',
				dataType: "JSON",
				data: { pnr: pnr },
				success: function (data) {
					$('.trainName').html(data.trainName);

				}
			});
		});
	});
</script>

</html>