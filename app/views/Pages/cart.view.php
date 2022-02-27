<?php
    $this->view('includes/header');    
   

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>My Cart</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
           Tot <?=$amount?>
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
                    <?php if($products):?>
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
                    <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>


    <hr>
    <div class="text-end">
        <h3 >Total Price: $<?=$total_price?> </h3>

    </div>
</div>




  <?php
    $this->view('includes/footer');    

?>

