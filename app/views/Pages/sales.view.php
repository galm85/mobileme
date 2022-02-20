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
      <h1 class="main-title">Sales</h1>
    </div>
  </div>


  <div class="container">
    
      <div class="row mt-5">
        


        <div class="col-12">
            <div class="row justify-space-between">
                <?php if(count($products) > 0): ?>
                  <?php foreach($products as $row):?>
                    <div class="col-md-2 product-card  p-0">
                        
                        <div class="product-image">
                          <a href="<?=ROOT?>/smartphones/<?=str_replace(' ','-',strtolower($row->brand_title))?>/<?=str_replace(' ','-',strtolower($row->title))?>/">
                            <img src="<?=ASSETS?>/images/products/<?=$row->main_image?>"  alt="">
                          </a>
                        </div>
                        
                        <div class="product-data">
                            <h5><?=$row->title?></h5>
                            <h6>$<?=$row->price?></h6>
                            <button class="button is-info add-to-cart-btn"><i class="fas fa-cart-plus"></i></button>
                        </div>

                    </div>
                  <?php endforeach;?>  
                <?php endif; ?>

          </div>

        </div>



      </div>
     
  </div>







  <?php
    $this->view('includes/footer');    

?>

