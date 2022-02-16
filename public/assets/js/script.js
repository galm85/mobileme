$('#uploadImageInput').on('change',()=>{

    let file = $('#uploadImageInput').prop('files')[0]
   
   let reader = new FileReader();
   reader.readAsDataURL(file);

   reader.onload = (e)=>{
      $('#imageDisplay').html(`<img width="100%" src="${e.target.result}" />`);
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


