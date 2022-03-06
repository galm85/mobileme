<?php $this->view('admin/dashboard-header');?>


<div class="row mt-5 mb-2">
    <div class="col-12">
        <h1 class="text-center text-primary display-5">Add New Brand</h1>
    </div>
</div>



<hr>


<div class="row justify-content-center my-5">
    <div class="col-6">    
        <span id="brandMessage"></span>
        <form id="addBrandForm" enctype="multipart/form-data" >

            <div class="row justify-space-between ">
                <div class="col-7">
                    
                    <input type="text" class="input is-info" id="title" name="title" placeholder="title" >
                    <span id="brandTitleError" class="text-danger"></span>
                </div>

                <div class="col-4 text-center">
                        <label class="file-label">
                            <input class="file-input" id="uploadBrandImageInput" type="file" name="image" >
                            <span class="file-cta">
                                <span class="file-icon"><i class="fas fa-upload"></i></span>
                                <span class="file-label">Upload Image</span>
                            </span>
                        </label>  
                        <span id="brandImageError" class="text-danger"></span>
                    </div>

            </div>

                <div class="row justify-content-center mt-5">
                    <div id="imageDisplay" class="col-6"></div>
                </div>



                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" id="addBrandBtn" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
        </form>
    </div>
</div>




<?php $this->view('admin/dashboard-footer');?>


<script >

            $('#uploadBrandImageInput').on('change',()=>{

            let file = $('#uploadBrandImageInput').prop('files')[0]

            let reader = new FileReader();
            reader.readAsDataURL(file);

            reader.onload = (e)=>{
            $('#imageDisplay').html(`<img width="100%" src="${e.target.result}" />`);
            }
            $('#brandImageError').html('');
            })


   
        $('#addBrandForm').submit(function(e){
            e.preventDefault();
            $.ajax({
                url:BASE_URL+'/admin/add_brand',
                method:'POST',
                data: new FormData(this),
                contentType:false,
                processData:false,
                success:function(response){
                        response = JSON.parse(response);
                        
                        if(response.status){
                            alert(response.message);
                            window.location = "<?=ROOT?>/admin/brands";
                        }else{
                           
                            $('#brandTitleError').html(response.errors.title);
                            $('#brandImageError').html(response.errors.image);
                        }
                }
            })
        })
   

 
   

</script>




