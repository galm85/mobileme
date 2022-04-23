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
                    <div class="col-3  product-card mb-5">
                        <a href="<?=ROOT?>/watches/<?=str_replace(' ','-',strtolower($row->brand_title))?>/<?=str_replace(' ','-',strtolower($row->title))?>/">
                            
                            <div class="product-card-image">
                              <img src="<?=ASSETS?>/images/products/<?=$row->main_image?>" width="100%"  alt="">
                            </div>
                            
                            <div class="product-card-data ps-3">
                              <h6><?=$row->title?></h6>
                              <?php if($row->on_sale):?>
                                <p>
                                  <span style="text-decoration: line-through;">$<?=$row->price?></span>
                                <br>  
                                $<?=$row->sale_price?>
                                </p>
                                <?php else:?>
                                  <p>$ <?=$row->price ?></p>
                              <?php endif;?>

                            </div>
                            
                        </a>
                        <?php if(!$row->on_stock):?>
                          <div class="not-available">
                            <p>out of stock</p>
                          </div>
                        <?php endif;?>
                
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

