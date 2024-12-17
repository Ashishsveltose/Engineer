<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
use Razorpay\Api\Api;
//use './razorpay-php/Razorpay';
require_once ('razorpay-php/Razorpay.php');
use Razorpay\Api\Errors\SignatureVerificationError;
// require APPPATH . 'libraries/REST_Controller.php';
// require_once("application/libraries/Format.php");
class ApiCommonController extends REST_Controller {
  
    public function __construct() {
        parent::__construct();
       error_reporting(0);
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('api/Authentication_model');
        $this->load->helper('common_helper');
    }
    
    
    /////////////////////////////////<Buyer API's>///////////////////////////////////////////
    
    
    
  public function otpsend_post() {
         $aa  = (json_decode(file_get_contents("php://input")));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
                    $shop_data = $this->db->get_where("users", ['id' => $user_id])->row_array();

            
        } else {
            
            $insert = array();

            $insert['otp'] = $aa->otp;
          //$insert['created_date'] = date('Y-m-d H:i:s');
            //$check_shop = $this->Common_model->getSingleRecordById('customers', array('name' => $_POST['name']));
          //  $check_email = $this->Common_model->getSingleRecordById('customers', array('email' => $_POST['email']));
            //p($check_mobi);
            
                if (empty($check_shop)) {
                    if (empty($check_email)) {
                        $add_otp = $this->Common_model->addRecords('users', $insert);
                        $check_gst = $this->Common_model->getSingleRecordById('users', array('id' => $add_otp));
                        
                        $responseArray = array('status' => TRUE, 'message' => 'users signup successfully.', 'data' => $insert);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => ' number is  already exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'number is  already exits.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            
        }
    }
   public function postcalender_post() {
        $aa  = (json_decode(file_get_contents("php://input")));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
           // $insert_data['upi_id'] = $this->input->post('event');
            $insert['event_id'] = $aa->event_id;
          $insert['date'] = $aa->date;
            //$insert_data['create_date'] = date('Y-m-d');
            //$userData = $this->Common_model->getSingleData('recodes', array('id' => $insert_data['id']));
            //$userData["my_wallet"] = $userData["my_wallet"] - $insert_data['amount'];
            //$changed_data = $this->Common_model->updateRecords('recodes', $userData, array('shop_id' => $insert_data['saller_id']));
            $result = $this->Common_model->addrecords('recodes', $insert);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "data send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
   
    public function postmobile_post() {
      $otp = mt_rand(1000, 9999);
         $aa  = (json_decode(file_get_contents("php://input")));
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
                    $shop_data = $this->db->get_where("users", ['id' => $user_id])->row_array();

            
        } else {
            
            $insert = array();
            //$insert['token'] = $aa->$headers;
            
            $insert['mobile_no'] = $aa->mobile_no;
          $insert['otp'] = $otp;
          $insert['created_date'] = date('Y-m-d H:i:s');
            $check_shop = $this->Common_model->getSingleRecordById('users', array('mobile_no' =>$aa->mobile_no));
          //  $check_email = $this->Common_model->getSingleRecordById('customers', array('email' => $_POST['email']));
            //p($check_mobi);
            
                if (empty($check_shop)) {
                    if (empty($check_email)) {
                        $add_otp = $this->Common_model->addRecords('users', $insert);
                        $check_gst = $this->Common_model->getSingleRecordById('users', array('id' => $add_otp));
                        
                        $responseArray = array('status' => TRUE, 'message' => 'users signup successfully.', 'user_id' => $add_otp);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => ' number is  already exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'number is  already exits.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            
        }
    }
  public function verify_otp_post() {
        $aa  = (json_decode(file_get_contents("php://input")));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
                    $shop_data = $this->db->get_where("users", ['mobile_no' => $mobile_no])->row_array();

                      $check_user = $this->Common_model->getSingleRecordById('users', array('mobile_no' => $this->input->post('mobile_no')));

        }  else {
            $otp = $aa->otp;
            $mobile_no = $aa->mobile_no;
            $checkmobilenootp = $this->Common_model->GetWhere('users', array('mobile_no' => $mobile_no, 'otp' => $otp));
            if (isset($checkmobilenootp) && !empty($checkmobilenootp)) {
                $this->response(['success' => true, 'message' => "OTP has been verify successfully please login now."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid otp please enter valid otp."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function favurite_post() {
      //$otp = mt_rand(100000, 999999);
      $username = !empty($_POST['mobile_no']) ? $_POST['mobile_no'] : '';
        $check_user = $this->Common_model->getSingleRecordById('users', array('mobile_no' => $username));
         $aa  = (json_decode(file_get_contents("php://input")));
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
                   // $shop_data = $this->db->get_where("users", ['id' => $user_id])->row_array();

            
        } else {
            
            $insert = array();
           // $authorization = apache_request_headers()["user_id"];
            
            $insert['fav'] = $aa->fav;
           // $insert['user_id'] = $authorization;
          
          $insert['created_date'] = date('Y-m-d H:i:s');
           
             $check_shop = $this->Common_model->getSingleRecordById('users', array('mobile_no' => $username));
                if (empty($check_shop)) {
                    if (empty($check_email)) {
                      $add_otp = $this->Common_model->updateRecords('users', $insert, array('mobile_no' => $username));
                     // $add_otp = $this->Common_model->addRecords('users', $insert);
                        $check_gst = $this->Common_model->getSingleRecordById('users', array('id' => $add_otp));
                        
                        $responseArray = array('status' => TRUE, 'message' => 'fav send successfully.', 'data' => [$insert]);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => ' number is  not exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'number is  not exits.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            
        }
    }
      
public function mobilenumbersend_post() {
  $aa  = (json_decode(file_get_contents("php://input")));
        $otp = mt_rand(100000, 999999);
        $username = $aa->username;
        $check_user = $this->Common_model->getSingleRecordById('users', array('mobile_no' => $username));
        if (!empty($check_user)) {
            $check_user1 = $this->Common_model->getSingleRecordById('users', array('mobile_no' => $username));
            $post_data = array();
            //$post_data['create_date'] = date('Y-m-d H:i:s');
            $post_data['mobile_no'] = $aa->username;
            $post_data['otp'] = $aa->otp;
            if ($check_user1) {
                $subject = "Otp Verify";
                $message = "<p>Thank for foget password,</p>";
                $message.= "<p>please verify otp is :-<strong>" . $otp . "</strong> after that you have to foget password.Thank you</p>";
                $message = "otp=" . $otp;
                // $header = "From:abc@somedomain.com \r\n";
                //$header .= "Cc:afgh@somedomain.com \r\n";
                $header = "MIME-Version: 1.0\r\n";
                $header.= "Content-type: text/html\r\n";
                //     $retval = mail ($to,$subject,$message,$header);
                $message = "otp=" . $otp;
                $retval = mail($username, $subject, $message, $header);
                $add_otp = $this->Common_model->updateRecords('users', $post_data, array('mobile_no' => $username));
                if ($retval) {
                    $this->response(['success' => true, 'message' => "email send successfully."], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "wrong email address."], REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $add_otp = $this->Common_model->addRecords('users', $post_data);
            }
        }
    }
      
  
  
  
  
  
    
  
  
  
  public function contact_post() {
        
        $aa  = (json_decode(file_get_contents("php://input")));

        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|trim');
       // $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|numeric|trim');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run() == TRUE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $insert_data = array();
            $insert_data['name'] = $aa->name;;
            $insert_data['email'] = $aa->email;
          
            $insert_data['number'] = $aa->number;
            $insert_data['message'] = $aa->message;
            $insert_data['create_date'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('contactus', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "Contact us has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    
  
     public function getProducts_get($id) {
        if (!empty($id)) {
            $shop_category = $this->Common_model->getSingleData('shopcategories', array('id' => $id));
            if (!empty($shop_category)) {
                $shop_category_name = $shop_category['category_name'];
                $product_category = $this->Common_model->GetWhere('product', array('saller_category' => $shop_category_name));
                $dauumy = array();
                $dauumy['city_list'] = $this->Common_model->GetWhere('city_list', array('1' => 1));
                $dauumy['area'] = $this->Common_model->GetWhere('area', array('1' => 1));
                $dauumy['model'] = $this->Common_model->GetWhere('model', array('1' => 1));
                $dauumy['shop_categry_list'] = $shop_category;
                if (!empty($product_category)) {
                    foreach ($product_category as $key => $vale) {
                        $brand = $vale['brand'];
                        // $dauumy['brnd_list'][$key]= $this->Common_model->getSingleData('brand', array('brand_name' => $brand));
                        $dauumy['product_list'][$key] = $vale;
                    }
                    $this->response(['success' => true, 'message' => "product list.", 'data' => $dauumy], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Product not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
                }
                //p($product_category);
                
            } else {
                $this->response(['success' => false, 'message' => "Shop Category not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
            //p($shop_category['category_name']);
            
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function featured_product_list_get() {
        $featured_products = $this->db->get_where("product", ['featured_status' => 1])->result_array();
        if (!empty($featured_products)) {
            foreach ($featured_products as $k => $super_sell_product) {
                // $featured_array['product_id'] = $super_sell_product->product_id;
                // $featured_array['product_reg_id'] = $super_sell_product->product_reg_id;
                // $featured_array['shop_id'] = $super_sell_product->shop_id;
                // $featured_array['categories_id'] = $super_sell_product->categories_id;
                // $featured_array['sub_categories_id'] = $super_sell_product->sub_categories_id;
                // $featured_array['name'] = $super_sell_product->name;
                // $featured_array['description'] = $super_sell_product->description;
                // $featured_array['quantity'] = $super_sell_product->quantity;
                // $featured_array['unit_price'] = $super_sell_product->unit_price;
                // $featured_array['discount'] = $super_sell_product->discount;
                // $featured_array['discount_type'] = $super_sell_product->discount_type;
                // $featured_array['colors'] = $super_sell_product->colors;
                // $featured_array['choice_options'] = $super_sell_product->choice_options;
                // $featured_array['variations'] = $super_sell_product->variations;
                // $featured_array['unit'] = $super_sell_product->unit;
                // $featured_array['return_policy'] = $super_sell_product->return_policy;
                // foreach (json_decode($super_sell_product->product_images) as $product_image) {
                //     $product_images = base_url() . 'uploads/product_images/' . $product_image;
                //     $product_img[] = json_decode($product_images);
                // }
                // $featured_array['product_images'] = $product_img;
                $featured_products[$k]['main_image'] = base_url() . 'uploads/product_images/' . $super_sell_product['main_image'];
                // $featured_array['tags'] = $super_sell_product->tags;
                // $featured_array['meta_title'] = $super_sell_product->meta_title;
                // $featured_array['meta_image'] = $super_sell_product->meta_image;
                // $featured_array['num_of_sale'] = $super_sell_product->num_of_sale;
                // $featured_array['status'] = $super_sell_product->status;
                // $featured_array['featured_status'] = $super_sell_product->featured_status;
                // $featured_array['bestseller_status'] = $super_sell_product->bestseller_status;
                // $featured_array['clearance_status'] = $super_sell_product->clearance_status;
                // $featured_array['create_date'] = $super_sell_product->create_date;
                // $data[] = $featured_array;
                
            }
            $this->response(['success' => true, 'message' => "Featured product found successfully.", 'data' => $featured_products], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function sellerByBuyerRequest_get($id) {
        if (!empty($id)) {
            $global_request = $this->Common_model->GetWhere('globalcategory', array('shop_category_id' => $id));
            $this->response(['success' => true, 'message' => "buyer request list.", 'data' => $global_request], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
  public function calendergetapi_get($event_id) {
        if (!empty($event_id)) {
            $global_request = $this->Common_model->GetWhere('recodes', array('event_id' => $event_id));
            $this->response(['success' => true, 'message' => "buyer request list.", 'data' => $global_request], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * Get All best seller products
     *
     * @return Response
     */
    public function best_seller_products_get() {
        $best_sellers = $this->db->get_where("product", ['bestseller_status' => 1, 'status' => 1])->result_array();
        foreach ($best_sellers as $k => $best_seller) {
            // $best_seller_array['product_id'] = $best_seller['product_id'];
            // $best_seller_array['product_reg_id'] = $best_seller['product_reg_id'];
            // $best_seller_array['shop_id'] = $best_seller['shop_id'];
            // $best_seller_array['categories_id'] = $best_seller['categories_id'];
            // $best_seller_array['sub_categories_id'] = $best_seller['sub_categories_id'];
            // $best_seller_array['name'] = $best_seller['name'];
            // $best_seller_array['description'] = $best_seller['description'];
            // $best_seller_array['quantity'] = $best_seller['quantity'];
            // $best_seller_array['unit_price'] = $best_seller['unit_price'];
            // $best_seller_array['discount'] = $best_seller['discount'];
            // $best_seller_array['discount_type'] = $best_seller['discount_type'];
            // $best_seller_array['colors'] = $best_seller['colors'];
            // $best_seller_array['choice_options'] = $best_seller['choice_options'];
            // $best_seller_array['variations'] = $best_seller['variations'];
            // $best_seller_array['unit'] = $best_seller['unit'];
            // $best_seller_array['return_policy'] = $best_seller['return_policy'];
            // foreach (json_decode($best_seller['product_images']) as $product_image) {
            //     $product_images = base_url() . 'uploads/product_images/' . $product_image;
            //     $product_img[] = $product_images;
            // }
            // $best_seller_array['product_images'] = json_encode($product_img);
            $best_sellers[$k]['main_image'] = base_url() . 'uploads/product_images/' . $best_seller['main_image'];
            // $best_seller_array['tags'] = $best_seller['tags'];
            // $best_seller_array['meta_title'] = $best_seller['meta_title'];
            // $best_seller_array['meta_image'] = $best_seller['meta_image'];
            // $best_seller_array['num_of_sale'] = $best_seller['num_of_sale'];
            // $best_seller_array['status'] = $best_seller['status'];
            // $best_seller_array['featured_status'] = $best_seller['featured_status'];
            // $best_seller_array['bestseller_status'] = $best_seller['bestseller_status'];
            // $best_seller_array['clearance_status'] = $best_seller['clearance_status'];
            // $best_seller_array['create_date'] = $best_seller['create_date'];
            // $data[] = $best_seller_array;
            
        }
        if (!empty($best_sellers)) {
            $this->response(['success' => true, 'message' => "Best Seller found successfully.", 'data' => $best_sellers], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * Get All trending product list
     *
     * @return Response
     */
    public function trending_product_list_get() {
        $trending_products = $this->Common_model->getLatestRecords("product", 'num_of_sale', 10);
        foreach ($trending_products as $k => $trending_product) {
            // $trending_product_array['product_id'] = $trending_product['product_id'];
            // $trending_product_array['product_reg_id'] = $trending_product['product_reg_id'];
            // $trending_product_array['shop_id'] = $trending_product['shop_id'];
            // $trending_product_array['categories_id'] = $trending_product['categories_id'];
            // $trending_product_array['sub_categories_id'] = $trending_product['sub_categories_id'];
            // $trending_product_array['name'] = $trending_product['name'];
            // $trending_product_array['description'] = $trending_product['description'];
            // $trending_product_array['quantity'] = $trending_product['quantity'];
            // $trending_product_array['unit_price'] = $trending_product['unit_price'];
            // $trending_product_array['discount'] = $trending_product['discount'];
            // $trending_product_array['discount_type'] = $trending_product['discount_type'];
            // $trending_product_array['colors'] = $trending_product['colors'];
            // $trending_product_array['choice_options'] = $trending_product['choice_options'];
            // $trending_product_array['variations'] = $trending_product['variations'];
            // $trending_product_array['unit'] = $trending_product['unit'];
            // $trending_product_array['return_policy'] = $trending_product['return_policy'];
            $trending_products[$k]['main_image'] = base_url() . 'uploads/product_images/' . $trending_product['main_image'];
            // $trending_product_array['tags'] = $trending_product['tags'];
            // $trending_product_array['meta_title'] = $trending_product['meta_title'];
            // $trending_product_array['meta_image'] = $trending_product['meta_image'];
            // $trending_product_array['num_of_sale'] = $trending_product['num_of_sale'];
            // $trending_product_array['status'] = $trending_product['status'];
            // $trending_product_array['featured_status'] = $trending_product['featured_status'];
            // $trending_product_array['bestseller_status'] = $trending_product['bestseller_status'];
            // $trending_product_array['clearance_status'] = $trending_product['clearance_status'];
            // $trending_product_array['create_date'] = $trending_product['create_date'];
            // $data[] = $trending_product_array;
            
        }
        if (!empty($trending_products)) {
            $this->response(['success' => true, 'message' => "Trending product found successfully.", 'data' => $trending_products], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * Get All super sell product list
     *
     * @return Response
     */
    public function super_sell_product_list_get() {
        $super_sell_products = $this->Common_model->getAllRecordsByLimitId("product", ['clearance_status' => 1, 'status' => 1], 10);
        foreach ($super_sell_products as $k => $super_sell_product) {
            // $super_sell_array['product_id'] = $super_sell_product['product_id'];
            // $super_sell_array['product_reg_id'] = $super_sell_product['product_reg_id'];
            // $super_sell_array['shop_id'] = $super_sell_product['shop_id'];
            // $super_sell_array['categories_id'] = $super_sell_product['categories_id'];
            // $super_sell_array['sub_categories_id'] = $super_sell_product['sub_categories_id'];
            // $super_sell_array['name'] = $super_sell_product['name'];
            // $super_sell_array['description'] = $super_sell_product['description'];
            // $super_sell_array['quantity'] = $super_sell_product['quantity'];
            // $super_sell_array['unit_price'] = $super_sell_product['unit_price'];
            // $super_sell_array['discount'] = $super_sell_product['discount'];
            // $super_sell_array['discount_type'] = $super_sell_product['discount_type'];
            // $super_sell_array['colors'] = $super_sell_product['colors'];
            // $super_sell_array['choice_options'] = $super_sell_product['choice_options'];
            // $super_sell_array['variations'] = $super_sell_product['variations'];
            // $super_sell_array['unit'] = $super_sell_product['unit'];
            // $super_sell_array['return_policy'] = $super_sell_product['return_policy'];
            // foreach (json_decode($super_sell_product['product_images']) as $product_image) {
            //     $product_images = base_url() . 'uploads/product_images/' . $product_image;
            //     $product_img[] = $product_images;
            // }
            // $super_sell_array['product_images'] = json_encode($product_img);
            $super_sell_products[$k]['main_image'] = base_url() . 'uploads/product_images/' . $super_sell_product['main_image'];
            // $super_sell_array['tags'] = $super_sell_product['tags'];
            // $super_sell_array['meta_title'] = $super_sell_product['meta_title'];
            // $super_sell_array['meta_image'] = $super_sell_product['meta_image'];
            // $super_sell_array['num_of_sale'] = $super_sell_product['num_of_sale'];
            // $super_sell_array['status'] = $super_sell_product['status'];
            // $super_sell_array['featured_status'] = $super_sell_product['featured_status'];
            // $super_sell_array['bestseller_status'] = $super_sell_product['bestseller_status'];
            // $super_sell_array['clearance_status'] = $super_sell_product['clearance_status'];
            // $super_sell_array['create_date'] = $super_sell_product['create_date'];
            // $data[] = $super_sell_array;
            
        }
        if (!empty($super_sell_products)) {
            $this->response(['success' => true, 'message' => "Super sell found successfully.", 'data' => $super_sell_products], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * Get common images
     *
     * @return Response
     */
    public function common_images_get() {
        $common_images = $this->db->get_where("common_setting", ['status' => 1])->result();
        foreach ($common_images as $common_image) {
            if ($common_image->option_name == 'backedn_login_background_image') {
                $data['background_image'] = base_url() . '/uploads/' . $common_image->option_value;
            }
            if ($common_image->option_name == 'backlogo') {
                $data['background_logo'] = base_url() . '/uploads/' . $common_image->option_value;
            }
            if ($common_image->option_name == 'backedn_login_background_image') {
                $data['front_logo'] = base_url() . '/uploads/' . $common_image->option_value;
            }
        }
        if ($data) {
            $this->response(['success' => true, 'message' => "Super sell found successfully.", 'data' => $data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * Get Banner images
     *
     * @return Response
     */
    public function banner_slider_images_get() {
        $banner_slider_images = $this->db->get_where("homebannerslider", ['status' => 1])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['title'] = $banner_slider_image->title;
            $data['slider_image'] = base_url() . 'uploads/homebannerslider/' . $banner_slider_image->image;
            $data['link'] = $banner_slider_image->link;
            $slider_images[] = $data;
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => "banner slider images found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /////////////////////////////////<Seller API's>///////////////////////////////////////////
    public function favtestapi_get($user_id) {
        $banner_shop_catory = $this->db->get_where("favorite", ['user_id' => $user_id])->row_array();
        if (!empty($banner_shop_catory)) {
            
            $name = !empty($banner_shop_catory['fav']) ? $banner_shop_catory['fav'] : '';
            
            $productlist = $this->db->get_where("product", ['id' => $name])->row_array();
            $this->response(['success' => true, 'message' => "product list.", 'data' => $productlist], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function ProductByBrand_get($id) {
        if (!empty($id)) {
            $banner_product = $this->db->get_where("product", ['product_id' => $id])->row_array();
            if (!empty($banner_product)) {
                $name = $banner_product['brand'];
                $brandlist = $this->db->get_where("brand", ['brand_name' => $name])->result_array();
                $this->response(['success' => true, 'message' => "brand list.", 'data' => $brandlist], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(['success' => false, 'message' => "id required.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function cityByArea_get($id) {
        $city_data = $this->db->get_where("city_list", ['id' => $id])->row_array();
        if (!empty($city_data)) {
            $name = !empty($city_data['name']) ? $city_data['name'] : '';
            $area_list = $this->db->get_where("area", ['city' => $name])->result_array();
            $this->response(['success' => true, 'message' => "area list.", 'data' => $area_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function productByModel_get($id) {
        $product_data = $this->db->get_where("product", ['id' => $id])->row_array();
        if (!empty($product_data)) {
            $name = !empty($product_data['name']) ? $product_data['name'] : '';
            $product_list = $this->db->get_where("model", ['product_name' => $name])->result_array();
            $this->response(['success' => true, 'message' => "model list.", 'data' => $product_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * Get sub sub category by sub category
     *
     * @return Response
     */
    //GLOBAL REQ Home
    public function getGlobelreq_get($id) {
        $global_data = $this->db->get_where("globalcategory", ['id' => $id])->row_array();
        if (!empty($global_data)) {
            $id = !empty($global_data['id']) ? $global_data['id'] : '';
            $global_list = $this->db->get_where("globalcategory", ['id' => $id])->result_array();
            $this->response(['success' => true, 'message' => "global  list by user id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function shopreqbysellerid_get($seller_id) {
        $global_data = $this->db->get_where("globalcategory", ['seller_id' => $seller_id])->row_array();
        $this->db->order_by("id", "desc");
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("globalcategory", ['seller_id' => $seller_id, 'role_re' => 'shop'])->result_array();
            $this->response(['success' => true, 'message' => "shop list by  seller id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
        
    //   $shop = $this->db->get_where("shops", ['shop_id' => $seller_id])->row_array();
    //     $area=$shop->area;
    //     $where="(seller_id='$seller_id' OR area='$area')";
    //     $global_data = $this->db->get_where("globalcategory",$where)->row_array();
        
    //     $this->db->order_by("id", "desc");
    //     if (!empty($global_data)) {
    //         $global_list = $this->db->get_where("globalcategory",$where)->result_array();
    //         $this->response(['success' => true, 'message' => "shop list by  seller id.", 'data' => $global_list], REST_Controller::HTTP_OK);
    //     } else {
    //         $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
    //     }
        
    }
    //userrequestpage
    public function globalreqbyuserid_get($user_id) {
        $global_data = $this->db->get_where("globalcategory", ['user_id' => $user_id, 'status' => '0'])->row_array();
        $this->db->order_by("id", "desc");
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("globalcategory", ['user_id' => $user_id, 'status' => '0'])->result_array();
            $this->response(['success' => true, 'message' => "shop list by shop user id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function pricelist_get($requset_id) {
        $global_data = $this->db->get_where("seller_specificr", ['requset_id' => $requset_id])->row_array();
        $this->db->order_by("price", "asc");
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("seller_specificr", ['requset_id' => $requset_id])->result_array();
            $this->response(['success' => true, 'message' => "list by price .", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function shopreqbyuserid_get($id) {
        $global_data = $this->db->get_where("globalcategory", ['id' => $id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("globalcategory", ['id' => $id])->result_array();
            $this->response(['success' => true, 'message' => "global  list by shop  id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function shoplistbyseller_get($shop_category_id, $city, $area) {
        $global_data = $this->db->get_where("shops", ['shop_category_id' => $shop_category_id, 'city' => $city, 'area' => $area])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("shops", ['shop_category_id' => $shop_category_id, 'city' => $city, 'area' => $area])->result_array();
            $this->response(['success' => true, 'message' => "shop  list by category  id city id area id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function globalreqbyshopcategory_get($user_id) {
        
       
        if (!empty($global_data)) {
            $dummy = array();
            if (!empty($global_data)) {
                foreach ($global_data as $key => $value) {
                    $city = $this->db->get_where("product", ['id' => $value['fav']])->row_array();
                    $dummy[$key]['area_name'] = $area['title'];
                    $dummy[$key]['city_name'] = $city['title'];
                    $dummy[$key]['global_req'] = $value;
                }
            }
            //p($dummy);
            // $global_list = $this->db->get_where("globalcategory", ['shop_category_id' =>$shop_category_i])->result_array();
            $this->response(['success' => true, 'message' => "global list by shop category id.", 'data' => $dummy], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function singlesellerdatabyid_get($user_id) {
        $global_data = $this->db->get_where("favorite", ['user_id' => $user_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("favorite", ['user_id' => $user_id])->row_array();
            $areaid = $global_list['fav'];
            $area = $this->db->get_where("product", ['id' => $global_list['fav']])->row_array();
            $global_list['id'] = $area;
            
            //$k = phpinfo();
            $this->response(['success' => true, 'message' => "single seller data by  id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => '[]'], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function getsellerspecificlist_get($user_id) {
        $global_data = $this->db->get_where("favorite", ['user_id' => $user_id])->result_array();
        if (!empty($global_data)) {
            $output_array = [];
            foreach ($global_data as $global_list) {
                //p($global_list);
                $sellerid = $this->db->get_where("product", ['id' => $global_list['fav']])->row_array();
               // $userid = $this->db->get_where("users", ['subscriber_id' => $global_list['user_id']])->row_array();
                //$requestid = $this->db->get_where("globalcategory", ['id' => $global_list['requset_id']])->row_array();
               // $global_list['saller_id'] = $sellerid;
               // $global_list['user_id'] = $userid;
               // $global_list['requset_id'] = $requestid;
                $output_array[] = $global_list;
            }
            $this->response(['success' => true, 'message' => "specific request list by  seller id", 'data' => $output_array], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    //sellerhomeglobal
    public function getglobalrequest_get($shop_category_id, $city_id, $area) {
        $timenow = time() * 1000 + 19800000;
        $global_data = $this->db->get_where("globalcategory", ['shop_category_id' => $shop_category_id, 'city_id' => $city_id, 'area' => $area, 'role_re' => 'global', 'expiry_quote >' => $timenow, 'status' => '0'])->result_array(); //,'expiry_quote <'=>$timenow
        //$global_data = $this->db->get_where("globalcategory", ['shop_category_id' =>$shop_category_id ,'city_id' =>$city_id,'area' =>$area,''])->row_array();
        if (!empty($global_data)) {
            // $global_list = $this->db->get_where("globalcategory", ['shop_category_id' =>$shop_category_id ,'city_id' =>$city_id,'area' =>$area])->result_array();
            $this->response(['success' => true, 'message' => "single seller data by  id.", 'data' => $global_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function globalreqbysellerid_get($seller_id) {
        $global_data = $this->db->get_where("globalcategory", ['seller_id' => $seller_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("globalcategory", ['seller_id' => $seller_id])->result_array();
            $this->response(['success' => true, 'message' => "global request.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function globalreqbyarea_get($area) {
        $global_data = $this->db->get_where("globalcategory", ['area' => $area])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("globalcategory", ['area' => $area])->result_array();
            $this->response(['success' => true, 'message' => "global  list by seller id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    //order complete
    public function historybysellerid_get($saller_id) {
        $global_data = $this->Common_model->getwhereorderby("ordercomplete", ['saller_id' => $saller_id], "id", "desc");
        //$this->db->order_by("id", "desc");
         $output_array = [];
        if (!empty($global_data)) {
           
            foreach ($global_data as $global_list) {
                $sellerid = $global_list['saller_id'];
                $id = $global_list['id'];
                $userid = $global_list['user_id'];
                $requestid = $global_list['request_id'];
                $id = $this->db->get_where("ordercomplete", ['id' => $global_list['id'], 'DESC'])->row_array();
                $sellerid = $this->db->get_where("shops", ['shop_id' => $global_list['saller_id'], 'id', 'DESC'])->row_array();
                $userid = $this->db->get_where("users", ['subscriber_id' => $global_list['user_id'], 'DESC'])->row_array();
                $requestid = $this->db->get_where("globalcategory", ['id' => $global_list['request_id'], 'DESC'])->row_array();
                $global_list['saller_id'] = $sellerid;
                $global_list['user_id'] = $userid;
                $global_list['request_id'] = $requestid;
                $global_list['id'] = $id;
                $output_array[] = $global_list;
            }
            
            $this->response(['success' => true, 'message' => "history by seller id.", 'data' => $output_array, 'id', 'DESC'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
     public function favoritebasedonuserid_get($user_id) {
         
         $global_data = $this->db->get_where("favorite", ['user_id' => $user_id])->result_array();
        if (!empty($global_data)) {
            $output_array = [];
            foreach ($global_data as $global_list) {
                $sellerid = $global_list['fav'];
             
                $sellerid = $this->db->get_where("product", ['id' => $global_list['fav']])->row_array();
        
        $banner_slider_images = $this->db->get_where("product", ['id' => $sellerid['id']])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            $data['product_name'] = $banner_slider_image->product_name;
            $data['price'] = $banner_slider_image->price;
            $data['image'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image;
            $data['image1'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image1;
             $data['image2'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image2;
           
            $slider_images[] = $data;
        }
            }
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
   
    public function historybyuserid_get($user_id) {
        $global_data = $this->db->get_where("favorite", ['user_id' => $user_id])->result_array();
        if (!empty($global_data)) {
            $output_array = [];
            foreach ($global_data as $global_list) {
                $sellerid = $global_list['fav'];
             
                $sellerid = $this->db->get_where("product", ['id' => $global_list['fav']])->row_array();
                
               //  $img = $this->db->get_where("product", ['id' => $sellerid['id']])->result();
                     $sellerid1 = $sellerid['id'];
                
                $sellerid['image'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $sellerid->image;
              //  $sellerid['image1'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $img->image1;
                
                            $global_list['price'] = $global_list->price;
                
                $global_list['fav'] = $sellerid;
                
                
                
                $output_array[] = $global_list;
                
            }
            $this->response(['success' => true, 'message' => "history by user id.", 'data' => $output_array], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
    public function historybyid_get($id) {
        $global_data = $this->db->get_where("ordercomplete", ['saller' => $id])->result_array();
        if (!empty($global_data)) {
            $output_array = [];
            foreach ($global_data as $global_list) {
                $sellerid = $global_list['saller_id'];
                $userid = $global_list['user_id'];
                $requestid = $global_list['request_id'];
                $sellerid = $this->db->get_where("shops", ['shop_id' => $global_list['saller_id']])->row_array();
                $userid = $this->db->get_where("users", ['subscriber_id' => $global_list['user_id']])->row_array();
                $requestid = $this->db->get_where("globalcategory", ['id' => $global_list['request_id']])->row_array();
                $global_list['saller_id'] = $sellerid;
                $global_list['user_id'] = $userid;
                $global_list['request_id'] = $requestid;
                $output_array[] = $global_list;
            }
            $this->response(['success' => true, 'message' => "history by  id.", 'data' => $output_array], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
    public function shoplistbyshopid_get($shop_id) {
        $global_data = $this->db->get_where("shops", ['shop_id' => $shop_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("shops", ['shop_id' => $shop_id])->result_array();
            $this->response(['success' => true, 'message' => "shop list by id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
    public function subsubcategorylist_by_subcatid_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sub_category_id', 'Sub Category ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $category_id = $this->input->post('sub_category_id');
            $categories_list = $this->db->get_where("categories", ['status' => 1, 'parent_category_id' => $category_id])->result();
            foreach ($categories_list as $category) {
                $data['categories_id'] = $category->categories_id;
                $data['category_name'] = $category->category_name;
                $data['category_percentage'] = $category->category_percentage;
                $data['parent_category_id'] = $category->parent_category_id;
                $data['parent_sub_category_id'] = $category->parent_sub_category_id;
                if (isset($category->category_image) && $category->category_image != '') {
                    $data['category_image'] = base_url() . 'uploads/category/' . $category->category_image;
                } else {
                    $data['category_image'] = '';
                }
                $data['status'] = $category->status;
                $data['create_date'] = $category->create_date;
                $data['modify_date'] = $category->modify_date;
                $category_list[] = $data;
            }
            if ($categories_list) {
                $this->response(['success' => true, 'message' => "categories list found successfully.", 'data' => $category_list], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    /**
     * Get sub sub category by sub category
     *
     * @return Response
     */
    public function updateprofile_post() {
        if (isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['auth_token']) && !empty($_POST['auth_token'])) {
            $userId = $_POST['user_id'];
            $auth_token = $_POST['auth_token'];
            $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
            if (isset($userData) && !empty($userData)) {
                $update_data = array();
                if (isset($_POST['full_name']) && !empty($_POST['full_name'])) {
                    $update_data['full_name'] = $_POST['full_name'];
                }
                if (isset($_POST['mobile_no']) && !empty($_POST['mobile_no'])) {
                    $check_mobile_no = $this->Common_model->getWhereData("users", array('id !=' => $userId, 'mobile_no' => $_POST['mobile_no']));
                    // print_r($check_mobile_no);
                    if (!empty($check_mobile_no)) {
                        // echo "hi";
                        // $this->response(['success' => false,'message'=>"Mobile Number already regitered",'data'=>''],REST_Controller::HTTP_NOT_FOUND);
                        // $this->response(['success' => false,'message'=>"Mobile Number already regitered",'data'=>''], REST_Controller::HTTP_CONFLICT);
                        echo json_encode(['success' => false, 'message' => "Mobile Number already regitered", 'data' => ''], true);
                        exit();
                    }
                    $update_data['mobile_no'] = $_POST['mobile_no'];
                }
                if (isset($_POST['email']) && !empty($_POST['email'])) {
                    $check_email = $this->Common_model->getWhereData("users", array('id !=' => $userId, 'email' => $_POST['email']));
                    if (!empty($check_email)) {
                        // $this->response(['success' => false,'message'=>"Email already regitered",'data'=>'']);
                        // $this->response(['success' => false,'message'=>"Email already regitered",'data'=>''], REST_Controller::HTTP_CONFLICT);
                        echo json_encode(['success' => false, 'message' => "Email already regitered", 'data' => ''], true);
                        exit();
                    }
                    $update_data['email'] = $_POST['email'];
                }
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $uploadpath = "./uploads/customerprofilepic/";
                    $filearrayddata = $this->uploadfilebypath('image', $uploadpath);
                    if (isset($filearrayddata)) {
                        $update_data['image'] = $filearrayddata;
                    }
                }
                if (isset($_POST['city']) && !empty($_POST['city'])) {
                    $update_data['city'] = $_POST['city'];
                }
                if (isset($_POST['state']) && !empty($_POST['state'])) {
                    $update_data['state'] = $_POST['state'];
                }
                if (isset($_POST['age']) && !empty($_POST['age'])) {
                    $update_data['age'] = $_POST['age'];
                }
                if (isset($_POST['gender']) && !empty($_POST['gender'])) {
                    $update_data['gender'] = $_POST['gender'];
                }
                if (isset($_POST['address']) && !empty($_POST['address'])) {
                    $update_data['address'] = $_POST['address'];
                }
                if (isset($_POST['pincode']) && !empty($_POST['pincode'])) {
                    $update_data['zipcode'] = $_POST['pincode'];
                }
                $update_data['fcm_token'] = $userData['fcm_token'];
                // $result = $this->Common_model->updateRecords('users',$update_data,array('id' => $userId));
                if (isset($update_data) && !empty($update_data)) {
                    $this->Common_model->updateRecords('users', $update_data, array('id' => $userId));
                    $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
                    // if (isset($userData['image']) && !empty($userData['image'])) {
                    //     $userData['image'] = $userData['image'];
                    // }
                    $this->response(['success' => true, 'message' => "Profile has been updated successfully", 'data' => $userData, 'profile_img_url' => base_url() . 'uploads/customerprofilepic/'], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Not changes", 'data' => ''], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['success' => false, 'message' => "Invalid user id and auth token please try again.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(['success' => false, 'message' => "User id and auth token are required", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
    /**
     *get about us content
     *
     *@return Response
     */
    public function aboutus_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $userData = $this->Common_model->getSingleData('aboutus', array('id' => $_POST['id']));
            if (!empty($userData)) {
                $post_data = array();
                $post_data['title	'] = !empty($_POST['title']) ? $_POST['title'] : $userData['title'];
                $post_data['editor1'] = !empty($_POST['editor1']) ? $_POST['editor1'] : $userData['editor1'];
                $update = $this->Common_model->updateRecords('aboutus', $post_data, array('id' => $_POST['id']));
                $userData = $this->Common_model->getSingleData('aboutus', array('id' => $_POST['id']));
                $this->response(['status' => true, 'message' => "aboutus updated successfull.", 'data' => $userData], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => false, 'message' => "Opps somting want wrong.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }
    }
    /**
     * get user agreement content
     *
     * @return Response
     */
    public function user_agreement_get() {
        $seller_data = $this->Common_model->getSingleData('user_agreement', array('id' => 1));
        if ($seller_data) {
            $this->response(['success' => true, 'message' => "user agreement data found successfully.", 'data' => $seller_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * get cancel return content
     *
     * @return Response
     */
    public function cancellationReturnpolicy_get() {
        $seller_data = $this->Common_model->getSingleData('cancel_return', array('id' => 2));
        if ($seller_data) {
            $this->response(['success' => true, 'message' => "cancel reurn policy data found successfully.", 'data' => $seller_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * get cancel return content
     *
     * @return Response
     */
    public function termsCondition_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lang', 'Language', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $lang = $this->input->post('lang');
            $data_array = array();
            $fileds = array("1" => "1");
            $checckterm_cond = $this->Common_model->getSingleRecordById('terms_condition', $fileds);
            if ($lang == "hi") {
                if (!empty($checckterm_cond['title_hindi']) && !empty($checckterm_cond['description'])) {
                    $data_array['title'] = $checckterm_cond['title'];
                    $data_array['editor1'] = $checckterm_cond['editor1'];
                }
            } else {
                if (!empty($checckterm_cond['title']) && !empty($checckterm_cond['editor1'])) {
                    $data_array['title'] = $checckterm_cond['title'];
                    $data_array['editor1'] = $checckterm_cond['editor1'];
                }
            }
            if (!empty($data_array)) {
                $this->response(['success' => true, 'message' => "terms and condition found successfully.", 'Terms' => $data_array], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        // $seller_data = $this->Common_model->getSingleData('terms_condition', array('id' => 1));
        // if ($seller_data) {
        //     $this->response(['success' => true, 'message' => "terms condition data found successfully.", 'data' => $seller_data], REST_Controller::HTTP_OK);
        // } else {
        //     $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        // }
        
    }
    /**
     * get privacy policy content
     *
     * @return Response
     */
    public function privacyPolicy1_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lang', 'Languge', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $lang = $this->input->post('lang');
            $fileds = array("1" => "1");
            $check_privacy_policy = $this->Common_model->GetWhere('user_privacy_policy', $fileds);
            $data_array = array();
            if (!empty($check_privacy_policy)) {
                foreach ($check_privacy_policy as $key => $value) {
                    if ($lang == "hi") {
                        if (!empty($value['title_hindi']) && !empty($value['dicription_hindi'])) {
                            $data_array[$key]['title'] = $value['title'];
                            $data_array[$key]['editor1'] = $value['editor1'];
                        }
                    } else {
                        if (!empty($value['title']) && !empty($value['editor1'])) {
                            $data_array[$key]['title'] = $value['title'];
                            $data_array[$key]['editor1'] = $value['editor1'];
                        }
                    }
                }
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
            if (!empty($data_array)) {
                $this->response(['success' => true, 'message' => "privacy policy data found successfully.", 'privacy_policy' => $data_array], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        /* $seller_data = $this->Common_model->getSingleData('user_privacy_policy', array('id' => 1));
        if ($seller_data) {
            $this->response(['success' => true, 'message' => "privacy policy data found successfully.", 'data' => $seller_data], REST_Controller::HTTP_OK);
        } else {
        
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }*/
    }
    /**
     * get product list with filtter
     *
     * @return Response
     */
    public function productlist_post() {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        // print_r($data);
        $whr = array();
        $whr[] = "status=1";
        // if (isset($data['categories_id']) && !empty($data['categories_id'])) {
        //     $whr[] = "categories_id = " . $data['categories_id'] . "";
        // }
        // if (isset($data['sub_categories_id']) && !empty($data['sub_categories_id'])) {
        //     $whr[] = "sub_categories_id = " . $data['sub_categories_id'] . "";
        // }
        // if (isset($data['sub_subcategories_id']) && !empty($data['sub_subcategories_id'])) {
        //     $whr[] = "sub_subcategories_id = " . $data['sub_subcategories_id'] . "";
        // }
        if (isset($data['tags']) && !empty($data['tags'])) {
            // $whrp[] = " '".$data['tags']."' in(tags,name,description)";
            $whr[] = " (tags LIKE '%" . $data['tags'] . "%' OR name LIKE '%" . $data['tags'] . "%' OR description LIKE '%" . $data['tags'] . "%' OR meta_title LIKE '%" . $data['tags'] . "%' OR meta_description LIKE '%" . $data['tags'] . "%')";
        }
        // $whr[] = "categories_id=".;
        $where = " WHERE " . implode(" AND ", $whr);
        $orderby = "order by product_id asc";
        // if (isset($data['sortby']) && !empty($data['sortby'])) {
        //     if ($data['sortby'] == "pricesortmintomax") {
        //         $orderby = "order by unit_price asc";
        //     }
        //     if ($data['sortby'] == "pricesortmaxtomin") {
        //         $orderby = "order by unit_price desc";
        //     }
        //     if ($data['sortby'] == "newest") {
        //         $orderby = "order by create_date desc";
        //     }
        //     if ($data['sortby'] == "rating") {
        //         $orderby = "order by avg_rating desc";
        //     }
        // }
        $productsData = $this->Common_model->getwherecustomecol('product', "*", $where, $orderby);
        if (!empty($productsData)) {
            $this->response(['success' => true, 'message' => "success", 'data' => $productsData], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * get product list with filtter
     *
     * @return Response
     */
    public function productDetail_post() {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        if (isset($data['product_id']) && !empty($data['product_id'])) {
            // print_r($data);
            $whr = array();
            $whr[] = "status=1";
            $whr[] = "product_id = " . $data['product_id'] . "";
            // $whr[] = "categories_id=".;
            $where = " WHERE " . implode(" AND ", $whr);
            $orderby = "";
            $productsData = $this->Common_model->getwherecustomecol('product', "*", $where, $orderby);
            if (!empty($productsData)) {
                //           foreach ($productsData as $k => $productsDataarray) {
                //               $whrr = array();
                //               $whrr[] = "p.status = 1";
                //               if (isset($data['product_id']) && !empty($data['product_id'])) {
                // $whrr[] = "p.product_id = " . $data['product_id'] . "";
                //               }
                //               $wherer = " WHERE " . implode(" AND ", $whrr);
                //               $productsData[$k]['userreviewrating'] = $this->Common_model->getwhrproductratingdetailwithusername($wherer);
                //               if (isset($productsData[$k]['userreviewrating']) && !empty($productsData[$k]['userreviewrating'])) {
                //                   foreach ($productsData[$k]['userreviewrating'] as $ks => $userreviewsarray){
                //                       $productsData[$k]['userreviewrating'][$ks]['image'] = (isset($userreviewsarray['image']) && !empty($userreviewsarray['image']) ? base_url() . 'uploads/customerprofilepic/' . $userreviewsarray['image'] : '');
                //                   }
                //               }
                //           }
                $this->response(['success' => true, 'message' => "success", 'data' => $productsData[0]], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * Functin for upload image
     *
     * @return Response
     */
    public function uploadfilebypath($key, $path) {
        $message = array();
        $data = array();
        if ($_FILES[$key]['size'] > 0) {
            $config = array('upload_path' => $path, 'allowed_types' => "gif|jpg|png|jpeg|pdf",
            /*'overwrite' => TRUE*/
            'max_size' => 60000, 'max_height' => "", 'max_width' => "");
            $config['remove_spaces'] = true;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload($key)) {
                $uploadData = $this->upload->data();
                $image_name = $uploadData['file_name'];
                return $image_name;
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            return 'Your uploaded image file is blank.';
        }
    }
    /*Nirbhay End */
    /**
     * Submit contact us form
     *
     * @return Response
     */
    public function contact_us_post() {
        
        $aa  = (json_decode(file_get_contents("php://input")));

        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|trim');
       // $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|numeric|trim');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run() == TRUE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $insert_data = array();
            $insert_data['name'] = $aa->name;;
            $insert_data['email'] = $aa->email;
            $insert_data['subject'] = $aa->subject;
            $insert_data['number'] = $aa->number;
            $insert_data['message'] = $aa->message;
            $insert_data['create_date'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('contactus', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "Contact us has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function bill_genration_post() {
        $this->form_validation->set_rules('saller_id', 'saller id', 'required|numeric|trim');
        $this->form_validation->set_rules('amount', 'amount', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $insert_data = array();
            $insert_data['saller_id'] = $this->input->post('saller_id');
            $insert_data['amount'] = $this->input->post('amount');
            $insert_data['created_date'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('vcashSaller', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "amount add successfully"], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function bill_payment_post() {
        $this->form_validation->set_rules('razorpay_id', 'razorpay id', 'required|trim');
        $this->form_validation->set_rules('order_id', 'order_id', 'required|trim');
        $this->form_validation->set_rules('razorpay_signature', 'razorpay_signature', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $insert_data = array();
            $insert_data['razorpay_id'] = $this->input->post('razorpay_id');
            $insert_data['order_id'] = $this->input->post('order_id');
            $insert_data['razorpay_signature'] = $this->input->post('razorpay_signature');
            $insert_data['payment_status'] = $this->response('true');
            $insert_data['created_date'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('vcashSaller', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "abcd"], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    /**
     * Add Multi Address
     *
     * @return Response
     */
    public function add_multi_address_post() {
        // $this->form_validation->set_rules('user_id', 'User ID', 'required|trim|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|trim');
        $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|numeric|trim');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $data = array();
            $data['user_id'] = $this->input->post('user_id');
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('mobile_no');
            $data['zipcode'] = $this->input->post('zipcode');
            $data['address'] = $this->input->post('address');
            $data['latitude'] = $this->input->post('latitude');
            $data['longitude'] = $this->input->post('longitude');
            $add_id = $this->input->post('add_id');
            if (isset($add_id) && !empty($add_id)) {
                $this->Common_model->updateRecords('multiple_address', $data, ['add_id' => $_POST['add_id']]);
                $this->response(['success' => true, 'message' => "Successfully Updated."], REST_Controller::HTTP_OK);
                $data['SUCCESS'] = "Successfully Updated";
            } else {
                $this->Common_model->addRecords('multiple_address', $data);
                $this->response(['success' => true, 'message' => "Added successfully."], REST_Controller::HTTP_OK);
            }
        }
    }
    /**
     *Get Multi Address List
     *
     * @return Response
     */
    public function multi_address_list_post() {
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $id = $this->input->post('user_id');
            if (isset($id) && !empty($id)) {
                $multiple_address_data = $this->db->get_where("multiple_address", ['user_id' => $id])->result();
                $this->response(['success' => true, 'message' => "fetch Address successfully.", 'data' => $multiple_address_data], REST_Controller::HTTP_OK);
            } else {
            }
        }
    }
    /**
     * Delete Multi Address
     *
     * @return Response
     */
    public function delete_multi_address_post() {
        $this->form_validation->set_rules('id', 'ID', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $id = $this->input->post('id');
            $this->Common_model->deleteRecords('multiple_address', ['add_id' => $id]);
            $this->response(['success' => true, 'message' => "Delete address successfully."], REST_Controller::HTTP_OK);
        }
    }
    /**
     * Set unset Defalut Address
     *
     * @return Response
     */
    public function set_unset_defallt_address_post() {
        $this->form_validation->set_rules('status', 'Status', 'required|numeric|trim');
        $this->form_validation->set_rules('add_id', 'Address ID', 'required|numeric|trim');
        $this->form_validation->set_rules('user_id', 'Address ID', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $status = $this->input->post('status');
            $add_id = $this->input->post('add_id');
            $userid = $this->input->post('user_id');
            if (isset($status) && $status == 1) {
                $data['status'] = 0;
                $this->Common_model->updateRecords('multiple_address', $data, ['add_id' => $add_id]);
                $this->response(['success' => true, 'message' => "Successfully Updated."], REST_Controller::HTTP_OK);
                $data['SUCCESS'] = "Successfully Updated";
            } else {
                $data['status'] = 1;
                $res = $this->Common_model->updateRecords('multiple_address', array('status' => 0), array('user_id' => $userid));
                $this->Common_model->updateRecords('multiple_address', $data, ['add_id' => $add_id]);
                $this->response(['success' => true, 'message' => "Successfully Updated."], REST_Controller::HTTP_OK);
            }
        }
    }
    //forgot password seller
    public function forgotpasswordd_post() {
        $otp = mt_rand(100000, 999999);
        $username = !empty($_POST['username']) ? $_POST['username'] : '';
        $check_user = $this->Common_model->getSingleRecordById('shops', array('email' => $username));
        if (!empty($check_user)) {
            $check_user1 = $this->Common_model->getSingleRecordById('forgot_otp', array('email' => $username));
            $post_data = array();
            $post_data['create_date'] = date('Y-m-d H:i:s');
            $post_data['email'] = $username;
            $post_data['otp'] = $otp;
            if ($check_user1) {
                $subject = "Otp Verify";
                $message = "<p>Thank for foget password,</p>";
                $message.= "<p>please verify otp is :-<strong>" . $otp . "</strong> after that you have to foget password.Thank you</p>";
                $message = "otp=" . $otp;
                // $header = "From:abc@somedomain.com \r\n";
                //$header .= "Cc:afgh@somedomain.com \r\n";
                $header = "MIME-Version: 1.0\r\n";
                $header.= "Content-type: text/html\r\n";
                //     $retval = mail ($to,$subject,$message,$header);
                $message = "otp=" . $otp;
                $retval = mail($username, $subject, $message, $header);
                $add_otp = $this->Common_model->updateRecords('forgot_otp', $post_data, array('email' => $username));
                if ($retval) {
                    $this->response(['success' => true, 'message' => "email send successfully."], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "wrong email address."], REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $add_otp = $this->Common_model->addRecords('forgot_otp', $post_data);
            }
        } else {
            $this->response(['success' => false, 'message' => "User doesn't exist."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    //forgot password seller
    //varify otp
    public function verify_Forgot_otp_post() {
        $this->form_validation->set_rules('otp', 'OTP', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $otp = $this->input->post('otp');
            $email = $this->input->post('email');
            $checkmobilenootp = $this->Common_model->GetWhere('forgot_otp', array('email' => $email, 'otp' => $otp));
            if (isset($checkmobilenootp) && !empty($checkmobilenootp)) {
                $this->response(['success' => true, 'message' => "OTP has been verify successfully please login now."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid otp please enter valid otp."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    //change password user
    
    
    
    
    
    
    
    
    
    
    
    
    public function change_forgot_password_post() {
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]|trim');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            $email = $this->input->post('email');
            if (isset($password) && !empty($password) && isset($confirm_password) && !empty($confirm_password)) {
                $post_data = array();
                $post_data['show_password'] = $password;
                $post_data['password'] = md5($password);
                $this->Common_model->updateRecords('users', $post_data, array('email' => $email));
                $this->response(['success' => true, 'message' => "your password has been changed successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "password and confirm password are required please try again"], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    //change password shop
    public function change_forgot_passwordseller_post() {
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]|trim');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            $email = $this->input->post('email');
            if (isset($password) && !empty($password) && isset($confirm_password) && !empty($confirm_password)) {
                $post_data = array();
                $post_data['show_password'] = $password;
                $post_data['password'] = md5($password);
                $this->Common_model->updateRecords('shops', $post_data, array('email' => $email));
                $this->response(['success' => true, 'message' => "your password has been changed successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "password and confirm password are required please try again"], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    //forgot password buyer
    public function forgotpasswordduser_post() {
        $otp = mt_rand(100000, 999999);
        $username = !empty($_POST['username']) ? $_POST['username'] : '';
        $check_user = $this->Common_model->getSingleRecordById('users', array('email' => $username));
        if (!empty($check_user)) {
            $check_user1 = $this->Common_model->getSingleRecordById('forgot_otp', array('email' => $username));
            $post_data = array();
            $post_data['create_date'] = date('Y-m-d H:i:s');
            $post_data['email'] = $username;
            $post_data['otp'] = $otp;
            if ($check_user1) {
                $subject = "Otp Verify";
                $message = "<p>Thank for foget password,</p>";
                $message.= "<p>please verify otp is :-<strong>" . $otp . "</strong> after that you have to foget password.Thank you</p>";
                $message = "otp=" . $otp;
                // $header = "From:abc@somedomain.com \r\n";
                //$header .= "Cc:afgh@somedomain.com \r\n";
                $header = "MIME-Version: 1.0\r\n";
                $header.= "Content-type: text/html\r\n";
                //     $retval = mail ($to,$subject,$message,$header);
                $message = "otp=" . $otp;
                $retval = mail($username, $subject, $message, $header);
                $add_otp = $this->Common_model->updateRecords('forgot_otp', $post_data, array('email' => $username));
                if ($retval) {
                    $this->response(['success' => true, 'message' => "email send successfully."], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "wrong email address."], REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $add_otp = $this->Common_model->addRecords('forgot_otp', $post_data);
            }
        } else {
            $this->response(['success' => false, 'message' => "User doesn't exist."], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    /**
     * Change Password
     *
     * @return Response
     */
    //funtion to get email of user to send password
    /*
    
    public function change_password_post()
    {
        $this->form_validation->set_rules('subscriber_id', 'User ID', 'required|trim');
       // $this->form_validation->set_rules('auth_token', 'Auth Token', 'required|trim');
        
     //$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
     $this->form_validation->set_rules('password', 'Password', 'required|trim');
     $this->form_validation->set_rules('confirm_password', 'Confirm Passwotd', 'required|matches[password]|trim');
    if ($this->form_validation->run() == FALSE){
      $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
      //  $current_password = $this->input->post('current_password');
        $password = $this->input->post('password');
         $subscriber_id = $this->input->post('subscriber_id');
         $check_admin_password = $this->Common_model->getSingleRecord("users", ['id' => $subscriber_id]);
         $admin_current_password = $check_admin_password['password'];
         $current_password = md5(trim($current_password));
            if ($admin_current_password != $current_password){
                $this->response(['success' => false, 'message' => "Invalid Current Password...!"], REST_Controller::HTTP_NOT_FOUND);
            } else {
                $new_password = md5(trim($password));
                $this->Common_model->updateRecords('users', array('password' => $new_password, 'show_password' => $password), ['id' => $user_id]);
                $this->response(['success' => true, 'message' => "Password updated successfully!"], REST_Controller::HTTP_OK);
            }
        }
    }
    
    public function forgot_password_post()
    {
        $this->form_validation->set_rules('user_contact_number','user_contact_number', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_contact_number = $this->input->post('user_contact_number');
            $checkmobileno = $this->Common_model->GetWhere('users', array('user_contact_number' => $user_contact_number));
            if (!empty($checkmobileno)){
                $post_data = array();
                $post_data['user_contact_number'] = $user_contact_number;
                $country_isd_code = '91';
                $respotp = $this->forgot_otp_send($user_contact_number, $country_isd_code);
                $resotparray = json_decode($respotp, true);
                $message="Your Otp hass been forget successfully your current otp is ".$resotparray['otp'];
                //$this->load->helper('sendsms_helper');
                if (!empty($resotparray) && $resotparray['status'] == 1) {
                     sendsms($user_contact_number,$country_isd_code,$message);
                    $this->response(['success' => true, 'message' => "Your OTP has been sent successfully, please check your Number for getting OTP...@",'otp'=>$resotparray['otp']], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Invalid Mobile No."], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response(['success' => false, 'message' => "Invalid mobile number. please try again."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    
    
    public function forgot_otp_send($mobile_no, $country_isd_code)
    {
        if ($mobile_no) {
            $otp = $this->Authentication_model->createCode('forgot_otp', 'otp', 6);
            $check_user = $this->Common_model->getSingleRecordById('forgot_otp', array('mobile_no' => $mobile_no));
            $post_data = array();
            $post_data['mobile_no'] = $mobile_no;
            $post_data['create_date'] = date('Y-m-d H:i:s');
            $post_data['otp'] = $otp;
            if ($check_user) {
                $update = $this->Common_model->updateRecords('forgot_otp', $post_data, array('mobile_no' => $mobile_no));
            } else {
                $add_otp = $this->Common_model->addRecords('forgot_otp', $post_data);
            }
            $check_number = $this->Common_model->getwhere('users', array('mobile_no' => $mobile_no));
            if (!empty($check_number)) {
                $user_number = $mobile_no;
                $user_country_isd_code = $country_isd_code;
                $user_number_isd_code =  $user_country_isd_code . $user_number;
                if (!empty($user_number_isd_code)) {
                    $message = "your Txn OTP " . $otp;
                    $response = sendotp($user_number, $user_country_isd_code, $otp);
                    if ($response) {
                        $msg = array('status' => 1,'otp'=>$otp, 'msg' => 'Your OTP has been sent successfully, please check your Number for getting OTP...@');
                        return json_encode($msg);
                        exit();
                    } else {
                        $msg = array('status' => 1, 'msg' => 'Error submitting!');
                        return json_encode($msg);
                        exit();
                    }
                } else {
                    $msg = array('status' => 1, 'msg' => 'Your Number not registered!');
                    return json_encode($msg);
                    exit();
                }
            }
        }
    }
    
    public function verify_Forgot_otp_post()
    {
        $this->form_validation->set_rules('otp', 'OTP', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $otp = $this->input->post('otp');
            $mobile_no = $this->input->post('email');
            $checkmobilenootp = $this->Common_model->GetWhere('forgot_otp', array('email' => $email, 'otp' => $otp));
    
            if (isset($checkmobilenootp) && !empty($checkmobilenootp)) {
                $this->response(['success' => true, 'message' => "OTP has been verify successfully please login now."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid otp please enter valid otp."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    
    public function change_forgot_password_post()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]|trim');
        $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            $mobile_no = $this->input->post('mobile_no');
            if (isset($password) && !empty($password) && isset($confirm_password) && !empty($confirm_password)) {
                $post_data = array();
                $post_data['show_password'] = $password;
                $post_data['password'] = md5($password);
                $this->Common_model->updateRecords('users', $post_data, array('mobile_no' => $mobile_no));
                $this->response(['success' => true, 'message' => "your password has been changed successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "password and confirm password are required please try again"], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    */
    public function add_shipping_info_post() {
        $this->form_validation->set_rules('user_id', 'User ID', 'required|numeric|trim');
        $this->form_validation->set_rules('address_id', 'address ID', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $address_id = $this->input->post('address_id');
            $postal_code = $this->input->post('postal_code');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $mobile_no = $this->input->post('mobile_no');
            $new_address = $this->input->post('new_address');
            $data = array();
            $data['customerData'] = customerdata($user_id);
            $allzipcodes = $this->Common_model->getWhereDatanew('area', array('status' => 1), 'area_zipcode');
            $allzipcodesarray = array();
            if (isset($allzipcodes) && !empty($allzipcodes)) {
                foreach ($allzipcodes as $allzipcodesa) {
                    $allzipcodesarray[] = $allzipcodesa['area_zipcode'];
                }
            }
            if (isset($address_id) && $new_address == "newadd") {
                if (in_array($postal_code, $allzipcodesarray)) {
                    $insert_address = array();
                    $insert_address['user_id'] = $user_id;
                    $insert_address['address'] = $address_id;
                    $insert_address['zipcode'] = $postal_code;
                    $insert_address['name'] = $name;
                    $insert_address['email'] = $email;
                    $insert_address['phone'] = $mobile_no;
                    $insert_address['status'] = 1;
                    $rsid = $this->Common_model->addRecords('multiple_address', $insert_address);
                    if ($rsid) {
                        $this->Common_model->updateRecords('multiple_address', array('status' => 0), array('user_id' => $user_id, 'add_id !=' => $rsid));
                        $this->session->set_userdata('shippinginfo', $_POST);
                        $this->response(['success' => true, 'message' => "Redirect to payment checkout page"], REST_Controller::HTTP_OK);
                    } else {
                        $this->response(['success' => false, 'message' => "Oops Something Went Wrong please try again."], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->response(['success' => false, 'message' => "Your pin code is not available, please use valid pin code"], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                if (isset($address_id)) {
                    $oldaddress = $this->Common_model->getSingleRecord("multiple_address", array('add_id' => $address_id));
                    if (isset($oldaddress) && !empty($oldaddress)) {
                        $post_data = array();
                        $post_data['name'] = $oldaddress['name'];
                        $post_data['email'] = $oldaddress['email'];
                        $post_data['postal_code'] = $oldaddress['zipcode'];
                        $post_data['phone'] = $oldaddress['phone'];
                        $post_data['address'] = $oldaddress['address'];
                        $post_data['latitude'] = $oldaddress['latitude'];
                        $post_data['longitude'] = $oldaddress['longitude'];
                        if (in_array($oldaddress['zipcode'], $allzipcodesarray)) {
                            $this->session->set_userdata('shippinginfo', $post_data);
                            $this->response(['success' => true, 'message' => "Redirect to payment checkout page"], REST_Controller::HTTP_OK);
                        } else {
                            $this->response(['success' => false, 'message' => "Your pin code is not available, please use valid pin code"], REST_Controller::HTTP_NOT_FOUND);
                        }
                    }
                } else {
                    $this->response(['success' => false, 'message' => "Please select any address."], REST_Controller::HTTP_NOT_FOUND);
                }
            }
        }
    }
    public function coupon_code_apply_post() {
        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required|trim');
        $this->form_validation->set_rules('user_id', 'User ID', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $cid = $this->input->post('user_id');
            if (isset($cid) && !empty($cid)) {
                $couponcode = $this->input->post('coupon_code');
                $check_couponcode = $this->Common_model->getSingleRecord("coupons", array('coupon_code' => $couponcode));
                if (isset($check_couponcode) && !empty($check_couponcode)) {
                    if ($check_couponcode['status'] == 1) {
                        $startdate = strtotime($check_couponcode['start_date']);
                        $expire = strtotime($check_couponcode['end_date']);
                        $today = strtotime(date('Y-m-d'));
                        if ($today <= $expire && $today >= $startdate) {
                            $check_orders = $this->Common_model->getSingleRecord("orders", array('coupon_code' => $couponcode, 'user_id' => $cid));
                            if (isset($check_orders) && !empty($check_orders)) {
                                $this->response(['success' => false, 'message' => "You have already used this coupon code."], REST_Controller::HTTP_NOT_FOUND);
                            } else {
                                $this->session->set_userdata('couponcode', $check_couponcode);
                                $this->response(['success' => true, 'message' => "Coupon code has been Applied successfully.", 'data' => $check_couponcode], REST_Controller::HTTP_OK);
                            }
                        } else {
                            $this->response(['success' => false, 'message' => "This coupon code currently not acivated."], REST_Controller::HTTP_NOT_FOUND);
                        }
                    } else {
                        $this->response(['success' => false, 'message' => "This coupon code has been deactivated."], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->response(['success' => false, 'message' => "Invalid coupon code."], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response(['success' => false, 'message' => "Your session has been expired."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function payment_checkout_post() {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        if (isset($data) && !empty($data)) {
            $user_id = (isset($data['user_id']) ? $data['user_id'] : '');
            $auth_token = (isset($data['auth_token']) ? $data['auth_token'] : '');
            $userData = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1, 'auth_token' => $auth_token));
            if (isset($userData) && !empty($userData)) {
                $payment_type = $data['payment_option'];
                $shippinginfo = $this->session->userdata('shippinginfo');
                $cart_data = $data['cart'];
                $insert_orderData = array();
                if ($data['sub_total'] >= 150) {
                    if (isset($cart_data) && !empty($cart_data)) {
                        if ($payment_type == "cash") {
                            $insert_orderData['user_id'] = $user_id;
                            $insert_orderData['coupon_code'] = (isset($data['coupon_code']) ? $data['coupon_code'] : '');
                            $insert_orderData['coupon_discount'] = (isset($data['coupon_discount']) ? $data['coupon_discount'] : 0);
                            $insert_orderData['shipping_charge'] = (isset($data['shipping_charge']) ? $data['shipping_charge'] : 0);
                            $insert_orderData['payment_type'] = (isset($payment_type) ? $payment_type : 'cash');
                            $insert_orderData['shipping_address'] = json_encode($data['shipping_address'], true);
                            $insert_orderData['billing_address'] = json_encode($data['billing_address'], true);
                            $insert_orderData['delivery_status'] = 1;
                            $insert_orderData['grand_total'] = $data['grand_total'];
                            $insert_orderData['sub_total'] = $data['sub_total'];
                            $insert_orderData['create_date'] = (isset($data['create_date']) ? $data['create_date'] : date('Y-m-d H:i:s'));
                            $rid = $this->Common_model->addRecords('orders', $insert_orderData);
                            if ($rid) {
                                $u_data = array();
                                $u_data['invoice_no'] = "INC" . date('Y') . "I" . $rid;
                                $update = $this->Common_model->updateRecords('orders', $u_data, array('id' => $rid));
                                if (isset($cart_data) && !empty($cart_data)) {
                                    foreach ($cart_data as $orderproductdataarray) {
                                        $orderproductdata = array();
                                        $orderproductdata['order_id'] = $rid;
                                        $orderproductdata['product_id'] = $orderproductdataarray['product_id'];
                                        $orderproductdata['product_name'] = $orderproductdataarray['product_name'];
                                        $orderproductdata['quantity'] = $orderproductdataarray['quantity'];
                                        $orderproductdata['mrp_price'] = $orderproductdataarray['mrp_price'];
                                        $orderproductdata['generic_price'] = $orderproductdataarray['generic_price'];
                                        $orderproductdata['subtotal_generict_price'] = $orderproductdataarray['subtotal_generict_price'];
                                        $orderproductdata['description'] = $orderproductdataarray['description'];
                                        $this->Common_model->addRecords('order_products', $orderproductdata);
                                    }
                                }
                                $this->Common_model->deleteRecords('cartdata', array("user_id" => $user_id));
                                $this->response(['success' => true, 'message' => "Order has been created successfully."], REST_Controller::HTTP_OK);
                            } else {
                                $this->response(['success' => true, 'message' => "Oops something went wrong please try again."], REST_Controller::HTTP_NOT_FOUND);
                            }
                        }
                    } else {
                        $this->response(['success' => false, 'message' => "Cart is empty."], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->response(['success' => false, 'message' => "Your cart value must be greater than ₹150 , Please add more item."], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['success' => false, 'message' => "Invalid user detail please try again."], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $response = array('success' => false, 'message' => "Invalid data please try agian.");
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function order_count_post() {
        $this->form_validation->set_rules('user_id', 'User id', 'required');
        $this->form_validation->set_rules('auth_token', 'Auth token', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $auth_token = $this->input->post('auth_token');
            $column = "COUNT(id) as id";
            $table = "orders";
            $where = "WHERE user_id=" . $user_id;
            $data_count = $this->Common_model->getCountColumn($column, $table, $where);
            $userData = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1, 'auth_token' => $auth_token));
            if (!empty($userData)) {
                $this->response(['success' => true, 'message' => "Order count here.", 'order_count' => $data_count['id']], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid Credentials."], REST_Controller::HTTP_OK);
            }
        }
    }
    public function orderHistory_post() {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        $user_id = (isset($data['user_id']) ? $data['user_id'] : '');
        $auth_token = (isset($data['auth_token']) ? $data['auth_token'] : '');
        $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1, 'auth_token' => $auth_token));
        if (isset($user_detail) && !empty($user_detail)) {
            $user_id = $user_detail['id'];
            $orderData = array();
            if (isset($user_id) && !empty($user_id)) {
                $whr = array();
                $whr[] = "o.status = 1";
                $whr[] = "o.user_id = " . $user_id . "";
                if (isset($data['delivery_status']) && !empty($data['delivery_status'])) {
                    $whr[] = "o.delivery_status = " . $data['delivery_status'] . "";
                }
                $orderby = " ORDER BY o.id desc";
                $where = " WHERE " . implode(" AND ", $whr);
                $orderData = $this->Common_model->getwhereorders($where, $orderby);
                $this->response(['success' => true, 'message' => "Get all record successfully.", "data" => $orderData], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Redirect to home page."], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function cancelOrder_post() {
        $this->form_validation->set_rules('user_id', 'User id', 'required');
        $this->form_validation->set_rules('auth_token', 'Auth token', 'required');
        $this->form_validation->set_rules('id', 'Oder Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $auth_token = $this->input->post('auth_token');
            $id = $this->input->post('id');
            $updata = array();
            $updata['delivery_status'] = 5;
            $updata['user_id'] = $user_id;
            if (!empty($user_id)) {
                $this->Common_model->updateData('orders', $updata, array('id' => $id));
                $this->response(['success' => true, 'message' => "Order has been cancelled successfully"], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid Credentials."], REST_Controller::HTTP_OK);
            }
            //$this->Common_model->updateData('orders',$updata,array('user_id' =>));
            
        }
    }
    public function orderDetail_post() {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        $user_id = (isset($data['user_id']) ? $data['user_id'] : '');
        $auth_token = (isset($data['auth_token']) ? $data['auth_token'] : '');
        $orderId = (isset($data['orderId']) ? $data['orderId'] : '');
        $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1, 'auth_token' => $auth_token));
        if (isset($user_detail) && !empty($user_detail)) {
            $user_id = $user_detail['id'];
            $orderdata = array();
            if (isset($user_id) && !empty($user_id)) {
                $whr = array();
                $whr[] = "o.status = 1";
                $whr[] = "o.user_id = " . $user_id . "";
                $whr[] = "o.id = " . $orderId . "";
                $where = " WHERE " . implode(" AND ", $whr);
                $orderdata = $this->Common_model->getwheresingleorder($where);
                if (isset($orderdata) && !empty($orderdata)) {
                    $orderdata['shipping_address'] = json_decode($orderdata['shipping_address'], true);
                    $orderdata['orderProducts'] = $product = $this->Common_model->getWhereData("order_products", array('order_id' => $orderId));
                    $this->response(['success' => true, 'message' => "Get all record successfully.", "data" => $orderdata], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response(['success' => false, 'message' => "Redirect to home page."], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function product_detail_post() {
        $this->form_validation->set_rules('pid', 'Product ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $pid = $_GET['pid'];
            $data = array();
            $data['product_data'] = $this->Common_model->getSingleRecordById("product", array('product_id' => $pid));
            $data['color'] = $this->Common_model->getwhere("colors", array(1 => 1));
            $data['categorylist'] = $this->Common_model->getwhere("categories", array('status' => 1, 'parent_category_id' => 0));
            $this->response(['success' => true, 'message' => "Detail record successfully.", "data" => $data], REST_Controller::HTTP_OK);
        }
    }
    public function invoice_post() {
        $this->form_validation->set_rules('order_id', 'Order ID', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_detail = $this->session->userdata('user_data');
            if (isset($user_detail) && !empty($user_detail)) {
                $user_id = $user_detail['id'];
                $order_id = $this->input->post('order_id');
                $data = array();
                $whr = array();
                $whr[] = "user_id =" . $user_id;
                $whr[] = "id =" . $order_id;
                $where = " WHERE " . implode(" AND ", $whr);
                $data['orderdata'] = $this->Common_model->getwheresingleorder($where);
                $this->response(['success' => true, 'message' => "Get invoice successfully.", "data" => $data], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "You are not logged in."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function delete_order_post() {
        $this->form_validation->set_rules('order_id', 'Order ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $order_id = $this->input->post('order_id');
            $this->Common_model->deleteRecords('order_products', array('order_id' => $order_id));
            $this->Common_model->deleteRecords('orders', array('id' => $order_id));
            $this->response(['success' => true, 'message' => "Order deleted successfully!"], REST_Controller::HTTP_OK);
        }
    }
    public function support_ticket_post() {
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim');
        $this->form_validation->set_rules('query', 'Query', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $query = $this->input->post('query');
            $auth_token = (isset($_POST['auth_token']) ? $_POST['auth_token'] : '');
            $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1, 'auth_token' => $auth_token));
            if (isset($user_detail) && !empty($user_detail)) {
                $insert_data = array();
                $insert_data['query'] = $query;
                $insert_data['user_type'] = 'customer';
                $insert_data['create_date'] = date('Y-m-d H:i:s');
                $insert_data['user_id'] = $user_id;
                $result = $this->Common_model->addRecords('support_ticket', $insert_data);
                if (isset($result)) {
                    $newid = ticketid_prefix . date("Y") . $result;
                    if (isset($newid)) {
                        $updata = array();
                        $updata['ticket_reg_id'] = $newid;
                    }
                }
                $this->Common_model->updateData('support_ticket', $updata, array('ticket_id' => $result));
                $data = array();
                $data['support'] = $this->Common_model->getWhereData('support_ticket', array('user_type' => 'customer', 'user_id' => $user_id));
                $this->response(['success' => true, 'data' => $data['support'], 'message' => "Ticket generated successfully"], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function support_ticketlist_post() {
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $auth_token = (isset($_POST['auth_token']) ? $_POST['auth_token'] : '');
            $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1, 'auth_token' => $auth_token));
            if (isset($user_detail) && !empty($user_detail)) {
                // $insert_data = array();
                // $insert_data['query'] = $query;
                // $insert_data['user_type'] = 'customer';
                // $insert_data['create_date'] = date('Y-m-d H:i:s');
                // $insert_data['user_id'] = $user_id;
                // $result = $this->Common_model->addRecords('support_ticket',$insert_data);
                // if(isset($result)){
                //     $newid = ticketid_prefix.date("Y").$result;
                //     if(isset($newid)){
                //         $updata = array();
                //         $updata['ticket_reg_id'] = $newid;
                //     }
                // }
                // $this->Common_model->updateData('support_ticket',$updata,array('ticket_id' => $result));
                // $data = array();
                $supportData = $this->Common_model->getWhereData('support_ticket', array('user_type' => 'customer', 'user_id' => $user_id));
                $this->response(['success' => true, 'data' => $supportData, 'message' => "Success"], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function submit_chatmessage_post() {
        $this->form_validation->set_rules('ticket_id', 'Ticket ID', 'required|trim');
        $this->form_validation->set_rules('message', 'Message ID', 'required|trim');
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $auth_token = (isset($_POST['auth_token']) ? $_POST['auth_token'] : '');
            $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1, 'auth_token' => $auth_token));
            if (isset($user_detail) && !empty($user_detail)) {
                $ticket_id = $this->input->post('ticket_id');
                $message = $this->input->post('message');
                // $id = base64_decode($ticket_id);
                $insert_data = array();
                $insert_data["ticket_id"] = $ticket_id;
                $insert_data["from_id"] = $user_id;
                $insert_data["to_id"] = 1;
                $insert_data["user_type"] = 'customer';
                $insert_data["message"] = $message;
                $insert_data['create_date'] = date('Y-m-d H:i:s');
                $this->Common_model->addRecords('support_message', $insert_data);
                $this->response(['success' => true, 'message' => "Message send successfully!"], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function support_chat_post() {
        $this->form_validation->set_rules('ticket_id', 'Ticket ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $auth_token = (isset($_POST['auth_token']) ? $_POST['auth_token'] : '');
            $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1, 'auth_token' => $auth_token));
            if (isset($user_detail) && !empty($user_detail)) {
                $ticket_id = $this->input->post('ticket_id');
                $data = array();
                // $id = base64_decode($ticket_id);
                $data['ticketData'] = $this->Common_model->getSingleRecord('support_ticket', array('ticket_id' => $ticket_id, 'user_id' => $user_id));
                if (isset($data['ticketData']) && !empty($data['ticketData'])) {
                    $data['supportchat'] = $this->Common_model->getWhereData('support_message', array('ticket_id' => $ticket_id));
                    $this->response(['success' => true, 'message' => "Fetch all record.", 'data' => $data], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Invalid ticket id"], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function support_chat_message_post() {
        $this->form_validation->set_rules('ticket_id', 'Ticket ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $ticket_id = $this->input->post('ticket_id');
            $id = base64_decode($ticket_id);
            $data = array();
            $data['support'] = $this->Common_model->getWhereData('support_message', array('ticket_id' => $id));
            $this->response(['success' => true, 'message' => "Redirect to support chat", 'data' => $data], REST_Controller::HTTP_OK);
        }
    }
    public function update_quantity_post() {
        $this->form_validation->set_rules('index', 'Index', 'required|trim');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $cart = $this->session->userdata('cart');
            $kkey = $_POST['index'];
            $quantity = $_POST['quantity'];
            $ccdata = $cart;
            foreach ($cart as $key => $value) {
                if ($key == $kkey) {
                    $ccdata[$kkey]['quantity'] = $quantity;
                    $ccdata[$kkey]['price'] = $value['price'];
                    $ccdata[$kkey]['subtotal_price'] = $value['price'] * $quantity;
                    $product = $this->Common_model->getSingleRecordById("product", array('product_id' => $value['id']));
                    if (isset($product) && !empty($product)) {
                        $scategoryid = $product['categories_id'];
                        if (isset($product['sub_categories_id']) && !empty($product['sub_categories_id'])) {
                            $scategoryid = $product['sub_categories_id'];
                        }
                        $catdata = $this->Common_model->getSingleRecordById("categories", array('categories_id' => $scategoryid));
                    }
                    if (isset($catdata) && !empty($catdata)) {
                        $ccdata[$kkey]['admincommission'] = trim($ccdata[$kkey]['subtotal_price'] * $catdata['category_percentage'] / 100);
                        $ccdata[$kkey]['shopamount'] = trim($ccdata[$kkey]['subtotal_price'] - $ccdata[$kkey]['admincommission']);
                    }
                }
            }
            $this->session->set_userdata('cart', $ccdata);
            $this->response(['success' => true, 'message' => "Cart update successfully.", 'data' => $ccdata], REST_Controller::HTTP_OK);
        }
    }
    public function remove_cart_product_post() {
        $this->form_validation->set_rules('index', 'Index', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $pindex = $_POST['index'];
            $ccdata = $this->session->userdata('cart');
            unset($ccdata[$pindex]);
            $this->session->set_userdata('cart', $ccdata);
            $this->response(['success' => true, 'message' => "Product has been Removed successfully.", 'data' => $ccdata], REST_Controller::HTTP_OK);
        }
    }
    public function cart_count_get() {
        $spdata = $this->session->userdata('cart');
        $totalcoutproduct = (isset($spdata) && !empty($spdata) ? count($spdata) : 0);
        $this->response(['success' => true, 'message' => "Get total cart item.", 'data' => $totalcoutproduct], REST_Controller::HTTP_OK);
    }
    public function remove_coupon_code_get() {
        $this->session->unset_userdata('couponcode');
        $this->response(['success' => true, 'message' => "Coupon code has been remove successfully."], REST_Controller::HTTP_OK);
    }
    public function getcolornamebycode_post() {
        $color_code = $_POST['code'];
        $coloutcodedata = $this->Common_model->getSingleRecordById("colors", array('code' => $color_code));
        if (isset($coloutcodedata) && !empty($coloutcodedata)) {
            $this->response(['success' => true, 'message' => "success", 'data' => $coloutcodedata], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "success", 'data' => $coloutcodedata], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function generateSupportTicket_post() {
    }
    /*generated by Monika Barde at 14/Oct/2020*/
    /*  saller registration*/
    public function saller_registration_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('conatct_number', 'Conatct Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('shop_name', 'shop_name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert = array();
            $insert['username'] = $_POST['username'];
            $insert['shop_reg_id'] = $this->createCode('shops', 'shop_reg_id');
            $insert['password'] = md5($_POST['password']);
            $insert['seller_contact_number'] = $_POST['conatct_number'];
            $insert['shop_address'] = $_POST['shop_address'];
            $insert['owner_name'] = $_POST['owner_name'];
            $insert['country'] = $_POST['country'];
            $insert['city'] = $_POST['city'];
            $insert['area'] = $_POST['area'];
            $insert['gst_number'] = $_POST['gst_number'];
            $insert['status'] = '0';
            $insert['shop_name'] = $_POST['shop_name'];
            $insert['shop_category'] = $_POST['saller_category'];
            $insert['joining_date'] = date("y-m-d");
            $insert['saller_typ'] = 'standard';
            $insert['vcash'] = 0;
            $insert['trustscore'] = 0;
            $insert['transaction_count'] = 0;
            $insert['transaction_start_date'] = '00:00:00';
            $insert['transaction_end_date'] = '00:00:00';
            $insert['shop_category_id'] = $insert['shop_category'];
            $check_shop_category = $this->Common_model->getSingleRecordById('shopcategories', array('id' => $_POST['shop_category_id']));
            //p($check_shop_category);
            $check_mobi = $this->Common_model->getSingleRecordById('shops', array('seller_contact_number' => $_POST['conatct_number']));
            $check_shop = $this->Common_model->getSingleRecordById('shops', array('shop_name' => $_POST['shop_name']));
            $check_gst = $this->Common_model->getSingleRecordById('shops', array('gst_number' => $_POST['gst_number']));
            // p($check_gst);die;
            if (!empty($check_shop_category)) {
                if (empty($check_shop) && empty($check_mobi) && empty($check_gst)) {
                    $add_otp = $this->Common_model->addRecords('shops', $insert);
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'Shop name or mobile number or gst number already exits.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            } else {
                $responseArray = array('status' => FALSE, 'message' => 'Shop Category not found.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
            if (!empty($add_otp)) {
                $check_shop = $this->Common_model->getSingleRecordById('shops', array('shop_id	' => $add_otp));
                $this->response(['status' => true, 'message' => "signup successfully.", 'data' => $check_shop], REST_Controller::HTTP_OK);
            } else {
                $responseArray = array('status' => FALSE, 'message' => 'Mobile number already exits.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }
    public function Shop_category_byID_get($id) {
        if (!empty($id)) {
            $check_shop_category = $this->Common_model->getSingleRecordById('shopcategories', array('id' => $id));
            $this->response(['status' => true, 'message' => "shop category list.", 'data' => $check_shop_category], REST_Controller::HTTP_OK);
        } else {
            $responseArray = array('status' => FALSE, 'message' => 'Data not found.');
            $this->response($responseArray, REST_Controller::HTTP_OK);
        }
    }
    /* user register */
    public function user_registration_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        //  $this->form_validation->set_rules('seller_id', 'seller_id', 'trim|required|regex_match[/^[0-9]{10}$/]');
        //  $this->form_validation->set_rules('shop_name', 'shop_name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => "Please Enter all details");
            $this->response($response);
        } else {
            $insert = array();
            $insert['name'] = $_POST['name'];
            $insert['email'] = $_POST['email'];

            $insert['password'] = $_POST['password'];
            $insert['cpassword'] = ($_POST['cpassword']);
            $insert['phone'] = $_POST['phone'];
            $insert['city'] = $_POST['city'];
            $insert['status'] = '1';
            // $insert['vcash']=$_POST['vcash'];
            $check_mobil = $this->Common_model->getSingleRecordById('user', array('phone' => $_POST['phone']));
            //p();
            //   $queydata=$mysqli->query("SELECT * FROM `users` WHERE username='$username' AND password='$password'");
            $check_shop = $this->Common_model->getSingleRecordById('user', array('name' => $_POST['name']));
            //p($check_shop);
            $check_email = $this->Common_model->getSingleRecordById('user', array('phone' => $_POST['phone']));
            if (empty($check_mobi)) {
                if (empty($check_shop)) {
                    if (empty($check_email)) {
                        $add_otp = $this->Common_model->addRecords('user', $insert);
                        //p($add_otp);
                        $check_email = $this->Common_model->getSingleRecordById('user', array('id' => $add_otp));
                        //p($check_email);
                        $responseArray = array('status' => TRUE, 'message' => 'Signup successfully.', 'data' => $check_email);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => 'mobile number is  already exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'name is  already exits.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            } else {
                $responseArray = array('status' => FALSE, 'message' => 'mobile number is  already exits.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
        //echo "<pre>";print_r($queydata->num_rows);die;
        // 	if($queydata->num_rows>0){
        // 	      $normaerr="Already exist";
        // 	}else{
        // if(empty($check_shop) &&empty($check_mobil)&&empty($check_email)){
        //  p($insert);
        // $add_otp = $this->Common_model->addRecords('users', $insert);
        // }else{
        //  $responseArray = array('status' => FALSE, 'message' => 'Data is  already exits.');
        //   $this->response($responseArray,REST_Controller::HTTP_OK);
        //$add_otp = $this->Common_model->updateRecords('users',$insert, array('user_contact_number' => $_POST['conatct_number']));
        
    }
    //	}
    //   if(!empty($add_otp)){
    // $this->response(['status' => true, 'message' => "User successfully registered.",'data'=>$check_shop], REST_Controller::HTTP_OK);
    //   }else{
    //       $responseArray = array('status' => FALSE, 'message' => 'Mobile number already exits.');
    //   $this->response($responseArray,REST_Controller::HTTP_OK);
    //    }
    //  }
    /* user register */
     public function userRegister_post() {
         $aa  = (json_decode(file_get_contents("php://input")));
         
       // print_r( $aa);
       // echo $aa->name;
       // die;
     
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            
            $insert = array();
            
            $insert['s_name'] = $aa->s_name;
                $insert['email'] = $aa->email;
               $insert['phone'] = $aa->phone;
            $insert['password'] = $aa->password;
            $insert['cpassword'] = $aa->cpassword;
             $insert['users'] = $aa->users;
            $insert['classs'] = $aa->classs;
           $insert['university'] = $aa->university;
            


           // $insert['status'] = '1';
            //$check_shop = $this->Common_model->getSingleRecordById('customers', array('name' => $_POST['name']));
        //   $check_email = $this->Common_model->getSingleRecordById('customers', array('email' => $_POST['email']));
            //p($check_mobi);
            
                if (empty($check_shop)) {
                    if (empty($check_email)) {
                        $add_otp = $this->Common_model->addRecords('student', $insert);
                        $check_gst = $this->Common_model->getSingleRecordById('student', array('id' => $add_otp));
                        
                        $responseArray = array('status' => TRUE, 'message' => 'Signup successfully.', 'data' => $add_otp,$insert);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => ' number is  already exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'username is  already exits.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            
        }
    }
   public function doctorappointment_post() {
         $aa  = (json_decode(file_get_contents("php://input")));
         
       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
                    $shop_data = $this->db->get_where("customers", ['user_id' => $user_id])->row_array();

            
        } else {
            
            $insert = array();
            
            $insert['user_id'] = $aa->user_id;
                $insert['username'] = $aa->username;
               $insert['email'] = $aa->email;
            $insert['mobile_no'] = $aa->mobile_no;
            $insert['city'] = $aa->city;
            $insert['category'] = $aa->category;
            $insert['doctor'] = $aa->doctor;
            $insert['patient_name'] = $aa->patient_name;
            
            $insert['date'] = $aa->date;
            $insert['time'] = $aa->time;
            $insert['slot'] = $aa->slot;
             $insert['create_date'] = date('Y-m-d H:i:s');
            


            $insert['status'] = '1';
            //$check_shop = $this->Common_model->getSingleRecordById('customers', array('name' => $_POST['name']));
          //  $check_email = $this->Common_model->getSingleRecordById('customers', array('email' => $_POST['email']));
            //p($check_mobi);
            
                if (empty($check_shop)) {
                    if (empty($check_email)) {
                        $add_otp = $this->Common_model->addRecords('appointment', $insert);
                        $check_gst = $this->Common_model->getSingleRecordById('appointment', array('id' => $add_otp));
                        
                        $responseArray = array('status' => TRUE, 'message' => 'Appointment send successfully.', 'data' => $add_otp,$insert);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => ' number is  already exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'username is  already exits.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            
        }
    }

    
   
    
    
    
    
    
    public function getdoctorrequest_get($id) {
         $whrc = array('id' => $id);
        $allcategories = $this->Common_model->GetWhere('product', $whrc);
        foreach ($allcategories as $key => $catdataarray) {
            if ($catdataarray['image'] != '') {
                $allcategories[$key]['image'] = base_url() . 'admin/uploads/maincategory/' . $catdataarray['image'];
            } else {
                $allcategories[$key]['image'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "category found successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function getdiegnostic_get() {
         $whrc = array('status' => 1);
        $allcategories = $this->Common_model->GetWhere('user_depart', $whrc);
        foreach ($allcategories as $key => $catdataarray) {
            if ($catdataarray['pimage'] != '') {
                $allcategories[$key]['pimage'] = base_url() . 'uploads/diagnostic/' . $catdataarray['pimage'];
            } else {
                $allcategories[$key]['pimage'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "diefnostic list successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function getphysiotherphy_get(){
         $whrc = array('status' => 1, 'user_type'=>"Physiotherapy");
        $allcategories = $this->Common_model->GetWhere('category', $whrc);
        foreach ($allcategories as $key => $catdataarray) {
            if ($catdataarray['image'] != '') {
                $allcategories[$key]['image'] = base_url() . 'admin/uploads/maincategory/' . $catdataarray['image'];
            } else {
                $allcategories[$key]['image'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "diefnostic list successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    // get precription
    public function getprecription_get($user_id){
         $whrc = array('user_id' => $user_id);
        $allcategories = $this->Common_model->GetWhere('pricription', $whrc);
        foreach ($allcategories as $key => $catdataarray) {
            if ($catdataarray['image'] != '') {
                $allcategories[$key]['image'] = base_url() . 'uploads/diagnostic/' . $catdataarray['image'];
            } else {
                $allcategories[$key]['image'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "precription display successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    
    public function topcategorylist_get() {
        $allstore = $this->db->get_where("topcategory")->result();
        if ($allstore) {
            $this->response(['success' => true, 'message' => "top category list fetch successfully.", 'data' => $allstore], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    } 
  public function allsubcategorylist_get() {
        $whrc = array();
        $allcategories = $this->Common_model->GetWhere('subcategory', $whrc);
        foreach ($allcategories as $key => $catdataarray) {
            if ($catdataarray['tornament_icon'] != '') {
                $allcategories[$key]['tornament_icon'] = base_url() . 'upload/team/' . $catdataarray['tornament_icon'];
            } else {
                $allcategories[$key]['tornament_icon'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "tournament list successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    } 
    public function calenderlist_get($date) {
        $allstore = $this->db->get_where("events",array('date' => $date))->result();
        if ($allstore) {
            $this->response(['success' => true, 'message' => "event list fetch successfully.", 'data' => $allstore], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    } 
    
    
    
    
    
   public function subcategorylist_get($top_id) {
        $allstore = $this->db->get_where("subcategory",array('top_id' => $top_id))->result();
        if ($top_id) {
            $this->response(['success' => true, 'message' => "testlist fetch successfully.", 'data' => $allstore], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    } 
    public function eventlist_get(){
         $whrc = array();
        $allcategories = $this->Common_model->GetWhere('events', $whrc);
        foreach ($allcategories as $key => $catdataarray) {
            if ($catdataarray['one_icon'] != '') {
                $allcategories[$key]['one_icon'] = base_url() . 'upload/team1/' . $catdataarray['one_icon'];
              $allcategories[$key]['two_icon'] = base_url() . 'upload/team2/' . $catdataarray['two_icon'];
            } else {
                $allcategories[$key]['one_icon'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "diefnostic list successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
  public function teamlist_get(){
         $whrc = array();
        $allcategories = $this->Common_model->GetWhere('team', $whrc);
        foreach ($allcategories as $key => $catdataarray) {
            if ($catdataarray['team_icon'] != '') {
                $allcategories[$key]['team_icon'] = base_url() . 'upload/team/' . $catdataarray['team_icon'];
            } else {
                $allcategories[$key]['team_icon'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "team list successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
  public function orderdelivered1_get($user_id) {
        $specification_data = $this->db->get_where("cart", ['user_id' => $user_id,'status' => 1])->result_array();
        if (!empty($specification_data)) {
            $dummy = array();
            if (!empty($specification_data)) {
                foreach ($specification_data as $key => $value) {
                    $user_id = $value['user_id'];
            
                    
                    //$seller_id = $value['seller_id'];
                     $dummy[$key]['product_name']=$value['product_name'];
                     $dummy[$key]['price']=$value['price'];
                     $dummy[$key]['discount']=$value['discount'];

                     
                     
                    $area = $this->db->get_where("knowledge_order", ['id' => $user_id,'order_status' => 0])->row_array();
                    
                    $dummy[$key]['order_id'] = $area['order_id'];
                    $dummy[$key]['username'] = $area['username'];
                   $dummy[$key]['shipping_method'] = $area['shipping_method'];
                   $dummy[$key]['counts'] = $area['counts'];
                   $dummy[$key]['created_date'] = $area['created_date'];
                    
                }
            }
            
            
            // p($dummy);
            // $global_list = $this->db->get_where("globalcategory", ['shop_category_id' =>$shop_category_i])->result_array();
            $this->response(['success' => true, 'message' => "global  list by area.", 'data' => $dummy], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => null], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function channellist_get(){
         $whrc = array("channel_type"=>"Sports Channel");
        $allcategories = $this->Common_model->GetWhere('channels', $whrc);
        foreach ($allcategories as $key => $catdataarray) {
            if ($catdataarray['icons'] != '') {
               
              $allcategories[$key]['icons'] = base_url() . 'upload/channels/' . $catdataarray['icons'];
            } else {
                $allcategories[$key]['icons'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "channels list fetch  successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function ottchannellist_get(){
         $whrc = array("channel_type"=>"OTT Platform");
        $allcategories = $this->Common_model->GetWhere('channels', $whrc);
        foreach ($allcategories as $key => $catdataarray) {
            if ($catdataarray['icons'] != '') {
               
              $allcategories[$key]['icons'] = base_url() . 'upload/channels/' . $catdataarray['icons'];
            } else {
                $allcategories[$key]['icons'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "channels list fetch  successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    
    
    
    
    //
    public function getdietician_get(){
         $whrc = array('status' => 1);
        $allcategories = $this->Common_model->GetWhere('admin', $whrc);
        foreach ($allcategories as $key => $catdataarray) {
            if ($catdataarray['image'] != '') {
                $allcategories[$key]['image'] = base_url() . 'admin/uploads/maincategory/' . $catdataarray['image'];
            } else {
                $allcategories[$key]['image'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "diefnostic list successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function appointmentlist_get($user_id) {
        if (!empty($user_id)) {
            $check_shop_category = $this->Common_model->getSingleRecordById('appointment', array('user_id' => $user_id));
            $this->response(['status' => true, 'message' => "appointment list by user id  list.", 'data' => $check_shop_category], REST_Controller::HTTP_OK);
        } else {
            $responseArray = array('status' => FALSE, 'message' => 'Data not found.');
            $this->response($responseArray, REST_Controller::HTTP_OK);
        }
    }
    
   // sports app api 
    
    public function subcategory_get($top_id) {
        if (!empty($top_id)) {
            $check_shop_category = $this->Common_model->getSingleRecordById('subcategory', array('top_id' => $top_id));
            $this->response(['status' => true, 'message' => "subcategory list by top id  list.", 'data' => $check_shop_category], REST_Controller::HTTP_OK);
        } else {
            $responseArray = array('status' => FALSE, 'message' => 'Data not found.');
            $this->response($responseArray, REST_Controller::HTTP_OK);
        }
    }
    
    
    
    
    
    
    public function vedoreRegister_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('conatct_number', 'Conatct Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('shop_name', 'shop_name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => "Please Enter all details");
            $this->response($response);
        } else {
            $insert = array();
            $insert['shop_reg_id'] = $this->createCode('shops', 'shop_reg_id');
            $insert['username'] = $_POST['username'];
            $insert['password'] = md5($_POST['password']);
            $insert['show_password'] = $_POST['password'];
            $insert['seller_contact_number'] = $_POST['conatct_number'];
            $insert['shop_name'] = $_POST['shop_name'];
            $insert['email'] = $_POST['email'];
            $insert['shop_address'] = $_POST['shop_address'];
            $insert['city'] = $_POST['city'];
            $insert['area'] = $_POST['area'];
            $insert['gst_number'] = $_POST['gst_number'];
            $insert['status'] = '0';
            $insert['shop_category'] = $_POST['saller_category'];
            $insert['shop_category_id'] = $_POST['saller_category'];
            $insert['joining_date'] = date("y-m-d");
            $check_mobi = $this->Common_model->getSingleRecordById('shops', array('seller_contact_number' => $_POST['conatct_number']));
            $check_shop = $this->Common_model->getSingleRecordById('shops', array('username' => $_POST['username']));
            $check_gst = $this->Common_model->getSingleRecordById('shops', array('gst_number' => $_POST['gst_number']));
            //p($check_mobi);
            if (empty($check_mobi)) {
                if (empty($check_shop)) {
                    if (empty($check_gst)) {
                        $add_otp = $this->Common_model->addRecords('shops', $insert);
                        $check_gst = $this->Common_model->getSingleRecordById('shops', array('shop_id' => $add_otp));
                        $responseArray = array('status' => TRUE, 'message' => 'Signup successfully.', 'data' => $check_gst);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => 'gst number is  already exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'username is  already exits.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            } else {
                $responseArray = array('status' => FALSE, 'message' => 'mobile number is  already exits.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }
  
public function classfilter_get($classs) {
        $banner_slider_images = $this->db->get_where("student",['classs' => $classs])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            $data['s_name'] = $banner_slider_image->s_name;
          //  $data['subcategory'] = $banner_slider_image->subcategory;
            
            $slider_images = $data;
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }    
            }
    public function category_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('conatct_number', 'Conatct Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('shop_name', 'shop_name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert = array();
            $insert['username'] = $_POST['username'];
            $insert['password'] = md5($_POST['password']);
            $insert['seller_contact_number'] = $_POST['conatct_number'];
            $insert['shop_address'] = $_POST['shop_address'];
            $insert['country'] = 'india';
            $insert['city'] = 'indore';
            $insert['area'] = 'indore';
            $insert['gst_number'] = $_POST['gst_number'];
            $insert['status'] = '1';
            $insert['shop_category'] = $_POST['saller_category'];
            $insert['joining_date'] = date("y-m-d");
            $check_mobi = $this->Common_model->getSingleRecordById('shops', array('seller_contact_number' => $_POST['conatct_number']));
            $check_shop = $this->Common_model->getSingleRecordById('shops', array('username' => $_POST['username']));
            $check_gst = $this->Common_model->getSingleRecordById('shops', array('gst_number' => $_POST['gst_number']));
            if (empty($check_shop) && empty($check_gst) && empty($check_mobi)) {
                $add_otp = $this->Common_model->addRecords('shops', $insert);
            } else {
                $responseArray = array('status' => FALSE, 'message' => 'Data is  already exits.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
            if (!empty($add_otp)) {
                $check_shop = $this->Common_model->getSingleRecordById('shops', array('shop_id	' => $add_otp));
                $this->response(['status' => true, 'message' => "signup successfully.", 'data' => $check_shop], REST_Controller::HTTP_OK);
            } else {
                $responseArray = array('status' => FALSE, 'message' => 'Mobile number already exits.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }
    /* user register */
    /* user register */
    public function profileuser_post(){
                 $aa  = (json_decode(file_get_contents("php://input")));
                $authorization = apache_request_headers()["id"];

        $this->load->library('form_validation');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert = array();
         $insert['username'] = $_POST['username'];
         
         $insert['mobile_no'] = $_POST['mobile_no'];
          $insert['email'] = $_POST['email'];
          $insert['country'] = $_POST['country'];
          $insert['address'] = $_POST['address'];
          $insert['id'] = $authorization; 
           // $insert['username'] = $aa->username;
           // $insert['lastname'] = $aa->lastname;
            //$insert['mobile_no'] = $aa->mobile_no;
          //  $insert['email'] = $aa->email;
           //  $insert['country'] = $aa->country;
          //  $insert['address'] = $aa->address;
            
             if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $uploadpath = "./upload/shop/";
                    $filearrayddata = $this->uploadfilebypath('image', $uploadpath);
                    if (isset($filearrayddata)) {
                        $insert['image'] = $filearrayddata;
                    }
                }
           
            $insert['created_date'] = date("y-m-d");

            $check_shop = $this->Common_model->getSingleRecordById('users', array('mobile_no' => $_POST['mobile_no']));
            if (empty($check_shop)) {
               // $add_otp = $this->Common_model->addRecords('users', $insert);
            } else {
                $add_otp = $this->Common_model->updateRecords('users', $insert, array('mobile_no' => $_POST['mobile_no']));
            }
            if (!empty($add_otp)) {
                $this->response(['status' => true, 'message' => "User updated successfully.", 'data' => $add_otp], REST_Controller::HTTP_OK);
            } else {
                $responseArray = array('status' => FALSE, 'message' => 'Mobile number already exits.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }
    public function verify_register_otp_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('otp', 'OTP', 'required|trim');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        $this->form_validation->set_rules('auth_token', 'authtoken', 'required');
        $this->form_validation->set_rules('device_type', 'Device Type', 'required');
        $this->form_validation->set_rules('fcm_token', 'Fcm token', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $opt = trim($this->input->post('otp'));
            $mobile_no = $this->input->post('mobile_no');
            $check_otp = $this->Common_model->GetWhere('registration_otp', array('otp' => $opt, 'mobile_no' => $mobile_no));
            if (isset($check_otp) && !empty($check_otp)) {
                $chkuserdata = $this->Common_model->GetWhere('users', array('mobile_no' => $mobile_no));
                if (empty($chkuserdata)) {
                    $insert_data = array();
                    $insert_data['full_name'] = $this->input->post('full_name');
                    $insert_data['mobile_no'] = $mobile_no;
                    $insert_data['email'] = (isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : '');
                    $insert_data['password'] = md5($this->input->post('password'));
                    $insert_data['show_password'] = $this->input->post('password');
                    $insert_data['age'] = $this->input->post('age');
                    $insert_data['gender'] = $this->input->post('gender');
                    $insert_data['address'] = $this->input->post('address');
                    $insert_data['city'] = $this->input->post('city');
                    $insert_data['state'] = $this->input->post('state');
                    $insert_data['zipcode'] = $this->input->post('pincode');
                    $insert_data['device_type'] = $this->post('device_type');
                    $insert_data['fcm_token'] = $this->input->post('fcm_token');
                    $insert_data['latitude'] = $this->input->post('latitude');
                    $insert_data['longitude'] = $this->input->post('longitude');
                    $insert_data['auth_token'] = $this->input->post('auth_token');
                    $insert_data['reg_id'] = $this->createCode('users', 'reg_id', 8);
                    $insert_data['create_date'] = date('Y-m-d H:i:s');
                    $userid = $this->Common_model->addRecords('users', $insert_data);
                    if ($userid) {
                        $userdata = $this->Common_model->getSingleRecordById('users', array('id' => $userid));
                        $this->response(['success' => true, 'message' => "Otp has been verified successfully", 'userdata' => $userdata], REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('success' => FALSE, 'message' => 'Oops Something Went wrong please try again.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $responseArray = array('success' => FALSE, 'message' => 'You have already registered');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            } else {
                $responseArray = array('success' => FALSE, 'message' => 'Invalid Otp please try again.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }
    /* seller login */
    public function user_loginbyotp_post() {
        $aa  = (json_decode(file_get_contents("php://input")));
         
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
           
            $data['mobile_no'] = $aa->mobile_no;
            $data['otp'] = $aa->otp; //username
            $res = $this->Authentication_model->userLogin("users", $data);
            if (!empty($res)) {
                if ($res['status'] == 0){
                    $this->response(['status' => true, 'message' => "login successfull.", 'data' => $res], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['status' => true, 'message' => "Your profile is under verification please wait for approval"], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['status' => false, 'message' => "Invalid uername or password.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }
    }
    /* user login */
    public function user_loginList_get() {
        $allstore = $this->db->get_where("users")->result();
        if ($allstore) {
            $this->response(['success' => true, 'message' => "login successfully.", 'data' => $allstore], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function virtualCash_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['amount'] = $_POST['amount'];
            $insert_data['shop_id'] = $_POST['shop_id'];
            $insert_data['created_date'] = date('Y-m-d');
            $check_saller = $this->Common_model->GetWhere('shops', array('shop_id' => $_POST['shop_id'], 'status' => 1));
            if (!empty($check_saller[0])) {
                $check_virtualcash = $this->Common_model->GetWhere('vcashSaller', array('saller_id' => $_POST['saller_id']));
                if (empty($check_virtualcash)) {
                    $add_otp = $this->Common_model->addRecords('vcashSaller', $insert_data);
                    if (!empty($add_otp)) {
                        $check_virtualcashlist = $this->Common_model->GetWhere('vcashSaller', array('id' => $add_otp));
                        $this->response(['status' => true, 'message' => "virtual cash list.", 'data' => $check_virtualcashlist], REST_Controller::HTTP_OK);
                    } else {
                        $this->response(['status' => false, 'message' => "Opps somthing went wrong !.", 'data' => ''], REST_Controller::HTTP_OK);
                    }
                } else {
                    $this->response(['status' => false, 'message' => "alerady recharged virtual cash !.", 'data' => ''], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['status' => false, 'message' => "Invalid saller id.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }
    }
    public function addvirtualcash_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $shops_data = $this->session->userdata(USER_SESSION);
            $insert_data['saller_id'] = $_POST['saller_id'];
            $insert_data['amount'] = $_POST['amount'];
            $insert_data['transition-id'] = $_POST['transition-id'];
            $insert_data['created_date'] = date('Y-m-d H:i:s');
            //$result = $this->Common_model->addrecords('vcashSaller', $insert_data);
            //$result1 = $this->Common_model->addrecords('ordercomplete', $insert_data);
            $resp = $this->Common_model->addRecords('vcashSaller', $insert_data);
            if (!empty($resp)) {
                $insert_data['amount'] = $_POST['amount'] - $_POST['amount'] * 0.05;
                $result = $this->Common_model->addrecords('ordercomplete', $insert_data);
                //$resp = $this->Common_model->addRecords('ordercomplete',$insert_data);
                $this->response(['success' => true, 'message' => "virtual cash   has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function deduct_get($seller_id) {
        $this->db->set('amount', 'amount-5', false);
        $this->db->where('seller_id', $seller_id);
        $this->db->update('ordercomplete');
    }
    public function getvirtualcash_get($saller_id) {
        $global_data = $this->db->get_where("vcashSaller", ['saller_id' => $saller_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("vcashSaller", ['saller_id' => $saller_id])->result_array();
            $this->response(['success' => true, 'message' => "virtual cash  list by  category id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    
    public function getattributes_get() {
        $allcitylist = $this->db->get_where("settings")->result();
        if ($allcitylist) {
            $this->response(['success' => true, 'message' => "attribute list successfully.", 'data' => $allcitylist], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function termcondition_get() {
        $allcitylist = $this->db->get_where("termcondition")->result();
        if ($allcitylist) {
            $this->response(['success' => true, 'message' => "attribute list successfully.", 'data' => $allcitylist], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function notificationplant_get() {
        $allcitylist = $this->db->get_where("notification")->result();
        if ($allcitylist) {
            $this->response(['success' => true, 'message' => "attribute list successfully.", 'data' => $allcitylist], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
  public function historynifty_get() {
    
                  $query = $this->db->query('SELECT * FROM postpredition');
                                  $totalrecord = $query->num_rows();
             //$whrc = array('status' => 2);

                $query1 = $this->db->query('SELECT * FROM postpredition WHERE status = 2 ');
                   $hit=   $query1->num_rows();

                          $formola=($hit/$totalrecord)*100;
    //top seven
     $query = $this->db->query('SELECT * FROM postpredition ORDER BY id DESC LIMIT 7');
                                  $totalrecord1 = $query->num_rows();
             //$whrc = array('status' => 2);

                $query1 = $this->db->query('SELECT * FROM postpredition WHERE status = 2 ORDER BY id DESC LIMIT 7  ');
                   $hit1=   $query1->num_rows();

                          $topseven=($hit1/$totalrecord1)*100;
    
    
    $query = $this->db->query("SELECT * FROM postpredition ORDER BY id DESC");
                $result = $query->result_array();

        
        //$allcitylist = $this->db->get_where("postpredition")->result();
        if ($result) {
            $this->response(['success' => true, 'message' => "history list successfully.", 'data' => $result, 'successrate'=> $formola,'topseven'=>$topseven], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
     public function totalcount_get() {
    
                  $query = $this->db->query('SELECT * FROM cart');
                                  $totalrecord = $query->num_rows();


        
        //$allcitylist = $this->db->get_where("postpredition")->result();
        if ($result) {
            $this->response(['success' => true, 'message' => "history list successfully.", 'data' => $totalrecord], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
 
    
    
    
    
  
   public function successrate_get() {
    
                  $query = $this->db->query('SELECT * FROM postpredition');
                                  $totalrecord = $query->num_rows();
             //$whrc = array('status' => 2);

                $query1 = $this->db->query('SELECT * FROM postpredition WHERE status = 2 ');
                   $hit=   $query1->num_rows();

                          $formola=($hit/$totalrecord)*100;
   
        
        //$allcitylist = $this->db->get_where("postpredition")->result();
        if ($formola) {
            $this->response(['success' => true, 'message' => "history list successfully.", 'data'=> $formola], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
  
  public function sevensuccessrate_get() {
    
                   $query = $this->db->query('SELECT * FROM postpredition ORDER BY id DESC LIMIT 7');
                                  $totalrecord1 = $query->num_rows();
             //$whrc = array('status' => 2);

                $query1 = $this->db->query('SELECT * FROM postpredition WHERE status = 2 ORDER BY id DESC LIMIT 7  ');
                   $hit1=   $query1->num_rows();

                          $topseven=($hit1/$totalrecord1)*100;
    
        
        //$allcitylist = $this->db->get_where("postpredition")->result();
        if ($topseven) {
            $this->response(['success' => true, 'message' => "seven success rate list successfully.", 'data'=> $topseven], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
  
  
  
  
  
  
  public function prepredictionlist_get() {
    
         $query = $this->db->query("SELECT * FROM prepredition ORDER BY id DESC LIMIT 1");
                $result = $query->result_array();
   
        
        //$allcitylist = $this->db->get_where("prepredition")->result();
        if ($result) {
            $this->response(['success' => true, 'message' => "history list successfully.", 'data' => $result], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
  public function postpredictionlist_get() {
    
         $query = $this->db->query("SELECT * FROM postpredition ORDER BY id DESC LIMIT 1");
                $result = $query->result_array();
   
        
        //$allcitylist = $this->db->get_where("prepredition")->result();
        if ($result) {
            $this->response(['success' => true, 'message' => "postpredition list successfully.", 'data' => $result], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
  
    public function notification_get(){
                        //    $query = $this->db->query("SELECT * FROM notification WHERE  ORDER BY id DESC");
     // $result = $query->result_array();

$query = $this->db->query("SELECT * FROM notification ORDER BY id DESC");
                $result = $query->result_array();
   
      //  $global_data = $this->db->get_where("notification")->result_array();
        //$this->db->order_by("id", "desc");
        // $query = $this->db->get();
      
        if ($result) {
            $this->response(['success' => true, 'message' => "attribute list successfully.", 'data' => $result ], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    
    public function userEdit_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'User Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $userData = $this->Common_model->getSingleData('user', array('id' => $_POST['id']));
            if (!empty($userData)) {
                $post_data = array();
                $post_data['name'] = !empty($_POST['name']) ? $_POST['name'] : $userData['name'];
                              $post_data['email'] = !empty($_POST['email']) ? $_POST['email'] : $userData['email'];

                $post_data['phone'] = !empty($_POST['phone']) ? $_POST['phone'] : $userData['phone'];
               $post_data['city'] = !empty($_POST['city']) ? $_POST['city'] : $userData['city'];
                             $post_data['password'] = !empty($_POST['password']) ? $_POST['password'] : $userData['password'];


                $update = $this->Common_model->updateRecords('user', $post_data, array('id' => $_POST['id']));
                $userData = $this->Common_model->getSingleData('user', array('id' => $_POST['id']));
                $this->response(['status' => true, 'message' => "User Profile updated successfull.", 'data' => $userData], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => false, 'message' => "Opps somting want wrong.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }
    }
    public function privacyPolicy_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $userData = $this->Common_model->getSingleData('privacypolicy', array('id' => $_POST['id']));
            if (!empty($userData)) {
                $post_data = array();
                $post_data['title	'] = !empty($_POST['title']) ? $_POST['title'] : $userData['title'];
                $post_data['editor1'] = !empty($_POST['editor1']) ? $_POST['editor1'] : $userData['editor1'];
                $update = $this->Common_model->updateRecords('privacypolicy', $post_data, array('id' => $_POST['id']));
                $userData = $this->Common_model->getSingleData('privacypolicy', array('id' => $_POST['id']));
                $this->response(['status' => true, 'message' => "privacy policy updated successfull.", 'data' => $userData], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => false, 'message' => "Opps somting want wrong.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }
    }
    public function termandcondition_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $userData = $this->Common_model->getSingleData('termcondition', array('id' => $_POST['id']));
            if (!empty($userData)) {
                $post_data = array();
                $post_data['title	'] = !empty($_POST['title']) ? $_POST['title'] : $userData['title'];
                $post_data['editor1'] = !empty($_POST['editor1']) ? $_POST['editor1'] : $userData['editor1'];
                $update = $this->Common_model->updateRecords('termcondition', $post_data, array('id' => $_POST['id']));
                $userData = $this->Common_model->getSingleData('termcondition', array('id' => $_POST['id']));
                $this->response(['status' => true, 'message' => "termcondition updated successfull.", 'data' => $userData], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => false, 'message' => "Opps somting want wrong.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }
    }
    public function sellerpaymenthistory_get($id) {
        $global_data = $this->db->get_where("vcashSaller", ['saller_id' => $id])->result_array();
        if (!empty($global_data)) {
            $this->response(['status' => true, 'message' => "success", 'data' => $global_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => "error", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
    public function sallerEdit_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shop_id', 'Shop Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $userData = $this->Common_model->getSingleData('shops', array('shop_id' => $_POST['shop_id']));
            if (!empty($userData)) {
                $post_data = array();
                //  $post_data['username']=!empty($_POST['username']) ? $_POST['username'] : $userData['username'];
                $post_data['seller_contact_number'] = !empty($_POST['seller_contact_number']) ? $_POST['seller_contact_number'] : $userData['seller_contact_number'];
                $post_data['shop_address'] = !empty($_POST['shop_address']) ? $_POST['shop_address'] : $userData['shop_address'];
                // $post_data['gst_number']=!empty($_POST['gst_number']) ? $_POST['gst_number']:$userData['gst_number'];
                // $post_data['shop_category']=!empty($_POST['shop_category']) ? $_POST['shop_category']:$userData['shop_category'];
                $post_data['shop_name'] = !empty($_POST['shop_name']) ? $_POST['shop_name'] : $userData['shop_name'];
                $update = $this->Common_model->updateRecords('shops', $post_data, array('shop_id' => $_POST['shop_id']));
                $userData = $this->Common_model->getSingleData('shops', array('shop_id' => $_POST['shop_id']));
                $this->response(['status' => true, 'message' => "Saller Profile updated successfull.", 'data' => $userData], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => false, 'message' => "Opps somting want wrong.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }
    }
    public function shopcategory_get() {
        $allshopcategories = $this->db->get_where("shopcategories")->result();
        if ($allshopcategories) {
            $this->response(['success' => true, 'message' => "shop category list successfully.", 'data' => $allshopcategories, 'image_url' => 'https://leastquote.com/uploads/category/'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function SendGuetQuotes_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shop_category', 'Shop category', 'required');
        $this->form_validation->set_rules('product', 'product Name', 'required');
        $this->form_validation->set_rules('brand', 'brand Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        $this->form_validation->set_rules('user_id', 'user id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['shop_category'] = $_POST['shop_category'];
            $insert_data['product_name'] = $_POST['product'];
            $insert_data['brand_name'] = $_POST['brand'];
            $insert_data['price'] = $_POST['price'];
            $insert_data['city'] = $_POST['city'];
            $insert_data['area'] = $_POST['area'];
            $insert_data['subscriber_id'] = $_POST['user_id'];
            $insert_data['start_time'] = time();
            $insert_data['expire_time'] = date(time(), strtotime('+30 minutes'));
            $insert_data['country'] = 'india';
            $insert_data['description'] = 'india';
            $insert_data['created_date'] = date("y-m-d");
            $check_users = $this->Common_model->GetWhere('users', array('subscriber_id' => $_POST['user_id'], 'status' => 1));
            if (!empty($check_users[0])) {
                // $insert_data['shop_name']=$check_users[0]['shop_name'];
                $check_shop = $this->Common_model->GetWhere('shops', array('area' => $_POST['area'], 'city' => $_POST['city'], 'status' => 1));
                if (!empty($check_shop[0])) {
                    $insert_data['shop_name'] = $check_shop[0]['shop_name'];
                    //p($insert_data);
                    $add_otp = $this->Common_model->addRecords('sendquotes', $insert_data);
                    if (!empty($add_otp)) {
                        $check_shop = $this->Common_model->GetWhere('sendquotes', array('request_id' => $add_otp));
                        $this->response(['status' => true, 'message' => "Request send sucessfully.", 'data' => $check_shop], REST_Controller::HTTP_OK);
                    } else {
                        $this->response(['status' => false, 'message' => "Opps something went wrong.", 'data' => ''], REST_Controller::HTTP_OK);
                    }
                } else {
                    $this->response(['status' => false, 'message' => "Shop not found.", 'data' => ''], REST_Controller::HTTP_OK);
                }
                //p($check_shop);
                
            } else {
                $this->response(['status' => false, 'message' => "Invalid user id.", 'data' => ''], REST_Controller::HTTP_OK);
            }
            // p($check_users);
            //p($insert_data);
            
        }
    }
    public function arealist_get() {
        $allarealist = $this->db->get_where("area")->result();
        if ($allarealist) {
            $this->response(['success' => true, 'message' => "area list successfully.", 'data' => $allarealist], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function all_specificreq_get() {
        $allstore = $this->db->get_where("seller_specificr")->result();
        if ($allstore) {
            $this->response(['success' => true, 'message' => "recode fatch successfully.", 'data' => $allstore], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * Get user profile data
     *
     * @return Response
     */
    public function userProfile_post() {
                $aa  = (json_decode(file_get_contents("php://input")));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id', 'User Id', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $userData = $this->Common_model->getSingleData('customers', array('user_id' => $aa->user_id));
            if (!empty($userData)) {
                $post_data = array();
                $post_data['email'] = !empty($_POST['email']) ? $_POST['email'] : $userData['email'];
                $post_data['mobile_no'] = !empty($_POST['mobile_no']) ? $_POST['mobile_no'] : $userData['mobile_no'];
                $update = $this->Common_model->updateRecords('customers', $post_data, array('user_id' => $_POST['user_id']));
                $userData = $this->Common_model->getSingleData('customers', array('user_id' => $_POST['user_id']));
                $this->response(['status' => true, 'message' => "User Profile updated successfull.", 'data' => $userData], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => false, 'message' => "Opps somting want wrong.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }
    }
    public function sallerProfile_post() {
        $aa  = (json_decode(file_get_contents("php://input")));
         
       // print_r( $aa);
       // echo $aa->name;
       // die;
     
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            
            $insert = array();
             $userData = $this->Common_model->getSingleData('customers', array('email' => $_POST['email']));
            if (!empty($userData)) {
                $post_data = array();

                
                $post_data['name'] = !empty($aa->name);
                // $post_data['seller_contact_number']=!empty($_POST['conatct_number']) ? $_POST['seller_contact_number']:$userData['seller_contact_number'];
                $post_data['gender'] = !empty($aa->gender);
                $post_data['birthday'] = !empty($aa->birthday);
                $post_data['blood'] = !empty($aa->blood);
                $post_data['weight'] = !empty($aa->weight);
                $update = $this->Common_model->updateRecords('customers', $post_data, array('email' => $_POST['email']));
                $userData = $this->Common_model->getSingleData('customers', array('email' => $_POST['email']));
                $this->response(['status' => true, 'message' => " Profile updated successfull.", 'data' => $userData], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => false, 'message' => "Opps somting want wrong.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }
    }
    public function userLoginWithname_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => "Wrong credentials");
            $this->response($response);
        } else {
            $data = array();
            $data['username'] = $_POST['username'];
            $data['password'] = md5($_POST['password']);
            $res = $this->Authentication_model->userLogin("users", $data);
            if (!empty($res)) {
                $this->response(['status' => true, 'message' => "login successfull.", 'data' => $res], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status' => false, 'message' => "invlid username or password.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }
    }
    function createCode($table, $column_name, $length = '') {
        $create_ramdom_code = "";
        if ($length) {
            $ramdom_code = generateRandomStringbylnth($length);
        } else {
            $ramdom_code = createRandomCode();
        }
        $check_if_exiest = $this->Common_model->getSingleRecordById($table, array($column_name => $ramdom_code));
        if (!empty($check_if_exiest)) {
            $create_ramdom_code = $this->createCode($table, $column_name);
        } else {
            $create_ramdom_code = $ramdom_code;
        }
        return $create_ramdom_code;
    }
    public function login_by_otp_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mobile_no', 'Mobile no', 'trim|required|regex_match[/^[0-9]{10}$/]');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $mobile_no = trim($this->input->post('mobile_no'));
            $otp = $this->Authentication_model->createCode('login_otp', 'otp', 6);
            $check_user = $this->Common_model->getSingleRecordById('login_otp', array('mobile_no' => $mobile_no));
            $post_data = array();
            $post_data['mobile_no'] = $mobile_no;
            $post_data['fcm_token'] = $this->input->post('fcm_token');
            $post_data['create_date'] = date('Y-m-d H:i:s');
            $post_data['otp'] = $otp;
            if ($check_user) {
                $update = $this->Common_model->updateRecords('login_otp', $post_data, array('mobile_no' => $mobile_no));
            } else {
                $add_otp = $this->Common_model->addRecords('login_otp', $post_data);
            }
            $check_number = $this->Common_model->getwhere('users', array('mobile_no' => $mobile_no));
            $user_number = $mobile_no;
            $user_country_isd_code = '91';
            $user_number_isd_code = $user_country_isd_code . $user_number;
            if (!empty($check_number)) {
                if (!empty($user_number_isd_code)) {
                    $sms = "your vneeka login verification otp is" . $otp;
                    $response = sendsms($user_number, $user_country_isd_code, $sms);
                    // print_r($response);
                    $responseArray = array('status' => TRUE, 'message' => 'Your OTP has been sent successfully', 'otp' => $otp);
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'Your Number has been not registered!');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            } else {
                // $responseArray = array('status' => FALSE, 'message' => 'Your Number has been not registered!');
                // $this->response($responseArray, REST_Controller::HTTP_OK);
                if (!empty($user_number_isd_code)) {
                    $sms = "your vneeka login verification otp is" . $otp;
                    $response = sendsms($user_number, $user_country_isd_code, $sms);
                    // print_r($response);
                    $responseArray = array('status' => TRUE, 'message' => 'Your OTP has been sent successfully', 'otp' => $otp);
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'Your Number has been not registered!');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            }
        }
    }
    public function verify_login_opt_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('otp', 'OTP', 'required|trim');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $otp = trim($this->input->post('otp'));
            $mobile_no = trim($this->input->post('mobile_no'));
            $fcm_token = $this->input->post('fcm_token');
            $update = $this->Common_model->updateRecords('login_otp', array("fcm_token" => $fcm_token), array('mobile_no' => $mobile_no));
            $check_opt = $this->Common_model->GetWhere('login_otp', array('otp' => $otp, 'mobile_no' => $mobile_no));
            if (isset($check_opt) && !empty($check_opt)) {
                $checkuser = $this->Common_model->GetWhere('users', array('mobile_no' => $check_opt[0]['mobile_no']));
                if (isset($checkuser) && !empty($checkuser)) {
                    $checkuserrow = $checkuser[0];
                    if ($checkuserrow['status'] == 1) {
                        $checkuserrow['is_registerd'] = true;
                        $this->Common_model->updateRecords('shops', array("fcm_token" => $fcm_token), array('mobile_no' => $mobile_no));
                        $responseArray = array('status' => true, 'message' => 'OTP Verified Successfully.', 'data' => $checkuserrow, 'profile_img_url' => base_url() . 'uploads/customerprofilepic/');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => false, 'message' => 'Your account has been deactivated ,please contact with admin', 'data' => '');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                } elseif (empty($checkuser)) {
                    $notregisteredData = array();
                    $notregisteredData['is_registerd'] = false;
                    $responseArray = array('status' => true, 'message' => 'logged in successfully', 'data' => $notregisteredData);
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                } else {
                    $responseArray = array('status' => false, 'message' => 'Oops something went wrong please try again.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            } else {
                $responseArray = array('status' => false, 'message' => 'You Already Registered this Number.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }
    public function shop_locator_get() {
        $allstore = $this->db->get_where("users")->result();
        if ($allstore) {
            $this->response(['success' => true, 'message' => "Shop found successfully.", 'data' => $allstore], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /*public function language_get()
    {
        $get_language = $this->db->get_where("language")->result();
        if($get_language) {
            $this->response(['success' => true, 'message' => "Language found successfully.", 'language' => $get_language,'img_url'=>base_url().'uploads/language/'], REST_Controller::HTTP_OK);
        } else {
    
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }*/
    public function language_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('code', 'Code', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $code = $this->input->post('code');
            $get_language = $this->db->get_where("language", array("code" => $code))->result();
            if ($get_language) {
                $this->response(['success' => true, 'message' => "Language found successfully.", 'language' => $get_language, 'img_url' => base_url() . 'uploads/language/'], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function faq_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lang', 'Language', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $lang = $this->input->post('lang');
            $fileds = array("1" => "1");
            $checaboutus = $this->Common_model->GetWhere('faqs_data', $fileds);
            $data_array = array();
            if (!empty($checaboutus)) {
                foreach ($checaboutus as $key => $value) {
                    if ($lang == "hi") {
                        $data_array[$key]['ans'] = $value['ans_hindi'];
                        $data_array[$key]['qustion'] = $value['qustion_hindi'];
                    } else {
                        $data_array[$key]['ans'] = $value['ans'];
                        $data_array[$key]['qustion'] = $value['qustion'];
                    }
                }
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
            if (!empty($data_array)) {
                $this->response(['success' => true, 'message' => "FAQ found successfully.", 'faq' => $data_array], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function send_feedback_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('mobile_number', 'mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['name'] = $this->input->post('name');
            $insert_data['email'] = $this->input->post('email');
            $insert_data['message'] = $this->input->post('message');
            $insert_data['mobile_number'] = $this->input->post('mobile_number');
            $result = $this->Common_model->addrecords('send_feed', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "Feeback  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function home_appliance_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('product', 'product', 'required');
        $this->form_validation->set_rules('brand', 'brand', 'required');
        $this->form_validation->set_rules('specification', 'specification', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['role_re'] = 'global';
            $insert_data['product'] = $this->input->post('product');
            $insert_data['brand'] = $this->input->post('brand');
            $insert_data['specification'] = $this->input->post('specification');
            $insert_data['city_id'] = $this->input->post('city_id');
            $insert_data['area'] = $this->input->post('area');
            $insert_data['shop_category_id'] = 15;
            $insert_data['user_id'] = $this->input->post('user_id');
            $insert_data['timer'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "home applience   has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function electroglobalreq_get($id) {
        $data = array();
        $whr = array('id' => $id);
        $data['shopcategories_data'] = $this->Common_model->getSingleRecordById('shopcategories', $whr);
        // 		p($data);
        if (!empty($data['shopcategories_data'])) {
            $category_name = $data['shopcategories_data']['category_name'];
            $whr = array('saller_category' => $category_name);
            // $whr = array('name'=>$category_name);
            //  $whr = array('brand'=>$category_name);
            $data['product_data'] = $this->Common_model->getSingleRecordById('product', $whr);
            //	p($data);
            
        }
        //p($data);
        //if(!empty($_POST)){
        //$data['success'] = "";
        //	$data['error'] = "";
        //	$data['$customer_data'] = "";
        $data['shopctegorey'] = $this->Common_model->GetWhere('shopcategories', array('1' => '1'));
        $data['product11'] = $this->Common_model->GetWhere('product', array('1' => '1'));
        //	p($data);
        $data['brandname'] = $this->Common_model->GetWhere('brand', array('1' => '1'));
        $data['city11'] = $this->Common_model->GetWhere('city_list', array('1' => '1'));
        $data['area11'] = $this->Common_model->GetWhere('area', array('1' => '1'));
    }
    public function gautomobileg_get() {
        $allstore = $this->db->get_where("globalcategory")->result();
        if ($allstore) {
            $this->response(['success' => true, 'message' => "record found successfully.", 'data' => $allstore], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function orderidgenrate_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('saller_id', 'saller_id', 'required');
        $this->form_validation->set_rules('amount', 'amount', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $orderData = ['receipt' => 'rcptid_11', 'amount' => 39900, // 39900 rupees in paise
            'currency' => 'INR'];
            $api = new Api($key_id, $secret);
            $razorpayOrder = $api->order->create($orderData);
            $result = $this->Common_model->addrecords('vcashSaller', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "ammount has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function paymentgateway_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('saller_id', 'saller_id', 'required');
        $this->form_validation->set_rules('amount', 'amount', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['saller_id'] = $this->input->post('saller_id');
            $insert_data['amount'] = $this->input->post('amount');
            $result = $this->Common_model->addrecords('vcashSaller', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "ammount has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function addtopcategort_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('cat_id', 'cat_id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['title'] = $this->input->post('title');
            $insert_data['cat_id'] = $this->input->post('cat_id');
            $result = $this->Common_model->addrecords('topcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "top category  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function addvirtualcashqq_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('cat_id', 'cat_id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['title'] = $this->input->post('title');
            $insert_data['cat_id'] = $this->input->post('cat_id');
            $result = $this->Common_model->addrecords('topcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "top category  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function gettopcategort_get($cat_id) {
        $global_data = $this->db->get_where("topcategory", ['cat_id' => $cat_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("topcategory", ['cat_id' => $cat_id])->result_array();
            $this->response(['success' => true, 'message' => "top category  list by  category id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function addsubcategort_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('topcat_id', 'topcat_id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['title'] = $this->input->post('title');
            $insert_data['topcat_id'] = $this->input->post('topcat_id');
            $result = $this->Common_model->addrecords('subcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "sub category  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function getsubcategort_get($topcat_id) {
        $global_data = $this->db->get_where("subcategory", ['topcat_id' => $topcat_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("subcategory", ['topcat_id' => $topcat_id])->result_array();
            $this->response(['success' => true, 'message' => "sub category  list by top category id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function addchildcategort_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('subcat_id', 'subcat_id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['title'] = $this->input->post('title');
            $insert_data['subcat_id'] = $this->input->post('subcat_id');
            $result = $this->Common_model->addrecords('childcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "child category  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function getchildcategort_get($subcat_id) {
        $global_data = $this->db->get_where("childcategory", ['subcat_id' => $subcat_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("childcategory", ['subcat_id' => $subcat_id])->result_array();
            $this->response(['success' => true, 'message' => "child category  list by sub category id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function createcity_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['title'] = $this->input->post('title');
            $result = $this->Common_model->addrecords('create_city', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "city  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function getcreatecity_get($id) {
        $global_data = $this->db->get_where("create_city")->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("create_city")->result_array();
            $this->response(['success' => true, 'message' => "city  list by id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function createarea_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('city_id', 'city_id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['title'] = $this->input->post('title');
            $insert_data['city_id'] = $this->input->post('city_id');
            $result = $this->Common_model->addrecords('create_area', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "area has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function getcreatearea_get($city_id) {
        $global_data = $this->db->get_where("create_area", ['city_id' => $city_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("create_area", ['city_id' => $city_id])->result_array();
            $this->response(['success' => true, 'message' => "area  list by id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function getsellerrequestbaseoncat_get($cat_id) {
        $global_data = $this->db->get_where("topcategory", ['cat_id' => $cat_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("topcategory", ['cat_id' => $cat_id])->result_array();
            $this->response(['success' => true, 'message' => "top category  list by  category id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function shotel_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('room_type', 'room_type', 'required');
        $this->form_validation->set_rules('nums_of_guest', 'nums_of_guest', 'required');
        $this->form_validation->set_rules('nums_of_rooms', 'nums_of_rooms', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['room_type'] = $this->input->post('room_type');
            $insert_data['nums_of_guest'] = $this->input->post('nums_of_guest');
            $insert_data['nums_of_rooms'] = $this->input->post('nums_of_rooms');
            $insert_data['occupancy'] = $this->input->post('occupancy');
            $insert_data['checking_date'] = $this->input->post('checking_date');
            $insert_data['checkingout_date'] = $this->input->post('checkingout_date');
            $insert_data['specification'] = $this->input->post('specification');
            $insert_data['city'] = $this->input->post('city');
            $insert_data['area'] = $this->input->post('area');
            $insert_data['user_id'] = $this->input->post('user_id');;
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['shop_id'] = $this->input->post('shop_id');;
            $insert_data['seller_id'] = $this->input->post('seller_id');
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "shop request   has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function selectronics_post() {
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('product', 'product', 'required');
        //$this->form_validation->set_rules('brand', 'brand', 'required');
        // $this->form_validation->set_rules('specification', 'specification', 'required');
        // $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('user_id', 'user id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['role_re'] = 'shop';
            $product_ = $this->input->post('product');
            $insert_data['product'] = (!empty($product_)) ? $product_ : '';
            $brand_ = $this->input->post('brand');
            $insert_data['brand'] = (!empty($brand_)) ? $brand_ : '';
            $model_ = $this->input->post('model');
            $insert_data['model'] = (!empty($model_)) ? $model_ : '';
            $room_type_ = $this->input->post('room_type');
            $insert_data['room_type'] = (!empty($room_type_)) ? $room_type_ : '';
            $nums_of_guest_ = $this->input->post('nums_of_guest');
            $insert_data['nums_of_guest'] = (!empty($nums_of_guest_)) ? $nums_of_guest_ : '';
            $nums_of_rooms_ = $this->input->post('nums_of_rooms');
            $insert_data['nums_of_rooms'] = (!empty($nums_of_rooms_)) ? $nums_of_rooms_ : '';
            $occupancy_ = $this->input->post('occupancy');
            $insert_data['occupancy'] = (!empty($occupancy_)) ? $occupancy_ : '';
            $checking_date_ = $this->input->post('checking_date');
            $insert_data['checking_date'] = (!empty($checking_date_)) ? $checking_date_ : '';
            $checkingout_date_ = $this->input->post('checkingout_date');
            $insert_data['checkingout_date'] = (!empty($checkingout_date_)) ? $checkingout_date_ : '';
            $medicine_ = $this->input->post('medicine');
            $insert_data['medicine'] = (!empty($medicine_)) ? $medicine_ : '';
            $dosage_ = $this->input->post('dosage');
            $insert_data['dosage'] = (!empty($dosage_)) ? $dosage_ : '';
            $quantity_ = $this->input->post('quantity');
            $insert_data['quantity'] = (!empty($quantity_)) ? $quantity_ : '';
            $service_type_ = $this->input->post('service_type');
            $insert_data['service_type'] = (!empty($service_type_)) ? $service_type_ : '';
            $duration_ = $this->input->post('duration');
            $insert_data['duration'] = (!empty($duration_)) ? $duration_ : '';
            $vehical_ = $this->input->post('vehical');
            $insert_data['vehical'] = (!empty($vehical_)) ? $vehical_ : '';
            $vehical_type_ = $this->input->post('vehical_type');
            $insert_data['vehical_type'] = (!empty($vehical_type_)) ? $vehical_type_ : '';
            $need_driver_ = $this->input->post('need_driver');
            $insert_data['need_driver'] = (!empty($need_driver_)) ? $need_driver_ : '';
            $source_ = $this->input->post('source');
            $insert_data['source'] = (!empty($source_)) ? $source_ : '';
            $destination_ = $this->input->post('destination');
            $insert_data['destination'] = (!empty($destination_)) ? $destination_ : '';
            $nums_of_people_ = $this->input->post('nums_of_people');
            $insert_data['nums_of_people'] = (!empty($nums_of_people_)) ? $nums_of_people_ : '';
            $nums_of_days_ = $this->input->post('nums_of_days');
            $insert_data['nums_of_days'] = (!empty($nums_of_days_)) ? $nums_of_days_ : '';
            $data_ = $this->input->post('date');
            $insert_data['date'] = (!empty($data_)) ? $data_ : '';
            $description_ = $this->input->post('description');
            $insert_data['description'] = (!empty($description_)) ? $description_ : '';
            $specification_ = $this->input->post('specification');
            $insert_data['specification'] = (!empty($specification_)) ? $specification_ : '';
            $insert_data['city_id'] = $this->input->post('city_id');
            $insert_data['area'] = $this->input->post('area');
            $price_ = $this->input->post('price');
            $insert_data['price'] = (!empty($price_)) ? $price_ : '';
            $user_id = $this->input->post('user_id');
            $insert_data['user_id'] = (!empty($user_id)) ? $user_id : '';
            $shop_id = $this->input->post('shop_id');
            $insert_data['shop_id'] = (!empty($shop_id)) ? $shop_id : '';
            $shop_category_id_ = $this->input->post('shop_category_id');
            $insert_data['shop_category_id'] = (!empty($shop_category_id_)) ? $shop_category_id_ : '';
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['timer'] = date('Y-m-d H:i:s');
            $insert_data['request_time'] = time() * 1000 + 19800000;
            $insert_data['expiry_quote'] = time() * 1000 + 21600000;
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "shop 	electronics services  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function sautomobile_post() {
        $data = array();
        //$whr=array('id'=>$id);
        //$data['product_data'] = $this->Common_model->getSingleRecordById('model',$whr);
        //p($data);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('product', 'product', 'required');
        $this->form_validation->set_rules('brand', 'brand', 'required');
        $this->form_validation->set_rules('required');
        $this->form_validation->set_rules('specification', 'specification', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            //p($model);
            $insert_data = array();
            $insert_data['role_re'] = 'global';
            $insert_data['product'] = $this->input->post('product');
            $insert_data['brand'] = $this->input->post('brand');
            $insert_data['model'] = $this->input->post('model');
            $insert_data['specification'] = $this->input->post('specification');
            $insert_data['price'] = $this->input->post('price');
            $insert_data['city'] = $this->input->post('city');
            $insert_data['area'] = $this->input->post('area');
            $insert_data['timer'] = date('Y-m-d H:i:s');
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['shop_id'] = $this->input->post('shop_id');
            $insert_data['user_id'] = $this->input->post('user_id');
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "in shop automobile	 has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function sfitness_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('service_type', 'service_type', 'required');
        $this->form_validation->set_rules('specification', 'specification', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('shop_name', 'shop_name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['role_re'] = 'shop';
            $insert_data['service_type'] = $this->input->post('service_type');
            $insert_data['duration'] = $this->input->post('duration');
            $insert_data['specification'] = $this->input->post('specification');
            $insert_data['city'] = $this->input->post('city');
            $insert_data['area'] = $this->input->post('area');
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['shop_id'] = $this->input->post('shop_id');;
            $insert_data['user_id'] = $this->input->post('user_id');;
            $insert_data['timer'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "global 	fitness services  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function sprofessional_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('service_type', 'service_type', 'required');
        $this->form_validation->set_rules('specification', 'specification', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['role_re'] = 'shop';
            $insert_data['service_type'] = $this->input->post('service_type');
            $insert_data['date'] = $this->input->post('date');
            $insert_data['specification'] = $this->input->post('specification');
            $insert_data['city'] = $this->input->post('city');
            $insert_data['area'] = $this->input->post('area');
            $insert_data['user_id'] = $this->input->post('user_id');;
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['shop_id'] = $this->input->post('shop_id');;
            $insert_data['timer'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "In shop 	Professional services  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function sevent_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('service_type', 'service_type', 'required');
        $this->form_validation->set_rules('specification', 'specification', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('shop_name', 'shop_name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['role_re'] = 'shop';
            $insert_data['service_type'] = $this->input->post('service_type');
            $insert_data['date'] = $this->input->post('date');
            $insert_data['specification'] = $this->input->post('specification');
            $insert_data['city'] = $this->input->post('city');
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['shop_id'] = $this->input->post('shop_id');;
            $insert_data['user_id'] = $this->input->post('user_id');;
            $insert_data['timer'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "In shop events  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function spharmacy_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('medicine', 'medicine', 'required');
        $this->form_validation->set_rules('dosage', 'dosage', 'required');
        $this->form_validation->set_rules('quantity', 'quantity', 'required');
        $this->form_validation->set_rules('shop_name', 'shop name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['role_re'] = 'shop';
            $insert_data['medicine'] = $this->input->post('medicine');
            $insert_data['dosage'] = $this->input->post('dosage');
            $insert_data['quantity'] = $this->input->post('quantity');
            $insert_data['city'] = $this->input->post('city');
            $insert_data['area'] = $this->input->post('area');
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['shop_id'] = $this->input->post('shop_id');;
            $insert_data['timer'] = date('Y-m-d H:i:s');
            $insert_data['user_id'] = $this->input->post('user_id');;
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "In shop 	Pharamcy   has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function shome_appliance_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('product', 'product', 'required');
        $this->form_validation->set_rules('brand', 'brand', 'required');
        $this->form_validation->set_rules('specification', 'specification', 'required');
        $this->form_validation->set_rules('shop_name', 'shop name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['role_re'] = 'shop';
            $insert_data['product'] = $this->input->post('product');
            $insert_data['brand'] = $this->input->post('brand');
            $insert_data['specification'] = $this->input->post('specification');
            $insert_data['city'] = $this->input->post('city');
            $insert_data['area'] = $this->input->post('area');
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['shop_id'] = $this->input->post('shop_id');;
            $insert_data['user_id'] = $this->input->post('user_id');;
            $insert_data['timer'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => " in shop home applience   has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function shealthcare_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('service_type', 'service_type', 'required');
        $this->form_validation->set_rules('specification', 'specification', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('area', 'area', 'required');
        $this->form_validation->set_rules('shop_name', 'shop name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['role_re'] = 'shop';
            $insert_data['service_type'] = $this->input->post('service_type');
            $insert_data['specification'] = $this->input->post('specification');
            $insert_data['city'] = $this->input->post('city');
            $insert_data['area'] = $this->input->post('area');
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['shop_id'] = $this->input->post('shop_id');;
            $insert_data['user_id'] = $this->input->post('user_id');;
            $insert_data['timer'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "In shop healthcare  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function stravel_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('vehical', 'vehical', 'required');
        $this->form_validation->set_rules('vehical_type', 'vehical_type', 'required');
        $this->form_validation->set_rules('source', 'source', 'required');
        $this->form_validation->set_rules('shop_name', 'shop name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['role_re'] = 'shop';
            $insert_data['vehical'] = $this->input->post('vehical');
            $insert_data['vehical_type'] = $this->input->post('vehical_type');
            $insert_data['need_driver'] = $this->input->post('need_driver');
            $insert_data['source'] = $this->input->post('source');
            $insert_data['destination'] = $this->input->post('destination');
            $insert_data['nums_of_people'] = $this->input->post('nums_of_people');
            $insert_data['nums_of_days'] = $this->input->post('nums_of_days');
            $insert_data['date'] = $this->input->post('date');
            $insert_data['description'] = $this->input->post('description');
            $insert_data['city'] = $this->input->post('city');
            $insert_data['area'] = $this->input->post('area');
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['user_id'] = $this->input->post('user_id');
            $insert_data['shop_id'] = $this->input->post('shop_id');
            $insert_data['timer'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('globalcategory', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "In shop travel services  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    //shoprequesthomepage
    public function getshopreqbyshopid_get($user_id) { 
        
        $specification_data = $this->db->get_where("cartnew",['user_id'=>$user_id])->result_array();
        
         
        if (!empty($specification_data)) {
            $output_array = [];
            foreach ($specification_data as $value) {
                $product_id = $value['id'];
                $user_data = $this->db->get_where("product", ['id' => $specification_data['product_id']])->row_array();
                $output_array[] = $value;
            }
            $this->response(['success' => true, 'message' => "global  list by id.", 'data' => $output_array], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function abcd_post() {
        //get input data
        $insert_data = array();
        $insert_data['saller_id'] = $this->input->post('saller_id');
        $shop_id = $this->input->post('saller_id');
        $insert_data['amount'] = $this->input->post('amount');
        $insert_data['created_date'] = date('Y-m-d H:i:s');
        //utility
        $shop_data = $this->db->get_where("shops", ['shop_id' => $shop_id])->row_array();
        $key_id = "rzp_live_pE6E1kwJ6QEa1W"; //rzp_live_o4rVTdGd5Ulu7e
        $secret_key = "GYOwu2oxjy9M9qouXQjFcib3"; //sc0AmVRl4bfXxahqInSVEgzw
        $api = new Api($key_id, $secret_key);
        $orderData = ['receipt' => $shop_data['username'] . "_order_" . $insert_data['amount'], 'amount' => $insert_data['amount'] * 100, 'currency' => 'INR'];
        //responses
        $respone = $api->order->create($orderData);
        if (!empty($respone)) {
            $razorpayOrderId = $respone['id'];
            $insert_data['transition-id'] = $razorpayOrderId;
            $result = $this->Common_model->addrecords('vcashSaller', $insert_data);
            $razorpayamount = $respone['amount'];
            $razorreceipt = $respone['receipt'];
            $razorpaystatus = $respone['status'];
            $razorpaycreated_at = $respone['created_at'];
            $this->response(['success' => true, 'message' => "Order Created Successfully", 'id' => $razorpayOrderId, 'amount' => $razorpayamount, 'status' => $razorpaystatus, 'created_at' => $razorpaycreated_at, 'receipt' => $razorreceipt, ], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function verifyorder_post() {
        $success = true;
        $error = "Payment Failed";
        $key_id = "rzp_live_pE6E1kwJ6QEa1W ";
        $secret_key = "GYOwu2oxjy9M9qouXQjFcib3";
        $api = new Api($key_id, $secret_key);
        try {
            $insert_data = array();
            $razorpay_order_id = $this->input->post('razorpay_order_id');
            $insert_data['razorpay_order_id'] = $this->input->post('razorpay_order_id');
            $insert_data['razorpay_payment_id'] = $this->input->post('razorpay_payment_id');
            $insert_data['razorpay_signature'] = $this->input->post('razorpay_signature');
            $amount = $this->input->post('amount');
            $insert_data['amount'] = $this->input->post('amount');
            $insert_data['seller_id'] = $this->input->post('seller_id');
            $shop_id = $this->input->post('seller_id');
            $insert_data['created_date'] = date('Y-m-d H:i:s');
            $attributes = array('razorpay_order_id' => $insert_data['razorpay_order_id'], 'razorpay_payment_id' => $insert_data['razorpay_payment_id'], 'razorpay_signature' => $insert_data['razorpay_signature']);
            $data = array('razorpay_id' => $attributes['razorpay_payment_id'], 'razorpay_signature' => $attributes['razorpay_signature']);
            $api->utility->verifyPaymentSignature($attributes);
            if ($api == true) {
                $result = $this->Common_model->addrecords('varifycash', $insert_data);
                $shop_data = $this->db->get_where("shops", ['shop_id' => $shop_id])->row_array();
                $data = [];
                if ($shop_data['my_wallet'] > 0) {
                    $data['my_wallet'] = $amount + $shop_data['my_wallet'];
                } else {
                    $data['my_wallet'] = $amount;
                }
                $add_data = $this->Common_model->updateRecords('shops', $data, array("shop_id" => $shop_id));
                if (!empty($add_data)) {
                    $this->response(['success' => true, 'message' => "Your payment was successful,Coin added to wallet", 'data' => $add_data], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => true, 'message' => "Your payment was successful,Wallet amount failed", 'data' => $api], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", 'error' => $e], REST_Controller::HTTP_OK);
            }
        }
        catch(SignatureVerificationError $error) {
            $success = false;
            $this->response(['success' => false, 'message' => "Somthing went wrong.", 'error' => $error], REST_Controller::HTTP_OK);
        }
    }
    public function sellerspecificrequest_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $seller_id = $this->input->post('seller_id');  
            $requset_id = $this->input->post('requset_id');
            
             $shop_data = $this->db->get_where("globalcategory", ['id' => $requset_id])->row_array();
            
            $shop_id = $this->input->post('seller_id');
            $insert_data['unique_id'] = $this->createCode('seller_specificr', 'unique_id');
            $insert_data['price'] = $this->input->post('price');
            $insert_data['exchange_offer'] = $this->input->post('exchange_offer');
            $insert_data['other_offer'] = $this->input->post('other_offer');
            $insert_data['description'] = $this->input->post('description');
            $insert_data['seller_id'] = $this->input->post('seller_id');
            $insert_data['category_id'] = $this->input->post('category_id');
            $categoryid = $this->input->post('category_id');
            $insert_data['area_id'] = $this->input->post('area_id');
            $insert_data['requset_id'] = $this->input->post('requset_id');
            $insert_data['user_id'] = $shop_data['user_id'];
            $insert_data['create_date_time'] = date('Y-m-d H:i:s');
            // $my_wallet = $this->db->get_where("shops", ['shop_id' => $shop_id])->result();
            $getseller = $this->Common_model->getSingleData("shops", ['shop_id' => $shop_id]);
            $whr3 = array("shop_category_id" => $categoryid);
            $data123 = $this->Common_model->getSingleRecordById('globalcategory', $whr3);
            //p($getseller['my_wallet']);
            $porducts = $this->Common_model->getSingleRecordById('topcategory', array('cat_id' => $data123['shop_category_id']));
            $lqcash_seller = !empty($porducts['lqcash_seller']) ? $porducts['lqcash_seller'] : 00;
            $lqcash_buyer = !empty($porducts['lqcash_buyer']) ? $porducts['lqcash_buyer'] : 00;
            //p($porducts);
            $sepecii = $this->db->get_where("seller_specificr", ['seller_id' => $seller_id, 'requset_id' => $requset_id])->result();
            if (count($sepecii) == 0) {
                
                
            $this->check_and_refund_amount($insert_data['seller_id']);   
            $porducts = $this->Common_model->getSingleRecordById('topcategory', array('cat_id' =>$insert_data['category_id']));
            $lqcash_seller = !empty($porducts['lqcash_seller']) ? $porducts['lqcash_seller'] : 00;
            $hops = $this->Common_model->getSingleRecordById('shops', array('shop_id'=>$insert_data['seller_id']));
            $shopwallet=$hops['my_wallet'];
            if($hops){
                
                if($lqcash_seller){
                   $amount=(($insert_data['price'] * $lqcash_seller) / 100);  
                }else{
                   $amount=0; 
                } 
                $subtrack_amount=$this->check_and_block_amount($insert_data['seller_id']);
               
                $shopwallet=$shopwallet-$subtrack_amount;
                if($shopwallet<0){
                   $shopwallet=0;
                }
            }
            
            if ($shopwallet < $amount) { 
                    $less=$amount-$shopwallet;
                    $data['success'] = "Insufficient fund to quote. Please recharge LQ cash=" . $less;
                    $this->response(['success' => false, 'message' => $data['success'], ], REST_Controller::HTTP_OK);
                    exit();
            } 
            $insert_data['block_amount']=$amount;
                
                
                
                
                
                
                
                if ($shopwallet<$amount) {
                    $less = $insert_data['price'] * $lqcash_seller / 100 - $getseller['my_wallet'];
                    $this->response(['success' => false, 'message' => "Please add more amount to your wallet.", ], REST_Controller::HTTP_OK);
                } elseif ($shopwallet) {
                   
                    $result = $this->Common_model->addrecords('seller_specificr', $insert_data);
                    if (!empty($result)) {
                        $this->response(['success' => true, 'message' => "seller specific request has been Send successfully."], REST_Controller::HTTP_OK);
                    } else {
                        $this->response(['success' => false, 'message' => "Somthing went wrong."], REST_Controller::HTTP_OK);
                    }
                } else {
                    $this->response(['success' => false, 'message' => "Somthing error occurred"], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['success' => false, 'message' => "Already send request", 'data' => $sepecii], REST_Controller::HTTP_OK);
            }
        }
    }
    public function sendQuotes_get($id) {
        $specification_data = $this->db->get_where("cartnew", ['user_id' => $id])->result_array();
        if (!empty($specification_data)) {
            $dummy = array();
            if (!empty($specification_data)) {
                foreach ($specification_data as $key => $value) {
                   // $requset_id = $value['requset_id'];
                    $area_id = $value['product_id'];
                  //  $category_id = $value['category_id'];
                  //  $seller_id = $value['seller_id'];
                    // $dummy[$key]['description']=$value['description'];
                    // $dummy[$key]['unique_id']=$value['unique_id'];
                    // $dummy[$key]['price']=$value['price'];
                    // $dummy[$key]['exchange_offer']=$value['exchange_offer'];
                    // $dummy[$key]['other_offer']=$value['other_offer'];
                    $area = $this->db->get_where("product", ['id' => $area_id])->row_array();
                    //$city = $this->db->get_where("create_city", ['id' =>$value['city_id']])->row_array();
                    $dummy = $area['product_name'];
                    //$dummy[$key]['city_name']=$city['title'];
                   // $dummy[$key]['send_req'] = $value;
                }
            }
            // p($dummy);
            // $global_list = $this->db->get_where("globalcategory", ['shop_category_id' =>$shop_category_i])->result_array();
            $this->response(['success' => true, 'message' => "global  list by area.", 'data' => $dummy], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => null], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function sendQuotesexpired_get($id) {
        $where = "created_date > DATE_SUB( NOW() , INTERVAL 10 DAY )" AND "requset_id = $id";
        $specification_data = $this->db->from('globalcategory')->where($where)->get();
        if (!empty($specification_data)) {
            $dummy = array();
            if (!empty($specification_data)) {
                foreach ($specification_data as $key => $value) {
                    $requset_id = $value['requset_id'];
                    $area_id = $value['area_id'];
                    $category_id = $value['category_id'];
                    $seller_id = $value['seller_id'];
                    // $dummy[$key]['description']=$value['description'];
                    // $dummy[$key]['unique_id']=$value['unique_id'];
                    // $dummy[$key]['price']=$value['price'];
                    // $dummy[$key]['exchange_offer']=$value['exchange_offer'];
                    // $dummy[$key]['other_offer']=$value['other_offer'];
                    $area = $this->db->get_where("create_area", ['id' => $area_id])->row_array();
                    //$city = $this->db->get_where("create_city", ['id' =>$value['city_id']])->row_array();
                    $dummy[$key]['area_name'] = $area['title'];
                    //$dummy[$key]['city_name']=$city['title'];
                    $dummy[$key]['send_req'] = $value;
                }
            }
            // p($dummy);
            // $global_list = $this->db->get_where("globalcategory", ['shop_category_id' =>$shop_category_i])->result_array();
            $this->response(['success' => true, 'message' => "global  list by shop category id.", 'data' => $dummy], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => null], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function shopreqbyspecific_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $seller_id = $this->input->post('seller_id');
            $requset_id = $this->input->post('requset_id');
            $insert_data['unique_id'] = $this->createCode('seller_specificr', 'unique_id');
            $insert_data['price'] = $this->input->post('price');
            $insert_data['exchange_offer'] = $this->input->post('exchange_offer');
            $insert_data['other_offer'] = $this->input->post('other_offer');
            $insert_data['description'] = $this->input->post('description');
            $insert_data['seller_id'] = $this->input->post('seller_id');
            $insert_data['category_id'] = $this->input->post('category_id');
            $insert_data['area_id'] = $this->input->post('area_id');
            $insert_data['requset_id'] = $this->input->post('requset_id');
            $insert_data['user_id'] = $this->input->post('user_id');
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['shop_id'] = $this->input->post('shop_id');
            $insert_data['create_date_time'] = date('Y-m-d H:i:s');
            
            $this->check_and_refund_amount($insert_data['seller_id']);
            $porducts = $this->Common_model->getSingleRecordById('topcategory', array('cat_id' =>$insert_data['category_id']));
            $lqcash_seller = !empty($porducts['lqcash_seller']) ? $porducts['lqcash_seller'] : 00;
            $hops = $this->Common_model->getSingleRecordById('shops', array('shop_id'=>$insert_data['seller_id']));
            $shopwallet=$hops['my_wallet'];
            if($hops){
                
                if($lqcash_seller){
                   $amount=(($insert_data['price'] * $lqcash_seller) / 100);  
                }else{
                   $amount=0; 
                } 
                $subtrack_amount=$this->check_and_block_amount($insert_data['seller_id']);
               
                $shopwallet=$shopwallet-$subtrack_amount;
                if($shopwallet<0){
                   $shopwallet=0;
                }
            }
            
            if ($shopwallet < $amount) { 
                    $less=$amount-$shopwallet;
                    $data['success'] = "Insufficient fund to quote. Please recharge LQ cash=" . $less;
                    $this->response(['success' => false, 'message' => $data['success'], ], REST_Controller::HTTP_OK);
                    exit();
            } 
            $insert_data['block_amount']=$amount;
            $sepecii = $this->db->get_where("seller_specificr", ['seller_id' => $seller_id, 'requset_id' => $requset_id])->result();
            if (count($sepecii) == 0) {
                $result = $this->Common_model->addrecords('seller_specificr', $insert_data);
                if (!empty($result)) {
                    $this->response(['success' => true, 'message' => "seller specific request has been Send successfully."], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['success' => false, 'message' => "Already send request", 'data' => $sepecii], REST_Controller::HTTP_OK);
            }
        }
    }
    public function getsellerspecificother_get($other_offer) {
        $global_data = $this->db->get_where("seller_specificr", ['other_offer' => $other_offer])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("seller_specificr", ['other_offer' => $other_offer])->result_array();
            $this->response(['success' => true, 'message' => "specific request list by  exchange offer.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function getsellerspecificexchange_get($exchange_offer) {
        $global_data = $this->db->get_where("seller_specificr", ['exchange_offer' => $exchange_offer])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("seller_specificr", ['exchange_offer' => $exchange_offer])->result_array();
            $this->response(['success' => true, 'message' => "specific request list by  exchange offer.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    ////////////////////////////////<SELLER Api Section>///////////////////////////////////
    public function getsellerspecificsellerid_get($requset_id) {
        $sql = "SELECT * FROM `seller_specificr` WHERE `exchange_offer`!=1 AND `other_offer`!=1 AND '$requset_id'=`requset_id` ORDER BY `price` ASC LIMIT 10";
        $global_datas = $this->db->query($sql)->result_array();
        
         $new=[];
        $global_data=[];
        foreach($global_datas as $list){
            
            if(in_array($list['unique_id'],$new)){
                 continue;
            }else{
               $new[]=$list['unique_id'];
            }
            $global_data[]=$list;
        }
        
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("seller_specificr", ['requset_id' => $requset_id])->row_array();
            $sellerdata = $global_list['seller_id'];
            $userdata = $global_list['user_id'];
           
            $this->response(['success' => true, 'message' => "specific request list by  requset id.", 'data' => $global_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function getsellerspecificwithexchangesellerid_get($requset_id) {
        $sql = "SELECT * FROM `seller_specificr` WHERE `exchange_offer`=1 AND `requset_id`='$requset_id' ORDER BY `price` ASC LIMIT 10";
        $global_datas = $this->db->query($sql)->result_array();
        $new=[];
        $global_data=[];
        foreach($global_datas as $list){
            
            if(in_array($list['unique_id'],$new)){
                 continue;
            }else{
               $new[]=$list['unique_id'];
            }
            $global_data[]=$list;
        }
        if (!empty($global_data)) {
            $this->response(['success' => true, 'message' => "specific request list by  seller id.", 'data' => $global_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function getsellerspecificwithothersellerid_get($requset_id) {
        $sql = "SELECT * FROM `seller_specificr` WHERE `other_offer`=1 AND `requset_id`='$requset_id' ORDER BY `price` ASC LIMIT 10";
        $global_datas = $this->db->query($sql)->result_array();
        $global_data=$new=[];
        foreach($global_datas as $list){
            
            if(in_array($list['unique_id'],$new)){
                 continue;
            }else{
               $new[]=$list['unique_id'];
            }
            $global_data[]=$list;
        }
        if (!empty($global_data)) {
            $this->response(['success' => true, 'message' => "specific request list by  seller id.", 'data' => $global_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function getsellerspecificbyrating_get($seller_id) {
        $sql = "SELECT * FROM `seller_specificr` WHERE `requset_id`='$seller_id' LIMIT 10";
        if (!empty($global_data)) {
            $dummy = array();
            if (!empty($global_data)) {
                foreach ($global_data as $key => $value) {
                    $seller_id = $value["seller_id"];
                    $seller = $this->db->get_where("shops", ['shop_id' => $seller_id])->result();
                    //p($seller['trustscore']);
                    if (!empty($seller['trustscore'])) {
                        // p($seller['trustscore']);
                        $trustscore = $seller['trustscore'];
                        $value["trustscore"] = $trustscore;
                        $dummy = $value;
                    }
                }
            }
        }
        if (!empty($global_data)) {
            $this->response(['success' => true, 'message' => "specific request list by  seller id.", 'data' => $global_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function getuseruserid_get($subscriber_id) {
        $global_data = $this->db->get_where("users", ['subscriber_id' => $subscriber_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("users", ['subscriber_id' => $subscriber_id])->result_array();
            $this->response(['success' => true, 'message' => "user list by  user id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function getsellerspecificcategoryid_get($category_id) {
        $global_data = $this->db->get_where("seller_specificr", ['category_id' => $category_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("seller_specificr", ['category_id' => $category_id])->result_array();
            $this->response(['success' => true, 'message' => "specific request list by  category id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function getsellerspecificarea_get($area_id) {
        $global_data = $this->db->get_where("seller_specificr", ['area_id' => $area_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("seller_specificr", ['area_id' => $area_id])->result_array();
            $this->response(['success' => true, 'message' => "specific request list by  area id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function getsellerspecificreqid_get($requset_id) {
        //$specification_data = $this->db->get_where("seller_specificr", ['requset_id' =>$id])->result_array();
        // $whr[] = "$requset_id =".$requset_id;
        //   $where = " WHERE ".implode(" AND ", $whr);
        $global_data = $this->db->get_where("seller_specificr", ['requset_id' => $requset_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("seller_specificr", ['requset_id' => $requset_id])->result_array();
            $this->response(['success' => true, 'message' => "specific request list by  request id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function getsellerspecificrequestid_get($requset_id) {
        $whr = array();
        $whr[] = "$requset_id =" . $requset_id;
        $where = " WHERE " . implode(" AND ", $whr);
        $global_data = $this->Common_model->getTwotablCombineById($where);
        // p($global_data);
        //$global_data = $this->db->get_where("shops", ['shop_id' =>$shop_id]);
        //$this->db->from('shops');
        // $this->db->join('seller_specificr', 'seller_specificr.seller_id = shops.shop_id');
        // $query = $this->db->get();
        if (!empty($global_data)) {
            $global_data = $this->Common_model->getTwotablCombineById($where);
            // p($global_data);
            $this->response(['success' => true, 'message' => "specific request list by  request id.", 'data' => $global_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    public function historyLeastquote_get() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bidprice', 'bidprice', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $insert_data['bid_price'] = $this->input->post('bid_price');
            $insert_data['higestbid'] = $this->input->post('higestbid');
            $insert_data['lowerbid'] = $this->input->post('lowerbid');
            $result = $this->Common_model->addrecords('ordercomplete', $insert_data);
            $area = $this->db->get_where("create_area", ['id' => $area_id])->row_array();
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "order complete successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    //complete order
    public function completerequest_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('unique_code', 'unique_code', 'required');
        $this->form_validation->set_rules('saller_id', 'saller_id', 'required');
        $this->form_validation->set_rules('request_id', 'request_id', 'required|is_unique[ordercomplete.request_id]', array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            //require == request_id,unique_code,saller_id,user_id
            $requset_id = $this->input->post('request_id');
            $insert_data['unique_code'] = $this->input->post('unique_code');
            $unique_code = $this->input->post('unique_code');
            $insert_data['saller_id'] = $this->input->post('saller_id');
            $saller_id = $this->input->post('saller_id');
            $insert_data['request_id'] = $this->input->post('request_id');
            $request_id = $this->input->post('request_id');
            $insert_data['user_id'] = $this->input->post('user_id');
            $user_id = $this->input->post('user_id');
            // $insert_data['amount'] = $this->input->post('amount');
            //set product as purchased by status 1
            $globalcategoryData = $this->Common_model->getSingleData('globalcategory', array('id' => $request_id));
            $globalcategoryData["status"] = 1;
            $globalcategorychanged_data = $this->Common_model->updateRecords('globalcategory', $globalcategoryData, array('id' => $request_id));
            //getamountfromseller
            // $sellerspecificchanged_data = $this->Common_model->updateRecords('seller_specificr', array('unique_id' => $unique_code));
            $isert = array();
            // $isert['user_id']=$insert_data['user_id'];
            //$isert['unique_code']=$_POST['unique_code'];
            $specificatio_req = $this->Common_model->getSingleRecordById('seller_specificr', array("unique_id" => $_POST['unique_code']));
            if (!empty($specificatio_req)) {
                // $isert['request_id'] = $specificatio_req["requset_id"];
                // $isert['saller_id'] = $specificatio_req["seller_id"];
                $specificatio_req["status"] = 1;
                $sellerspecificchanged_data = $this->Common_model->updateRecords('seller_specificr', $specificatio_req, array('unique_id' => $_POST['unique_code']));
                $globalcategoryData = $this->Common_model->getSingleData('globalcategory', array('id' => $specificatio_req["requset_id"]));
                $globalcategoryData["status"] = 1;
                $globalcategorychanged_data = $this->Common_model->updateRecords('globalcategory', $globalcategoryData, array('id' => $specificatio_req["requset_id"]));
                $percent = $this->Common_model->getSingleData('topcategory', array('cat_id' => $globalcategoryData["shop_category_id"]));
                //condiion
                $shopData = $this->Common_model->getSingleData('shops', array('shop_id' => $specificatio_req["seller_id"]));
                if ($shopData["my_wallet"] + 1 <= $specificatio_req["price"] * $percent['lqcash_seller'] / 100) {
                    $this->response(['success' => false, 'message' => "Insufficient amount in seller wallet.."], REST_Controller::HTTP_OK);
                } else {
                    //condiion
                    $adminmargin = $percent['lqcash_seller'] - $percent['lqcash_buyer'];
                    $newprice = $specificatio_req["price"] * $percent['lqcash_seller'] / 100;
                    $buyeramount = $specificatio_req["price"] * $percent['lqcash_buyer'] / 100;
                    $adminamount = $specificatio_req["price"] * $adminmargin / 100;
                    $amount = ($newprice - $buyeramount) / 2;
                    $amount1 = $buyeramount + $amount * 2;
                    $amount2 = $newprice - $buyeramount;
                    $shopData = $this->Common_model->getSingleData('shops', array('shop_id' => $specificatio_req["seller_id"]));
                    $shopData["my_wallet"] = $shopData["my_wallet"] - $newprice;
                    $deductbalance = $this->Common_model->updateRecords('shops', $shopData, array('shop_id' => $specificatio_req["seller_id"]));
                    $userData = $this->Common_model->getSingleData('users', array('subscriber_id' => $user_id));
                    $userData["user_wallet"] = $userData["user_wallet"] + $buyeramount;
                    $changed_data = $this->Common_model->updateRecords('users', $userData, array('subscriber_id' => $user_id));
                    $admin_commision = [];
                    $admin_commision['user_id'] = $insert_data['user_id'];
                    $admin_commision['globalcat_id'] = $specificatio_req["requset_id"];
                    $admin_commision['amount'] = $adminamount;
                    $admin_commision['seller_id'] = $specificatio_req["seller_id"];
                    $admin_commision['percent'] = $adminmargin;
                    $insert_data['user_id'] = $insert_data['user_id'];
                    $insert_data['unique_code'] = $_POST['unique_code'];
                    $insert_data['request_id'] = $specificatio_req["requset_id"];
                    $insert_data['saller_id'] = $specificatio_req["seller_id"];
                    $insert_data['amount'] = $buyeramount;
                    $result = $this->Common_model->addRecords('ordercomplete', $insert_data);
                }
                //   $newprice = $sellerData["price"]*9/100;
                // $shopData = $this->Common_model->getSingleData('shops', array('shop_id' => $saller_id));
                //   $shopData["my_wallet"] = $shopData["my_wallet"]-$newprice;
                //   $deductbalance = $this->Common_model->updateRecords('shops', $shopData, array('shop_id' => $saller_id));
                //add percentage amount to user wallet
                //  $userData = $this->Common_model->getSingleData('users', array('subscriber_id' => $user_id));
                //  $userData["user_wallet"] = $userData["user_wallet"]+$newprice;
                //  $changed_data = $this->Common_model->updateRecords('users', $userData, array('subscriber_id' => $user_id));
                //     $insert_data['amount']= $newprice;
                //     $insert_data['shop_name']= $shopData["shop_name"];
                //      $insert_data['transition-id'] = "pay_".$shopData["shop_name"];
                //    $result = $this->Common_model->addrecords('ordercomplete', $insert_data);
                if (!empty($result)) {
                    //$resp = $this->Common_model->deleteRecords('seller_specificr',array('id'=>$requset_id));
                    $addadmindata = $this->Common_model->addRecords('admin_comission', $admin_commision);
                    //p($addadmindata);
                    $this->response(['success' => true, 'message' => "order complete successfully.", 'credit' => $buyeramount], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
                }
            }
        }
    }
    public function refund_get() {
        $key_id = "rzp_live_EepsOlpdqruUpt";
        $secret_key = "INCm4kMUGS83dX9qy7ZSTvpp";
        $api = new Api($key_id, $secret_key);
        $api->payment->fetch("pay_IBdAMMolv098mr")->refund(array("amount" => "100", "speed" => "normal", "notes" => array("notes_key_1" => "Beam me up Scotty.", "notes_key_2" => "Engage"), "receipt" => "Receipt No. 31"));
        $this->response(['success' => true, 'message' => "order complete successfully.", 'api' => $api], REST_Controller::HTTP_OK);
    }
    public function getitembyid_get($id) {
        //add 5% of seller wallet to buyer wallet
        $sellerData = $this->Common_model->getSingleData('seller_specificr', array('unique_id' => $id));
        $newprice = $sellerData["price"] * 5;
        $userData = $this->Common_model->getSingleData('users', array('subscriber_id' => '11'));
        $userData["user_wallet"] = $userData["user_wallet"] + $newprice;
        $changed_data = $this->Common_model->updateRecords('users', $userData, array('subscriber_id' => '11'));
        if ($changed_data) {
            $this->response(['success' => true, 'data' => $changed_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function shopcompleterequest_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('unique_code', 'unique_code', 'required');
        $this->form_validation->set_rules('saller_id', 'saller_id', 'required');
        $this->form_validation->set_rules('shop_name', 'shop_name', 'required');
        $this->form_validation->set_rules('shop_id', 'shop_id', 'required');
        $this->form_validation->set_rules('request_id', 'request_id', 'required|is_unique[ordercomplete.request_id]', array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $insert_data = array();
            $requset_id = $this->input->post('request_id');
            $insert_data['unique_code'] = $this->input->post('unique_code');
            $insert_data['saller_id'] = $this->input->post('saller_id');
            $insert_data['request_id'] = $this->input->post('request_id');
            $insert_data['user_id'] = $this->input->post('user_id');
            $insert_data['shop_name'] = $this->input->post('shop_name');
            $insert_data['shop_id'] = $this->input->post('shop_id');
            // $insert_data['amount'] = $this->input->post('amount');
            $result = $this->Common_model->addrecords('ordercomplete', $insert_data);
            if (!empty($result)) {
                //$resp = $this->Common_model->deleteRecords('seller_specificr',array('id'=>$requset_id));
                $this->response(['success' => true, 'message' => "shop order complete successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function getcompletereq_get($id) {
        $result = $this->db->select('unique_id')->from('seller_specificr')->where('id', $id)->limit(10)->get()->row_array();
        $result1 = $this->db->select('seller_id')->from('seller_specificr')->where('id', $id)->limit(10)->get()->row_array();
        $result2 = $this->db->select('requset_id')->from('seller_specificr')->where('id', $id)->limit(10)->get()->row_array();
        //$result3 = $this->db->select('unique_code')->from('ordercomplete')->where('id', $id)->limit(10)->get()->row_array();
        // $result4 = $this->db->select('seller_id')->from('ordercomplete')->where('id', $id)->limit(10)->get()->row_array();
        // $result5 = $this->db->select('request_id')->from('ordercomplete')->where('id', $id)->limit(10)->get()->row_array();
        if (!empty($result)) {
            //  $global_list = $this->db->get_where("seller_specificr", ['id' =>$id ])->result_array();
            $this->response(['success' => true, 'message' => "specific request list by id.", 'data' => $result, 'data1' => $result1, 'data2' => $result2], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function cashbackbuyer_get($request_id) {
        $global_data = $this->db->get_where("ordercomplete", ['request_id' => $request_id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("ordercomplete", ['request_id' => $request_id])->result_array();
            $this->response(['success' => true, 'message' => "complete cashback.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function getuserbyuserid_get($id) {
        $banner_slider_images = $this->db->get_where("users",['id' => $id])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            $data['username'] = $banner_slider_image->username;
            $data['mobile_no'] = $banner_slider_image->mobile_no;
            
            $data['email'] = $banner_slider_image->email;
            $data['country'] = $banner_slider_image->country;
            $data['address'] = $banner_slider_image->address;

            $data['image'] = 'https:/saviturboutique.com/newadmin/upload/shop/' . $banner_slider_image->image;
            $slider_images[] = $data;
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }    
            }
    public function getsellerspecificid_get($id) {
        $global_data = $this->db->get_where("seller_specificr", ['id' => $id])->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("seller_specificr", ['id' => $id])->result_array();
            $this->response(['success' => true, 'message' => "specific request list by id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function sms_send_get() {
        $mobileno = isset($_GET['mobileno']) ? $_GET['mobileno'] : '';
        $message = isset($_GET['message']) ? $_GET['message'] : '';
        $contry = isset($_GET['contry']) ? $_GET['contry'] : '';
        if (!empty($mobileno) && !empty($message) && !empty($contry)) {
            $sms_data = sendsms($mobileno, $message, $contry);
            if (!empty($sms_data) && $sms_data[0]) {
                $this->response(['success' => true, 'message' => "Message  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(['success' => false, 'message' => "required."], REST_Controller::HTTP_OK);
        }
    }
    public function why_generic_pharma_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lang', 'Language', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $lang = $this->input->post('lang');
            $fileds = array("1" => "1");
            $generic_pharama = $this->Common_model->GetWhere('why_generic_pharma', $fileds);
            $data_array = array();
            if (!empty($generic_pharama)) {
                foreach ($generic_pharama as $key => $value) {
                    if ($lang == "hi") {
                        $data_array[$key]['title'] = $value['title_hindi'];
                        $data_array[$key]['description'] = $value['description_hindi'];
                    } else {
                        $data_array[$key]['title'] = $value['title'];
                        $data_array[$key]['description'] = $value['description'];
                    }
                }
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
            if (!empty($data_array)) {
                $this->response(['success' => true, 'message' => "Whay Generic Pharama found successfully.", 'why_generic_pharma' => $data_array], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        // $get_pharama = $this->db->get_where("why_generic_pharma")->result();
        // if($get_pharama) {
        //     $this->response(['success' => true, 'message' => "Generic_pharma found successfully.", 'pharama' => $get_pharama], REST_Controller::HTTP_OK);
        // } else {
        //     $this->response(['success' => false, 'message' => "Record not found."], REST_Controller::HTTP_NOT_FOUND);
        // }
        
    }
    public function medicin_request_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id', 'User Id', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        //$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('medicin_name', 'Medicin Name', 'required');
        $this->form_validation->set_rules('quantitiy', 'Quantitiy Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $data_insert = array();
            $data_insert['user_id'] = $this->input->post('user_id');
            $data_insert['name'] = $this->input->post('name');
            $data_insert['mobile_no'] = $this->input->post('mobile_no');
            $data_insert['email'] = $this->input->post('email');
            $data_insert['medicin_name'] = $this->input->post('medicin_name');
            $data_insert['quantitiy'] = $this->input->post('quantitiy');
            $user_id['id'] = $data_insert['user_id'];
            $mobile_no = $data_insert['mobile_no'];
            $checkuser_id = $this->Common_model->GetWhere('users', array('id' => $user_id['id']));
            if (!empty($checkuser_id)) {
                $sms = "your request has been sent succesfully";
                $countrycode = '91';
                $medicins = $this->Common_model->addRecords('medicin_request', $data_insert);
                if (!empty($medicins)) {
                    sendsms($mobile_no, $countrycode, $sms);
                    $this->response(['success' => true, 'message' => "Your request has been sent successfully."], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response(['success' => false, 'message' => "User Id Invalid.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function medicin_reminder_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id', 'User id', 'required');
        $this->form_validation->set_rules('reminde_me', 'Reminde Me', 'required');
        $this->form_validation->set_rules('reminder_discription', 'Reminder Discription', 'required');
        $this->form_validation->set_rules('set_time', 'Time', 'required');
        $this->form_validation->set_rules('set_date', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $data_insert = array();
            $data_insert['user_id'] = $this->input->post('user_id');
            $user_id['id'] = $data_insert['user_id'];
            $data_insert['reminde_me'] = $this->input->post('reminde_me');
            $data_insert['reminder_discription'] = $this->input->post('reminder_discription');
            $data_insert['set_time'] = $this->input->post('set_time');
            $date = $this->input->post('set_date');
            $data_insert['set_date'] = date('Y-m-d', strtotime($date));
            $checkuser_id = $this->Common_model->GetWhere('users', array('id' => $user_id['id']));
            if (!empty($checkuser_id)) {
                $id = $this->input->post('id');
                if (!empty($id)) {
                    $medicin_reminder = $this->Common_model->updateRecords('medicin_reminder', $data_insert, array("id" => $id));
                } else {
                    $medicin_reminder = $this->Common_model->addRecords('medicin_reminder', $data_insert);
                }
                if (!empty($medicin_reminder)) {
                    $this->response(['success' => true, 'message' => "Your reminder has been saved successfully."], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Oops something went wrong.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response(['success' => false, 'message' => "Invalid user id please try again."], REST_Controller::HTTP_OK);
            }
        }
    }
    public function medcin_reminder_delete_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $id = $this->input->post('id');
            $delete_reminder = $this->Common_model->deleteRecords('medicin_reminder', array('id' => $id));
            if (!empty($delete_reminder)) {
                $this->response(['success' => true, 'message' => "Your reminder has been deleted successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => true, 'message' => "Invalid reminder id."], REST_Controller::HTTP_OK);
            }
        }
    }
    public function reminder_list_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id', 'User Id', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $user_id['id'] = $this->input->post('user_id');
            $checkuser_id = $this->Common_model->GetWhere('users', array('id' => $user_id['id']));
            if (!empty($checkuser_id)) {
                // $reminder_list = $this->db->get_where("medicin_reminder")->result();
                $reminder_list = $this->Common_model->GetWhere('medicin_reminder', array('user_id' => $user_id['id']));
                if ($reminder_list) {
                    $this->response(['success' => true, 'message' => "Reminder list found successfully.", 'reminder_list' => $reminder_list], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Record not found."], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response(['success' => false, 'message' => "Invalid user id."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    // public function media_file_images_get()
    // {
    //     $media_file_images = $this->db->get_where("media_file_images")->result();
    //     if($media_file_images) {
    //         $this->response(['success' => true, 'message' => "Media file video and images list found successfully.", 'media_file_images' => $media_file_images,'image_url'=> base_url() . 'uploads/media_file/'], REST_Controller::HTTP_OK);
    //     } else {
    //         $this->response(['success' => false, 'message' => "Record not found."], REST_Controller::HTTP_NOT_FOUND);
    //     }
    // }
    // public function media_file_videos_get()
    // {
    //     $media_file_video = $this->db->get_where("media_file_video")->result();
    //     if($media_file_video) {
    //         $this->response(['success' => true, 'message' => "Media file video and images list found successfully.", 'media_file_video' => $media_file_video,'vedio_url'=> base_url() . 'uploads/media_file/vedios/'], REST_Controller::HTTP_OK);
    //     } else {
    //         $this->response(['success' => false, 'message' => "Record not found."], REST_Controller::HTTP_NOT_FOUND);
    //     }
    // }
    public function media_files_post() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('file', 'File', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            $file = $this->input->post('file');
            if ($file == 'vedio') {
                $media_file = $this->db->get_where("media_file_video")->result();
                $media_url = 'vedios/';
            } else {
                $media_file = $this->db->get_where("media_file_images")->result();
                $media_url = '';
            }
            if ($media_file) {
                $this->response(['success' => true, 'message' => "Media file video and images list found successfully.", $file => $media_file, $file . '_url' => base_url() . 'uploads/media_file/' . $media_url], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function notificationdemo_get() {
        $data_insert = array();
        $fileds = array("title" => "title", "message" => "message", "product_id" => "product_id", "is_read" => "is_read", "create_date" => "create_date");
        $notification_list = $this->Common_model->get_all_byColumn('notification_list', $fileds);
        //$facm_arra=array("cbMz0TCMaFg:APA91bHRullP3TZEPK3x9v_WxdTntAb8Kd4QzRLKLpNkxsfjrDyUEeWVt8XgRKFO0PAN1MzQqUe6C7y6RGwVOXqFJ3MZ_ixaZoJPiCJeAfkgONE-e-5BG8Z6w6yElzbkUxet4mbAKWYX","c51_cOaL3lE:APA91bHJGHJeY2FpZ_CVYVEPMZllxv3seCDRRVnseq32Y_Rh3Pe673CjIegesztNvpylIfhz48cTZ_58eJXRyCaOPFRjbxiZzuutoWd44CtfkkpO4duNVaJHD9CHrlsOHIjOWYV1McHY");
        // echo "<pre>";print_r($facm_arra);die;
        // if(!empty($facm_arra))
        // {
        //     foreach ($facm_arra as $key => $value) {
        //         //echo "<pre>";print_r($value);die;
        //             $message = "demo procless android notification";
        //             $not = array();
        //             $not['msg_type'] = "notification";
        //             $not['device_type'] = "android";
        //             $not['title'] = "title";
        //             $not['body'] = "demo procless android notification";
        //             $not['reg_id'] = $value;
        //             // $data["icon"] = "";
        //             $resp = push_notification_android($not);
        //             var_dump($resp);
        //     }
        // }die;
        //$fcm_tocken = "c51_cOaL3lE:APA91bHJGHJeY2FpZ_CVYVEPMZllxv3seCDRRVnseq32Y_Rh3Pe673CjIegesztNvpylIfhz48cTZ_58eJXRyCaOPFRjbxiZzuutoWd44CtfkkpO4duNVaJHD9CHrlsOHIjOWYV1McHY";
        if ($notification_list) {
            $this->response(['success' => true, 'message' => "Notification has been sent successfully.", 'notification_list' => $notification_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Notification not send."], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function shipping_policy_get() {
        $fileds = array("1" => "1");
        $shippping_policy = $this->Common_model->GetWhere('same_privacy_policy', $fileds);
        if ($shippping_policy) {
            $this->response(['success' => true, 'message' => "Shippping policy found successfully.", 'shippping_policy' => $shippping_policy], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Shippping policy not found."], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /*generated by Monika Barde*/
    public function addtocart_post() {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        // print_r($data);
        if (isset($data['user_id']) && !empty($data['user_id']) && isset($data['auth_token']) && !empty($data['auth_token']) && isset($data['product_id']) && !empty($data['product_id']) && isset($data['quantity']) && !empty($data['quantity'])) {
            // print_r($data);
            // die;
            $userId = $data['user_id'];
            $auth_token = $data['auth_token'];
            $quantity = $data['quantity'];
            $product_id = $data['product_id'];
            $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
            if (isset($userData) && !empty($userData)) {
                $productData = $this->Common_model->getSingleData('product', array('product_id' => $product_id, 'status' => 1));
                if (isset($productData) && !empty($productData)) {
                    $cartData = $this->Common_model->getSingleData('cartdata', array('product_id' => $product_id, 'user_id' => $userId));
                    $insert_data = array();
                    if (isset($cartData) && !empty($cartData)) {
                        $insert_data['product_quantitiy'] = $quantity;
                        $this->Common_model->updateRecords('cartdata', $insert_data, array('user_id' => $userId, 'product_id' => $product_id));
                    } else {
                        $insert_data['product_quantitiy'] = $quantity;
                        $insert_data['product_id'] = $product_id;
                        $insert_data['user_id'] = $userId;
                        // $this->Common_model->updateRecords('users', $insert_data, array('id' => $userId));
                        $result = $this->Common_model->addrecords('cartdata', $insert_data);
                    }
                    $cartlistdata = $this->cartlistdata($userId);
                    $this->response(['success' => true, 'message' => "add to cart successfully", 'data' => $cartlistdata], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Invalid product please try again.", 'data' => ''], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['success' => false, 'message' => "Invalid user id and auth token please try again.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(['success' => false, 'message' => "Oops Something went wrong.", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
    public function cartlistdata($userId) {
        $cwhr = array();
        $cwhr[] = "user_id = " . $userId . "";
        // $whr[] = "categories_id=".;
        $cwhere = " WHERE " . implode(" AND ", $cwhr);
        $corderby = "";
        $cartproductsData = $this->Common_model->getwherecustomecol('cartdata', "*", $cwhere, $corderby);
        if (isset($cartproductsData) && !empty($cartproductsData)) {
            foreach ($cartproductsData as $key => $cartproductsDataarray) {
                $productData[$key] = $this->Common_model->getSingleData('product', array('product_id' => $cartproductsDataarray['product_id']));
                $cartproductsData[$key]['product_name'] = $productData[$key]['name'];
                $cartproductsData[$key]['description'] = $productData[$key]['description'];
                $cartproductsData[$key]['product_reg_id'] = $productData[$key]['product_reg_id'];
                $cartproductsData[$key]['currency'] = $productData[$key]['currency'];
                $cartproductsData[$key]['currency_symbol'] = $productData[$key]['currency_symbol'];
                $cartproductsData[$key]['mrp_price'] = $productData[$key]['mrp_price'];
                $cartproductsData[$key]['genric_price'] = $productData[$key]['genric_price'];
                $cartproductsData[$key]['total_genric_price'] = number_format($cartproductsDataarray['product_quantitiy'] * $productData[$key]['genric_price'], 2);
            }
            return $cartproductsData;
        } else {
            return $cartproductsData;
        }
    }
    public function cartlistdataapi_post() {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        // print_r($data);
        if (isset($data['user_id']) && !empty($data['user_id']) && isset($data['auth_token']) && !empty($data['auth_token'])) {
            $userId = $data['user_id'];
            $auth_token = $data['auth_token'];
            $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
            if (isset($userData) && !empty($userData)) {
                $cartlistdata = $this->cartlistdata($userId);
                $this->response(['success' => true, 'message' => "success", 'data' => $cartlistdata], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid user id and auth token please try again.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(['success' => false, 'message' => "Invalid request data please try gain."], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function removecartproduct_post() {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        // print_r($data);
        if (isset($data['user_id']) && !empty($data['user_id']) && isset($data['auth_token']) && !empty($data['auth_token']) && isset($data['product_id']) && !empty($data['product_id'])) {
            $userId = $data['user_id'];
            $auth_token = $data['auth_token'];
            $product_id = $data['product_id'];
            $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
            if (isset($userData) && !empty($userData)) {
                $resp = $this->Common_model->deleteRecords('cartdata', array('user_id' => $userId, 'product_id' => $product_id));
                if ($resp) {
                    $cartlistdata = $this->cartlistdata($userId);
                    $this->response(['success' => true, 'message' => "Medicine removed from cart successfully", 'data' => $cartlistdata], REST_Controller::HTTP_OK);
                } else {
                    $cartlistdata = $this->cartlistdata($userId);
                    $this->response(['success' => true, 'message' => "No record found", 'data' => $cartlistdata], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['success' => false, 'message' => "Invalid user id and auth token please try again.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(['success' => false, 'message' => "Invalid request data please try gain."], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function plantcategory_get(){
        $banner_slider_images = $this->db->get_where("category", ['status' => 0])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            
            $data['category_name'] = $banner_slider_image->category_name;
            $data['image'] = base_url() . 'upload/team/' . $banner_slider_image->image;
            $slider_images[] = $data;
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " product list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function plantproduct_get(){
        $banner_slider_images = $this->db->get_where("product", ['status' => 0])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            $data['category_id'] = $banner_slider_image->category_id;
            $data['product_name'] = $banner_slider_image->product_name;
            $data['price'] = $banner_slider_image->price;
            $data['image'] = base_url() . 'upload/team1/' . $banner_slider_image->image;
             $data['image1'] = base_url() . 'upload/team1/' . $banner_slider_image->image1;
            $data['image2'] = base_url() . 'upload/team1/' . $banner_slider_image->image2;
           
            
            
            
            $slider_images[] = $data;
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " product list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    public function favuritepost_post() {
      //$otp = mt_rand(100000, 999999);
      $username = !empty($_POST['mobile_no']) ? $_POST['mobile_no'] : '';
        $check_user = $this->Common_model->getSingleRecordById('users', array('mobile_no' => $username));
         $aa  = (json_decode(file_get_contents("php://input")));
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
                   // $shop_data = $this->db->get_where("users", ['id' => $user_id])->row_array();

            
        } else {
            
            $insert = array();
            $authorization = apache_request_headers()["user_id"];
            
            $insert['fav'] = $aa->fav;
            $insert['user_id'] = $authorization;
          
         
           
                    if (empty($check_email)) {
                      //$add_otp = $this->Common_model->addRecords('users', $insert, array('id' => $username));
                      $add_otp = $this->Common_model->addRecords('favorite', $insert);
                        $check_gst = $this->Common_model->getSingleRecordById('users', array('id' => $add_otp));
                        
                        $responseArray = array('status' => TRUE, 'message' => 'fav send successfully.', 'data' => [$insert]);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => ' number is  not exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                
            
        }
    }
    
    public function cart1api_post(){
               $aa  = (json_decode(file_get_contents("php://input")));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_name', 'product name', 'required');
        $this->form_validation->set_rules('user_id', 'user id', 'required');
        
        
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            //$query = $this->db->query("SELECT * FROM cartnew");
              //  $result = $query->result_array();

//p($query);
                    $authorization = apache_request_headers()["user_id"];

 //$banner_slider_images = $this->db->get_where("cartnew",["user_id"=> $authorization],"id")->result();
 //print_r( $authorization);
 $banner_slider_images =$this->Common_model->getselectwhereorderby("cartnew",["user_id"=> $authorization],"id","id,user_id,product_id,(SELECT price from product where product.id = cartnew.product_id) as price");
 //print_r($banner_slider_images);die;
        $orderId= mt_rand(100, 999).mt_rand(10000, 99999);
            $insert_data['order_id'] = $orderId;
            $insert_data['user_id'] = $authorization;
            $insert_data['product_name'] = $aa->product_name;
            $insert_data['pickup_r'] = $aa->pickup_r;
            $insert_data['address'] =  $aa->address;
            $insert_data['pincode'] = $aa->pincode;
            $insert_data['pickup_date'] = $aa->pickup_date;
            $insert_data['first'] = $aa->first;
            $insert_data['second'] =$aa->second;
            $insert_data['delivery_address'] = $aa->delivery_address;
            
            $insert_data['re_charge'] =300;
            $insert_data['co_charge'] =150;
            $insert_data['total_amount'] =0;
            $insert_data['delivery_r'] = $aa->delivery_r;
            $insert_data['delivery_same'] = $aa->delivery_same;
            $insert_data['delivery_address'] = $aa->delivery_address;
            $insert_data['delivery_pincode'] = $aa->delivery_pincode;
            
           $insert_data['created_date'] = date('Y-m-d H:i:s');
            //$insert_data['delivery_same'] = $this->input->post('delivery_same');


               
            //$userData = $this->Common_model->getSingleData('cart', array('user_id' => $insert_data['user_id']));
            //$totlaamount = $userData["price"];
              $data = [];
            //$insert_data['total_amount'] = $totlaamount +
            //$insert_data['price'];
           
           
           
           //$userData = $this->Common_model->getSingleData('cart', array('user_id' => $insert_data['user_id']));
             //$totlaamount = $userData["discount"];
               //$data = [];
            //$insert_data['total_discount'] = $totlaamount + $insert_data['discount'];
        //   $result =  $this->Common_model->updateRecords('delivery_address', $insert, array('user_id' => $insert['user_id']));
 
            
          $result = $this->Common_model->addrecords('delivery_address', $insert_data);
          
        if (!empty($result)) {
            $total_amount = 0;
                foreach ($banner_slider_images as $row) {
                //print_r($row);
                $total_amount=$total_amount+$row->price;
                $insert_data1['order_id'] = $orderId;
                $insert_data1['user_id'] = $row->user_id;
                $insert_data1['price'] = $row->price;
                $insert_data1['product_id'] = $row->product_id;
                //print_r($insert_data1);die;
                //$slider_images[] = $data;
                  
                  //$result = $this->Common_model->addrecords('delivery_address', $insert_data);
                  
                  $result1 = $this->Common_model->addrecords('cart', $insert_data1);
                  
                   
                 // p($result);
                  
                //$this->Common_model->deleteRecords('cartnew', ['user_id' => $id]);
    
                } // foreach end
                
  //  $result = $this->Common_model->('delivery_address', $insert_data);
        
                $changed_data = $this->Common_model->updateRecords('delivery_address',['total_amount'=>$total_amount], ['id'=>$result]);
                $this->Common_model->deleteRecords('cartnew', ['user_id' => $authorization]);  
               
                // $userData = $this->Common_model->getSingleData('cart',$result);
                 
                
               
                
                //$model = $this->Common_model->getSingleRecordById('model', array('id'=>$result));
                //$products = $this->Common_model->GetWhere('product', array('1'=>1));
                $this->response(['success' => true, 'message' => "data Send successfully.", 'result' => $result], REST_Controller::HTTP_OK);
            }
            else{
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);    
            }
            
            
        }
    }   
    
    
    public function cart_post(){
            $aa  = (json_decode(file_get_contents("php://input")));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_name', 'product name', 'required');
        $this->form_validation->set_rules('user_id', 'user id', 'required');
        
        
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
        } else {
            //$query = $this->db->query("SELECT * FROM cartnew");
              //  $result = $query->result_array();

//p($query);
                    $authorization = apache_request_headers()["user_id"];

 //$banner_slider_images = $this->db->get_where("cartnew",["user_id"=> $authorization],"id")->result();
 //print_r( $authorization);
 $banner_slider_images =$this->Common_model->getselectwhereorderby("cartnew",["user_id"=> $authorization],"id","id,user_id,product_id,(SELECT price from product where product.id = cartnew.product_id) as price");
 //print_r($banner_slider_images);die;
        $orderId= mt_rand(100, 999).mt_rand(10000, 99999);
            $insert_data['order_id'] = $orderId;
            $insert_data['user_id'] = $authorization;
            $insert_data['product_name'] = $aa->product_name;
            $insert_data['pickup_r'] = $aa->pickup_r;
            $insert_data['address'] =  $aa->address;
            $insert_data['pincode'] = $aa->pincode;
            $insert_data['pickup_date'] = $aa->pickup_date;
            $insert_data['first'] = $aa->first;
            $insert_data['second'] =$aa->second;
            $insert_data['delivery_address'] = $aa->delivery_address;
             $insert_data['re_charge'] =300;
            $insert_data['co_charge'] =150;
           //$total=300+150;
            $insert_data['total_amount'] =0 ;
           // $insert_data['re_charge'] =300;
          //  $insert_data['co_charge'] =150;
            $insert_data['delivery_r'] = $aa->delivery_r;
            $insert_data['delivery_same'] = $aa->delivery_same;
            $insert_data['delivery_address'] = $aa->delivery_address;
            $insert_data['delivery_pincode'] = $aa->delivery_pincode;
            
           $insert_data['created_date'] = date('Y-m-d H:i:s');
            //$insert_data['delivery_same'] = $this->input->post('delivery_same');


               
            //$userData = $this->Common_model->getSingleData('cart', array('user_id' => $insert_data['user_id']));
            //$totlaamount = $userData["price"];
              $data = [];
            //$insert_data['total_amount'] = $totlaamount +
            //$insert_data['price'];
           
           
           
           //$userData = $this->Common_model->getSingleData('cart', array('user_id' => $insert_data['user_id']));
             //$totlaamount = $userData["discount"];
               //$data = [];
            //$insert_data['total_discount'] = $totlaamount + $insert_data['discount'];
        //   $result =  $this->Common_model->updateRecords('delivery_address', $insert, array('user_id' => $insert['user_id']));
 
            
          $result = $this->Common_model->addrecords('delivery_address', $insert_data);
          
        if (!empty($result)) {
            $total_amount = 0+300+150;
                foreach ($banner_slider_images as $row) {
                //print_r($row);
                $total_amount=$total_amount+$row->price;
                $insert_data1['order_id'] = $orderId;
                $insert_data1['user_id'] = $row->user_id;
                $insert_data1['price'] = $row->price;
                $insert_data1['product_id'] = $row->product_id;
                //print_r($insert_data1);die;
                //$slider_images[] = $data;
                  
                  //$result = $this->Common_model->addrecords('delivery_address', $insert_data);
                  
                  $result1 = $this->Common_model->addrecords('cart', $insert_data1);
                  
                   
                 // p($result);
                  
                //$this->Common_model->deleteRecords('cartnew', ['user_id' => $id]);
    
                } // foreach end
                
  //  $result = $this->Common_model->('delivery_address', $insert_data);
        
                $changed_data = $this->Common_model->updateRecords('delivery_address',['total_amount'=>$total_amount], ['id'=>$result]);
                $this->Common_model->deleteRecords('cartnew', ['user_id' => $authorization]);  
               
                // $userData = $this->Common_model->getSingleData('cart',$result);
                 
                
               
                
                //$model = $this->Common_model->getSingleRecordById('model', array('id'=>$result));
                //$products = $this->Common_model->GetWhere('product', array('1'=>1));
                $this->response(['success' => true, 'message' => "data Send successfully.", 'result' => $result], REST_Controller::HTTP_OK);
            }
            else{
                $this->response(['success' => false, 'message' => "Somthing went wrong.", ], REST_Controller::HTTP_NOT_FOUND);    
            }
            
            
        } 
    }
    
    
    
    public function cartnewapi_post() {
      //$otp = mt_rand(100000, 999999);
    //  $username = !empty($_POST['mobile_no']) ? $_POST['mobile_no'] : '';
        $check_user = $this->Common_model->getSingleRecordById('users', array('mobile_no' => $username));
         $aa  = (json_decode(file_get_contents("php://input")));
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
                   // $shop_data = $this->db->get_where("users", ['id' => $user_id])->row_array();

            
        } else {
            
            $insert = array();
            $authorization = apache_request_headers()["user_id"];
            
            $insert['product_id'] = $aa->product_id;
            $insert['user_id'] = $authorization;
           // $insert['image'] = 'image-_(11)6.jpg';
           // $insert['price'] = 300;
            
                    if (empty($check_email)) {
                      //$add_otp = $this->Common_model->addRecords('users', $insert, array('id' => $username));
                      $add_otp = $this->Common_model->addRecords('cartnew', $insert);
                        $check_gst = $this->Common_model->getSingleRecordById('users', array('id' => $add_otp));
                        
                        $responseArray = array('status' => TRUE, 'message' => 'fav send successfully.', 'data' => [$insert]);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => ' number is  not exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                
            
        }
    }
     public function orderplant_post(){
      //$otp = mt_rand(100000, 999999);
    //  $username = !empty($_POST['mobile_no']) ? $_POST['mobile_no'] : '';
        $check_user = $this->Common_model->getSingleRecordById('users', array('mobile_no' => $username));
         $aa  = (json_decode(file_get_contents("php://input")));
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);

        } else {
            
            $insert = array();
            $authorization = apache_request_headers()["user_id"];
            
            $insert['order_id'] =  mt_rand(100000, 999999);
            $insert['price'] = $aa->price;
            $insert['address'] = $aa->address;
            $insert['delivery_address'] = $aa->delivery_address;
            $insert['product_id'] = $aa->product_id;
            $insert['user_id'] = $authorization;
                $insert['status'] = 1;
            
                    if (empty($check_email)) {
                      //$add_otp = $this->Common_model->addRecords('users', $insert, array('id' => $username));
                      $add_otp = $this->Common_model->addRecords('orderlist', $insert);
                        $check_gst = $this->Common_model->getSingleRecordById('users', array('id' => $add_otp));
                        
                        $responseArray = array('status' => TRUE, 'message' => 'Your Order send successfully.', 'data' => [$insert]);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => ' number is  not exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                
            
        }
    }
    
   
   
    
    public function favlist_get() {
            $authorization = apache_request_headers()["user_id"];
            $insert['user_id'] = $authorization;
            
        
        $global_data = $this->db->get_where("favorite")->row_array();
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("favorite")->result_array();
            $this->response(['success' => true, 'message' => "favoraite list by id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
    
    public function cartlistbasedonuserid_get($user_id) {
         
         $global_data = $this->db->get_where("cartnew", ['user_id' => $user_id])->result_array();
        if (!empty($global_data)) {
            $output_array = [];
            foreach ($global_data as $global_list) {
                $sellerid = $global_list['product_id'];
             
                $sellerid = $this->db->get_where("product", ['id' => $global_list['product_id']])->row_array();
        
        $banner_slider_images = $this->db->get_where("product", ['id' => $sellerid['id']])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            $data['product_name'] = $banner_slider_image->product_name;
            $data['price'] = $banner_slider_image->price;
            $data['image'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image;
            $data['image1'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image1;
             $data['image2'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image2;
           
            $slider_images[] = $data;
        }
            }
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
   
    public function cartlistttt_get($user_id) {
           
         $global_data = $this->db->get_where("cartnew", ['user_id' => $user_id])->result_array();
        if (!empty($global_data)) {
            $output_array = [];
            foreach ($global_data as $global_list) {
                $sellerid = $global_list['product_id'];
             
                $sellerid = $this->db->get_where("product", ['id' => $global_list['product_id']])->row_array();
        
        $banner_slider_images = $this->db->get_where("product", ['id' => $sellerid['id']])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            $data['product_name'] = $banner_slider_image->product_name;
            $data['price'] = $banner_slider_image->price;
            $data['image'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image;
            $data['image1'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image1;
             $data['image2'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image2;
           
            $slider_images[] = $data;
        }
            }
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
        public function cartdatafound_get($user_id) {
            $banner_slider_images = $this->db->get_where("cartnew", ['user_id' => $user_id])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            //$data['product_name'] = $banner_slider_image->product_name;
            $data['price'] = $banner_slider_image->price;
            $data['image'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image;
            $slider_images[] = $data;
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    
    
    
    
    public function getrecods_get($user_id){
           
        
        $global_data = $this->db->getRecordCount("cartnew", ['user_id' => $user_id])->row_array();
         $row=$global_data->num_rows();
        
        if (!empty($global_data)) {
            $global_list = $this->db->getRecordCount("cartnew", ['user_id' => $user_id])->result_array();
            $this->response(['success' => true, 'message' => "favoraite list by id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
    
    
     public function notificationcount_get(){
           
        
        $global_data = $this->db->get_where("notification")->num_rows();
         //$row=$global_data->num_rows();
        
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("notification")->num_rows();
            $this->response(['success' => true, 'message' => "favoraite list by id.", 'data' => $global_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
     public function categorycount_get(){
           
        
        $global_data = $this->db->get_where("category")->num_rows();
         //$row=$global_data->num_rows();
        
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("category")->num_rows();
            $this->response(['success' => true, 'message' => "category list by id.", 'data' => $global_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
   
   
     public function cartcountbyuserid_get($user_id){
           
        
        $global_data = $this->db->get_where("cart",['user_id'=>$user_id])->num_rows();
         //$row=$global_data->num_rows();
        
        if (!empty($global_data)) {
            $global_list = $this->db->get_where("cart",['user_id'=>$user_id])->num_rows();
            $this->response(['success' => true, 'message' => "cart count by user id.", 'data' => $global_data], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
   
     public function productbaseoncategoryname_get($category_id){
         
        $banner_slider_images = $this->db->get_where("product", ['category_id' => $category_id,'status'=>1])->result();
        
        //$category = $this->Common_model->getSingleRecordById('category',array('id'=> $getdata['category_id']));
                  
        foreach ($banner_slider_images as $banner_slider_image) {
            
             $data['category_id'] = $banner_slider_image->category_id;
           $category = $this->Common_model->getSingleRecordById('category',array('id'=> $data['category_id']));
         
      $data ['category_name']=  $category['category_name'];   
      
       //$category =  $category['category_name']; 
        
            $slider_images[] = $data;
        }
         if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    
    public function productbaseonimage_get($category_id){
         
        $banner_slider_images = $this->db->get_where("product", ['category_id' => $category_id,'status'=>1])->result();
        
        //$category = $this->Common_model->getSingleRecordById('category',array('id'=> $getdata['category_id']));
                  
        foreach ($banner_slider_images as $banner_slider_image) {
            
           // $data['product_name'] = $banner_slider_image->product_name;
           // $data['price'] = $banner_slider_image->price;
            $data['image'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image;
            $data['image1'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image1;
             $data['image2'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image2;
             
           $category = $this->Common_model->getSingleRecordById('category',array('id'=> $data['category_id']));
         
     // $data ['category_name']=  $category['category_name'];   
      
       $category =  $category['category_name']; 
        
            $slider_images[] = $data;
        }
         if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
     public function productbaseoncategoryid_get($category_id){
         
        $banner_slider_images = $this->db->get_where("product", ['category_id' => $category_id,'status'=>1])->result();
        
        //$category = $this->Common_model->getSingleRecordById('category',array('id'=> $getdata['category_id']));
                  
        foreach ($banner_slider_images as $banner_slider_image) {
            
            $data['id'] = $banner_slider_image->id;
            $data['category_id'] = $banner_slider_image->category_id;
            $data['product_name'] = $banner_slider_image->product_name;
            $data['price'] = $banner_slider_image->price;
            $data['image'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image;
            $data['image1'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image1;
             $data['image2'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image2;
             
           $category = $this->Common_model->getSingleRecordById('category',array('id'=> $data['category_id']));
         
     // $data ['category_name']=  $category['category_name'];   
      
       $category =  $category['category_name']; 
        
            $slider_images[] = $data;
        }
         if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
     public function invoice_get($user_id){
         
        $banner_slider_images = $this->db->get_where("delivery_address", ['user_id' => $user_id])->result();
             //   $this->db->order_by("id", "desc");

        
        //$category = $this->Common_model->getSingleRecordById('category',array('id'=> $getdata['category_id']));
                  
        foreach ($banner_slider_images as $banner_slider_image) {
            
            $data['id'] = $banner_slider_image->id;
            $data['re_charge'] = $banner_slider_image->re_charge;
            $data['co_charge'] = $banner_slider_image->co_charge;
            $data['total_amount'] = $banner_slider_image->total_amount;
           // $data['image'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image;
          //  $data['image1'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image1;
           //  $data['image2'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image2;
          // $category = $this->Common_model->getSingleRecordById('category',array('id'=> $data['category_id']));
         
   //   $data ['category_name']=  $category['category_name'];                   
        
            $slider_images[] = $data;
        }
         if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
   
   
   public function productbaseonid_get($id) {
         
        $banner_slider_images = $this->db->get_where("product", ['id' => $id])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            $data['product_name'] = $banner_slider_image->product_name;
            $data['price'] = $banner_slider_image->price;
            $data['image'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $banner_slider_image->image;
            $slider_images[] = $data;
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
   
   
   
   public function usersingledata_get($id) {
       
      $banner_slider_images = $this->db->get_where("users",['id' => $id])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            $data['username'] = $banner_slider_image->username;
            $data['mobile_no'] = $banner_slider_image->mobile_no;
            
            $data['email'] = $banner_slider_image->email;
            $data['country'] = $banner_slider_image->country;
            $data['address'] = $banner_slider_image->address;

            $data['image'] = 'https:/saviturboutique.com/newadmin/upload/shop/' . $banner_slider_image->image;
            $slider_images[] = $data;
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }    
       
    }
    
    public function cartsingleuserdata_get($user_id) {
       
       $global_data = $this->db->get_where("cartnew", ['user_id' => $user_id])->row_array();
        if (!empty($global_data)) {
            
            $global_list = $this->db->get_where("cartnew", ['user_id' => $user_id])->result_array();
            $this->response(['success' => true, 'message' => "user by user id.", 'data' => $global_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_NOT_FOUND);
        }
           
    }
    
    public function usernewdata_get($id) {
       
      $banner_slider_images = $this->db->get_where("student",['id' => $id])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            $data['username'] = $banner_slider_image->username;
            
            $data['image'] = 'https:/saviturboutique.com/newadmin/upload/shop/' . $banner_slider_image->image;
            $slider_images[] = $data;
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " user found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }    
       
    }
    
 
   
   
   
        public function favroiteget_get($user_id) {
        $specification_data = $this->db->get_where("favorite", ['user_id' => $user_id])->result_array();
        if (!empty($specification_data)) {
            $dummy = array();
            if (!empty($specification_data)) {
                foreach ($specification_data as $key => $value) {
                    $user_id = $value['user_id'];
            
                    
                $dummy[$key]['id']=$value['id'];
                     $dummy[$key]['fav']=$value['fav'];
                    
                }
            }
            
            
            $this->response(['success' => true, 'message' => "global  list by area.", 'data' => $dummy], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => null], REST_Controller::HTTP_NOT_FOUND);
        }
    }
        public function registration_post() {
      $otp = mt_rand(1000, 9999);
         $aa  = (json_decode(file_get_contents("php://input")));
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
                    $shop_data = $this->db->get_where("users", ['id' => $user_id])->row_array();

            
        } else {
            
            $insert = array();
            //$insert['token'] = $aa->$headers;
            $insert['username'] = $aa->username;
            $insert['mobile_no'] = $aa->mobile_no;
          $insert['otp'] = $otp;
          $insert['created_date'] = date('Y-m-d H:i:s');
            $check_shop = $this->Common_model->getSingleRecordById('users', array('mobile_no' =>$aa->mobile_no));
          //  $check_email = $this->Common_model->getSingleRecordById('customers', array('email' => $_POST['email']));
            //p($check_mobi);
            
                if (empty($check_shop)) {
                    if (empty($check_email)) {
                        $add_otp = $this->Common_model->addRecords('users', $insert);
                        $check_gst = $this->Common_model->getSingleRecordById('users', array('id' => $add_otp));
                        
                        $responseArray = array('status' => TRUE, 'message' => 'users signup successfully.', 'data' =>$insert);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    } else {
                        $responseArray = array('status' => FALSE, 'message' => ' number is  already exits.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'number is  already exits.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            
        }
    }
    
    public function verify_otppp_post() {
        $aa  = (json_decode(file_get_contents("php://input")));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == TRUE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response);
                    $shop_data = $this->db->get_where("users", ['mobile_no' => $mobile_no])->row_array();

                      $check_user = $this->Common_model->getSingleRecordById('users', array('mobile_no' => $this->input->post('mobile_no')));

        }  else {
            
            $otp = $aa->otp;
            $mobile_no = $aa->mobile_no;
            
            $checkmobilenootp = $this->Common_model->GetWhere('users', array('mobile_no' => $mobile_no, 'otp' => $otp ));
            
            if (isset($checkmobilenootp) && !empty($checkmobilenootp)) {
                $this->response(['success' => true, 'message' => "OTP has been verify successfully please login now." ,'data' =>$checkmobilenootp], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid otp please enter valid otp."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }


 public function getcartlist_get($product_id) {
        $global_data = $this->db->get_where("product", ['id' => $product_id])->result_array();
        if (!empty($global_data)) {
            $output_array = [];
            foreach ($global_data as $global_list) {
                //p($global_list);
                $id = $this->db->get_where("cartnew", ['product_id' => $global_list['id']])->row_array();
                
                $global_list['product_id'] = $id;
               // $global_list['user_id'] = $userid;
               // $global_list['requset_id'] = $requestid;
                $output_array[] = $global_list;
            }
            $this->response(['success' => true, 'message' => "specific request list by  seller id", 'data' => $output_array], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }

 public function deletecart_post(){
         $aa  = (json_decode(file_get_contents("php://input")));
        $this->form_validation->set_rules('product_id', 'ID', 'required|numeric|trim');
        if ($this->form_validation->run() == TRUE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $insert = array();
          
$authorization = apache_request_headers()["user_id"];


                
            $id =  $aa->product_id;
            $insert['user_id'] = $authorization;   
            $this->Common_model->deleteRecords('cartnew', ['product_id' => $id]);
            $this->response(['success' => true, 'message' => "Delete cart successfully."], REST_Controller::HTTP_OK);
        }
    }
  
public function deletefavorite_post(){
         $aa  = (json_decode(file_get_contents("php://input")));
        $this->form_validation->set_rules('product_id', 'ID', 'required|numeric|trim');
        if ($this->form_validation->run() == TRUE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $insert = array();
          
$authorization = apache_request_headers()["user_id"];


                
            $id =  $aa->fav;
            $insert['user_id'] = $authorization;   
            $this->Common_model->deleteRecords('favorite', ['fav' => $id]);
            $this->response(['success' => true, 'message' => "Delete favorite successfully."], REST_Controller::HTTP_OK);
        }
    }
 

    public function getfavvlist_get($fav) {
        $global_data = $this->db->get_where("favorite", ['fav' => $fav])->result_array();
        if (!empty($global_data)) {
            $output_array = [];
            foreach ($global_data as $global_list) {
                //p($global_list);
                $id = $this->db->get_where("product", ['id' => $global_list['fav']])->row_array();
                $global_list['fav'] = $id;
                $global_list['price'] = $global_data->price;
                $global_list['image'] = 'https://saviturboutique.com/newadmin/upload/team1/' . $global_data->image;
         
                           // $global_list[] = $global_data;

                
               $output_array[] = $global_list;
            }
            $this->response(['success' => true, 'message' => "specific request list by  seller id", 'data' => $output_array], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => []], REST_Controller::HTTP_OK);
        }
    }
    
     public function ordernewapi_get($user_id){
         
        $banner_slider_images = $this->db->get_where("delivery_address",['user_id' => $user_id])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['id'] = $banner_slider_image->id;
            $data['order_id'] = $banner_slider_image->order_id;
            $data['status'] = $banner_slider_image->status;
            $data['created_date'] = $banner_slider_image->created_date;
            
              
            $slider_images[] = $data;
            
            
        }
        
         
        if ($slider_images) {
            $this->response(['success' => true, 'message' => " category list found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
   
    
    
    
    
 public function sendMail_get() {
        // multiple recipients
        $to = 'monika.itspark@gmail.com' . ', '; // note the comma
        $to.= 'monika.itspark@gmail.com';
        // subject
        $subject = 'Birthday Reminders for August';
        // message
        $message = '
<html>
<head>
  <title>Birthday Reminders for August</title>
</head>
<body>
  <p>Here are the birthdays upcoming in August!</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';
        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Additional headers
        $headers.= 'To: Mary <monika.itspark@gmail.com>, Kelly <monika.itspark@gmail.com>' . "\r\n";
        $headers.= 'From: Birthday Reminder <monika.itspark@gmail.com>' . "\r\n";
        $headers.= 'Cc: monika.itspark@gmail.com' . "\r\n";
        $headers.= 'Bcc: monika.itspark@gmail.com' . "\r\n";
        // Mail it
        mail($to, $subject, $message, $headers);
    }
}
