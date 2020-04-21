
<link rel="stylesheet" href="application/shared/css/cards.css" >
<div class="container" style="user-select:none">
<?php //print_r($data); ?>
            <div class="" style="margin:0 auto; width:700px; max-width:100%">
    <div class="">
       
        <div class="card">
            <div class="card-content">
                <div class="head-content" >
                    <div class="center" >
                        <br>
                        <p style="font-size:20px; font-family: 'Open Sans', sans-serif;"><b>Confirm checkout!</b></p>
                       
                    </div>
                </div>
               
                <div class="card-body" style="user-select:none;padding:10px" id="bt">
                   <div class="btc-content text-center" style="margin:0 auto; width:400px; max-width:100%;">
                   
                        <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/6.png" />
                    
                     
                      <div> <br><br>
                    <p >Buy <b><?php echo $data['type'] ?> <?php echo $data['recieve'] ?><br> at <?php echo $data['type'] ?>/<?php echo $data["with"] ?> <?php echo $data["round"] ?></b></p>
                   </div>
                   <hr>

                   <div>
                    <div>
                        <span><b>You receive</b></span>
                        <span class="float-right" ><b><?php echo $data['type'] ?> <?php echo $data['recieve'] ?></b></span>
                    </div>
                    
                    
                   </div>
                   <div>
                   <div>
                        <span class="" style="margin-left:0"><b>You spend</b></span>
                        <span class="float-right"><b><?php echo $data['with'] ?> <?php echo $data['amount'] ?></b></span>
                    </div>
                    </div>
                

                  <hr>
                    <div class="text-center"><button class="btn" id="confirm" style="width:250px; max-width:100%" >Confirm Purchase</button><br><br>
                   </div>
                  
                  
                </div>
                

                </div>

            </div>
        </div>
    </div>

   
</div>


        </div>
    </div>
</div>
</div>
</div><br>
<div class="text-center"><button  class="btn" id="cancel" style="background:#eb3b5a"><span class="fa fa-times"></span> &nbsp;Cancel</button></div>