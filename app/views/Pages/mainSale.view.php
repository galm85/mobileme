<?php $this->view('includes/header');?>

<div class="main-sale-container" style="margin-top: 150px;">

    <section>
            <h2 class="text-center display-4 text-dark fw-bold">iPhone 13 pro</h1>
            <p  class="text-center main-sale-link"><a  href="<?=ROOT?>/smartphones/apple/iphone-13-pro">Read More</a></p>
            <div class="main-sale-image" id="first">
                <img src="<?=ASSETS?>/images/main-sale/iphone13pro.png" alt="iphone 13 pro">
            </div>
    </section>

    
    <div style="width: 100%;height: 20px;"></div>

    <section style="background-color: rgba(0,0,0,0.1);">
            <h2 class="text-center display-4 text-dark fw-bold">iPhone 13</h1>
            <p class="text-center main-sale-link" ><a  href="<?=ROOT?>/smartphones/apple/iphone-13-pro">Read More</a></p>
            <div class="main-sale-image" id="second" style="transform: translateY(70%);">
                <img  src="<?=ASSETS?>/images/main-sale/iphone13.png" alt="iphone 13 pro">
            </div>
    </section>

    <div style="width: 100%;height:1px;background-color:black"></div>

    <section>
            <h2 class="text-center display-4 text-dark fw-bold">iPhone 13 SE</h1>
            <p class="text-center main-sale-link"><a  href="<?=ROOT?>/smartphones/apple/iphone-13-pro">Read More</a></p>
            <div class="main-sale-image" id="third" style="transform: translateY(70%);margin-top:100px">
                <img width="70%" src="<?=ASSETS?>/images/main-sale/iphone13se.png" alt="iphone 13 pro">
            </div>
    </section>

    <div style="width: 100%;height:10px;"></div>
    
    <section style="background-color: rgba(0,0,0,0.1);">
            <h2 class="text-center display-4 text-dark fw-bold">iPhone 13 Pro Max</h1>
            <p class="text-center main-sale-link"><a  href="<?=ROOT?>/smartphones/apple/iphone-13-pro-max">Read More</a></p>
            <div class="main-sale-image" id="forth" style="transform: translateX(100%);margin-top:100px">
                <img width="80%" src="<?=ASSETS?>/images/main-sale/iphone13max.png" alt="iphone 13 pro">
            </div>
    </section>

    <div style="width: 100%;height:50px;"></div>


   
</div>

<?php $this->view('includes/footer');?>

<script>

    const first = document.getElementById('first');
    const second = document.getElementById('second');
    const third = document.getElementById('third');
    const forth = document.getElementById('forth');

    let scroll = 0;
    window.onscroll  = ()=>{
        scroll = window.pageYOffset;
        console.log(scroll);
        if(scroll >400){
            second.style.transform = 'translateY(0)';
        }
        if(scroll > 1200){
            third.style.transform = 'translateY(0)';
        }
        if(scroll > 2100){
            forth.style.transform = 'translateX(0)';

        }
    }


        if(window.pageYOffset >500){
            second.style.transform = 'translateY(0)';
        }
        if(window.pageYOffset > 1300){
            third.style.transform = 'translateY(0)';
        }
        if(window.pageYOffset > 2000){
            forth.style.transform = 'translateX(0)';

        }
    


</script>