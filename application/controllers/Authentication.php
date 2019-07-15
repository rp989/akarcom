<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
    private $APIKEY;
    private $ip;
    private $OS;
    private $appVersion = 0.0;
    private $language = null;

    public function __construct()
    {
        parent::__construct();
        header("Content-Type: application/json");
        $this->load->library('session');
        $this->APIKEY = '9CE735A8-4C51-4EAA-945B-8529CAD88441-AEC62DDB-F87C-48F7-9505-12097308F159-EFAB0E00-9220-482C-BF55-C728B42BC1EA-A6346F5C-E48A-4CDC-8962-53CCB9FD53B1-9B0D2802-A46C-41D4-A910-69F828784554-11A02222-2443-44D4-BD5B-EAF64F178094-C33538A5-272C-4E07-8A18-AD56CF1A952F-D4022F9D-AE86-491C-ACCC-AEAD8E96B6B5';
        $headers = $this->input->request_headers();
        if ($headers) {
            $this->ip = $this->input->ip_address();
            $this->OS = null;
            $this->appVersion = null;
            $validAuthorization = false;
            foreach ($headers as $key => $header) {
                if ($key == 'Authorization' || $key == 'authorization') {
                    if ($header != $this->APIKEY) {
//                        $this->Display404();
                        $this->SendMessage('-403', 'set authorization in header');
                    } else {
                        $validAuthorization = true;
                    }
                } elseif ($key == 'OS' || $key == 'os') {
                    if ($header == 'Web' || $header == 'Ios' || $header == 'Android') {
                        $this->OS = $header;
                    } else {
//                        $this->Display404();
                        $this->SendMessage('-403', 'set os in header');
                    }
                } elseif ($key == 'appVersion' || $key == 'appversion') {
                    $this->appVersion = $header;
                } elseif ($key == 'language') {
                    if ($header == 'ar') {
                        $this->lang->load('api', 'arabic');
                        $this->language = 0;
                    } else {
                        $this->lang->load('api', 'english');
                        $this->language = 1;
                    }
                } elseif ($key == 'session') {
                    if (!empty($header)) {
                        $userID = $this->CheckSession($header);
                        $session = $header;
                    } elseif (($this->router->method == 'updateProfileOfUser') || ($this->router->method == 'changePassword') || ($this->router->method == 'getProfileOfUser') ){
//                        $this->Display404();
                        $this->SendMessage('-403', 'set session in header');
                    }
                }
            }
            if (empty($this->appVersion) || empty($this->OS) || !$validAuthorization) {
                $this->SendMessage(-101, 'check your OS or AppVersion');
            }
        }
        $_POST = json_decode(file_get_contents('php://input'), true);
//        $content = json_encode($_POST);
//        $content .= '\n';
//        $content .= $this->router->method;
//        $fp = fopen("./public/myText.txt","wb");
//        fwrite($fp,$content);
//        fclose($fp);
        $_POST['session'] = isset($session) ? $session : '';
        $_POST['userID'] = isset($userID) ? $userID : '';
    }

    public function CheckSession($session)
    {
        $this->load->model('UsersAuth');
        $result = $this->UsersAuth->CheckSession($session);
        if ($result) {
            foreach ($result as $value) {
                $userID = $value['us_user_id'];
            }
            return $userID;
        }
        return false;

    }

    public function guid()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function Display404()
    {
        $error404['heading'] = '404 Page Not Found';
        $error404['message'] = 'The page you requested was not found.';
        $this->load->view('errors/html/error_404', $error404);
        exit;
    }

    public function EmptyData()
    {
        $error['code'] = -11;
        $error['data'] = array();
        $error['message'] = $this->lang->line('empty_Data_in_request');
        echo json_encode($error);
        exit();
    }

    public function MissingData()
    {
        $error['code'] = -10;
        $error['data'] = array();
        $error['message'] = $this->lang->line('Missing_Data_in_request');
        echo json_encode($error);
        exit();
    }

    public function LogoutData()
    {
        $error['code'] = -999;
        $error['data'] = array();
        $error['message'] = 'please, Sign in again!';
        echo json_encode($error);
        exit();
    }

    public function SuccessData()
    {
        $error['code'] = 1;
        $error['data'] = array();
        $error['message'] = $this->lang->line('Success_Operation');
        echo json_encode($error);
        exit();
    }

    public function SendSuccessData($data)
    {
        if (!$data) {
            $this->SendMessage(-13, $this->lang->line('no_data_found'));
        }
        $info['code'] = 1;
        $info['data'] = $data;
        $info['message'] = $this->lang->line('Success_Operation');
        echo json_encode($info);
        exit();
    }

    public function SendMessage($code, $string)
    {
        $error['code'] = $code;
        $error['data'] = array();
        $error['message'] = $string;
        echo json_encode($error);
        exit();
    }

    public function CreateSession($userID = null,$oldSession = null)
    {
        $this->load->model('UsersAuth');
        $session = $this->guid();
        $this->UsersAuth->createSession($session, $userID, $oldSession, $this->appVersion, $this->OS, $_SERVER['HTTP_X_FORWARDED_FOR'], $this->language);
        $result = $this->UsersAuth->GetVersion($this->OS);
        if ($result) {
            foreach ($result as $value) {
                if ($this->appVersion < $value['version']) {
                    $info['update'] = 1;
                    if ($value['skip'] == 0) {
                        $info['required'] = 1;
                    } else {
                        $info['required'] = 0;
                    }
                    $info['URL'] = $value['url'];
                } else {
                    $info['update'] = 0;
                    $info['required'] = 0;
                    $info['URL'] = "";
                }
            }
        } else {
            $info['update'] = 0;
            $info['required'] = 0;
            $info['URL'] = "";
        }
        $info['session'] = $session;
        return $info;
    }

    public function checkIsSetPost($data)
    {
        $result = true;
        foreach ($data as $item) {
            if ($result) {
                if (isset($_POST[$item])) {
                    $result = true;
                } else {
                    $result = false;
                }
            } else {
                $result = false;
                break;
            }
        }
        if (!$result) {
            if ($this->router->method == 'register'){
                $this->SendMessage(-10,'enter name & gsm & password & (birthday as millisecond timestamp)');
            }
            $this->MissingData();
        }
        return $result;
    }

    public function checkEmptyPost($data)
    {
        $result = true;
        if (isset($data[0])) {
            foreach ($data[0] as $item) {
                if ($result) {
                    if (!empty($_POST[$item])) {
                        $result = true;
                    } else {
                        $result = false;
                    }
                } else {
                    $result = false;
                    break;
                }
            }
        }
        if ($result && isset($data[1])) {
            foreach ($data[1] as $item) {
                if ($result) {
                    if (!empty($_POST[$item]) || $_POST[$item] == 0) {
                        $result = true;
                    } else {
                        $result = false;
                    }
                } else {
                    $result = false;
                    break;
                }
            }
        }
        if (!$result) {
            $this->EmptyData();
        }
        return $result;
    }

    // auth api

    public function register()
    {
        $post[1] = array('name', 'gsm', 'password');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $id = $this->guid();
            $name = $this->input->post('name');
            $GSM = $this->input->post('gsm');
            $Password = $this->input->post('password');
            if (strlen((string)$Password) >= 8) {
                if (is_numeric($GSM) && strlen((string)$GSM) == 10 && $GSM{0} == 0 && $GSM{1} == 9) {
                    $this->load->model('UsersAuth');
                    $result = $this->UsersAuth->checkGSM($GSM);
                    if (!$result) {
                        $this->UsersAuth->register($id, $name, $GSM, $Password,0);
                        $this->SuccessData();
                    } else {
                        $this->SendMessage(-14, $this->lang->line('your_number_is_already_used_in_another_account'));
                    }
                } else {
                    $this->SendMessage(-13, $this->lang->line('check_your_gsm_number_is_valid'));
                }
            } else {
                $this->SendMessage(-12, $this->lang->line('password_less_than_8_characters'));
            }
        }
    }

    public function login()
    {
        $post[1] = array('gsm', 'password');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $GSM = $this->input->post('gsm');
            $Password = $this->input->post('password');
            if (strlen((string)$Password) >= 8) {
                if (is_numeric($GSM) && strlen((string)$GSM) == 10 && $GSM{0} == 0 && $GSM{1} == 9) {
                    $this->load->model('UsersAuth');
                    $GSM = (int) $GSM;
                    $result1 = $this->UsersAuth->login($GSM, $Password);
                    if ($result1) {
                        foreach ($result1 as $result) {
                            if ($result['u_active'] == 1 || $result['u_active'] == 2) {
                                $info['userId'] = $result['u_id'];
                                $info['name'] = $result['u_name'];
                                $info['sessionKey'] = $this->CreateSession($info['userId']);
                                $this->SendSuccessData($info);
                            } elseif ($result['u_active'] == 0) {
                                $this->SendMessage(-16, $this->lang->line('you_account_not_activation_yet'));
                            } elseif ($result['u_active'] == 3) {
                                $this->SendMessage(-15, $this->lang->line('sorry_your_account_has_blocked'));
                            }
                        }
                    } else {
                        $this->SendMessage(-14, $this->lang->line('not_much_between_gsm_and_password'));
                    }
                } else {
                    $this->SendMessage(-13, $this->lang->line('check_your_gsm_number_is_valid'));
                }
            } else {
                $this->SendMessage(-12, $this->lang->line('password_less_than_8_characters'));
            }
        }
    }

    public function activationAccount()
    {
        $post[0] = array('gsm', 'code');
        if ($this->checkIsSetPost($post[0]) && $this->checkEmptyPost($post)) {
            $GSM = $this->input->post('gsm');
            $Code = $this->input->post('code');
            if (is_numeric($GSM) && strlen((string)$GSM) == 10 && $GSM{0} == 0 && $GSM{1} == 9) {
                $this->load->model('UsersAuth');
                $result1 = $this->UsersAuth->CheckCode($GSM, $Code);
                if ($result1) {
                    foreach ($result1 as $result) {
                        if ($result['u_active'] == 0) {
                            $info['userId'] = $result['u_id'];
                            $info['name'] = $result['u_name'];
                            $info['sessionKey'] = $this->CreateSession($info['userId']);
                            $this->UsersAuth->VerificationCode($result['u_id']);
                            $this->SendSuccessData($info);
                        } else {
                            $this->SendMessage(-17, $this->lang->line('your_account_is_already_activation'));
                        }
                    }
                } else {
                    $this->SendMessage(-14, $this->lang->line('not_much_between_gsm_and_code'));
                }
            } else {
                $this->SendMessage(-13, $this->lang->line('check_your_gsm_number_is_valid'));
            }
        }
    }

    public function forgotAccount()
    {
        $post[0] = array('gsm');
        if ($this->checkIsSetPost($post[0]) && $this->checkEmptyPost($post)) {
            $GSM = $this->input->post('gsm');
            if (is_numeric($GSM) && strlen((string)$GSM) == 10 && $GSM{0} == 0 && $GSM{1} == 9) {
                $this->load->model('UsersAuth');
                $result1 = $this->UsersAuth->Forgate($GSM);
                if ($result1) {
                    foreach ($result1 as $result) {
                        if ($result['u_reset'] == 0) {
                            $this->UsersAuth->SetForgateCode($result['u_id'], $result['u_gsm']);
                            $this->SuccessData();
                        } else {
                            $this->SendMessage(-17, $this->lang->line('your_account_is_already_apply_Forgate_Password'));
                        }
                    }
                } else {
                    $this->SendMessage(-18, $this->lang->line('Check_your_GSM_if_Registered'));
                }
            } else {
                $this->SendMessage(-13, $this->lang->line('check_your_gsm_number_is_valid'));
            }
        }
    }

    public function codeForgotAccount()
    {
        $post[0] = array('gsm', 'newPassword', 'code');
        if ($this->checkIsSetPost($post[0]) && $this->checkEmptyPost($post)) {
            $GSM = $this->input->post('gsm');
            $newPassword = $this->input->post('newPassword');
            $code = $this->input->post('code');
            if (strlen((string)$newPassword) >= 8) {
                if (is_numeric($GSM) && strlen((string)$GSM) == 10 && $GSM{0} == 0 && $GSM{1} == 9) {
                    $this->load->model('UsersAuth');
                    $result1 = $this->UsersAuth->CheckCode($GSM, $code);
                    if ($result1) {
                        foreach ($result1 as $result) {
                            if ($result['reset'] == 1) {
                                $info['userId'] = $result['u_id'];
                                $info['name'] = $result['u_name'];
                                $info['sessionKey'] = $this->CreateSession($info['userId']);
                                $this->UsersAuth->ChangePassword($info['userId'], $newPassword);
                                $this->SendSuccessData($info);
                            } else {
                                $this->SendMessage(-17, $this->lang->line('your_account_is_not_Forgate_Password'));
                            }
                        }
                    } else {
                        $this->SendMessage(-18, $this->lang->line('not_much_between_gsm_and_code'));
                    }
                } else {
                    $this->SendMessage(-13, $this->lang->line('check_your_gsm_number_is_valid'));
                }
            } else {
                $this->SendMessage(-12, $this->lang->line('password_less_than_8_characters'));
            }
        }
    }

    public function getProfileOfUser()
    {
        $post[0] = array('userID');
        if ($this->checkIsSetPost($post[0]) && $this->checkEmptyPost($post)) {
            $this->load->model('UsersAuth');
            $userID = $this->input->post('userID');
            $result = $this->UsersAuth->getProfileUser($userID);
            if ($result) {
                foreach ($result as $value) {
                    if ($value['u_active'] == 1 || $value['u_active'] == 2) {
                        $info['id'] = $value['u_id'];
                        $info['name'] = $value['u_name'];
                        $info['gsm'] = $value['u_gsm'];
                        $info['birthday'] = $value['u_birthday'];
                        $this->SendSuccessData($info);
                    } else {
                        $this->LogoutData();
                        break;
                    }
                }
            } else {
                $this->LogoutData();
            }
        }
    }

    public function changePassword()
    {
        $post[0] = array('oldPassword', 'newPassword', 'userID');
        if ($this->checkIsSetPost($post[0]) && $this->checkEmptyPost($post)) {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            $userID = $this->input->post('userID');
            $this->load->model('UsersAuth');
            $result = $this->UsersAuth->checkPasswordUser($userID, $oldPassword);
            if ($result) {
                $this->UsersAuth->ChangePassword($userID, $newPassword);
                $this->SuccessData();
            } else {
                $this->LogoutData();
            }
        }
    }

    public function updateProfileOfUser()
    {
        $post[0] = array('name', 'gsm', 'userID', 'birthday');
        if ($this->checkIsSetPost($post[0]) && $this->checkEmptyPost($post)) {
            $gsm = $this->input->post('gsm');
            $name = $this->input->post('name');
            $birthday = $this->input->post('birthday');
            $userID = $this->input->post('userID');
            $this->load->model('UsersAuth');
            $result1 = $this->UsersAuth->getProfileUser($userID);
            if ($result1) {
                foreach ($result1 as $result) {
                    if ($result['u_active'] == 1 || $result['u_active'] == 2) {
                        if ($result['u_gsm'] != $gsm) {
                            $this->UsersAuth->updateProfileUser($userID, $name,$birthday, $gsm, 0);
                            $this->SendMessage(-999, $this->lang->line('Success_Operation'));
                        } else {
                            $this->UsersAuth->updateProfileUser($userID, $name,$birthday, $gsm, 1);
                            $this->SuccessData();
                        }
                    } else {
                        $this->LogoutData();
                    }
                    break;
                }
            } else {
                $this->LogoutData();
            }
        }
    }

    public function Logout(){
        $this->SuccessData();
    }
}
