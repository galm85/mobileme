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





// delete product
$('.deleteProduct').on('click',function(){

   if(window.confirm('Delete this product?')){
      let id = $(this).data('id');
      
      $.ajax({
         url:'http://localhost/mobile-me/public/admin/delete_product',
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
      url:'http://localhost/mobile-me/public/cart/add_item_to_cart',
      type:'POST',
      data:{product}
   })
  
   

})

