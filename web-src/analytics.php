<?php require('global.php'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	    <script type="text/javascript" src="js/chart/Chart.js"></script>
	    <script type="text/javascript" src="js/analytics.js"></script>
	    <link rel="stylesheet" type="text/css" href="css/analytics.css" />
	    <meta charset=UTF-8>
		<title>Custom Cupcakes Analytics</title>
	</head>
	<body>
	    <p><a href="index.php">Return to home page.</a></p>
	    <table>
	    <tr>
	        <td><canvas id="flavor"></canvas></td>
	        <?php 
	            $flavorResult = mysql_query('select flavorID, count(*) from cupcakes group by flavorID');
	            $jsonflavorarray = array();
	             
	            for ($i = 0; $row = mysql_fetch_assoc($flavorResult); $i++) {
	               $jsonflavorarray[$i] = (array('count' => array('flavorID' => $row['flavorID'], 'quantity' => $row['count(*)'])));
	            }
	            
	            echo "<script>createFlavorChart("?><?php echo json_encode($jsonflavorarray); ?><?php echo");</script>";
	            ?>
	        
	        <td><canvas id="frosting"></canvas></td>
	        <?php 
	            $frostingResult = mysql_query('select frostingID, count(*) from cupcakes group by frostingID'); 
	            $jsonfrostingarray = array();
	            
	            for ($i = 0; $row = mysql_fetch_assoc($frostingResult); $i++) {
	                $jsonfrostingarray[$i] = (array('count' => array('frostingID' => $row['frostingID'], 'quantity' => $row['count(*)'])));
	            }
	            
	            echo "<script>createFrostingChart("?><?php echo json_encode($jsonfrostingarray); ?><?php echo");</script>";
	            ?>
	        
	        <td><canvas id="filling"></canvas></td>
	        <?php 
	            $fillingResult = mysql_query('select fillingID, count(*) from cupcakes group by fillingID'); 
	            $jsonfillingarray = array();
	            
	            for ($i = 0; $row = mysql_fetch_assoc($fillingResult); $i++) {
	                $jsonfillingarray[$i] = (array('count' => array('fillingID' => $row['fillingID'], 'quantity' => $row['count(*)'])));
	            }
	            
	            echo "<script>createFillingChart("?><?php echo json_encode($jsonfillingarray); ?><?php echo");</script>";	        
	            ?>
          </tr>
          <tr>
                <td id="label1">Flavor</td>
                <td id="label2">Frosting</td>
                <td id="label3">Filling</td>
          </tr>
	      </table>  
	</body>
</html>
