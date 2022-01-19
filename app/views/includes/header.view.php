<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>

    <!-- Material  -->
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bulma CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?=ASSETS?>/css/main.css">


</head>
<body>
  
<header>
  <div class="sign-in-bar">
    <a href="<?=ROOT?>/sign-in">Sign-in</a>
  </div>
    <nav class="navbar my-navbar " role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
          <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu ">
        <div class="navbar-start my-links">
          <a class="navbar-item">
            SmartPhones & Accessories
          </a>

          <a class="navbar-item">
            Headsets and Watches
          </a>
          <a class="navbar-item">
            Sales
          </a>
          <a class="navbar-item">
            New
          </a>

          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              Headsets and Watches
            </a>

            <div class="navbar-dropdown">
              <a class="navbar-item">
                Computers & Tablets
              </a>
              <a class="navbar-item">
                Accessories
              </a>
              <a class="navbar-item">
                Contact
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item">
                Report an issue
              </a>
            </div>
          </div>
        </div>

        <!-- <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <a class="button is-primary">
                <strong>Sign up</strong>
              </a>
              <a class="button is-light">
                Log in
              </a>
            </div>
          </div>
        </div> -->
      </div>
    </nav>
    </header>

    <main class="main">
     