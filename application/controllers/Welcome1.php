<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function guid()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->lang->load('api', 'arabic');
        $this->session->set_userdata('lang', false);

//        if ($this->session->userdata('lang') === true && !(isset($_GET['lang']) && $_GET['lang'] == 'ar')) {
//            $this->lang->load('api', 'english');
//            $this->session->set_userdata('lang', true);
//        }else{
//            if (isset($_GET['lang']) && $_GET['lang'] == 'en'){
//                $this->lang->load('api', 'english');
//                $this->session->set_userdata('lang', true);
//            }else{
//                $this->lang->load('api', 'arabic');
//                $this->session->set_userdata('lang', false);
//            }
//        }

    }

    public function index()
    {
        $this->load->model('Posts');
        $GovernorateId = '7A742620-3E3C-46FC-8136-4D32EB27174F';
//        $Posts = $this->Posts->GetAllPosts($GovernorateId);
//        $info = array();
//        if ($Posts) {
//            $numPost = 0;
//            foreach ($Posts as $Post) {
//                if ($Post['p_active'] == 1) {
//                    $info[$numPost]['id'] = $Post['p_id'];
//                    if ($this->session->userdata('lang')) {
//                        $info[$numPost]['description'] = $Post['p_description_en'];
//                        $info[$numPost]['address'] = $Post['p_address_en'];
//                        $info[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
//                        $info[$numPost]['typeOfProperty']['name'] = $Post['pp_name_en'];
//                        $info[$numPost]['type']['id'] = $Post['pt_id'];
//                        $info[$numPost]['type']['name'] = $Post['pt_name_en'];
//                        $info[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
//                        $info[$numPost]['typeOfCladding']['name'] = $Post['pc_name_en'];
//                    } else {
//                        $info[$numPost]['description'] = $Post['p_description_ar'];
//                        $info[$numPost]['address'] = $Post['p_address_ar'];
//                        $info[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
//                        $info[$numPost]['typeOfProperty']['name'] = $Post['pp_name_ar'];
//                        $info[$numPost]['type']['id'] = $Post['pt_id'];
//                        $info[$numPost]['type']['name'] = $Post['pt_name_ar'];
//                        $info[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
//                        $info[$numPost]['typeOfCladding']['name'] = $Post['pc_name_ar'];
//                    }
//                    $info[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
//                    $info[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
//                    $info[$numPost]['areaSpace'] = $Post['p_areaSpace'];
//                    $info[$numPost]['meridian'] = $Post['p_meridian'];
//                    $info[$numPost]['latitude'] = $Post['p_latitude'];
//                    $info[$numPost]['dateOfConstruction'] = $Post['p_dateOfConstruction'];
//                    $info[$numPost]['priceOfMeter'] = $Post['p_priceOfMeter'];
//                    $info[$numPost]['floor'] = $Post['p_floor'];
//                    $info[$numPost]['parking'] = $Post['p_parking'] == '1' ? 'true' : 'false';
//                    $info[$numPost]['elevator'] = $Post['p_elevator'] == '1' ? 'true' : 'false';
//                    $info[$numPost]['interphone'] = $Post['p_interphone'] == '1' ? 'true' : 'false';
//                    $info[$numPost]['summer'] = $Post['p_summer'];
//                    $info[$numPost]['winter'] = $Post['p_winter'];
//                    $info[$numPost]['governorate'] = $Post['g_name_ar'];
//                    $info[$numPost]['timestamp'] = $Post['p_timestamp'];
//                    $numPost++;
//                }
//            }
//        }
//        $data['posts'] = $info;




        $ids = array();
        if ($_POST){
            $Posts = $this->Posts->GetAllPosts($GovernorateId,$this->input->post());
            $cladding = $this->input->post('cladding');
            $tapu = $this->input->post('tapu');
            $properties = $this->input->post('properties');
            $type = $this->input->post('type');
            $ownership = $this->input->post('ownership');
            $governorates = $this->input->post('governorates');
            if (isset($governorates)){
                foreach ($governorates as $value){
                    array_push($ids,$value);
                }
            }
            if (isset($ownership)){
                foreach ($ownership as $value){
                    array_push($ids,$value);
                }
            }
            if (isset($type)){
                foreach ($type as $value){
                    array_push($ids,$value);
                }
            }
            if (isset($tapu)){
                foreach ($tapu as  $value){
                    array_push($ids,$value);
                }
            }
            if (isset($cladding)){
                foreach ($cladding as  $value){
                    array_push($ids,$value);
                }
            }
            if (isset($properties)){
                foreach ($properties as $value){
                    array_push($ids,$value);
                }
            }
        }else{
            $Posts = $this->Posts->GetAllPosts($GovernorateId);
        }
        $infor = array();
        if ($Posts) {
            $numPost = 0;
            foreach ($Posts as $Post) {
                if ($Post['p_active'] == 1) {
                    $infor[$numPost]['id'] = $Post['p_id'];
                    if ($this->session->userdata('lang')) {
                        $infor[$numPost]['description'] = $Post['p_description_en'];
                        $infor[$numPost]['address'] = $Post['p_address_en'];
                        $infor[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                        $infor[$numPost]['typeOfProperty']['name'] = $Post['pp_name_en'];
                        $infor[$numPost]['type']['id'] = $Post['pt_id'];
                        $infor[$numPost]['type']['name'] = $Post['pt_name_en'];
                        $infor[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                        $infor[$numPost]['typeOfCladding']['name'] = $Post['pc_name_en'];
                    } else {
                        $infor[$numPost]['description'] = $Post['p_description_ar'];
                        $infor[$numPost]['address'] = $Post['p_address_ar'];
                        $infor[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                        $infor[$numPost]['typeOfProperty']['name'] = $Post['pp_name_ar'];
                        $infor[$numPost]['type']['id'] = $Post['pt_id'];
                        $infor[$numPost]['type']['name'] = $Post['pt_name_ar'];
                        $infor[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                        $infor[$numPost]['typeOfCladding']['name'] = $Post['pc_name_ar'];
                    }
                    $infor[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
                    $infor[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
                    $infor[$numPost]['areaSpace'] = $Post['p_areaSpace'];
                    $infor[$numPost]['meridian'] = $Post['p_meridian'];
                    $infor[$numPost]['latitude'] = $Post['p_latitude'];
                    $infor[$numPost]['dateOfConstruction'] = $Post['p_dateOfConstruction'];
                    $infor[$numPost]['priceOfMeter'] = $Post['p_priceOfMeter'];
                    $infor[$numPost]['floor'] = $Post['p_floor'];
                    $infor[$numPost]['parking'] = $Post['p_parking'] == '1' ? 'true' : 'false';
                    $infor[$numPost]['elevator'] = $Post['p_elevator'] == '1' ? 'true' : 'false';
                    $infor[$numPost]['interphone'] = $Post['p_interphone'] == '1' ? 'true' : 'false';
                    $infor[$numPost]['summer'] = $Post['p_summer'];
                    $infor[$numPost]['winter'] = $Post['p_winter'];
                    $info[$numPost]['governorate'] = $Post['g_name_ar'];
                    $infor[$numPost]['timestamp'] = $Post['p_timestamp'];
                    $numPost++;
                }
            }
        }else{
            $infor = $this->lang->line('NoResult');
        }
        $data['posts'] = $infor;
        $data['ids'] = $ids;
        $data['data'] = $this->InitializedPost();
        $this->load->view('home', $data);
    }

    public function productDetails($id)
    {
        $PostId = $id;
        $this->load->model('Posts');
        $Posts = $this->Posts->GetPost($PostId);
        $info = array();
        if ($Posts) {
            $numPost = 0;
            foreach ($Posts as $Post) {
                if ($Post['p_active'] == 1) {
                    $info[$numPost]['id'] = $Post['p_id'];
                    if ($this->session->userdata('lang')) {
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
                    $info[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
                    $info[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
                    $info[$numPost]['areaSpace'] = $Post['p_areaSpace'];
                    $info[$numPost]['meridian'] = $Post['p_meridian'];
                    $info[$numPost]['latitude'] = $Post['p_latitude'];
                    $info[$numPost]['dateOfConstruction'] = $Post['p_dateOfConstruction'];
                    $info[$numPost]['priceOfMeter'] = $Post['p_priceOfMeter'];
                    $info[$numPost]['floor'] = $Post['p_floor'];
                    $info[$numPost]['parking'] = $Post['p_parking'] == '1' ? 'true' : 'false';
                    $info[$numPost]['elevator'] = $Post['p_elevator'] == '1' ? 'true' : 'false';
                    $info[$numPost]['interphone'] = $Post['p_interphone'] == '1' ? 'true' : 'false';
                    $info[$numPost]['summer'] = $Post['p_summer'];
                    $info[$numPost]['winter'] = $Post['p_winter'];
                    $info[$numPost]['timestamp'] = $Post['p_timestamp'];
                    $info[$numPost]['name'] = $Post['p_userInfo'];
                    $info[$numPost]['gsm'] = $Post['p_gsm'];
                    $info[$numPost]['governorate'] = $Post['g_name_ar'];
                    $images = $this->Posts->GetImagesOfPost($Post['p_id']);
//                    var_dump($images);exit;
                    if ($images){
                        $num = 0;
                        foreach ($images as $image){
                            $info[$numPost]['images'][$num] = base_url() . 'public/images/'. $image['pi_image'];
                            $num++;
                        }
                    }
                    $numPost++;
                }
            }
        }
        $data['post1'] = $info;
//        var_dump($data['post1']);exit;

        $GovernorateId = '7A742620-3E3C-46FC-8136-4D32EB27174F';
        $Posts = $this->Posts->GetAllPosts($GovernorateId);
        $infor = array();
        if ($Posts) {
            $numPost = 0;
            foreach ($Posts as $Post) {
                if ($Post['p_active'] == 1 && $Post['p_id'] != $id) {
                    $infor[$numPost]['id'] = $Post['p_id'];
                    if ($this->session->userdata('lang')) {
                        $infor[$numPost]['description'] = $Post['p_description_en'];
                        $infor[$numPost]['address'] = $Post['p_address_en'];
                        $infor[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                        $infor[$numPost]['typeOfProperty']['name'] = $Post['pp_name_en'];
                        $infor[$numPost]['type']['id'] = $Post['pt_id'];
                        $infor[$numPost]['type']['name'] = $Post['pt_name_en'];
                        $infor[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                        $infor[$numPost]['typeOfCladding']['name'] = $Post['pc_name_en'];
                    } else {
                        $infor[$numPost]['description'] = $Post['p_description_ar'];
                        $infor[$numPost]['address'] = $Post['p_address_ar'];
                        $infor[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                        $infor[$numPost]['typeOfProperty']['name'] = $Post['pp_name_ar'];
                        $infor[$numPost]['type']['id'] = $Post['pt_id'];
                        $infor[$numPost]['type']['name'] = $Post['pt_name_ar'];
                        $infor[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                        $infor[$numPost]['typeOfCladding']['name'] = $Post['pc_name_ar'];
                    }
                    $infor[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
                    $infor[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
                    $infor[$numPost]['areaSpace'] = $Post['p_areaSpace'];
                    $infor[$numPost]['meridian'] = $Post['p_meridian'];
                    $infor[$numPost]['latitude'] = $Post['p_latitude'];
                    $infor[$numPost]['dateOfConstruction'] = $Post['p_dateOfConstruction'];
                    $infor[$numPost]['priceOfMeter'] = $Post['p_priceOfMeter'];
                    $infor[$numPost]['floor'] = $Post['p_floor'];
                    $infor[$numPost]['parking'] = $Post['p_parking'] == '1' ? 'true' : 'false';
                    $infor[$numPost]['elevator'] = $Post['p_elevator'] == '1' ? 'true' : 'false';
                    $infor[$numPost]['interphone'] = $Post['p_interphone'] == '1' ? 'true' : 'false';
                    $infor[$numPost]['summer'] = $Post['p_summer'];
                    $infor[$numPost]['winter'] = $Post['p_winter'];
                    $info[$numPost]['governorate'] = $Post['g_name_ar'];
                    $infor[$numPost]['timestamp'] = $Post['p_timestamp'];
                    $numPost++;
                }
            }
        }
        $data['posts'] = $infor;
        $this->load->view('productDetails', $data);
    }

    public function AllPosts() {
        $GovernorateId = '7A742620-3E3C-46FC-8136-4D32EB27174F';
        $this->load->model('Posts');
        $ids = array();
        if ($_POST){
            $Posts = $this->Posts->GetAllPosts($GovernorateId,$this->input->post());
            $cladding = $this->input->post('cladding');
            $tapu = $this->input->post('tapu');
            $properties = $this->input->post('properties');
            $type = $this->input->post('type');
            $ownership = $this->input->post('ownership');
            $governorates = $this->input->post('governorates');
            if (isset($governorates)){
                foreach ($governorates as $value){
                    array_push($ids,$value);
                }
            }
            if (isset($ownership)){
                foreach ($ownership as $value){
                    array_push($ids,$value);
                }
            }
            if (isset($type)){
                foreach ($type as $value){
                    array_push($ids,$value);
                }
            }
            if (isset($tapu)){
                foreach ($tapu as  $value){
                    array_push($ids,$value);
                }
            }
            if (isset($cladding)){
                foreach ($cladding as  $value){
                    array_push($ids,$value);
                }
            }
            // price
            // space
            // length
            if (isset($properties)){
                foreach ($properties as $value){
                    array_push($ids,$value);
                }
            }
        }else{
            $Posts = $this->Posts->GetAllPosts($GovernorateId);
        }
        $infor = array();
        if ($Posts) {
            $numPost = 0;
            foreach ($Posts as $Post) {
                if ($Post['p_active'] == 1) {
                    $infor[$numPost]['id'] = $Post['p_id'];
                    if ($this->session->userdata('lang')) {
                        $infor[$numPost]['description'] = $Post['p_description_en'];
                        $infor[$numPost]['address'] = $Post['p_address_en'];
                        $infor[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                        $infor[$numPost]['typeOfProperty']['name'] = $Post['pp_name_en'];
                        $infor[$numPost]['type']['id'] = $Post['pt_id'];
                        $infor[$numPost]['type']['name'] = $Post['pt_name_en'];
                        $infor[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                        $infor[$numPost]['typeOfCladding']['name'] = $Post['pc_name_en'];
                    } else {
                        $infor[$numPost]['description'] = $Post['p_description_ar'];
                        $infor[$numPost]['address'] = $Post['p_address_ar'];
                        $infor[$numPost]['typeOfProperty']['id'] = $Post['pp_id'];
                        $infor[$numPost]['typeOfProperty']['name'] = $Post['pp_name_ar'];
                        $infor[$numPost]['type']['id'] = $Post['pt_id'];
                        $infor[$numPost]['type']['name'] = $Post['pt_name_ar'];
                        $infor[$numPost]['typeOfCladding']['id'] = $Post['pc_id'];
                        $infor[$numPost]['typeOfCladding']['name'] = $Post['pc_name_ar'];
                    }
                    $infor[$numPost]['numOfRooms'] = $Post['p_numOfRooms'];
                    $infor[$numPost]['numOfBathRooms'] = $Post['p_numOfBathRooms'];
                    $infor[$numPost]['areaSpace'] = $Post['p_areaSpace'];
                    $infor[$numPost]['meridian'] = $Post['p_meridian'];
                    $infor[$numPost]['latitude'] = $Post['p_latitude'];
                    $infor[$numPost]['dateOfConstruction'] = $Post['p_dateOfConstruction'];
                    $infor[$numPost]['priceOfMeter'] = $Post['p_priceOfMeter'];
                    $infor[$numPost]['floor'] = $Post['p_floor'];
                    $infor[$numPost]['parking'] = $Post['p_parking'] == '1' ? 'true' : 'false';
                    $infor[$numPost]['elevator'] = $Post['p_elevator'] == '1' ? 'true' : 'false';
                    $infor[$numPost]['interphone'] = $Post['p_interphone'] == '1' ? 'true' : 'false';
                    $infor[$numPost]['summer'] = $Post['p_summer'];
                    $infor[$numPost]['winter'] = $Post['p_winter'];
                    $info[$numPost]['governorate'] = $Post['g_name_ar'];
                    $infor[$numPost]['timestamp'] = $Post['p_timestamp'];
                    $numPost++;
                }
            }
        }else{
            $infor = $this->lang->line('NoResult');
        }
        $data['posts'] = $infor;
        $data['ids'] = $ids;
        $data['data'] = $this->InitializedPost();
        $this->load->view('products',$data);
    }

    private function InitializedPost()
    {
        $this->load->model('Posts');
        $result = array();
        $resultCladding = $this->Posts->GetCladding();
        $resultTapu = $this->Posts->GetTapu();
        $resultProperties = $this->Posts->GetProperties();
        $resultType = $this->Posts->GetType();
        $resultOwnership = $this->Posts->GetOwnership();
        $governorates = $this->Posts->GetAllGovernorate();
        if ($governorates) {
            $numGovernorate = 0;
            foreach ($governorates as $governorate) {
                if ($governorate['g_active'] == 1) {
                    $result['governorates'][$numGovernorate]['id'] = $governorate['g_id'];
                    if ($this->session->userdata('lang')) {
                        $result['governorates'][$numGovernorate]['text'] = $governorate['g_name_en'];
                    } else {
                        $result['governorates'][$numGovernorate]['text'] = $governorate['g_name_ar'];
                    }
                    $numGovernorate++;
                }
            }
        }
        if ($resultOwnership) {
            foreach ($resultOwnership as $key => $value) {
                $result['ownership'][$key]['id'] = $value['po_id'];
                if ($this->session->userdata('lang')) {
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
        if ($resultType) {
            foreach ($resultType as $key => $value) {
                $result['type'][$key]['id'] = $value['pt_id'];
                if ($this->session->userdata('lang')) {
                    $result['type'][$key]['text'] = $value['pt_name_en'];
                } else {
                    $result['type'][$key]['text'] = $value['pt_name_ar'];
                }
            }
        }


        if ($resultTapu) {
            foreach ($resultTapu as $key => $value) {
                $result['tapu'][$key]['id'] = $value['pta_id'];
                if ($this->session->userdata('lang')) {
                    $result['tapu'][$key]['text'] = $value['pta_name_en'];
                } else {
                    $result['tapu'][$key]['text'] = $value['pta_name_ar'];
                }
            }
        }
        if ($resultProperties) {
            foreach ($resultProperties as $key => $value) {
                $result['properties'][$key]['id'] = $value['pp_id'];
                if ($this->session->userdata('lang')) {
                    $result['properties'][$key]['text'] = $value['pp_name_en'];
                } else {
                    $result['properties'][$key]['text'] = $value['pp_name_ar'];
                }
            }
        }

        if ($resultCladding) {
            foreach ($resultCladding as $key => $value) {
                $result['cladding'][$key]['id'] = $value['pc_id'];
                if ($this->session->userdata('lang')) {
                    $result['cladding'][$key]['text'] = $value['pc_name_en'];
                } else {
                    $result['cladding'][$key]['text'] = $value['pc_name_ar'];
                }
            }
        }

        return $result;
    }

    public function API()
    {
        $this->load->view('api');
    }

    public function Signin()
    {
        if ($this->session->userdata('userId')) {
            $newURL = base_url() . 'MemberArea';
            header('Location: ' . $newURL);
            exit;
        }
        $error = false;
        if ($this->input->post('name') && $this->input->post('pass')) {
            $GSM = $this->input->post('name');
            $Password = $this->input->post('pass');
            if (strlen((string)$Password) >= 8) {
                if (is_numeric($GSM) && strlen((string)$GSM) == 10 && $GSM{0} == 0 && $GSM{1} == 9) {
                    $this->load->model('UsersAuth');
                    $GSM = (int)$GSM;
                    $result1 = $this->UsersAuth->login($GSM, $Password);
                    if ($result1) {
                        foreach ($result1 as $result) {
                            if ($result['u_active'] == 2) {
                                $info['userId'] = $result['u_id'];
                                $info['name'] = $result['u_name'];
                                $this->session->set_userdata('userId', $result['u_id']);
                                $this->session->set_userdata('name', $result['u_name']);
                                $this->session->set_userdata('session', $this->guid());
                                $this->session->set_userdata('admin', true);
                                $newURL = base_url() . 'MemberArea';
                                header('Location: ' . $newURL);
                                exit;
                            } elseif ($result['u_active'] == 1) {
                                $info['userId'] = $result['u_id'];
                                $info['name'] = $result['u_name'];
                                $this->session->set_userdata('userId', $result['u_id']);
                                $this->session->set_userdata('name', $result['u_name']);
                                $this->session->set_userdata('session', $this->guid());
                                $this->session->set_userdata('admin', false);
                                $newURL = base_url() . 'MemberArea';
                                header('Location: ' . $newURL);
                                exit;
                            }elseif ($result['u_active'] == 0) {
                                $error = $this->lang->line('you_account_not_activation_yet');
                            } elseif ($result['u_active'] == 3) {
                                $error = $this->lang->line('sorry_your_account_has_blocked');
                            }
                        }
                    } else {
                        $error = $this->lang->line('not_much_between_gsm_and_password');
                    }
                } else {
                    $error = $this->lang->line('check_your_gsm_number_is_valid');
                }
            } else {
                $error =  $this->lang->line('password_less_than_8_characters');
            }
        }
        $data['error'] = $error;
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/lang/Ar.php');
        $this->load->view('admin/index',$data);
    }

    public function Register()
    {
        if ($this->session->userdata('userId')) {
            $newURL = base_url() . 'MemberArea';
            header('Location: ' . $newURL);
            exit;
        }
        $error = false;
        if ($this->input->post('name') && $this->input->post('pass')) {
            $this->lang->load('api', 'english');
            $GSM = $this->input->post('name');
            $Password = $this->input->post('pass');
            if (strlen((string)$Password) >= 8) {
                if (is_numeric($GSM) && strlen((string)$GSM) == 10 && $GSM{0} == 0 && $GSM{1} == 9) {
                    $this->load->model('UsersAuth');
                    $GSM = (int)$GSM;
                    $result1 = $this->UsersAuth->login($GSM, $Password);
                    if ($result1) {
                        foreach ($result1 as $result) {
                            if ($result['u_active'] == 2) {
                                $info['userId'] = $result['u_id'];
                                $info['name'] = $result['u_name'];
                                $this->session->set_userdata('userId', $result['u_id']);
                                $this->session->set_userdata('name', $result['u_name']);
                                $this->session->set_userdata('session', $this->guid());
                                $this->session->set_userdata('admin', true);
                                $newURL = base_url() . 'MemberArea';
                                header('Location: ' . $newURL);
                                exit;
                            } elseif ($result['u_active'] == 1) {
                                $info['userId'] = $result['u_id'];
                                $info['name'] = $result['u_name'];
                                $this->session->set_userdata('userId', $result['u_id']);
                                $this->session->set_userdata('name', $result['u_name']);
                                $this->session->set_userdata('session', $this->guid());
                                $this->session->set_userdata('admin', false);
                                $newURL = base_url() . 'MemberArea';
                                header('Location: ' . $newURL);
                                exit;
                            }elseif ($result['u_active'] == 0) {
                                $error = $this->lang->line('you_account_not_activation_yet');
                            } elseif ($result['u_active'] == 3) {
                                $error = $this->lang->line('sorry_your_account_has_blocked');
                            }
                        }
                    } else {
                        $error = $this->lang->line('not_much_between_gsm_and_password');
                    }
                } else {
                    $error = $this->lang->line('check_your_gsm_number_is_valid');
                }
            } else {
                $error =  $this->lang->line('password_less_than_8_characters');
            }
        }
        $data['error'] = $error;
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/lang/Ar.php');
        $this->load->view('admin/register');
    }

    public function Forgot(){
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/lang/Ar.php');
        $this->load->view('admin/forgot');
    }

    public function Activation(){
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/lang/Ar.php');
        $this->load->view('admin/activation');
    }

    public function CodeActivation(){
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/lang/Ar.php');
        $this->load->view('admin/codeActivation');
    }

//    public function SetGovernorate(){
//
//        $this->load->model('Posts');
//        $this->Posts->SetGovernorate($this->guid(),'damascus','دمشق',36.278336,33.510414,1);
//        $this->Posts->SetGovernorate($this->guid(),'aleppo','حلب',37.16117,36.20124,1);
//        $this->Posts->SetGovernorate($this->guid(),'homs','حمص',36.72339,34.72682,1);
//
//    }
//    public function SetCladding(){
//	    $this->load->model('Posts');
//	    $this->Posts->SetCladding(null, $this->guid(), 'Old', 'قديم', 1);
//	    $this->Posts->SetCladding(null, $this->guid(), 'Normal', 'عادي', 1);
//	    $this->Posts->SetCladding(null, $this->guid(), 'Good', 'جيدة', 1);
//	    $this->Posts->SetCladding(null, $this->guid(), 'Deluxe', 'ديلوكس', 1);
//	    $this->Posts->SetCladding(null, $this->guid(), 'Super Deluxe', 'سوبر ديلوكس', 1);
//	    $this->Posts->SetCladding(null, $this->guid(), 'Property', 'ملكية', 1);
//    }
//    public function SetTapu(){
//        $this->load->model('Posts');
//        $this->Posts->SetTapu(null, $this->guid(), 'Green', 'اخضر', 1);
//        $this->Posts->SetTapu(null, $this->guid(), 'Agricultural', 'زراعي', 1);
//        $this->Posts->SetTapu(null, $this->guid(), 'Notary', 'كاتب عدل', 1);
//        $this->Posts->SetTapu(null, $this->guid(), 'State Property', 'املاك دولة', 1);
//    }
//    public function SetType(){
//        $this->load->model('Posts');
//        $this->Posts->SetType(null, $this->guid(), 'house', 'منزل', 1);
//        $this->Posts->SetType(null, $this->guid(), 'Arab House', 'بيت عربي', 1);
//        $this->Posts->SetType(null, $this->guid(), 'Office', 'مكتب', 1);
//        $this->Posts->SetType(null, $this->guid(), 'Studio', 'استديو', 1);
//        $this->Posts->SetType(null, $this->guid(), 'Agricultural Land', 'ارض زراعية', 1);
//        $this->Posts->SetType(null, $this->guid(), 'Lab', 'معمل', 1);
//        $this->Posts->SetType(null, $this->guid(), 'Shop', 'محل', 1);
//        $this->Posts->SetType(null, $this->guid(), 'villa', 'فيلا', 1);
//        $this->Posts->SetType(null, $this->guid(), 'Room', 'غرفة', 1);
//        $this->Posts->SetType(null, $this->guid(), 'Industrial Hangar', 'هنغار صناعي', 1);
//        $this->Posts->SetType(null, $this->guid(), 'Subscription number', 'رقم اكتتاب', 1);
//    }
//    public function SetProperties(){
//        $this->load->model('Posts');
//        $this->Posts->SetProperties(null, $this->guid(), 'residential', 'سكني', 1);
//        $this->Posts->SetProperties(null, $this->guid(), 'trade', 'تجاري', 1);
//        $this->Posts->SetProperties(null, $this->guid(), 'Industrial', 'صناعي', 1);
//    }
//    public function SetOwnership(){
//        $this->load->model('Posts');
//        $this->Posts->SetOwnership(null, $this->guid(), 'Rent', 'ايجار', 1);
//        $this->Posts->SetOwnership(null, $this->guid(), 'Sale', 'بيع', 1);
//    }
//    public function adnan()
//    {
//        $this->load->model('MobileAuth');
//        $this->MobileAuth->SendReq();
//    }

//    public function SetImages(){
//	    $this->load->model('Posts');
//        $postId = '68114184-1051-438B-A0D0-0FAF39FEF788';
//	    $this->Posts->SetImages(null, $this->guid(), $postId, 1, 'details-slider/slide1.jpg');
//	    $this->Posts->SetImages(null, $this->guid(), $postId, 0, 'details-slider/slide2.jpg');
//	    $this->Posts->SetImages(null, $this->guid(), $postId, 0, 'details-slider/slide3.jpg');
//	    $this->Posts->SetImages(null, $this->guid(), $postId, 0, 'details-slider/slide4.jpg');
//	    $this->Posts->SetImages(null, $this->guid(), $postId, 0, 'details-slider/slide5.jpg');
//	    $this->Posts->SetImages(null, $this->guid(), $postId, 0, 'details-slider/slide6.jpg');
//    }
}
