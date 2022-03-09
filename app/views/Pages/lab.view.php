<?php
    $this->view('includes/header');    
   

?>
<style>
  .main-banner{
    width: 100%;
    height: 30vh;
    position: relative;
  }
  .main-banner img{
    height: 100%;
    width: 100%;
    object-fit: cover;
  }

  .banner-data{
    position:absolute;
    top:50%;
    left:50%;
    font-size: 3rem;
    transform:translate(-50%,-50%);
    display: flex;
    align-items: center;
  }

  .main-title{
    font-size: 4rem;
    font-weight: 700;
    color:white;
    letter-spacing: 1.2px;
    width: 500px;
    background-color: rgba(0, 0, 0, 0.5);
    text-align: center;
    border-radius: 10px;
  }
  #message{
      position: fixed;
      width: 50%;
      height: 300px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      top:200px;
      left:50%;
      transform: translateX(150%);
      z-index: 10;
      background-color: rgba(0, 0, 0, 0.9);
      color: white;
      border-radius: 20px;
      box-shadow: 2px 2px 5px black;
      transition: all ease 0.6s;
  }

  #message button{
      position: absolute;
      top:30px;
      right:30px;
      background-color: white;
      color:red;
      border: none;
      height: 40px;
      width: 40px;
      border-radius: 50%;
  }

  
</style>


  <div class="main-banner">
    <img src="<?=ASSETS?>/images/labbanner.jpg"  alt="iphone 13 banner" style="filter: blur(1.5px);">
    <div class="banner-data">
      <h1 class="main-title ">LAB</h1>
    </div>
  </div>

  <div id="message" >
      <h3>Thank You</h3>
      <h5 class="my-2">We recived your issue. We will exam it and contact we you as soon as possible</h5>
      <button id="close_message" class="fw-bold">X</button>
  </div>

  <div class="container">
    <div class="row my-5">
        <div class="col-12">
            <div class="text-center">
                <h3 class="text-primary display-5">Our Lab</h3>
                <p><b>Address: </b> 105 Disengoff St., Tel Aviv</p>
                <p><b>Phone: </b> 03-66985452</p>
                <p><b>Email: </b> lab@mobileme.com</p>
            </div>
            <hr>
            <div class="text-center">
                <h3 class="text-primary">Contact Us</h3>
                <h5> You can leave your details and the issue and we will contact with you as soon as posible</h5>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-10">
            <form id="lab_form">
                <div class="row d-flex justify-content-between">
                    <div class="col-5 d-flex flex-column justify-content-between">
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" name="full_name" id="full_name">
                            <span class="text-danger" id="full_name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                            <span class="text-danger" id="email_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                            <span class="text-danger" id="phone_error"></span>

                        </div>
                    </div>
               
                    <div class="col-7">
                        <label for="issue">What is the issue</label>
                        <textarea name="issue" id="issue" cols="30" rows="8" class="form-control"></textarea>
                        <span class="text-danger" id="issue_error"></span>

                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-12">
                       <div class="text-center">
                           <button type="submit" class="btn btn-primary">SEND</button>
                       </div>
                    </div>
                </div>
               
            </form>
        </div>
    </div>

  </div>


  







<?php $this->view('includes/footer'); ?>


<script>
    const labForm = document.getElementById('lab_form');
    const nameInput = document.getElementById('full_name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const issue = document.getElementById('issue');

    const messageBox = document.getElementById('message');
    const messageBtn = document.getElementById('close_message');

    let nameError = document.getElementById('full_name_error');
    let emailError = document.getElementById('email_error');
    let phoneError = document.getElementById('phone_error');
    let issueError = document.getElementById('issue_error');

    const clearErrors = ()=>{
        nameError.innerHTML = "";
        emailError.innerHTML = "";
        phoneError.innerHTML = "";
        issueError.innerHTML = "";
    }

    labForm.addEventListener('submit',(e)=>{
        e.preventDefault();
        clearErrors();
        
        let valid = true;

       if(nameInput.value == ''){
           nameError.innerHTML = '* please insert full name';
           valid = false;
       }
       if(emailInput.value == ''){
            emailError.innerHTML = '* please insert valid Email';
            valid = false;
       }
       if(phoneInput.value == ''){
            phoneError.innerHTML = '* please insert a phone number';
            valid = false;
       }
       if(issue.value == ''){
            issueError.innerHTML = '* please explain the problem';
            valid = false;
       }

       if(valid){
           clearErrors();
           messageBox.style.transform = 'translateX(-50%)';
           
       }
    })


    messageBtn.addEventListener('click',()=>{
        messageBox.style.transform = 'translateX(150%)';
        setTimeout(()=>{
            window.location = BASE_URL + '/';

        },700);
    })

</script>

