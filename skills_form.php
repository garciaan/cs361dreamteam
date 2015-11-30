<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
$skillErr = "";
$skill1 = skill2 = skill3 = skill4 = skill5 = skill6 = skill7 = skill8 = skill9 = skill10 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (!empty($_POST["skill1"])) {
     $skill1 = test_input($_POST["skill1"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$skill1)) {
       $skillErr = "Only letters and white space allowed"; 
     }
   }

   if (!empty($_POST["skill2"])) {
     $skill2 = test_input($_POST["skill2"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$skill2)) {
       $skillErr = "Only letters and white space allowed"; 
     }
   }

   if (!empty($_POST["skill3"])) {
     $skill3 = test_input($_POST["skill3"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$skill3)) {
       $skillErr = "Only letters and white space allowed"; 
     }
   }

   if (!empty($_POST["skill4"])) {
     $skill4 = test_input($_POST["skill4"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$skill4)) {
       $skillErr = "Only letters and white space allowed"; 
     }
   }

   if (!empty($_POST["skill5"])) {
     $skill5 = test_input($_POST["skill5"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$skill5)) {
       $skillErr = "Only letters and white space allowed"; 
     }
   }

   if (!empty($_POST["skill6"])) {
     $skill6 = test_input($_POST["skill6"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$skill6)) {
       $skillErr = "Only letters and white space allowed"; 
     }
   }

   if (!empty($_POST["skill7"])) {
     $skill7 = test_input($_POST["skill7"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$skill7)) {
       $skillErr = "Only letters and white space allowed"; 
     }
   }

   if (!empty($_POST["skill8"])) {
     $skill8 = test_input($_POST["skill8"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$skill8)) {
       $skillErr = "Only letters and white space allowed"; 
     }
   }

   if (!empty($_POST["skill9"])) {
     $skill9 = test_input($_POST["skill9"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$skill9)) {
       $skillErr = "Only letters and white space allowed"; 
     }
   }

   if (!empty($_POST["skill10"])) {
     $skill10 = test_input($_POST["skill10"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$skill10)) {
       $skillErr = "Only letters and white space allowed"; 
     }
   }
   

 
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Please Enter Relevant Skills</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

   Skill1: <input type="text" name="skill1" value="<?php echo $skill1;?>">
   <span class="error">* <?php echo $skillErr;?></span>
   <br><br>

   Skill2: <input type="text" name="skill2" value="<?php echo $skill2;?>">
   <span class="error">* <?php echo $skillErr;?></span>
   <br><br>

   Skill3: <input type="text" name="skill3" value="<?php echo $skill3;?>">
   <span class="error">* <?php echo $skillErr;?></span>
   <br><br>

   Skill4: <input type="text" name="skill4" value="<?php echo $skill4;?>">
   <span class="error">* <?php echo $skillErr;?></span>
   <br><br>

   Skill5: <input type="text" name="skill5" value="<?php echo $skill5;?>">
   <span class="error">* <?php echo $skillErr;?></span>
   <br><br>


   Skill6: <input type="text" name="skill6" value="<?php echo $skill6;?>">
   <span class="error">* <?php echo $skillErr;?></span>
   <br><br>

   Skill7: <input type="text" name="skill7" value="<?php echo $skill7;?>">
   <span class="error">* <?php echo $skillErr;?></span>
   <br><br>

   Skill8: <input type="text" name="skill8" value="<?php echo $skill8;?>">
   <span class="error">* <?php echo $skillErr;?></span>
   <br><br>

   Skill9: <input type="text" name="skill9" value="<?php echo $skill9;?>">
   <span class="error">* <?php echo $skillErr;?></span>
   <br><br>


   Skill10: <input type="text" name="skill10" value="<?php echo $skill10;?>">
   <span class="error">* <?php echo $skillErr;?></span>
   <br><br>


</form>

<?php
echo "<h2>Your Skills:</h2>";
echo $skill1;
echo "<br>";
echo $skill2;
echo "<br>";
echo $skill3;
echo "<br>";
echo $skill4;
echo "<br>";
echo $skill5;
echo "<br>";
echo $skill6;
echo "<br>";
echo $skill7;
echo "<br>";
echo $skill8;
echo "<br>";
echo $skill9;
echo "<br>";
echo $skill10;
echo "<br>";
?>

</body>
</html>
