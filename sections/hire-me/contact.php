<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--STYLE SHEETS BELOW-->
    <link href="../../stylesheets/form.css" media="screen, projection" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <?php
      $error = true;
      $fullName = $company = $email = $phoneNumber = $jobType = $details = "";
      $fullnameValidity = $companyValidity = $emailValidity = $phoneNumberValidity = $detailsValidity = "";

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = false;

        if (empty($_POST["fullName"])) {
          $fullnameValidity = "invalid";
          $error = true;
        } else {
          $fullName = test_input($_POST["fullName"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[-a-zA-Z ]*$/", $fullName)) {
            $fullnameValidity = "invalid";
            $error = true;
          }
        }

        if (empty($_POST["company"])) {
          $companyValidity = "invalid";
          $error = true;
        } else {
          $company = test_input($_POST["company"]);
          // check if name only contains letters, numbers, dashes, and whitespace
          if (!preg_match("/^[-a-zA-Z \d]*$/", $company)) {
            $companyValidity = "invalid";
            $error = true;
          }
        }

        if (empty($_POST["email"])) {
          $emailValidity = "invalid";
          $error = true;
        } else {
          $email = test_input($_POST["email"]);
          //use PHP's built in email validation function
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailValidity = "invalid";
            $error = true;
          }
        }

        if (empty($_POST["phoneNumber"])) {
          $phoneNumberValidity = "invalid";
          $error = true;
        } else {
          $phoneNumber = preg_replace("/[^0-9]/", "", $_POST["phoneNumber"]);
          //strip everything from phoneNumber that is not a number, then check length
          if (strlen($phoneNumber) < 10) {
            $phoneNumberValidity = "invalid";
            $error = true;
          }
        }

        $jobType = $_POST["jobType"];
        if ($jobType == "software") {
          $jobType = "Software Developer/Engineer";
        } else if ($jobType == "fullStack") {
          $jobType = "Full-Stack Developer";
        } else if ($jobType == "UI") {
          $jobType = "UI/UX Front End Design";
        } else if ($jobType == "QA") {
          $jobType = "QA Testing";
        } else {
          $jobType = "Other Job Type";
        }

        if (empty($_POST["message"])) {
          $detailsValidity = "invalid";
          $error = true;
        } else {
          $details = test_input($_POST["message"]);
        }

        if (!$error) {
          require_once '../../swiftmailer/swift_required.php';

          $transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUsername("jakeehall@gmail.com")
            ->setPassword("xdiujzrrjypyqezq");

          $mailer = Swift_Mailer::newInstance($transporter);

          $mailMessage =  "Name: " . $fullName . "\r\n" .
                          "Company: " . $company . "\r\n" .
                          "Job Type: " . $jobType . "\r\n" .
                          "Email: " . $email . "\r\n" .
                          "Phone Number: " . $phoneNumber . "\r\n" .
                          "\r\n" .
                          $details;

          $message = Swift_Message::newInstance()
              ->setSubject($company . " " . $jobType)
              ->setFrom(array($email => $fullName))
              ->setTo(array('jakeehall@gmail.com' => 'Jake Hall'))
              ->setBody($mailMessage);

          $error = !$mailer->send($message);
        }
      }

      if($error) {
        include './form.php';
      } else {
        echo '<h1>Your message was <span class="success">successfully</span> sent,<br>thank you for contacting me!</h1>';
      }
    ?>
  </body>
</html>
