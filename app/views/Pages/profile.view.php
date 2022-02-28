<?php $this->view('includes/header') ?>

    <style>
        .new-order{
            background-color: none;
        }
        .sent{
            background-color: rgba(0, 255, 0, 0.1);
        }
    </style>

    <div class="container mt-5">
    
        <div class="row">
            <div class="col-md-4">
                <div class="profile-image">
                    <img style="border-radius: 50%;" src="<?=ASSETS?>/images/users/<?=$user->image?>" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-data">
                    <h2> <?= $user->first_name." ".$user->last_name ?> </h2>
                    <h6> <?=$user->email?> </h6>
                    <h6> <?=$user->address?> </h6>
                    <h6> <?=$user->phone?> </h6>
                </div>
            </div>
        </div>
   

    <hr>


    <div class="row">
        <div class="col-12">
            <h3>My Orders</h3>
            <?php if($orders):?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Order Details</th>
                        <th>Total Price</th>
                        <th>status</th>
                        <th>Contact Info</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach($orders as $order):?>
                        <tr  class="<?= $order->status == 'new' ? 'new-order' : 'sent' ?>" >
                        
                            <td> <?= date('m/d/Y H:i:s',strtotime($order->created_at))  ?> </td>
                            <td> 
                                <ul>
                                    <?php foreach($order->order_details as $item):?>
                                        <li class="d-flex mb-2">
                                            <img class="me-2" src="<?=ASSETS?>/images/products/<?=$item->main_image?>" width="25px" alt="<?=$item->title?>">
                                            <p> <?= $item->title ." ". $item->amount." ".$item->price." x ".$item->amount ." = ".$item->price*$item->amount ?> </p>
                                        </li>    
                                    <?php endforeach;?>
                                    </ul>
                            </td>
                            <td><b> $<?=$order->order_total?></b> </td>
                            <td> <?=$order->status?> </td>
                            <td> <?=$order->contact . " / " . $order->phone." / ".$order->address ?>  </td>
                        </tr>
                            <?php endforeach;?>
                </tbody>
            </table>
            <?php endif;?>
        </div>
    </div>


    </div>


<?php $this->view('includes/footer') ?>


