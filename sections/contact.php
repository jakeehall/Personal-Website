<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--STYLE SHEETS BELOW-->
    <link href="../stylesheets/form.css" media="screen, projection" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <?php
      $fullName = $company = $email = $phoneNumber = $jobType = $message = "";
      $fullnameValidity = $companyValidity = $emailValidity = $phoneNumberValidity = $messageValidity = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["fullName"])) {
          $fullnameValidity = "invalid";
        } else {
          $fullName = test_input($_POST["fullName"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[-a-zA-Z ]*$/", $fullName)) {
            $fullnameValidity = "invalid";
          }
        }

        if (empty($_POST["company"])) {
          $companyValidity = "invalid";
        } else {
          $company = test_input($_POST["company"]);
          // check if name only contains letters, numbers, dashes, and whitespace
          if (!preg_match("/^[-a-zA-Z \d]*$/", $company)) {
            $companyValidity = "invalid";
          }
        }

        if (empty($_POST["email"])) {
          $emailValidity = "invalid";
        } else {
          $email = test_input($_POST["email"]);
          //use PHP's built in email validation function
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailValidity = "invalid";
          }
        }

        if (empty($_POST["phoneNumber"])) {
          $phoneNumberValidity = "invalid";
        } else {
          $phoneNumber = preg_replace("/[^0-9]/", "", $_POST["phoneNumber"]);
          //strip everything from phoneNumber that is not a number, then check length
          if (strlen($phoneNumber) < 10) {
            $phoneNumberValidity = "invalid";
          }
        }

        $jobType = $_POST["jobType"];

        if (empty($_POST["message"])) {
          $messageValidity = "invalid";
        } else {
          $message = test_input($_POST["message"]);
        }
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <form action="contact.php" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <p>Full Name:</p>
      <input type="text" name="fullName" value="<?php echo $fullName;?>" class="<?php echo $fullnameValidity;?>" required>
      <p>Company:</p>
      <input type="text" name="company" value="<?php echo $company;?>" class="<?php echo $companyValidity;?>" required>
      <p>Email:</p>
      <input type="email" name="email" value="<?php echo $email;?>" class="<?php echo $emailValidity;?>" required>
      <p>Phone Number:</p>
      <input type="tel" name="phoneNumber" value="<?php echo $phoneNumber;?>" class="<?php echo $phoneNumberValidity;?>" required>
      <p>Job Type:</p>
      <select name="jobType">
        <option value="software" <?=$jobType == "software" || $jobType == "" ? ' selected="selected"' : '';?>>Software Developer / Software Engineer</option>
        <option value="fullStack" <?=$jobType == "fullStack" ? ' selected="selected"' : '';?>>Full-Stack Web Developer</option>
        <option value="UI" <?=$jobType == "UI" ? ' selected="selected"' : '';?>>UI/UX Front End Design</option>
        <option value="QA" <?=$jobType == "QA" ? ' selected="selected"' : '';?>>QA Testing / Debugging</option>
        <option value="other" <?=$jobType == "other" ? ' selected="selected"' : '';?>>Other (Not Listed Above)</option>
      </select>
      <p>Job Details:</p>
      <textarea name="message" rows="12" class="<?php echo $messageValidity;?>" required><?php echo $message;?></textarea>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
