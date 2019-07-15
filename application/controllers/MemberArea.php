<?php
/**
 * Created by PhpStorm.
 * User: riadsasila
 * Date: 1/1/19
 * Time: 9:25 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MemberArea extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
//        var_dump($this->session->userdata('admin'));exit;
//        if (!$this->session->userdata('admin')) {
//            $newURL = base_url();
//            header('Location: ' . $newURL);
//        }
        $this->lang->load('api', 'arabic');
        $this->load->view('admin/include/lang/Ar.php');
        $this->session->set_userdata('lang', false);
//        if ($this->session->userdata('lang') === true && !(isset($_GET['lang']) && $_GET['lang'] == 'ar')) {
//            $this->lang->load('api', 'english');
//            $this->load->view('admin/include/lang/En.php');
//            $this->session->set_userdata('lang', true);
//        }else{
//            if (isset($_GET['lang']) && $_GET['lang'] == 'en'){
//                $this->lang->load('api', 'english');
//                $this->load->view('admin/include/lang/En.php');
//                $this->session->set_userdata('lang', true);
//            }else{
//                $this->lang->load('api', 'arabic');
//                $this->load->view('admin/include/lang/Ar.php');
//                $this->session->set_userdata('lang', false);
//            }
//        }


        if (!$this->session->userdata('userId')) {
            $actual_link = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
            $this->session->set_userdata('urlEntered', $actual_link);
            $newURL = base_url() . 'Signin';
            header('Location: ' . $newURL);
            exit;
        }

    }

    public function guid()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
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

    public function checkIsSetPost($data)
    {
        $result = true;
        $key = 0;
        foreach ($data as $item) {
            if ($result) {
                if (isset($_POST[$item])) {
                    $result = true;
                } else {
                    var_dump($item);
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

    public function index()
    {
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/templet/nav.php');
    }

    public function addProduct()
    {
        if ($_POST) {
            $this->SetPost();
        }
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/templet/nav.php');
        $this->load->view('admin/proudact_add.php', $this->InitializedPost());
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
                if ($this->session->userdata('lang')) {
                    $result['cladding'][$key]['text'] = $value['pc_name_en'];
                } else {
                    $result['cladding'][$key]['text'] = $value['pc_name_ar'];
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

        if ($resultOwnership) {
            foreach ($resultOwnership as $key => $value) {
                $result['ownership'][$key]['id'] = $value['po_id'];
                if ($this->session->userdata('lang')) {
                    $result['ownership'][$key]['text'] = $value['po_name_en'];
                    if ($value['po_id'] == '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3') {
                        $result['ownership'][$key]['period_time'] = array('1 Month', '3 Month', '6 Month', '12 Month','others');
                    }
                } else {
                    $result['ownership'][$key]['text'] = $value['po_name_ar'];
                    if ($value['po_id'] == '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3') {
                        $result['ownership'][$key]['period_time'] = array('شهر', '3 أشهر', '6 أشهر', '12 شهر','غير ذلك');
                    }
                }
            }
        }
        if ($governorates) {
            $numGovernorate = 0;
            foreach ($governorates as $governorate) {
                if ($governorate['g_active'] == 1) {
                    $result['governorates'][$numGovernorate]['id'] = $governorate['g_id'];
                    if ($this->session->userdata('lang')) {
                        $result['governorates'][$numGovernorate]['name'] = $governorate['g_name_en'];
                    } else {
                        $result['governorates'][$numGovernorate]['name'] = $governorate['g_name_ar'];
                    }
                    $numGovernorate++;
                }
            }
        }
        return $result;
    }

    public function SetPost()
    {
        $post[1] = array('Ownership', 'PeriodTime', 'Type', 'AddressAr', 'DescriptionAr', 'Governorate', 'NumOfRooms', 'NumOfBathRooms', 'AreaSpace', 'meridian', 'latitude',
            'TypeOfProperty', 'Parking', 'PriceOfMeter', 'Floor','GSM','Name', 'Elevator', 'Furnished', 'TypeOfCladding', 'Interphone', 'Summer', 'Winter');
        if ($this->checkIsSetPost($post[1]) && $this->checkEmptyPost($post)) {
            $this->load->model('Posts');
            $session = $this->session->userdata('session');
            $PeriodTime = $this->input->post('PeriodTime');
            $Ownership = $this->input->post('Ownership');
            $idOwnershipRelation = $this->guid();
            $idPost = $this->guid();
            $Type = $this->input->post('Type');
            $DescriptionEn = $this->input->post('DescriptionAr');
            $DescriptionAr = $this->input->post('DescriptionAr');
            $AddressEn = $this->input->post('AddressAr');
            $AddressAr = $this->input->post('AddressAr');
            $NumOfRooms = $this->input->post('NumOfRooms');
            $NumOfBathRooms = $this->input->post('NumOfBathRooms');
            $AreaSpace = $this->input->post('AreaSpace');
            $meridian = $this->input->post('meridian');
            $latitude = $this->input->post('latitude');
            $TypeOfProperty = $this->input->post('TypeOfProperty');
            $DateOfConstruction = null;
            $Parking = $this->input->post('Parking');
            $PriceOfMeter = $this->input->post('PriceOfMeter');
            $Floor = $this->input->post('Floor');
            $Elevator = $this->input->post('Elevator');
            $TypeOfCladding = $this->input->post('TypeOfCladding');
            $Furnished = $this->input->post('Furnished');
            $Interphone = $this->input->post('Interphone');
            $Summer = $this->input->post('Summer');
            $Winter = $this->input->post('Winter');
            $userID = $this->session->userdata('userId');
            $Governorate = $this->input->post('Governorate');
            $tabu = $this->input->post('tapu');
            $GSM = $this->input->post('GSM');
            $Name = $this->input->post('Name');
            $active = 1;
            $this->Posts->SetPost($session, $PeriodTime, $Ownership, $idOwnershipRelation, $idPost, $Type, $DescriptionEn, $DescriptionAr, $AddressEn, $AddressAr, $NumOfRooms,
                $NumOfBathRooms, $AreaSpace, $meridian, $latitude, $TypeOfProperty, $DateOfConstruction, $Parking, $PriceOfMeter, $Floor, $Elevator, $TypeOfCladding,
                $Furnished, $Interphone, $Summer, $Winter, $userID, $Governorate, $tabu, $active,$GSM,$Name);

            if (isset($_FILES['uploadMain'])) {
                $files = $_FILES['uploadMain']['name'];
                foreach ($files as $key => $file) {
                    $allowedExts = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
                    $temp = explode(".", $_FILES['uploadMain']['name'][$key]);
                    $extension = end($temp);
                    if (in_array($extension, $allowedExts)) {
                        $id = $this->guid();
                        while (file_exists('./public/images/details-slider/' . $id . '.' . $extension)) {
                            $id = $this->guid();
                        }
                        $path = './public/images/details-slider/' . $id . '.' . $extension;
                        if (move_uploaded_file($_FILES['uploadMain']['tmp_name'][$key], $path)) {
                            $this->Posts->SetImages($session, $this->guid(), $idPost, 1, 'public/images/details-slider/' . $id . '.' . $extension);
                        }
                    }
                }
            }

            if (isset($_FILES['upload'])) {
                $files = $_FILES['upload']['name'];
                foreach ($files as $key => $file) {
                    $allowedExts = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
                    $temp = explode(".", $_FILES['upload']['name'][$key]);
                    $extension = end($temp);
                    if (in_array($extension, $allowedExts)) {
                        $id = $this->guid();
                        while (file_exists('./public/images/details-slider/' . $id . '.' . $extension)) {
                            $id = $this->guid();
                        }
                        $path = './public/images/details-slider/' . $id . '.' . $extension;
                        if (move_uploaded_file($_FILES['upload']['tmp_name'][$key], $path)) {
                            $this->Posts->SetImages($session, $this->guid(), $idPost, 0, 'public/images/details-slider/' . $id . '.' . $extension);
                        }
                    }
                }
            }
        }
    }

    public function PostsData()
    {
        $col_ord = array(
            'p_id',
            'p_type',
            'p_description_en',
            'p_address_ar',
            'p_description_ar',
            'p_address_en',
            'p_numOfRooms',
            'p_numOfBathRooms',
            'p_areaSpace',
            'p_meridian',
            'p_latitude',
            'p_typeOfProperty',
            'p_dateOfConstruction',
            'p_parking',
            'p_priceOfMeter',
            'p_floor',
            'p_elevator',
            'p_furnished',
            'p_typeOfCladding',
            'p_prepareOfTapu',
            'p_interphone',
            'p_summer',
            'p_winter',
            'p_user_id',
            'p_governorate_id',
            'p_active',
            'p_timestamp'
        );
        $col_search = array(
            'p_id',
            'p_type',
            'p_description_en',
            'p_address_ar',
            'p_description_ar',
            'p_address_en',
            'p_numOfRooms',
            'p_numOfBathRooms',
            'p_areaSpace',
            'p_meridian',
            'p_latitude',
            'p_typeOfProperty',
            'p_dateOfConstruction',
            'p_parking',
            'p_priceOfMeter',
            'p_floor',
            'p_elevator',
            'p_furnished',
            'p_typeOfCladding',
            'p_prepareOfTapu',
            'p_interphone',
            'p_summer',
            'p_winter',
            'p_user_id',
            'p_governorate_id',
            'p_active',
            'p_timestamp',
            'u_name',
            'u_gsm'
        );
        $name_table = 'posts';
        $order = array('p_timestamp' => 'DESC');
        $col_where = 'not';
        $where = '';
        $joinTable[0] = 'users';
        $joinTable[1] = 'governorates';
        $joinTable[2] = 'posts_tapu';
        $joinTable[3] = 'posts_types';
        $joinTable[4] = 'posts_properties';
        $joinTable[5] = 'posts_ownership_relation';
        $joinTable[6] = 'posts_ownership';
        $joinTable[7] = 'posts_cladding';
        $joinCol[0] = 'u_id = p_user_id';
        $joinCol[1] = 'g_id = p_governorate_id';
        $joinCol[2] = 'pta_id = p_prepareOfTapu';
        $joinCol[3] = 'pt_id = p_type';
        $joinCol[4] = 'pp_id = p_typeOfProperty';
        $joinCol[5] = 'por_post_id = p_id';
        $joinCol[6] = 'po_id = por_ownership_id';
        $joinCol[7] = 'pc_id = p_typeOfCladding';
        $this->load->model('MoDataTable');
        $list = $this->MoDataTable->get_datatables($name_table, null, $col_search, $col_where, $where, $order, $joinTable, $joinCol);
        $data = array();
        foreach ($list as $customers) {
            $row = array();
            $row['ur_name'] = $customers->u_name;
            $row['ur_gsm'] = $customers->u_gsm;
            $row['ur_timestamp'] = date('m/d/Y H:i:s', $customers->p_timestamp);
            $row['active'] = $customers->p_active;
            if ($row['active'] == 1) {
                $row['active'] = '<span class="label label-success">نشط</span>';
            } else if ($row['active'] == 0) {
                $row['active'] = '<span class="label label-warning">غير نشط</span>';
            } else if ($row['active'] == 2) {
                $row['active'] = '<span class="label bg-orange">يحتاج الى موافقة</span>';
            }
            $row['view'] = '<a href="' . base_url() . 'Details/' . $customers->p_id . '">' . _ViewPost . '</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->MoDataTable->count_all($name_table, $col_where, $where, $joinTable, $joinCol),
            "recordsFiltered" => $this->MoDataTable->count_filtered($name_table, $col_ord, $col_search, $col_where, $where, $order, $joinTable, $joinCol),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function Posts()
    {
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/templet/nav.php');
        $this->load->view('admin/proudacts_list');
    }

    public function pendingPost()
    {
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/templet/nav.php');
        $this->load->view('admin/pending_list');
    }

    public function pendingPostData()
    {
        $col_ord = array(
            'p_id',
            'p_type',
            'p_description_en',
            'p_address_ar',
            'p_description_ar',
            'p_address_en',
            'p_numOfRooms',
            'p_numOfBathRooms',
            'p_areaSpace',
            'p_meridian',
            'p_latitude',
            'p_typeOfProperty',
            'p_dateOfConstruction',
            'p_parking',
            'p_priceOfMeter',
            'p_floor',
            'p_elevator',
            'p_furnished',
            'p_typeOfCladding',
            'p_prepareOfTapu',
            'p_interphone',
            'p_summer',
            'p_winter',
            'p_user_id',
            'p_governorate_id',
            'p_active',
            'p_timestamp'
        );
        $col_search = array(
            'p_id',
            'p_type',
            'p_description_en',
            'p_address_ar',
            'p_description_ar',
            'p_address_en',
            'p_numOfRooms',
            'p_numOfBathRooms',
            'p_areaSpace',
            'p_meridian',
            'p_latitude',
            'p_typeOfProperty',
            'p_dateOfConstruction',
            'p_parking',
            'p_priceOfMeter',
            'p_floor',
            'p_elevator',
            'p_furnished',
            'p_typeOfCladding',
            'p_prepareOfTapu',
            'p_interphone',
            'p_summer',
            'p_winter',
            'p_user_id',
            'p_governorate_id',
            'p_active',
            'p_timestamp'
        );
        $name_table = 'posts';
        $order = array('p_timestamp' => 'DESC');
        $col_where = 'p_active';
        $where = '2';
        $joinTable[0] = 'users';
        $joinTable[1] = 'governorates';
        $joinTable[2] = 'posts_tapu';
        $joinTable[3] = 'posts_types';
        $joinTable[4] = 'posts_properties';
        $joinTable[5] = 'posts_ownership_relation';
        $joinTable[6] = 'posts_ownership';
        $joinTable[7] = 'posts_cladding';
        $joinCol[0] = 'u_id = p_user_id';
        $joinCol[1] = 'g_id = p_governorate_id';
        $joinCol[2] = 'pta_id = p_prepareOfTapu';
        $joinCol[3] = 'pt_id = p_type';
        $joinCol[4] = 'pp_id = p_typeOfProperty';
        $joinCol[5] = 'por_post_id = p_id';
        $joinCol[6] = 'po_id = por_ownership_id';
        $joinCol[7] = 'pc_id = p_typeOfCladding';
        $this->load->model('MoDataTable');
        $list = $this->MoDataTable->get_datatables($name_table, null, $col_search, $col_where, $where, $order, $joinTable, $joinCol);
        $data = array();
        foreach ($list as $customers) {
            $row = array();
            $row['ur_name'] = $customers->u_name;
            $row['ur_gsm'] = $customers->u_gsm;
            $row['ur_timestamp'] = date('m/d/Y H:i:s', $customers->p_timestamp);
//            $row['active'] = $customers->p_active;
            $row['active'] = '<span class="label label-warning">يحتاج الى موافقة</span>';
            $row['view'] = '<a href="' . base_url() . 'Details/' . $customers->p_id . '">' . _ViewPost . '</a>';
            $row['edit'] = '<button data-id="' . $customers->p_id . '" data-active="1" class="btn btn-md btn-default edit-btn">الموافقة</button><button data-id="' . $customers->p_id . '" data-active="4" class="btn btn-md  edit-btn btn-danger">الحذف</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->MoDataTable->count_all($name_table, $col_where, $where, $joinTable, $joinCol),
            "recordsFiltered" => $this->MoDataTable->count_filtered($name_table, $col_ord, $col_search, $col_where, $where, $order, $joinTable, $joinCol),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function editPost($id, $active)
    {
        $this->load->model('Posts');
        $this->Posts->ChangeActivePost(null, $id, $active);
    }

    public function editFavoritePost($id)
    {
        $this->load->model('Posts');
        $this->Posts->ChangeActiveFavoritePost($id);
    }

    public function users()
    {
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/templet/nav.php');
        $this->load->view('admin/users');
    }

    public function usersData()
    {
        $col_ord = array(
            'u_id',
            'u_name',
            'u_gsm',
            'u_password',
            'u_birthday',
            'u_reset',
            'u_active',
            'u_timestamp'
        );
        $col_search = array(
            'u_id',
            'u_name',
            'u_gsm',
            'u_password',
            'u_birthday',
            'u_active',
            'u_reset',
            'u_timestamp'
        );
        $name_table = 'users';
        $order = array('u_timestamp' => 'DESC');
        $col_where = 'u_active !=';
        $where = '4';
        $this->load->model('MoDataTable');
        $list = $this->MoDataTable->get_datatables($name_table, null, $col_search, $col_where, $where, $order);
        $data = array();
        foreach ($list as $customers) {
            $row = array();
            $row['id'] = $customers->u_id;
            $row['name'] = $customers->u_name;
            $row['gsm'] = $customers->u_gsm;
            $row['birthday'] = $customers->u_birthday;
            $row['reset'] = $customers->u_reset;
            $row['timestamp'] = date('m/d/Y H:i:s', $customers->u_timestamp);
            $row['active'] = $customers->u_active;
            if ($row['active'] == 1) {
                $row['active'] = '<span class="label label-success">نشط</span>';
            } else if ($row['active'] == 0) {
                $row['active'] = '<span class="label label-warning">غير نشط</span>';
            } else if ($row['active'] == 2) {
                $row['active'] = '<span class="label label-danger">مسؤول</span>';
            }
            $row['view'] = '';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->MoDataTable->count_all($name_table, $col_where, $where),
            "recordsFiltered" => $this->MoDataTable->count_filtered($name_table, $col_ord, $col_search, $col_where, $where, $order),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function Favorite()
    {
        $this->load->view('admin/include/templet/notification.php');
        $this->load->view('admin/include/templet/nav.php');
        $this->load->view('admin/favorite_list');
    }

    public function FavoriteData()
    {
        $col_ord = array(
            'p_id',
            'p_type',
            'p_description_en',
            'p_address_ar',
            'p_description_ar',
            'p_address_en',
            'p_numOfRooms',
            'p_numOfBathRooms',
            'p_areaSpace',
            'p_meridian',
            'p_latitude',
            'p_typeOfProperty',
            'p_dateOfConstruction',
            'p_parking',
            'p_priceOfMeter',
            'p_floor',
            'p_elevator',
            'p_furnished',
            'p_typeOfCladding',
            'p_prepareOfTapu',
            'p_interphone',
            'p_summer',
            'p_winter',
            'p_user_id',
            'p_governorate_id',
            'p_active',
            'p_timestamp'
        );
        $col_search = array(
            'p_id',
            'p_type',
            'p_description_en',
            'p_address_ar',
            'p_description_ar',
            'p_address_en',
            'p_numOfRooms',
            'p_numOfBathRooms',
            'p_areaSpace',
            'p_meridian',
            'p_latitude',
            'p_typeOfProperty',
            'p_dateOfConstruction',
            'p_parking',
            'p_priceOfMeter',
            'p_floor',
            'p_elevator',
            'p_furnished',
            'p_typeOfCladding',
            'p_prepareOfTapu',
            'p_interphone',
            'p_summer',
            'p_winter',
            'p_user_id',
            'p_governorate_id',
            'p_active',
            'p_timestamp'
        );
        $name_table = 'users_favorites';
        $order = array('p_timestamp' => 'DESC');
        $col_where = 'u_id';
        $where = $this->session->userdata('userId');
        $joinTable[0] = 'users';
        $joinTable[1] = 'posts';
        $joinCol[0] = 'u_id = p_user_id';
        $joinCol[1] = 'p_id = uf_post_id';
        $this->load->model('MoDataTable');
        $list = $this->MoDataTable->get_datatables($name_table, null, $col_search, $col_where, $where, $order, $joinTable, $joinCol);
        $data = array();
        foreach ($list as $customers) {
            $row = array();
            $row['ur_name'] = $customers->u_name;
            $row['ur_gsm'] = $customers->u_gsm;
            $row['ur_timestamp'] = date('m/d/Y H:i:s', $customers->p_timestamp);
            $row['active'] = $customers->p_active;
            if ($row['active'] == 1) {
                $row['active'] = '<span class="label label-success">نشط</span>';
            } else if ($row['active'] == 0) {
                $row['active'] = '<span class="label label-warning">غير نشط</span>';
            } else if ($row['active'] == 2) {
                $row['active'] = '<span class="label bg-orange">يحتاج الى موافقة</span>';
            }
            $row['view'] = '<a href="' . base_url() . 'Details/' . $customers->p_id . '">' . _ViewPost . '</a>';
            $row['edit'] = '<button data-id="' . $customers->p_id . '" class="btn btn-md  edit-btn btn-danger">الحذف</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->MoDataTable->count_all($name_table, $col_where, $where, $joinTable, $joinCol),
            "recordsFiltered" => $this->MoDataTable->count_filtered($name_table, $col_ord, $col_search, $col_where, $where, $order, $joinTable, $joinCol),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function LogOut()
    {
        $this->session->sess_destroy();
        $newURL = base_url();
        header('Location: ' . $newURL);
    }

}