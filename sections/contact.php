<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--STYLE SHEETS BELOW-->
    <link href="../stylesheets/form.css" media="screen, projection" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <form action="contact.php" method="post">
      <p>Full Name:</p>
      <input type="text" name="fullname" required>
      <p>Company:</p>
      <input type="text" name="company" required>
      <p>Email:</p>
      <input type="email" name="email" required>
      <p>Phone Number:</p>
      <input type="tel" name="phoneNumber" required>
      <p>Job Type:</p>
      <select name="jobType">
        <option value="software">Software Developer / Software Engineer</option>
        <option value="fullStack">Full-Stack Web Developer</option>
        <option value="UI">UI/UX Front End Design</option>
        <option value="QA">QA Testing</option>
        <option value="other">Other</option>
      </select>
      <p>Job Details:</p>
      <textarea name="message" rows="12" required></textarea>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
