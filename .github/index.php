<!DOCTYPE html>
<?php
require ('../comm_connect.php');
require ('../siteid.php');
//include ('webLinks.php');
?>

<html style="scroll-behavior:smooth !important" lang="en">
<head>
    <title><?php echo $sitetitle; ?></title>

<meta property="og:image" content="https://sitesappsimages.com/assets/images/thumb.png" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="icon" type="image/png" href="../salotin/assets/favicon.ico">

 <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity=
"sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '.mytextarea'
      });
    </script>

    
    <style>
html, body {
	font-family: Montserrat, sans-serif;
  background: #f1f1f1;
	//height:100%;
}


.approveCheck{
  background-image: url('approveCheck.png');
  min-width: 300px;
  height: 300px;
  background-size: cover;
  background-position:center;
 }

 .sendNote{
  background-image: url('sendNote.png');
  min-width: 300px;
  height: 300px;
  background-size: cover;
  background-position:center;
 }



</style>
</head>
<body>
<div class="container-fluid">



<!-- UPLOAD FILES -->
<!-- TODO - ADD SHOWDATE HIDE DATE, TITLE, CLASS ID - NEEDS MORE DEFINITION... -->
<?php
if (trim($_POST["action"]) == "Upload File") { //**** User Clicked the Upload File Button

   //*********** Execute the Following Code to Upload File *************
   $imagename = basename($_FILES['image_file']['name']);  // grab name of file
   $result = @move_uploaded_file($_FILES['image_file']['tmp_name'], $imagename); // upload it
   if ($result==1):
   echo("Successfully uploaded: <b>".$imagename."</b>"); // did it work?
   $mysqli->query("insert into imagelibrary (
   image_file, image_title, class_id, showdate, hidedate, delrec, siteid) values
   ('$imagename','SitesAppsImages','1','','','','$siteid')");
   endif;
} // end if
?>
<!-- END UPLOAD FILES -->
<!-- SAVING PRIMARY LINKS -->
<?php


function saveSideMenu() {
$sidenav1=$mysqli->real_escape_string($_POST["sidenav1"]);
$sidenav2=$mysqli->real_escape_string($_POST["sidenav2"]);
$sidenav3=$mysqli->real_escape_string($_POST["sidenav3"]);
$sidenav4=$mysqli->real_escape_string($_POST["sidenav4"]);
$sidenav5=$mysqli->real_escape_string($_POST["sidenav5"]);
$sidenav6=$mysqli->real_escape_string($_POST["sidenav6"]);
$sidenav7=$mysqli->real_escape_string($_POST["sidenav7"]);
$sidenav8=$mysqli->real_escape_string($_POST["sidenav8"]);
$sidenav9=$mysqli->real_escape_string($_POST["sidenav9"]);
$sidenav10=$mysqli->real_escape_string($_POST["sidenav10"]);
$sidenav11=$mysqli->real_escape_string($_POST["sidenav11"]);
$sidenav12=$mysqli->real_escape_string($_POST["sidenav12"]);
$sidenav13=$mysqli->real_escape_string($_POST["sidenav13"]);
$sidenav14=$mysqli->real_escape_string($_POST["sidenav14"]);
$sidenav15=$mysqli->real_escape_string($_POST["sidenav15"]);
$mysqli->query("update catlinks set sidenav1='$sidenav1', sidenav2='$sidenav2',
sidenav3='$sidenav3', sidenav4='$sidenav4', sidenav5='$sidenav5', sidenav6='$sidenav6',
sidenav7='$sidenav7', sidenav8='$sidenav8', sidenav9='$sidenav9', sidenav10='$sidenav10',
sidenav11='$sidenav11', sidenav12='$sidenav12', sidenav13='$sidenav13', sidenav14='$sidenav14',
sidenav15='$sidenav15' where siteid='$siteid'");
}






if($_POST["saveItem"]) {
//var_dump($_POST);

$delrec=$_POST['delrec'];
$thisproductname=$_POST['thisproductname'];
$teaser=$_POST['teaser'];
$price=$_POST['price'];
$thisId=$_POST['thisId'];
$mysqli->query("update vm_items set product_name='$thisproductname', teaser='$teaser', price='$price', delrec='$delrec' where id='$thisId'");

}

if($_POST["saveListing"]) {
//var_dump($_POST);
$listorder=$mysqli->$_POST["listorder"];

$thislisting=$mysqli->real_escape_string($_POST["thislisting"]);
$this_class_id=$_POST["this_class_id"];
$title=$_POST["title"];
$l1=$_POST["l1"];
$l2=$_POST["l2"];
$l3=$_POST["l3"];
$l4=$_POST["l4"];
$l5=$_POST["l5"];
$l6=$_POST["l6"];
$l7=$_POST["l7"];
$l8=$_POST["l8"];
$feat=$_POST["feat"];
$target_name=$_POST["target_name"];
$target_url=$_POST["target_url"];
$details=$_POST["details"];
$embed_code=$_POST["embed_code"];
$contactname=$_POST["contactname"];
$contactnotes=$_POST["contactnotes"];
$contactemail=$_POST["contactemail"];
$contactphone1=$_POST["contactphone1"];
$contactphone2=$_POST["contactphone2"];
if($_POST["image_name"] != '') {
// selected new image
$image_name=$_POST["image_name"];
} else {
//if($_POST["clickToDelete"]="checked") {
//same image
$image_name=$_POST["image_id"];
//}
}


	// if no new image was selected from drop down
	//if($_POST['image_name'] = '') { 
	        // if delete image box is checked
		$image_id=$_POST['image_id'];
			$mysqli->query("update classifieds set title='$title', thislisting='$thislisting',listorder='$listorder',  
			link1='$l1',link2='$l2',link3='$l3',link4='$l4',link5='$l5',link6='$l6',link7='$l7',link8='$l8',featured='$feat',
			target_url='$target_url',target_name='$target_name',embed_code='$embed_code',details='$details',contactname='$contactname',contactnotes='$contactnotes',
			contactemail='$contactemail',contactphone1='$contactphone1',contactphone2='$contactphone2',
			image_name='$image_name' where id='$this_class_id'");
			if($res23 = $mysqli->query("select * from weblinks where delrec != 'on' and siteid='$siteid'")){
				if($myrow23=$res23->fetch_object()){
				$featured=$myrow23->featured;
				$link1=$myrow23->link1;
				$link2=$myrow23->link2;
				$link3=$myrow23->link3;
				$link4=$myrow23->link4;
				$link5=$myrow23->link5;
				$link6=$myrow23->link6;
				$link7=$myrow23->link7;
				$link8=$myrow23->link8;
				}
		}	

	//}
}

if($_POST["go"]) {

$link1=$mysqli->real_escape_string($_POST["link1"]);
$link2=$mysqli->real_escape_string($_POST["link2"]);
$link3=$mysqli->real_escape_string($_POST["link3"]);
$link4=$mysqli->real_escape_string($_POST["link4"]);
$link5=$mysqli->real_escape_string($_POST["link5"]);
$link6=$mysqli->real_escape_string($_POST["link6"]);
$link7=$mysqli->real_escape_string($_POST["link7"]);
$link8=$mysqli->real_escape_string($_POST["link8"]);
$mysqli->query("update weblinks set link1='$link1', link2='$link2', link3='$link3', link4='$link4', link5='$link5', link6='$link6', link7='$link7', link8='$link8' where siteid='$siteid'");
}
?>
<!-- END SAVING PRIMARY LINKS -->

<!-- SAVING LEFT SIDE MENU LINKS -->
<?php
if($_POST["save"]) {
$sidenav1=$mysqli->real_escape_string($_POST["sidenav1"]);
$sidenav2=$mysqli->real_escape_string($_POST["sidenav2"]);
$sidenav3=$mysqli->real_escape_string($_POST["sidenav3"]);
$sidenav4=$mysqli->real_escape_string($_POST["sidenav4"]);
$sidenav5=$mysqli->real_escape_string($_POST["sidenav5"]);
$sidenav6=$mysqli->real_escape_string($_POST["sidenav6"]);
$sidenav7=$mysqli->real_escape_string($_POST["sidenav7"]);
$sidenav8=$mysqli->real_escape_string($_POST["sidenav8"]);
$sidenav9=$mysqli->real_escape_string($_POST["sidenav9"]);
$sidenav10=$mysqli->real_escape_string($_POST["sidenav10"]);
$sidenav11=$mysqli->real_escape_string($_POST["sidenav11"]);
$sidenav12=$mysqli->real_escape_string($_POST["sidenav12"]);
$sidenav13=$mysqli->real_escape_string($_POST["sidenav13"]);
$sidenav14=$mysqli->real_escape_string($_POST["sidenav14"]);
$sidenav15=$mysqli->real_escape_string($_POST["sidenav15"]);
$mysqli->query("update catlinks set sidenav1='$sidenav1', sidenav2='$sidenav2',
sidenav3='$sidenav3', sidenav4='$sidenav4', sidenav5='$sidenav5', sidenav6='$sidenav6',
sidenav7='$sidenav7', sidenav8='$sidenav8', sidenav9='$sidenav9', sidenav10='$sidenav10',
sidenav11='$sidenav11', sidenav12='$sidenav12', sidenav13='$sidenav13', sidenav14='$sidenav14',
sidenav15='$sidenav15' where siteid='$siteid'");
}
?>
<!-- END SAVING LEFT SIDE MENU LINKS -->



<!-- CREATING CATEGORIES FOR PRIMARY AND SIDE MENU LINKS-->
<?php

//  ++++  BEGINNING OF PREPARED STATEMENT



if($_POST['create_category']){

// Prepare an insert statement
$sql= "INSERT INTO `categories` (`id`, `siteid`, `navid`, `catname`, `catdesc`, `cat_group`, `cat_url`, `listorder`, `delrec`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";


	if($stmt = mysqli_prepare($mysqli, $sql)){
    mysqli_stmt_bind_param($stmt, "sssssssss", $id, $siteid, $navid, $catname, $catdesc, $cat_group, $cat_url, $listorder, $delrec);

		$id=NULL;
		$siteid=$mysqli->real_escape_string($_POST['siteid']);
		$navid=$mysqli->real_escape_string($_POST['navid']);
		$catname=$mysqli->real_escape_string($_POST['catname']);
		$catdesc=$mysqli->real_escape_string($_POST['catdesc']);
		$cat_group=$mysqli->real_escape_string($_POST['cat_group']);
		$cat_url=$mysqli->real_escape_string($_POST['cat_url']);
		$listorder=$mysqli->real_escape_string($_POST['listorder']);
		$delrec='';

    mysqli_stmt_execute($stmt);

    echo "Records inserted successfully.";


	//$mysqli->query("INSERT INTO `categories` (`id`, `siteid`, `navid`, `catname`, `catdesc`, `cat_group`, `cat_url`, `listorder`, `delrec`) VALUES (NULL, '$siteid', '$navid', '$catname', '$catdesc', '$cat_group', '$cat_url', '$listorder', '');");
	} else {
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($mysqli);
	}
// Close statement
mysqli_stmt_close($stmt);

// Close connection
//mysqli_close($link);
}
?>
<!-- END CREATING CATEGORIES FOR PRIMARY AND SIDE MENU LINKS-->

<?php  

if($_POST['approveNow']) {   
	include('../comm_connect.php');
	$invoiceNum=$_POST['invoiceNum'];
	//var_dump($_POST);
    $total=$_POST['total'];
  
  echo  '<div class="row"><div class="col-12">'.$invoiceNum.'Approved for '.$total.'</div></div>'; 
	$mysqli->query("update invoices set total='$total' , is_approved='on' where id='$invoiceNum'");
}
?>


<?php

//TODO   Grab the members ID!!!

$email = 'heatherapellynn@gmail.com';


if($_POST['sendNote']) {

  if(isset($_POST['profile_id'])){ 
    
  $profile_id= $_POST['profile_id']; 
  } else { 
  $profile_id = 'heather lynn';}
  
    $res31 = $mysqli->query("select * from members where uname='$profile_id' ");
    if($row31=$res31->fetch_object()){
      
     
      $email=$row31->email;
    
      
  
    } 
  

  $subject="Approved RFQ  ".$email." Please log in to see your quote.";

  $msg="Dear ".$first_name." ".$last_name.",\n\nYour recent request for quote has been approved!  \nPlease login to your account at https://legalconsultantsforeveryone.com/members/".$profile_id.".  This message was intended for the account holder at LegalConsultantsForEveryone.com associated with this email:  ".$email;
  
  $notify=$email;
  
  
    mail($notify, $subject, $msg);

}


?>







<!-- DELETING CATEGORIES FOR PRIMARY AND SIDE MENU LINKS-->
<?php

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if($_POST['del_category']) {
$this_cat_id=$_POST['this_cat_id'];
$mysqli->query("update categories set delrec='on' where id='$this_cat_id'");
}
?>
<!-- END DELETING CATEGORIES FOR PRIMARY AND SIDE MENU LINKS-->



<!-- CREATING CONTENT FOR PRIMARY AND SIDE MENU CATEGORIES -->
<!-- CREATING CATEGORIES FOR PRIMARY AND SIDE MENU LINKS-->
<?php

//  ++++  BEGINNING OF PREPARED STATEMENT

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$link = mysqli_connect("localhost", "root", "", "demo");

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if($_POST['create_classified']){



$sql = "INSERT INTO `classifieds` (`siteid`, `catid`, `title`, `thislisting`, `target_url`, `target_name`, `image_name`,
`embed_code`, `memberid`, `authname`, `origdate`, `details`, `featured`, `link1`, `link2`, `link3`,
`link4`, `link5`, `link6`, `link7`, `link8`, `showdate`, `hidedate`, `contactname`, `contactnotes`,
`contactemail`, `contactphone1`, `contactphone2`, `linkto`, `delrec`)
VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";



	if($stmt = mysqli_prepare($mysqli, $sql)){
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssss",$siteid, $catid, $title, $thislisting, $target_url,
    $target_name, $image_name, $embed_code, $memberid, $authname, $origdate, $details, $featured, $link1, $link2,
    $link3, $link4, $link5, $link6, $link7, $link8,  $showdate, $hidedate, $contactname, $contactnotes, $contactemail,
    $contactphone1, $contactphone2, $linkto, $delrec);


			//$id=NULL;
			$siteid = empty($_POST['siteid']) ? '' : $_POST['siteid'];
			$catid = empty($_POST['catid']) ? '' : $_POST['catid'];
			$title = empty($_POST['title']) ? '' : $_POST['title'];
			$thislisting = empty($_POST['thislisting']) ? '' : $_POST['thislisting'];
			$target_url = empty($_POST['target_url']) ? '' : $_POST['target_url'];
			$target_name = empty($_POST['target_name']) ? '' : $_POST['target_name'];
			$image_name = empty($_POST['image_name']) ? '' : $_POST['image_name'];
			$embed_code = empty($_POST['embed_code']) ? '' : $_POST['embed_code'];
			$memberid = empty($_POST['memberid']) ? '' : $_POST['memberid'];
			$authname = empty($_POST['authname']) ? '' : $_POST['authname'];
			$origdate = empty($_POST['origdate']) ? '' : $_POST['origdate'];
			$details = empty($_POST['details']) ? '' : $_POST['details'];
			$featured = empty($_POST['featured']) ? '' : $_POST['featured'];
			$link1 = empty($_POST['link1']) ? '' : $_POST['link1'];
			$link2 = empty($_POST['link2']) ? '' : $_POST['link2'];
			$link3 = empty($_POST['link3']) ? '' : $_POST['link3'];
			$link4 = empty($_POST['link4']) ? '' : $_POST['link4'];
			$link5 = empty($_POST['link5']) ? '' : $_POST['link5'];
			$link6 = empty($_POST['link6']) ? '' : $_POST['link6'];
			$link7 = empty($_POST['link7']) ? '' : $_POST['link7'];
			$link8 = empty($_POST['link8']) ? '' : $_POST['link8'];
			$showdate = empty($_POST['showdate']) ? '' : $_POST['showdate'];
			$hidedate = empty($_POST['hidedate']) ? '' : $_POST['hidedate'];
			$contactname = empty($_POST['contactname']) ? '' : $_POST['contactname'];
			$contactnotes = empty($_POST['contactnotes']) ? '' : $_POST['contactnotes'];
			$contactemail = empty($_POST['contactemail']) ? '' : $_POST['contactemail'];
			$contactphone1 = empty($_POST['contactphone1']) ? '' : $_POST['contactphone1'];
			$contactphone2 = empty($_POST['contactphone2']) ? '' : $_POST['contactphone2'];
			$linkto = empty($_POST['linkto']) ? '' : $_POST['linkto'];
			$delrec = empty($_POST['delrec']) ? '' : $_POST['delrec'];



    mysqli_stmt_execute($stmt);

    echo "Records inserted successfully.";


//var_dump($stmt);

	} else {
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($mysqli);
	}

mysqli_stmt_close($stmt);

// Close connection
//mysqli_close($link);

}
?>

<!-- END CREATING CONTENT FOR PRIMARY AND SIDE MENU CATEGORIES -->


<!-- DELETE CONTENT FOR PRIMARY AND SIDE MENU CATEGORIES -->
<?php
if ($_POST['del_classified']) {
$this_class_id=$_POST['this_class_id'];
$mysqli->query("update classifieds set delrec='on' where id='$this_class_id' and siteid='$siteid'");
}
?>
<!-- END DELETE CONTENT FOR PRIMARY AND SIDE MENU CATEGORIES -->

<body style="padding-top:110px;">
<div class="container-fluid h-100">

               <nav class="header sticky navbar navbar-expand-lg
                                navbar-dark bg-dark">
                    <a class="navbar-brand" href="../index.php"><img src="../assets/images/logo.png" width="40" /></a>
                    <!-- Hamburger button that toggles the navbar-->
                   <div style="padding:0;padding-right:28px;"> <button  class="navbar-toggler"
                        type="button" data-toggle="collapse"
                        data-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button></div>
                    <!-- navbar links -->
                    <div class="collapse navbar-collapse" data-toggle="collapse" data-target=".navbar-collapse.show"
                        id="navbarNavAltMarkup">
                       !--<div class="navbar-nav">
                           		    <li class="nav-item"><a id="link1" class="nav-link" href="#addContent"><div class="aButton" ><span style="color:#fff;">Add Content</span></div></a></li>
                          		    <li class="nav-item"><a id="link2" class="nav-link" href="#manageContent"><div class="aButton" ><span style="color:#fff;">Manage Content</span></div></a></li>
                          		    <li class="nav-item"><a id="link3" class="nav-link" href="#manageImages"><div class="aButton" ><span style="color:#fff;">Manage Images</span></div></a></li>
                          		    <li class="nav-item"><a id="link4" class="nav-link" href="#manageItems"><div class="aButton" ><span style="color:#fff;">Manage Fees List</span></div></a></li>
					  </div>
                </nav>
<div class="col">

<?php

/*
if($_POST['save_theme']){
$themename=$_POST['name'];
$themedesc=$_POST['themedesc'];

	if($_POST['id']){
	$themeid=$_POST['id'];
	$mysqli->query("update themes set name='$themename', themedesc='$themedesc' where id='$themeid'");
	} else {
	$mysqli->query("insert into themes (name, themedesc, siteid) values ('$themename', '$themedesc', '$siteid')");
	}

}

$themecount='1';

while($themecount <= 4){
printf("<form method=post action=%s><p><a name='themes'>Add Theme %s</a></p><p><input type=text name=name><input type=text name=themedesc><input type=submit name='save_theme' value='save theme %s'></p></form>",htmlspecialchars($PHP_SELF), $themecount, $themecount);
$themecount++;
}




*/

?>

<div class='col'>
<?php
include('approve_quotes.php');

?>
</div>
<div class='col'>




<!-- ENTER HEADINGS FOR PRIMARY LINKS -->
<?php

if($res3 = $mysqli->query("select * from weblinks where delrec != 'on' and siteid='$siteid'")){
	if($myrow3=$res3->fetch_object()){
	do{
	$link1=$myrow3->link1;
	$link2=$myrow3->link2;
	$link3=$myrow3->link3;
	$link4=$myrow3->link4;
	$link5=$myrow3->link5;
	$link6=$myrow3->link6;
	$link7=$myrow3->link7;
	$link8=$myrow3->link8;

	printf("<form style='background:pink;' method=post action=%s>
	<p><a name='links'>Main Menu</a></p>
	<input type=text name=link1 value='%s'>
	<input type=text name=link2 value='%s'>
	<input type=text name=link3 value='%s'>
	<input type=text name=link4 value='%s'>
	<input type=text name=link5 value='%s'>
	<input type=text name=link6 value='%s'>
	<input type=text name=link7 value='%s'>
	<input type=text name=link8 value='%s'>
	<input type=submit name=go value='Go'>
	</form>",htmlspecialchars($PHP_SELF), $myrow3->link1, $myrow3->link2, $myrow3->link3, $myrow3->link4, $myrow3->link5, $myrow3->link6,
	$myrow3->link7, $myrow3->link8);
	}while($myrow3=$res3->fetch_object());
	} else {

?>
<form style='background:yellow;' method=post action=<?php echo htmlspecialchars($PHP_SELF); ?>>
	<p><a name='links'>Main Menu</a></p>
	<input type=text name=link1 value='<?php echo $link1; ?>'>
	<input type=text name=link2 value='<?php echo $link2; ?>'>
	<input type=text name=link3 value='<?php echo $link3; ?>'>
	<input type=text name=link4 value='<?php echo $link4; ?>'>
	<input type=text name=link5 value='<?php echo $link5; ?>'>
	<input type=text name=link6 value='<?php echo $link6; ?>'>
	<input type=text name=link7 value='<?php echo $link7; ?>'>
	<input type=text name=link8 value='<?php echo $link8; ?>'>
	<input type=submit name=go value='Go'>
	</form>
<?php
	}

}
?>
<!-- END ENTER HEADINGS FOR PRIMARY LINKS -->
</div><div class='col'>
<!-- ENTER TITLES FOR SIDE MENU LINKS -->
<?php
if($res4 = $mysqli->query("select * from catlinks where delrec != 'on' and siteid='$siteid'")){
	if($myrow4=$res4->fetch_object()){
	/*
	do{
	printf("<form method=post action='%s'><p><a name='leftside'>Sub Menu</a></p>
	<p><input type='text' name=sidenav1 value='%s'></p>
	<p><input type='text' name=sidenav2 value='%s'></p>
	<p><input type='text' name=sidenav3 value='%s'></p>
	<p><input type='text' name=sidenav4 value='%s'></p>
	<p><input type='text' name=sidenav5 value='%s'></p>
	<p><input type='text' name=sidenav6 value='%s'></p>
	<p><input type='text' name=sidenav7 value='%s'></p>
	<p><input type='text' name=sidenav8 value='%s'></p>
	<p><input type='text' name=sidenav9 value='%s'></p>
	<p><input type='text' name=sidenav10 value='%s'></p>
	<p><input type='text' name=sidenav11 value='%s'></p>
	<p><input type='text' name=sidenav12 value='%s'></p>
	<p><input type='text' name=sidenav13 value='%s'></p>
	<p><input type='text' name=sidenav14 value='%s'></p>
	<p><input type='text' name=sidenav15 value='%s'></p>
	<p><input type='submit' name='save' value='save'></p>
	</form>",htmlspecialchars($PHP_SELF), $myrow4->sidenav1, $myrow4->sidenav2, $myrow4->sidenav3, $myrow4->sidenav4,
	$myrow4->sidenav5, $myrow4->sidenav6, $myrow4->sidenav7, $myrow4->sidenav8, $myrow4->sidenav9,
	$myrow4->sidenav10, $myrow4->sidenav11, $myrow4->sidenav12, $myrow4->sidenav13, $myrow4->sidenav14,
	$myrow4->sidenav15);

	} while($myrow4=$res4->fetch_object());
	*/
	} else {
	?>
	<!--<form method=post action='%s'><p><a name='leftside'>Sub Menu</a></p>
		<p><input type='text' name=sidenav1 value='<?php echo $sidenav1; ?>'></p>
		<p><input type='text' name=sidenav2 value='<?php echo $sidenav2; ?>'></p>
		<p><input type='text' name=sidenav3 value='<?php echo $sidenav3; ?>'></p>
		<p><input type='text' name=sidenav4 value='<?php echo $sidenav4; ?>'></p>
		<p><input type='text' name=sidenav5 value='<?php echo $sidenav5; ?>'></p>
		<p><input type='text' name=sidenav6 value='<?php echo $sidenav6; ?>'></p>
		<p><input type='text' name=sidenav7 value='<?php echo $sidenav7; ?>'></p>
		<p><input type='text' name=sidenav8 value='<?php echo $sidenav8; ?>'></p>
		<p><input type='text' name=sidenav9 value='<?php echo $sidenav9; ?>'></p>
		<p><input type='text' name=sidenav10 value='<?php echo $sidenav10; ?>'></p>
		<p><input type='text' name=sidenav11 value='<?php echo $sidenav11; ?>'></p>
		<p><input type='text' name=sidenav12 value='<?php echo $sidenav12; ?>'></p>
		<p><input type='text' name=sidenav13 value='<?php echo $sidenav13; ?>'></p>
		<p><input type='text' name=sidenav14 value='<?php echo $sidenav14; ?>'></p>
		<p><input type='text' name=sidenav15 value='<?php echo $sidenav15; ?>'></p>
		<p><input type='submit' name='save' value='save'></p>
	</form>-->
	<?php
	}

}
?>
<!-- END ENTER TITLES FOR SIDE MENU LINKS -->
</div><!--</div>
<div class="row"> --><div class='col'>




<!-- END CREATE CATEGORIES FOR PRIMARY AND SIDE MENU LINKS -->

<!-- LIST CATEGORIES - DELETE CATEGORIES -->
<?php


include('add_content.php');
?>



</div>
<div class='col'>
<?php
include('manage_posts.php');
//TODO  no one will know what this is
if($result = $mysqli->query("select * from categories where siteid='$siteid' and delrec != 'on'")){

  echo "<p>Options, Group</p>";
    if($myrow=$result->fetch_object()){
    do{
      printf("<form method=post action='%s'>
      <input type=submit name='del_category' value='X'>
      <input type=hidden name='siteid' value='%s'>
      <input type=hidden name='this_cat_id' value='%s'>%s,  %s</form>", htmlspecialchars($PHP_SELF), $myrow->siteid, $myrow->id, $myrow->catname, $myrow->cat_group);
      }while($myrow=$result->fetch_object());
      } else {
      //echo "No categories found";
      }
  }
  
?>
</div>
<!-- CREATE CATEGORIES FOR PRIMARY AND SIDE MENU LINKS -->
<div class="col">
<?php
if($res14 = $mysqli->query("select * from catlinks where delrec != 'on' and siteid='$siteid'")):
	while($myrow14=$res14->fetch_object()):
$sidenav1=$myrow14->sidenav1;
$sidenav2=$myrow14->sidenav2;
$sidenav3=$myrow14->sidenav3;
$sidenav4=$myrow14->sidenav4;
$sidenav5=$myrow14->sidenav5;
$sidenav6=$myrow14->sidenav6;
$sidenav7=$myrow14->sidenav7;
$sidenav8=$myrow14->sidenav8;
$sidenav9=$myrow14->sidenav9;
$sidenav10=$myrow14->sidenav10;
$sidenav11=$myrow14->sidenav11;
$sidenav12=$myrow14->sidenav12;
$sidenav13=$myrow14->sidenav13;
$sidenav14=$myrow14->sidenav14;
$sidenav15=$myrow14->sidenav15;

endwhile;
?>
<form method="post" action="<?php echo htmlspecialchars($PHP_SELF);  ?>">
<p><a name='categories'>Service Options</a></p>
<input type="hidden" name="siteid" value="<?php echo $siteid;?>">
<!--<p>Sub Menu
<select name="navid">
<option value="sidenav1"><?php echo $sidenav1;?></option>
<option value="sidenav2"><?php echo $sidenav2;?></option>
<option value="sidenav3"><?php echo $sidenav3;?></option>
<option value="sidenav4"><?php echo $sidenav4;?></option>
<option value="sidenav5"><?php echo $sidenav5;?></option>
<option value="sidenav6"><?php echo $sidenav6;?></option>
<option value="sidenav7"><?php echo $sidenav7;?></option>
<option value="sidenav8"><?php echo $sidenav8;?></option>
<option value="sidenav9"><?php echo $sidenav9;?></option>
<option value="sidenav10"><?php echo $sidenav10;?></option>
<option value="sidenav11"><?php echo $sidenav11;?></option>
<option value="sidenav12"><?php echo $sidenav12;?></option>
<option value="sidenav13"><?php echo $sidenav13;?></option>
<option value="sidenav14"><?php echo $sidenav14;?></option>
<option value="sidenav15"><?php echo $sidenav15;?></option>
</select></p>-->
<div class="col"><label for "catname">Option Description</label><input type="text" name="catname" value="<?php echo $catname;?>"></div>
<div class="col"><label for "catdesc">Description</label><textarea name="catdesc" rows=5 cols=15></textarea></div>
<div class="col"><label for "cat_group">Option Group</label><input type="text" name="cat_group" value="<?php echo $cat_group;?>"></div>
<!--<p>Link to URL<input type="text" name="cat_url" value="<?php echo $cat_url;?>"></p>
<div class="col"><label for "listorder">List Order</label><input type="text" name="listorder" value="<?php echo $cat_group;?>"></p>-->
<div class="col"><input class="btn btn-primary" type="submit" name="create_category" value="Save Option"></div>

</form>
<?php
endif;
?>
</div>

<div class='col'>
<?php

include('grab_items.php');
?>
</div>


</div> <!-- container-->



    <!-- Import jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity=
"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>

    <!-- Import popper.js cdn -->
    <script src=
"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity=
"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous">
    </script>

    <!-- Import javascript cdn -->
    <script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity=
"sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous">
    </script>

<script>


$( "#sidemenuToggler" ).click(function() {
  $( "#sidemenu" ).toggle();
      $(window).scrollTop(0);
});

$( "#link1" ).click(function() {
  $( "#home" ).show();
  $( "#welcome" ).hide();
  $( "#l1" ).show();
  $( "#l2" ).hide();
  $( "#l3" ).hide();
  $( "#l4" ).hide();
  $( "#l5" ).hide();
  $( "#l6" ).hide();
  $( "#l7" ).hide();
  $( "#l8" ).hide();

});

$( "#link2" ).click(function() {
  $( "#home" ).show();
  $( "#welcome" ).hide();
  $( "#l1" ).hide();
  $( "#l2" ).show();
  $( "#l3" ).hide();
  $( "#l4" ).hide();
  $( "#l5" ).hide();
  $( "#l6" ).hide();
  $( "#l7" ).hide();
  $( "#l8" ).hide();

});

$( "#link3" ).click(function() {
  $( "#home" ).show();
  $( "#welcome" ).hide();
  $( "#l1" ).hide();
  $( "#l2" ).hide();
  $( "#l3" ).show();
  $( "#l4" ).hide();
  $( "#l5" ).hide();
  $( "#l6" ).hide();
  $( "#l7" ).hide();
  $( "#l8" ).hide();

});
$( "#link4" ).click(function() {
  $( "#home" ).show();
  $( "#welcome" ).hide();
  $( "#l1" ).hide();
  $( "#l2" ).hide();
  $( "#l3" ).hide();
  $( "#l4" ).show();
  $( "#l5" ).hide();
  $( "#l6" ).hide();
  $( "#l7" ).hide();
  $( "#l8" ).hide();

});
$( "#link5" ).click(function() {
  $( "#home" ).show();
  $( "#welcome" ).hide();
  $( "#l1" ).hide();
  $( "#l2" ).hide();
  $( "#l3" ).hide();
  $( "#l4" ).hide();
  $( "#l5" ).show();
  $( "#l6" ).hide();
  $( "#l7" ).hide();
  $( "#l8" ).hide();

});
$( "#link6" ).click(function() {
  $( "#home" ).show();
  $( "#welcome" ).hide();
  $( "#l1" ).hide();
  $( "#l2" ).hide();
  $( "#l3" ).hide();
  $( "#l4" ).hide();
  $( "#l5" ).hide();
  $( "#l6" ).show();
  $( "#l7" ).hide();
  $( "#l8" ).hide();

});
$( "#link7" ).click(function() {
  $( "#home" ).show();
  $( "#welcome" ).hide();
  $( "#l1" ).hide();
  $( "#l2" ).hide();
  $( "#l3" ).hide();
  $( "#l4" ).hide();
  $( "#l5" ).hide();
  $( "#l6" ).hide();
  $( "#l7" ).show();
  $( "#l8" ).hide();

});
$( "#link8" ).click(function() {
  $( "#home" ).show();
  $( "#welcome" ).hide();
  $( "#l1" ).hide();
  $( "#l2" ).hide();
  $( "#l3" ).hide();
  $( "#l4" ).hide();
  $( "#l5" ).hide();
  $( "#l6" ).hide();
  $( "#l7" ).hide();
  $( "#l8" ).show();

});
/*
$(document).ready(function() {
  $( "#home" ).show();
  $( "#brand" ).hide();
  $( "#l1" ).show();
  $( "#l2" ).show();
  $( "#l3" ).show();
  $( "#l4" ).show();
  $( "#l5" ).show();
  $( "#l6" ).show();
  $( "#l7" ).show();
  $( "#l8" ).show();
});
*/
$(document).ready(function() {
  //$( "#disclaimer" ).show();
  $( "#home" ).show();
  $( "#welcome" ).show();
  $( "#brandLogo" ).show();
  $( "#l1" ).hide();
  $( "#l2" ).hide();
  $( "#l3" ).hide();
  $( "#l4" ).hide();
  $( "#l5" ).hide();
  $( "#l6" ).hide();
  $( "#l7" ).hide();
  $( "#l8" ).hide();

// makes the parallax elements
function parallaxIt() {

  // create variables
  var $fwindow = $(window);
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  // on window scroll event
  $fwindow.on('scroll resize', function() {
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  });

  // for each of content parallax element
  $('[data-type="content"]').each(function (index, e) {
    var $contentObj = $(this);
    var fgOffset = parseInt($contentObj.offset().top);
    var yPos;
    var speed = ($contentObj.data('speed') || 1 );

    $fwindow.on('scroll resize', function (){
      yPos = fgOffset - scrollTop / speed;

      $contentObj.css('top', yPos);
    });
  });

  // for each of background parallax element
  $('[data-type="background"]').each(function(){
    var $backgroundObj = $(this);
    var bgOffset = parseInt($backgroundObj.offset().top);
    var yPos;
    var coords;
    var speed = ($backgroundObj.data('speed') || 0 );

    $fwindow.on('scroll resize', function() {
      yPos = - ((scrollTop - bgOffset) / speed);
      coords = '40% '+ yPos + 'px';

      $backgroundObj.css({ backgroundPosition: coords });
    });
  });

  // triggers winodw scroll for refresh
  $fwindow.trigger('scroll');
};

parallaxIt();
</script>


</body>
</html>