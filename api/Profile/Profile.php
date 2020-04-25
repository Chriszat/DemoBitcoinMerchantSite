<?php

/**
 * User profile class
 */


class Profile extends Base
{
    public function __construct()
    {
        //TODO
        parent::__construct();
        $this->validate = $this->load->helper("application\core\Validation\Validation");
        $this->mail = $this->load->helper("SendEmail");
        $this->getter = $this->load->helper("GetterHelper");
        $this->country = $this->load->helper("Countries");
        $this->validate = $this->load->helper("application\core\Validation\Validation");
        $this->mail = $this->load->helper("SendEmail");
        $this->con = $this->connection;
    }

    public function index()
    {
        $data["user"] = $this->getter->user_data($_SESSION['id']);

        $this->load->template(view_map["dashboard"][10], "dashboard", $data);
    }

    public function add_email()
    {

        $data["user"] = $this->getter->user_data($_SESSION['id']);
        $data["country"] = $this->country->country();
        $data["emails"] = $this->getter->secondary_emails(false);
        $this->load->template(view_map["dashboard"][12], "dashboard", $data);
    }

    /**
     * Load name change view
     */
    public function request_change()
    {
        if (!isset($_GET['t'])) {
            return false;
        }
        $data["show"] = $_GET['t'];
        $data["user"] = $this->getter->user_data($_SESSION['id']);
        $data["country"] = $this->country->country();
        $data["emails"] = $this->getter->secondary_emails(false);
        $data["pref"] = $this->getter->get_preferences();
        $this->load->template(view_map["dashboard"][11], "dashboard", $data);
    }

    public function update_profile()
    {
        $con = $this->connection;
        $users = $this->getter->user_data($_SESSION['id']);
        @$type = $_POST['t'];
        if ($type == "name") {
            $current_name = $users["name"];
            $post_name = isset($_POST['name']) ? $_POST["name"] : "";
            if (empty($post_name)) {
                if (empty($current_name)) {
                    echo json_encode(array("status" => "success", "data" => $post_name, "message" => "<span style='color:#fff'><span class='fa fa-save'></span>&nbsp;&nbsp; Updated name</span>"));
                } else {
                    echo json_encode(array("status" => "error", "message" => "Name cannot be blank", "data" => ""));
                }
            } else {
                $query = mysqli_query($con, "UPDATE users SET name='$post_name' WHERE id='$_SESSION[id]' ");
                if ($query) {
                    echo json_encode(array("status" => "success", "message" => "Updated name", "data" => ucwords($post_name)));
                }
            }
        } else if ($type == "email") {
        } else if ($type == "phone") {
            $phone = $users["phone"];
            $post_phone = isset($_POST['phone']) ? $_POST["phone"] : "";
            if (empty($post_phone)) {
                if (empty($phone)) {
                    echo json_encode(array("status" => "success", "data" => $post_phone));
                } else {
                    echo json_encode(array("status" => "error", "message" => "<span style='color:#fff'><span class='fa fa-times'></span>&nbsp;&nbsp; Phone cannot be blank</span>", "data" => $post_phone));
                }
            } else {
                $query = mysqli_query($con, "UPDATE users SET phone='$post_phone' WHERE id='$_SESSION[id]' ");
                if ($query) {
                    echo json_encode(array("status" => "success", "message" => "Updated phone number", "data" => $post_phone));
                }
            }
        } else if ($type == "country") {
            $country = isset($_POST['country']) ? $_POST['country'] : "";
            if (!empty($country)) {
                $query = mysqli_query($con, "UPDATE users SET country='$country' WHERE id='$_SESSION[id]' ");
                if ($query) {
                    echo json_encode(array("status" => "success", "message" => "Updated country", "data" => $country));
                }
            }
        }
    }

    public function add_new_email()
    {
        $con = $this->connection;
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $user = $_SESSION['id'];
        $settings = $this->getter->settings();
        $token = $this->mail->generate_email_token();
        if (!empty($email)) {
            if (!$this->validate->is_exists("users", "email", $email) && !$this->validate->is_exists("secondary_emails", "email", $email)) {
                $email = mysqli_real_escape_string($con, $email);
                $stmt = mysqli_prepare($con, "INSERT INTO secondary_emails (user, email, verify_key) VALUES (?, ?, ?)");
                mysqli_stmt_bind_param($stmt, "sss", $user, $email, $token);
                $exec = mysqli_stmt_execute($stmt);
                if ($exec) {
                    $lastid = mysqli_insert_id($con);
                    $subject = "Confirm your email address";
                    $data["email"] = $email;
                    $data["username"] = "this user";
                    if ($this->getter->user_data($user)["name"] != "") {
                        $data["username"] = ucwords($this->getter->user_data($user)["name"]);
                    } else {
                        $data["username"] = ucwords(explode("@", $email)[0]);
                    }
                    $data["extra"] = "verify this email address";
                    $data["sitename"] = $settings["sitename"];
                    $data["link"] = baseurl . "confirm_email/?email=" . strtolower($email) . "&token=" . $token . "&t=sec";
                    ob_start();
                    $send_mail = $this->mail->secondary_email_verification($email, $subject, $data, $data["link"]);
                    ob_end_clean();
                    $new_data = "
                    <tr id='$lastid'>
                        <td>" . strtolower($email) . "</td>
                        <td><span style='color:orange'>Unverified - check your inbox</span></td>
                        <td><a href='javascript:void(0)'><span style='color:red' onclick=\"remove('$lastid', '$email')\">Delete</span></a></td>
                    </tr>
                    ";
                    echo json_encode(array("status" => "success", "message" => "<span style='color:#fff'><span class='fa fa-check'></span>&nbsp;&nbsp; Please verify with the email we sent to you</span>", "data" => $email, "new_data" => $new_data));
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "<span style='color:#fff'><span class='fa fa-times'></span>&nbsp;&nbsp; Email already exits</span>", "data" => $email));
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "<span style='color:#fff'><span class='fa fa-times'></span>&nbsp;&nbsp; Email cannot be blank</span>", "data" => $email));
        }
    }
    /**
     * Deletes email
     */
    public function remove()
    {
        if (isset($_POST['id'])) {
            $con = $this->connection;
            $id = $_POST['id'];
            $query  = mysqli_query($con, "DELETE FROM secondary_emails WHERE id='$id' ");
            if (mysqli_affected_rows($con) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Save preferences
     */
    public function preferences()
    {
        $con = $this->connection;
        if (isset($_POST['notification']) || $_POST['security_emails']) {
            if (isset($_POST['notification'])) {
                $data = $_POST['notification'];
                $query = mysqli_query($con, "UPDATE preferences SET push_notification = '$data' WHERE user='$_SESSION[id]'");
                if ($query) {
                    echo json_encode(array("status" => "success", "message" => "set"));
                    return;
                }
            }
            if (isset($_POST['security_emails'])) {
                $data = $_POST['security_emails'];
                $query = mysqli_query($con, "UPDATE preferences SET security_emails = '$data' WHERE user='$_SESSION[id]'");
                if ($query) {
                    echo json_encode(array("status" => "error", "message" => "could not set"));
                    return;
                }
            }
        }
    }

    public function kycVerificationView()
    {
        $data = [];
        $user = $this->getter->user_data($_SESSION['id']);
        if ($user['kyc_status'] == "pending") {
            $this->load->template(view_map["dashboard"][36], "dashboard", $data);
        } elseif ($user['kyc_status'] == 'submitted') {
            echo '<div class="card" style="margin: 0 auto; width:700px; max-width:100%">
            <div class="card-content">
                <div class="head-content">
                    <div class="center">
                        <br>
                        <p style="font-size:20px; font-family: \'Open Sans\', sans-serif; color:green"><b>
                           KYC DOCUMENTS SUBMITTED </b></p>
        
                    </div>
                </div>
                <br>
                <div class="card-body" style="user-select:none;padding:10px; text-align:center;" id="bt">
                    <div style="width:100px; margin:0 auto; max-width:100%">
                        <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/mark2.png" alt="" style="width:100%" draggable="false">
                    </div><br>
                    <h4><span >
                   Your kyc documents has been submitted for review. We shall notify you once it has been approved.
                </h4>
                    <br><br>
                    
                </div>
            </div>
        </div>';
        } elseif ($user['kyc_status'] == 'rejected') {
            $data['kyc_rejected'] = true;
            $this->load->template(view_map["dashboard"][36], "dashboard", $data);
        }
    }

    public function uploadKYCDocuments()
    {
        $file = isset($_FILES['file']) ? $_FILES['file'] : "";
        if (empty($file)) {
            echo json_encode(array("status" => 'error', 'message' => 'Please select a valid file'));
            die();
        }

        $rand_file_name = strval(bin2hex(random_bytes(16))) . '_' . $file['name'];
        move_uploaded_file($file["tmp_name"], "../uploads/" . $rand_file_name);
        $query = mysqli_query($this->con, "INSERT INTO kyc_documents (user, doc) VALUES ('$_SESSION[id]','$rand_file_name' )");
        $query = mysqli_query($this->con, "UPDATE users SET kyc_status='submitted' WHERE id='$_SESSION[id]' ");
        echo json_encode(array("status" => "success", "message" => "KYC documents has been submitted for review"));
        die();
    }


    public function uploadIdentityPhoto()
    {
        $file = isset($_FILES['file']) ? $_FILES['file'] : "";
        if (empty($file)) {
            echo json_encode(array("status" => 'error', 'message' => 'Please select a valid file'));
            die();
        }

        unlink("../" . $this->getter->user_data($_SESSION['id'])['image']);
        $rand_file_name = strval(bin2hex(random_bytes(16))) . '_' . $file['name'];
        move_uploaded_file($file["tmp_name"], "../81744546ec70b93f065c7321407215727ea39750f52b909dcb/identity/" . $rand_file_name);
        $rand_file_name = "81744546ec70b93f065c7321407215727ea39750f52b909dcb/identity/$rand_file_name";
        $query = mysqli_query($this->con, "UPDATE users SET image='$rand_file_name' WHERE id='$_SESSION[id]' ");
        echo json_encode(array("status" => "success", "message" => "Identity photo uploaded successfully", "image" => $rand_file_name));
        die();
    }

    public function logout()
    {

        session_destroy();
        echo json_encode(array("status" => "success", "message" => "User logged out", "redirect_url" => baseurl . "login/"));
    }
}
