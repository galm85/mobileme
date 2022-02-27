<?php $this->view('admin/dashboard-header');?>


<div class="row mt-5 mb-2">
    <div class="col-12">
        <h1 class="text-center text-primary display-5">Brands</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <a href="<?=ROOT?>/admin/new_brand" class="btn btn-primary ms-5">Add New</a>
    </div>
</div>

<hr>


<div class="row justify-content-center my-5">
    <div class="col-6">

    
    <table class="table">
        <tbody>
            <tr>
                <th>Image</th>
                <th>Brand</th>
                <th>actions</th>
            </tr>
        </tbody>
        <tbody>
            <?php if($brands):?>
                <?php foreach($brands as $brand): ?>
                    <tr>
                        <td> <img src="<?=ASSETS?>/images/brands/<?=$brand->image?>"  width="50px" alt="brand"/>  </td>
                        <td><?=$brand->title?></td>
                        <td>
                            <button class="btn btn-danger deleteBrand" data-id="<?=$brand->id ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif;?> 
            <tr></tr>
        </tbody>
    </table>
    </div>
</div>





<?php $this->view('admin/dashboard-footer');?>


<script>
    $('.deleteBrand').on('click',function(){
        let id = $(this).data('id');
        $.ajax({
            url:"<?=ROOT?>/admin/delete_brand",
            type:"POST",
            data:{id},
            success:function(response){
                alert(response);
                window.location.reload();
            }
        })
    })
</script>