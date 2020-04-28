<?php

class Settings extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>", "</div>");
    }

    private function password_template_view($args = [])
    {
        $args['password_settings_active'] = TRUE;
        $this->view('chanage_password', $args);
    }

    public function change_password()
    {

        if ($_SERVER["REQUEST_METHOD"] == "GET") :
            $query = $this->db->get("admin");
            $data = $query->result_array()[0];
            $_POST['username'] = $data["username"];
            $this->password_template_view();
        elseif ($_SERVER['REQUEST_METHOD'] == "POST") :
            $this->form_validation->set_rules("username", "Login Username", "required");
            if ($this->form_validation->run() === FALSE) {
                $this->password_template_view();
                return false;
            } else {
                $this->username = $this->input->post("username");
                $this->db->update("admin", ["username" => $this->username]);
            }
            if (!empty($this->input->post("old_password"))) {
                $this->form_validation->set_rules("old_password", "Old Password", 'required|callback_password_check');
                $new_password = $this->input->post("new_password");
                $this->form_validation->set_rules("new_password", "New Password", "required|min_length[8]");
                $this->form_validation->set_rules("confirm_new_password", "New Password", "required|callback_check_new_password[$new_password]");
                if ($this->form_validation->run() === FALSE) {
                    $this->password_template_view();
                    return;
                } else {
                    $this->username = $this->input->post("username");
                    $this->password = md5($this->input->post("confirm_new_password"));
                    $this->db->update("admin", ["password" => $this->password]);
                }
            }
            $this->password_template_view(['updated' => true]);
            return;
        endif;
    }

    public function password_check($password)
    {
        $query = $this->db->get("admin");
        $data = $query->result_array()[0];
        if ($data["password"] == md5($password)) {
            return TRUE;
        } else {
            $this->form_validation->set_message("password_check", "Old password incorrect");
            return FALSE;
        }
    }

    public function check_new_password($new_password, $confirm_password)
    {
        if ($confirm_password == $new_password) :
            return TRUE;
        else :
            $this->form_validation->set_message("check_new_password", "Confirm password does not match");
            return FALSE;
        endif;
    }

    public function web()
    {
        $data['web_settings_active'] = TRUE;
        if ($_SERVER['REQUEST_METHOD'] === "GET") :
            $_POST = $this->db->get("settings")->row_array();
            $this->view("website_settings", $data);
        else :

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|.svg';
            $this->load->library("upload", $config);
            if (!empty($_FILES['logo']['name'])) {
                if (!$this->upload->do_upload("logo")) {
                    return $this->view("website_settings", ["image_error" => "Invalid image", 'web_settings_active' => TRUE]);
                } else {
                    $_POST['logo'] = $this->upload->data("file_name");
                }
            }

            if (!empty($_FILES['mini_logo']['name'])) {
                if (!$this->upload->do_upload("mini_logo")) {
                    return $this->view("website_settings", ["image_error" => "Invalid image", 'web_settings_active' => TRUE]);
                } else {
                    $_POST['mini_logo'] = $this->upload->data("file_name");
                }
            }
            if (!isset($_POST['confirm_accounts'])) {
                $_POST['confirm_accounts'] = 0;
            }
            if (!isset($_POST['show_mining_price'])) {
                $_POST['show_mining_price'] = 0;
            }
            $this->db->update("settings", $_POST);

            return $this->view("website_settings", ["updated" => TRUE, 'web_settings_active' => TRUE]);
        endif;
    }

    public function faq_index()
    {
        $this->db->order_by("id DESC");
        $query = $this->db->get("faq_topic");
        $data["object_list"] = $query->result_array();
        if (isset($_SESSION['created'])) {
            $data["created"] = true;
        }
        if (isset($_SESSION['deleted'])) {
            $data["deleted"] = true;
        }
        $this->view("faq", $data);
    }

    public function faq_questions($id)
    {
        $this->db->order_by("id DESC");
        $query = $this->db->get_where("faq", array("faq_topic_id" => $id));
        $data["db"] = $this->db;

        $data["topic_details"] = $this->db->get_where("faq_topic", array("id" => $id))->row_array();
        $data["object_list"] = $query->result_array();
        if (isset($_SESSION['created'])) {
            $data["created"] = true;
        }
        $this->view("faq_questions", $data);
    }

    public function add_question($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['faq_topic_id'] = $id;
            $this->db->insert("faq", $_POST);
            $this->session->set_flashdata(array("created" => true));
            redirect(base_url('/faq/' . $id . '/questions/'));
            die();
        }
        $this->view("add_question");
    }

    public function delete_question($id, $question_id)
    {
        $data["question_details"] = $this->db->get_where("faq", array("id" => $id))->row_array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "Here";
            $this->db->delete("faq", array("id" => $question_id));
            $this->session->set_flashdata(array("deleted" => true));
            redirect(base_url('/faq/' . $id . '/questions/'));
        } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->view("confirm_question_delete", $data);
        }
    }

    public function create_topic()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $this->view("faq_topic");
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->insert("faq_topic", $_POST);
            $this->session->set_flashdata(array("created" => true));
            redirect("faq/");
        }
    }

    public function delete_topic($id)
    {
        $data["topic_details"] = $this->db->get_where("faq_topic", array("id" => $id))->row_array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->delete("faq_topic", array("id" => $id));
            $this->db->delete("faq", array("faq_topic_id" => $id));
            $this->session->set_flashdata(array("deleted" => true));
            redirect(base_url('/faq/'));
        } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->view("confirm_delete_topic", $data);
        }
    }

    public function payment_settings()
    {
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['btc_info'])) {
                unset($_POST['btc_info']);
                $this->update_btc_settings();
                die();
            } elseif (isset($_POST['paypal_info'])) {
                unset($_POST['paypal_info']);
                $this->update_settings("paypal");
                die();
            } elseif (isset($_POST['cashapp_info'])) {
                unset($_POST['cashapp_info']);
                $this->update_settings("cashapp");
                die();
            }
        } elseif ($_SERVER['REQUEST_METHOD'] = 'GET') {
            if (isset($_SESSION['updated'])) {
                $data["updated_type"] = $_SESSION['type'];
            }
            $this->view("payment_settings", $data);
        }
    }

    private function update_btc_settings()
    {
        $config['upload_path']          = '../uploads/';
        $config['allowed_types']        = 'gif|jpg|png|.svg';
        $this->load->library("upload", $config);
        if (!empty($_FILES['btc_qrcode']['name'])) {
            if (!$this->upload->do_upload("btc_qrcode")) {
                $this->view("payment_settings", ["image_error" => "Invalid image", 'web_settings_active' => TRUE]);
            } else {
                $_POST['btc_qrcode'] = 'uploads/' . $this->upload->data("file_name");
            }
        }
        $this->db->update("settings", $_POST);
        $this->session->set_flashdata(array("updated" => true, "type" => "btc"));
        redirect("/settings/payments/");
    }

    private function update_settings($type)
    {
        $this->db->update("settings", $_POST);
        $this->session->set_flashdata(array("updated" => true, "type" => $type));
        redirect("/settings/payments/");
    }
}
