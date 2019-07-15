<?php
/**
 * Created by PhpStorm.
 * User: riadsasila
 * Date: 10/27/18
 * Time: 10:40 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class UsersAuth extends CI_Model
{
    public function CheckSession($SessionKey){
        $this->db->where('us_id', $SessionKey);
        $this->db->order_by('us_timestamp', "desc");
        $this->db->limit(1);
        $this->db->from('users_sessions');
        return $this->db->get()->result_array();
    }

    public function sendSMS($msg,$gsm){
        $password = 'arTak111';
        $user = 'SAY467';
        $from = 'Akarkom';
        $msg = urlencode($msg);
        $url = 'https://services.mtnsyr.com:7443/General/MTNSERVICES/ConcatenatedSender.aspx?User='.$user.'&Pass='.$password.'&From='.$from.'&Gsm='.$gsm.'&Msg='.$msg.'&Lang=1';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);
        curl_close($ch);
    }

    public function createSession($session,$userID,$oldSession,$app_v,$os,$ip,$lang)
    {
        if ($lang){
            $lang = "en";
        }else{
            $lang = "ar";
        }
        $data = array(
            'us_id' => $session,
            'us_user_id' => $userID,
            'us_old_session' => $oldSession,
            'us_appVer' => $app_v,
            'us_os' => $os,
            'us_ip' => $ip,
            'us_lang' => $lang,
            'us_mac_address' => null,
            'us_token' => null,
            'us_imei' => null,
        );
        $this->db->insert('users_sessions', $data);
    }

    public function GetVersion($os)
    {
        $this->db->where('os', $os);
        $this->db->from('version');
        $this->db->order_by('timestamp', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }

    public function checkGSM($gsm)
    {
        $this->db->where('u_gsm', $gsm);
        $this->db->from('users');
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }

    public function CheckCode($gsm,$Code)
    {
        $this->db->where('u_code', $Code);
        $this->db->where('u_gsm', $gsm);
        $this->db->from('users');
        $this->db->limit(1);
        return $this->db->get()->result_array();
//        $this->db->get()->result_array();
//        var_dump($this->db->last_query());exit;
    }

    public function register($id,$name,$GSM,$Password,$active = 1)
    {
        $code = mt_rand(100, 999) . '-'.mt_rand(100, 999);
        $data = array(
            'u_id' => $id,
            'u_name' => $name,
            'u_gsm' => $GSM,
            'u_password' => $Password,
            'u_active' => $active,
            'u_code' => $code,
            'u_reset' => 0
        );
//        $code = "000-000";
        $msg = 'The verification code of Akarcom application is: '.$code .'. The code should not be given to anyone.';
        $GSM = (int) $GSM;
        $GSM = (string) $GSM;
        $GSMNa = '963'.$GSM;
        $this->sendSMS($msg,$GSMNa);
        $this->db->insert('users', $data);

    }

    public function login($GSM, $Password)
    {
        $this->db->where('u_gsm', $GSM);
        $this->db->where('u_password', $Password);
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    public function VerificationCode($id){
        $this->db->set('u_active', 1);
        $this->db->where('u_id', $id);
        $this->db->update('users');
    }

    public function Forgate($GSM){
        $this->db->where('u_gsm', $GSM);;
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    public function SetForgateCode($Id,$GSM)
    {
        $code =  mt_rand(100, 999) . '-'.mt_rand(100, 999);
//        $code = '000-000';
        $this->db->set('u_code',$code);
        $this->db->set('u_reset', 1);
        $this->db->where('u_id', $Id);
        $this->db->update('users');

        $msg = 'The verification code of Pegasus application is: '.$code .'. The code should not be given to anyone.';
        $GSM = (int) $GSM;
        $GSM = (string) $GSM;
        $GSMNa = '963'.$GSM;
        $this->sendSMS($msg,$GSMNa);
    }

    public function checkPasswordUser($id, $password)
    {
        $this->db->where('u_id', $id);
        $this->db->where('u_password', $password);
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    public function ChangePassword($Id,$password){
        $this->db->set('u_password', $password);
        $this->db->where('u_id', $Id);
        $this->db->update('users');
    }

    public function getProfileUser($ID){
        $this->db->where('u_id', $ID);
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    public function updateProfileUser($id,$name,$birthday,$gsm,$active)
    {
        if ($active == 0){
            $this->SetForgateCode($id,$gsm);
            $this->db->set('u_name', $name);
            $this->db->set('u_gsm', $gsm);
            $this->db->set('u_birthday', $birthday);
            $this->db->set('u_active', 0);
            $this->db->set('u_reset', 0);
            $this->db->where('u_id', $id);
            $this->db->update('users');
        }else{
            $this->db->set('u_name', $name);
            $this->db->set('u_birthday', $birthday);
            $this->db->where('u_id', $id);
            $this->db->update('users');
        }
    }

    public function SetToken($session,$token){
        $this->db->set('us_token', $token);
        $this->db->where('us_id', $session);
        $this->db->update('user_sessions');
    }

    public function addNumber($number){
        $data = array(
            'number' => $number
        );
        $this->db->insert('test', $data);
    }


}