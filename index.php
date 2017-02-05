<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jacob Hall - Developer, Designer, and Creator</title>
  <!--STYLE SHEETS BELOW-->
  <link href="./stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <!--JAVASCRIPS BELOW, JQUERY FIRST-->
  <script src="./javascripts/jquery-3.1.1.min.js"></script>
  <script src="./javascripts/script.js"></script>
</head>
<body>
  <page-container>
    <navbar id="nav">
      <navbar-container>
        <profile-pic>
          <img src="./images/profile/profile_pic.jpg" alt="Pic of Jake"/>
        </profile-pic>
        <name-badge>
          <my-name>Jake Hall</my-name>
          <my-occupation>Developer</my-occupation>
        </name-badge>
        <?php include './nav-items.php';?>
      </navbar-container>
    </navbar>
    <main-content>
      <section id="about">
        <?php include './sections/about.php';?>
      </section>
      <section id="projects">
        <?php include './sections/projects.php';?>
      </section>
      <section id="resume">
        <?php include './sections/resume.php';?>
      </section>
      <section id="hire-me">
        <?php include './sections/hire-me.php';?>
      </section>
      <footer>
        <website-credits>Created and Designed by Jacob Hall</website-credits>
        <a href="#top">Top</a>
      </footer>
    </main-content>
  </page-container>
</body>
</html>
