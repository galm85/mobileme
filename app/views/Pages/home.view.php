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
      <h1 class="main-title">IPHONE<span class="font-black"> 13 </span>  SERIES</h1>
      <button class="button is-info " style="margin-left:20px">GET NOW</button>
    </div>
  </div>



  <section class="best-cells">
    <div class="container">
      
     

      <div class="row my-5 justify-content-between">
        <?php if($sales):?>
          <?php foreach($sales as $item):?>
            <div class="col-2 mx-1">
                <a href="">
                  <img src="<?=ASSETS?>/images/products/<?=$item->main_image?>" width="100%"  alt="">
                </a>
            </div>
          <?php endforeach;?>
        <?php endif;?>
      </div>



      <div class="row mt-5">
        <div class="col-12">
          <h2 class="display-5 text-center text-primary">Explore Best Sales</h2>
        </div>
      </div>

      <div class="row my-5 justify-content-between bg-light">
        <?php if($sales):?>
          <?php foreach($sales as $item):?>
            <div class="col-2 mx-1">
                <a href="">
                  <img src="<?=ASSETS?>/images/products/<?=$item->main_image?>" width="100%"  alt="">
                </a>
            </div>
          <?php endforeach;?>
        <?php endif;?>
      </div>



    </div>  
  </section>







<?php
    $this->view('includes/footer');    

?>

