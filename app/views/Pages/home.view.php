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


  <div class="best-cells">
    
  </div>







<?php
    $this->view('includes/footer');    

?>

