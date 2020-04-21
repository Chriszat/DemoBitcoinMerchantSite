<div class="container" id="view">
    <div class="" style="margin:0 auto; width:800px; max-width:100%; user-select:none"  >
        <!-- User Profile -->
       <?php //print_r($data) ?>
        <section class="card" >
            <div class="card-content">
                <div class="card-body">
                    <div class="">
                        <div class="">
                           
                            <div class="">
                              
                                    <div class="table-responsive">
                                       
                                        <table class="table table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th><b>ADDRESS</b></th>
                                                        <th><b>STATUS</b></th>
                                                        <th><b>ACTION</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="email_table">
                                                    <tr>
                                                        <td><?php echo $_SESSION['email'] ?></td>
                                                        <td><span style='color:green'>Active</span></td>
                                                        <td>---</td>
                                                    </tr>
                                            <?php
                                            $emails = $data["emails"];
                                           
                                                foreach($emails as $email){
                                                    $verify = $email['verify'];
                                                    $id = $email["id"];
                                                    if($verify !="y"){
                                                        $verify = "<span style='color:orange'>Unverified - check your inbox</span";
                                                    }else{
                                                        $verify = "<span style='color:green'>Active</span";
                                                    }
                                            ?>
                                                    <tr id="<?php echo $id ?>">
                                                        <td><?php echo strtolower($email['email']) ?></td>
                                                        <td><?php echo $verify ?></td>
                                                        <td><a href="javascript:void(0)" onclick="remove('<?php echo $id ?>', '<?php echo $email['email'] ?>')"><span style='color:red'>Delete</span></a></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                        </table>
                                        <div>
                                            <a href="javascript:void(0)" id="update_new_email"><b><span class="fa fa-plus"></span> <span>Add new email address</span></span></b></a>
                                        </div>
                                    </div>
                                    
                               
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
        <section style="margin:0 auto; text-align:center">
            <b><?php echo strtolower($_SESSION['email']) ?></b> is your primary email address.
            <p>We use your primary email address for communication and notifications.
Payments sent to any of your verified email addresses will be credited to your wallet.</p>
        </section>
        
        <br><br>
        <div class="text-center"><a href="wallet/profile/"><button class="btn" style="background:#e74c3c" id="back"><i class="fa fa-arrow-left"></i> Back</button></a></div>
    </div>
