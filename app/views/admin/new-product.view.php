
<?php $this->view('admin/dashboard-header');?>

<h1>Add New Product</h1>



<div class="contianer">
    <div class="row justify-content-center">
        <div class="col-9">
     
            <form action="<?=ROOT?>/admin/new_product" method="POST" enctype="multipart/form-data">
                
                <!-- title -->
                <div class="row my-3">
                    <div class="col-12">
                        <label for="title"> Title</label>
                        <input class="<?=isset($errors['title']) ? 'input is-danger' : 'input is-info'?>" type="text" id="title" name="title" placeholder="Product Title" value="<?=Helpers::get_old_value('title')?>" >
                        <?= isset($errors['title']) ? "<span class='text-danger'>". $errors['title'] . "</span>" : "" ?>
                    </div> 
                </div>
                <!-- end title -->


                <!-- Category & brand -->
                <div class="row my-3">
                    
                    <div class="col-6">
                        <div class="<?= isset($errors['categorie_id']) ? 'select is-danger col-6' : 'select is-info col-6'?>"  style="width:100%">
                            <select style="width:100%" name="categorie_id">
                                <option>Select Category</option>
                                    <?php foreach($categories as $category):?>
                                        <option value=<?=$category->id?>  <?=Helpers::get_old_select('categorie_id',$category->id)?> >  <?=$category->title?>  </option>
                                    <?php endforeach;?>
                            </select>
                            <?= isset($errors['categorie_id']) ? "<span class='text-danger'>". $errors['categorie_id'] . "</span>" : "" ?>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="<?= isset($errors['brand_id']) ? 'select is-danger col-6' : 'select is-info col-6'?>" style="width:100%">
                            <select  style="width:100%" name="brand_id">
                                <option>Select Brand</option>
                                <?php foreach($brands as $brand):?>
                                        <option value=<?=$brand->id?> <?=Helpers::get_old_select('brand_id',$brand->id)?> >  <?=$brand->title?>  </option>
                                    <?php endforeach;?>
                            </select>
                        </div>
                        <?= isset($errors['brand_id']) ? "<span class='text-danger'>". $errors['brand_id'] . "</span>" : "" ?>
                    </div>
                </div>
                <!-- end Category & brand -->
                

                <!-- checkbox -->
                <div class="row my-3">
                    <div class="col-12">
                        <label class="checkbox">
                        <input type="checkbox" <?=Helpers::get_old_checkbox('on_sale')?> name="on_sale"> On Sale</label>
                    </div>
                    <div class="col-12">
                        <label class="checkbox">
                        <input type="checkbox" <?=Helpers::get_old_checkbox('on_stock')?> name="on_stock"> On Stock</label>
                    </div>
                </div>
                <!--end checkbox -->

                <!-- Price -->
                <div class="row my-3">
                    <div class="col-6">
                        <label for="price"> Price</label>
                        <input class="<?=isset($errors['price']) ? 'input is-danger' : 'input is-info'?>" type="text" id="price" name="price" placeholder="price" value="<?=Helpers::get_old_value('price')?>">
                        <?= isset($errors['price']) ? "<span class='text-danger'>". $errors['price'] . "</span>" : "" ?>
                    </div> 
                    <div class="col-6">
                        <label for="sale_price">Sale Price</label>
                        <input class="<?=isset($errors['sale_price']) ? 'input is-danger' : 'input is-info'?>" type="text" id="sale_price" name="sale_price" placeholder="sale price" value="<?=Helpers::get_old_value('sale_price')?>">
                        <?= isset($errors['sale_price']) ? "<span class='text-danger'>". $errors['sale_price'] . "</span>" : "" ?>
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
                    <div id="imageDisplay" class="col-6"></div>
                </div>
                <!-- end image -->

                <!-- Summery -->
                <div class="row my-3">
                    <div class="col-12">
                     <label for="summery">Summary</label>   
                    <textarea class="<?=isset($errors['summery']) ? 'textarea is-danger' : 'textarea is-info'?>" placeholder="Summary" id="summery" name="summery"><?=Helpers::get_old_value('summery')?></textarea>
                    <?= isset($errors['summery']) ? "<span class='text-danger'>". $errors['summery'] . "</span>" : "" ?>
                    </div>
                </div>
                <!-- end Summery -->


                <!-- article -->
                <div class="row my-3">
                    <div class="col-12">
                        <label for="article">Full Description</label>   
                        <textarea class="<?=isset($errors['article']) ? 'textarea is-danger' : 'textarea is-info'?>" placeholder="Full Description" rows="10" id="article" name="article"><?=Helpers::get_old_value('article')?></textarea>
                        <?= isset($errors['article']) ? "<span class='text-danger'>". $errors['article'] . "</span>" : "" ?>
                    </div>
                </div>
                <!-- end article -->


                <!-- Actions -->
                <div class="row my-5">
                    <div class="col-12 d-flex justify-content-around">
                        <a href="<?=ROOT?>/admin/products" class="button is-danger" style="text-decoration: none;" type="button">Cancel</a>
                        <button class="button is-info"  type="submit" name="submit">Save</button>
                    </div>
                </div>





            </form>
       
    </div>
    </div>

</div>


<?php $this->view('admin/dashboard-footer');?>
