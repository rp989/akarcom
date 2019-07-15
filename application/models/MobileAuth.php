<?php
/**
 * Created by PhpStorm.
 * User: riadsasila
 * Date: 9/11/18
 * Time: 6:46 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MobileAuth extends CI_Model
{
    public function getTimeStamp(){
        $date = new DateTime();
        return $date->getTimestamp();
    }

    public function sendSMS($msg,$gsm){
        $password = 'ASUS111';
        $user = 'PEG642';
        $from = 'Pegasus';
        $msg = urlencode($msg);
        $url = 'http://services.mtn.com.sy/General/MTNSERVICES/ConcatenatedSender.aspx?User='.$user.'&Pass='.$password.'&From='.$from.'&Gsm='.$gsm.'&Msg='.$msg.'&Lang=1';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);
        curl_close($ch);
    }

    public function register($id,$name,$GSM,$Password)
    {
        $code = mt_rand(100, 999) . '-'.mt_rand(100, 999);
        $msg = 'The verification code of Pegasus application is: '.$code .'. The code should not be given to anyone.';
        $GSM = (int) $GSM;
        $GSM = (string) $GSM;
        $GSMNa = '963'.$GSM;
        $this->sendSMS($msg,$GSMNa);
        $data = array(
            'id' => $id,
            'name' => $name,
            'gsm' => $GSM,
            'password' => $Password,
            'active' => 0,
            'pitcher-id' => null,
            'code' => $code,
            'reset' => 0,
            'balance' => 0,
        );
        $this->db->insert('users', $data);

    }

    public function login($GSM, $Password)
    {
        $this->db->where('gsm', $GSM);
        $this->db->where('password', $Password);
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    public function GetVersion($os)
    {
        $this->db->where('os', $os);
        $this->db->from('version');
        $this->db->order_by('timestamp', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }

    public function checkCode($gsm, $code)
    {
        $this->db->where('gsm', $gsm);
        $this->db->where('code', $code);
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    public function ChangePassword($Id,$password){
        $this->db->set('password', $password);
        $this->db->where('id', $Id);
        $this->db->update('users');
    }

    public function checkGSM($gsm)
    {
        $this->db->where('gsm', $gsm);
        $this->db->from('users');
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }

    public function SetForgateCode($Id,$GSM)
    {
        $code =  mt_rand(100, 999) . '-'.mt_rand(100, 999);
        $this->db->set('code',$code);
        $this->db->set('reset', 1);
        $this->db->where('id', $Id);
        $this->db->update('users');

        $msg = 'The verification code of Pegasus application is: '.$code .'. The code should not be given to anyone.';
        $GSM = (int) $GSM;
        $GSM = (string) $GSM;
        $GSMNa = '963'.$GSM;
        $this->sendSMS($msg,$GSMNa);
    }

    public function Forgate($GSM){
        $this->db->where('gsm', $GSM);
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    public function VerificationCode($id){
        $this->db->set('active', 1);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function createSession($session,$userID,$oldSession,$app_v,$os,$ip,$user_agent)
    {
        $data = array(
            'id' => $session,
            'user-id' => $userID,
            'old-session' => $oldSession,
            'app-version' => $app_v,
            'os' => $os,
            'ip' => $ip,
            'mac-address' => null,
            'imei' => null,
            'user_agent' => $user_agent
        );
        $this->db->insert('user_sessions', $data);
    }

    public function updateSessionUser($SessionOld,$userID){
        $this->db->set('user-id', $userID);
        $this->db->where('id', $SessionOld);
        $this->db->update('user_sessions');
    }

    public function checkPasswordUser($id, $password)
    {
        $this->db->where('id', $id);
        $this->db->where('password', $password);
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    public function getProfileUser($ID){
        $this->db->where('id', $ID);
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    public function updateProfileUser($id,$name,$gsm,$active)
    {
        if ($active == 0){
            $this->SetForgateCode($id,$gsm);
            $this->db->set('name', $name);
            $this->db->set('gsm', $gsm);
            $this->db->set('active', 0);
            $this->db->set('reset', 0);
            $this->db->where('id', $id);
            $this->db->update('users');
        }else{
            $this->db->set('name', $name);
            $this->db->where('id', $id);
            $this->db->update('users');
        }
    }

    public function SetAddress($id,$UserId,$street,$GovernorateId,$floor,$name,$address,$string){
        $data = array(
            'id' => $id,
            'user-id' => $UserId,
            'street' => $street,
            'active' => 1,
            'governorate-id' => $GovernorateId,
            'floor' => $floor,
            'name' => $name,
            'address' => $address,
            'string' => $string
        );
        $this->db->insert('users_address',$data);
    }

    public function UpdateAddress($id,$street,$GovernorateId,$floor,$name,$address,$string){
        $this->db->set('street', $street );
        $this->db->set('governorate-id', $GovernorateId );
        $this->db->set('floor', $floor );
        $this->db->set('name', $name );
        $this->db->set('address', $address );
        $this->db->set('string', $string );
        $this->db->where('id', $id);
        $this->db->update('users_address');
    }

    public function SetAddressAuto($id,$UserId,$meridians,$latitudes,$name){
        $data = array(
            'id' => $id,
            'user-id' => $UserId,
            'meridian' => $meridians,
            'latitude' => $latitudes,
            'active' => 1,
            'name' => $name
        );
        $this->db->insert('users_address',$data);
    }

    public function DeleteAddress($id){
        $this->db->set('active', 4);
        $this->db->where('id', $id);
        $this->db->update('users_address');
    }

    public function getAddresses($userId)
    {
        $this->db->select('*, ua.active as ua_active , g.active as g_active , ua.id as ua_id , g.id as g_id , g.timestamp as g_timestamp , ua.timestamp as ua_timestamp');
        $this->db->where('ua.active != ', 4);
        $this->db->where('ua.`user-id`', $userId);
        $this->db->from('users_address ua');
        $this->db->join('governorates g', 'g.id = ua.`governorate-id`','LEFT');
        return $this->db->get()->result_array();
    }

    public function getGovernorates(){
        $this->db->where('active != ', 4);
        $this->db->from('governorates');
        return $this->db->get()->result_array();
    }

    public function GetPermissionName() {
        $this->db->select('distinct(name)');
        $this->db->from('admins_permissions');
        return $this->db->get()->result_array();
    }

    public function SetBasket($id,$addressID,$timeAfter,$state) {
        $data = array(
            'id' => $id,
            'address-id' => $addressID,
            'after-time-result' => null,
            'after-time' => $timeAfter,
            'active' => $state
        );
        $this->db->insert('users_baskets',$data);
    }

    public function GetBasket($userId) {
        $this->db->select('* , u.id as u_id ,u.name as u_name , ua.id as ua_id , ua.name as ua_name , ub.id as ub_id , ub.timestamp as ub_timestamp, ub.active as ub_active');
        $this->db->where('ua.`user-id`', $userId);
        $this->db->where('ub.active !=', 4);
        $this->db->from('users_address ua');
        $this->db->join('users_baskets ub', 'ub.`address-id` = ua.id');
        $this->db->join('users u', 'u.id = ua.`user-id`');
        $this->db->order_by('ub.timestamp', 'DESC');
        return $this->db->get()->result_array();
    }

    public function GetRequest($basketId) {
        $this->db->select('* , ur.id as ur_id  , p.id as p_id');
        $this->db->where('ur.`basket-id`', $basketId);
        $this->db->from('users_requests ur');
        $this->db->join('products p', 'p.id = ur.`product-id`');
        return $this->db->get()->result_array();
    }

    public function SetRequest($id,$idBasket,$productId,$count,$note) {
        $data = array(
            'id' => $id,
            'basket-id' => $idBasket,
            'product-id' => $productId,
            'count' => $count,
            'note' => $note
        );
        $this->db->insert('users_requests',$data);
    }

    public function ChangeStateBasket($id,$state,$time = null) {
        if ($time != null){
            $this->db->set('after-time-result', $time);
        }
        $this->db->set('active', $state);
        $this->db->where('id', $id);
        $this->db->update('users_baskets');
    }

    public function SendReq(){
        $url = 'https://www.nayotex-technologies.com/carsApplication/public/api/login';
        $data = array("identifier" => "First","password" => "last");

        $postdata = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Api-Key: DED537D5C461BF9F78412C453264520A'));
        $result = curl_exec($ch);
        curl_close($ch);
        print_r ($result);
    }

    public function GetGSM(){
        $this->db->distinct();
        $this->db->like('p_gsm', '09');
        $this->db->from('posts');
        return $this->db->get()->result_array();
    }


}