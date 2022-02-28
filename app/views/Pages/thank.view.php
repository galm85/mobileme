<?php $this->view('includes/header') ?>


<div class="contianer">
    <div class="row pt-5">
        <h1 class="text-center display-2">
            Thank YOU
        </h1>

        <h3 class="text-center display-5">Your order has been placed</h3>
        <p class="text-center mt-5">You can watch your order status in your <a href="<?=ROOT?>/user/orders">orders page</a></p>
    </div>


    <div class="row mt-5">
        <div class="col-12">
            <div class="text-center">
                <a href="<?=ROOT?>" class="btn btn-success">Back To Site</a>
            </div>
        </div>
    </div>


</div>



<?php $this->view('includes/footer') ?>