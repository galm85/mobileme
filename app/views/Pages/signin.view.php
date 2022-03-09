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
      <h1 class="main-title display-2 ms-5 font-black" style="color:var(--main-color);">Sign In</h1>
      
    </div>
  </div>



  <div class="container">
      
    <?php if(isset($errors['main'])):?>
        <div class="row">
            <div class="col-12">
                <h3 class="text-center"><?=$errors['main']?></h3>
            </div>
        </div>
        <?php endif;?>

      <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6">
              <form action="" method="POST" >

              <div class="row my-3">
                  <div class="col-12">
                      <label for="email">Email</label>
                      <input type="email" class="<?=isset($errors['email']) ? 'input is-danger' : 'input is-info' ?>" name="email" id="email" value="<?=Helpers::get_old_value('email')?>">
                      <?= isset($errors['email']) ? "<span class='text-danger'>* ".$errors['email']."</span>" : ""  ?>
                  </div>
              </div>
              <div class="row my-5">
                  <div class="col-12">
                      <label for="password">Password</label>
                      <input type="password" class="<?=isset($errors['password']) ? 'input is-danger' : 'input is-info' ?>" name="password" id="password" >
                      <?= isset($errors['password']) ? "<span class='text-danger'>* ".$errors['last_name']."</span>" : ""  ?>
                  </div>
              </div>

        

              <hr class="my-5">

              <div class="row my-5">
                  <div class="text-center col-12">
                      <button type="submit" name="submit" class="button is-info">Sign In</button>
                  </div>
                    
                </div>

              </form>
          </div>
      </div>


      <div class="row">
        <div class="col-12 text-center">
          <p>Do not have account yet? <a href="<?=ROOT?>/register">Register</a></p> 
        </div>
      </div>
  </div>






<?php
    $this->view('includes/footer');    

?>

