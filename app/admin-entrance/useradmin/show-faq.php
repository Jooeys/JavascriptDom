<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>FAQ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="terms_style.css">
    <style>
    </style>
    <script>
    </script>
</head>

<body>
   <div class="bg-image"></div>
    <div id="container">
		<div id="header">
			<header>
				<h2>Frequently asked questions (FAQ)<h2>		
			</header>

			<div id="terms">
				<!-- when user manipulate database show messages here -->
				<?php if (isset($_SESSION['message'])): ?>
					<div class="msg">
						<?php 
							echo $_SESSION['message']; 
							unset($_SESSION['message']);
						?>
					</div>
				<?php endif ?>
				<?php

//					session_start();

					$db = mysqli_connect("localhost","root","","crud");// or die('unable to connect');

					$sql = "SELECT * FROM faq";
					$query_run = mysqli_query($db,$sql);
					$query_check = mysqli_num_rows($query_run);
					if($query_check > 0 )
					{	
						while($row = mysqli_fetch_assoc($query_run))
						{
							// $id = $row['id'];
							$faq_text = $row['faq_text'];

							// echo "<div class='tnc'><p class='display'>$id</p></div>";
							echo "<div class='tnc'><p class='display'>$faq_text</p></div>";
							

							
							
						}
					}
					else
					{
						echo '<script type = "text/javascript"> alert("No terms and conditions present in database") </script>';
					}
				?>
			</div>
		</div>

        <?php $results = mysqli_query($db, "SELECT * FROM faq order by id desc"); ?>
        <?php $row = mysqli_fetch_array($results) ?>
        <div style="width: 100%; height: 100px;">
<!--        <button class="button"><a href="server.php?Delete_last_btn=--><?php //echo $row['id']; ?><!--" class="del_btn">Delete Last Edition</a></button>-->
        <button class="button"><a href="server.php?delete_post=<?php echo $row['id']; ?>" class="del_btn">Delete ALL</a></button>
        </div>
        <?php ?>
    </div>
  


</body>

</html>