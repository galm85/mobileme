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
      <a href="<?=ROOT?>/iphone_13" class="button is-info " style="margin-left:20px;text-decoration: none;">GET NOW</a>
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
            <div class="col-2 mx-1 product-card">
                <a href="<?=ROOT?>/smartphones/<?=str_replace(' ','-',strtolower($row->brand_title))?>/<?=str_replace(' ','-',strtolower($row->title))?>/">
                  <div class="product-card-image">
                    <img src="<?=ASSETS?>/images/products/<?=$row->main_image?>" width="100%"  alt="">
                  </div>
                  <div class="product-card-data">
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
                <h5 class="text-center">Sign-in to our news letter</h5>
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
                        <button type="button" id="newsLetterBtn" class="btn btn-outline-primary">Sign</button>
                      </div>
                    </div>

                  </form>
              </div>
            </div>

          

          </div>
  </section>

  <div class="notification is-info " id="newsLetterNote">
              <button class="closeNote" style="position:absolute;top:10px;right: 10px;">X</button>
                <h5 class="text-center font-bold"> Thank you for signing to our news letter</h5>
                <p class="text-center">You will a weekly mail with all of our best salse and event</p>
                <p class="text-center">you can unsubscripe any time</p>
            </div>

<?php $this->view('includes/footer'); ?>


<script>

            const newsLetterBtn = document.getElementById('newsLetterBtn');
            const newsLetterNote = document.getElementById('newsLetterNote');
            const closeNote = document.querySelector('.closeNote');
            
            newsLetterBtn.addEventListener('click',()=>{
              
              newsLetterNote.style.transform ='translateX(0)';
              setTimeout(()=>{
                newsLetterNote.style.transform ='translateX(150%)';
              },4000);
            })

            closeNote.addEventListener('click',()=>{
              newsLetterNote.style.transform ='translateX(150%)';
            })

</script>

