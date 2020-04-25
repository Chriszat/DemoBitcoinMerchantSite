<?php //print_r($data);
?>

<link rel="stylesheet" href="application/shared/css/cards.css">
<div class="container" style="user-select:none" id="view">

    <div  style="width:600px; margin:0 auto; max-width:100%">

        <div class="card" style="border-radius:0; ">
            <div class="card-content">
                <div class="head-content">


                </div>

                <div class="card-body" style="user-select:none;" id="tab_view">
                <div class="alert alert-info" style="color:#fff!important">
                    Your previous submitted KYC documents was rejected by us. Please submit a clear valid KYC document.
                </div> 
               <form id="kyc_form">
               <div class="form-group">
                    <div>
                        <img src="" alt="" style="width:100%" id="preview">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Select a valid verification document</label>
                    <input type="file" name="file" class="form-control" id="file">
                    <small class="text-danger">File must be of type (*.jpg, *.png, *jpeg) only</small>
                </div>
                <div class="form-group">
                    <button class="btn" id="upload_btn" style="color:#fff; background:green;" disabled>
                    <i class="fa fa-upload"></i>
                    Upload Document</button>
                </div>
               </form>
                </div>
            </div>

        </div>

    </div>

    <div class="text-center">
        <a href="wallet/accounts/"><button class="btn" style="background:#e74c3c"><span class="fa fa-arrow-left"></span> Back</button></a>
    </div>