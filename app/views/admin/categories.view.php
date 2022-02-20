<?php $this->view('admin/dashboard-header');?>

<h1>Categories</h1>




<div>
    <table class="table">
        <tbody>
            <tr>
                <th>Image</th>
                <th>Title</th>
                
                <th>actions</th>
            </tr>
        </tbody>
        <tbody>
            <?php if($categories):?>
                <?php foreach($categories as $category): ?>
                    <tr>
                        <td> <img src="<?=ASSETS?>/images/categories/<?=$category->image?>"  width="50px" alt="category"/>  </td>
                        <td><?=$category->title?></td>
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







<?php $this->view('admin/dashboard-header');?>