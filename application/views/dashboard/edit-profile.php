<div class="container">
    <div class="" style="margin:0 auto; width:500px; max-width:100%; user-select:none"  >
        <!-- User Profile -->
       <?php //print_r($data) ?>
        <section class="card" >
            <?php if($data["show"] == "comm"){ ?>
        <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
            <?php } ?>
            <div class="card-content">
                <div class="card-body">
                    <div class="">
                        <div class="">
                           
                            <div class="">
                              
                                   <?php if($data["show"] == "name"){ ?>
                                    <div class="">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="name"  required="" autofocus="" value="<?php echo $data["user"]["name"] ?>" style="font-size:20px">
                                            <label for="name">Name</label>
                                        </fieldset>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn" id="update_name" style="width:200px; max-width:100%">Save</button>
                                    </div>
                                        <?php } ?>

                                    <?php if($data["show"] == "email"){ ?>
                                    <div class="table-responsive">
                                       
                                        <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th><b>ADDRESS</b></th>
                                                        <th><b>STATUS</b></th>
                                                        <th><b>ACTION</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $_SESSION['email'] ?></td>
                                                        <td><span style='color:green'>Active</span></td>
                                                        <td>---</td>
                                                    </tr>
                                            <?php
                                            $emails = $data["emails"];
                                            
                                                foreach($emails as $email){
                                                    $verify = $email['verify'];
                                                    if($verify !="y"){
                                                        $verify = "<span style='color:orange'>Unverified - check your inbox</span";
                                                    }else{
                                                        $verify = "<span style='color:green'>Active</span";
                                                    }
                                            ?>
                                                    <tr>
                                                        <td><?php echo strtolower($email['email']) ?></td>
                                                        <td><?php echo $verify ?></td>
                                                        <td><a href=""><span style='color:red'>Delete</span></a></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                        </table>
                                        <div>
                                            <a href="javascript:void(0)" id="update_new_email"><b><span class="fa fa-plus"></span> <span>Add new email address</span></span></b></a>
                                        </div>
                                    </div>
                                    
                                   <?php } ?>

                                    <?php if($data["show"] == "phone"){ ?>
                                    <div class="">
                                        <fieldset class="form-label-group">
                                            <input type="phone" value="<?php echo $data["user"]["phone"] ?>" class="form-control" id="phone"  required="" autofocus="" style="font-size:20px">
                                            <label for="name">Phone</label>
                                        </fieldset>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn" id="update_phone" style="width:200px; max-width:100%">Save</button>
                                    </div>
                                   <?php } ?>

                                    <?php if($data["show"] == "comm"){ ?>
                                    <div class="">
     
                                       <h3 align="center">News, Promotion & Security</h3>
                                       <br>
                                       <p class="text-center">Send me the latest promotions, customer updates, product announcements, security headings and tips, on the following channels:</p>
                                       <br>
                                       <div style="text-align:normal">
                                       <div class="row">
                                    <div class="col-9">
                                        <p>Security Email</p>
                                    </div>
                                    <div class="col-3">
                                    <label class="switch">
                                        <input type="checkbox" id="security_emails" <?php if($data["pref"]["security_emails"] =="y"){ echo "checked";} ?>>
                                        <span class="slider round" id="push_email"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9">
                                        <p>Push notification</p>
                                    </div>
                                    <div class="col-3">
                                    <label class="switch" >
                                        <input type="checkbox" id="notification" <?php if($data["pref"]["push_notification"] =="y"){ echo "checked";} ?>>
                                        <span class="slider round" id="push_note"></span>
                                        </label>

                                        
                                    </div>
                                </div>
                                    </div>
                                    </div> 
                                   <?php } ?>

                                    <?php if($data["show"] == "ver"){ ?>
                                    <div class="">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="ver"  required="" autofocus="" style="font-size:20px">
                                            <label for="ver">Verification</label>
                                        </fieldset>
                                    </div>
                                   <?php } ?>

                                    <?php if($data["show"] == "country"){ ?>
                                    <div class="">
                                        
                                            <select class="form-control" id="country">
                                                <?php
                                                    for($i=0; $i<count($data["country"]); $i++){
                                                ?>
                                                <option <?php if($data["country"][$i] == $data["user"]["country"]){echo "selected='selected'"; } ?>><?php echo $data["country"][$i] ?></option>
                                                    <?php } ?>
                                            </select>
                                               
                                    </div><br>
                                    <div class="text-center">
                                        <button class="btn" id="update_country" style="width:200px; max-width:100%">Save</button>
                                    </div>
                                   <?php } ?>

                                    <?php if($data["show"] == "new_email"){ ?>
                                    <div class="">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="email_new"  required="" autofocus="" style="font-size:20px">
                                            <label for="comm">New email</label>
                                        </fieldset>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn" id="add_new_email" style="width:200px; max-width:100%">Add</button>
                                    </div>
                                    <div id="overlay"></div>
                                   <?php } ?>

                                  
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php if($data['show'] == "email"){ ?>
        <section style="margin:0 auto; text-align:center">
            <b><?php echo strtolower($_SESSION['email']) ?></b> is your primary email address.
            <p>We use your primary email address for communication and notifications.
Payments sent to any of your verified email addresses will be credited to your wallet.</p>
        </section>
        <?php } ?>
        <br><br>
        <div class="text-center"><button class="btn" style="background:#e74c3c" id="back"><i class="fa fa-arrow-left"></i> Back</button></div>
    </div>
    