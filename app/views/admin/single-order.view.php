<?php $this->view('admin/dashboard-header');?>

<div class="container">

    <div class="row mt-5 mb-2">
        <div class="col-12">
            <h1 class="text-center text-primary display-5">Single Order</h1>
        </div>
    </div>

   

    <div class="row">
        <div class="col-6">
            <h2>Contact Details</h2>
            <p><b>Name:</b> <?=$order->contact?> </p>
            <p><b>Email:</b> <?=$order->email?> </p>
            <p><b>phone:</b> <?=$order->phone?> </p>
            <p><b>Address:</b> <?=$order->address?> </p>
            <h2>Payment </h2>
            <p><b>Credit Card:</b> <?=$order->credit_card?> </p>
            <p><b>Card Holder:</b> <?=$order->card_holder?> </p>
        </div>
        
        <div class="col-6">
            <h2>Order Details</h2>
            
            <div class="d-flex justify-content-between">
                <p><b>Date:</b> <?= date('m/d/Y H:i:s',strtotime($order->created_at))  ?>  </p>
                <div class="select is-info">
                    <select id="select_status" data-id="<?=$order->id?>">
                        <option value="<?=$order->status?>"><?=$order->status?></option>
                        <hr>
                        <option value="new">New</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Sent">Sent</option>
                        <option value="Canceled">Canceled</option>
                    </select>
                </div>
            </div>
            <div class="notification is-info my-5" style="display: none;" id="changeNotification">
                <button class="delete" id="closeNotification"></button>
                The Status has been Change;
            </div>
            <hr>

            <?php foreach($order->order_details as $item):?>
                <div class="d-flex" style="align-items: center;">
                    <div class="me-5">
                        <img src="<?=ASSETS?>/images/products/<?=$item->main_image?>" width="50px" alt="<?=$item->title?>">
                    </div>
                    <div>
                        <p> <b class="me-2"> <?=$item->title?> </b>   $<?=$item->price?> X <?=$item->amount?> =  $<?=$item->amount * $item->price?>  </p> 
                    </div>
                </div>
                <hr>
            <?php endforeach;?>
        </div>
                <hr>
        <div class="col-12">
          <h4 class="text-end"> Total : $<?=$order->order_total?></h4> 
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="text-center">
                <a href="<?=ROOT?>/admin/orders" class="btn btn-outline-danger">Return</a>
            </div>
        </div>
    </div>


</div>











<?php $this->view('admin/dashboard-footer');?>

<script>
    $('#select_status').change(function(){
        
        status = $(this).val();
        id = $(this).data('id');
        
        $.ajax({
            url:BASE_URL+'/admin/change_status',
            method:'POST',
            data:{id,status},
            success:function(response){
                if(response == 1){
                    $('#changeNotification').css('display','block');
                }
            }
        })

    });


    $('#closeNotification').click(()=>{
        $('#changeNotification').css('display','none');
    })
</script>