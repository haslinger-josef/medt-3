<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<title>Database Access</title>
	</head>
	<body>
	<div class="container">
	<h1>Database Access</h1>

		
			<?php
				$host = 'localhost';
				$dbname ='medt3';
				$user = 'htluser';
				$pwd = 'htluser';

				try{
				$db = new PDO("mysql:host=$host; dbname=$dbname", $user, $pwd);
			?>
				

			<?php
				}
				catch(PDOException $e)
				{
			?>

				
				
			<?php
				exit();
				}


				$res = $db-> query("SELECT pname, pdescription,created FROM projects");
				$temp = $res->fetchAll(PDO::FETCH_ASSOC);
				?>
				<h2> Löschen </h2>
				<?php 

					//echo"$_SERVER[REQUEST_URI]";
					$id = $_GET['deleteID'];
					$delete = $db->query("DELETE FROM projects where pid=$id");
					$delete -> execute();
					?>
					<script type="text/javascript">
						window.location="index.php";
					</script>
					<div class="alert alert-success">
				<strong>Das Projekt mit der PID <?php echo"$id";?> wurde gelöscht.</strong>
				</div>
			
				



		</div>
	</body>
</html>