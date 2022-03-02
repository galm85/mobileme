<?php $this->view('admin/dashboard-header');?>

<div class="container-fluid bg-light w-100 m-0 min-vh-100">

    <div class="row justify-content-center">
        <div class="col-10 mt-5 ">
            <h1 style="font-weight: 600;font-size:48px"> <span style="color:#6D7580">Hi</span> <?=$user->first_name?>,</h1>
            <h3>It's looking like a slow day</h3>
        </div>
    </div>

    <div class="row my-5 justify-content-center ">
        <div class="col-2">
            <a href="<?=ROOT?>/admin/products" class="dash-item-link">
                <svg class="me-3" style="color:green" xmlns="http://www.w3.org/2000/svg" width="50" height="100" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                    <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                </svg>
                
                <div>
                    <h6>Products</h6>
                    <h3><?=count($products)?></h3>
                </div>
            </a>
        </div>
        <div class="col-2">
            <a href="<?=ROOT?>/admin/brands" class="dash-item-link">
                <svg class="me-3" style="color:green" xmlns="http://www.w3.org/2000/svg" width="50" height="100" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                    <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
                </svg>

                <div>
                    <h6>brands</h6>
                    <h3><?=count($brands)?></h3>
                </div>
            </a>
        </div>
        <div class="col-2">
            <a href="<?=ROOT?>/admin/categories" class="dash-item-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="100" fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
                    <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z"/>
                    <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z"/>
                </svg>

                <div>
                    <h6>Categories</h6>
                    <h3><?=count($categories)?></h3>
                </div>
            </a>
        </div>
        <div class="col-2">
            <a href="<?=ROOT?>/admin/users" class="dash-item-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="100" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
            
                <div>
                    <h6>Users</h6>
                    <h3><?=count($users)?></h3>
                </div>
            </a>
        </div>
        <div class="col-2">
            <a href="<?=ROOT?>/admin/orders" class="dash-item-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="100" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
            
                <div>
                    <h6>Orders</h6>
                    <h3><?=count($orders)?></h3>
                </div>
            </a>
        </div>
    </div>
</div>




<?php $this->view('admin/dashboard-footer');?>