<?php $this->view('includes/header'); ?>

   

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
            <p><?=$product->summery?></p>
            <button class="button is-info" id="addToCartBtn" data-id="<?=$product->id?>" style="margin-top:100px;width: 100px;"><i class="fas fa-cart-plus"></i></button>
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





<?php $this->view('includes/footer');?>

<script>
    
    $('#product_image').on('click',()=>{
       
        $('#modalImage').css({'transform': 'translate(-50%, 0)'});
        
    })


    $('#modalImage').on('click',()=>{
        
        $('#modalImage').css({'transform': 'translate(-50%,-200%)'});
    })

</script>