<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="CSS/style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Kokoa Clone</title>
  </head>
  <body>

    <header class="welcome-header">
      <h1 class="welcome-header__title">Welcome to Kakao Clone</h1>
      <p class="welcome-header__text">
        If you have Kokoa Acoount, log in with your email or phone number.
      </p>
    </header>

    <form action="loginproc.php" method="post">
      <input type="text" name="email"  placeholder="Email or phone number" />
      <input type="password" name="password"  placeholder="Password" />
      <input type="submit" value="Log In" />
  </form>  
    <script
      src="https://kit.fontawesome.com/faa41a920e.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>