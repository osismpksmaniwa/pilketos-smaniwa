<!DOCTYPE HTML>
<html>
	<head>
		<title>Profil Calon Kandidat</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="./assets-details/css/main.css" />
		<noscript><link rel="stylesheet" href="./assets-details/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
					<?php
					define('BASEPATH', dirname(__FILE__));
					session_start();
		   
					if(!isset($_SESSION['siswa'])) {
					   header('location:./');
					}
		   
					if(isset($_GET['id'])) {
		   
					   require('./include/connection.php');
		   
					   $sql = $con->prepare("SELECT * FROM t_kandidat WHERE id_kandidat = ?") or die($con->error);
					   $sql->bind_param('i', $_GET['id']);
					   $sql->execute();
					   $sql->store_result();
					   $sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode);
					   $sql->fetch();
					   ?>

				<!-- Main -->
					<section id="main">
						<header>
							<span class="avatar"><img src="./assets/img/kandidat/<?php echo $foto; ?>" alt="" /></span>
							<h1><?php echo $nama; ?></h1>
							<p>Visi :<br><i><?php echo $visi; ?></i></p>
						</header>
						<div>
							<p>Misi :<?php echo $misi; ?></p>
					</div>
						<ul class="actions special">
							<button onclick="window.history.go(-1)" class="buttonn btn-warning">Kembali</button>
						</ul>
						<div>
							<a onclick="let confirm = confirm(`Apakah kamu yakin akan memilih <?php $nama ?>`);" href="./submit.php?id=<?php echo $id; ?>&s=<?php echo $suara; ?>" class="button submit">Beri Suara</a>
                        </div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; #SakuraTeam X #IchikaTeam</li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>
			<?php
			} else {

			header('loaction: ./');

			}
			?>
	</body>
</html>