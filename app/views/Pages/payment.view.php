<?php $this->view('includes/header');?>

    <div class="container bg-light" style="margin-top: 120px;">
        
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 text-center">Payment</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <form action="" id="payment_form">
                    
                    <div class="row my-4">
                        <div class="col-6">
                            <label for="first_name">FirstName</label>
                            <input type="text" name="first_name" id="first_name" class="input is-info">
                            <span class="text-danger" id="first_name_error"></span>

                        </div>
                        <div class="col-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="input is-info">
                            <span class="text-danger" id="last_name_error"></span>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="input is-info">
                            <span class="text-danger" id="email_error"></span>
                            
                        </div>
                        <div class="col-6">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="input is-info">
                            <span class="text-danger" id="phone_error"></span>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12">
                            <label for="address">Shipment Address</label>
                            <input type="text" name="address" id="address" class="input is-info">
                            <span class="text-danger" id="address_error"></span>
                        </div>
                    </div>
                    
<hr class="my-5">
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="select is-info"id="credit_card" >
                                <select name="credit_card"  width="100%">
                                    <option value="">Select Credit Card</option>
                                    <option value="master_card">Master Card </option>
                                    <option value="visa">Visa</option>
                                    <option value="america_express">American Express</option>
                                    <option value="diners">Diners</option>
                                </select>
                            </div>
                            <span class="text-danger" id="credit_card_error"></span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="card_number" id="card_number" class="input is-info" placeholder="Card Number"> 
                            <span class="text-danger" id="card_number_error"></span>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="ccv_number" id="ccv_number" class="input is-info" placeholder="CCV Number"> 
                            <span class="text-danger" id="ccv_number_error"></span>
                        </div>
                    </div>


                    <div class="row mt-5">
                        <div class="col-md-6">
                            <input type="text" name="card_holder" id="card_holder" class="input is-info" placeholder="Card Holder Name">
                            <span class="text-danger" id="card_holder_error"></span>

                        </div>
                        <div class="col-md-3 text-center">
                            <div class="select is-info "id="exp_month">
                                <select name="exp_month" >
                                    <option value="">Exp. Month</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <span class="text-danger" id="exp_month_error"></span>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="select is-info"  id="exp_year">
                                <select name="exp_year">
                                    <option value="">Exp. Year</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                </select>
                            </div>
                            <span class="text-danger" id="exp_year_error"></span>
                        </div>
                    </div>
<hr class="my-5">



                    <div class="row my-5">
                        <div class="col-12 d-flex justify-content-between">
                                <a href="<?=ROOT?>/cart" class="btn btn-outline-danger">Return</a>
                                <button type="submit" class="btn btn-primary">Finish</button>
                        </div>
                    </div>
                
                </form>
            </div>
        </div>


    </div


<?php $this->view('includes/footer');?>