<html>
<head>
	<title>Pokedex</title>
	<link type="text/css" rel="stylesheet" href="Pokedex.css"/>
</head>
<body>
	<form method="post">
		<img id="pokedex" src="Pokedex.png"/>

		<input id="naamPokemon" name="txtPokemon" type="text" placeholder="Pokemon"/>
		<input id="btnZoeken" name="btnZoeken" type="submit" value="Zoeken" onmouseover="" style="cursor: pointer;"/>
	</form>

<section id="fotoPokemon">
<?php
 
	if(isset($_POST['btnZoeken']))
	{
		$naam = $_POST['txtPokemon'];
		$found = true;
				
		$data = file_get_contents("http://pokeapi.co/api/v2/pokemon/".$naam);		
			
		if($data != ""){
					
		$rData = json_decode($data, true);
		
		$image = $rData['sprites']['front_default'];
		echo("<img src='".$image."'></img>");
	
		}
		else
		{
		die("No pokemon found = scan finished");
		}			
	}
 ?>
 
</section>
	
<section id="pokemonInfo">
<?php
 
	if(isset($_POST['btnZoeken']))
	{
		$naam = $_POST['txtPokemon'];
		$found = true;
				
		$data = file_get_contents("http://pokeapi.co/api/v2/pokemon/".$naam);		
			
		if($data != ""){
					
		$rData = json_decode($data, true);
			
		}
		else
		{
		die("No pokemon found = scan finished");
		}			
	}
 ?>
<div id="inhoud">
	<tr>
		<th>Pokemon:</th>
		<td><?php echo ("".$rData['name']."<br>"); ?></td>
	</tr>
	<tr>
		<th>Nummer: #</th>
		<td><?php echo ("".$rData['id']."<br>"); ?></td>
	</tr>
	<br>
	<tr>
		<td><?php echo("Speed: ".$rData['stats'][0]['base_stat']."<br>"); ?></td>
		<td><?php echo("Defence: ".$rData['stats'][3]['base_stat']."<br>"); ?></td>
		<td><?php echo("Special_Defence: ".$rData['stats'][1]['base_stat']."<br>"); ?></td>
		<td><?php echo("Attack: ".$rData['stats'][4]['base_stat']."<br>"); ?></td>
		<td><?php echo("Special_Attack: ".$rData['stats'][2]['base_stat']."<br>"); ?></td>
		<td><?php echo("HP: ".$rData['stats'][0]['base_stat']."<br>"); ?></td>
	</tr>
	<tr>
		<th></th><br>
		<td><?php 
			$count = 0;
			while($count != count($rData['types'])){
				echo("<th>Type: </th>");
				echo (" ".$rData['types'][$count]['type']['name']."<br>");
				$count++;		
			}  
			?>
		</td>
	</tr>
</div>
 </section>
</body>
</html>