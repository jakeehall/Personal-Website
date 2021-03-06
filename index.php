<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jake Hall - Developer, Designer, and Creator</title>
  <!--FAV ICONS BELOW-->
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="./apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="./apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="./apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="./apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="./apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="./apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="./apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="./apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon-180x180.png" />
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
          <img src="./images/profile/profile_pic.jpg" alt="Picture of Jake Hall"/>
        </profile-pic>
        <name-badge>
          <my-name>Jake Hall</my-name>
          <my-occupation>Developer</my-occupation>
        </name-badge>
        <ul>
          <li><a href="#about">About</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#resume">Resume</a></li>
          <li><a href="#hire-me">Hire Me</a></li>
          <li>
            <a href="https://github.com/jakeehall" title="GitHub" target="_blank"><img src="images/nav/github_mark.png" alt="GitHub"/></a>
            <a href="https://bitbucket.org/jakeehall/" title="BitBucket" target="_blank"><img src="images/nav/bitbucket_mark.png" alt="BitBucket"/></a>
            <a href="https://www.linkedin.com/in/jakeehall" title="LinkedIn" target="_blank"><img src="images/nav/linkedin_mark.png" alt="LinkedIn"/></a>
          </li>
        </ul>
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
        <?php include './sections/hire-me/hire-me.php';?>
      </section>
      <footer>
        <website-credits>Created and Designed by Jake Hall</website-credits>
        <a href="#top">Top</a>
      </footer>
    </main-content>
  </page-container>
</body>
</html>
