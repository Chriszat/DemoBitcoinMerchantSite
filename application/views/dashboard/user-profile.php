<div class="container" id="view">
    <div class="" style="margin:0 auto; width:500px; max-width:100%; user-select:none" >
        <!-- User Profile -->
       <?php //print_r($data) ?>
        <section class="card" >
            <div class="card-content">
                <div class="card-body">
                    <div class="">
                        <div class="">
                           
                            <div class="">
                          
                                 <div class="card" id="name" style="background:#f2f2f2; padding:10px; cursor:pointer">
                                       <span><b>Name</b></span>
                                       <span style="color:green" id="display_name"><?php echo ucwords($data["user"]["name"]) ?></span>
                                    </div>
                                   
                                
                                     <a href="wallet/profile/email/" style="color:gray"><div class="card" style="background:#f2f2f2; padding:10px; cursor:pointer">
                                       <span><b>Email</b></span>
                                       <span style="color:green"><?php echo strtolower($data["user"]["email"]) ?></span>
                                    </div></a>
                                  
                                 

                                      <div class="card" id="phone" style="background:#f2f2f2; padding:10px; cursor:pointer">
                                       <span><b>Phone</b></span>
                                       <span style="color:green" id="display_phone"><?php echo $data["user"]["phone"] ?></span>
                                    </div>

                                    <div class="card" id="country" style="background:#f2f2f2; padding:10px; cursor:pointer">
                                       <span><b>Country</b></span>
                                       <span style="color:green" id="display_country"><?php echo ucwords($data["user"]["country"]) ?></span>
                                    </div>
                                   
                                    
                                    <div class="card" id="comm" style="background:#f2f2f2; padding:10px; cursor:pointer">
                                       <span><b>Communication</b></span>
                                       <span style="color:green" id="display_comm">Enabled</span>
                                    </div>

                                    <div class="card" id="ver" style="background:#f2f2f2; padding:10px; cursor:pointer">
                                       <span><b>Verification</b></span>
                                       <span style="color:green">Email verified</span>
                                    </div>

                                    <div class="card" id="ver" style="background:#f2f2f2; padding:10px; cursor:pointer">
                                       <span><b>Identity Photo</b></span>
                                       <div style="width:100px">
                                           <img src="<?php echo $data['user']['image'] ?>" id="preview" style="width:100%">
                                       </div><br>
                                       <form id="identity_form">
                                       <div style="display:flex; justify-content:space-between">
                                       <input type="file" name="file" id="file" class="d-none">
                                       <button><label for="file"><i class="fa fa-edit"></i> Change </label></button>
                                       
                                       <span><button disabled id="upload_btn"><i class="fa fa-check"></i> Save Changes</button></span>
                                       </form>
                                       
                                    </div>
                                    </div>
                                
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    