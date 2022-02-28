<?php
    $this->view('includes/header');    

?>

    <style>
        .single-product-container{
            display: flex;
            justify-content: space-between;
            width:60%;
            margin: 50px auto;
        }

        .single-product-image{
            width: 30%;
            position: relative;
        }

        .on-sale{
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: red;
            color: white;
            transform: rotate(20deg);
            top:-20px;
            right:-20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 1.5rem;     
            line-height: 1;
            
        }

        .single-product-image img{
            width: 100%;
            object-fit: cover;
        }

       
        .single-product-data{
            width: 70%;
            padding: 0 100px;
        }

        .single-product-article{
            width: 60%;
            margin:auto;

        }

        .single-product-article p{
            font-size: 1.3rem;
        }
    </style>

  
    <div class="single-product-container">
        
        <div class="single-product-image">
            <?php if($product->on_sale):?>
            <div class="on-sale font-black">ON <br/>SALE</div>
            <?php endif;?>
            <img src="<?=ASSETS?>/images/products/<?=$product->main_image?>" alt="">
        </div>
        
        <div class="single-product-data">
            <h1 style="font-size:3rem;" class="font-black"><?=$product->title?></h1>
            <?php if($product->on_sale):?>
                <h3 class="font-bold" style="font-size:1.6rem; margin-top:10px;text-decoration: line-through;">$<?=$product->price?></h3>
                <h3 class="font-bold" style="font-size:1.6rem; margin-top:10px;">$<?=$product->sale_price?></h3>
            <?php else:?>
                <h3 class="font-bold" style="font-size:1.6rem; margin-top:10px">$<?=$product->price?></h3>
            <?php endif;?>
            <p class="font-light" style="font-size:1.4rem; margin-top:30px"><?=$product->summery?></p>
            <button class="button is-info" id="addToCartBtn" data-id="<?=$product->id?>" style="margin-top:100px"><i class="fas fa-cart-plus"></i></button>
        </div>

    </div>
    <a href="<?=ROOT?>/smartphones">
        <button class="button is-danger" style="position:absolute;top:15vh;right:20%">Go Back</button>
    </a>
    <hr>
    <div class="single-product-article">
    <p><?=$product->article?></p>
    </div>





<?php
    $this->view('includes/footer');    

?>

