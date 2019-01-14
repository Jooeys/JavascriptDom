<?php
/*
* Project : DOMISEP
* Developer/s : BIGTREE
* Date : 20/12/2018
* version : 1
*/

session_start();

$db = mysqli_connect("localhost","root","","bigtree");// or die('unable to connect');

				$sql = "SELECT * FROM terms";
				$query_run = mysqli_query($db,$sql);
				$query_check = mysqli_num_rows($query_run);
				if($query_check > 0 )
				{	
					while($row = mysqli_fetch_assoc($query_run))
					{
						$term = $row['value'];
						echo "<div class='tnc'><span class='display'>$term</span></div>";
					}
				}
				else
				{
							echo '<script type = "text/javascript"> alert("No terms and conditions present in database") </script>';
				}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BigTree</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login_styles.css">
</head>

<body>

    <div class="bg-image"></div>
    <!-- <div class="header">
            <img src="Bigtree_logo.JPG" alt="Bigtree_logo" width="100" height="100"><h1> BIGTREE</h1>
        </div> -->

    <!--<img src="final.JPG" alt="Bigtree_logo">-->

    <!-- <div class="header"> -->
    <!-- <img src="Bigtree_logo.JPG" alt="Bigtree_logo" width="100" height="100"> -->
    <!-- <h1> Bigtree</h1>
        </div> -->

   


</body>

</html>