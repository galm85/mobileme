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
    <link rel="stylesheet" href="<?=ASSETS?>/css/admin.css">


</head>
<body>

    <header class="d-flex flex-wrap justify-content-center py-3 border-bottom">
      <a href="<?=ROOT?>/admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Admin Panel</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?=ROOT?>" class="nav-link active" aria-current="page">Back To Site</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
      </ul>
    </header>




    <div class="container-fluid ">
        <div class="row p-0">
            <div class="col-1 p-0  admin-nav">
                <a href="<?=ROOT?>/admin/products">Prodcuts</a>
                <a href="<?=ROOT?>/admin/brands">Brands</a>
                <a href="<?=ROOT?>/admin/categories">Categories</a>
                <a href="<?=ROOT?>/admin/orders">Orders</a>
            </div>
            <div class="col-11 m-0 p-0">

             






