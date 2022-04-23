
const BASE_URL = 'http://localhost/mobile-me/public';

// GENREAL FUNCTION 

const reloadPage = ()=>{
   window.location.reload();
}

const createMessage =async (title,fn=null)=>{

   let generalMessage = document.getElementById('generalMessage');
   generalMessage.innerHTML = `<h4>${title}</h4>`;   
   generalMessage.style.transform = 'translateX(0)';
   
   let btn = document.createElement('button');
   btn.setAttribute('id','closeBtn');
   btn.innerHTML = 'x';
   
   generalMessage.append(btn);

   setTimeout(()=>{
       generalMessage.style.transform = 'translateX(150%)';   
       fn();
   },4000);


   $('#closeBtn').on('click',()=>{
      generalMessage.style.transform = 'translateX(150%)';
      fn(); 

   })
   
}



const confirmMessage = (question)=>{
   const message = document.getElementById('confirmMessage');
   message.style.transform ='translateX(-50%)';

   message.innerHTML = `<h3>${question}?</h3>
                           <div class="d-flex justify-content-around mt-5 mb-3" style="width:100%">
                              <button  id="cancel" class="btn btn-danger ">Cancel</button>
                              <button  id="confirm" class="btn btn-success ">Confirm</button>
                           </div>
                        `;
   const cancel = document.getElementById('cancel');
   const confirm = document.getElementById('confirm');
   
   return {message,cancel,confirm};
   
}













//upload product image
$('#uploadImageInput').on('change',()=>{

    let file = $('#uploadImageInput').prop('files')[0]
   
   let reader = new FileReader();
   reader.readAsDataURL(file);

   reader.onload = (e)=>{
      $('#imageDisplay').html(`<img width="100%" src="${e.target.result}" />`);
   }

})



// upload user image
$('#uploadUserImageInput').on('change',()=>{

    let file = $('#uploadUserImageInput').prop('files')[0]
   
   let reader = new FileReader();
   reader.readAsDataURL(file);

   reader.onload = (e)=>{
      $('#user-image-upload').html(`<img width="100%" src="${e.target.result}" />`);
   }

})





// delete product - ADMIN
$('.deleteProduct').on('click',function(){

   if(window.confirm('Delete this product?')){
      let id = $(this).data('id');
      
      $.ajax({
         url:BASE_URL + '/admin/delete_product',
         type:'POST',
         data:{id:id},
         success:function(res){
            alert('Product deleted');
             window.location.reload();
         }
      })

   }
})





// add to cart
$('#addToCartBtn').on('click',function(){
   let id = $(this).data('id');

   let product = {product_id:id,amount:1};
   $.ajax({
      url:BASE_URL + '/cart/add_item_to_cart',
      type:'POST',
      data:{product},
      success:  function(res){
         createMessage('Item add To Cart',reloadPage)

      }
   })
  
   

})



// update amount in cart
$('.updateAmountBtn').on('click',function(){
   let op = $(this).val();
   let id = $(this).data('id');
   
   $.ajax({
      url:BASE_URL + '/cart/update_amount_in_cart',
      type:'POST',
      data:{op,id},
      success:function(res){
         
         window.location.reload()
      }
   })

})


//remove item from cart
$('.removeFromCartBtn').on('click',function(){  
   
   let id = $(this).data('id');
   const {message,confirm,cancel} = confirmMessage('Remove from Cart');
   
   confirm.addEventListener('click',()=>{
      message.style.transform ='translateX(250%)';
      $.ajax({
         url:BASE_URL + '/cart/remove_from_cart',
         type:'POST',
         data:{id},
         success:function(res){
            createMessage('Item Removed',reloadPage); 
         }
         
      })
   });

   cancel.addEventListener('click',()=>{
      message.style.transform ='translateX(250%)';
   });


      
      
   
   
})








// post payment
$('#payment_form').submit(function(e){
   e.preventDefault();
   
   $.ajax({
      url:`${BASE_URL}/order/post_order`,
      method:'POST',
      data: new FormData(this),
      contentType:false,
      processData:false,
      success:function(response){
         response = JSON.parse(response);
         
         if(response.status){
            alert(response.message);
            window.location = `${BASE_URL}/thank`;
         }else{
            $('#first_name_error').html(response.errors.first_name ?response.errors.first_name : '');
            response.errors.first_name ?  $('#first_name').removeClass('is-info').addClass('is-danger') : $('#first_name').removeClass('is-danger').addClass('is-info');
            
            $('#last_name_error').html(response.errors.last_name ?response.errors.last_name : '');
            response.errors.last_name ?  $('#last_name').removeClass('is-info').addClass('is-danger') : $('#last_name').removeClass('is-danger').addClass('is-info');

            $('#email_error').html(response.errors.email ?response.errors.email : '');
            response.errors.email ?  $('#email').removeClass('is-info').addClass('is-danger') : $('#email').removeClass('is-danger').addClass('is-info');


            $('#phone_error').html(response.errors.phone ?response.errors.phone : '');
            response.errors.phone ?  $('#phone').removeClass('is-info').addClass('is-danger') : $('#phone').removeClass('is-danger').addClass('is-info');

            $('#address_error').html(response.errors.address ?response.errors.address : '');
            response.errors.address ?  $('#address').removeClass('is-info').addClass('is-danger') : $('#address').removeClass('is-danger').addClass('is-info');

            $('#credit_card_error').html(response.errors.credit_card ?response.errors.credit_card : '');
            response.errors.credit_card ?  $('#credit_card').removeClass('is-info').addClass('is-danger') : $('#credit_card').removeClass('is-danger').addClass('is-info');

            $('#card_number_error').html(response.errors.card_number ?response.errors.card_number : '');
            response.errors.card_number ?  $('#card_number').removeClass('is-info').addClass('is-danger') : $('#card_number').removeClass('is-danger').addClass('is-info');

            $('#card_holder_error').html(response.errors.card_holder ?response.errors.card_holder : '');
            response.errors.card_holder ?  $('#card_holder').removeClass('is-info').addClass('is-danger') : $('#card_holder').removeClass('is-danger').addClass('is-info');
            
            $('#ccv_number_error').html(response.errors.ccv_number ?response.errors.ccv_number : '');
            response.errors.ccv_number ?  $('#ccv_number').removeClass('is-info').addClass('is-danger') : $('#ccv_number').removeClass('is-danger').addClass('is-info');
            
            $('#exp_month_error').html(response.errors.exp_month ?response.errors.exp_month : '');
            response.errors.exp_month ?  $('#exp_month').removeClass('is-info').addClass('is-danger') : $('#exp_month').removeClass('is-danger').addClass('is-info');
            
            $('#exp_year_error').html(response.errors.exp_year ?response.errors.exp_year : '');
            response.errors.exp_year ?  $('#exp_year').removeClass('is-info').addClass('is-danger') : $('#exp_year').removeClass('is-danger').addClass('is-info');

         }
      }
})

})


// SIDE MENU

$('#sideMenuBtn').on('click',()=>{
   $('.side-menu-container').css('transform','translateY(0)');
   $('.side-menu-container').css('opacity',1);
  

   
})   

$('.side-menu-container').on('click',()=>{
   $('.side-menu-container').css('transform','translateY(-200%)');
   $('.side-menu-container').css('opacity',0);
})




$(document).ready((event)=>{
   $('#sales-phones-div').css('transform',`translateX(0)`);
})


$(window).scroll( (event)=> {
   let scroll = $(window).scrollTop();
   if(scroll > 70){
      $('.top-bar').css('background','rgb(4, 89, 143)');
      $('#sideMenuBtn').css('color','white');
      $('#mobile-me-logo').css('color','white');
      $('.top-bar').css('box-shadow','2px 2px 5px black');
      
      
   }else{
      $('.top-bar').css('background','rgba(0, 0, 0, 0.1)');
      $('#sideMenuBtn').css('color','var(--main-color)');
      $('#mobile-me-logo').css('color','var(--main-color)');
      $('.top-bar').css('box-shadow','none');
   }

   if(scroll > 800){
      $('#new-phones-div').css('transform',`translateX(0)`);
   }

   if(scroll > 1500){
      $('#news-letter-container').css('transform',`translateX(0)`);
   }


  
});







