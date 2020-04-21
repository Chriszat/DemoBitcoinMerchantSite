<?php
use Endroid\QrCode\QrCode;

class Account extends Base
{
    public function __construct()
    {
        //TODO
        parent::__construct();
        $this->getter = $this->load->helper("GetterHelper");
        $this->wallet = $this->getter->user_wallet();
        $this->con = $this->connection;
    }

    public function index()
    {
        $data=$this->wallet;
        $this->load->template(view_map["dashboard"][3], "dashboard", $data);
    }

    public function btc()
    {
       
        $data=$this->wallet;
        $data["btc_address"] =  $this->getter->get_bitcoin_address();
        $data["btc_transaction"] = $this->getter->get_transaction("BTC");
        $data["show"] = "btc";
       
        if(isset($_GET['t'])){
            ob_start();
            

            $this->load->template(view_map["dashboard"][18], "dashboard", $data);
            $wallet_tab_view = ob_get_contents();
            ob_end_clean();
     
             ob_start();
             $this->load->template(view_map["dashboard"][19], "dashboard", $data);
             $trans_tab_view = ob_get_contents();
             ob_end_clean();
     
             ob_start();
             $this->load->template(view_map["dashboard"][20], "dashboard", $data);
             $address_tab_view =  ob_get_contents();
             ob_end_clean();
             
            echo json_encode(array("wallet_view"=>$wallet_tab_view, "trans_view"=>$trans_tab_view, "address_view"=>$address_tab_view));
            
             return;
        }
       
        
        $this->load->template(view_map["dashboard"][16], "dashboard", $data);
        
    }

    public function eth()
    {
       
        $data=$this->wallet;
        $data["eth_address"] =  $this->getter->get_ethereum_address();
        $data["eth_transaction"] = $this->getter->get_transaction("ETH");
        $data["show"] = "eth";
       
        if(isset($_GET['t'])){
            ob_start();
            

            $this->load->template(view_map["dashboard"][18], "dashboard", $data);
            $wallet_tab_view = ob_get_contents();
            ob_end_clean();
     
             ob_start();
             $this->load->template(view_map["dashboard"][19], "dashboard", $data);
             $trans_tab_view = ob_get_contents();
             ob_end_clean();
     
             ob_start();
             $this->load->template(view_map["dashboard"][20], "dashboard", $data);
             $address_tab_view =  ob_get_contents();
             ob_end_clean();
             
            echo json_encode(array("wallet_view"=>$wallet_tab_view, "trans_view"=>$trans_tab_view, "address_view"=>$address_tab_view));
            
             return;
        }
       
        
        $this->load->template(view_map["dashboard"][21], "dashboard", $data);
        
    }


    public function usd()
    {
       
        $data=$this->wallet;
        $data["show"] = "usd";
        $data["usd_transaction"] = $this->getter->get_transaction("USD");
        if(isset($_GET['t'])){
            ob_start();
            

            $this->load->template(view_map["dashboard"][18], "dashboard", $data);
            $wallet_tab_view = ob_get_contents();
            ob_end_clean();
     
             ob_start();
             $this->load->template(view_map["dashboard"][19], "dashboard", $data);
             $trans_tab_view = ob_get_contents();
             ob_end_clean();
     
             ob_start();
             $this->load->template(view_map["dashboard"][20], "dashboard", $data);
             $address_tab_view =  ob_get_contents();
             ob_end_clean();
             
            echo json_encode(array("wallet_view"=>$wallet_tab_view, "trans_view"=>$trans_tab_view, "address_view"=>$address_tab_view));
            
             return;
        }
       
        
        $this->load->template(view_map["dashboard"][22], "dashboard", $data);
        
    }
    

     /**
     * Load name change view
     */
    public function request_change()
    {
        ob_start();
        if(!isset($_GET['t'])){
            return false;
        }
        $data["show"] = $_GET['t'];
        $data["coin_type"] = $_GET["b"];
        
        // $data["user"] = $this->getter->user_data($_SESSION['id']);
        // $data["country"] = $this->country->country();
        // $data["emails"] = $this->getter->secondary_emails(false);
        // $data["pref"] = $this->getter->get_preferences();
       $this->load->template(view_map["dashboard"][17], "dashboard", $data);
       $output =   ob_get_contents();
       ob_end_clean();
       echo json_encode(array("status"=>"success", "view"=>$output));

    }
    
    /**
     * Create new bitcoin address
     */
    public function add_address()
    {
        $con = $this->con;
        $address = $this->generate_bitcoin_address();
        if(isset($_POST['label'])){
            $label = $_POST['label'];
            if(!empty($label)){
                if(strlen($label)>250){
                    echo json_encode(array("status"=>"error", "message"=>"Label text length exceeds minimum of 250 characters"));
                    return;
                }
                $barcode_path  = $address.'.png';
                $query = mysqli_query($con, "INSERT INTO btc_address (user, address, label, barcode_path) VALUES ('$_SESSION[id]', '$address', '$label', '$barcode_path')");
                if($query){
                    $data = "
                            <tr>
                                <td ><span style='color:white; background:#262626; border-radius:4px; cursor:pointer'>".$address."</span><br>".$label."</td>
                                <td style='color:green'>BTC 0.00000000</td>
                            </tr>
                    ";
                    $this->generate_qrcode($address);
                    echo json_encode(array("status"=>"success", "message"=>"Created", "address"=>$address, "data"=>$data));
                    return;
                }else{
                    echo json_encode(array("status"=>"error", "message"=>"Address not formed!"));
                    return;
                }
            }else{
                echo json_encode(array("status"=>"error", "message"=>"Please provied a label for the address"));
                return;
            }
        }
    }

    /**
     * Create new ethreum address
     */
    public function add_eth_address()
    {
        $con = $this->con;
        $address = $this->generate_ethereum_address();
        if(isset($_POST['label'])){
            $label = $_POST['label'];
            if(!empty($label)){
                if(strlen($label)>250){
                    echo json_encode(array("status"=>"error", "message"=>"Label text length exceeds minimum of 250 characters"));
                    return;
                }
                $barcode_path  = $address.'.png';
                $query = mysqli_query($con, "INSERT INTO eth_address (user, address, label, barcode_path) VALUES ('$_SESSION[id]', '$address', '$label', '$barcode_path')");
                if($query){
                    $data = "
                            <tr>
                                <td ><span style='color:white; background:#262626; border-radius:4px; cursor:pointer'>".$address."</span><br>".$label."</td>
                                <td style='color:green'>ETH 0.00000000</td>
                            </tr>
                    ";
                    $this->generate_ethereum_qrcode($address);
                    echo json_encode(array("status"=>"success", "message"=>"Created", "address"=>$address, "data"=>$data));
                    return;
                }else{
                    echo json_encode(array("status"=>"error", "message"=>"Address not formed!"));
                    return;
                }
            }else{
                echo json_encode(array("status"=>"error", "message"=>"Please provied a label for the address"));
                return;
            }
        }
    }

    public function generate_bitcoin_address()
    {
        $rand = substr(str_shuffle("123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 34);
        return $rand;
        
    }

    public function generate_ethereum_address()
    {
        $rand = substr(str_shuffle("123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 42);
        return $rand;
        
    }
    
    public function generate_qrcode($name)
    {
        $qrCode = new QrCode('bitcoin:'.$name);
        $qrCode->setSize(200);
        $img = $qrCode->writeString();
        $qrCode->writeFile('../81744546ec70b93f065c7321407215727ea39750f52b909dcb/barcodes/'.$name.'.png');
    }


    public function generate_ethereum_qrcode($name)
    {
        $qrCode = new QrCode('ethereum:'.$name);
        $qrCode->setSize(200);
        $img = $qrCode->writeString();
        $qrCode->writeFile('../81744546ec70b93f065c7321407215727ea39750f52b909dcb/barcodes/'.$name.'.png');
    }

    public function bit_pan_view()
    {
        $con = $this->con;
        if(isset($_POST['bit_id'])){
            $bit_id = $_POST['bit_id'];
            $query  = mysqli_query($con, "SELECT * FROM btc_address WHERE id='$bit_id' LIMIT 1");
            $data = mysqli_fetch_assoc($query);
            $qrcode_image = "81744546ec70b93f065c7321407215727ea39750f52b909dcb/barcodes/".$data["barcode_path"];
            $address = $data["address"];
            $label = $data["label"];
            $view = "
                <div>
                    <div id='qrcode'>
                        <img src='81744546ec70b93f065c7321407215727ea39750f52b909dcb/barcodes/".$address.".png' id='qrimg'>
                    </div><br>
                    <p style='color:black'>".$address." <button class='bb' data-clipboard-text='".$address."'>
                    Copy
                </button></p>
                    <p>".$label." 
                </p>
                    <div style='width:500px; margin:0 auto; max-width:100%'>
                    <div class='row'>
                    <div class='col-md-4'>
                    <button class='btn' style='width:100%; color:red' disabled>BTC</button>
                       
                    </div>
                    <div class='col-md-8'>
                      <fieldset class='form-label-group'>
                          <input type='text' class='form-control' name='amount' id='amount' placeholder='Amount to receive'  required='' autofocus='' >
                          <label for='amount'>Amount to receive (optional)</label>
                      </fieldset>
                    </div>
                </div>
                <p><i class='material-icons'>warning</i> Do not send Bitcoin Cash (BCH) to this address</p>
                </div>
                    <a href='javascript:void(0)' id='goback'><span class='fa fa-arrow-left'></span> <b>Back</b></a>
                </div>
            ";
            echo json_encode(array(
                "status"=>"success",
                "address"=>$address,
                "label" => $label,
                "qrcode_image"=>$qrcode_image,
                "view" =>$view
            ));
            return true;

        }else{
            echo json_encode(array("status"=>"error"));
            return FALSE;
        }
    }

    public function eth_pan_view()
    {
        $con = $this->con;
        if(isset($_POST['eth_id'])){
            $bit_id = $_POST['eth_id'];
            $query  = mysqli_query($con, "SELECT * FROM eth_address WHERE id='$bit_id' LIMIT 1");
            $data = mysqli_fetch_assoc($query);
            $qrcode_image = "81744546ec70b93f065c7321407215727ea39750f52b909dcb/barcodes/".$data["barcode_path"];
            $address = $data["address"];
            $label = $data["label"];
            $view = "
                <div>
                    <div id='qrcode'>
                        <img src='81744546ec70b93f065c7321407215727ea39750f52b909dcb/barcodes/".$address.".png' id='qrimg'>
                    </div><br>
                    <p style='color:black'>".$address." <button class='bb' data-clipboard-text='".$address."'>
                    Copy
                </button></p>
                    <p>".$label."</p>
                    <div style='width:500px; margin:0 auto; max-width:100%'>
                    <div class='row'>
                    <div class='col-md-4'>
                    <button class='btn' style='width:100%; color:red' disabled>ETH</button>
                       
                    </div>
                    <div class='col-md-8'>
                      <fieldset class='form-label-group'>
                          <input type='text' class='form-control' name='amount' id='amount' placeholder='Amount to receive'  required='' autofocus='' >
                          <label for='amount'>Amount to receive (optional)</label>
                      </fieldset>
                    </div>
                </div>
                <p><i class='material-icons'>warning</i> Do not send ETC or ERC20 tokens to this address</p>
                </div>
                    <a href='javascript:void(0)' id='goback'><span class='fa fa-arrow-left'></span> <b>Back</b></a>
                </div>
            ";
            echo json_encode(array(
                "status"=>"success",
                "address"=>$address,
                "label" => $label,
                "qrcode_image"=>$qrcode_image,
                "view" =>$view
            ));
            return true;

        }else{
            echo json_encode(array("status"=>"error"));
            return FALSE;
        }
    }
    
}