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
    left:30%;
    font-size: 3rem;
    transform:translateY(-50%);
    display: flex;
    align-items: center;
  }

  .banner-data h1{
    
  }

  
</style>


  <div class="main-banner">
    <img src="<?=ASSETS?>/images/accessoriesBanner.png"  alt="iphone 13 banner">
    <div class="banner-data">
      <h1 class="main-title text-light display-1 fw-bold">Accessories</h1>
    </div>
  </div>


  <div class="container">
    
      <div class="row mt-5">
        
        <div class="col-2 border-end">
            <h3 class="text-center">Select Brand</h3>
            <hr>
            <div class="brand-filter"><a href="<?=ROOT?>/accessories" >ALL</a> </div>
            <?php foreach($brands as $brand):?>
              <div class="brand-filter">
                <a href="<?=ROOT?>/accessories/<?=$brand->title?>">
                  <img src="<?=ASSETS?>/images/brands/<?=$brand->image?>" alt="">  
                </a> 
              </div>
              <?php endforeach;?>
        </div>
       

        <div class="col-10 ps-5">
            <div class="row justify-space-between">
                <?php if(count($products) > 0): ?>
                  <?php foreach($products as $row):?>
                    <div class="col-md-2 product-card  p-0">
                        
                        <div class="product-image">
                          <a href="<?=ROOT?>/watches/<?=str_replace(' ','-',strtolower($row->brand_title))?>/<?=str_replace(' ','-',strtolower($row->title))?>/">
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

