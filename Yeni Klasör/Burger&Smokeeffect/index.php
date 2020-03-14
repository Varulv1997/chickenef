<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
		<title>Burger</title>
	</head>

	<body style = "background: rgb(23, 23, 23">


	<script>


		document.body.onload = function(){

				document.body.style.display = "flex";
				document.body.style.justifyContent = "center";

				var parent = document.createElement("div");
				parent.style.width = "564px";
				parent.style.height = "765px";
				parent.style.display = "flex";
				parent.style.justifyContent = "center";
				parent.style.alignItems = "center";

				document.body.appendChild(parent);

				var canvas = document.createElement("canvas");
				canvas.width = 564;
				canvas.height = 765;
				parent.appendChild(canvas);


				var context = canvas.getContext("2d");

				var burger = document.createElement("img");
				burger.src = "burger2.jpg";

				var smoke = document.createElement("img");
				smoke.src = "smoke.png";

					var timepos, timepos2, timepos3 = 0;
					var first = new Date().getTime(), last, last2, started;
					var last3 = new Date().getTime();

				window.onfocus = function(){
					start();
				}

				function start(){
					timepos = 0;
					timepos2 = 0;
					last = new Date().getTime();
					last2 = last + Math.PI * 1300;
					started = true;
					first *= 100000000;
				}

					redraw();


				//********************************* redraw ***********************************
				function redraw(){
					
							var now = new Date().getTime();

							
							if (now - first > 1200 || started){
								context.globalCompositeOperation = "source-over";
								if (!started) context.globalAlpha = Math.sin((now - first - 1200) / 1000);
								if (!started) context.clearRect(0, 0, canvas.width, canvas.height);
								if (started || now - first > 2500) context.globalAlpha = 1;
								context.drawImage(burger, 0, 0);
							}							

							if (now - first > 4200) start();

							context.globalCompositeOperation = "screen";

							if (started){
								var dt = now - last;
								last = now;
								timepos += dt * 0.76;
								if (timepos > Math.PI * 2000) timepos = 0;

								dt = now - last2;
								last2 = now;
								timepos2 += dt * 0.76;
								if (timepos2 > Math.PI * 2000) timepos2 = 0;					

								if (timepos > 0) sheet(timepos);
								if (timepos2 > 0) sheet(timepos2);
							}


							//************************************************************************
							function sheet(pos){

								var alpha =  1 - Math.abs( Math.cos(pos / 2800 + 0.9));
								context.globalAlpha = alpha;
								var H = 140 + 3 * pos / 8;
								if (H < 100) H = 100;
								if (H > 650) H = 650;
								var TOP = 380 - pos / 11.5;

								context.drawImage(smoke, 0, 0, smoke.naturalWidth, smoke.naturalHeight,   80,    TOP - H / 2,   225,  H);
								context.drawImage(smoke, 0, 0, smoke.naturalWidth, smoke.naturalHeight,   190,   TOP - H * 0.8 / 2 + 50,   310,  H * 0.8 - 50);
							}


							//************************************************************************
							if (now - first > 1700 || started){
								dt = now - last3;
								last3 = now;
								timepos3 += dt * 0.76;
								if (timepos3 > Math.PI * 2000) timepos3 = 0;

								context.globalAlpha =  1;
								if (now - first < 3500) context.globalAlpha = Math.sin((now - first - 1700) / 900);

								var k = Math.sin(timepos3 / 500);
								context.drawImage(smoke, 0, 0, smoke.naturalWidth, smoke.naturalHeight, 90 + 10 * k,   300 - 12 * k,   210, 140 + 24 * k);
								context.drawImage(smoke, 0, 0, smoke.naturalWidth, smoke.naturalHeight, 135 + 20 * k,  335 - 8 * k,    290, 90 + 16 * k);
								context.drawImage(smoke, 0, 0, smoke.naturalWidth, smoke.naturalHeight, 185 + 10 * k,  330 - 8 * k,    290, 100 + 16 * k);
							}

					requestAnimationFrame(redraw);
				}
		}

	</script>

	</body>

</html>




