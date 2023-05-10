<html>

<head>
	<title>Live weather</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body style="background-color:#ebebeb">
	<div class="container" class="header" style="background-color:white;">
	<div class="row" style="width:90%;margin:10% 0 10% 0">
		
		<div class="col col-sm-4" >
		<form style="width:90%;margin:10% 0 10% 0">
			 
			<input type="text" name="city" class="city form-control" placeholder="Enter the city name" style="width:100%"/>
			<button type="button" id="weather" class="btn btn-success" style="margin:10% 0 10% 0">Get weather</button>
		</div>
		<div class="col col-sm-1" style="margin-top:2%">
		 <span id="icon"></span>
		</div>
		<div class="col col-sm-2" style="margin-top:2%"> 
			Sky weather <h2 id="sky-weather"></h2>
		</div>
		<div class="col col-sm-2" style="margin-top:2%">
			Temperature <h2 id="temperature"></h2>
		</div>
		<div class="col col-sm-1" style="margin-top:2%">
		Humidity <h2 id="humidity"></h2>
		</div>
		<div class="col col-sm-2" style="margin-top:2%">
		Wind-speed <h2 id="wind"></h2>
		</div>
		
	</div>
</div></form>
<div>

</div>
<script>
	$(document).ready(function () {
		$('#weather').click(function () {
			var city=$('.city').val();
			$.ajax({
				url:'index.php/Welcome/get_weather',
				dataType:"JSON",
				type:"POST",
				data:{city:city},
				success: function(data){
					$('#sky-weather').html(data.weather_data.weather[0].description);
					$('#temperature').html((data.weather_data.main.temp-273.15).toFixed(2)+'°c');
					$('#humidity').html(data.weather_data.main.humidity+'%');
					$('#wind').html(data.weather_data.wind.speed+' km/h');
					$('#icon').html('<img src="https://openweathermap.org/img/wn/'+data.weather_data.weather[0].icon+'.png">');
				}
			})
		});
})

	</script>
</body>
</html>