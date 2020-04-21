<?php

/**
 * User dashboard class
 */


class Dashboard extends Base
{
    public function __construct()
    {
        //TODO
        parent::__construct();
        $this->validate = $this->load->helper("application\core\Validation\Validation");
        $this->mail = $this->load->helper("SendEmail");
        $this->getter = $this->load->helper("GetterHelper");
        $this->setter = $this->load->helper("SetterHelper");
        $this->con = $this->connection;
    }

    public function index()
    {
        if($this->num_login_times() == 1){
            $this->setter->increment_login_times(2);
            $this->load->template(view_map["dashboard"][0], "dashboard");
        }else{
            $data = $this->getter->settings();
            $sitename = $data["sitename"];
            $split = str_split($sitename);
            $newstring = "";
            for ($i=0; $i<count($split); $i++){
                $newstring.=$split[$i].' ';
            }
            $data["sitename_split"] = $newstring;
            $this->load->template(view_map["dashboard"][1], "dashboard", $data);
        }
    }

    public function cards()
    {
    
        $data = $this->getter->settings();
        $sitename = $data["sitename"];
        $split = str_split($sitename);
        $newstring = "";
        for ($i=0; $i<count($split); $i++){
            $newstring.=$split[$i].' ';
        }
        $data["sitename_split"] = $newstring;
        $this->load->template(view_map["dashboard"][2], "dashboard", $data);
    }

    public function get_notifications($count = FALSE)
    {
        $con = $this->con;
        if($count == FALSE){
            $query = mysqli_query($con, "SELECT * FROM notification WHERE user='$_SESSION[id]' AND seen='n' ORDER BY id DESC");
        }else{
            $query = mysqli_query($con, "SELECT COUNT(*) as sum FROM notification WHERE user='$_SESSION[id]' AND seen='n' ORDER BY id DESC");
        }
        
        
        if($count == FALSE){
            $data  = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $result = "";
            foreach($data as $item){
                $result.='
                <a href="javascript:void(0)">
                    <div class="media">
                    <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                    <div class="media-body">
                        <h6 class="media-heading">'.ucwords($item['title']).'</h6><small>
                        <time class="media-meta text-muted" datetime="'.$item['date'].'">Last month</time></small>
                    </div>
                    </div></a>';
            }
            echo $result;
        }else{
            return mysqli_fetch_assoc($query)['sum'];
        }
        
        return;
    }

    public function count_notification()
    {
        echo $this->get_notifications(TRUE);
        return;
    }

} 