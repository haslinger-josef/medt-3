<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<title>Database Einführung</title>
		<style>
			h1{
				color:#1AB224;
			}
			h2{
				color:black;
			}
			.glyphicon-trash{
				color:red;
				
				

			}
			.glyphicon-pencil{
				color:green;
				
				
				
			}

			
		
		</style>
		</head>
	<body>

		<div class="container">
		<h1>Datenbank Einführung</h1>
		<h2>Connection Test</h2>
			<?php
				$host = 'localhost';
				$dbname ='medt3';
				$user = 'htluser';
				$pwd = 'htluser';

				try{
				$db = new PDO("mysql:host=$host; dbname=$dbname", $user, $pwd);
			?>
				<div class="alert alert-success">
				<strong>Connection!</strong>
				</div>

			<?php
				}
				catch(PDOException $e)
				{
			?>

				<div class="alert alert-danger">
				<strong> No Connection!</strong> <?php  echo $e -> getMessage();?>
				</div>

				
			<?php
				exit();
				}


				$res = $db-> query("SELECT pname, pdescription,created,PID FROM projects");
				$temp = $res->fetchAll(PDO::FETCH_ASSOC);
				?>
				<h2> Ausgabe der Datanbanktabelle 'project'</h2>
				<div class="alert alert-warning">
				<?php print_r($temp); ?>
				</div>
				<h2> Tabellarische Form: </h2>
				<table class="table table-bordered">
  					<thead class="alert-info">
  						<th>Name: </th>
  						<th>Beschreibung: </th>
  						<th>Erstelldatum: </th>
  						<th> Operations </th>
  					</thead>
  					 <tbody>
  					 <?php 
					foreach ($temp as $item)
					{ 	
						
						echo"<tr>";
						echo "<td>$item[pname]</td>";
						echo "<td>$item[pdescription]</td>";
						echo "<td>$item[created]</td>";
						echo "<td>
								  <a href=\"dbaccess.php?editID=$item[PID]\"<span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span></a>  
								  ___
								  <a href=\"dbaccess.php?deleteID=$item[PID]\"<span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a> 

						</td>";
						echo"</tr>";
					}
					echo "</tbody>";
					?>


  					
				</table>
			



		</div>

	</body>
</html>