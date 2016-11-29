<html>
  <head>
  	<meta charset="UTF-8">
	<title>Beispiel 1</title>
	<style>
	li{
		list-style-type: none;
	}
	.button{
		padding: 10px;
	}
	</style>
  </head>
  <body>
	<h1> Beispiel 1 </h1>
		<form method="post" action="//localhost/medt/bsp1/index.php">
			<label>Ihre Eingabe: <input type="text" name="eingabe" /></label>
			<div class="button">
				<input type="submit" name="resetBtn" value="RESET">
				<input type="submit" name="explodeBtn" value="EXPLODE">
			</div>
		</form>
		<p> Ihre Eingabe als Liste </p>
		<?php
			$text =  $_POST['eingabe'];
				if(isset($_POST['explodeBtn'])){ 
						$array = explode(" ",$text);
						echo "<ul>";
						foreach($array as $item)
						{
							echo "<li>$item</li>";
						}
						echo "</ul>";
					
		 } ?>
  </body>
</html>