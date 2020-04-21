
<?php
if(!empty($data["transaction_data"])){
   
?>
<div class="container">
    <?php //print_r($data) ?>
    <div class="z-depth-2">
        <div class="tran-content">
            <?php
               $data = $data["transaction_data"];
               $date_filter = [];
               $count = 0;
               foreach($data as $item){
                   $count++;
                   $extract = explode("-", $item["date"]);
                   $extract_date = $extract[0].$extract[1];
                   $str = explode(" ", $extract_date)[0];
                   $extract_date = $str;
                   if(array_key_exists($extract_date, $date_filter)){
                       $date_filter[$extract_date][$count] = $item;
                   }else{
                       $date_filter[$extract_date][$count] = $item;
                   }
               }
            //    print_r($date_filter);
               $keys = array_keys($date_filter);
               for($i = 0; $i<count($keys); $i++){
                  $key = $keys[$i];
                  $key_split  = str_split($key);
                  $year = $key_split[0].$key_split[1].$key_split[2].$key_split[3];
                  $month = $key_split[4].$key_split[5];
                  $date_helper = $this->helper("DateHelper");
                  $data = $date_filter[$key];
                  
             ?>
             
            <div class="content-1">
                <div class="tran-date">
                <?php echo $date_helper->month($month) ?> <?php echo $year ?>
                </div>
                <?php 
                foreach($data as $item){
                    
                ?>
                <div class="card-footer">
                    <span><?php echo $item['title'] ?></span>
                   
                    <span class="float-right"><?php echo $item['currency'] ?> <?php echo $item["amount"] ?></span>
                </div>
                
                    <?php } ?>
               
            </div>
                <?php } ?>

            



        </div>
    </div>
</div>
<?php }else{ ?>

<div class="container">
<div class="tran-content" style="margin:0 auto; width:500px; max-width:100%">
    <div style="width:500px; height:500px">
        <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/await.png" style="width:100%" />
    </div>
</div>
</div>
<?php } ?>