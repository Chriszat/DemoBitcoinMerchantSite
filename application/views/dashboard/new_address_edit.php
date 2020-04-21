<div class="container">
    <div class="" style="margin:0 auto; width:500px; max-width:100%; user-select:none"  >
      <h3>Create address</h3>
       
       <?php //print_r($data) ?>
        <section class="card" >
            <div class="card-content">
                <div class="card-body">
                    <div class="">
                        <div class="">
                           
                            <div class="">
                        <p>Create new address for receiving <?php echo $data["coin_type"] ?></p>
                                    <div class="">
                                        <fieldset class="form-label-group">
                                            <input type="text" class="form-control" id="label"  required="" autofocus="" style="font-size:20px">
                                            <label for="comm">Address label</label>
                                        </fieldset>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn" id="create" style="width:200px; max-width:100%">Create</button>
                                    </div>
                                    <div id="overlay"></div>
                                  
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <br><br>
        <div class="text-center"><button class="btn" style="background:#e74c3c" id="cancel"><i class="fa fa-times"></i> Cancel</button></div>
    </div>
    