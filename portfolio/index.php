<?php
 // <-- Här öppnar vi PHP-taggen.

if (isset($_POST['submit'])) { // Här kollar vi om "Skicka"-knappen är klickad och vad som ska hända efter att den är klickad.

  // Kollar ifall förnamnet INTE är ifyllt och ger isåfall ett felmeddelande till användaren.
  if (!$_POST['firstName']) {
    $error = "- Please enter your first name.";
  }

  // Kollar ifall efternamnet INTE är ifyllt och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['lastName']) {
    $error = "<br>- Please enter your last name.";
  }

  // Kollar ifall e-postadressen INTE är ifylld och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['email']) {
    $error .= "<br>- Please enter your email adress.";
  }

  // Kollar ifall meddelandet INTE är ifyllt och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['message']) {
    $error .= "<br>- Please enter your message.";
  }

  // Kollar ifall svaret är något annat än 5 och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (intval($_POST['human']) !== 5) {
    $error .= "<br>- Please verify your not a robot.";
  }

  // Här kollar vi ifall det finns några fel och om det finns så skriver vi ut dem åt användaren.
  if ($error) {
    $result = "Oh no! An Error! Please correct the following: $error";
  }

  // Skickar mejlet ifall alla fält är ifyllda och inga fel finns.
  else {

    // PHPs mailfunktion.
    mail(
      "william.blomqvist@optistud.fi", // <-- Adressen dit mejlet skickas
      "Subject line", // <-- Mejlets ämnesrad.
      "Name: " .$_POST['firstName']. // <-- Det användaren har angett som förnamn i formuläret.
      "\r\nEmail: " .$_POST['email']. // <-- Det användaren har angett som e-postadress i formuläret. \r\n gör radbrytningar i själva mejlet.
      "\r\nMessage: " .$_POST['message'] // <-- Det användaren har angett som meddelande i formuläret. \r\n gör radbrytningar i själva mejlet.
    );

    // Texten som visas efter att mejlet skickats.
    {
      $result = "Thank you! I will be in touch shortly.";
    }
  }
}

?> <!-- Här avslutar vi PHP-taggen. -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="Description" CONTENT="Online Portfolio for William Blomqvist">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>William | Blomqvist</title>
    <link href="fonta/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <!-- navigation -->
    <nav>
      <a href="#Page1">About</a>
      <a href="#Page2">Projects</a>
      <a href="#Page3">Contact</a>
    </nav>
      <header>

        <h1>Junior Web <u>Developer</u> From Finland</h1>
        <img class="img-fluid" src="img/wibly.png"></img>
      </header>

      <A name="Page1"></a>
      <div class="section">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
          <h1 class="about">About me</h1>
          <p>I'm a 16 years old male from Kokkola, Finland.
            My passion is Programming and Gaming.
            I've been studying programming at a vocational school Optima, since August 2016.
             My plans are to continue my studies at an University after i graduate and
             a dream of mine would be to start a career as a professional Counter-Strike player.</p>
      </div>

        <div class="container">
          <div class="row">

        <div class="language col-md-4 col-xs-12">
          <ul class="deco">
            <h2>Languages</h2>
            <li>Swedish: Very Good</li>
            <li>Finnish: Very Good</li>
            <li>English: Good</li>
          </ul>
        </div>
        <div class="skills col-md-4 col-xs-12">
          <ul class="deco">
            <h2>Skills</h2>
            <li>HTML: Experienced</li>
            <li>jQuery: Beginner</li>
            <li>Bootstrap: Proficient</li>
            <li>PHP: Intermediate</li>
            <li>JavaScript: Familiar</li>
            <li>CSS: Experienced</li>
          </ul>
        </div>
      </div>


      <a name="Page2"></a>

      <div class="row">
        <h1 class="underline">Projects</h1>
        <div class="y1 cl-md-5  cl-xs-10">
          <a href="http://wblomqvist.optipoint.fi/game/" target="_blank"><img src="img/pic1.png" class="pic1"></img></a>
          <p class="small">Pong Game. This is my first game made with canvas. I'm really proud of this game. In the future i hopefully do more games but using proper tools for it. If you wanna check it out, press the picture.</p>
        </div>

        <div class="y1">
          <a href="http://wblomqvist.optipoint.fi/webb/" target="_blank"><img src="img/pic2.jpg" class="pic2"></img></a>
          <p class="small">Website Page. This is one of my first 'proper' Websites and I'm happily proud of this site because i had been programming for only about 1 month. If you wanna check the site, press the picture.</p>
        </div>

        <div class="y1">
          <a href="http://wblomqvist.optipoint.fi/ovning1/" target="_blank"><img src="img/pic4.jpg" class="pic1"></img></a>
          <p class="small">Info Page. This page is an Info site i made. It was a school exercise, that helped me to understand how div tags work. In my opinion i made this page look really cool and if you wanna check it out, press the picture.</p>
        </div>

      </div>
      </div>


      <a name="Page3"></a>
      <h2 class="contact"><u>Contact Me!</u></h2>
      <!-- Contact Form -->
      <form method="post">
        <?php echo $result; ?>
        <input type="text" name="firstName" placeholder="First name">
        <input type="text" name="lastName"placeholder="Last name">
        <input type="email" name="email" placeholder="E-mail">
        <textarea rows="10" name="message" placeholder="Your message..."></textarea>
        <!-- Nytt anti-spam fält som kollar ifall användaren räknat rätt. -->
        <input type="text" name="human" placeholder="What is 3 + 2?">
        <input class="submit" type="submit" name="submit" value="Submit">
      </form>

      <h3 class="soc">Follow me on Social Media!</h3>
      <div class="media">
        <a href="https://www.instagram.com/wiblyy/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="https://www.facebook.com/william.blomqvist.10" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
        <a href="https://github.com/Wibly" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
      </div>
      <div class="strek">
      </div
      <!--FOOTER-->
      <footer>&copy; <?php  echo date('Y'); ?></footer>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="css/bootstrap.min.js"></script>
  </body>

</html>
