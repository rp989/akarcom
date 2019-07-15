<?php
/**
 * Created by PhpStorm.
 * User: riadsasila
 * Date: 9/11/18
 * Time: 5:51 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MainScreen extends CI_Controller
{
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
            $this->OS = 'test';
            $this->appVersion = null;
            $this->appVersion = 0.0;
            $validAuthorization = false;
//            var_dump($headers);exit;
            foreach ($headers as $key => $header) {
                if ($key == 'Authorization' || $key == 'authorization' || $key == 'AuthorizationAk' || $key == 'authorizationAk') {
//                    var_dump($header != $this->APIKEY);
//                    var_dump($header);
//                    var_dump($this->APIKEY);
//                    exit;
                    if ($header != $this->APIKEY) {
//                        $this->Display404();
                        $this->SendMessage(-403, 'set authorization in header');
                    } else {
                        $validAuthorization = true;
                    }
                } elseif ($key == 'OS' || $key == 'os') {
                    if ($header == 'Web' || $header == 'Ios' || $header == 'Android') {
                        $this->OS = $header;
                    } else {
//                        $this->Display404();
                        $this->SendMessage(-403, 'set os in header');
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
                    } elseif ((!$this->router->method == 'CheckForUpdate') || (!$this->router->method == 'GetPosts') || (!$this->router->method == 'GetAllGovernorate')) {
//                        $this->Display404();
                        $this->SendMessage(-403, 'set session in header');
                    }
                }
            }
            if (empty($this->appVersion) || empty($this->OS) || !$validAuthorization) {
                $this->SendMessage(-101, 'check your Authorization');
//                $this->SendMessage(-101, ($this->appVersion) .' | '. ($this->OS) .' | '. $validAuthorization);
//                var_dump($validAuthorization);exit;
            }
        }

        $_POST = json_decode(file_get_contents('php://input'), true);
//        $content = json_encode($_POST);
//        $content .= '\n';
//        $content .= $this->router->method;
//        $fp = fopen("./public/myText.txt","wb");
//        fwrite($fp,$content);
//        fclose($fp);
//        exit;

        $_POST['session'] = isset($session) ? $session : '';
//        $this->language = (isset($_POST['language']) && $_POST['language'] == 'en') ? 1 : 0;
//        if ($this->language){
//            $this->lang->load('api', 'english');
//        }else{
//            $this->lang->load('api', 'arabic');
//        }
//        $userID = $this->CheckSession(@$_POST['session']);
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

    public function CreateSession()
    {
        $this->load->model('UsersAuth');
        $oldSession = null;
        $userID = null;
        if (isset($_POST['session']) && !empty($_POST['session'])) {
            $oldSession = $this->input->post('session');
            if (isset($_POST['userID']) && !empty($_POST['userID'])) {
                $userID = $this->input->post('userID');
            }
        }
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
        $this->SendSuccessData($info);
    }

    public function checkIsSetPost($data)
    {
        $result = true;
        $key = 0;
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
            $key++;
        }
        if (!$result) {
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

    public function CheckForUpdate()
    {
        $this->load->model('UsersAuth');
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
        $this->SendSuccessData($info);
    }

    public function SetToken()
    {
        $post[0] = array('token');
        if ($this->checkIsSetPost($post[0]) && $this->checkEmptyPost($post)) {
            $this->load->model('UsersAuth');
            $this->UsersAuth->SetToken($this->input->post('session'), $this->input->post('token'));
            $this->SuccessData();
        }
    }

    public function GetAllGovernorates()
    {
        $this->load->model('Posts');
        $governorates = $this->Posts->GetAllGovernorate();
        $info = array();
        if ($governorates) {
            $numGovernorate = 0;
            foreach ($governorates as $governorate) {
                if ($governorate['g_active'] == 1) {
                    $info[$numGovernorate]['id'] = $governorate['g_id'];
                    if ($this->language) {
                        $info[$numGovernorate]['name'] = $governorate['g_name_en'];
                    } else {
                        $info[$numGovernorate]['name'] = $governorate['g_name_ar'];
                    }
                    $info[$numGovernorate]['meridian'] = $governorate['g_meridian'];
                    $info[$numGovernorate]['latitude'] = $governorate['g_latitude'];
                    $numGovernorate++;
                }
            }
            $this->SendSuccessData($info);
        } else {
            $this->SendMessage(-13, $this->lang->line('no_data_found'));
        }

    }

    public function GetAllGovernoratesIOS()
    {
        $this->load->model('Posts');
        $governorates = $this->Posts->GetAllGovernorate();
        $info = array();
        if ($governorates) {
            $numGovernorate = 0;
            foreach ($governorates as $governorate) {
                if ($governorate['g_active'] == 1) {
                    $info[$numGovernorate]['id'] = $governorate['g_id'];
                    if ($this->language) {
                        $info[$numGovernorate]['name'] = $governorate['g_name_en'];
                    } else {
                        $info[$numGovernorate]['name'] = $governorate['g_name_ar'];
                    }
                    if ($numGovernorate == 0){
                        $info[$numGovernorate]['meridian'] = '46.696607';
                        $info[$numGovernorate]['latitude'] = '24.670886';
                    }elseif ($numGovernorate == 1){
                        $info[$numGovernorate]['meridian'] = '39.122401';
                        $info[$numGovernorate]['latitude'] = '21.330635';
                    }
                    elseif ($numGovernorate == 2){
                        $info[$numGovernorate]['meridian'] = '41.538337';
                        $info[$numGovernorate]['latitude'] = '19.849717';
                    }
                    elseif ($numGovernorate == 3){
                        $info[$numGovernorate]['meridian'] = '42.636489';
                        $info[$numGovernorate]['latitude'] = '18.229677';
                    }
                    elseif ($numGovernorate == 4){
                        $info[$numGovernorate]['meridian'] = '39.254180';
                        $info[$numGovernorate]['latitude'] = '24.487461';
                    }
                    elseif ($numGovernorate == 5){
                        $info[$numGovernorate]['meridian'] = '42.372933';
                        $info[$numGovernorate]['latitude'] = '22.106317';
                    }
                    elseif ($numGovernorate == 6){
                        $info[$numGovernorate]['meridian'] = '46.194503';
                        $info[$numGovernorate]['latitude'] = '18.104413';
                    }
                    elseif ($numGovernorate == 7){
                        $info[$numGovernorate]['meridian'] = '39.517736';
                        $info[$numGovernorate]['latitude'] = '30.259364';
                    }
                    elseif ($numGovernorate == 8){
                        $info[$numGovernorate]['meridian'] = '36.694311';
                        $info[$numGovernorate]['latitude'] = '28.323725';
                    }


                    $numGovernorate++;
                }
            }
            $this->SendSuccessData($info);
        } else {
            $this->SendMessage(-13, $this->lang->line('no_data_found'));
        }

    }

    public function GetFilters()
    {
        $this->load->model('Posts');
        $result = array();
        $resultCladding = $this->Posts->GetCladding();
        $resultTapu = $this->Posts->GetTapu();
        $resultProperties = $this->Posts->GetProperties();
        $resultType = $this->Posts->GetType();
        $resultOwnership = $this->Posts->GetOwnership();
        $governorates = $this->Posts->GetAllGovernorate();
        if ($resultCladding) {
            foreach ($resultCladding as $key => $value) {
                $result['cladding'][$key]['id'] = $value['pc_id'];
                if ($this->language) {
                    $result['cladding'][$key]['text'] = $value['pc_name_en'];
                } else {
                    $result['cladding'][$key]['text'] = $value['pc_name_ar'];
                }
            }
        }
        if ($resultTapu) {
            foreach ($resultTapu as $key => $value) {
                $result['tapu'][$key]['id'] = $value['pta_id'];
                if ($this->language) {
                    $result['tapu'][$key]['text'] = $value['pta_name_en'];
                } else {
                    $result['tapu'][$key]['text'] = $value['pta_name_ar'];
                }
            }
        }
        if ($resultProperties) {
            foreach ($resultProperties as $key => $value) {
                $result['properties'][$key]['id'] = $value['pp_id'];
                if ($this->language) {
                    $result['properties'][$key]['text'] = $value['pp_name_en'];
                } else {
                    $result['properties'][$key]['text'] = $value['pp_name_ar'];
                }
            }
        }
        if ($resultType) {
            foreach ($resultType as $key => $value) {
                $result['type'][$key]['id'] = $value['pt_id'];
                if ($this->language) {
                    $result['type'][$key]['text'] = $value['pt_name_en'];
                } else {
                    $result['type'][$key]['text'] = $value['pt_name_ar'];
                }
                $result['type'][$key]['image'] = 'https://www.akarcom.app/public/assetsFile/images/akarkom.svg';
            }
        }

        if ($resultOwnership) {
            foreach ($resultOwnership as $key => $value) {
                $result['ownership'][$key]['id'] = $value['po_id'];
                if ($this->language) {
                    $result['ownership'][$key]['text'] = $value['po_name_en'];
                    if ($value['po_id'] == '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3') {
                        $result['ownership'][$key]['period_time'] = array('1 Month', '3 Month', '6 Month', '12 Month');
                    }
                } else {
                    $result['ownership'][$key]['text'] = $value['po_name_ar'];
                    if ($value['po_id'] == '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3') {
                        $result['ownership'][$key]['period_time'] = array('شهر', '3 أشهر', '6 أشهر', '12 شهر');
                    }
                }
            }
        }
        if ($governorates) {
            $numGovernorate = 0;
            foreach ($governorates as $governorate) {
                if ($governorate['g_active'] == 1) {
                    $result['governorates'][$numGovernorate]['id'] = $governorate['g_id'];
                    if ($this->language) {
                        $result['governorates'][$numGovernorate]['name'] = $governorate['g_name_en'];
                    } else {
                        $result['governorates'][$numGovernorate]['name'] = $governorate['g_name_ar'];
                    }
                    $result['governorates'][$numGovernorate]['meridian'] = $governorate['g_meridian'];
                    $result['governorates'][$numGovernorate]['latitude'] = $governorate['g_latitude'];
                    $numGovernorate++;
                }
            }
        }

        $result['price'] = array(
            '5000', '6000', '7000', '8000', '9000', '10000', '11000', '12000', '13000', '14000', '15000', '16000', '17000', '18000', '19000', '20000', '21000', '22000', '23000', '24000', '25000', '26000', '27000', '28000', '29000',
            '30000', '31000', '32000', '33000', '34000', '35000', '36000', '37000', '38000', '39000', '40000', '41000', '42000', '43000', '44000', '45000', '46000', '47000', '48000', '49000', '50000', '55000', '60000', '65000',
            '70000', '75000', '80000', '85000', '90000', '95000', '100000', '110000', '120000', '130000', '140000', '150000', '160000', '170000', '180000', '190000', '200000', '225000', '250000', '275000', '300000',
            '325000', '350000', '375000', '400000', '425000', '450000', '475000', '500000', '550000', '600000', '650000', '700000', '750000', '800000', '850000', '900000', '950000', '1000000', '1100000', '1200000', '1300000',
            '1400000', '1500000', '1600000', '1700000', '1800000', '1900000', '2000000', '2100000', '2200000', '2300000', '2400000', '2500000', '2600000', '2700000', '2800000', '2900000', '3000000', '3100000', '3200000',
            '3300000', '3400000', '3500000', '3600000', '3700000', '3800000', '3900000', '4000000', '4100000', '4200000', '4300000', '4400000', '4500000', '4600000', '4700000', '4800000', '4900000', '5000000', '5100000',
            '5200000', '5300000', '5400000', '5500000', '5600000', '5700000', '5800000', '5900000', '6000000', '6100000', '6200000', '6300000', '6400000', '6500000', '6600000', '6700000', '6800000', '6900000', '7000000',
            '7100000', '7200000', '7300000', '7400000', '7500000', '7600000', '7700000', '7800000', '7900000', '8000000', '8100000', '8200000', '8300000', '8400000', '8500000', '8600000', '8700000', '8800000', '8900000',
            '9000000', '9100000', '9200000', '9300000', '9400000', '9500000', '9600000', '9700000', '9800000', '9900000', '10000000', '11000000', '12000000', '13000000', '14000000', '15000000', '16000000', '17000000',
            '18000000', '19000000', '20000000', '21000000', '22000000', '23000000', '24000000', '25000000', '26000000', '27000000', '28000000', '29000000', '30000000', '31000000', '32000000', '33000000', '34000000',
            '35000000', '36000000', '37000000', '38000000', '39000000', '40000000', '41000000', '42000000', '43000000', '44000000', '45000000', '46000000', '47000000', '48000000', '49000000', '50000000', '55000000',
            '60000000', '65000000', '70000000', '75000000', '80000000', '85000000', '90000000', '95000000', '100000000', '105000000', '110000000', '115000000', '120000000', '125000000', '130000000', '135000000',
            '140000000', '145000000', '150000000', '160000000', '161000000', '162000000', '163000000', '164000000', '165000000', '166000000', '167000000', '168000000', '169000000', '170000000', '171000000', '172000000',
            '173000000', '174000000', '175000000', '176000000', '177000000', '178000000', '179000000', '180000000', '181000000', '182000000', '183000000', '184000000', '185000000', '186000000', '187000000', '188000000',
            '189000000', '190000000', '191000000', '192000000', '193000000', '194000000', '195000000', '196000000', '197000000', '198000000', '199000000', '200000000', '201000000', '202000000', '203000000', '204000000',
            '205000000', '206000000', '207000000', '208000000', '209000000', '210000000', '211000000', '212000000', '213000000', '214000000', '215000000', '216000000', '217000000', '218000000', '219000000', '220000000',
            '221000000', '222000000', '223000000', '224000000', '225000000', '226000000', '227000000', '228000000', '229000000', '230000000', '231000000', '232000000', '233000000', '234000000', '235000000', '236000000',
            '237000000', '238000000', '239000000', '240000000', '241000000', '242000000', '243000000', '244000000', '245000000', '246000000', '247000000', '248000000', '249000000', '250000000', "∞"
        );

        $result['areaSpace'] = array('50', '55', '60', '65', '70', '75', '80', '85', '90', '100', '150', '200', '250', '∞');

        $this->SendSuccessData($result);
    }

    public function GetPosts()
    {
        $post[1] = array('GovernorateId');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $GovernorateId = $this->input->post('GovernorateId');
            $filter = $this->input->post('filter');
            $this->load->model('Posts');
            $Posts = $this->Posts->GetAllPosts($GovernorateId, $filter);
            $info = array();
            if ($Posts) {
                $numPost = 0;
                foreach ($Posts as $Post) {
                    if ($Post['p_active'] != 0 && $Post['p_active'] != 4) {
                        $info[$numPost]['id'] = $Post['p_id'];
                        if ($this->language) {
                            $info[$numPost]['address'] = $Post['p_address_en'];
                            $info[$numPost]['type'] = $Post['pt_name_en'];
                        } else {
                            $info[$numPost]['address'] = $Post['p_address_ar'];
                            $info[$numPost]['type'] = $Post['pt_name_ar'];
                        }
                        $info[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
                        $info[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
                        $info[$numPost]['areaSpace'] = $Post['p_areaSpace'];
                        $info[$numPost]['ownership']['id'] = $Post['po_id'];
                        $info[$numPost]['ownership']['name'] = $Post['po_name_ar'];
                        $info[$numPost]['price'] = $Post['por_price'];
                        $info[$numPost]['meridian'] = $Post['p_meridian'];
                        $info[$numPost]['latitude'] = $Post['p_latitude'];
                        $info[$numPost]['timestamp'] = $Post['p_timestamp'];
                        $info[$numPost]['numOfView'] = $Post['p_numOfView'];
                        if ($Post['p_active'] == 5){
                            $info[$numPost]['isSold'] = '1';
                        }else{
                            $info[$numPost]['isSold'] = '0';
                        }
                        $isFavorite = '0';
                        $userID = $this->input->post('userID');
                        if (isset($userID)) {
                            $Favorites = $this->Posts->GetFavorite($this->input->post('userID'));
                            foreach ($Favorites as $favorite) {
                                if ($favorite['uf_post_id'] == $Post['p_id']) {
                                    $isFavorite = '1';
                                }
                            }
                        }
                        $info[$numPost]['isFavorite'] = $isFavorite;
                        $images = $this->Posts->GetImagesOfPost($Post['p_id']);
                        if ($images) {
                            foreach ($images as $image) {
                                $info[$numPost]['image'] = base_url() .  $image['pi_image'];
                                break;
                            }
                        }else {
                            $info[$numPost]['image'] = base_url() .'public/images/no-photo.png';
                        }
                        $numPost++;
                    }
                }
                $this->SendSuccessData($info);
            } else {
                $this->SendMessage(-13, $this->lang->line('no_data_found'));
            }
        }
    }

    public function GetPost()
    {
        $post[1] = array('PostId');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $PostId = $this->input->post('PostId');
            $this->load->model('Posts');
            $this->load->model('UsersAuth');
            $Posts = $this->Posts->GetPost($PostId);
            $isFavorite = '0';
            $userID = $this->input->post('userID');
            if (isset($userID)) {
                $Favorites = $this->Posts->GetFavorite($this->input->post('userID'));
                foreach ($Favorites as $favorite) {
                    if ($favorite['uf_post_id'] == $PostId) {
                        $isFavorite = '1';
                    }
                }
            }
            $info = array();
            if ($Posts) {
                $numPost = 0;
                foreach ($Posts as $Post) {
                    if ($Post['p_active'] == 1) {
                        $info[$numPost]['id'] = $Post['p_id'];
                        if ($this->language) {
                            $info[$numPost]['description'] = $Post['p_description_en'];
                            $info[$numPost]['address'] = $Post['p_address_en'];
                            $info[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                            $info[$numPost]['typeOfProperty']['name'] = $Post['pp_name_en'];
                            $info[$numPost]['type']['id'] = $Post['pt_id'];
                            $info[$numPost]['type']['name'] = $Post['pt_name_en'];
                            $info[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                            $info[$numPost]['typeOfCladding']['name'] = $Post['pc_name_en'];
                        } else {
                            $info[$numPost]['description'] = $Post['p_description_ar'];
                            $info[$numPost]['address'] = $Post['p_address_ar'];
                            $info[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                            $info[$numPost]['typeOfProperty']['name'] = $Post['pp_name_ar'];
                            $info[$numPost]['type']['id'] = $Post['pt_id'];
                            $info[$numPost]['type']['name'] = $Post['pt_name_ar'];
                            $info[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                            $info[$numPost]['typeOfCladding']['name'] = $Post['pc_name_ar'];
                        }
                        $info[$numPost]['ownership']['id'] = $Post['po_id'];
                        $info[$numPost]['ownership']['name'] = $Post['po_name_ar'];
                        $info[$numPost]['ownership']['periodTime'] = $Post['por_period_time'];


                        $info[$numPost]['tapu']['id'] = $Post['pta_id'];
                        $info[$numPost]['tapu']['name'] = $Post['pta_name_ar'];
                        $info[$numPost]['furnished'] = $Post['p_furnished'];


                        $info[$numPost]['numOfView'] = $Post['p_numOfView'];

                        $info[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
                        $info[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
                        $info[$numPost]['areaSpace'] = $Post['p_areaSpace'];
                        $info[$numPost]['meridian'] = $Post['p_meridian'];
                        $info[$numPost]['latitude'] = $Post['p_latitude'];
                        $info[$numPost]['dateOfConstruction'] = $Post['p_dateOfConstruction'];
                        $info[$numPost]['isFavorite'] = $isFavorite;
                        if ($Post['p_user_id'] == $userID) {
                            $info[$numPost]['isOwner'] = '1';
                        } else {
                            $info[$numPost]['isOwner'] = '0';
                        }
                        $info[$numPost]['parking'] = $Post['p_parking'];
                        $info[$numPost]['priceOfMeter'] = $Post['p_priceOfMeter'];
                        $info[$numPost]['price'] = $Post['por_price'];
                        $info[$numPost]['floor'] = $Post['p_floor'];
                        $info[$numPost]['elevator'] = $Post['p_elevator'];
                        $info[$numPost]['interphone'] = $Post['p_interphone'];
                        $info[$numPost]['summer'] = $Post['p_summer'];
                        $info[$numPost]['winter'] = $Post['p_winter'];
                        $info[$numPost]['userPhone'] = $Post['p_gsm'];
                        $info[$numPost]['userName'] = $Post['p_userInfo'];
                        $info[$numPost]['timestamp'] = $Post['p_timestamp'];
                        if ($info[$numPost]['userName'] == null || $info[$numPost]['userPhone'] == null) {
                            $resultUser = $this->UsersAuth->getProfileUser($Post['p_user_id']);
                            if ($resultUser) {
                                foreach ($resultUser as $value) {
                                    $info[$numPost]['userName'] = $value['u_name'];
                                    $info[$numPost]['userPhone'] = $value['u_gsm'];
                                }
                            }
                        }
                        $images = $this->Posts->GetImagesOfPost($Post['p_id']);
                        if ($images) {
                            $num = 0;
                            foreach ($images as $image) {
                                $info[$numPost]['images'][$num] = base_url() . $image['pi_image'];
                                $num++;
                            }
                        }else {
                            $info[$numPost]['images'][0] = base_url() .'public/images/no-photo.png';
                        }
                        $numPost++;
                    }
                }
                $this->SendSuccessData($info);
            } else {
                $this->SendMessage(-13, $this->lang->line('no_data_found'));
            }
        }
    }

    public function AddToFavorite()
    {
        $post[1] = array('PostId');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $PostId = $this->input->post('PostId');
            $this->load->model('Posts');
            $this->Posts->AddToFavorite($this->guid(), $this->input->post('userID'), $PostId);
            $this->SuccessData();
        }
    }

    public function RemovedFromFavorites()
    {
        $post[1] = array('PostId');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $PostId = $this->input->post('PostId');
            $this->load->model('Posts');
            $this->Posts->RemovedFromFavorites($this->input->post('userID'), $PostId);
            $this->SuccessData();
        }
    }

    public function NearMe()
    {
        $post[1] = array('latitude', 'meridian');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $latitude = $this->input->post('latitude');
            $meridian = $this->input->post('meridian');
            $this->load->model('Posts');
            $Posts = $this->Posts->GetPostsNearMe($latitude, $meridian);
            $info = array();
            if ($Posts) {
                $numPost = 0;
                foreach ($Posts as $Post) {
                    if ($Post['p_active'] == 1) {
                        $info[$numPost]['id'] = $Post['p_id'];
                        if ($this->language) {
                            $info[$numPost]['description'] = $Post['p_description_en'];
                            $info[$numPost]['address'] = $Post['p_address_en'];
                            $info[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                            $info[$numPost]['typeOfProperty']['name'] = $Post['pp_name_en'];
                            $info[$numPost]['type'] = $Post['pt_name_en'];
                            $info[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                            $info[$numPost]['typeOfCladding']['name'] = $Post['pc_name_en'];
                        } else {
                            $info[$numPost]['description'] = $Post['p_description_ar'];
                            $info[$numPost]['address'] = $Post['p_address_ar'];
                            $info[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                            $info[$numPost]['typeOfProperty']['name'] = $Post['pp_name_ar'];
                            $info[$numPost]['type'] = $Post['pt_name_ar'];
                            $info[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                            $info[$numPost]['typeOfCladding']['name'] = $Post['pc_name_ar'];
                        }
                        $info[$numPost]['tapu']['id'] = $Post['pta_id'];
                        $info[$numPost]['tapu']['name'] = $Post['pta_name_ar'];
                        $info[$numPost]['furnished'] = $Post['p_furnished'];
                        $info[$numPost]['ownership']['id'] = @$Post['po_id'];
                        $info[$numPost]['ownership']['name'] = @$Post['po_name_ar'];
                        $info[$numPost]['ownership']['periodTime'] = @$Post['por_period_time'];
                        $info[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
                        $info[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
                        $info[$numPost]['areaSpace'] = $Post['p_areaSpace'];
                        $info[$numPost]['meridian'] = $Post['p_meridian'];
                        $info[$numPost]['latitude'] = $Post['p_latitude'];
                        $info[$numPost]['dateOfConstruction'] = $Post['p_dateOfConstruction'];
                        $info[$numPost]['parking'] = $Post['p_parking'];
                        $info[$numPost]['priceOfMeter'] = $Post['p_priceOfMeter'];
                        $info[$numPost]['price'] = $Post['por_price'];
                        $info[$numPost]['floor'] = $Post['p_floor'];
                        $info[$numPost]['elevator'] = $Post['p_elevator'];
                        $info[$numPost]['interphone'] = $Post['p_interphone'];
                        $info[$numPost]['summer'] = $Post['p_summer'];
                        $info[$numPost]['winter'] = $Post['p_winter'];
                        $info[$numPost]['timestamp'] = $Post['p_timestamp'];
                        $info[$numPost]['numOfView'] = $Post['p_numOfView'];
                        $isFavorite = '0';
                        $userID = $this->input->post('userID');
                        if (isset($userID)) {
                            $Favorites = $this->Posts->GetFavorite($this->input->post('userID'));
                            foreach ($Favorites as $favorite) {
                                if ($favorite['uf_post_id'] == $Post['p_id']) {
                                    $isFavorite = '1';
                                }
                            }
                        }
                        $info[$numPost]['isFavorite'] = $isFavorite;
                        if ($Post['p_active'] == 5){
                            $info[$numPost]['isSold'] = '1';
                        }else{
                            $info[$numPost]['isSold'] = '0';
                        }
                        $images = $this->Posts->GetImagesOfPost($Post['p_id']);
                        if ($images) {
                            foreach ($images as $image) {
                                $info[$numPost]['image'] = base_url() . $image['pi_image'];
                                break;
                            }
                        }else {
                            $info[$numPost]['image'] = base_url() .'public/images/no-photo.png';
                        }
                        $numPost++;
                    }
                }
                $this->SendSuccessData($info);
            } else {
                $this->SendMessage(-13, $this->lang->line('no_data_found'));
            }
        }
    }

    public function SetPost()
    {
        $post[1] = array('Ownership', 'PeriodTime', 'PathOfPhotos', 'Type', 'AddressAr', 'AddressEn', 'DescriptionAr', 'DescriptionEn', 'Governorate', 'NumOfRooms', 'NumOfBathRooms', 'AreaSpace', 'meridian', 'latitude',
            'TypeOfProperty', 'DateOfConstruction', 'Parking', 'PriceOfMeter', 'Floor', 'Elevator', 'Furnished', 'TypeOfCladding', 'Interphone', 'Summer', 'Winter');
        if ($this->checkIsSetPost($post[1])) {
            $this->load->model('Posts');
            $session = $this->input->post('session');
            $PeriodTime = $this->input->post('PeriodTime');
            $Ownership = $this->input->post('Ownership');
            $idOwnershipRelation = $this->guid();
            $idPost = $this->guid();
            $Type = $this->input->post('Type');
            $DescriptionEn = $this->input->post('DescriptionEn');
            $DescriptionAr = $this->input->post('DescriptionAr');
            $AddressEn = $this->input->post('AddressEn');
            $AddressAr = $this->input->post('AddressAr');
            $NumOfRooms = $this->input->post('NumOfRooms');
            $NumOfBathRooms = $this->input->post('NumOfBathRooms');
            $AreaSpace = $this->input->post('AreaSpace');
            $meridian = $this->input->post('meridian');
            $latitude = $this->input->post('latitude');
            $TypeOfProperty = $this->input->post('TypeOfProperty');
            $DateOfConstruction = $this->input->post('DateOfConstruction');
            $Parking = $this->input->post('Parking');
            $PriceOfMeter = $this->input->post('PriceOfMeter');
            $Floor = $this->input->post('Floor');
            $Elevator = $this->input->post('Elevator');
            $TypeOfCladding = $this->input->post('TypeOfCladding');
            $Furnished = $this->input->post('Furnished');
            $Interphone = $this->input->post('Interphone');
            $Summer = $this->input->post('Summer');
            $Winter = $this->input->post('Winter');
            $userID = $this->input->post('userID');
            $Governorate = $this->input->post('Governorate');
            $tabu = $this->input->post('tapu');
            $PathOfPhotos = $this->input->post('PathOfPhotos');
            $active = 1;
            $this->Posts->SetPost($session, $PeriodTime, $Ownership, $idOwnershipRelation, $idPost, $Type, $DescriptionEn, $DescriptionAr, $AddressEn, $AddressAr, $NumOfRooms,
                $NumOfBathRooms, $AreaSpace, $meridian, $latitude, $TypeOfProperty, $DateOfConstruction, $Parking, $PriceOfMeter, $Floor, $Elevator, $TypeOfCladding,
                $Furnished, $Interphone, $Summer, $Winter, $userID, $Governorate, $tabu, $active);
            foreach ($PathOfPhotos as $key => $pathOfPhoto) {
                if ($key == 0) {
                    $this->Posts->SetImages($session, $this->guid(), $idPost, 1, $pathOfPhoto);
                } else {
                    $this->Posts->SetImages($session, $this->guid(), $idPost, 0, $pathOfPhoto);
                }
            }
        }
        $info['id'] = $idPost;
        $this->SendSuccessData($info);
    }

    public function InitializedPost()
    {
        $this->load->model('Posts');
        $result = array();
        $resultCladding = $this->Posts->GetCladding();
        $resultTapu = $this->Posts->GetTapu();
        $resultProperties = $this->Posts->GetProperties();
        $resultType = $this->Posts->GetType();
        $resultOwnership = $this->Posts->GetOwnership();
        $governorates = $this->Posts->GetAllGovernorate();
        if ($resultCladding) {
            foreach ($resultCladding as $key => $value) {
                $result['cladding'][$key]['id'] = $value['pc_id'];
                if ($this->language) {
                    $result['cladding'][$key]['text'] = $value['pc_name_en'];
                } else {
                    $result['cladding'][$key]['text'] = $value['pc_name_ar'];
                }
            }
        }
        if ($resultTapu) {
            foreach ($resultTapu as $key => $value) {
                $result['tapu'][$key]['id'] = $value['pta_id'];
                if ($this->language) {
                    $result['tapu'][$key]['text'] = $value['pta_name_en'];
                } else {
                    $result['tapu'][$key]['text'] = $value['pta_name_ar'];
                }
            }
        }
        if ($resultProperties) {
            foreach ($resultProperties as $key => $value) {
                $result['properties'][$key]['id'] = $value['pp_id'];
                if ($this->language) {
                    $result['properties'][$key]['text'] = $value['pp_name_en'];
                } else {
                    $result['properties'][$key]['text'] = $value['pp_name_ar'];
                }
            }
        }
        if ($resultType) {
            foreach ($resultType as $key => $value) {
                $result['type'][$key]['id'] = $value['pt_id'];
                if ($this->language) {
                    $result['type'][$key]['text'] = $value['pt_name_en'];
                } else {
                    $result['type'][$key]['text'] = $value['pt_name_ar'];
                }
            }
        }

        if ($resultOwnership) {
            foreach ($resultOwnership as $key => $value) {
                $result['ownership'][$key]['id'] = $value['po_id'];
                if ($this->language) {
                    $result['ownership'][$key]['text'] = $value['po_name_en'];
                    if ($value['po_id'] == '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3') {
                        $result['ownership'][$key]['period_time'] = array('1 Month', '3 Month', '6 Month', '12 Month');
                    }
                } else {
                    $result['ownership'][$key]['text'] = $value['po_name_ar'];
                    if ($value['po_id'] == '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3') {
                        $result['ownership'][$key]['period_time'] = array('شهر', '3 أشهر', '6 أشهر', '12 شهر');
                    }
                }
            }
        }
        if ($governorates) {
            $numGovernorate = 0;
            foreach ($governorates as $governorate) {
                if ($governorate['g_active'] == 1) {
                    $result['governorates'][$numGovernorate]['id'] = $governorate['g_id'];
                    if ($this->language) {
                        $result['governorates'][$numGovernorate]['name'] = $governorate['g_name_en'];
                    } else {
                        $result['governorates'][$numGovernorate]['name'] = $governorate['g_name_ar'];
                    }
                    $numGovernorate++;
                }
            }
        }
        $this->SendSuccessData($result);
    }

    public function SetPostPhotos()
    {
        if (isset($_FILES['Photo'])) {
            if (!is_array($_FILES["Photo"]["name"])) {
                $data = array();
                $allowedExts = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
                $temp = explode(".", $_FILES["Photo"]["name"]);
                $extension = end($temp);
                if (in_array($extension, $allowedExts)) {
                    $id = $this->guid();
                    while (file_exists('./public/images/products/' . $id . '.' . $extension)) {
                        $id = $this->guid();
                    }
                    $path = './public/images/products/' . $id . '.' . $extension;
//                        var_dump(move_uploaded_file($_FILES['Photo']['tmp_name'], $path));exit;
                    if (move_uploaded_file($_FILES['Photo']['tmp_name'], $path)) {
                        array_push($data, $path);
                    } else {
                        $this->SendMessage('-301', 'cannot moved images');
                    }
                }
                $this->SendSuccessData($data);
            } else {
                $paths = array();
                $allowedExts = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
                if (is_array($_FILES["Photo"]["name"])) {
                    foreach ($_FILES["Photo"]["name"] as $key => $value) {
                        $temp = explode(".", $value);
                        $extension = end($temp);
                        if (in_array($extension, $allowedExts)) {
                            $id = $this->guid();
                            while (file_exists('./public/images/products/' . $id . '.' . $extension)) {
                                $id = $this->guid();
                            }
                            $path = './public/images/products/' . $id . '.' . $extension;
                            if (move_uploaded_file($_FILES['Photo']['tmp_name'][$key], $path)) {
                                array_push($paths, $path);
                            } else {
                                $this->SendMessage('-301', 'cannot moved images');
                            }
                        } else {
                            $this->SendMessage('-302', 'extension not allowed!');
                        }
                    }
                    $this->SendSuccessData($paths);
                } else {
                    $this->SendMessage('-303', 'photo must be array!');
                }
            }
        } else {
            $this->MissingData();
        }
    }

    public function MyPost()
    {
        $post[1] = array('userID');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $this->load->model('Posts');
            $userID = $this->input->post('userID');
            $Posts = $this->Posts->GetPostByUser($userID);
            $info = array();
            if ($Posts) {
                $numPost = 0;
                foreach ($Posts as $Post) {
                    if ($Post['p_active'] == 1) {
                        $info[$numPost]['id'] = $Post['p_id'];
                        if ($this->language) {
                            $info[$numPost]['description'] = $Post['p_description_en'];
                            $info[$numPost]['address'] = $Post['p_address_en'];
                            $info[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                            $info[$numPost]['typeOfProperty']['name'] = $Post['pp_name_en'];
                            $info[$numPost]['type'] = $Post['pt_name_en'];
                            $info[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                            $info[$numPost]['typeOfCladding']['name'] = $Post['pc_name_en'];
                        } else {
                            $info[$numPost]['description'] = $Post['p_description_ar'];
                            $info[$numPost]['address'] = $Post['p_address_ar'];
                            $info[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                            $info[$numPost]['typeOfProperty']['name'] = $Post['pp_name_ar'];
                            $info[$numPost]['type'] = $Post['pt_name_ar'];
                            $info[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                            $info[$numPost]['typeOfCladding']['name'] = $Post['pc_name_ar'];
                        }
                        $info[$numPost]['ownership']['id'] = $Post['po_id'];
                        $info[$numPost]['ownership']['name'] = $Post['po_name_ar'];
                        $info[$numPost]['ownership']['periodTime'] = $Post['por_period_time'];
                        $info[$numPost]['tapu']['id'] = $Post['pta_id'];
                        $info[$numPost]['tapu']['name'] = $Post['pta_name_ar'];
                        $info[$numPost]['furnished'] = $Post['p_furnished'];

                        $info[$numPost]['numOfView'] = $Post['p_numOfView'];
                        $info[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
                        $info[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
                        $info[$numPost]['areaSpace'] = $Post['p_areaSpace'];
                        $info[$numPost]['meridian'] = $Post['p_meridian'];
                        $info[$numPost]['latitude'] = $Post['p_latitude'];
                        $info[$numPost]['dateOfConstruction'] = $Post['p_dateOfConstruction'];
                        $info[$numPost]['isFavorite'] = '0';
                        $info[$numPost]['parking'] = $Post['p_parking'];
                        $info[$numPost]['priceOfMeter'] = $Post['p_priceOfMeter'];
                        $info[$numPost]['price'] = $Post['por_price'];
                        $info[$numPost]['floor'] = $Post['p_floor'];
                        $info[$numPost]['elevator'] = $Post['p_elevator'];
                        $info[$numPost]['interphone'] = $Post['p_interphone'];
                        $info[$numPost]['summer'] = $Post['p_summer'];
                        $info[$numPost]['winter'] = $Post['p_winter'];
                        $info[$numPost]['timestamp'] = $Post['p_timestamp'];
                        $isFavorite = '0';
                        $userID = $this->input->post('userID');
                        if (isset($userID)) {
                            $Favorites = $this->Posts->GetFavorite($this->input->post('userID'));
                            foreach ($Favorites as $favorite) {
                                if ($favorite['uf_post_id'] == $Post['p_id']) {
                                    $isFavorite = '1';
                                }
                            }
                        }
                        $info[$numPost]['isFavorite'] = $isFavorite;
                        $images = $this->Posts->GetImagesOfPost($Post['p_id']);
                        if ($images) {
                            $info[$numPost]['image'] = base_url() .'public/images/no-photo.png';
                        }else {
                            $info[$numPost]['image'] = base_url() .'public/images/no-photo.png';
                        }
                        $numPost++;
                    }
                }
                $this->SendSuccessData($info);
            } else {
                $this->SendMessage(-13, $this->lang->line('no_data_found'));
            }
        }
    }

    public function DeletePost()
    {
        $post[1] = array('PostId');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $PostId = $this->input->post('PostId');
            $this->load->model('Posts');
            $this->Posts->RemovedPosts($this->input->post('userID'), $PostId);
            $this->SuccessData();
        }
    }

    public function SoldPost()
    {
        $post[1] = array('PostId');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $PostId = $this->input->post('PostId');
            $this->load->model('Posts');
            $this->Posts->SoldPost($this->input->post('userID'), $PostId);
            $this->SuccessData();
        }
    }

    public function EditPost()
    {
        $post[1] = array('idPost', 'Ownership', 'PeriodTime', 'PathOfPhotos', 'Type', 'AddressAr', 'AddressEn', 'DescriptionAr', 'DescriptionEn', 'Governorate', 'NumOfRooms', 'NumOfBathRooms', 'AreaSpace', 'meridian', 'latitude',
            'TypeOfProperty', 'DateOfConstruction', 'Parking', 'PriceOfMeter', 'Floor', 'Elevator', 'Furnished', 'TypeOfCladding', 'Interphone', 'Summer', 'Winter');
        if ($this->checkIsSetPost($post[1])) {
            $this->load->model('Posts');
            $session = $this->input->post('session');
            $PeriodTime = $this->input->post('PeriodTime');
            $Ownership = $this->input->post('Ownership');
            $idPost = $this->input->post('idPost');
            $Type = $this->input->post('Type');
            $DescriptionEn = $this->input->post('DescriptionEn');
            $DescriptionAr = $this->input->post('DescriptionAr');
            $AddressEn = $this->input->post('AddressEn');
            $AddressAr = $this->input->post('AddressAr');
            $NumOfRooms = $this->input->post('NumOfRooms');
            $NumOfBathRooms = $this->input->post('NumOfBathRooms');
            $AreaSpace = $this->input->post('AreaSpace');
            $meridian = $this->input->post('meridian');
            $latitude = $this->input->post('latitude');
            $TypeOfProperty = $this->input->post('TypeOfProperty');
            $DateOfConstruction = $this->input->post('DateOfConstruction');
            $Parking = $this->input->post('Parking');
            $PriceOfMeter = $this->input->post('PriceOfMeter');
            $Floor = $this->input->post('Floor');
            $Elevator = $this->input->post('Elevator');
            $TypeOfCladding = $this->input->post('TypeOfCladding');
            $Furnished = $this->input->post('Furnished');
            $Interphone = $this->input->post('Interphone');
            $Summer = $this->input->post('Summer');
            $Winter = $this->input->post('Winter');
            $userID = $this->input->post('userID');
            $Governorate = $this->input->post('Governorate');
            $tabu = $this->input->post('tapu');
            $PathOfPhotos = $this->input->post('PathOfPhotos');
            $active = 1;
            $this->Posts->updatePost($session, $PeriodTime, $Ownership, $idPost, $Type, $DescriptionEn, $DescriptionAr, $AddressEn, $AddressAr, $NumOfRooms,
                $NumOfBathRooms, $AreaSpace, $meridian, $latitude, $TypeOfProperty, $DateOfConstruction, $Parking, $PriceOfMeter, $Floor, $Elevator, $TypeOfCladding,
                $Furnished, $Interphone, $Summer, $Winter, $userID, $Governorate, $tabu, $active);
            foreach ($PathOfPhotos as $key => $pathOfPhoto) {
                if ($key == 0) {
                    $this->Posts->SetImages($session, $this->guid(), $idPost, 1, $pathOfPhoto);
                } else {
                    $this->Posts->SetImages($session, $this->guid(), $idPost, 0, $pathOfPhoto);
                }
            }
        }
        $info['id'] = $idPost;
        $this->SendSuccessData($info);
    }

    public function TodayPost()
    {
        $this->load->model('Posts');
        $Posts = $this->Posts->GetAllPostsToday();
        $info = array();
        if ($Posts) {
            $numPost = 0;
            foreach ($Posts as $Post) {
                if ($Post['p_active'] == 1) {
                    $info[$numPost]['id'] = $Post['p_id'];
                    if ($this->language) {
                        $info[$numPost]['address'] = $Post['p_address_en'];
                        $info[$numPost]['type'] = $Post['pt_name_en'];
                    } else {
                        $info[$numPost]['address'] = $Post['p_address_ar'];
                        $info[$numPost]['type'] = $Post['pt_name_ar'];
                    }
                    $info[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
                    $info[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
                    $info[$numPost]['areaSpace'] = $Post['p_areaSpace'];
                    $info[$numPost]['ownership']['id'] = $Post['po_id'];
                    $info[$numPost]['ownership']['name'] = $Post['po_name_ar'];
                    $info[$numPost]['price'] = $Post['por_price'];
                    $info[$numPost]['meridian'] = $Post['p_meridian'];
                    $info[$numPost]['latitude'] = $Post['p_latitude'];
                    $info[$numPost]['timestamp'] = $Post['p_timestamp'];
                    $info[$numPost]['numOfView'] = $Post['p_numOfView'];
                    if ($Post['p_active'] == 5){
                        $info[$numPost]['isSold'] = '1';
                    }else{
                        $info[$numPost]['isSold'] = '0';
                    }
                    $isFavorite = '0';
                    $userID = $this->input->post('userID');
                    if (isset($userID)) {
                        $Favorites = $this->Posts->GetFavorite($this->input->post('userID'));
                        foreach ($Favorites as $favorite) {
                            if ($favorite['uf_post_id'] == $Post['p_id']) {
                                $isFavorite = '1';
                            }
                        }
                    }
                    $info[$numPost]['isFavorite'] = $isFavorite;
                    $images = $this->Posts->GetImagesOfPost($Post['p_id']);
                    if ($images) {
                        foreach ($images as $image) {
                            $info[$numPost]['image'] = base_url() .  $image['pi_image'];
                            break;
                        }
                    }else {
                        $info[$numPost]['image'] = base_url() .'public/images/no-photo.png';
                    }
                    $numPost++;
                }
            }
            $this->SendSuccessData($info);
        } else {
            $this->SendMessage(-13, $this->lang->line('no_data_found'));
        }
    }

    public function MyFavorite()
    {
        $post[1] = array('userID');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $this->load->model('Posts');
            $userID = $this->input->post('userID');
            $Posts = $this->Posts->GetFavorite($userID);
            $info = array();
            if ($Posts) {
                $numPost = 0;
                foreach ($Posts as $Post) {
                    if ($Post['p_active'] == 1) {
                        $info[$numPost]['id'] = $Post['p_id'];
                        if ($this->language) {
                            $info[$numPost]['description'] = $Post['p_description_en'];
                            $info[$numPost]['address'] = $Post['p_address_en'];
                            $info[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                            $info[$numPost]['typeOfProperty']['name'] = $Post['pp_name_en'];
                            $info[$numPost]['type'] = $Post['pt_name_en'];
                            $info[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                            $info[$numPost]['typeOfCladding']['name'] = $Post['pc_name_en'];
                        } else {
                            $info[$numPost]['description'] = $Post['p_description_ar'];
                            $info[$numPost]['address'] = $Post['p_address_ar'];
                            $info[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                            $info[$numPost]['typeOfProperty']['name'] = $Post['pp_name_ar'];
                            $info[$numPost]['type'] = $Post['pt_name_ar'];
                            $info[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                            $info[$numPost]['typeOfCladding']['name'] = $Post['pc_name_ar'];
                        }
                        $info[$numPost]['ownership']['id'] = $Post['po_id'];
                        $info[$numPost]['ownership']['name'] = $Post['po_name_ar'];

                        $info[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
                        $info[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
                        $info[$numPost]['areaSpace'] = $Post['p_areaSpace'];
                        $info[$numPost]['meridian'] = $Post['p_meridian'];
                        $info[$numPost]['latitude'] = $Post['p_latitude'];
                        $info[$numPost]['dateOfConstruction'] = $Post['p_dateOfConstruction'];
                        $info[$numPost]['isFavorite'] = '1';
                        $info[$numPost]['parking'] = $Post['p_parking'];
                        $info[$numPost]['priceOfMeter'] = $Post['p_priceOfMeter'];
                        $info[$numPost]['price'] = $Post['por_price'];
                        $info[$numPost]['floor'] = $Post['p_floor'];
                        $info[$numPost]['elevator'] = $Post['p_elevator'];
                        $info[$numPost]['interphone'] = $Post['p_interphone'];
                        $info[$numPost]['summer'] = $Post['p_summer'];
                        $info[$numPost]['winter'] = $Post['p_winter'];
                        $info[$numPost]['timestamp'] = $Post['p_timestamp'];
                        $images = $this->Posts->GetImagesOfPost($Post['p_id']);
                        if ($images) {
                            $info[$numPost]['image'] = base_url() .'public/images/no-photo.png';
                        }else {
                            $info[$numPost]['image'] = base_url() .'public/images/no-photo.png';
                        }
                        $numPost++;
                    }
                }
                $this->SendSuccessData($info);
            } else {
                $this->SendMessage(-13, $this->lang->line('no_data_found'));
            }
        }
    }

    public function AboutUs()
    {
        $info['text'] = 'هل تريد شراء عقار بسعر مناسب و مواصفات معينه, هل ترغب بيع عقارك دون الحاجة لمكاتب العقارات نحن نقدم لك هذه الخدمات وبسرعة قياسية.';
        $info['text'] .= 'وفر نقودك وخدمة سريعة
نحن فريق يستطيع تقديم تسويق الكتروني بطريقة حرفية لتأمين جميع متطلباتك وتأمين ما تحتاج دون الذهاب للمكاتب العقارات دون ان تدفع تكاليف إضافيه.';
        $this->SendSuccessData($info);
    }
}