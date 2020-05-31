<?php namespace views;
?>
		<link rel="shortcut icon" href="views/presentation/principal/images/demo/icono.ico" type="views/presentation/image/x-icon">
		<title>TP Final</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="views/presentation/home/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="views/presentation/home/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1 style="color:black">Movie Pass</h1>
						<p style="color:black">Entretenimiento &nbsp;&bull;&nbsp; Cine &nbsp;&bull;&nbsp; Disfrutar</p>
						<nav>
								<form action="home/login">
								<input type="image" src="views/presentation/home/assets/css/images/icons8-entrar-50.png">
								</form>
								
							
						
						</nav>
					</header>

				<!-- Footer -->
					<footer id="footer">
						<span class="copyright">&copy; Derechos Reservados 2019</span>
					</footer>

			</div>
		</div>
		<script>
			window.onload = function() { document.body.classList.remove('is-preload'); }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	