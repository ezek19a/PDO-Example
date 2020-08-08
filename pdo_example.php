<?php

/** ------------------------------------------------------- Connection --------------------------------------*/

$servername = "localhost";
$username = "ccn3uadmin";
$password = "ccn3u123";
$dbname = 'ccn3uadm_contacts';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

/** ------------------------------------------------------- Connection 2 --------------------------------------	*/
$hostname = "localhost";
$username = "ihmooorg";
$password = "Ihm44214";
$database = "ihmooorg_immigrants";
$dbtype = "mysql";

define("HOST", $hostname);
define("USER", $username);
define("PASS", $password);
define("DB", $database);
define("DBTYPE", $dbtype);



try{

	$conn = new PDO(DBTYPE.":host=".HOST.";dbname=".DB, USER, PASS);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected succesfully";
}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();	
}

/** ------------------------------------------------------- Select Fetch --------------------------------------*/
$memberid = 'A10001';

$stmt = $conn->prepare("SELECT * FROM contacts WHERE memberid = '$memberid'"); 

$stmt->execute(); 

$row = $stmt->fetch();

extract($row);

echo $mphone;


/** ------------------------------------------------------- Select Fetch Array --------------------------------------*/

 $query = "select * from items ORDER BY id ASC LIMIT 0, 16";



  //while($row=mysql_fetch_array($result)){
  //extract($row);
    $stmt = $conn->prepare($query);
    
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        //echo $row['product_name']
?>
				<div class="cart_block">				
					<div class="cart_pic">				
						<? echo "<a href=\"library_item?id=" . $id . "\">";?>
							<img src="<?=$row['picture']?>" width="162px" height="235px" alt="" />
						</a>					
					</div>
					
					<div class="cart_title">				
						<center><?=$row['product_name']?></center>
					</div>				
					<div class="clear"></div>
					<div class="addtocart">			
						<center><img src="<?=$row['logo']?>" width="70px" /></center>	
					</div>

					<div class="cart_price">					
						<div class="addtocart2">					
							<div ><a href="library_item?id=<?php echo $id; ?>" style="padding:0 0 0 4px; font-size:12px; color:#959595; text-decoration:none">More Info</a><br /><font style="font-size:11px; font-weight:bold; padding:0 0 0 4px;"><?=$row['currency']?>&nbsp;<?=$row['sgdprice']?><?php echo $blabla; ?></font></div>					
						</div>					
					</div>

					<div class="cart_wishlist">					
						<center>
							<a href="addtocart?id=<?php echo $id; ?>" style="text-decoration:none; color:#FFFFFF">+ Add to Cart</a>
						</center>				 
					</div>
						<div class="clear"></div> 
				</div>	
		
<?php } ?>

<?php


/** ------------------------------------------------------- Select Fetch Row Count--------------------------------------*/

	//echo "PID ". $pelapor_id;
					
	$rakanid = $pelapor_id;
	$asnafid = $asnaf_id;

	$stmt2 = $conn->prepare("SELECT * FROM rakan WHERE user_id = '$rakanid'"); 

	$stmt2->execute(); 
						
	if ($stmt2->rowCount() > 0) { 						

	$row2 = $stmt2->fetch();

	extract($row2);	
						
	echo $name . " " . "[ mobile = " .$contact . " ]";
						
	}else{
							
	echo "N/A";
						
	}

/** ------------------------------------------------------- Select INNER JOIN 1--------------------------------------*/

	$query = "SELECT * FROM post INNER JOIN category ON post.cat_id = category.id";
						
	$stmt = $conn->prepare($query);
						
	$stmt->execute();
						
	if ($stmt->rowCount() > 0) { 

	$result = $stmt->fetchAll();		
					
	foreach( $result as $row ) {
		
			echo $row['category'];
			
			echo "<br />";
			
			echo $row['post_title'];
			
			echo "<br />";			
		}
	}

/** ------------------------------------------------------- Insert --------------------------------------*/

$stmt = $conn->prepare("INSERT INTO contacts (memberid, email, username, password, password2, mphone, nickname, fname, lname, rphone, street, city, region, country, postcode, education, profession, uniqkey, pincode, seriesnum) 
    VALUES (:memberid, :email, :username, :password, :password2, :mphone, :nickname, :fname, :lname, :rphone, :street, :city, :region, :country, :postcode, :education, :profession, :uniqkey, :pincode, :seriesnum)");
    $stmt->bindParam(':memberid', $newmemberid);
	$stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
	$stmt->bindParam(':password2', $password2);
	$stmt->bindParam(':mphone', $mphone);
    $stmt->bindParam(':nickname', $nickname);
    $stmt->bindParam(':fname', $fname);
	$stmt->bindParam(':lname', $lname);
	$stmt->bindParam(':rphone', $rphone);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':city', $city);
	$stmt->bindParam(':region', $region);
	$stmt->bindParam(':country', $country);
    $stmt->bindParam(':postcode', $postcode);
    $stmt->bindParam(':education', $education);
	$stmt->bindParam(':profession', $profession);
	$stmt->bindParam(':uniqkey', $uniqkey);	
	$stmt->bindParam(':pincode', $pincode);	
	$stmt->bindParam(':seriesnum', $seriesnum);	
	
	$stmt2 = $conn->prepare("INSERT INTO contactsview (memberid, email, username, password, password2, mphone, nickname, fname, lname, rphone, street, city, region, country, postcode, education, profession, uniqkey, pincode, seriesnum) 
    VALUES (:memberid, :email, :username, :password, :password2, :mphone, :nickname, :fname, :lname, :rphone, :street, :city, :region, :country, :postcode, :education, :profession, :uniqkey, :pincode, :seriesnum)");
    $stmt2->bindParam(':memberid', $newmemberid);
	$stmt2->bindParam(':email', $email);
    $stmt2->bindParam(':username', $username);
    $stmt2->bindParam(':password', $password);
	$stmt2->bindParam(':password2', $password2);
	$stmt2->bindParam(':mphone', $mphone);
    $stmt2->bindParam(':nickname', $nickname);
    $stmt2->bindParam(':fname', $fname);
	$stmt2->bindParam(':lname', $lname);
	$stmt2->bindParam(':rphone', $rphone);
    $stmt2->bindParam(':street', $street);
    $stmt2->bindParam(':city', $city);
	$stmt2->bindParam(':region', $region);
	$stmt2->bindParam(':country', $country);
    $stmt2->bindParam(':postcode', $postcode);
    $stmt2->bindParam(':education', $education);
	$stmt2->bindParam(':profession', $profession);
	$stmt2->bindParam(':uniqkey', $uniqkey);	
	$stmt2->bindParam(':pincode', $pincode);	
	$stmt2->bindParam(':seriesnum', $seriesnum);	
	
	
	// insert a row
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $password = md5($_SESSION['password']);
	$password2 = $_SESSION['password'];
    $mphone = $_SESSION['mphone'];
    $nickname = $_SESSION['nickname'];
	$fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $rphone = $_SESSION['rphone'];
	$street = $_SESSION['street'];
    $city = $_SESSION['city'];
    $region = $_SESSION['region'];
	$country = $_SESSION['country'];
    $postcode = $_SESSION['postcode'];
	$education = $_POST['education'];
    $profession = $_POST['profession'];
    $uniqkey = $_POST['uniqkey'];
	$pincode = $_POST['pincode'];
	$seriesnum = $_SESSION['seriesnum'];
	
/** ------------------------------------------------------- Insert 2--------------------------------------*/	

include "connection.php";


/*
$idwilayah = $_POST['idwilayah'];
$namaw = $_POST['namaw'];
$status = $_POST['status'];

echo $idwilayah;
echo "<br />";
echo $namaw;
echo "<br />";
echo $status;
**/

	$stmt = $conn->prepare("INSERT INTO wilayah (idwilayah, namaw, status) 
    VALUES (:idwilayah, :namaw, :status)");
    $stmt->bindParam(':idwilayah', $idwilayah);	
    $stmt->bindParam(':namaw', $namaw);
	$stmt->bindParam(':status', $status);		

	$idwilayah = $_POST['idwilayah'];
	$namaw = $_POST['namaw'];
	$status = $_POST['status'];

	if($stmt->execute()){	
	
			?>
			<script type="text/javascript">
				alert("Senarai Wilayah telah dimasukkan!");
				window.location = "config_wilayah.php";
			</script>
			<?php	
	
	}else{
		
			?>
			<script type="text/javascript">
				alert("Senarai Wilayah gagal dimasukkan!");
				window.location = "config_wilayah_add.php";
			</script>
			<?php			
	}
	
	
/** ------------------------------------------------------- Upload --------------------------------------*/
	
	$target = "uploads/";  $target = $target . basename( $_FILES['filepath']['name']);
	//This gets all the other information from the form  $Filename = basename( $_FILES['filepath']['name']); 
	$filepath = "uploads/" . $Filename;  
	move_uploaded_file($_FILES['filepath']['tmp_name'], $target);
	
	if($stmt->execute() && $stmt2->execute()){
?>
<script type="text/javascript">
	alert("Registration Succesfully!");
	window.location = "first.php";
</script>
<?php		
	}else{
?>
<script type="text/javascript">
	alert("Registration Error!");
	window.location = "logged.php";
</script>
<?php }
		$conn = null;


/** ------------------------------------------------------- Upload 2 --------------------------------------*/		

include "connection.php";



	$target = "uploads/";  

	$target = $target . basename( $_FILES['pics']['name']);

	

	//This gets all the other information from the form  $Filename = basename( $_FILES['filepath']['name']); 

	

	$Filename = basename( $_FILES['pics']['name']);

	$picture = "uploads/" . $Filename;  

	move_uploaded_file($_FILES['pics']['tmp_name'], $target); 

	

	$stmt = $conn->prepare("INSERT INTO profile (user_id, picture) 

    VALUES (:user_id, :picture)");

    $stmt->bindParam(':user_id', $user_id);	

    $stmt->bindParam(':picture', $picture);	



	$user_id = $_GET['user_id'];

	

	$stmt->execute();

			?>

			<script type="text/javascript">

				alert("Gambar telah dimasukkan!");

				//window.location = "profile_update.php;

			</script>

			<?php

			

			header("Refresh:1; profile_update.php");		
			

/** ------------------------------------------------------- Upload Update --------------------------------------*/			
include "connection.php";



	$target = "uploads/";  

	$target = $target . basename( $_FILES['pics']['name']);

	

	//This gets all the other information from the form  $Filename = basename( $_FILES['filepath']['name']); 

	

	$Filename = basename( $_FILES['pics']['name']);

	$picture = "uploads/" . $Filename;  

	move_uploaded_file($_FILES['pics']['tmp_name'], $target); 

	

	$stmt = $conn->prepare("INSERT INTO profile (user_id, picture) 

    VALUES (:user_id, :picture)");

    $stmt->bindParam(':user_id', $user_id);	

    $stmt->bindParam(':picture', $picture);	



	$user_id = $_GET['user_id'];





			$sql = "UPDATE profile SET picture = :picture

            WHERE user_id = :user_id";

			

			$stmt = $conn->prepare($sql);                                  

			$stmt->bindParam(':picture', $picture, PDO::PARAM_STR);  

			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

			//$stmt->execute(); 



			if($stmt->execute()){

			?>

			<script type="text/javascript">

				alert("Gambar profile telah dikemaskini!");

				window.location = "profile_update.php";

			</script>

			<?php

			

			//header("Refresh:1; rakan_view.php?rakan=".$rakan_id);

			

			}else{

			?>

			<script type="text/javascript">

				alert("ambar profile gagal dikemaskini!");

				window.location = "profile_update.php";

			</script>

			

			<?php

			

			//header("Refresh:1; rakan_view.php?rakan=".$rakan_id);			

			

			}	

/** ------------------------------------------------------- Multiple Upload --------------------------------------*/			

?>
		<form action="tambah_gambar_peg.php?aduan_id=<?php echo $_GET['case']; ?>&pegawai_id=<?php echo $pegawai_id; ?>" method="post" enctype="multipart/form-data">
							<p></p>
							<div style="padding:15px;">
							<p></p>
							<input type="file" name="pegpics[]" class="form-control-file border" accept="image/*" onchange="loadFile(event)"> 
							<p></p>							
							<input type="file" name="pegpics[]" class="form-control-file border" accept="image/*" onchange="loadFile1(event)"> 
							<p></p>
							<input type="file" name="pegpics[]" class="form-control-file border" accept="image/*" onchange="loadFile2(event)"> 
							<p></p>							
							<input type="file" name="pegpics[]" class="form-control-file border" accept="image/*" onchange="loadFile3(event)"> 
							<p></p>							
							<input type="file" name="pegpics[]" class="form-control-file border" accept="image/*" onchange="loadFile4(event)"> 
							</div>
							<script>
							
							  var loadFile = function(event) {
								  
								var output = document.getElementById('output');
								
								output.src = URL.createObjectURL(event.target.files[0]);
								
							  };
							  
							  var loadFile1 = function(event) {
								  
								var output1 = document.getElementById('output1');
								
								output1.src = URL.createObjectURL(event.target.files[0]);
								
							  };	
							  

							  var loadFile2 = function(event) {
								  
								var output2 = document.getElementById('output2');
								
								output2.src = URL.createObjectURL(event.target.files[0]);
								
							  };
							  
							  var loadFile3 = function(event) {
								  
								var output3 = document.getElementById('output3');
								
								output3.src = URL.createObjectURL(event.target.files[0]);
								
							  };	

							  var loadFile4 = function(event) {
								  
								var output4 = document.getElementById('output4');
								
								output4.src = URL.createObjectURL(event.target.files[0]);
								
							  };							  
							</script>		
		
        <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Tambah</button>
		</form>

<?php


// File: tambah_gambar_peg.php


include "connection.php";

$case = $_GET['aduan_id'];

	$countfiles = count($_FILES['pegpics']['name']);

	$stmt = $conn->prepare("INSERT INTO aduan_images (name, image_date, aduan_id, pegawai_id, gambar_status, status, updated_by, updated_date) 

    VALUES (:name, :image_date, :aduan_id, :pegawai_id, :gambar_status, :status, :updated_by, :updated_date)");

    $stmt->bindParam(':name', $name);	

    $stmt->bindParam(':image_date', $image_date);	

    $stmt->bindParam(':aduan_id', $aduan_id);

	$stmt->bindParam(':pegawai_id', $pegawai_id);

	$stmt->bindParam(':gambar_status', $gambar_status);	

	$stmt->bindParam(':status', $status);	

	$stmt->bindParam(':updated_by', $updated_by);	

	$stmt->bindParam(':updated_date', $updated_date);	
	

	  for($i=0;$i<$countfiles;$i++){
		  

			date_default_timezone_set("Asia/Kuala_Lumpur"); 
		  

			//$name = $filename;		

			$image_date = date("Y-m-d H:i:s");

			$aduan_id = $case;

			$pegawai_id = $_GET['pegawai_id'];	

			$gambar_status = 1;

			$status = 1;

			$updated_by = $_SESSION['memberid'];

			$updated_date = date("Y-m-d H:i:s");			

			  

			//$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';



			// File name

			//$name = $root . "maiwp/". $_FILES['pegpics']['name'][$i];

			

				$target = "uploads/";  

				$target = $target . basename( $_FILES['pegpics']['name'][$i]);

				

				//This gets all the other information from the form  $Filename = basename( $_FILES['filepath']['name']); 

				

				$Filename = basename( $_FILES['pegpics']['name'][$i]);

				

				$name = "uploads/" . $Filename;  

				

				//move_uploaded_file($_FILES['pegpics']['tmp_name'], $target); 

			

				  if(move_uploaded_file($_FILES['pegpics']['tmp_name'][$i], $target)){



					// Execute query

					$stmt->execute();

			?>

			<script type="text/javascript">

				alert("Gambar telah ditambah!");

				window.location = "case_new_update_pegawai.php?case=" + <?php echo $case; ?>;

			</script>

			<?php

				  }



	  }			
		
/** ------------------------------------------------------- Update --------------------------------------*/

	$memberid = 'A10025';
	//$memberid = $_POST['memberid'];
	$email = $_POST['email'];
    $username = $_POST['username'];
    $mphone = $_POST['mphone'];
    //$nickname = $_POST['nickname'];
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $rphone = $_POST['rphone'];
	$street = $_POST['street'];
    $city = $_POST['city'];
    $region = $_POST['region'];
	$country = $_POST['country'];
    $postcode = $_POST['postcode'];
	$education = $_POST['education'];
    $profession = $_POST['profession'];

$sql = "UPDATE contactsview SET email = :email, 
            username = :username, 
            mphone = :mphone,            
            fname = :fname,
			lname = :lname, 
            rphone = :rphone,  
            street = :street,  
            city = :city,
			region = :region, 
            country = :country,  
            postcode = :postcode,  
            education = :education,
			profession = :profession 
            WHERE memberid = :memberid";
			
$stmt = $conn->prepare($sql);                                  
$stmt->bindParam(':email', $email, PDO::PARAM_STR);       
$stmt->bindParam(':username', $username, PDO::PARAM_STR);    
$stmt->bindParam(':mphone', $mphone, PDO::PARAM_STR);  
//$stmt->bindParam(':nickname', $nickname, PDO::PARAM_STR); 
$stmt->bindParam(':fname', $fname, PDO::PARAM_STR); 
$stmt->bindParam(':lname', $lname, PDO::PARAM_STR);       
$stmt->bindParam(':rphone', $rphone, PDO::PARAM_STR);    
$stmt->bindParam(':street', $street, PDO::PARAM_STR);  
$stmt->bindParam(':city', $city, PDO::PARAM_STR); 
$stmt->bindParam(':region', $region, PDO::PARAM_STR); 
$stmt->bindParam(':country', $country, PDO::PARAM_STR);    
$stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);  
$stmt->bindParam(':education', $education, PDO::PARAM_STR); 
$stmt->bindParam(':profession', $profession, PDO::PARAM_STR);  
$stmt->bindParam(':memberid', $memberid, PDO::PARAM_STR);   
//$stmt->execute(); 

if($stmt->execute()){
?>
<script type="text/javascript">
	alert("Privacy Updated!");
	window.location = "profile.php";
</script>
<?php
}else{
?>
<script type="text/javascript">
	alert("Privacy Error!");
	window.location = "profile.php";
</script>
<?php
}

/** ------------------------------------------------------- Update 2--------------------------------------*/

include "logid-session.php";

include "connection.php";

$id = $_GET['id'];
$idwilayah = $_POST['idwilayah'];
$namaw = $_POST['namaw'];
$status = $_POST['status'];

//echo $rakan_id;

//echo "<br />";

//echo $status;


			$sql = "UPDATE wilayah SET idwilayah = :idwilayah,
			namaw = :namaw,
			status = :status			
            WHERE id = :id";
			
			$stmt = $conn->prepare($sql);                                  
			$stmt->bindParam(':idwilayah', $idwilayah, PDO::PARAM_STR);  
			$stmt->bindParam(':namaw', $namaw, PDO::PARAM_STR);
			$stmt->bindParam(':status', $status, PDO::PARAM_STR);			
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);   
			//$stmt->execute(); 

			if($stmt->execute()){
			?>
			<script type="text/javascript">
				alert("Senarai Wilayah telah dikemaskini!");
				window.location = "config_wilayah.php";
			</script>
			<?php
			
			//header("Refresh:1; rakan_view.php?rakan=".$rakan_id);
			
			}else{
			?>
			<script type="text/javascript">
				alert("Senarai Wilayah gagal dikemaskini!");
				window.location = "config_wilayah_add.php";
			</script>
			
			<?php
			
			//header("Refresh:1; rakan_view.php?rakan=".$rakan_id);			
			
			}

/** ------------------------------------------------------- Search --------------------------------------*/

$keyword = $_POST['keyword'];

$query = "SELECT * FROM `items` WHERE `name` LIKE :keyword;";

$stmt = $conn->prepare($query);

$stmt->bindValue(':keyword','%'.$keyword.'%');

$stmt->execute();



if ($stmt->rowCount() > 0) { 

$result = $stmt->fetchAll();



foreach( $result as $row ) {

echo $row["id"];

echo $row["name"];

}

} else {

echo 'There is nothing to show';

}

/** ------------------------------------------------------- Code Generate --------------------------------------*/

<?php

include '../connection.php';

$stmt = $conn->prepare("SELECT * FROM regidgen ORDER BY id DESC LIMIT 1"); 

$stmt->execute(); 

$row = $stmt->fetch();

extract($row);

$x = $regid;

$x++;

$newregid = $x++;//echo $memberid;

//echo '<br />';
//echo $newmemberid;

$stmt = $conn->prepare("INSERT INTO regidgen (regid) 

    VALUES (:regid)");
	
    $stmt->bindParam(':regid', $newregid);
	
	$stmt->execute();	//echo "New records created successfully";
	
/** ------------------------------------------------------- Multiple Upload --------------------------------------*/

include "connection.php";

	$countfiles = count($_FILES['pegpics']['name']);

	  for($i=0; $i < $countfiles; $i++){		  

			date_default_timezone_set("Asia/Kuala_Lumpur"); 

			$case = $_GET['aduan_id'];		  

			//$name = $filename;		

			$image_date = date("Y-m-d H:i:s");

			$aduan_id = $_GET['aduan_id'];

			$pegawai_id = $_GET['pegawai_id'];	

			$status = 1;

			$updated_by = $_SESSION['memberid'];

			$updated_date = date("Y-m-d H:i:s");						  

			//$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

			// File name

			//$name = $root . "maiwp/". $_FILES['pegpics']['name'][$i];			

				$target = "uploads/";  

				$target = $target . basename( $_FILES['pegpics']['name'][$i]);				

				//This gets all the other information from the form  $Filename = basename( $_FILES['filepath']['name']); 

				$Filename = basename( $_FILES['pegpics']['name'][$i]);			

				$name = "uploads/" . $Filename;  				

				//move_uploaded_file($_FILES['pegpics']['tmp_name'], $target);			

				  if(move_uploaded_file($_FILES['pegpics']['tmp_name'][$i], $target)){					  

					$sql = "UPDATE aduan_images SET name = :name,

					image_date = :image_date,

					status = :status,

					updated_by = :updated_by,

					updated_date = :updated_date

					WHERE pegawai_id = :pegawai_id";					

					$stmt = $conn->prepare($sql);          


					$stmt->bindParam(':name', $name);	

					$stmt->bindParam(':image_date', $image_date);	

					$stmt->bindParam(':status', $status);	

					$stmt->bindParam(':updated_by', $updated_by);	

					$stmt->bindParam(':updated_date', $updated_date);			

					$stmt->bindParam(':pegawai_id', $pegawai_id);		 



					// Execute query

					$stmt->execute();

			?>

			<script type="text/javascript">

				alert("Gambar telah ditambah!");

				window.location = "case_new_update_pegawai.php?case=" + <?php echo $case; ?>;

			</script>

			<?php

				  }
	  }

/** ------------------------------------------------------- Multiple Insert --------------------------------------*/

 $number = count($_POST["name"]);  
 
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["name"][$i] != ''))             {  
                                  				
				$stmt = $conn->prepare("INSERT INTO tbl_name (name) 
				VALUES (:name)");
				$stmt->bindParam(':name', $name);
				
				$name = $_POST["name"][$i];
				
				$stmt->execute();
				
           }  
      }  
      echo "Data Inserted";  
 }  
 else  
 {  
      echo "Please Enter Name";  
 } 

/** --------------------------------------------------- Registration With Email Activation ------------------------------------*/ 


	include "logid-session.php";
	include "connection.php";
	$email = $_GET['email'];	

	$query = "SELECT * FROM `users` WHERE `email` = '$email'";
	$stmt1 = $conn->prepare($query);
	$stmt1->execute();	
	$row_count = $stmt1->rowCount();
	if($row_count == 0){
	?>
	
		<script>
			alert("Maaf pengguna gagal didaftarkan!");
		</script>	
		
	<?php
	header("Refresh:5; pengguna_form.php");
	}else{	
	$result = $stmt1->fetchAll();
	foreach( $result as $row ) {
		$uid = $row['uid'];
	}
	}
	
	$stmt2 = $conn->prepare("INSERT INTO pegawai (user_id, pegawai_code, name, ic, contact, alamat, email, gambar, status, updated_by, updated_date) 

    VALUES (:user_id, :pegawai_code, :name, :ic, :contact, :alamat, :email, :gambar, :status, :updated_by, :updated_date)");
    $stmt2->bindParam(':user_id', $user_id);	
    $stmt2->bindParam(':pegawai_code', $pegawai_code);		
	$stmt2->bindParam(':name', $name);	
	$stmt2->bindParam(':ic', $ic);	
    $stmt2->bindParam(':contact', $contact);	
    $stmt2->bindParam(':alamat', $alamat);	
    $stmt2->bindParam(':email', $email);		
	$stmt2->bindParam(':gambar', $gambar);	
	$stmt2->bindParam(':status', $status);	
    $stmt2->bindParam(':updated_by', $updated_by);	
    $stmt2->bindParam(':updated_date', $updated_date);
	
	date_default_timezone_set("Asia/Kuala_Lumpur"); 
	$today = date("Y-m-d H:i:s"); 
	$user_id = $uid;
	$pegawai_code = $_SESSION['memberid'];
	$name = $_GET['fullname'];	
	$ic = $_GET['ic'];	
	$contact = $_GET['contact'];	
	$alamat = $_GET['alamat'];	
	$email = $_GET['email'];	
	$gambar = "https://i.ibb.co/G76hnwv/user.png";
	$status = $_GET['status'];		
	$updated_by = $_SESSION['memberid'];
	$updated_date = $today;			

	if($stmt2->execute()){		
	
			$fullname = $_GET['fullname'];
			$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
			$activate = $root."/maiwp/email_activation.php?role=400&uid=".$user_id;
			$username = $_GET['username'];
			$epassword = $_GET['epassword'];
			$to = $email;
			$subject = "Pendaftaran Akaun Moja";
			$message = "
			<html>
			<head>
			<title>Pendaftaran Moja</title>
			</head>
			<body>
			<p>Assalamualaikum '$fullname'</p>
			<p><h2>Info Akaun</h2></p>
			<p>Activation URL :  '$activate'</p>
			<p>ID Pengguna:  '$username'</p>
			<p>Kata Laluan:  '$epassword'</p>
			<p>
			Terima Kasih,<br >
			Pasukan MOJA <br >
			Hotline : 012-3456789
			</p>
			</body>
			</html>
			";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From: <admin@maiwp.com>' . "\r\n";
			$headers .= 'Cc: myboss@example.com' . "\r\n";
			mail($to,$subject,$message,$headers);
	?>
	<script>
		alert("Pengguna telah didaftarkan!");
	</script>
	<?php
			header("Refresh:1; pengguna.php");
			
			}else{	
	?>
	<script>
		alert("Pengguna Gagal didaftarkan!");
	</script>
	<?php
			header("Refresh:1; pengguna_form.php");	
		}
			$conn = null;	
			
/** --------------------------------------------------- Activation From Email ------------------------------------*/			

include "logid-session.php";
include "connection.php";
$role = $_GET['role'];
$uid = $_GET['uid'];

$status = 1;

	date_default_timezone_set("Asia/Kuala_Lumpur");	
			$updated_by = $_SESSION['memberid'];
			$updated_date = date("Y-m-d H:i:s");
			
switch ($role) {
    case 200:
	$sql = "UPDATE users, pentadbir SET users.updated_date = :updated_date,	
            users.status = :status,
			pentadbir.updated_date = :updated_date,	
            pentadbir.status = :status
	WHERE users.uid = :uid and pentadbir.user_id = :uid";
        break;
    case 300:
	$sql = "UPDATE users, pentadbir_paza SET users.updated_date = :updated_date,
            users.status = :status,
			pentadbir_paza.updated_date = :updated_date,
            pentadbir_paza.status = :status
	WHERE users.uid = :uid and pentadbir_paza.user_id = :uid";
        break;
    case 400:
	$sql = "UPDATE users, pegawai SET users.updated_date = :updated_date,
            users.status = :status,
			pegawai.updated_date = :updated_date,
            pegawai.status = :status
	WHERE users.uid = :uid and pegawai.user_id = :uid";
        break;
    default:
	$sql = "UPDATE users, pegawai SET users.updated_date = :updated_date,
            users.status = :status,
			pegawai.updated_date = :updated_date,
            pegawai.status = :status
	WHERE users.uid = :uid and pegawai.user_id = :uid";
}	
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':updated_date', $updated_date, PDO::PARAM_STR);  
			$stmt->bindParam(':status', $status, PDO::PARAM_STR);   			
			$stmt->bindParam(':uid', $uid, PDO::PARAM_STR); 
			if($stmt->execute()){
					?>
					<script type="text/javascript">
						alert("Akaun anda telah Aktifkan!");
						window.close();
					</script>
					<?php
					//header("Refresh:1; pengguna.php");
				}else{		
					?>
					<script type="text/javascript">
						alert("Akaun anda gagal diaktifkan!");
						window.close();
					</script>
					<?php		
					//header("Refresh:1; pengguna_view.php?uid=".$uid);
				}

/** --------------------------------------------------- Select Distance ------------------------------------*/

	$latitude = $_GET['lat'];
	
	$longitude = $_GET['lng'];
	
	//$latitude = 3.1505038;
	
	//$longitude = 101.7634803;
	
	$distance_km = $_GET['rad'];	
	
	// Calculate distance and filter records by radius 
	$sql_distance = $having = ''; 
	
	if(!empty($distance_km) && !empty($latitude) && !empty($longitude)){ 
	
		$radius_km = $distance_km; 
		
		$sql_distance = " ,(((acos(sin((".$latitude."*pi()/180)) * sin((`p`.`lat`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`p`.`lat`*pi()/180)) * cos(((".$longitude."-`p`.`lng`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance "; 
		 
		$having = " HAVING (distance <= $radius_km) "; 
		 
		$order_by = ' distance ASC '; 
	}else{ 
		//$order_by = ' p.id DESC '; 
	}
	
	$query = "SELECT p.*".$sql_distance." FROM markers p $having AND clicks > 0 ORDER BY $order_by";
	
/** --------------------------------------------------- Reverse Timestamp ------------------------------------*/	


$stmt = $conn->prepare("SELECT * FROM categories WHERE id = 2"); 

$stmt->execute(); 

$row = $stmt->fetch();

extract($row);

echo $updated_at;

$start = new DateTime($created_at);//start time
$end = new DateTime($updated_at);//end time
$interval = $start->diff($end);
echo $interval->format('%Y years %m months %d days %H hours %i minutes %s seconds');//00 years 0 months 0 days 08 hours 0 minutes 0 seconds


$converted = date('d M Y h.i.s A', strtotime($updated_at));

echo "<br />";

echo $converted;

$year = date('Y', strtotime($updated_at));

echo "<br />";

echo $year;



$converted = date('d M Y h.i.s A', strtotime('2011-08-27 18:29:31'));
$reversed = date('Y-m-d H.i.s', strtotime($converted));


/** ----------------------------------------------------- Expiry ------------------------------------------*/

						echo "<br />";
						$created_at = $data['all']['created_at'];
						$expiry = date('Y-m-d H.i.s');
						
						$start = new DateTime($created_at);//start time
						$end = new DateTime($expiry);//end time
						$interval = $start->diff($end);
						//echo $interval->format('%Y years %m months %d days %H hours %i minutes %s seconds');
						
						echo $interval->format('%i minutes');
						
						$eex = $interval->format('%i');
						
						echo "<br />";
						
						$now = 39;
						echo $eex;

						if($now <= $eex){
							
							?>
								<script>
								
									alert("Expired");
									
								</script>
							
							<?php
							
							
						}
						
/** ----------------------------------------------------- Left Join ------------------------------------------*/

	$counter = 1;
						
	$query = "SELECT * FROM aduan LEFT JOIN asnaf ON aduan.asnaf_id = asnaf.id LEFT JOIN parlimen ON aduan.parlimen = parlimen.parlimen_id WHERE MONTH(aduan_date) = 12 LIMIT $starting_limit, $per_page";

	$stmt = $conn->prepare($query);
						
	$stmt->execute();
						
		$bil = $stmt->rowCount();
						
		if ($stmt->rowCount() > 0) { 

		$result = $stmt->fetchAll();		
					
			foreach( $result as $row ) {
					  
			echo $counter;
						
			$counter++;	
			
			
