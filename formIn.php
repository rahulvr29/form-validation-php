<!DOCTYPE HTML>  
<html>
<head>
<title>Form Validation</title>
<style>
  
.error {color: #FF0000;}

</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
?>


<?php





// if(isset($_GET['error'])){
//   $nameErr= $_GET["nameErr"];
//   $emailErr= $_GET["emailErr"];
//   $websiteErr= $_GET["websiteErr"];
//   $genderErr= $_GET["genderErr"];
//   $name= $_GET["name"];
//   $email= $_GET["email"];
//   $website= $_GET["website"];
//   $comment= $_GET["comment"];
//   $gender= $_GET["gender"];
// };


// Decode the encoded string from the URL parameter
// if(isset($_GET['error'])){
//   $encodedString = $_GET["error"];
//   $decodedString = base64_decode($encodedString);
  
//   // Extract individual error messages and other variables
//   list($nameErr, $emailErr, $genderErr, $websiteErr, $name, $email, $website, $gender, $comment) = explode('&', $decodedString);
// }

if(isset($_GET['error'])){
  $encodedString = $_GET["error"];
  $decodedString = base64_decode($encodedString);

  //echo $decodedString;

  
  // Extract individual error messages and other variables using parse_str
  parse_str($decodedString, $decodedData);

  // print_r($decodedData);
  // Assign decoded values to respective variables
  $nameErr = $decodedData['nameErr'] ? $decodedData['nameErr'] : "" ;
  $emailErr = $decodedData['emailErr'] ? $decodedData['emailErr'] : "";
  $genderErr = $decodedData['genderErr'] ? $decodedData['genderErr'] : "";
  $websiteErr = $decodedData['websiteErr'] ? $decodedData['websiteErr'] : "";
  $name = $decodedData['name'] ? $decodedData['name'] : "";
  $email = $decodedData['email'] ? $decodedData['email'] : "";
  $website = $decodedData['website'] ? $decodedData['website'] : "";
  $gender = $decodedData['gender'] ? $decodedData['gender'] : "";
  $comment = $decodedData['comment'] ? $decodedData['comment'] : "";
}


?>
<center>
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="formOut.php" >  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <div class="gender">
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  </div>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</center>


</body>
</html>