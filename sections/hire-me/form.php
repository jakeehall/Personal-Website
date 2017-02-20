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
    <option value="software" <?=$jobType == "software" || $jobType == "" ? ' selected="selected"' : '';?>>Software Developer/Engineer</option>
    <option value="fullStack" <?=$jobType == "fullStack" ? ' selected="selected"' : '';?>>Full-Stack Developer</option>
    <option value="UI" <?=$jobType == "UI" ? ' selected="selected"' : '';?>>UI/UX Front End Design</option>
    <option value="QA" <?=$jobType == "QA" ? ' selected="selected"' : '';?>>QA Testing</option>
    <option value="other" <?=$jobType == "other" ? ' selected="selected"' : '';?>>Other (Not Listed Above)</option>
  </select>
  <p>Job Details:</p>
  <textarea name="message" rows="12" class="<?php echo $messageValidity;?>" required><?php echo $message;?></textarea>
  <input type="submit" value="Submit">
</form>
