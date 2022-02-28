<?php
  if($user = Auth::get_user()){
    $cartModel = new Cart();
    $amount = $cartModel->getAmountItems($user->id);
  }
?>

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

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=ASSETS?>/css/main.css">


</head>
<body>
  
<header>
    <div class="sign-in-bar">
      <a href="<?=ROOT?>" class="logo">
        <img  src="<?=ASSETS?>/images/logo.png" alt="mobile me logo">
      </a>
      <?php if($user = Auth::get_user()):?>
        
          <div class="dropdown user-drop">
            
            <a class=" " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?=ASSETS?>/images/users/<?=$user->image?>" width="50px" height="50px" style="border-radius: 50%;"  alt="user">
            </a>
            
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#"><?=$user->first_name?></a></li>
              <li> <?= $user->is_admin ? "<a class=dropdown-item href=".ROOT."/admin>Admin Panel</a>" : '' ?></li>
            <li>
                <a href="<?=ROOT?>/cart" class="dropdown-item"> My cart( <span><?=$amount > 0 ? $amount : ''?> )</span>
                </a>
            </li> 
            <hr>
              <li> <a class="dropdown-item" href="<?=ROOT?>/user/logout">logout</a></li>
            </ul>
          </div>
          <div class="cart me-5">
            <a href="<?=ROOT?>/cart"><i style="font-size: 2rem;" class="fa-solid fa-cart-shopping cart-logo"></i></a>
            <p class="badge"><?=$amount > 0 ? $amount : ''?></p>

          </div>
        <?php else:?>
            <a href="<?=ROOT?>/signin">Sign-in</a>
        <?php endif;?>
    </div>


    <nav class="navbar my-navbar " role="navigation" aria-label="main navigation">
      
      <div class="navbar-brand">
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu ">
        <div class="navbar-start my-links">
          <a href="<?=ROOT?>/smartphones" class="navbar-item">SmartPhones</a>
          <a href="<?=ROOT?>/watches" class="navbar-item">Watches</a>
          <a href="<?=ROOT?>/accessories" class="navbar-item">Accessories</a>
          <a href="<?=ROOT?>/sales" class="navbar-item">Sales</a>
          <a class="navbar-item">New</a> 
        </div>
      </div>

    </nav>

</header>

    <main class="main">
     