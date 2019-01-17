<?php
// include "./support_page.php";
/*
* Project : DOMISEP
* Developer/s : BIGTREE
* Date : 20/12/2018
* version : 1
* name: Login and Registration

*/
session_start();

$db = mysqli_connect("localhost","root","","crud"); 
// or die('unable to connect');
$home_array;
if($db == true){
    // echo 'alert("DB is working")';
}

//Fucntion to check strength of password
	// function check_password($password)
	// {
	// 	$response = "OK";	
	// 	$uppercase = preg_match('`[A-Z]`',$password);  // at least one upper case
	// 	$lowercase = preg_match('`[a-z]`',$password); // at least one lower case 
	// 	$numbers = preg_match('`[0-9]`',$password); // at least one digit
	// 	$special_Char = preg_match('/[^a-zA-Z\d]/', $password); //atleast one special char
	// 	if(strlen($password)<7)
	// 	{
	// 		$response = '<script type = "text/javascript"> alert("Password must be at least 7 characters.") </script>';
	// 	}
	// 	else if(!$uppercase)
	// 	{
	// 		$response = '<script type = "text/javascript"> alert("Password must have 1 capital letter.") </script>';
	// 	}
	// 	else if(!$lowercase)
	// 	{
	// 		$response = '<script type = "text/javascript"> alert("Password must have 1 lower case letter.") </script>';
	// 	}
	// 	else if(!$numbers)
	// 	{
	// 		$response = '<script type = "text/javascript"> alert("Password must have least 1 number.") </script>';
	// 	}
	// 	else if(!$special_Char)
	// 	{
	// 		$response = '<script type = "text/javascript"> alert("Password must have least 1 special character.") </script>';
	// 	}
	// 	return $response;
    // }
    
//user home add
if(isset($_POST['add-home-btn']))
{
    $home_name = $_POST['home-name'];	
    $address = $_POST['address'];
    $email=$_SESSION['email'];

    $sqlu ="SELECT user_id FROM users WHERE email='$email'";
    $q_run_user = mysqli_query($db,$sqlu);
    $user = mysqli_fetch_array($q_run_user);
    // echo 'user id is, ,,,,,,,,', $user['user_id'];

    $sql = "Insert into homes (home_name, address, user_id) values ('$home_name','$address','$user_id')";
    $user_res=mysqli_query($db,$sql);
    if(! $user_res ) {
        die('Could not get data: ' . mysqli_error($db));
     }

     

    // $sqlu ="SELECT user_id FROM users WHERE email='$email'";
    // $user_id = mysqli_query($db,$sqlu);
    // echo"Fetched user id, $user_id";
    // $_SESSION['homeName'] = $home_name;

//     $sqlh = "SELECT * FROM homes ";
//     $result =  mysqli_query($db,$sqlh);

//    if(! $result ) {
//       die('Could not get data: ' . mysql_error());
//    }

//    echo "home ID :{$row['home_id']}  <br> ".
//    "home NAME : {$row['home_name']} <br> ".
//    "Address : {$row['address']} <br> ".
//    "--------------------------------<br>";
   
//    while($row = mysqli_fetch_array($result)) {
//     $home_name= $row['home_name'];
//    $_SESSION['homeName']=$home_name;
    //  echo "Fetched result successfully\n";     
//    }
   
//    echo "Fetched data successfully\n";
}
// $homeidd;
if(isset($_POST['homeid']) ){
    echo "hhhhhhpppajaxx",$_POST['homeid'];
    // exit;
    $homeidd = $_POST['homeid'];
   }
// $homeidd = $_POST['homeid'];
//  echo $homeidd;
// echo $homeidd;
// Adding rooms in respective home
if(isset($_POST['add-room-btn']))
{ 
    $room_name = $_POST['room-name'];	
    $room_type = $_POST['room-type'];
    $home_id = $_POST['home-id'];
    // $home_id = $_POST['homeid'];
    // echo "home id is....",$_POST['homeid'];
    // echo '<script type="text/javascript">',
    //  'gethomeid();',
    //  '</script>';
    // if(isset($_POST['homeid']) ){
    //     echo "AJAX",$_POST['homeid'];
    //     $_SESSION['homeId'] = $_POST['homeid']; 
    //     // exit;
    //    }   
    // $homeid_g = $_POST['homeid'];
    // echo "global home",$homeid_g;
    $sqlr = "Insert into rooms (room_name, room_type, home_id) values ('$room_name','$room_type','$home_id')";
    $room_res=mysqli_query($db,$sqlr);
    if(! $room_res ) {
        die('Could not get data: ' . mysqli_error($db));
        echo  mysqli_error($db);
    }
}  

if(isset($_POST['add-sensor-btn']))
{ 
    $sensor_name = $_POST['sensor-name'];	
    $sensor_type = $_POST['sensor-type'];
    $room_id = $_POST['room-id'];
    // $home_id = $_POST['homeid'];
    // echo "home id is....",$_POST['homeid'];
    // echo '<script type="text/javascript">',
    //  'gethomeid();',
    //  '</script>';
    // if(isset($_POST['homeid']) ){
    //     echo "AJAX",$_POST['homeid'];
    //     $_SESSION['homeId'] = $_POST['homeid']; 
    //     // exit;
    //    }   
    // $homeid_g = $_POST['homeid'];
    // echo "global home",$homeid_g;
    $sqls = "Insert into sensors (sensor_name, sensor_type, room_id) values ('$sensor_name','$sensor_type','$room_id')";
    $room_res=mysqli_query($db,$sqls);
    if(! $room_res ) {
        die('Could not get data: ' . mysqli_error($db));
        echo  mysqli_error($db);
    }
} 
// echo "AJAX",$_POST['homeid'];

// if(isset($_POST['homeid']) ){
//     echo "hhhhhhpppajaxx",$_POST['homeid'];
//     // exit;
//    }
// if(isset($_POST['add-room-btn']))
// { 
//     $room_name = $_POST['room-name'];	
//     $room_type = $_POST['room-type'];
//     // $home_id_dup = $_SESSION['home_id'];
//     // sethomeid_p();
//     // echo '<script type="text/javascript">',
//     //  'sethomeid();',
//     //  '</script>';
//     echo $_SESSION['home_id'];
//     $sqlr = "Insert into rooms (room_name, room_type, home_id) values ('$room_name','$room_type','1')";
//     $room_res=mysqli_query($db,$sqlr);
//     if(! $room_res ) {
//         die('Could not get data: ' . mysqli_error($db));
//         echo  mysqli_error($db);
//     }
// } 


//Registration Code

if(isset($_POST['submit_btn']))
{
	/*$first_name = mysqli_real_escape_string($db,$_POST['first_name']);	
	$last_name = mysqli_real_escape_string($db,$_POST['last_name']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$conf_password = mysqli_real_escape_string($db,$_POST['con_pswd']);
	//$user_type = $_POST['type'];*/
	
	$first_name = $_POST['first_name'];	
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$conf_password = $_POST['con_pswd'];
	
	$validate_mail = filter_var($email, FILTER_VALIDATE_EMAIL);
	
	
	$response = check_password($password);
	if($response == "OK")
	{
		if ($password == $conf_password)
		{
			$hash_password = password_hash($password, PASSWORD_DEFAULT);//$password = md5($password);
			if($validate_mail)
			{
				//check for unique email
				$sql = "SELECT * FROM users WHERE email='$email'";
				$query_run = mysqli_query($db,$sql);
				$query_check = mysqli_num_rows($query_run);
				if($query_check == 1)
				{
					echo '<script type = "text/javascript"> alert("Email id already registered try another Email id.") </script>';
				}
				else
				{
					//create users
		
					$sql = "Insert into users (first_name, last_name, email, password, type) values ('$first_name','$last_name','$email','$hash_password','User')";
					mysqli_query($db,$sql);
					echo '<script type = "text/javascript"> alert("Registration successful. Please login to use the website.") </script>';
					//$_SESSION['message'] = "Registration successful";
					$_SESSION['first_name'] = $first_name;
					header("location: registration_work.php");
				}
			}
			else
			{
				echo '<script type = "text/javascript"> alert("Email ID is invalid. Please enter a valid email ID. ") </script>';
			}
		}	
		else
		{
		//failed
			echo '<script type = "text/javascript"> alert("Password and confirm password does not match.") </script>';
		}
	}	
	else
	{
		echo $response;
	}	
	
}

//login code
		
		if(isset($_POST['login_btn']))
		{	
			
			$email = mysqli_real_escape_string($db,$_POST['email']);	
			$password = mysqli_real_escape_string($db,$_POST['pswd']);

				//$sqli = "SELECT * FROM users WHERE email='$email' AND password='$password'";	
				$sqli = "SELECT user_id,password FROM users WHERE email='$email'";
				$qrun = mysqli_query($db,$sqli);
				$qcheck = mysqli_num_rows($qrun);
				if($qcheck == 1)
				{
					$data = mysqli_fetch_array($qrun);
					if(password_verify($password, $data['password']))
					{	
						/*echo '<script type = "text/javascript"> alert("Welcome!") </script>';
						VALID
						$_SESSION['first_name'] = $first_name;	*/	
						$check_user = "SELECT * FROM users WHERE email='$email'";
						$connect = mysqli_query($db,$check_user);	
						$navigate = mysqli_fetch_array($connect);
						if($navigate['type'] == 'User')
						{
							//Navigating to user page
							//echo '<script type = "text/javascript"> alert("Welcome!") </script>'; //User_home/user-dashboard.html
							header('location: User_home/user-dashboard.html'); //redirecting to user's home page.
							//echo '<script type = "text/javascript"> alert("Email id already exists try another Email id ") </script>';	
						}
						else
						{	
						//Navigating to admin page
						header('location: Admin_dashboard/admin-dashboard.html');
						}
					}
					else
					{
						echo '<script type = "text/javascript"> alert("Incorrect password.") </script>';
					}	
				}	
				else
				{
					echo '<script type = "text/javascript"> alert("Invalid email address or password.") </script>';
				}
		}

//mysqli_select_db($mysqli,'bigtree');
/*
$mysqli = mysqli_connect('localhost', 'root', '' ) or die('unable to connect');
mysqli_select_db('bigtree',$mysqli);

require 'dbconfig/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	if($_POST['pswd']) == $_POST['con-pswd']{
		$first_name = $mysqli->real_escape_string($POST['first_name']);	
		$last_name = $mysqli->real_escape_string($POST['last_name']);
		$email = $mysqli->real_escape_string($POST['email']);
		$password = md5($_POST['password']);
	}
}
*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bigtree</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="user-dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="user-dashboard.js" defer></script>    -->
    <script>
        var arr = ["home", "support", "faq", "profile"];
        function showFn(x) {
            for (var i = 0; i < arr.length; i++) {
                if (arr[i] == x.id) {
                    document.getElementById(x.id + '-content').style.display = 'block';
                }
                else {
                    if (document.getElementById(arr[i] + '-content').style.display != null) {
                        document.getElementById(arr[i] + '-content').style.display = 'none';
                    }
                }
            }
        }
        function gethomeid(data) {
            var home_id= data;
            document.getElementById("home-id-pass").value = home_id;
            console.log('home oid gotsfgfsd',home_id);
                // $.ajax({
                // url: 'user-dashboard.php',
                // type: 'post',
                // data: {homeid: home_id},
                // success: function(response){
                //     alert(response);
                // // $('#response').text('name : ' + response);
                // } });
            // obj[key] = data;
            console.log("home id isssss",home_id);
        }
        function getroomid(data) {
            var room_id= data;
            console.log('rooommm',room_id);
            document.getElementById("room-id-pass").value = room_id;
                // $.ajax({
                // url: 'user-dashboard.php',
                // type: 'post',
                // data: {homeid: home_id},
                // success: function(response){
                //     alert(response);
                // // $('#response').text('name : ' + response);
                // } });
            // obj[key] = data;
            //  = data;
            // callback(home_id);
        }
    </script>
    <style>
    </style>
</head>

<body>
    <!-- <div class="bg-image"></div> -->
    <!-- <div class="bg-img"></div> -->
    <div class="header">
        <img class="logo" src="logo.jpg" alt="logo" width="75" height="75"><span style="color:white;padding-top: 20px;position: absolute;font-size: 24px;">DOMISEP</span>
        <ul>
            <!-- <li><a href="#home">Warning</a><span class="bullet">&#9688;</span></li> -->
            <!-- <li><a href="#notification">Notifications</a><span class="bullet">&#9688;</span></li>
            <li><a href="#profile" id="profile" onclick="showFn(profile);">Profile</a><span class="bullet">&#9688;</span></li>
            <li><a href="#logOut">Log out</a><span class="bullet">&#9688;</span></li> -->
            <li><a class="home_link" href="#" id="home" class="home-click" onclick="showFn(home);">
                    Home</a></li>
            <li><a class="faq_link" href="#faq" id="faq" onclick="showFn(faq);">
                    FAQ </a></li>
            <li><a class="support_link" href="#" id="support" onclick="showFn(support)">
                    Support</a></li>
            <li><a class="home_link" href="#profile" id="profile" onclick="showFn(profile);">
                    Profile</a></li>
            <li><a class="home_link" href="#logOut">Log out</a></li>
            <!-- <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">User</a><span class="bullet">&#9688;</span>
                <div class="dropdown-content">
                    <a href="#">My Profile</a>
                    <a href="#">Settings</a>
                    <a href="#">Log out</a>
                </div>
            </li> -->
        </ul>
    </div>
    <!-- <div class="sidenav">
        <a class="home_link" href="#" id="home" class="home-click" onclick="showFn(home);">
            <span class="hidden-tablet"> Home</span></a>
        <a class="faq_link" href="#faq" id="faq" onclick="showFn(faq);"><span class="hidden-tablet"> FAQ</span> </a>
        <a class="support_link" href="#" id="support" onclick="showFn(support)"><span class="hidden-tablet">
                Support</span></a> -->
    <!-- <a class="faq_link" href="#profile" id="profile" onclick="showFn(profile);"><span class="hidden-tablet">Profile</span> </a> -->
    <!-- </div> -->
    <div class="main">
        <div id="faq-content" class="span10" style="display:none;">
            <ul class="breadcrumb">
                <li><a href="index.html">FAQ</a><i class="icon-angle-right"></i></li>
            </ul>
            <div class="center-part" style="width:80%; overflow: hidden;">
                <h1 class="welcome-user">Frequently Asked Questions</h1>
                <div class="faq-block">
                    1.What is a smart home?
                    <p> A smart home is a home outfitted with devices that can be controlled over
                        an internet connection on the desktop, tablet, or smartphone.
                        These connected devices can be appliances, lights, security systems, cameras, audio and video
                        systems,
                        televisions, thermostats, and even sprinklers.
                        Generally speaking, if your home has devices that connect to each other and to a network, it is
                        a
                        smart
                        home. The complexity of smart systems may differ somewhat from home to home, but the basic
                        foundations
                        are the same.</p>
                    2.What is a smart thermostat?
                    <p>A smart thermostat is responsible for controlling your home temperature. As with many smart
                        devices,
                        smart thermostats connect to your home network, giving you remote access and control over all
                        the
                        devices functions.</p>
                    3.What are the benefits of home automation?
                    <p>The benefits of home automation typically fall into a few categories, including savings, safety,
                        convenience, and control. Additionally, some consumers purchase home automation for comfort and
                        peace
                        of mind.</p>

                    4.Are smart homes affordable?

                    <p>Smart homes are affordable as long as you set a budget before venturing into the world of home
                        automation.
                        As a general rule, the home automation cost for a simpler setup will be substantially less than
                        a
                        complex setup.
                        Not all smart homes are the same. Some include automation for nearly every electronic device,
                        while
                        others focus on addressing the basics. Neither way is necessarily better.</p>

                    <!-- 5.What are the elements of a home automation system?

                    <p>At the most basic level, home automation systems are made up of three elements:
                        a smart device, a hub,and a connected application.
                        While some smart systems work with just two of those above elements
                        a single device that works directly
                        with an app or a hands free hub that controls smart gadgets
                        most systems work through all three.
                        Smart Hubs,Connected Mobile Apps,Smart Devices.</p>
                    6.How can I save energy with home automation?
                    <p>Home automation can help you save energy by ensuring your home uses resources like water
                        and electricity more effectively,
                        reducing waste throughout the home.
                        You may know that home automation can help increase your homes convenience and security.
                    </p>
                    </p>
                    7.Does smart home technology work for businesses?
                    <p>Yes, smart home technology works for businesses, at least in part.
                        Businesses need more robust and scalable smart solutions, so they often turn to commercial
                        applications.
                        The driving forces behind smart home technology adoption in the business world pertain to
                        things
                        like
                        access control,
                        security, climate control, energy management, and maintenance.
                        If a business can catch a water leak or rebel HVAC system before it ruins the building or the
                        annual
                        budget,
                        the business will be that much further ahead with its profit and loss statements.</p>
                    8.Can I upgrade an existing or older home with smart home technology?
                    <p>If you own an older home, you can still benefit from smart home technology.
                        Most smart devices connect wirelessly, so your main sticking points will be coverage and
                        connectivity.
                        As long as you have Wi-Fi extenders or smart home connected devices that create a mesh network,
                        you can enjoy the benefits of home automation. -->
                </div>
            </div>
        </div>

        <div id="profile-content" class="span10" style="display: none;">
            <ul class="breadcrumb">
                <li><a href="#">My Profile</a></li>
            </ul>

            <div class="center-part">
                <form id="profile-form" method="post" action="register.php">

                    <div class="input-group">
                        <label>Firstname</label>
                        <input type="text" name="firstname">
                    </div>
                    <div class="input-group">
                        <label>Lastname</label>
                        <input type="text" name="lastname">
                    </div>
                    <div class="input-group">
                        <label>Email</label>
                        <input type="text" name="email">
                    </div>
                    <div class="input-group">
                        <label>Address</label>
                        <!-- <input type="text" name="address"> -->
                        <textarea name="address" class="form-control" placeholder="Address" rows="3" required></textarea>
                    </div>
                    <p> Make sure all the information is right!</p>
                    <div class="submitbutton">
                        <button type="submit" name="edit" class="btn">Edit</button>
                        <button type="submit" name="save" class="btn">Save</button>
                    </div>
                </form>

            </div>
        </div>

        <!-- Home content code  -->
        <div id="home-content" class="span10">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a><i class="icon-angle-right"></i></li>
            </ul>
            <div class="center-part">
                <h1 class="welcome-user">Hi User, Welcome to your smart home!</h1>
                <div class="addHomeButton">
                    <a href="#fgj;jsdlg;sj" onclick="document.getElementById('addHomeModal').style.display='block'">
                        <span>
                            <img class="add-home" src="add-home-dark.jpg" alt="Add home button" style="width:40px; height:40px; margin-right: 5px; margin-bottom: -15px;">
                        </span>
                        <!-- Add New Home -->
                        <span> Add new home </span>
                    </a>
                </div>
                <?php
                    // $sqlh = "SELECT * FROM homes where home_id = '1' ";
                    //  $result =  mysqli_query($db,$sqlh);

                    // if(! $result ) {
                    //      die('Could not get data: ' . mysql_error());
                    // };
                    // while($row = mysqli_fetch_array($result)) {
                    // $home_name=$row['address'];
                    //     //  echo "Fetched result successfully\n";     
                    // }
                    // echo"Fetched user id";
                    // echo "Fetched data successfully\n";
                    // function sethomeid_p($data){
                    //     $_SESSION['id'] = data;
                    //     echo "doneeeee".$_SESSION['id'];
                    // }
                    // <i id="iconLeft" class="fa fa-caret-left" onclick="closeNav()" style="font-size:36px;padding-left: 20px; padding-right:0px; "></i>
                // <i id="iconRight" class="fa fa-caret-right" onclick="openNav()" style="font-size:36px;padding-left: 20px; padding-right:0px; "></i>
                 // <span style="padding-top:65px;margin:10px;cursor:pointer">
                                //     <i id="close'.$room_id.'" class="fa fa-caret-left iconLeftSide" onclick="closeNav('.$room_id.')" style="font-size:36px;padding-left: 20px; padding-right:0px; "></i>
                                //     <i id="open'.$room_id.'" class="fa fa-caret-right" onclick="openNav('.$room_id.')" style="font-size:36px;padding-left: 20px; padding-right:0px; "></i>
                                //     <!-- &#x3e; -->
                                // </span>
                ?>
                <!-- Temporary code for demo -->
        <?php 
           $sqlh = "SELECT * FROM homes";
           $result =  mysqli_query($db,$sqlh);
           // $res_checck = $result;
           echo "check",gettype($result);
          if(! $result ) {
             die('Could not get data: ' . mysql_error());
          };
          foreach($result as ["home_id" => $home_id, "home_name" => $home_name])
           {
                echo '<div id="home-block" class="addHomeBlock custom_block" style="display: block;">
                    <div class="thumbnail">';
                echo'<div class="addHomeHeading">'.$home_name.'</div>';
                $sqlr = "SELECT * FROM rooms WHERE home_id='$home_id'";
                $result_room =  mysqli_query($db,$sqlr);
                        // echo "check",gettype($result_room);
                if(! $result_room ) {
                    die('Could not get data: ' . mysql_error());
                };
                echo '<div style="display: flex; flex-wrap: wrap;">';                
                    foreach($result_room as ["room_id" => $room_id, "room_name" => $room_name]){
                    echo '<div style="margin-top:10px;"';
                    echo '<div class="add-home-temp">';
                        echo '<div class="add-home-bck" style="background: whitesmoke; border: 1px solid;display: flex; width: 150px;">
                                <a href="#fgj;jsdlg;sj">
                                    <span>
                                        <img class="add-room" src="livingRoom1.png" alt="Add home button">
                                        <!-- <img class="add-home" src="add-home-dark.jpg" alt="Add home button"> -->
                                    </span>'.$room_name.'
                                </a>
                            </div>';

                            $sqls = "SELECT * FROM sensors WHERE room_id='$room_id'";
                            $result_sensor =  mysqli_query($db,$sqls);
                                    // echo "check",gettype($result_room);
                            if(! $result_sensor ) {
                                die('Could not get data: ' . mysql_error());
                            };
                        echo '<div id="mySidenav" class="sidenav">';
                            foreach($result_sensor as ["sensor_id" => $sensor_id, "sensor_name" => $sensor_name]){
                                echo'<div class="sensor-display">
                                    <img src="LS1.JPG" alt="Add home button" style="margin: 15px;" width="50" height="50">
                                    <span>'.$sensor_name.'</span>
                                    <div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>';
                            }
                            echo '<div class="sensor-display" onclick="document.getElementById(\'addSensorModal\').style.display=\'block\', getroomid('.$room_id.')">
                            <img src="add-sensor-dark.JPG" alt="Add home button" style="margin: 15px;"
                                width="50" height="50">
                            <span> Add Sensor</span>
                            </div>';
                        echo'</div>';                           
                    }

                    echo "<div style=\"width:215px;display: inline-flex;\">,
                    <a href=\"#\" id=\"add_homeid\" name='' onclick=\"document.getElementById('addRoomModal').style.display='block', gethomeid('".$home_id."')\">
                        <span>
                            <img class=\"add-room\" src=\"add-room-dark.jpg\" alt=\"Add home button\">
                        </span>
                        Add new room
                    </a>
                    </div>
                </div>";
                        
            echo '</div>
                </div>
                </div>
                </div>';

                }
        ?>
                <div id="home-block" class="addHomeBlock custom_block" style="display: block;">
                    <div class="thumbnail">
                        <div class="addHomeHeading">
                        My Home
                           </div>
                        <div class="add-home-temp">
                            <div class="add-home-bck" style="background: whitesmoke; border: 1px solid;display: flex; width: 210px;">
                                <a href="#fgj;jsdlg;sj">
                                    <span>
                                        <img class="add-room" src="livingRoom1.png" alt="Add home button">
                                        <!-- <img class="add-home" src="add-home-dark.jpg" alt="Add home button"> -->
                                    </span>
                                    Living room
                                </a>
                                <span style="padding-top:65px;margin:10px;cursor:pointer">
                                    <i id="iconLeft" class="fa fa-caret-left" onclick="closeNav()" style="font-size:36px;padding-left: 20px; padding-right:0px; "></i>
                                    <i id="iconRight" class="fa fa-caret-right" onclick="openNav()" style="font-size:36px;padding-left: 20px; padding-right:0px; "></i>
                                    <!-- &#x3e; -->
                                </span>
                            </div>
                            <div id="mySidenav" class="sidenav">
                                <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
                                <div style="margin:10px; display: inline-flex; border: 0.5px; background: darkgrey;">
                                    <!-- <div style="display: inline-flex;"> -->
                                    <img src="LS1.JPG" alt="Add home button" style="margin: 15px;" width="50" height="50">
                                    <span>Light Sensor</span>
                                    <div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div style="padding:10px; display: inline-flex;" onclick="document.getElementById('addSensorModal').style.display='block'">
                                        <img src="add-sensor-dark.JPG" alt="Add home button" style="margin: 15px;"
                                            width="50" height="50">
                                        <span> Add Sensor</span>
                                </div>
                            </div>
                            <div style="width:215px;">
                                <a href="#" onclick="document.getElementById('addRoomModal').style.display='block'">
                                    <span>
                                        <img class="add-room" src="add-room-dark.jpg" alt="Add home button">
                                    </span>
                                    Add new room
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="addHomeModal" class="add-home-modal">
                <form class="add-modal-content animate" action="" method="POST">
                    <div>
                        <span style="text-align: center;" class="modal-title input-field">
                            Add new home
                        </span>
                        <span class="close" onclick="document.getElementById('addHomeModal').style.display='none'">&times;</span></div>
                    <div class="container">
                        <div class="input-field">
                            <input type="text" placeholder="Home Name" name="home-name" required>
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="Address" name="address" required>
                        </div>
                        <button class="add-btn"  name="add-home-btn" type="submit" onclick="document.getElementById('addHomeModal').style.display='none';
                            //  document.getElementById('home-block').style.display='block';
                            //  document.getElementById('sensor-block').style.display='none';
                            //  document.getElementById('room-block').style.display='none';
                             document.getElementById('tempHome').style.display='none';
                             document.getElementById('tempRoom').style.display='none';
                             document.getElementById('tempSensor').style.display='none'">Add
                            home now</button>
                    </div>
                </form>
            </div>

            <div id="addRoomModal" class="add-home-modal">
                <form class="add-modal-content animate" action="" method="POST">
                    <div>
                        <span style="text-align: center;" class="modal-title input-field">
                            Add new room
                        </span>
                        <span class="close" onclick="document.getElementById('addRoomModal').style.display='none'">&times;</span></div>
                    <div class="container">
                        <div style="display: inline-flex;">
                            <span class="add-room-img">
                                <img class="add-room" src="livingRoom1.png" alt="Add home button">
                            </span>
                            <span class="add-room-details">
                                <div class="input-field">
                                    <input type="text" placeholder="Room Name" name="room-name" required>
                                </div>
                                <div class="input-field">
                                    <input type="text" placeholder="Room type" name="room-type" required>
                                </div>
                                <div style="display:none">
                                    <input type="text" placeholder="Room type" id="home-id-pass"  name="home-id" required>
                                </div>
                            </span>
                        </div>
                        <button class="add-btn" name="add-room-btn" type="submit" onclick="document.getElementById('addRoomModal').style.display='none';
                            // document.getElementById('room-block').style.display='block';
                            // document.getElementById('sensor-block').style.display='none';
                            // document.getElementById('home-block').style.display='none';
                            document.getElementById('tempHome').style.display='none';
                            document.getElementById('tempRoom').style.display='none';
                            document.getElementById('tempSensor').style.display='none'">Add
                            Room now</button>
                    </div>
                </form>
            </div>

            <div id="addSensorModal" class="add-sensor-modal">
                <form class="add-modal-content animate" action="" method="POST">
                    <div>
                        <span style="text-align: center;" class="modal-title input-field">
                            Add sensor room
                        </span>
                        <span class="close" onclick="document.getElementById('addSensorModal').style.display='none'">&times;</span></div>
                    <div class="container">
                        <div style="display: inline-flex;">
                            <span class="add-sensor-img">
                                <img class="add-room" src="add-sensor.jpg" alt="Add home button">
                            </span>
                            <span class="add-sensor-details">
                                <div class="input-field">
                                    <input type="text" placeholder="Sensor Name" name="sensor-name" required>
                                </div>
                                <div class="input-field">
                                    <input type="text" placeholder="Sensor type" name="sensor-type" required>
                                </div>
                                <div style="display:none">
                                    <input type="text" placeholder="Sensor type" id="room-id-pass"  name="room-id" required>
                                </div>
                            </span>
                        </div>
                        <button class="add-btn" type="submit" name="add-sensor-btn" onclick="document.getElementById('addSensorModal').style.display='none';
                                // document.getElementById('room-block').style.display='none';
                                // document.getElementById('sensor-block').style.display='block';
                                // document.getElementById('home-block').style.display='none';
                                document.getElementById('tempHome').style.display='none';
                                document.getElementById('tempRoom').style.display='none';
                                document.getElementById('tempSensor').style.display='none'">Add
                            Sensor now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Support content code  -->
    <div id="support-content" style="display: none;">
        <ul class="breadcrumb">
            <li><a href="#">Support</a></li>
        </ul>
        <div class="center-part">
            <div class="support-title">
                We are always here to serve you!
            </div>
            <div class="support-form">
                <form id="support-form" action="support_page.php" method="POST">
                    <input name="name" type="text" class="form-control" placeholder="Your Name" required><br>
                    <input name="email" type="text" class="form-control" placeholder="Your Email Address" required><br>
                    <textarea name="message" class="form-control" placeholder="Message" rows="4" required></textarea><br>
                    <input type="submit" class="form-control submit" value="Send Message" name="submit_button">
                </form>
            </div>
        </div>
    </div>


    </div>
</body>

</html>