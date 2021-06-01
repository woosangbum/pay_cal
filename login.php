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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculate wages | Auto Pay</title>
  <script
    src="https://kit.fontawesome.com/faa41a920e.js"
    crossorigin="anonymous"
  ></script>
</head>
<body>
<?php include "library/nav_out.php"; ?>
  <main class="main-login">
    <div class="loginPage-logo">
      <i class="fab fa-paypal"></i>
    </div>
    <div class="form-area">
      <header class="form-area__header-welcome">
        <h1 class="form-area__header-welcome__title">Log in to Auto Pay</h1>
        <p class="form-area__header-welcome__text">
          If you have Auto Pay Acoount, log in with your ID and Password.
        </p>
      </header>

      <form class="form-area__input" action="loginproc.php" method="post">
        <label for="form-area__input__login"
          >User ID
          <input class="form-area__input__text" type="text" name="uid" />
        </label>

        <label for="form-area__input__login"
          >Password
          <input
            class="form-area__input__text"
            type="password"
            name="password"
          />
        </label>

        <input
          class="form-area__input__submit"
          type="submit"
          value="Log In"
        />
      </form>
    </div>
  </main>
  <?php include "library/footer.php"; ?>
  </body>
</html>
