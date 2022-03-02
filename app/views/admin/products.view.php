<?php $this->view('admin/dashboard-header');?>



<div class="contianer ">
    <div class="row">
        <div class="col-11">
            <h1 class="text-center display-5 my-4">Products</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-11 d-flex justify-content-between ">
            <a class="btn btn-primary" href="<?=ROOT?>/admin/new_product">Add New Prodcut</a>
            <form action="" method="post">
                <select name=filter class="form-select" onChange="this.form.submit()" >
                    <option value="">All</option>
                    <?php foreach($categories as $row):?>
                        <option  value=<?=$row->id?> <?=Helpers::get_old_select('filter',$row->id)?> > <?=$row->title?> </option>
                    <?php endforeach;?>
                </select>
                
            </form>

        </div>
       
    </div>



    <hr class="my-5">
    <div class="row">
        <div class="col-11">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>On Sale</th>
                        <th>On Stock</th>
                        <th>Price</th>
                        <th>Sale Price</th>
                        <th>actions</th>
                    </tr>
                </tbody>
                <tbody>
                    <?php if($products):?>
                        <?php foreach($products as $product): ?>
                            <tr>
                                <td> <img src="<?=ASSETS?>/images/products/<?=$product->main_image?>"  width="50px" alt="product"/>  </td>
                                <td><?=$product->title?></td>
                                <td><?=$product->category?></td>
                                <td><?=$product->brand?></td>
                                <td><?=$product->on_sale ? "YES" : "NO" ?></td>
                                <td><?=$product->on_stock ? "YES" : "NO" ?></td>
                                <td><?=$product->price?></td>
                                <td><?=$product->sale_price?></td>
                                <td>
                                    <button class="btn btn-danger deleteProduct" data-id="<?=$product->id ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif;?>
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
    


</div>



<?php $this->view('admin/dashboard-header');?>