
<?php
include_once 'db.php';
    
	if(isset($_POST['submit']))
{
$posttitle=$_POST['posttitle'];
$postdetails=$_POST['postdescription'];
$Discription=$_POST['Discription'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
$imgfile=$_FILES["postimage"]["name"];
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["postimage"]["tmp_name"],"upload/".$imgnewfile);

$status=1;
$query=mysqli_query($conn,"insert into news(Date,title,Description,Details,image,PostUrl,Is_Active) values(NOW(),'$posttitle','$Discription','$postdetails','$url','$imgnewfile','$status')");
if($query)
{
echo '<script type="text/javascript">alert("News Succesfully Posted");window.location=\'news.php\';</script>';
}
else{
$error="Something went wrong . Please try again.";    
} 

}
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<META charset="UTF-8">
 <link rel="icon" type="image/png" href="Img/5.png"/>
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
<title>Harbu Micro Finance Institute</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
	<link href="styles/bootstrap.min.css" rel="stylesheet">
  <link href="styles/backend.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="styles/style.css" rel="stylesheet">
  <link href="style/all.min.css" rel="stylesheet">
  <link href="style/bootstrap.min.css" rel="stylesheet">
  <link href="style/fontawesome.min.css" rel="stylesheet">
  <link href="style/icon.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/login.css">
</head>
<body>

<div class="header1">
<div class="social">
<ul>

        <li><i class="fa fa-phone">+25111 618 5510</i></li>
		    <li><i class="fa fa-envelope"></i>Harbumfi@gmail</li>
        
       </ul>
	<ul id="login">
	<li>
	
	</li>
	</ul>
	  <div class="topnav-right">
	  <ul>
	 
 <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
	  </ul>
    
  </div>
</div>


  
<div class="hlogo">
<img src="img/logo.png" />
</div>
<center>
<div class="harbuhead">
<h1>ሀርቡ ማይክሮ ፋይናንስ ኢንስቲቲውት አ.ማ <br>
Harbu Microfinance Institute S.C</h1>
</div>
</center>


</div>

	
<div class="main">

<div class="hr">
</br>
</br>
<form name="addpost" method="post" enctype="multipart/form-data">
<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Apply Here <span class="text-danger"><?php if (isset($sucessmsage)) echo $sucessmsage; ?></span></legend>
					
					<div class="form-group">
            <label for="job">Job Title</label>
            <select class="custom-select" name="position" id="">
              <?php
              $result = mysqli_query($conn, "SELECT Job_Title FROM Vacancy");
             ?>
              <?php
             while($row =mysqli_fetch_assoc($result)){
             ?>
              <option><?php echo $row['Job_Title'];?></option>
              <?php }?>
            </select>
          </div>

					<div class="form-group">
						<label for="name">Full Name</label>
                           <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                          <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					<div class="form-group">
						<label for="name">Phone</label>
                           <input type="text" name="mobile" class="form-control" value="" maxlength="14" required="">
                          <span class="text-danger"><?php if (isset($phone_error)) echo $phone_error; ?></span>
					</div>
					
					<div class="form-group">
						<label>Email</label>
                          <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                           <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>
					

					<div class="form-group">
						<label for="name">date of Birth</label>
						<input type="date" name="dob" required="">
						</div>
						<div class="form-group">
                   <label>Gender</label>
				   <select name="gender">
			            <option value="M">Male</option>
						<option value="F">Female</option>
						
						</select>
      
                    <span class="text-danger"><?php if (isset($gender_error)) echo $gender_error; ?></span>
                      </div>
					<div class="form-group">
						<label for="name">Address</label>
						<input type="text" name="address" required class="form-control" />
						<span class="text-danger"><?php if (isset($address_error)) echo $address_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Field of Study</label>
						<input type="text" name="fos" required class="form-control" />
						<span class="text-danger"><?php if (isset($edu_error)) echo $edu_error; ?></span>
					</div>
					<div class="form-group">
						<label for="name">Educational Level</label>
						<select name="edu">
			            <option value="">Masrers Ande Above</option>
						<option value="">Degree</option>
						<option value="">Diploma</option>
						<option value="">Level 4</option>
						<option value="">Level 3</option>
						<option value="">Level 2</option>
						<option value="">Level 1</option>
						<option value="">grade 10</option>
						<option value="">grade  12</option>
						<option value="">below grade 10</option>
						</select>
					</div>
                     <div class="form-group">
						<label for="name">CV</label>
						<input type="file" name="postimage" required" />
						<span class="text-danger"><?php if (isset($file_error)) echo $file_error; ?></span>
						
					</div>
					<div class="form-group">
						<label for="name">Application Letter</label>
						<textarea name="application" class="form-control" value=""  required="" cols="25" rows="10"></textarea>
						<span class="text-danger"><?php if (isset($file_error)) echo $file_error; ?></span>
						
					</div>
					 
					<div class="form-group">
          <button type="submit" class="btn btn-sm btn-primary" name="submit">Apply</button>
     
        </div>
				</fieldset>
			</form>
                                    </div>
                                
      

</div>


<div class="footer">

<div class="banners">
        <div class="container clearfix">

          <div class="banner-award">
            <span>Award winner</span><br>Aurope Microfinance awards 2010
          </div>

       <div class="banner-social">
		  <a href="http://t.me/Harbu MFI" class="banner-social__link">
            <i class="fa fa-telegram"></i>
          </a>
            <a href="https://www.facebook.com/groups/745701727261471" class="banner-social__link">
            <i class="fa fa-facebook"></i>
          </a>
            <a href="https://twitter.com/Harbu25136" class="banner-social__link">
            <i class="fa fa-twitter"></i>
          </a>
            <a href="http://youtube.com/HarbuMFI" class="banner-social__link">
            <i class="fa fa-youtube"></i>
          </a>

          </div>

        </div>
      </div>
<div class="copy">
<center>
        <p>Copyright &copy; 2022 Harbu Microfinance||Designed by Harbumfi MIS Department  </p>    
        
	</center> 
	</div>
<div class="contactman">
<a href="tel:0909" class="banner-social__link">
            	<i class="fa fa-whatsapp"></i>
          </a>
</div>
</div>
</div>
</body>
</html>

