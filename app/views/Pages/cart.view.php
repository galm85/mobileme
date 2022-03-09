<?php
    $this->view('includes/header');    
   

?>

<div class="container" style="margin-top: 100px;">
<?php if(isset($products) && count($products) > 0):?>
    <div class="row">
        <div class="col-12">
            <h1>My Cart</h1>
        </div>
    </div>

 

   
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                   
                        <?php foreach($products as $item):?>
                            <tr>
                                <td> <img src="<?=ASSETS?>/images/products/<?=$item->main_image?>" width="50px" alt="product image"> </td>
                                <td> <?=$item->title?> </td>
                                <td>
                                    <input type="button"  class="btn btn-success updateAmountBtn" data-id="<?=$item->id?>" value="+">
                                    <?=$item->amount?>
                                    <input type="button" class="btn btn-danger updateAmountBtn" data-id="<?=$item->id?>"  value="-" >
                                    
                                 </td>
                                <td> $<?=$item->price?> </td>
                                <td> $<?=$item->price * $item->amount?> </td>
                                <th><button  data-id="<?=$item->id?>" class="btn btn-outline-danger removeFromCartBtn" ><i class="fa-solid fa-delete-left" ></i></button></th>
                            </tr>
                        <?php endforeach;?>
                  
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            <div class="text-end">
                <h3 >Total Price: $<?=$total_price?> </h3>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 text-end">
            <a href="<?=ROOT?>/cart/payment" class="btn btn-warning">Place Order</a>
        </div>
    </div>

    <?php else:?>
        <div class="row justify-content-center">
            <div class="col-12 my-5">
                <p class="text-center"><i>No Items in Cart</i></p>
            </div>
            <div class="col-12">
                <div class="text-center">
                    <a href="<?=ROOT?>" class="btn btn-primary">Back</a>

                </div>
            </div>
        </div>
        
    <?php endif;?>

</div>





  <?php $this->view('includes/footer'); ?>



 
