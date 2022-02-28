<?php $this->view('admin/dashboard-header');?>


<div class="row mt-5 mb-2">
    <div class="col-12">
        <h1 class="text-center text-primary display-5">Orders</h1>
    </div>
</div>



<hr>


<div class="row justify-content-center my-5">
    <div class="col-11">

    
    <table class="table">
        <tbody>
            <tr>
                <th>Date</th>
                <th>Contact Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Amount</th>
                <th>Status</th>
                <th>actions</th>
            </tr>
        </tbody>
        <tbody>
            <?php if($orders):?>
                <?php foreach($orders as $order): ?>
                    <tr>
                        <td><?= date('m/d/Y H:i:s',strtotime($order->created_at))  ?> </td>
                        <td><?=$order->contact?></td>
                        <td><?=$order->email?></td>
                        <td><?=$order->phone?></td>
                        <td><?=$order->address?></td>
                        <td><?=$order->order_total?></td>
                        <td><?=$order->status?></td>
                        <td>
                            <a href="<?=ROOT?>/admin/edit_order/<?=$order->id?>" class="btn btn-warning">Edit</a>
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