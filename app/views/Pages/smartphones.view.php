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
      <h1 class="main-title">SmartPhones & Accessories</h1>
    </div>
  </div>


  <div class="page-content-container">
    
      <div class="page-filter">
        <h3>Select Brand</h3>
          <?php foreach($brands as $brand):?>
            <div>
             <a href="<?=ROOT?>/smartphones/<?=$brand->title?>">
               <img src="<?=ASSETS?>/images/brands/<?=$brand->image?>" width="50px" alt="">  
            </a> 
            </div>
          <?php endforeach;?>
      </div>

      <div class="page-content">
        <?php if(count($products) > 0): ?>
          <?php foreach($products as $row):?>
            <div class="product-card">
                <div class="product-image">
                  <a href="<?=ROOT?>/smartphones/<?=str_replace(' ','-',strtolower($row->brand_title))?>/<?=str_replace(' ','-',strtolower($row->title))?>/">
                    <img src="<?=ASSETS?>/images/products/<?=$row->main_image?>"  alt="">
                  </a>
                </div>
                <div class="product-data">
                    <h3><?=$row->title?></h3>
                    <h6>$<?=$row->price?></h6>
                    <button class="button is-info add-to-cart-btn"><i class="fas fa-cart-plus"></i></button>
                </div>
            </div>
          <?php endforeach;?>  
        <?php endif; ?>
      </div>

  </div>







  <?php
    $this->view('includes/footer');    

?>

