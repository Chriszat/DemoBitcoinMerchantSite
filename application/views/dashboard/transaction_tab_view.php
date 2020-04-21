<?php
$d = $data;
// print_r($d);
if($data["show"] == "btc"){
?>

 <div class="tran-content" style="text-align:left">
            <?php
               $data = $data["btc_transaction"];
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
                   
                    <span class="float-right" style="color:black"><b><?php echo $item['currency'] ?> <?php echo $item["amount"] ?></b></span>
                </div>
                
                    <?php } ?>
               
            </div>
                <?php } ?>

            



        </div>
<?php } ?>

<?php
if($d["show"] == "eth"){
?>

 <div class="tran-content" style="text-align:left">
            <?php
               $data= $d["eth_transaction"];
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
                   
                    <span class="float-right" style="color:black"><b><?php echo $item['currency'] ?> <?php echo $item["amount"] ?></b></span>
                </div>
                
                    <?php } ?>
               
            </div>
                <?php } ?>

            



        </div>
<?php } ?>

<?php
if($d["show"] == "usd"){
?>

 <div class="tran-content" style="text-align:left">
            <?php
               $data= $d["usd_transaction"];
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
                   
                    <span class="float-right" style="color:black"><b><?php echo $item['currency'] ?> <?php echo $item["amount"] ?></b></span>
                </div>
                
                    <?php } ?>
               
            </div>
                <?php } ?>

            



        </div>

<?php } ?>