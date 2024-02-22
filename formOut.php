<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // echo "<pre>";
  // print_r($_POST);
  // exit;
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $websiteErr = "* website is required";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// if($nameErr || $emailErr || $genderErr || $websiteErr ){


//   header(
//     'location:formIn.php?error=&nameErr='.$nameErr.'&emailErr='.$emailErr.'&websiteErr='.$websiteErr.'&genderErr='.$genderErr.'&name='.$name.'&email='.$email.'&website='.$website.'&gender='.$gender.'&comment='.$comment.'' 
    
//   ); 
// }

if($nameErr || $emailErr || $genderErr || $websiteErr ){

  $str =  '&nameErr='.$nameErr .'&emailErr='.$emailErr.'&websiteErr='.$websiteErr.'&genderErr='.$genderErr.'&name='.$name.'&email='.$email.'&website='.$website.'&gender='.$gender.'&comment='.$comment.'';

  $encodedString = base64_encode($str);
  
  header('location:formIn.php?error='. $encodedString);
}
  
?>
  
  <!-- You can add any further processing logic here if needed -->
  <h2>Form Submission Result</h2>

  <p>Name: <?php echo $name; ?></p>
  <p>Email: <?php echo $email; ?></p>
  <p>webiste: <?php echo $website; ?></p>
  <p>Comment: <?php echo $comment; ?></p>
  <p>Gender: <?php echo $gender; ?></p>

