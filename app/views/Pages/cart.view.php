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
            <?=$amount?>
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
                    </tr>
                </thead>
                <tbody>
                    <?php if($products):?>
                        <?php foreach($products as $item):?>
                            <tr>
                                <td> <img src="<?=ASSETS?>/images/products/<?=$item->main_image?>" width="50px" alt="product image"> </td>
                                <td> <?=$item->title?> </td>
                                <td> <?=$item->amount?> </td>
                                <td> $<?=$item->price?> </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>

</div>




  <?php
    $this->view('includes/footer');    

?>

