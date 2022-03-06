
<?php $this->view('admin/dashboard-header');?>

<h1>Edit Product</h1>



<div class="contianer">
    <div class="row justify-content-center">
        <div class="col-9">
     
            <form id="editProductForm" enctype="multipart/form-data">
                
                <!-- title -->
                <div class="row my-3">
                    <div class="col-12">
                        <label for="title"> Title</label>
                        <input class="input is-info" type="text" id="title" name="title" placeholder="Product Title" value="<?=Helpers::get_old_value('title',$product->title)?>" >
                        <span id="title_error" class='text-danger'></span>                    
                    </div> 
                </div>
                <!-- end title -->


                <!-- Category & brand -->
                <div class="row my-3">
                    
                    <div class="col-6">
                        <div class="select is-info col-6"  id="category" style="width:100%">
                            <select style="width:100%" name="categorie_id">
                                <option>Select Category</option>
                                    <?php foreach($categories as $category):?>
                                        <option value=<?=$category->id?>  <?=Helpers::get_old_select('categorie_id',$category->id,$product->categorie_id)?> >  <?=$category->title?>  </option>
                                    <?php endforeach;?>
                            </select>
                            <span id="category_error" class='text-danger'></span>     
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="select is-info col-6" id="brand" style="width:100%">
                            <select  style="width:100%" name="brand_id">
                                <option>Select Brand</option>
                                <?php foreach($brands as $brand):?>
                                        <option value=<?=$brand->id?> <?=Helpers::get_old_select('brand_id',$brand->id,$product->brand_id)?> >  <?=$brand->title?>  </option>
                                    <?php endforeach;?>
                            </select>
                            <span id="brand_error" class='text-danger'></span>    
                        </div>
                    </div>
                </div>
                <!-- end Category & brand -->
                

                <!-- checkbox -->
                <div class="row my-3">
                    <div class="col-12">
                        <label class="checkbox">
                        <input type="checkbox" <?=Helpers::get_old_checkbox('on_sale',$product->on_sale)?> name="on_sale"> On Sale</label>
                    </div>
                    <div class="col-12">
                        <label class="checkbox">
                        <input type="checkbox" <?=Helpers::get_old_checkbox('on_stock',$product->on_stock)?> name="on_stock"> On Stock</label>
                    </div>
                </div>
                <!--end checkbox -->

                <!-- Price -->
                <div class="row my-3">
                    <div class="col-6">
                        <label for="price"> Price</label>
                        <input class="input is-info" type="text" id="price" name="price" placeholder="price" value="<?=Helpers::get_old_value('price',$product->price)?>">
                        <span id="price_error" class='text-danger'></span>    
                    </div> 
                    <div class="col-6">
                        <label for="sale_price">Sale Price</label>
                        <input class="input is-info" type="text" id="sale_price" name="sale_price" placeholder="sale price" value="<?=Helpers::get_old_value('sale_price',$product->sale_price)?>">
                        <span id="sale_price_error" class='text-danger'></span>    
                    </div> 
                </div>
                <!-- end Price -->

              

                <!-- image -->
                <div class="row my-3 justify-contetn-center ">
                    <div class="col-5 text-center">
                        <label class="file-label">
                            <input class="file-input" id="uploadImageInput" type="file" name="main_image" >
                            <span class="file-cta">
                                <span class="file-icon"><i class="fas fa-upload"></i></span>
                                <span class="file-label">Upload Image</span>
                            </span>
                        </label>  
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div id="imageDisplay" class="col-6">
                        <img src="<?=ASSETS?>/images/products/<?=$product->main_image?>" width="200px" alt="product image">
                    </div>
                </div>
                <!-- end image -->

                <!-- Summery -->
                <div class="row my-3">
                    <div class="col-12">
                     <label for="summery">Summary</label>   
                    <textarea class="textarea is-info" placeholder="Summary" id="summery" name="summery"><?=Helpers::get_old_value('summery',$product->summery)?></textarea>
                    <span id="summery_error" class='text-danger'></span>    
                    </div>
                </div>
                <!-- end Summery -->


                <!-- article -->
                <div class="row my-3">
                    <div class="col-12">
                        <label for="article">Full Description</label>   
                        <textarea class="textarea is-info" placeholder="Full Description" rows="10" id="article" name="article"><?=Helpers::get_old_value('article',$product->article)?></textarea>
                        <span id="article_error" class='text-danger'></span>
                    </div>
                </div>
                <!-- end article -->


                <!-- Actions -->
                <div class="row my-5">
                    <div class="col-12 d-flex justify-content-around">
                        <a href="<?=ROOT?>/admin/products" class="button is-danger" style="text-decoration: none;" type="button">Cancel</a>
                        <button class="button is-info"  type="submit" id="updateBtn" data-id="<?=$product->id?>" name="submit">Update</button>
                    </div>
                </div>





            </form>
       
    </div>
    </div>

</div>


<?php $this->view('admin/dashboard-footer');?>

<script>



$('#editProductForm').submit(function(e){
            e.preventDefault();
            let id = $('#updateBtn').data('id');
         

            $.ajax({
                url:`http://localhost/mobile-me/public/admin/patch_product/${id}`,
                method:'POST',
                data: new FormData(this),
                contentType:false,
                processData:false,
                success:function(response){

                       
                        response = JSON.parse(response);
                        if(response.status){
                            window.location = BASE_URL + "/admin/products";
                            // window.location = "http://localhost/mobile-me/public/admin/products";
                        }else{
                            
                            displayError(response.errors.title,'title');
                            displayError(response.errors.categorie_id,'category');
                            displayError(response.errors.brand_id,'brand');
                            displayError(response.errors.price,'price');
                            displayError(response.errors.sale_price,'sale_price');
                            displayError(response.errors.summery,'summery');
                            displayError(response.errors.article,'article');
                        }
                       
                }
            })
        })


        const displayError = (error=null,id)=>{
            let span = document.getElementById(id+'_error');   
            let input = document.getElementById(id);
            
            if(error){
                span.innerHTML = error;
                input.classList.remove('is-info');
                input.classList.add('is-danger');
            }else{
                span.innerHTML = '';
                input.classList.remove('is-danger');
                input.classList.add('is-info');           
            }
        }




</script>

