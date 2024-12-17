<?php
defined('BASEPATH') OR exit('No direct script access allowed');




$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['postprediction'] = 'Welcome/postprediction';

$route['index'] = 'Welcome/index';
$route['login'] = 'Welcome/login';
$route['addservice'] = 'Welcome/addservice';
$route['addattribute'] = 'Welcome/addattribute';
$route['buyer'] = 'Welcome/buyer';
$route['seller'] = 'Welcome/seller';
$route['bankdetails'] = 'Welcome/bankdetails';
$route['adminrole'] = 'Welcome/adminrole';
$route['pageindex'] = 'Welcome/pageindex';


$route['businessarea'] = 'Welcome/businessarea';
$route['requesterlist'] = 'Welcome/requesterlist';
$route['createuser'] = 'Welcome/createuser';
$route['userlist'] = 'Welcome/userlist';
$route['createbusiness'] = 'Welcome/createbusiness';
$route['signup'] = 'Welcome/signup';
$route['ticketlist'] = 'Welcome/ticketlist';
$route['ticketreport'] = 'Welcome/ticketreport';
$route['addticket'] = 'Welcome/addticket';
$route['rolepermission'] = 'Welcome/rolepermission';
$route['addrole'] = 'Welcome/addrole';
$route['logout'] = 'Welcome/logout';
$route['exportuserreport'] = 'Welcome/exportuserreport';
$route['editprofile'] = 'Welcome/editprofile';

$route['replyview'] = 'Welcome/replyview';
$route['addreply'] = 'Welcome/addreply';


$route['forgetpass'] = 'Welcome/forgetpass';
$route['confirm_otp'] = 'Welcome/confirm_otp';
$route['reset_pass'] = 'Welcome/reset_pass';



