<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
  function __construct()

	{
	parent::__construct();
    
    //$this->load->library('session');
    	$this->load->library('session');
		$this->load->database('admin');
     	$this->load->helper('url');
     		$this->load->model('Common_model');
    
   // $this->load->library('session');

	//	$this->SessionModel->checkadminlogin(array("login","loginajax"));

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
  
  
  
  
  function uploadproductimagefile($key)

	{

		$message = array();

		$data = array();

		if($_FILES[$key]['size'] > 0)

		{

			$config = array(

				'upload_path' => "./upload/team1/",

				'allowed_types' => "gif|jpg|png|jpeg|pdf",

				/*'overwrite' => TRUE*/

				'max_size' => 60000,

				'max_height' => "",

				'max_width' => ""

			);

			$config['remove_spaces'] = true;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);



			if($this->upload->do_upload($key))

			{

			//$data = array('upload_data' => $this->upload->data());

				$uploadData = $this->upload->data();

				//$this->resizeImage($uploadData['file_name']);

				$image_name = $uploadData['file_name'];

				return $image_name;

			}

			else

			{

				echo $this->upload->display_errors();

			}

		}

		else

		{

			return 'Your uploaded image file is blank.';

		}

	}

function uploadproductvideofile($key)

	{

		$message = array();

		$data = array();

		if($_FILES[$key]['size'] > 0)

		{

			$config = array(

				'upload_path' => "./upload/team2/",

				'allowed_types' => "gif|jpg|png|jpeg|pdf|mp4",

				/*'overwrite' => TRUE*/

				'max_size' => 60000,

				'max_height' => "",

				'max_width' => ""

			);

			$config['remove_spaces'] = true;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);



			if($this->upload->do_upload($key))

			{

			//$data = array('upload_data' => $this->upload->data());

				$uploadData = $this->upload->data();

				//$this->resizeImage($uploadData['file_name']);

				$image_name = $uploadData['file_name'];

				return $image_name;

			}

			else

			{

				echo $this->upload->display_errors();

			}

		}

		else

		{

			return 'Your uploaded image file is blank.';

		}

	}
function uploadteamfile($key)

	{

		$message = array();

		$data = array();

		if($_FILES[$key]['size'] > 0)

		{

			$config = array(

				'upload_path' => "./upload/team/",

				'allowed_types' => "gif|jpg|png|jpeg|pdf|mp4",

				/*'overwrite' => TRUE*/

				'max_size' => 60000,

				'max_height' => "",

				'max_width' => ""

			);

			$config['remove_spaces'] = true;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);



			if($this->upload->do_upload($key))

			{

			//$data = array('upload_data' => $this->upload->data());

				$uploadData = $this->upload->data();

				//$this->resizeImage($uploadData['file_name']);

				$image_name = $uploadData['file_name'];

				return $image_name;

			}

			else

			{

				echo $this->upload->display_errors();

			}

		}

		else

		{

			return 'Your uploaded image file is blank.';

		}

	}
function uploadchannelfile($key)

	{

		$message = array();

		$data = array();

		if($_FILES[$key]['size'] > 0)

		{

			$config = array(

				'upload_path' => "./upload/channels/",

				'allowed_types' => "gif|jpg|png|jpeg|pdf|mp4",

				/*'overwrite' => TRUE*/

				'max_size' => 60000,

				'max_height' => "",

				'max_width' => ""

			);

			$config['remove_spaces'] = true;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);



			if($this->upload->do_upload($key))

			{

			//$data = array('upload_data' => $this->upload->data());

				$uploadData = $this->upload->data();

				//$this->resizeImage($uploadData['file_name']);

				$image_name = $uploadData['file_name'];

				return $image_name;

			}

			else

			{

				echo $this->upload->display_errors();

			}

		}

		else

		{

			return 'Your uploaded image file is blank.';

		}

	}
public function forgetpass() {
    $data = array();

    if (!empty($_POST)) {
        $username = !empty($_POST['email']) ? $_POST['email'] : '';
        $otp = mt_rand(100000, 999999);

        // Check if user exists
        $check_user1 = $this->Common_model->getSingleRecordById('org_list', array('email' => $username));

        if (!empty($check_user1)) {
            // Prepare data for OTP
            $post_data = array(
                'create_date' => date('Y-m-d H:i:s'),
                'email' => $username,
                'otp' => $otp,
            );

            // Check if the OTP record already exists
            $existing_otp = $this->Common_model->getSingleRecordById('forgot_otp', array('email' => $username));

            if ($existing_otp) {
                // Update existing OTP record
                $this->Common_model->updateRecords('forgot_otp', $post_data, array('email' => $username));
            } else {
                // Insert new OTP record
                $this->Common_model->addRecords('forgot_otp', $post_data);
            }

            // Email setup
            $subject = "Ticket Management System";
            $message = "<p>Thank you for requesting a password reset.</p>";
            $message .= "<p>Your OTP is: <strong>" . $otp . "</strong>. Please verify this OTP to proceed.</p>";
            $headers = "From: abc@somedomain.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html\r\n";

            // Send the email
            if (mail($username, $subject, $message, $headers)) {
                $this->session->set_tempdata('forgot_otp_data', array('otp' => $otp, 'email' => $username), 300);
                $this->session->set_flashdata('success', 'OTP sent successfully, please check your email.');
                redirect(base_url() . 'confirm_otp');
            } else {
                $data['error'] = "Failed to send OTP. Please try again.";
            }
        } else {
            $data['error'] = "User email does not exist.";
        }
    }

    $this->load->view('forgetpass', $data);
}

    
    public function confirm_otp()
	{
$data = array();
        if (isset($_POST) && !empty($_POST)) {
        
                if (isset($_POST['email']) && !empty($_POST['otp'])) {
                    $email = $this->input->post('email');
                    $otp = $this->input->post('otp');
                    $checkmobilenootp = $this->Common_model->GetWhere('forgot_otp', array('email' => $email , 'otp' => $otp));
                    if (isset($checkmobilenootp) && !empty($checkmobilenootp)){
                         
                       
                       
                        $this->session->set_tempdata(array('vedoredetialsotp' => $checkmobilenootp));
                        $data['sucess'] = "OTP has been verify successfully please login now.";
                       redirect('https://supporthub.xytr.org/engineer/reset_pass');
                    } else {
                    
                    $data['error'] = "Please enter valid otp";
                }
                } else {
                   
                    $data['error'] = "Please enter otp";
                }
           
        }

		$this->load->view('confirm_otp',$data);
	}
    
    public function reset_pass()
	{
  $dataarr = array();
        if (!empty($_POST)) {
            //p($_SESSION);
            $forgot_otp_data = $this->session->tempdata('vedoredetialsotp');
            $password = $_POST['pwd'];
            //$newpassword = $_POST['newpassword'];
            $confirmpassword = $_POST['confirmpassword'];
            $forgot_otp_data = $this->session->tempdata('vedoredetialsotp');
            $email = !empty($forgot_otp_data[0]['email']) ? $forgot_otp_data[0]['email'] : '';
            $check_user = $this->Common_model->getSingleRecordById('org_list', array('email' => $email));
            //echo "newpassword=".$newpassword."<br>confirmpassword=".$confirmpassword;die;
          //  if ($newpassword == $confirmpassword) {
                if (!empty($check_user)) {
                    $data = array();
                    $data['pwd'] = $password;
                    $this->Common_model->updateRecords('org_list', $data, array('email' => $check_user['email']));
                    $this->session->set_flashdata('error', 'Password has been forget sucessfully');
                    redirect('https://supporthub.xytr.org/engineer/');
                    $dataarr['sucess'] = "Password has been forget sucessfully";
                } else {
                    $this->session->set_flashdata('error', 'Invalid old password');
                    $dataarr['error'] = "Invalid old password";
                }
        
        }


		$this->load->view('reset_pass',$dataarr);
	}
	public function pageindex()
	{
$userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
                $whr2 = array("id" => $subscriber_id);
    if (!empty($subscriber_id)) {


		$this->load->view('index');


	}

else {
            redirect("https://supporthub.xytr.org/engineer/");
        }
	}
 public function addreply()
{
    $data = array();
    $userdata = $this->session->userdata(USER_SESSION);
    $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';

    // Get the ID from the query string
    $id = $this->input->get('id'); 

    if (isset($_POST) && !empty($_POST)) {
        $insert_data = array();
        $insert_data['user_id'] = $subscriber_id;
                    $check_user1 = $this->Common_model->getSingleRecordById('org_list', array('id' => $subscriber_id));
$name = $check_user1['full_name'];
        $insert_data['reply'] = $this->input->post("reply"); // Use CodeIgniter's input class for security
        $message1 = $insert_data['reply'];
        $insert_data['status'] = 0; // Assuming status should be 0 for new replies
        $status2 = $insert_data['status'];
        $insert_data['created_date'] = date('Y-m-d H:i:s');




        if (isset($_POST['id']) && !empty($_POST['id'])) {
            // Update existing record
            $result_id = $this->Common_model->updateRecords('ticket_reply', $insert_data, array('id' => $_POST['id']));
        } else {
            // Insert new record
            $insert_data['reply_id'] = $id; // Set reply_id here
            $check_user1 = $this->Common_model->getSingleRecordById('ticket_list', array('id' => $id));
  
  $username = !empty($check_user1['user_email']) ? $check_user1['user_email'] : '';

            $postdata = array();
            $postdata['message'] = $message1;
            $postdata['status'] = $message2;
            $postdata['email'] = $username;
           // $subject = " Notification  Message";
            $message = "<p>Thank for foget password,</p>";
            $message.= "<p>please verify otp is :-<strong>" . $message1 . "</strong> after that you have to foget password.Thank you</p>";
            $message = "name=" . $name ."<br>"."message=" . $message1 ."<br>"."thanks";
          
            $header= "MIME-Version: 1.0\r\n";
            $header= "Content-type: text/html\r\n";

             $to =$username;
         
          
            $retval = mail($username, $subject, $message, $header);
            if ($retval == true) {
               // $this->session->set_tempdata(array('forgot_otp_data' => $postdata));
               /// $this->session->set_flashdata('sucess', 'Otp sent sucessfully, please check email');
                //redirect(base_url() . 'home/Otpsent/');
            } else {
                $dataarr['error'] = "Otp not sent";
            }



            $result_id = $this->Common_model->addRecords('ticket_reply', $insert_data);
        }

        if ($result_id) {
            redirect('https://supporthub.xytr.org/engineer/ticketlist');
        }
    }

    if (!empty($id)) {
        $whr = array('id' => $id);
        $data['tax_data'] = $this->Common_model->getSingleRecordById('ticket_reply', $whr);
    }

    $this->load->view('addreply', $data);
}

public function replyview($id="")
{

    $userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
                $whr2 = array("id" => $subscriber_id);
    if (!empty($subscriber_id)) {
 $data = array();
    $userdata = $this->session->userdata(USER_SESSION);
    $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';

    // Get the ID from the query string
   // $id = $this->input->get('id'); 

    if (isset($_POST) && !empty($_POST)) {
        $insert_data = array();
        $insert_data['user_id'] = $subscriber_id;
        $insert_data['reply_id'] = $id;
                    $check_user1 = $this->Common_model->getSingleRecordById('org_list', array('id' => $subscriber_id));
$name = $check_user1['full_name'];
        $insert_data['reply'] = $this->input->post("reply"); // Use CodeIgniter's input class for security
        $message1 = $insert_data['reply'];
        $insert_data['status'] = 0; // Assuming status should be 0 for new replies
        $status2 = $insert_data['status'];
        $insert_data['created_date'] = date('Y-m-d H:i:s');




        if (isset($_POST['id']) && !empty($_POST['id'])) {
            // Update existing record
            $result_id = $this->Common_model->updateRecords('ticket_reply', $insert_data, array('id' => $_POST['id']));
        } else {
            // Insert new record
            $insert_data['reply_id'] = $id; // Set reply_id here
            $check_user1 = $this->Common_model->getSingleRecordById('ticket_list', array('id' => $id));
  
  $username = !empty($check_user1['user_email']) ? $check_user1['user_email'] : '';

            $postdata = array();
            $postdata['message'] = $message1;
            $postdata['status'] = $message2;
            $postdata['email'] = $username;
           // $subject = " Notification  Message";
            $message = "<p>Thank for foget password,</p>";
            $message.= "<p>please verify otp is :-<strong>" . $message1 . "</strong> after that you have to foget password.Thank you</p>";
            $message = "name=" . $name ."<br>"."message=" . $message1 ."<br>"."thanks";
          
            $header= "MIME-Version: 1.0\r\n";
            $header= "Content-type: text/html\r\n";

             $to =$username;
         
          
            $retval = mail($username, $subject, $message, $header);
            if ($retval == true) {
               // $this->session->set_tempdata(array('forgot_otp_data' => $postdata));
               /// $this->session->set_flashdata('sucess', 'Otp sent sucessfully, please check email');
                //redirect(base_url() . 'home/Otpsent/');
            } else {
                $dataarr['error'] = "Otp not sent";
            }



            $result_id = $this->Common_model->addRecords('ticket_reply', $insert_data);
        }

        if ($result_id) {
            redirect('https://supporthub.xytr.org/engineer/welcome/replyview/'.$id);
        }
    }

    if (!empty($id)) {
        $whr = array('id' => $id);
        $data['tax_data'] = $this->Common_model->getSingleRecordById('ticket_reply', $whr);
    }




    
    $data = array();

    // Check if the 'id' parameter is not empty
    if (!empty($id)) {
        // Define the where clause to filter records by 'reply_id'
        $whr1 = array('reply_id' => $id);

        // Get all records matching the 'reply_id'
        $data['taxlist'] = $this->Common_model->getAllRecordsOrderById('ticket_reply', 'id', 'DESC', $whr1);
    } else {
        // Handle the case where 'id' is not provided (optional)
        $data['taxlist'] = array(); // Or some default data or message
    }

    $this->load->view('replyview', $data);
}

else {
            redirect("https://supporthub.xytr.org/engineer/");
        }
	}

  public function businessarea()
	{

        $userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
    
     $whr1 = array('user_id'=>$subscriber_id);

	$data['taxlist'] = $this->Common_model->getAllRecordsOrderById('business_area', 'id', 'DESC',$whr1);
	
	 
		$this->load->view('businessarea',$data);
	}
     public function rolepermission()
	{

      
     $whr1 = array('1'=>1);

	$data['taxlist'] = $this->Common_model->getAllRecordsOrderById('role_permission', 'id', 'DESC',$whr1);
	
	 
		$this->load->view('role_permission',$data);
	}
 
  
public function requesterlist($id="")
	{

$data = array();

          
        $userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
		if(isset($_POST) && !empty($_POST)){
			$insert_data = array();
            $insert_data['type'] = 1;
            $insert_data['user_id'] = $subscriber_id;
            $insert_data['c_name'] = 'Requester';
                    	$insert_data['c_name'] = $_POST["c_name"];
                        $insert_data['busi_name'] = $_POST["busi_name"];
                        	$insert_data['busi_area'] = $_POST["busi_area"];
                            $insert_data['req_name'] = $_POST["req_name"];
                        $insert_data['email'] = $_POST["email"];
                        $insert_data['phone_no'] = $_POST["phone_no"];
                        $insert_data['city'] = $_POST["city"];
                        $insert_data['pwd'] = $_POST["pwd"];
                      
                    
           
			if (isset($_POST['id']) &&  !empty($_POST['id'])){
				$result_id = $this->Common_model->updateRecords('org_list',$insert_data,array('id'=>$_POST['id']));
			}else{
				$result_id = $this->Common_model->addRecords('org_list',$insert_data);
				//redirect('https://ezheal.ai/admin/appointlist')
			}
			        if ($result_id) {
            redirect('https://supporthub.xytr.org/ticket_admin/requesterlist');
        } 

		}
		if(!empty($id))
		{
			$whr = array('id'=>$id);
			$data['tax_data'] = $this->Common_model->getSingleRecordById('org_list', $whr);
	    
		}
        $whr1 = array('user_id'=>$subscriber_id,'type'=>1);

	$data['taxlist'] = $this->Common_model->getAllRecordsOrderById('org_list', 'id', 'DESC',$whr1);
	
$whr2 = array('1'=>1);

	$data['taxlist2'] = $this->Common_model->getAllRecordsOrderById('business_area', 'id', 'DESC',$whr2);

		$this->load->view('requesterlist',$data);
	}
    
public function createuser($id="")
	{

         $data = array();

          
        $userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
		if(isset($_POST) && !empty($_POST)){
			$insert_data = array();
            $insert_data['type'] = 2;
            $insert_data['user_id'] = $subscriber_id;
                    	$insert_data['role'] = $_POST["role"];
                        $insert_data['full_name'] = $_POST["full_name"];
                        	$insert_data['busi_area'] = $_POST["busi_area"];
                        $insert_data['email'] = $_POST["email"];
                        $insert_data['phone'] = $_POST["phone"];
                        $insert_data['city'] = $_POST["city"];
                        $insert_data['pwd'] = $_POST["pwd"];
                      
                    
           
			if (isset($_POST['id']) &&  !empty($_POST['id'])){
				$result_id = $this->Common_model->updateRecords('org_list',$insert_data,array('id'=>$_POST['id']));
			}else{
				$result_id = $this->Common_model->addRecords('org_list',$insert_data);
				//redirect('https://ezheal.ai/admin/appointlist')
			}
			        if ($result_id) {
            redirect('https://supporthub.xytr.org/ticket_admin/createuser');
        } 

		}
		if(!empty($id))
		{
			$whr = array('id'=>$id);
			$data['tax_data'] = $this->Common_model->getSingleRecordById('org_list', $whr);
	    
		}
        $whr1 = array('user_id'=>$subscriber_id,'type'=>2);

	$data['taxlist'] = $this->Common_model->getAllRecordsOrderById('org_list', 'id', 'DESC',$whr1);
	
    $whr2 = array('1'=>1);

	$data['taxlist2'] = $this->Common_model->getAllRecordsOrderById('business_area', 'id', 'DESC',$whr2);


	  
		$this->load->view('createuser',$data);
	}

    
public function userlist()
	{
		$this->load->view('userlist');
	}
    public function signup()
	{

           $data = array();
		if(isset($_POST) && !empty($_POST)){
			$insert_data = array();
            $insert_data['type'] = 2;
                        $insert_data['full_name'] = $_POST["full_name"];
                       $insert_data['phone'] = $_POST["phone"];
                        $insert_data['email'] = $_POST["email"];
                       $insert_data['address'] = $_POST["address"]; 
                        $insert_data['city'] = $_POST["city"];
                        $insert_data['pwd'] = $_POST["pwd"];
                      
                    
           
			if (isset($_POST['id']) &&  !empty($_POST['id'])){
				$result_id = $this->Common_model->updateRecords('org_list',$insert_data,array('id'=>$_POST['id']));
			}else{
				$result_id = $this->Common_model->addRecords('org_list',$insert_data);
				//redirect('https://ezheal.ai/admin/appointlist')
			}
			        if ($result_id) {
            redirect('https://supporthub.xytr.org/ticket_admin/createuser');
        } 

		}
		if(!empty($id))
		{
			$whr = array('id'=>$id);
			$data['tax_data'] = $this->Common_model->getSingleRecordById('org_list', $whr);
	    
		}
        $whr1 = array('user_id'=>$subscriber_id,'type'=>2);

	$data['taxlist'] = $this->Common_model->getAllRecordsOrderById('org_list', 'id', 'DESC',$whr1);
	
    $whr2 = array('1'=>1);

	$data['taxlist2'] = $this->Common_model->getAllRecordsOrderById('business_area', 'id', 'DESC',$whr2);

		$this->load->view('signup',$data);
	}

      
public function createbusiness($id="")
	{
          $data = array();

          
        $userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
		if(isset($_POST) && !empty($_POST)){
			$insert_data = array();
            $insert_data['user_id'] = $subscriber_id;
                    	$insert_data['area_name'] = $_POST["area_name"];
                        $insert_data['note'] = $_POST["note"];
                      
                    
           
			if (isset($_POST['id']) &&  !empty($_POST['id'])){
				$result_id = $this->Common_model->updateRecords('business_area',$insert_data,array('id'=>$_POST['id']));
			}else{
				$result_id = $this->Common_model->addRecords('business_area',$insert_data);
				//redirect('https://ezheal.ai/admin/appointlist')
			}
			        if ($result_id) {
            redirect('https://supporthub.xytr.org/ticket_admin/businessarea');
        } 

		}
		if(!empty($id))
		{
			$whr = array('id'=>$id);
			$data['tax_data'] = $this->Common_model->getSingleRecordById('business_area', $whr);
	    
		}
	  
		$this->load->view('createbusiness',$data);
	}
public function addrole($id="")
	{
          $data = array();

          
        $userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
		if(isset($_POST) && !empty($_POST)){
			$insert_data = array();
            $insert_data['user_id'] = $subscriber_id;
                    	$insert_data['role'] = $_POST["role"];
                      
                    
           
			if (isset($_POST['id']) &&  !empty($_POST['id'])){
				$result_id = $this->Common_model->updateRecords('role_permission',$insert_data,array('id'=>$_POST['id']));
			}else{
				$result_id = $this->Common_model->addRecords('role_permission',$insert_data);
				//redirect('https://ezheal.ai/admin/appointlist')
			}
			        if ($result_id) {
            redirect('https://supporthub.xytr.org/ticket_admin/rolepermission');
        } 

		}
		if(!empty($id))
		{
			$whr = array('id'=>$id);
			$data['tax_data'] = $this->Common_model->getSingleRecordById('role_permission', $whr);
	    
		}
	  
		$this->load->view('addrole',$data);
	}

public function editprofile($id="")
	{



$userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
                $whr2 = array("id" => $subscriber_id);
    if (!empty($subscriber_id)) {

         $userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
     
          $data = array();

		  		if(isset($_POST) && !empty($_POST)){
			$insert_data = array();

              
            $insert_data['id'] = $subscriber_id;
             $insert_data['full_name'] = $_POST["full_name"];
            $insert_data['email'] = $_POST["email"];
            $insert_data['phone'] = $_POST["phone"];
            $insert_data['address'] = $_POST["address"];
            $insert_data['city'] = $_POST["city"];
           
			if (isset($_POST['id']) &&  !empty($_POST['id'])){
				$result_id = $this->Common_model->updateRecords('org_list',$insert_data,array('id'=>$_POST['id']));
			}else{
				$result_id = $this->Common_model->addRecords('org_list',$insert_data);
				//redirect('https://ezheal.ai/admin/appointlist')
			}
			        if ($result_id) {
            redirect('https://supporthub.xytr.org/engineer/pageindex');
        } 

		}
		if(!empty($id))
		{
			$whr = array('id'=>$id);
			$data['tax_data'] = $this->Common_model->getSingleRecordById('org_list', $whr);
	    
		}
 $whr2 = array('1'=>1);

	$data['taxlist2'] = $this->Common_model->getAllRecordsOrderById('business_area', 'id', 'DESC',$whr2);
	
          

		$this->load->view('editprofile',$data);
	}
 else {
            redirect("https://supporthub.xytr.org/engineer/");
        }
	}

 
 public function editprofile1($id = "")
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate if new and confirm passwords match
        if ($new_password !== $confirm_password) {
            $this->session->set_flashdata('error', 'New password and confirm password do not match.');
            redirect('https://supporthub.xytr.org/engineer/welcome/editprofile1/' . $id);
        }

        // Fetch current user from the database
        $user = $this->Common_model->getSingleRecordById('org_list', ['id' => $id]);

        if (!empty($user) && $user['pwd'] === $current_password) {
            // Update the password in the database
            $update_data = ['pwd' => $new_password];
            $this->Common_model->updateRecords('org_list', $update_data, ['id' => $id]);

            $this->session->set_flashdata('success', 'Password changed successfully.');
            redirect('https://supporthub.xytr.org/engineer/welcome/editprofile1/' . $id);
        } else {
            $this->session->set_flashdata('error', 'Current password is incorrect.');
            redirect('https://supporthub.xytr.org/engineer/welcome/editprofile1/' . $id);
        }
    } else {
        $this->load->view('editprofile');
    }
}

 public function addticket($id="")
	{
         $userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
     
          $data = array();

		if(isset($_POST) && !empty($_POST)){
			$insert_data = array();
             if (isset($_FILES)) {
			    //echo '<pre>';print_r($_FILES);die();
			    foreach ($_FILES as $key => $value){
			        //print_r($value['size']);
			        if($value['size'] > 0) {
						$filearraydata = $this->uploadchannelfile($key);
			            $filearray[$key] = $filearraydata;
			        }else{
			            $this->session->set_flashdata('error_fileupload', 'File size is empty!');
			        }
			    }
			}   
			
            
             	
				if(isset($filearray['attachment'])) {
				$insert_data['attachment'] = $filearray['attachment'];
			}

           // $insert_data['req_name'] = $insert_data['req_name'];
            $insert_data['ticket_id'] = rand(1000,9999);
            $message1 = $insert_data['ticket_id'];
          //  $insert_data['ticket_details'] = $_POST["ticket_details"];
          //  $insert_data['customer_name'] = $_POST["customer_name"];
            $insert_data['assign_man'] = $_POST["assign_man"];
             $insert_data['busi_area'] = $_POST["busi_area"];
             $insert_data['status'] = isset($_POST["status"]) ? $_POST["status"] : null;
$status2 = $insert_data['status'];

// Set $status2 based on the value of $insert_data['status']
switch ($status2) {
    case 0:
        $status2 = 'open'; // or any other value you want to assign for status 0
        break;
    case 1:
        $status2 = 'Progress'; // or any other value you want to assign for status 1
        break;
    case 2:
        $status2 = 'Complete'; // or any other value you want to assign for status 2
        break;
    case 3:
        $status2 = 'Reject'; // or any other value you want to assign for status 3
        break;
    default:
        $status2 = 'Unknown'; // handle unexpected status values
        break;
}


           $insert_data['user_email'] = $_POST["user_email"];

            $insert_data['ticket_subject'] = $_POST["ticket_subject"];
            $subject = $insert_data['ticket_subject'];
            
            $insert_data['ticket_descript'] = $_POST["ticket_descript"];
            $description = $insert_data['ticket_descript'];
          //   $insert_data['effort'] = $_POST["effort"];
            $insert_data['created_date'] = date('Y-m-d h:i:s');



            $username = !empty($insert_data['user_email']) ? $insert_data['user_email'] : '';

            $postdata = array();
            $postdata['message'] = $message1;
            $postdata['status'] = $message2;
            $postdata['email'] = $username;
           // $subject = " Notification  Message";
            $message = "<p>Thank for foget password,</p>";
            $message.= "<p>please verify otp is :-<strong>" . $message1 . "</strong> after that you have to foget password.Thank you</p>";
            $message = "Ticket Number=" . $message1 ."<br>"."ticket subject=" .$subject."<br>". "ticket Description=".$description ."<br>". "ticket Status=".$status2."<br>"."thanks";
          
            $header= "MIME-Version: 1.0\r\n";
            $header= "Content-type: text/html\r\n";

             $to =$username;
         
          
            $retval = mail($username, $subject, $message, $header);
            if ($retval == true) {
              
            } else {
                $dataarr['error'] = "Otp not sent";
            }

                      
			if (isset($_POST['id']) &&  !empty($_POST['id'])){
				$result_id = $this->Common_model->updateRecords('ticket_list',$insert_data,array('id'=>$_POST['id']));
			}else{
				$result_id = $this->Common_model->addRecords('ticket_list',$insert_data);
			}
			        if ($result_id) {
            redirect('https://supporthub.xytr.org/engineer/ticketlist');
        } 

		}
		if(!empty($id))
		{
			$whr = array('id'=>$id);
			$data['tax_data'] = $this->Common_model->getSingleRecordById('ticket_list', $whr);
	    
		}
 $whr2 = array('1'=>1);

	$data['taxlist2'] = $this->Common_model->getAllRecordsOrderById('business_area', 'id', 'DESC',$whr2);
	
            $whr4 = array('role'=>'Engineer');

	$data['taxlist4'] = $this->Common_model->getAllRecordsOrderById('org_list', 'id', 'DESC',$whr4);

        $whr3 = array('role'=>'Manager');

	$data['taxlist3'] = $this->Common_model->getAllRecordsOrderById('org_list', 'id', 'DESC',$whr3);

      $whr5 = array('role'=>'Requester');

	$data['taxlist5'] = $this->Common_model->getAllRecordsOrderById('org_list', 'id', 'DESC',$whr5);

		$this->load->view('addticket',$data);
	}

public function get_filtered_staff()
{
    $business_area_id = $this->input->post('busi_area');

    // Get filtered managers
    $managers = $this->Common_model->getFilteredRecords('org_list', array('role' => 'Manager', 'busi_area' => $business_area_id));
    
    // Get filtered engineers
    $engineers = $this->Common_model->getFilteredRecords('org_list', array('role' => 'Engineer', 'busi_area' => $business_area_id));

    // Prepare the response
    $response = array(
        'managers' => $managers,
        'engineers' => $engineers
    );

    echo json_encode($response);
}


  	public function index(){
        $data = array();
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['pwd'];
            
            $chkreturnrequest = $this->Common_model->getSingleRecordById('org_list', array('email' => $email, 'pwd' => $password));
          //  print_r($chkreturnrequest);
            if ($chkreturnrequest) {
                if ($chkreturnrequest['status'] == 1) {
                  if ($chkreturnrequest['role'] == 'Engineer'){
                  
                    $fidsrst = $this->session->userdata('email',$email);
                    $timefis = !empty($fidsrst['email']) ? $fidsrst['email'] : '';
                    if (!empty($timefis)) {
                        $this->session->set_userdata(USER_SESSION, $chkreturnrequest);
                        $data['success'] = "successfully login";
                			redirect('https://supporthub.xytr.org/engineer/pageindex');

                    } else {
                        $this->session->set_userdata(USER_SESSION, $chkreturnrequest);
                        $data['success'] = "Successfully login";
                    }
                } else {
                    $data['error'] = "Waiting for approval";
                }
            } 
            }
              else {
                $data['error'] = "Invalid Credentials please try again";
            }
        }
   
	    
	    
	    
		$this->load->view('login',$data);
	}


	
  			
	 public function ticketlist()
	{
$userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
                $whr2 = array("id" => $subscriber_id);
    if (!empty($subscriber_id)) {


        
        $userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
     
     $whr1 = array('assign_engg'=>$subscriber_id);

	$data['taxlist'] = $this->Common_model->getAllRecordsOrderById('ticket_list', 'id', 'DESC',$whr1);
	
	    
	    
		$this->load->view('ticketlist',$data);
	}

else {
            redirect("https://supporthub.xytr.org/engineer/");
        }
	}
public function ticketreport()
	{
        
        $userdata = $this->session->userdata(USER_SESSION);
      $subscriber_id = !empty($userdata['id']) ? $userdata['id'] : '';
     
     $whr1 = array('assign_engg'=>$subscriber_id);

	$data['taxlist'] = $this->Common_model->getAllRecordsOrderById('ticket_list', 'id', 'DESC',$whr1);
	
    $this->load->view('ticketreport',$data);
	}


	 public function joblist()
	{
	    
	     $data = array();

		$data['taxlist'] = $this->Common_model->getAllRecordsOrderById('job','id', 'DESC',$data);
		$this->load->view('job',$data);
	}
	
	
	public function change_status(){

        $tablename = $_POST['tablename'];

        $status = $_POST['status'];

        $id = $_POST['id'];

        $action = $_POST['action'];

        $whrcol = $_POST['whrcol'];

        $whrstatuscol = $_POST['whrstatuscol'];

        $res = $this->Common_model->updateRecords($tablename, array($whrstatuscol=>$status), array($whrcol => $id));

        // $resp = array('code'=>SUCCESS,'message'=>'Record has been '.$action.'successfully');

        // echo json_encode($resp);

        $msg = array('status'=>1, 'msg'=>'Record has been '.$action.' successfully');

		echo json_encode($msg);

		exit();

    }
public function filterTickets()
{
    $start_date = $this->input->post('start_date');
    $end_date = $this->input->post('end_date');
    
    $this->load->model('Common_model');
    
    // Fetch tickets based on the date range
    $whr = array(
        'created_date >=' => $start_date,
        'created_date <=' => $end_date
    );
    
    $tickets = $this->Common_model->getRecordsByCondition('ticket_list', $whr);
    
    $result = array();
    foreach ($tickets as $ticket) {
        // Fetch additional details
        $area = $this->Common_model->getSingleRecordById('business_area', array('id' => $ticket['busi_area']));
        $manager = $this->Common_model->getSingleRecordById('org_list', array('id' => $ticket['assign_man']));
        $engineer = $this->Common_model->getSingleRecordById('org_list', array('id' => $ticket['assign_engg']));
        
        $result[] = array(
            'id' => $ticket['id'],
            'created_date' => $ticket['created_date'],
            'ticket_id' => $ticket['ticket_id'],
            'ticket_details' => $ticket['ticket_details'],
            'customer_name' => $ticket['customer_name'],
            'req_name' => $ticket['req_name'],
            'area_name' => $area['area_name'],
            'assign_man' => $manager['full_name'],
            'assign_engg' => $engineer['full_name'],
            'status' => $ticket['status']
        );
    }
    
    echo json_encode(array('tickets' => $result));
}




public function get_assignments_by_area()
{
    $busi_area_id = $this->input->post('busi_area');

    if ($busi_area_id) {
        // Fetch managers and engineers based on business area
        $managers = $this->Common_model->getRecordsByField('org_list', 'role', 'Manager', array('busi_area' => $busi_area_id));
        $engineers = $this->Common_model->getRecordsByField('org_list', 'role', 'Engineer', array('busi_area' => $busi_area_id));

        $data = array(
            'managers' => $managers,
            'engineers' => $engineers
        );

        echo json_encode($data);
    }
}


  
  
public function profile()

	{

	 $data = array();

	 $check_admin_password = $this->Common_model->getSingleRecord("admin",array('id'=>1));

	 $admin_current_password = $check_admin_password['password'];

	 $admin_txn_current_password = $check_admin_password['password'];

	 

	 if(isset($_POST['changeprofileinformation'])){

	  $yourfirstname = $_POST['yourfirstname'];

	  $yourlastname = $_POST['yourlastname'];

	  $youremailid = $_POST['youremailid'];
	  
	   $yourpassword = $_POST['yourpassword'];

	  $today_date = date('Y-m-d h:i:s A',time());

	  

	  $this->Common_model->updateRecords('admin',array('name'=>$yourfirstname,'lastname'=>$yourlastname,'email'=>$youremailid,'password'=>$yourpassword),array('id'=>1));

	  $data['success'] = "Updating please wait...!";

	 }

	 if(isset($_POST['changenormalpassword'])){

	  $current_password = md5(trim($_POST['current_password']));

	  $new_password = md5(trim($_POST['new_password']));

	  $re_enter_password = md5(trim($_POST['re_enter_password']));	  

	  $today_date = date('Y-m-d h:i:s A',time());

	  	  

	  if($admin_current_password!=$current_password){

	   $data['error'] = "Invalid Current Password...!";

	  }

	  else{

	   if($new_password!=$re_enter_password){

	    $data['error'] = "New password not matched...!";

	   }

	   else{

	    $this->Common_model->updateRecords('admin',array('password'=>$re_enter_password),array('id'=>1));

		$data['success'] = "Password updating, please wait...!";

	   }

	  }

	 }	 

	 if(isset($_POST['changetxnpassword'])){

	  $current_txn_password = md5(trim($_POST['current_password']));

	  $new_txn_password = md5(trim($_POST['new_password']));

	  $re_enter_txn_password = md5(trim($_POST['re_enter_password']));	  

	  $today_date = date('Y-m-d h:i:s A',time());

	  	  

	  if($admin_txn_current_password!=$current_txn_password){

	   $data['error'] = "Invalid Current TXN Password...!";

	  }

	  else{

	   if($new_txn_password!=$re_enter_txn_password){

	    $data['error'] = "New TXN password not matched...!";

	   }

	   else{

	    $this->Common_model->updateRecords('admin',array('password'=>$re_enter_txn_password),array('id'=>1));

		$data['success'] = "TXN Password updating, please wait...!";

	   }

	  }

	 }

	 $data['admin_information'] = $this->Common_model->getSingleRecord("admin",array('id'=>1));
	 
		$this->load->view('manageprofile',$data);
	}
		public function sellproduct()
	{
	    
	    
	   $data = array();

		$data['taxlist'] = $this->Common_model->getAllRecordsOrderById('product','id',    'DESC',$data);
 
		$this->load->view('sellproduct',$data);
	}



public function exportuserreport(){ 
   // file name 
   $filename = 'users_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");
   
   // get data 
   $usersData = $this->Common_model->getUserDetails15();

   // file creation 
   $file = fopen('php://output', 'w');
 
   $header = array("ticket_id","ticket_details","customer_name","req_name","status","created_date"); 
   fputcsv($file, $header);
   foreach ($usersData as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   exit; 
}


 
	public function sellorderlist()
	{
	    
	    
	   $data = array();

		$data['taxlist'] = $this->Common_model->getAllRecordsOrderById('delivery_address','id', 'DESC',$data);
 
		$this->load->view('sellorderlist',$data);
	}

  public function deleteRecord()   
    {
    
        $id = $_POST['id'];

        $table = $_POST['table'];

        $colwhr = $_POST['colwhr'];

      	$this->Common_model->deleteRecords($table,array($colwhr=>$id));
      	
      	$msg = array('status'=>1, 'msg'=>'Deleted successfully!');

		echo json_encode($msg);

		exit();

     	// redirect(base_url().'adminnew/Service_list', 'refresh');

    }

    public function logout()

	{
		$this->session->unset_userdata(USER_SESSION);

		redirect("https://supporthub.xytr.org/engineer/",'refresh');

	}
  
    
}
