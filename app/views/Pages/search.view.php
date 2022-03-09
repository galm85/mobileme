<?php $this->view('includes/header'); ?>

  


 
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12">
            <h1 class="display-5 text-primary">Search for <?=$search?></h1>
        </div>
    </div>    

    <div class="row">
        <?php if(count($products) > 0):?>
            <?php foreach($products as $row):?>
                <div class="col-3  product-card mb-5">
                        <a href="<?=ROOT?>/<?=$row->category_title?>/<?=str_replace(' ','-',strtolower($row->brand_title))?>/<?=str_replace(' ','-',strtolower($row->title))?>/">
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

        <?php else:?>
            <h2><i>No Products Found</i></h2>
        <?php endif;?>
    </div>



</div>







<?php $this->view('includes/footer'); ?>


