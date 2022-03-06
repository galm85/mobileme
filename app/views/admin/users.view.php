<?php $this->view('admin/dashboard-header');?>




<div class="row mt-5 mb-2">
    <div class="col-12">
        <h1 class="text-center text-primary display-5">Users</h1>
    </div>
</div>



<hr>


<div class="row justify-content-center my-5">
    <div class="col-11">

    
    <table class="table">
        <tbody>
            <tr>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Orders</th>
            </tr>
        </tbody>
        <tbody>
            <?php if($users):?>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><img src="<?=ASSETS?>/images/users/<?=$user->image?>" width="50px" alt="user image"></td>
                        <td><?=$user->first_name?></td>
                        <td><?=$user->last_name?></td>
                        <td><?=$user->email?></td>
                        <td><?=$user->phone?></td>
                        <td><?=$user->address?></td>
                        <td>
                            <button class="btn btn-primary showOrderBtn" data-id="<?=$user->id?>">Orders</button>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
            <?php endif;?> 
            <tr></tr>
        </tbody>
    </table>
    </div>
</div>



<div id="orderModel" >
<button id="closeModel" class="btn btn-danger">close</button>
   
                   
    

</div>




<?php $this->view('admin/dashboard-footer');?>


<script>
    $('.showOrderBtn').on('click',function(){
        let id = $(this).data('id');
      
        $.ajax({
            url:`${BASE_URL}/order/get_user_orders/${id}`,
            type:"GET",
            success:function(response){
               response = JSON.parse(response);
               console.log(response);

                if(response.orders.length > 1){
                    renderTable(response);
                }else{
                    $('#orderModel').html("<h3  class='text-center text-light display-3'>No Orders</h3>"); 
                }
               $('#orderModel').css('opacity',1); 
               $('#orderModel').css('transform','translateX(0)'); 
              
            }
        })
    })

    $('#orderModel').on('click',()=>{
        $('#orderModel').css('opacity',0); 
        $('#orderModel').css('transform','translateX(-200%)'); 
    })



    const renderTable = (response)=>{
        let orders = `   <table class="table">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>`; 
               
               
               
               
               
               response.orders.forEach(order=>{
                   
                   let details = '';
                   
                   order.order_details.forEach(i=>{
                       details += ` <li class="d-flex align-items-center"> <img class="me-5" src="<?=ASSETS?>/images/products/${i.main_image}" width="50px" alt=""> <p>${i.title} $ ${i.price} X ${i.amount} = $ ${i.price * i.amount}</p> </li>`
                   });

                   orders += ` <tr class=" align-items-center">
                                    <td style="padding-top:2.5%">${order.id}</td>
                                    <td style="padding-top:2.5%">${order.created_at}</td>
                                    <td> <ul> ${details} </ul> </td>
                                    <td style="padding-top:2.5%">$ ${order.order_total}</td>
                                    <td style="padding-top:2.5%">${order.status}</td>
                                </tr>`
               })
              
              orders += ` </tbody></table>`

              $('#orderModel').html(orders);
    }
</script>