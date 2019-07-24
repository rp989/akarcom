<?php
/**
 * Created by PhpStorm.
 * User: riadsasila
 * Date: 1/1/19
 * Time: 9:25 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'User.php';

class MemberArea extends User
{
    public function __construct()
    {
        parent::__construct();


        $this->load->library('session');
        if (!isset($_SESSION['userId'])) {
            redirect(base_url('SignIn'));
        }
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
//                    var_dump($item);
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
//        $this->load->view('admin/include/templet/notification.php');
//        $this->load->view('admin/include/templet/nav.php');
        redirect(base_url('MemberArea/addProduct'));
    }

    public function addProduct()
    {
        if ($_POST) {
            $this->SetPost();
        }
//        $this->load->view('admin/include/templet/notification.php');
//        $this->load->view('admin/include/templet/nav.php');
//        $this->load->view('admin/proudact_add.php', $this->InitializedPost());
        $this->load->model('Posts');
        $check_user = $this->Posts->check_user();
        if ($check_user)
            $this->render_page('proudact_add', $this->InitializedPost());
        else
            $this->render_page('cant_add');
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
                        $result['ownership'][$key]['period_time'] = array('1 Month', '3 Month', '6 Month', '12 Month', 'others');
                    }
                } else {
                    $result['ownership'][$key]['text'] = $value['po_name_ar'];
                    if ($value['po_id'] == '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3') {
                        $result['ownership'][$key]['period_time'] = array('شهر', '3 أشهر', '6 أشهر', '12 شهر', 'غير ذلك');
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
//        echo '<pre>';
//        print_r($_POST);
//        print_r($_FILES);
//        echo '</pre>';
//        exit;
        $this->form_validation->set_rules('meridian', 'أحداثيات', 'required');
        $this->form_validation->set_rules('latitude', 'أحداثيات', 'required');
        $this->form_validation->set_rules('Governorate', 'المحافظة', 'required');
        $this->form_validation->set_rules('area', 'المنطقة', 'required');
        $this->form_validation->set_rules('Ownership', 'الغرض', 'required');
        $this->form_validation->set_rules('Type', 'النوع', 'required');
        $this->form_validation->set_rules('tapu', 'الطابو', 'required');
        $this->form_validation->set_rules('TypeOfProperty', 'سجل العقار', 'required');
        $this->form_validation->set_rules('AddressAr', 'العنوان', 'required');
        $this->form_validation->set_rules('DescriptionAr', 'شرح عن العقار', 'required');
        $this->form_validation->set_rules('PriceOfMeter', 'السعر', 'required');
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
            $this->form_validation->set_rules('GSM', 'رقم الهاتف', 'required');
            $this->form_validation->set_rules('Name', 'الأسم', 'required');

        }
        $this->form_validation->set_rules('AreaSpace', 'المساحة', 'required|integer');
        if ($_POST['Ownership'] == "010A6B80-26E9-477E-BEDC-E89D0BFA8BA3" || $_POST['Ownership'] == "dfd91978-5567-11e9-8885-3a9d631c5f8c") {
            $this->form_validation->set_rules('PeriodTime', 'الفترة الزمنية', 'required|integer');
        }
        if ($_POST['Type'] == '54E5A884-7806-4FB2-ADEA-62FCA17136C0' ||
            $_POST['Type'] == '56108eec-6b43-11e9-830a-323881e0e0c0' ||
            $_POST['Type'] == '6D0C22D2-3EF4-4E32-A99F-D5F685C0B651' ||
            $_POST['Type'] == 'AB566B9B-1D3D-422C-BA62-4347773FB574' ||
            $_POST['Type'] == 'FB76F9FA-78C3-4D9C-A3EC-FDB1ED6F090B'
        ) {
            $this->form_validation->set_rules('NumOfRooms', 'عدد الغرف', 'required');
            $this->form_validation->set_rules('NumOfBathRooms', 'عدد الحمامات', 'required');
            $this->form_validation->set_rules('TypeOfCladding', 'الكسوة', 'required');
            $this->form_validation->set_rules('Floor', 'الطابق', 'required');
        }

        $post[1] = array('Ownership', 'PeriodTime', 'Type', 'AddressAr', 'DescriptionAr', 'Governorate', 'NumOfRooms', 'NumOfBathRooms', 'AreaSpace', 'meridian', 'latitude',
            'TypeOfProperty', 'Parking', 'PriceOfMeter', 'Floor', 'GSM', 'Name', 'Elevator', 'Furnished', 'TypeOfCladding', 'Interphone', 'Summer', 'Winter');
        if ($this->form_validation->run() == true) {
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
            $area = $this->input->post('area');
            if ($_SESSION['admin'] != 1) {
                $data = $this->Posts->get_userInfo($_SESSION['userId']);
                $Name = $data['name'];
                $GSM = $data['gsm'];
            }
            $active = 2;
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                $active = 1;
            }
            if ($Parking == null) {
                $Parking = 0;
            }
            if ($Interphone == null) {
                $Interphone = 0;
            }
            if ($Furnished == null) {
                $Furnished = 0;
            }
            if ($Elevator == null) {
                $Elevator = 0;
            }

            $this->Posts->SetPost($session, $PeriodTime, $Ownership, $idOwnershipRelation, $idPost, $Type, $DescriptionEn, $DescriptionAr, $AddressEn, $AddressAr, $NumOfRooms,
                $NumOfBathRooms, $AreaSpace, $meridian, $latitude, $TypeOfProperty, $DateOfConstruction, $Parking, $PriceOfMeter, $Floor, $Elevator, $TypeOfCladding,
                $Furnished, $Interphone, $Summer, $Winter, $userID, $Governorate, $tabu, $active, $GSM, $Name, $area);

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
//        echo validation_errors();
    }

    public function PostsData($user_id = null)
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
//        userId
        if ($_SESSION['admin'] == 1) {
            if (isset($user_id)) {
                $col_where = array('p_active !=', 'p_user_id');
                $where = array('4', $user_id);
//                echo $user_id;

            } else {
                $col_where = array('p_active !=');
                $where = array('4');
            }

        } else {
            $col_where = array('p_active !=', 'p_user_id');
            $where = array('4', $_SESSION['userId']);
        }
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
            $item_id = 'state_' . $customers->p_id;
            if ($row['active'] == 1) {
                $row['active'] = '<span class="label label-success" >نشط</span>';
            } else if ($row['active'] == 0) {
                $row['active'] = '<span class="label label-warning"  id="' . $item_id . '">غير نشط</span>';
            } else if ($row['active'] == 2) {
                $row['active'] = '<span class="label bg-orange"  id="' . $item_id . '">يحتاج الى موافقة</span>';
            } elseif ($row['active'] == 3) {
                $row['active'] = '<span class="label bg-yellow"  id="' . $item_id . '">مباع</span>';
            } elseif ($row['active'] == 4) {
                $row['active'] = '<span  class="label label-danger"  id="' . $item_id . '">محذوف</span>';
            } else {
                $row['active'] = '<span class="label label-default"  id="' . $item_id . '"><i class="fa fa-minus"> </i></span>';

            }
            $row['view'] = '<a href="' . base_url() . 'Details/' . $customers->p_number . '">' . _ViewPost . '</a>';
            $row['option'] = ' <a class="btn btn-xs btn-primary" href="' . base_url('MemberArea/edit_post/' . $customers->p_id) . '"  id="' . $customers->p_id . '"><i class="fa fa-edit"></i></a>';
            if ($customers->p_active != 4) {
                $row['option'] .= ' <button class="btn btn-xs btn-danger remove_post" id="' . $customers->p_id . '"><i class="fa fa-trash"></i></button> ';
            }

            if ($_SESSION['admin'] == 1) {

                if ($customers->p_active != 0) {
                    $row['option'] .= ' <button class="btn btn-xs btn-wrong non_active" id="' . $customers->p_id . '">ألغاء تفعيل</button> ';
                }
                if ($customers->p_active != 3) {
                    $row['option'] .= ' <button class="btn btn-xs btn-default product_sold" id="' . $customers->p_id . '">مباع</button>';
                }
                if ($customers->p_active == 3) {
                    $row['option'] .= ' <button class="btn btn-xs btn-default product_non_sold" id="' . $customers->p_id . '">  غير مباع</button>';

                }
                if ($customers->p_active == 0) {
                    $row['option'] .= ' <button class="btn btn-xs btn-success product_active" id="' . $customers->p_id . '">  تفعيل</button>';

                }
                if ($customers->p_vip == 0) {
                    $row['option'] .= ' <button class="btn btn-xs btn-info vip" id="' . $customers->p_id . '"> VIP</button>';
                }

                if ($customers->p_vip == 1) {
                    $row['option'] .= ' <button class="btn btn-xs btn-info un_vip" id="' . $customers->p_id . '"> UN VIP</button>';
                }


            }

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

    public function Posts($user_id = null)
    {
//        $this->load->view('admin/include/templet/notification.php');
//        $this->load->view('admin/include/templet/nav.php');
//        $this->load->view('admin/proudacts_list');
        $this->render_page('proudacts_list');
    }

    public function pendingPost()
    {
//        $this->load->view('admin/include/templet/notification.php');
//        $this->load->view('admin/include/templet/nav.php');
//        $this->load->view('admin/pending_list');
        if (isset($_SESSION['admin']) && $_SESSION['admin'] != 1)
            redirect(base_url());
        $this->render_page('pending_list');

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
            $row['view'] = '<a href="' . base_url() . 'Details/' . $customers->p_number . '">' . _ViewPost . '</a>';
            $row['edit'] = '<button data-id="' . $customers->p_id . '" data-active="1" class="btn btn-md btn-default btn-xs edit-btn">الموافقة</button><button data-id="' . $customers->p_id . '" data-active="4" class="btn btn-md btn-xs edit-btn btn-danger">الحذف</button>';
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
//        $this->load->view('admin/include/templet/notification.php');
//        $this->load->view('admin/include/templet/nav.php');
//        $this->load->view('admin/users');
        if (isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
            redirect(base_url('MemberArea/addProduct'));
        }
        $this->render_page('users');
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
            'u_code',
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
            $row['code'] = $customers->u_code;
            $row['max_product'] = '';
            if ($customers->u_max_product == null) {
                $row['max_product'] = '<span> <i class="fa fa-minus"></i> </span>';
            } else {
                $row['max_product'] = $customers->u_max_product;

            }
            if ($row['active'] == 1) {
                $row['active'] = '<span class="label label-success">نشط</span>';
            } else if ($row['active'] == 0) {
                $row['active'] = '<span class="label label-warning">غير نشط</span>';
            } else if ($row['active'] == 2) {
                $row['active'] = '<span class="label label-danger">مسؤول</span>';
            }
            if ($_SESSION['admin'] == 1) {
                $row['option'] = '<button class="btn btn-xs btn-primary update " name="update" id="' . $customers->u_id . '">
تعديل</button>';
                $row['option'] .= ' <a class="btn btn-xs btn-info" href="' . base_url('MemberArea/Posts/' . $row['id']) . '">فتح العقارات</a>';
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

    public function get_data_user()
    {
        $id = $this->input->post('id');
        $this->load->model('Posts');
        $data = $this->Posts->get_data_user($id);
        $data = $data[0];
        echo json_encode($data);
    }

    public function LogOut()
    {
        $this->session->sess_destroy();
        $newURL = base_url();
        header('Location: ' . $newURL);
    }

    function set_data_user()
    {
        $this->load->model('Posts');
        $id = $this->input->post('id_user');
        if ($this->input->post('max_product') != null) {
            $data['u_max_product'] = $this->input->post('max_product');
        }
        if ($this->input->post('state') != null) {
            $data['u_active'] = $this->input->post('state');
            if ($data['u_active'] == 1) {
                $gsm = $this->Posts->get_user_value(array('u_id' => $id), 'u_gsm');
                $this->active_gsm($gsm);
            }
        }
        $this->Posts->set_data_user($data, $id);
        redirect(base_url('MemberArea/users'));
    }

    function change_state($para, $id = null)
    {

        $post_id = $this->input->post('post');
        if ($id != null)
            $post_id = $id;
        $this->load->model('Posts');
        if ($para == 'remove')
            $this->Posts->change_state_post($post_id, 4);
        if ($para == 'sold')
            $this->Posts->change_state_post($post_id, 3);
        if ($para == 'non_sold')
            $this->Posts->change_state_post($post_id, 1);
        if ($para == 'non_active')
            $this->Posts->change_state_post($post_id, 0);
        if ($para == 'active')
            $this->Posts->change_state_post($post_id, 1);
        if ($para == 'un_vip') {
            $this->Posts->change_state_post($post_id, 0, false);

        }
        if ($para == 'vip') {
            $this->Posts->change_state_post($post_id, 1, false);

        }


    }

    function edit_post($PostId)
    {
        if (!IsMyProduct($PostId)) {
            redirect(base_url('MemberArea'));
        }

        $this->load->model('Posts');
        $Posts = $this->Posts->GetPost_admin($PostId);
        $data = $this->InitializedPost();
        $data['posts'] = $Posts[0];
        $this->render_page('editPost', $data);
    }

    function post_edit()
    {

        $this->form_validation->set_rules('Governorate', 'المحافظة', 'required');
        $this->form_validation->set_rules('area', 'المنطقة', 'required');
        $this->form_validation->set_rules('Ownership', 'الغرض', 'required');
        $this->form_validation->set_rules('Type', 'النوع', 'required');
        $this->form_validation->set_rules('tapu', 'الطابو', 'required');
        $this->form_validation->set_rules('TypeOfProperty', 'سجل العقار', 'required');
        $this->form_validation->set_rules('AddressAr', 'العنوان', 'required');
        $this->form_validation->set_rules('DescriptionAr', 'شرح عن العقار', 'required');
        $this->form_validation->set_rules('price', 'السعر', 'required');
        $this->form_validation->set_rules('AreaSpace', 'المساحة', 'required|integer');
        if ($_POST['Ownership'] == "010A6B80-26E9-477E-BEDC-E89D0BFA8BA3" ||
            $_POST['Ownership'] == "dfd91978-5567-11e9-8885-3a9d631c5f8c") {
            $this->form_validation->set_rules('PeriodTime', 'الفترة الزمنية', 'required|integer');
        }
        if ($_POST['Type'] == '54E5A884-7806-4FB2-ADEA-62FCA17136C0' ||
            $_POST['Type'] == '56108eec-6b43-11e9-830a-323881e0e0c0' ||
            $_POST['Type'] == '6D0C22D2-3EF4-4E32-A99F-D5F685C0B651' ||
            $_POST['Type'] == 'AB566B9B-1D3D-422C-BA62-4347773FB574' ||
            $_POST['Type'] == 'FB76F9FA-78C3-4D9C-A3EC-FDB1ED6F090B'
        ) {
            $this->form_validation->set_rules('NumOfRooms', 'عدد الغرف', 'required');
            $this->form_validation->set_rules('NumOfBathRooms', 'عدد الحمامات', 'required');
            $this->form_validation->set_rules('TypeOfCladding', 'الكسوة', 'required');
            $this->form_validation->set_rules('Floor', 'الطابق', 'required');
        }
        if ($this->form_validation->run() == true) {
            $data['p_type'] = $this->input->post('Type');;
            $data['p_description_en'] = $this->input->post('DescriptionAr');
            $data['p_description_ar'] = $this->input->post('DescriptionAr');
            $data['p_address_ar'] = $this->input->post('AddressAr');
            $data['p_address_en'] = $this->input->post('AddressAr');
            $data['p_numOfRooms'] = $this->input->post('NumOfRooms');
            $data['p_numOfBathRooms'] = $this->input->post('NumOfBathRooms');
            $data['p_areaSpace'] = $this->input->post('AreaSpace');
            $data['p_meridian'] = $this->input->post('meridian');
            $data['p_latitude'] = $this->input->post('latitude');
            $data['p_typeOfProperty'] = $this->input->post('TypeOfProperty');
            $data['p_parking'] = $this->input->post('Parking');
            $data['p_priceOfMeter'] = $this->input->post('PriceOfMeter');
            $data['p_floor'] = $this->input->post('Floor');
            $data['p_elevator'] = $this->input->post('Elevator');
            $data['p_furnished'] = $this->input->post('Furnished');
            $data['p_typeOfCladding'] = $this->input->post('TypeOfCladding');
            $data['p_prepareOfTapu'] = $this->input->post('tapu');
            $data['p_interphone'] = $this->input->post('Interphone');
            $data['p_summer'] = $this->input->post('Summer');
            $data['p_winter'] = $this->input->post('Winter');
            if ($_SESSION['admin'] != 1) {
                $user = $this->Posts->get_userInfo($_SESSION['userId']);
                $data['p_userInfo'] = $user['name'];
                $data['p_GMS'] = $user['gsm'];
            } else {
                if (isset($_POST['p_userInfo']) && $_POST['p_userInfo'] != null) {
                    $data['p_userInfo'] = $this->input->post('Name');
                }
                if (isset($_POST['GSM']) && $_POST['GSM'] != null) {
                    $data['p_gsm'] = $this->input->post('GSM');
                }

            }
            $data['area'] = $this->input->post('area');
            $data['p_governorate_id'] = $this->input->post('Governorate');

            $this->load->model('Posts');
            $idPost = $this->input->post('p_id');
            $this->Posts->update_post($idPost, $data);
            $this->Posts->update_price($idPost, $this->input->post('price'));
            $session = $this->session->userdata('session');
            if (isset($_FILES['uploadMain'])) {

                $files = $_FILES['uploadMain']['name'];
                if (count($files) > 0) {
                    $this->Posts->drop_main_image($this->input->post('p_id'));
                }
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
                if (count($files) > 0) {
                    $this->Posts->drop_image($this->input->post('p_id'));
                }
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
            redirect(base_url('/MemberArea/edit_post/' . $idPost));
        } else {
//            echo validation_errors();
            $this->load->model('Posts');
            $idPost = $this->input->post('p_id');
            $Posts = $this->Posts->GetPost_admin($idPost);
            $data = $this->InitializedPost();
            $data['posts'] = $Posts[0];
            $this->render_page('editPost', $data);

        }

    }

    function user_active($userID = null)
    {
        if (isset($userID)) {
            $data['isUserActive'] = 'true';;
            $this->render_page('products_user', $data);
        } else {
            $this->render_page('users_active');
        }

    }

    function user_product($gsm)
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
//        userId
        if ($_SESSION['admin'] == 1) {
            $col_where = array('p_active !=', 'p_gsm');
            $where = array('4', $gsm);
//                echo $user_id;


        } else {
            redirect(base_url());
        }
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
            $item_id = 'state_' . $customers->p_id;
            if ($row['active'] == 1) {
                $row['active'] = '<span class="label label-success" >نشط</span>';
            } else if ($row['active'] == 0) {
                $row['active'] = '<span class="label label-warning"  id="' . $item_id . '">غير نشط</span>';
            } else if ($row['active'] == 2) {
                $row['active'] = '<span class="label bg-orange"  id="' . $item_id . '">يحتاج الى موافقة</span>';
            } elseif ($row['active'] == 3) {
                $row['active'] = '<span class="label bg-yellow"  id="' . $item_id . '">مباع</span>';
            } elseif ($row['active'] == 4) {
                $row['active'] = '<span  class="label label-danger"  id="' . $item_id . '">محذوف</span>';
            } else {
                $row['active'] = '<span class="label label-default"  id="' . $item_id . '"><i class="fa fa-minus"> </i></span>';

            }
            $row['view'] = '<a href="' . base_url() . 'Details/' . $customers->p_number . '">' . _ViewPost . '</a>';
            $row['option'] = ' <a class="btn btn-xs btn-primary" href="' . base_url('MemberArea/edit_post/' . $customers->p_id) . '"  id="' . $customers->p_id . '"><i class="fa fa-edit"></i></a>';
            if ($customers->p_active != 4) {
                $row['option'] .= ' <button class="btn btn-xs btn-danger remove_post" id="' . $customers->p_id . '"><i class="fa fa-trash"></i></button> ';
            }

            if ($_SESSION['admin'] == 1) {

                if ($customers->p_active != 0) {
                    $row['option'] .= ' <button class="btn btn-xs btn-wrong non_active" id="' . $customers->p_id . '"> <i class="fa fa-remove"></i>ألغاء تفعيل</button> ';
                }
                if ($customers->p_active != 3) {
                    $row['option'] .= ' <button class="btn btn-xs btn-default product_sold" id="' . $customers->p_id . '">مباع</button>';
                }
                if ($customers->p_active == 3) {
                    $row['option'] .= ' <button class="btn btn-xs btn-default product_non_sold" id="' . $customers->p_id . '">  غير مباع</button>';

                }
                if ($customers->p_active == 0) {
                    $row['option'] .= ' <button class="btn btn-xs btn-success product_active" id="' . $customers->p_id . '">  <i class="fa fa-check-circle"></i> تفعيل</button>';

                }
                if ($customers->p_vip == 0) {
                    $row['option'] .= ' <button class="btn btn-xs btn-info vip" id="' . $customers->p_id . '"> VIP <i class="fa fa-star"></i></button>';
                }

                if ($customers->p_vip == 1) {
                    $row['option'] .= ' <button class="btn btn-xs btn-info un_vip" id="' . $customers->p_id . '"> UN VIP</button>';
                }
                $row['option'] .= ' <button id="' . $customers->p_id . '" class="btn btn-xs btn-success accepted-gsm"   >قبول <i class="fa fa-check"></i></button>';

            }

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

    function user_active_data($userID = null)
    {
        /*
                $col_ord = array(
                    'u_id',
                    'u_name',
                    'u_gsm',
                    'u_password',
                    'u_birthday',
                    'u_reset',
                    'u_code',
                    'u_timestamp',
                    'count(posts.p_id) as cnt'
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
                $joinTable[0] = 'posts';
                $joinCol[0] = 'u_gsm = p_gsm';
                $col_where = 'u_active';
                $where= '1';
          */
        $this->load->model('MoDataTable');
        $query = 'SELECT users.* ,COUNT(posts.p_id) as cnt FROM users,posts WHERE posts.p_gsm = users.u_gsm and posts.p_user_activtion is null GROUP by users.u_id';
        $list = $this->MoDataTable->get_datatables_by_query($query);
        $data = array();
        foreach ($list as $customers) {
            $row = array();
            if ($customers->u_id != NULL) {
                $row['id'] = $customers->u_id;

                $row['name'] = $customers->u_name;
                $row['gsm'] = $customers->u_gsm;
                $row['timestamp'] = date('m/d/Y H:i:s', $customers->u_timestamp);
                $row['option'] = '<button class="btn btn-xs btn-success success" id="' . $customers->u_gsm . '">قبول</button>';
                $row['option'] .= ' <a href="' . base_url("MemberArea/user_active/" . $customers->u_gsm) . '" class="btn btn-xs btn-primary">فتح العقارات</a>';
                $row['view'] = $customers->cnt;
                $data[] = $row;
            }
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->MoDataTable->count_all_by_query($query),
            "recordsFiltered" => $this->MoDataTable->count_filtered_by_query($query),
            "data" => $data,
        );
        echo json_encode($output);

    }

    function active_gsm($gsm)
    {
//        echo $gsm;
        $where = array();
        $update = array();
        $this->load->model('Posts');
        $userID = $this->Posts->get_user_value(array('u_gsm' => $gsm), 'u_id');
        $where['p_gsm'] = $gsm;
        $update['p_user_activtion'] = $userID;
        if (count($where) > 0 && count($update) > 0)
            $this->Posts->update_posts($where, $update);
        echo json_encode(array('response' => 1));
    }

    function active_admin_gsm()
    {
        $gsm = $this->input->post('id');
        $post = null;
        if (isset($_POST['post']))
            $post = $this->input->post('post');
        $this->load->model('Posts');
        $Data = $this->Posts->updatePostsGsm($gsm, $post);
//        $this->db->last_query();
        if ($Data) {
            echo 1;
        } else
            echo 0;
    }

    function num_of_view_f()
    {
        $data = $this->db->order_by('p_timestamp', ' DESC')->limit(140)->get('posts')->result_array();

        for ($j = 1; $j <= 7; $j++) {

            for ($i = ($j-1)*20; $i < $j*20; $i++) {
                if ($j == 1) {
                    $num = rand(1, 10);
                } else {
                    $num = rand($j, $j + 4);
                }
                $this->db->where('p_id', $data[$i]['p_id'])->set('p_numOfView_f', $data[$i]['p_numOfView_f'] + $num)->update('posts');
            }
        }

    }
}