<?php
    $this->view('includes/header');    
    

?>
<style>
  .main-banner{
    width: 100%;
    height: 50vh;
    position: relative;
  }
  .main-banner img{
    height: 100%;
    width: 100%;
    object-fit: cover;
  }

  .banner-data{
    position:absolute;
    top:50%;
    left:10%;
    font-size: 3rem;
    transform:translateY(-50%);
    display: flex;
    align-items: center;
  }

  
</style>


<div class="main-banner">
    <img src="<?=ASSETS?>/images/mainBanner.png"  alt="iphone 13 banner">
    <div class="banner-data">
      <h1 class="main-title display-2 ms-5 font-black" style="color:var(--main-color);">Register</h1>
      
    </div>
  </div>



  <div class="container">
      <div class="row justify-content-center">
          <div class="col-8">
              <form action="" method="POST" enctype="multipart/form-data">

              <div class="row my-3">
                  <div class="col-6">
                      <label for="first_name">First Name</label>
                      <input type="text" class="<?=isset($errors['first_name']) ? 'input is-danger' : 'input is-info' ?>" name="first_name" id="first_name" value="<?=Helpers::get_old_value('first_name')?>">
                      <?= isset($errors['first_name']) ? "<span class='text-danger'>* ".$errors['first_name']."</span>" : ""  ?>
                  </div>
                  <div class="col-6">
                      <label for="last_name">Last Name</label>
                      <input type="text" class="<?=isset($errors['last_name']) ? 'input is-danger' : 'input is-info' ?>" name="last_name" id="last_name" value="<?=Helpers::get_old_value('last_name')?>" >
                      <?= isset($errors['last_name']) ? "<span class='text-danger'>* ".$errors['last_name']."</span>" : ""  ?>
                  </div>
              </div>

              <div class="row my-3">
                  <div class="col-12">
                      <label for="email">Email</label>
                      <input type="text" class="<?=isset($errors['email']) ? 'input is-danger' : 'input is-info' ?>" name="email" id="email" value="<?=Helpers::get_old_value('email')?>">
                      <?= isset($errors['email']) ? "<span class='text-danger'>* ".$errors['email']."</span>" : ""  ?>

                  </div>
              </div>

              <div class="row my-3">
                  <div class="col-6">
                      <label for="password">Password</label>
                      <input type="password" class="<?=isset($errors['password']) ? 'input is-danger' : 'input is-info' ?>" name="password" id="password">
                      <?= isset($errors['password']) ? "<span class='text-danger'>* ".$errors['password']."</span>" : ""  ?>

                  </div>
                  <div class="col-6">
                      <label for="confirm">Confirm Password</label>
                      <input type="password" class="<?=isset($errors['confirm']) ? 'input is-danger' : 'input is-info' ?>" name="confirm" id="confirm">
                      <?= isset($errors['confirm']) ? "<span class='text-danger'>* ".$errors['confirm']."</span>" : ""  ?>

                  </div>
              </div>

              <div class="row my-3">
                  <div class="col-12">
                      <label for="address">Address</label>
                      <input type="text" class="<?=isset($errors['address']) ? 'input is-danger' : 'input is-info' ?>" name="address" id="address" value="<?=Helpers::get_old_value('address')?>">
                      <?= isset($errors['address']) ? "<span class='text-danger'>* ".$errors['address']."</span>" : ""  ?>

                  </div>
            </div>
            <div class="row my-3">
                  <div class="col-12">
                      <label for="phone">Phone</label>
                      <input type="text" class="<?=isset($errors['phone']) ? 'input is-danger' : 'input is-info' ?>" name="phone" id="phone" value="<?=Helpers::get_old_value('phone')?>">
                      <?= isset($errors['phone']) ? "<span class='text-danger'>* ".$errors['phone']."</span>" : ""  ?>

                  </div>
              </div>


              <div class="row my-3">
                  <div class="col-6">
                  <label class="file-label">
                            <input class="file-input" id="uploadUserImageInput" type="file" name="image" >
                            <span class="file-cta">
                                <span class="file-icon"><i class="fas fa-upload"></i></span>
                                <span class="file-label">Upload Image</span>
                            </span>
                        </label>  
                  </div>

                  <div class="col-2" id="user-image-upload"></div>

              </div>

              <hr class="my-5">

              <div class="row my-5">
                  <div class="text-center col-12">
                      <button type="submit" name="submit" class="button is-info">Register</button>
                    </div>
                    
                </div>

              </form>
          </div>
      </div>

      <div class="row">
        <div class="col-12 text-center">
          <p>Already have an account? <a href="<?=ROOT?>/register">Sign In</a></p> 
        </div>
      </div>
  </div>






<?php
    $this->view('includes/footer');    

?>

