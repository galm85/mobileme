<?php $this->view('includes/header'); ?>

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

      <div class="row mt-5" >
          <div class="col-12">
            <h2 class="display-5 text-center text-primary">Explore Best Deals on SmartPhones</h2>
          </div>
      </div>
      
      <div class="row my-5 justify-content-between" id="sales-phones-div" style="transform:translateX(150%);transition:all ease 2s">
        <?php if($sales):?>
          <?php foreach($sales as $row):?>
            <div class="col-2 mx-1 home-card">
                <a href="<?=ROOT?>/smartphones/<?=str_replace(' ','-',strtolower($row->brand_title))?>/<?=str_replace(' ','-',strtolower($row->title))?>/">
                  <div class="home-card-image">
                    <img src="<?=ASSETS?>/images/products/<?=$row->main_image?>" width="100%"  alt="">
                  </div>
                  <div class="home-card-data">
                    <h6><?=$row->title?></h6>
                    <p>$ <?=$row->on_sale? $row->sale_price : $row->price ?></p>
                  </div>
                </a>
                
            </div>
          <?php endforeach;?>
        <?php endif;?>
      </div>

      <hr>

      <div class="row mt-5" >
          <div class="col-12">
            <h2 class="display-5 text-center text-primary">Explore Our Now SmartPhones</h2>
          </div>
      </div>
      
      <div class="row my-5 justify-content-between"  id="new-phones-div" style="transform:translateX(-150%);transition:all ease 2s">
        <?php if($new):?>
          <?php foreach($new as $row):?>
            <div class="col-2 mx-1 home-card">
                <a href="<?=ROOT?>/smartphones/<?=str_replace(' ','-',strtolower($row->brand_title))?>/<?=str_replace(' ','-',strtolower($row->title))?>/">
                  <div class="home-card-image">
                    <img src="<?=ASSETS?>/images/products/<?=$row->main_image?>" width="100%"  alt="">
                  </div>
                  <div class="home-card-data">
                    <h6><?=$row->title?></h6>
                    <p>$ <?=$row->on_sale? $row->sale_price : $row->price ?></p>
                  </div>
                </a>
                
            </div>
          <?php endforeach;?>
        <?php endif;?>
      </div>









    </div>  
  </section>



  <section class="my-5 py-5 " id="news-letter-container"style="transform:translateX(150%);transition:all ease 1s;background-color:rgba(0,0,0,0.05)" >
          <div class="container">
            
            <div class="row">
              <div class="col-12">
                <h3 class="text-center">Stay Update</h3>
                <h5 class="text-center">Sign-in o our news letter</h5>
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-md-4">
              
                  <form class="news-letter-form">
                  
                    <div class="row mt-5">
                      <div class="col-12">
                        <input type="text" class="input is-info" placeholder="Full Name">
                      </div>
                    </div>
                  
                    <div class="row mt-3">
                      <div class="col-12">
                        <input type="email" class="input is-info" placeholder="Email">
                      </div>
                    </div>
                  
                    
                    <div class="col-12 mt-5">
                      <div class="text-center">
                        <button class="btn btn-outline-primary">Sign</button>
                      </div>
                    </div>

                  </form>
              </div>
            </div>


          </div>
  </section>



<?php
    $this->view('includes/footer');    

?>

