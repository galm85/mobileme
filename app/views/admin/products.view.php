<?php $this->view('includes/header');?>

<h1>Products</h1>

<ul>
    <li><a href="<?=ROOT?>/admin/products">Prodcuts</a></li>
    <li><a href="<?=ROOT?>/admin/new_product">Add New Prodcut</a></li>
</ul>


<div>
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







<?php $this->view('includes/footer');?>