<?php $this->view('includes/header'); ?>

<style>
    #message{
        position: fixed;
        top:15%;
        left: 50%;
        width: 50%;
        height: 300px;
        z-index: 20;
        background-color: rgba(4, 89, 143,0.95);
        color: white;
        transform: translateX(150%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        box-shadow: 2px 2px 4px black;
        transition: all ease 0.6s;
    }
    #close_message{
        position: absolute;
        top:20px;
        right: 20px;
        height: 40px;
        width: 40px;
        border-radius: 50%;
        background-color: white;
        color: red;
        border: none;
        cursor: pointer;
    }
</style>
   

    <div class="single-product-container" style="margin-top: 150px;">
        
        <div class="single-product-image">
            <?php if($product->on_sale):?>
            <div class="on-sale font-black">ON <br/>SALE</div>
            <?php endif;?>
            <img id="product_image" src="<?=ASSETS?>/images/products/<?=$product->main_image?>" alt="">
        </div>
        
        <div class="single-product-data">
            <h1 style="font-size:3rem;" class="font-black"><?=$product->title?></h1>
            <?php if($product->on_sale):?>
                <h3 class="font-bold" style="font-size:1.6rem; margin-top:10px;text-decoration: line-through;">$<?=$product->price?></h3>
                <h3 class="font-bold text-success" style="font-size:1.6rem; margin-top:10px;">$<?=$product->sale_price?></h3>
            <?php else:?>
                <h3 class="font-bold" style="font-size:1.6rem; margin-top:10px">$<?=$product->price?></h3>
            <?php endif;?>
            <?php if(!$product->on_stock):?>
                <h3 class="font-bold text-danger" style="font-size:1.6rem; margin-top:10px">Out Of Stock</h3>      
            <?php endif;?>
            <p><?=$product->summery?></p>

            <?php if(isset($user)):?>
                <button class="button is-info" id="addToCartBtn" <?=!$product->on_stock ? 'disabled' : ''?> data-id="<?=$product->id?>" style="margin-top:100px;width: 100px;"><i class="fas fa-cart-plus"></i></button>
                <?php else:?>
                    <button  class="button is-info" id="sign-first"  style="margin-top:100px;width: 100px;"><i class="fas fa-cart-plus"></i></button>
            <?php endif;?>
        </div>


       
    </div>
    
    <a href="<?=ROOT?>/smartphones">
        <button class="button is-danger" style="position:absolute;top:15vh;right:20%">Go Back</button>
    </a>
    
    <hr>
    
    <div class="single-product-article">
        <p><?=$product->article?></p>
    </div>

    <div id="modalImage" >
            <img src="<?=ASSETS?>/images/products/<?=$product->main_image?>" id="image"   alt="">
    </div>

    <div id="message">
        <h2 class="display-5 mb-5">Dear customer</h2>
        <h5>In Order to add this product to your cart Please <a style="color:yellow" href="<?=ROOT?>/signin">Sign In </a> first </h5>
        <h5>Don't have account yet? <a style="color:yellow" href="<?=ROOT?>/register">Register Here </a> </h5>
        <button id="close_message">X</button>
    </div>


    

              

<?php $this->view('includes/footer');?>

<script>
    
    $('#product_image').on('click',()=>{
       
        $('#modalImage').css({'transform': 'translate(-50%, 0)'});
        
    })


    $('#modalImage').on('click',()=>{
        
        $('#modalImage').css({'transform': 'translate(-50%,-200%)'});
    })


    $('#sign-first').on('click',()=>{
        $('#message').css({'transform':'translateX(-50%)'});
    })
    $('#close_message').on('click',()=>{
        $('#message').css({'transform':'translateX(150%)'});
    })



    
</script>