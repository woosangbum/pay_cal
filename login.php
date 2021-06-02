<!DOCTYPE html>
<html lang="eg">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="CSS/style.css" type="text/css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="shortcut icon" href="image/paypal.png" />
  <link
    href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap"
    rel="stylesheet"
  />
  <title>Calculate wages | Auto Pay</title>
  <script
    src="https://kit.fontawesome.com/faa41a920e.js"
    crossorigin="anonymous"
  ></script>
</head>
<body>
  <?php
  include "library/nav_out.php";
  include "library/nav.php";
  include "library/lib.php";
  ?>

  <main class="contents-login">
    <div class="contents-login__logo">
      <i class="fab fa-paypal"></i>
    </div>
    <div class="contents-login__area">
      <header class="contents-login__area__welcome">
        <h1>Log in to Auto Pay</h1>
        <p>If you have Auto Pay Acoount, log in with your ID and Password</p>
      </header>

      <form class="contents-login__area__input" action="loginproc.php" method="post">
        <label for="contents-login__area__input__login"
          >User ID
          <input class="contents-login__area__input__text" type="text" name="uid" />
        </label>

        <label for="contents-login__area__input__login"
          >Password
          <input
            class="contents-login__area__input__text"
            type="password"
            name="password"
          />
        </label>

        <input
          class="contents-login__area__input__submit"
          type="submit"
          value="Log In"
        />
      </form>
    </div>
  </main>

  <?php include "library/footer.php"; ?>

  <script src="src/nav.js"></script>
</body>
</html>
