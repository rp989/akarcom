<?php
/**
 * Created by PhpStorm.
 * User: riadsasila
 * Date: 10/29/18
 * Time: 12:35 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Model
{
    public function GetAllGovernorate()
    {
        $this->db->where('g_active !=', 4);
        $this->db->from('governorates');
        $this->db->order_by('g_timestamp', 'DESC');
        return $this->db->get()->result_array();
    }

    public function SetGovernorate($id, $nameEn, $nameAr, $meridian, $latitude, $active)
    {
        $data = array(
            'g_id' => $id,
            'g_name_en' => $nameEn,
            'g_name_ar' => $nameAr,
            'g_meridian' => $meridian,
            'g_latitude' => $latitude,
            'g_active' => $active
        );
        $this->db->insert('governorates', $data);
    }

    public function GetAllPosts($governorateId, $filter = null)
    {
        if ($filter) {
            if (isset($filter['types'])) {
                if (is_array($filter['types']) && (sizeof($filter['types']) > 0)) {
                    $this->db->group_start();
                    foreach ($filter['types'] as $key => $value) {
//                        if ($value == 1) {
//                            $value = '1EDBFAD2-6D05-4BDA-8FD6-AEA14B6B1BF8'; // ارض زراعية
//                        } elseif ($value == 2) {
//                            $value = '25600C82-BBC2-486C-926D-5AF03BC3FF68'; // رقم اكتتاب
//                        } elseif ($value == 3) {
//                            $value = '54E5A884-7806-4FB2-ADEA-62FCA17136C0'; // محل
//                        } elseif ($value == 4) {
//                            $value = '6D0C22D2-3EF4-4E32-A99F-D5F685C0B651'; // منزل
//                        } elseif ($value == 5) {
//                            $value = 'AB566B9B-1D3D-422C-BA62-4347773FB574'; // غرفة
//                        } elseif ($value == 6) {
//                            $value = 'CE1E1A5D-E4DA-48B1-A6F7-691B5207475F'; // معمل
//                        } elseif ($value == 7) {
//                            $value = 'DD82FFCE-154B-42E3-A930-F72F6E6219FB'; // استديو
//                        } elseif ($value == 8) {
//                            $value = 'EE6DC2DE-63F0-48F0-B78D-E8469B1D140F'; // فيلا
//                        } elseif ($value == 9) {
//                            $value = 'F03BA431-43A6-40C7-BD10-4FB9B0995A68'; // هنغار صناعي
//                        } elseif ($value == 10) {
//                            $value = 'FB76F9FA-78C3-4D9C-A3EC-FDB1ED6F090B'; // مكتب
//                        }

                        if ($key == 0) {
                            $this->db->where('p.p_type', $value);
                        } else {
                            $this->db->or_where('p.p_type', $value);
                        }
                    }
                    $this->db->group_end();
                }
            }
            if (isset($filter['ownership'])) {
                if (is_array($filter['ownership']) && (sizeOf($filter['ownership']) > 0)) {
                    $this->db->group_start();
                    foreach ($filter['ownership'] as $key => $value) {
                        if ($value == 1) {
                            $value = '010A6B80-26E9-477E-BEDC-E89D0BFA8BA3'; // ايجار
                        } elseif ($value == 2) {
                            $value = '7B2A8E04-6679-415A-BBDF-88738220AE63'; // بيع
                        } elseif ($value == 3) {
                            $value = 'dfd91978-5567-11e9-8885-3a9d631c5f8c'; // استثمار
                        }
                        if ($key == 0) {
                            $this->db->where('po_id', $value);
                        } else {
                            $this->db->or_where('po_id', $value);
                        }
                    }
                    $this->db->group_end();
                }
            }
            if (isset($filter['numOfRooms'])) {
                if ($filter['numOfRooms'] != -1) {
                    $this->db->group_start();
                    $this->db->where('p.p_numOfRooms', $filter['numOfRooms']);
                    $this->db->group_end();
                }
            }
            if (isset($filter['numOfBathRooms'])) {
                if ($filter['numOfBathRooms'] != -1) {
                    $this->db->group_start();
                    $this->db->where('p.p_numOfBathRooms', $filter['numOfBathRooms']);
                    $this->db->group_end();
                }
            }
            if (isset($filter['price'])) {
                if ($filter['price']['min'] != -1) {
                    $this->db->group_start();
                    $this->db->where('por_price >', $filter['price']['min']);
                    $this->db->group_end();
                }
                if ($filter['price']['max'] != -1) {
                    $this->db->group_start();
                    $this->db->where('por_price <', $filter['price']['max']);
                    $this->db->group_end();
                }
            }
            if (isset($filter['areaSpace'])) {
                if ($filter['areaSpace']['min'] != -1) {
                    $this->db->group_start();
                    $this->db->where('p_areaSpace >', $filter['areaSpace']['min']);
                    $this->db->group_end();
                }
                if ($filter['areaSpace']['max'] != -1) {
                    $this->db->group_start();
                    $this->db->where('p_areaSpace <', $filter['areaSpace']['max']);
                    $this->db->group_end();
                }
            }
            if (isset($filter['areaMap'])) {
                if ($filter['areaMap']['bottomRight']['latitude'] != -1 && $filter['areaMap']['topLeft']['latitude'] != -1 && $filter['areaMap']['topRight']['latitude'] != -1 && $filter['areaMap']['bottomRight']['latitude'] != -1) {
                    $this->db->group_start();
                    $this->db->where('p_latitude >', $filter['areaMap']['bottomRight']['latitude']);
                    $this->db->where('p_meridian >', $filter['areaMap']['topLeft']['meridian']);
                    $this->db->where('p_latitude <', $filter['areaMap']['topRight']['latitude']);
                    $this->db->where('p_meridian <', $filter['areaMap']['bottomRight']['meridian']);
                    $this->db->group_end();
                }
            }
        }
        if (isset($governorateId) && !empty($governorateId)) {
            if (!isset($filter['areaMap'])) {
                $this->db->group_start();
                $this->db->where('p.p_governorate_id', $governorateId);
                $this->db->group_end();
            }
        }
        $this->db->where('p_active !=', 4);
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        return $this->db->get()->result_array();
//                $this->db->get()->result_array();
//        var_dump($this->db->last_query());exit;
    }

    public function GetAllPostsToday()
    {
        $this->db->where('p_active !=', 4);
        $this->db->where('p_timestamp >', time() - 86400);
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        return $this->db->get()->result_array();
    }

    public function GetAllPostsWeb($filter = null, $page = null, $search = null, $vip = null)
    {
//        var_dump($filter);exit;
        if ($filter) {
            if (isset($filter['cladding'])) {
                $this->db->group_start();
                foreach ($filter['cladding'] as $key => $value) {
                    if ($key == 0) {
                        $this->db->where('p.p_typeOfCladding', $value);
                    } else {
                        $this->db->or_where('p.p_typeOfCladding', $value);
                    }
                }
                $this->db->group_end();
            }
            if (isset($filter['tapu'])) {
                foreach ($filter['tapu'] as $key => $value) {
                    $this->db->group_start();
                    if ($key == 0) {
                        $this->db->where('p.p_prepareOfTapu', $value);
                    } else {
                        $this->db->or_where('p.p_prepareOfTapu', $value);
                    }
                    $this->db->group_end();
                }
            }
            if (isset($filter['type'])) {
                $this->db->group_start();
                foreach ($filter['type'] as $key => $value) {
                    if ($key == 0) {
                        $this->db->where('p.p_type', $value);
                    } else {
                        $this->db->or_where('p.p_type', $value);
                    }
                }
                $this->db->group_end();
            }
            if (isset($filter['ownership'])) {
                $this->db->group_start();
                $this->db->where('po.po_id', $filter['ownership']);
                $this->db->group_end();
            }
            if (isset($filter['price-start']) && isset($filter['price-end'])) {
                $this->db->group_start();
                if ($filter['price-start'] != '∞') {
                    $this->db->where('por_price >', '%' . $filter['price-start'] . '%');
                }
                if ($filter['price-end'] != '') {
                    if ($filter['price-end'] != '∞') {
                        $this->db->where('por_price < %', '%' . $filter['price-end'] . '%');
                    }
                }
                $this->db->group_end();
            }
            if (isset($filter['governorates']) && !empty($filter['governorates'])) {
//                var_dump($filter['governorates']);exit;
                $this->db->group_start();
                $this->db->where('p.p_governorate_id', (string)$filter['governorates']);
                $this->db->group_end();
            }
        }
        $this->db->where('p_active !=', 4);
        $this->db->where('p_active !=', 0);
        $this->db->where('p_active !=', 2);
        if (isset($vip) && $vip == true) {
            $this->db->where('p_vip', '1');
        }
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        $this->db->order_by('p.p_timestamp', 'DESC');
        if (!$this->session->userdata('all') && (!isset($search) || $search == false)) {
            $this->db->limit(16);
        }
        if (isset($page) && (!isset($search) || $search == false)) {
            $this->db->limit(16, 16 * ($page - 1));
        }
        return $this->db->get()->result_array();

    }

    public function Get3Posts($governorateId, $latitude, $meridian)
    {
        $this->db->select(' *,( 3959 * acos( cos( radians(' . $latitude . ') ) * cos( radians( `p_latitude`) ) * 
                          cos( radians( `p_meridian` ) - radians(' . $meridian . ') ) + sin( radians(' . $latitude . ') ) * 
                          sin( radians(  `p_latitude` ) ) ) ) AS distance ');
        $this->db->where('p_active !=', 4);
        $this->db->where('p_active !=', 0);
        $this->db->where('p_latitude != ', $latitude);
        $this->db->where(' p_meridian != ', $meridian);
        $this->db->having(' distance < 25');
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        $this->db->order_by('distance', 'ASC');
        $this->db->limit(4);
        return $this->db->get()->result_array();
//        var_dump($this->db->last_query());
//        exit;
    }

    public function GetPostByUser($userId)
    {

        $this->db->where('p_active !=', 4);
//        $this->db->where('p_active !=', 4);
        $this->db->where('p_user_id', $userId);
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        return $this->db->get()->result_array();
    }

    public function GetPost($postId)
    {
        $this->changeCountOfVisit($postId);
//        $this->db->where('p_active !=', 4);
        $this->db->where('p_active !=', 4);
        if (strlen($postId) > 33) {
            $this->db->where('p_id', $postId);

        } else
            $this->db->where('p_number', $postId);
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        return $this->db->get()->result_array();
    }

    public function GetPost_admin($postId)
    {
        $this->changeCountOfVisit($postId);
//        $this->db->where('p_active !=', 4);
        $this->db->where('p_active !=', 4);
        $this->db->where('p_id', $postId);
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        return $this->db->get()->result_array();
    }

    public function changeCountOfVisit($postId)
    {
        $this->db->where('p_id', $postId);
        $this->db->from('posts');
        $result = $this->db->get()->result_array();
        $count = 0;
        $count_f = 0;

        if ($result) {
            foreach ($result as $item) {
                $count = $item['p_numOfView'];
                $count_f = $item['p_numOfView_f'];
            }
        }
        $count = (int)$count + 1;
        $this->db->set('p_numOfView', $count);
        $this->db->set('p_numOfView_f', $count_f);
        $this->db->where('p_id', $postId);
        $this->db->update('posts');
    }

    public function GetPostsNearMe($latitude, $meridian)
    {
        $latitudeLeft = (string)($latitude + 0.005325);
        $meridianLeft = (string)($meridian + 0.005325);

        $latitudeRight = (string)($latitude - 0.005325);
        $meridianRight = (string)($meridian - 0.005325);
        $this->db->where('p_active !=', 4);
        $this->db->group_start();
        $this->db->where('p_latitude >', $latitudeRight);
        $this->db->where('p_meridian >', $meridianRight);
        $this->db->group_end();
        $this->db->group_start();
        $this->db->where('p_latitude <', $latitudeLeft);
        $this->db->where('p_meridian <', $meridianLeft);
        $this->db->group_end();
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        return $this->db->get()->result_array();
//        $this->db->get()->result_array();
//        var_dump($this->db->last_query());exit;
    }

    public function AddToFavorite($id, $userId, $PostId)
    {
        $data = array(
            'uf_id' => $id,
            'uf_post_id' => $PostId,
            'uf_user_id' => $userId,
            'uf_active' => 1,
            'uf_timestamp' => time()
        );
        $this->db->insert('users_favorites', $data);
    }

    public function RemovedFromFavorites($userId, $PostId)
    {
        $this->db->set('uf_active', 0);
        $this->db->where('uf_user_id', $userId);
        $this->db->where('uf_post_id', $PostId);
        $this->db->update('users_favorites');
    }

    public function RemovedPosts($userId, $PostId)
    {
        $this->db->set('p_active', 4);
        $this->db->where('p_user_id', $userId);
        $this->db->where('p_id', $PostId);
        $this->db->update('posts');
    }

    public function SoldPost($userId, $PostId)
    {
        $this->db->set('p_active', 5);
        $this->db->where('p_user_id', $userId);
        $this->db->where('p_id', $PostId);
        $this->db->update('posts');
    }

    public function GetFavorite($userId)
    {
        $this->db->where('uf_user_id', $userId);
        $this->db->where('uf_active', 1);
        $this->db->from('users_favorites uf');
        $this->db->join('posts p', 'uf.uf_post_id = p.p_id');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        return $this->db->get()->result_array();
    }

    public function SetCladding($session, $id, $nameEn, $nameAr, $active)
    {
        //kaswaa
        $data = array(
            'pc_id' => $id,
            'pc_name_en' => $nameEn,
            'pc_name_ar' => $nameAr,
            'pc_active' => $active,
            'pc_timestamp' => time()
        );
        $this->db->insert('posts_cladding', $data);
    }

    public function SetTapu($session, $id, $nameEn, $nameAr, $active)
    {
        //Tapu
        $data = array(
            'pta_id' => $id,
            'pta_name_en' => $nameEn,
            'pta_name_ar' => $nameAr,
            'pta_active' => $active,
            'pta_timestamp' => time()
        );
        $this->db->insert('posts_tapu', $data);
    }

    public function SetProperties($session, $id, $nameEn, $nameAr, $active)
    {
        //type of
        $data = array(
            'pp_id' => $id,
            'pp_name_en' => $nameEn,
            'pp_name_ar' => $nameAr,
            'pp_active' => $active,
            'pp_timestamp' => time()
        );
        $this->db->insert('posts_properties', $data);
    }

    public function SetType($session, $id, $nameEn, $nameAr, $active)
    {
        //type
        $data = array(
            'pt_id' => $id,
            'pt_name_en' => $nameEn,
            'pt_name_ar' => $nameAr,
            'pt_active' => $active,
            'pt_timestamp' => time()
        );
        $this->db->insert('posts_types', $data);
    }

    public function SetOwnership($session, $id, $nameEn, $nameAr, $active)
    {
        //type
        $data = array(
            'po_id' => $id,
            'po_name_en' => $nameEn,
            'po_name_ar' => $nameAr,
            'po_active' => $active,
            'po_timestamp' => time()
        );
        $this->db->insert('posts_ownership', $data);
    }

    public function SetOwnershipRelation($session, $id, $idOwnership, $idPost, $price, $periodTime)
    {
        $data = array(
            'por_id' => $id,
            'por_ownership_id' => $idOwnership,
            'por_post_id' => $idPost,
            'por_price' => $price,
            'por_period_time' => $periodTime,
            'por_timestamp' => time()
        );
        $this->db->insert('posts_ownership_relation', $data);
    }

    public function updateOwnershipRelation($session, $id, $idOwnership, $idPost, $price, $periodTime)
    {
        $this->db->set('por_ownership_id', $idOwnership);
        $this->db->set('por_price', $price);
        $this->db->set('por_period_time', $periodTime);
        $this->db->set('por_timestamp', time());
        $this->db->where('por_post_id', $idPost);
        $this->db->update('posts_ownership_relation');
    }

    public function SetImages($session, $id, $postId, $main, $image)
    {
        $data = array(
            'pi_id' => $id,
            'pi_post_id' => $postId,
            'pi_main' => $main,
            'pi_image' => $image
        );
        $this->db->insert('posts_images', $data);
    }

    public function SetPost($session, $periodTime, $idOwnership, $idOwnershipRelation, $id, $typeId, $description_en, $description_ar, $address_en, $address_ar, $numOfRooms,
                            $numOfBathRooms, $areaSpace, $meridian, $latitude, $typeOfPropertyId,
                            $dateOfConstruction, $parking, $priceOfMeter, $floor, $elevator, $typeOfCladdingId,
                            $prepareOfFurnished, $interphone, $summer, $winter, $user_id, $governorate_id, $tapu, $active, $GSM = null, $Name = null, $area = null)
    {
        $data = array(
            'p_id' => $id,
            'p_type' => $typeId,
            'p_description_en' => $description_en,
            'p_description_ar' => $description_ar,
            'p_address_en' => $address_en,
            'p_address_ar' => $address_ar,
            'p_numOfRooms' => $numOfRooms,
            'p_numOfBathRooms' => $numOfBathRooms,
            'p_areaSpace' => $areaSpace,
            'p_meridian' => $meridian,
            'p_latitude' => $latitude,
            'p_typeOfProperty' => $typeOfPropertyId,
            'p_dateOfConstruction' => $dateOfConstruction,
            'p_parking' => $parking,
            'p_priceOfMeter' => null,
            'p_floor' => $floor,
            'p_elevator' => $elevator,
            'p_typeOfCladding' => $typeOfCladdingId,
            'p_furnished' => $prepareOfFurnished,
            'p_interphone' => $interphone,
            'p_summer' => $summer,
            'p_winter' => $winter,
            'p_user_id' => $user_id,
            'p_governorate_id' => $governorate_id,
            'p_prepareOfTapu' => $tapu,
            'p_active' => $active,
            'p_gsm' => $GSM,
            'p_userInfo' => $Name,
            'p_timestamp' => time(),
            'area' => $area
        );
        $this->db->insert('posts', $data);
//        echo  $this->db->last_query();
        $this->SetOwnershipRelation($session, $idOwnershipRelation, $idOwnership, $id, $priceOfMeter, $periodTime);
    }

    public function updatePost($session, $periodTime, $idOwnership, $idOwnershipRelation, $id, $typeId, $description_en, $description_ar, $address_en, $address_ar, $numOfRooms,
                               $numOfBathRooms, $areaSpace, $meridian, $latitude, $typeOfPropertyId,
                               $dateOfConstruction, $parking, $priceOfMeter, $floor, $elevator, $typeOfCladdingId,
                               $prepareOfFurnished, $interphone, $summer, $winter, $user_id, $governorate_id, $tapu, $active, $GSM = null, $Name = null)
    {
        $this->db->set('p_type', $typeId);
        $this->db->set('p_description_en', $description_en);
        $this->db->set('p_description_ar', $description_ar);
        $this->db->set('p_address_en', $address_en);
        $this->db->set('p_address_ar', $address_ar);
        $this->db->set('p_numOfRooms', $numOfRooms);
        $this->db->set('p_numOfBathRooms', $numOfBathRooms);
        $this->db->set('p_areaSpace', $areaSpace);
        $this->db->set('p_meridian', $meridian);
        $this->db->set('p_latitude', $latitude);
        $this->db->set('p_typeOfProperty', $typeOfPropertyId);
        $this->db->set('p_dateOfConstruction', $dateOfConstruction);
        $this->db->set('p_parking', $parking);
        $this->db->set('p_priceOfMeter', null);
        $this->db->set('p_floor', $floor);
        $this->db->set('p_elevator', $elevator);
        $this->db->set('p_typeOfCladding', $typeOfCladdingId);
        $this->db->set('p_furnished', $prepareOfFurnished);
        $this->db->set('p_interphone', $interphone);
        $this->db->set('p_summer', $summer);
        $this->db->set('p_winter', $winter);
        $this->db->set('p_governorate_id', $governorate_id);
        $this->db->set('p_prepareOfTapu', $tapu);
        $this->db->set('p_active', $active);
        $this->db->set('p_gsm', $GSM);
        $this->db->set('p_userInfo', $Name);
        $this->db->set('p_timestamp', time());
        $this->db->where('p_id', $id);
        $this->db->where('p_user_id', $user_id);
        $this->db->update('posts');
        $this->updateOwnershipRelation($session, $idOwnershipRelation, $idOwnership, $id, $priceOfMeter, $periodTime);
    }

    public function ChangeActivePost($session, $postId, $active)
    {
        $this->db->set('p_active', $active);
        $this->db->where('p_id', $postId);
        $this->db->update('posts');
    }

    public function ChangeActiveFavoritePost($postId)
    {
        $this->db->set('uf_active', 4);
        $this->db->where('uf_post_id', $this->session->userdata('userId'));
        $this->db->where('uf_user_id', $postId);
        $this->db->update('users_favorites');
    }

    public function getUserPost($userId)
    {
        $this->db->where('p_user_id', $userId);
        $this->db->where('p_active !=', 4);
        $this->db->from('posts');
        return $this->db->get()->result_array();
    }

    public function GetOwnership()
    {
        $this->db->where('po_active', 1);
        $this->db->from('posts_ownership');
        return $this->db->get()->result_array();
    }

    public function GetCladding()
    {
        $this->db->where('pc_active', 1);
        $this->db->from('posts_cladding');
        return $this->db->get()->result_array();
    }

    public function GetTapu()
    {
        $this->db->where('pta_active', 1);
        $this->db->from('posts_tapu');
        return $this->db->get()->result_array();
    }

    public function GetProperties()
    {
        $this->db->where('pp_active', 1);
        $this->db->from('posts_properties');
        return $this->db->get()->result_array();
    }

    public function GetType()
    {
        $this->db->where('pt_active', 1);
        $this->db->from('posts_types');
        $this->db->order_by('pt_timestamp', 'DESC');
        return $this->db->get()->result_array();
    }

    public function GetImagesOfPost($post_id)
    {
        $this->db->where('pi_post_id', $post_id);
        $this->db->where('pi_delete', 0);
        $this->db->from('posts_images');
        $this->db->order_by('pi_main', 'DESC');
        return $this->db->get()->result_array();
//        $this->db->get()->result_array();
//        var_dump($this->db->last_query());exit;
    }

    function count_all($filter = null)
    {
        if ($filter) {
            if (isset($filter['cladding'])) {
                $this->db->group_start();
                foreach ($filter['cladding'] as $key => $value) {
                    if ($key == 0) {
                        $this->db->where('p.p_typeOfCladding', $value);
                    } else {
                        $this->db->or_where('p.p_typeOfCladding', $value);
                    }
                }
                $this->db->group_end();
            }
            if (isset($filter['tapu'])) {
                foreach ($filter['tapu'] as $key => $value) {
                    $this->db->group_start();
                    if ($key == 0) {
                        $this->db->where('p.p_prepareOfTapu', $value);
                    } else {
                        $this->db->or_where('p.p_prepareOfTapu', $value);
                    }
                    $this->db->group_end();
                }
            }
            if (isset($filter['type'])) {
                $this->db->group_start();
                foreach ($filter['type'] as $key => $value) {
                    if ($key == 0) {
                        $this->db->where('p.p_type', $value);
                    } else {
                        $this->db->or_where('p.p_type', $value);
                    }
                }
                $this->db->group_end();
            }
            if (isset($filter['ownership'])) {
                $this->db->group_start();
                $this->db->where('po.po_id', $filter['ownership']);
                $this->db->group_end();
            }
            if (isset($filter['price-start']) && isset($filter['price-end'])) {
                $this->db->group_start();
                if ($filter['price-start'] != '∞') {
                    $this->db->where('por_price >', '%' . $filter['price-start'] . '%');
                }
                if ($filter['price-end'] != '') {
                    if ($filter['price-end'] != '∞') {
                        $this->db->where('por_price < %', '%' . $filter['price-end'] . '%');
                    }
                }
                $this->db->group_end();
            }
            if (isset($filter['governorates']) && !empty($filter['governorates'])) {
//                var_dump($filter['governorates']);exit;
                $this->db->group_start();
                $this->db->where('p.p_governorate_id', (string)$filter['governorates']);
                $this->db->group_end();
            }
        }
        $this->db->where('p_active ', 1);
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        $this->db->order_by('p.p_timestamp', 'DESC');

        return $this->db->get()->num_rows();

//        $this->db->where('p_active !=', 4);
//        $data = $this->db->get('posts')->num_rows();
//        return $data;
    }

    function getAllLocations($filter = null, $page = null)
    {
        if ($filter) {
            if (isset($filter['cladding'])) {
                $this->db->group_start();
                foreach ($filter['cladding'] as $key => $value) {
                    if ($key == 0) {
                        $this->db->where('p.p_typeOfCladding', $value);
                    } else {
                        $this->db->or_where('p.p_typeOfCladding', $value);
                    }
                }
                $this->db->group_end();
            }
            if (isset($filter['tapu'])) {
                foreach ($filter['tapu'] as $key => $value) {
                    $this->db->group_start();
                    if ($key == 0) {
                        $this->db->where('p.p_prepareOfTapu', $value);
                    } else {
                        $this->db->or_where('p.p_prepareOfTapu', $value);
                    }
                    $this->db->group_end();
                }
            }
            if (isset($filter['type'])) {
                $this->db->group_start();
                foreach ($filter['type'] as $key => $value) {
                    if ($key == 0) {
                        $this->db->where('p.p_type', $value);
                    } else {
                        $this->db->or_where('p.p_type', $value);
                    }
                }
                $this->db->group_end();
            }
            if (isset($filter['ownership'])) {
                $this->db->group_start();
                $this->db->where('po.po_id', $filter['ownership']);
                $this->db->group_end();
            }
            if (isset($filter['price-start']) && isset($filter['price-end'])) {
                $this->db->group_start();
                if ($filter['price-start'] != '∞') {
                    $this->db->where('por_price >', '%' . $filter['price-start'] . '%');
                }
                if ($filter['price-end'] != '') {
                    if ($filter['price-end'] != '∞') {
                        $this->db->where('por_price < %', '%' . $filter['price-end'] . '%');
                    }
                }
                $this->db->group_end();
            }
            if (isset($filter['governorates']) && !empty($filter['governorates'])) {
//                var_dump($filter['governorates']);exit;
                $this->db->group_start();
                $this->db->where('p.p_governorate_id', (string)$filter['governorates']);
                $this->db->group_end();
            }
        }
        $this->db->where('p_active ', 1);
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        $this->db->order_by('p.p_timestamp', 'DESC');
//        if (!$this->session->userdata('all')) {
//            $this->db->limit(12);
//        }
//        if (isset($page)) {
//            $this->db->limit(12, 12 * ($page - 1));
//        }
        return $this->db->get()->result_array();


    }

    function topPrice()
    {
        $this->db->where('p_active ', 1);
        $this->db->from('posts p');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $data = $this->db->select_max('por_price')->get()->result();

        $data = $data[0]->por_price;

        return $data;
    }

    function downPrice()
    {
        $this->db->where('p_active ', 1);
        $this->db->from('posts p');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $data = $this->db->select_min('por_price')->get()->result();
        print_r($data);
        $data = $data[0]->por_price;
        return $data;
    }

    function GetOwnershipPost($id)
    {
        $data = $this->db->from('posts_ownership,posts_ownership_relation')->where('posts_ownership.po_id=posts_ownership_relation.por_ownership_id')->where('posts_ownership_relation.por_post_id', $id)->get()->result_array();
        return $data;
    }

    function new_search($para = null)
    {
        $filter = $_SESSION['search'];
        if (isset($filter['cladding'])) {
            $this->db->group_start();
            foreach ($filter['cladding'] as $key => $value) {
                if ($key == 0) {
                    $this->db->where('p.p_typeOfCladding', $value);
                } else {
                    $this->db->or_where('p.p_typeOfCladding', $value);
                }
            }
            $this->db->group_end();
        }
        if (isset($filter['tapu'])) {
            foreach ($filter['tapu'] as $key => $value) {
                $this->db->group_start();
                if ($key == 0) {
                    $this->db->where('p.p_prepareOfTapu', $value);
                } else {
                    $this->db->or_where('p.p_prepareOfTapu', $value);
                }
                $this->db->group_end();
            }
        }
        if (isset($filter['type'])) {
            $this->db->group_start();
            foreach ($filter['type'] as $key => $value) {
                if ($key == 0) {
                    $this->db->where('p.p_type', $value);
                } else {
                    $this->db->or_where('p.p_type', $value);
                }
            }
            $this->db->group_end();
        }
        if (isset($filter['ownership'])) {
            $this->db->group_start();
            $this->db->where('po.po_id', $filter['ownership']);
            $this->db->group_end();
        }
        if (isset($filter['price-start']) && isset($filter['price-end'])) {
            $this->db->group_start();
            if ($filter['price-start'] != '∞') {
                $this->db->where('por_price >', '%' . $filter['price-start'] . '%');
            }
            if ($filter['price-end'] != '') {
                if ($filter['price-end'] != '∞') {
                    $this->db->where('por_price < %', '%' . $filter['price-end'] . '%');
                }
            }
            $this->db->group_end();
        }
        if (isset($filter['governorates']) && !empty($filter['governorates'])) {
//                var_dump($filter['governorates']);exit;
            $this->db->group_start();
            $this->db->where('p.p_governorate_id', (string)$filter['governorates']);
            $this->db->group_end();
        }
        $this->db->where('p_active !=', 4);
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        $this->db->order_by('p.p_timestamp', 'DESC');
        if (isset($para)) {
            $this->db->limit(12, 12 * ($para - 1));
        } else {
            $this->db->limit(12);
        }
        return $this->db->get()->result_array();
    }

    function count_all_search()
    {
        $filter = $_SESSION['search'];
        if (isset($filter['cladding'])) {
            $this->db->group_start();
            foreach ($filter['cladding'] as $key => $value) {
                if ($key == 0) {
                    $this->db->where('p.p_typeOfCladding', $value);
                } else {
                    $this->db->or_where('p.p_typeOfCladding', $value);
                }
            }
            $this->db->group_end();
        }
        if (isset($filter['tapu'])) {
            foreach ($filter['tapu'] as $key => $value) {
                $this->db->group_start();
                if ($key == 0) {
                    $this->db->where('p.p_prepareOfTapu', $value);
                } else {
                    $this->db->or_where('p.p_prepareOfTapu', $value);
                }
                $this->db->group_end();
            }
        }
        if (isset($filter['type'])) {
            $this->db->group_start();
            foreach ($filter['type'] as $key => $value) {
                if ($key == 0) {
                    $this->db->where('p.p_type', $value);
                } else {
                    $this->db->or_where('p.p_type', $value);
                }
            }
            $this->db->group_end();
        }
        if (isset($filter['ownership'])) {
            $this->db->group_start();
            $this->db->where('po.po_id', $filter['ownership']);
            $this->db->group_end();
        }
        if (isset($filter['price-start']) && isset($filter['price-end'])) {
            $this->db->group_start();
            if ($filter['price-start'] != '∞') {
                $this->db->where('por_price >', '%' . $filter['price-start'] . '%');
            }
            if ($filter['price-end'] != '') {
                if ($filter['price-end'] != '∞') {
                    $this->db->where('por_price < %', '%' . $filter['price-end'] . '%');
                }
            }
            $this->db->group_end();
        }
        if (isset($filter['governorates']) && !empty($filter['governorates'])) {
//                var_dump($filter['governorates']);exit;
            $this->db->group_start();
            $this->db->where('p.p_governorate_id', (string)$filter['governorates']);
            $this->db->group_end();
        }
        $this->db->where('p_active !=', 4);
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        $this->db->order_by('p.p_timestamp', 'DESC');
        return $this->db->get()->num_rows();

    }

    function get_data_user($id)
    {
        $data = $this->db->select('u_active as active,u_max_product ')->where('u_id', $id)->from('users')->get()->result();
        return $data;
    }

    function set_data_user($data, $id)
    {
        $this->db->where('u_id', $id)->update('users', $data);
    }

    function check_user()
    {

        if ($_SESSION['admin'] == 1) {
            return true;
        }
        $userId = $_SESSION['userId'];
        $data = $this->db->select('u_max_product')->from('users')->where('u_id', $userId)->limit(1)->get()->row();
        $data = $data->u_max_product;
        $posts = $this->db->select('count(p_id) as count_my')->from('posts')->where('p_user_id', $userId)->get()->row();
        $posts = $posts->count_my;

        if ($data == null) {
            return true;
        } else if ($data > $posts) {
            return true;
        }
        return false;

    }

    function change_state_post($id, $state, $vip = null)
    {
        if (!isset($vip))
            $this->db->where('p_id', $id)->set('p_active', $state)->update('posts');
        else
            $this->db->where('p_id', $id)->set('p_vip', $state)->update('posts');
    }

    function update_post($id, $data)
    {
        $this->db->where('p_id', $id)->update('posts', $data);
    }

    function drop_image($post_id)
    {

        echo $post_id;
//        $this->db->where('pi_post_id', $post_id)->where('pi_main', 1)->update('posts_images', array('pi_delete', 1));
    }

    function drop_main_image($post_id)
    {
        echo $post_id;
//        $this->db->where('pi_post_id', $post_id)->where('pi_main', 1)->update('posts_images', array('pi_delete', 1));
    }

    private function get_governorates_with_count_posts()
    {

        $this->db->select("governorates.g_id as id  ,governorates.g_name_ar as name  , COUNT(posts.p_id) as countPosts ");
        $this->db->from("governorates");
        $this->db->join('posts', 'governorates.g_id = posts.p_governorate_id');
        $this->db->where('posts.p_active!=4');
        $this->db->where('posts.p_active!=0');
        $this->db->group_by("posts.p_governorate_id");
        $data = $this->db->get();
        $data = $data->result_array();
        return $data;
    }

    private function get_objective_whith_coint_posts()
    {
        $this->db->select("posts_ownership.po_id as id ,posts_ownership.po_name_ar as pt_name_ar,COUNT(posts_ownership_relation.por_post_id) as countPosts");
        $this->db->from('posts_ownership_relation');
        $this->db->join('posts_ownership', 'posts_ownership.po_id =posts_ownership_relation.por_ownership_id');
        $this->db->join('posts', 'posts.p_id = posts_ownership_relation.por_post_id');
        $this->db->where('posts.p_active!=4');
        $this->db->where('posts.p_active!=0');
        $this->db->group_by('posts_ownership_relation.por_ownership_id , posts_ownership.po_id');

        $data = $this->db->get();
        $data = $data->result_array();
        return $data;
    }

    private function get_type_with_count_posts()
    {
        $this->db->select("posts_types.pt_id as id , posts_types.pt_name_ar as name ,COUNT(posts.p_id) as countPosts");
        $this->db->from('posts_types');
        $this->db->join('posts ', 'posts.p_type = posts_types.pt_id');
        $this->db->where('posts.p_active!=4');
        $this->db->where('posts.p_active!=0');
        $this->db->group_by('posts_types.pt_id');
        $data = $this->db->get();
        $data = $data->result_array();
        return $data;
    }

    private function get_cladding_with_count_posts()
    {

        $this->db->select('posts_cladding.pc_id as id , posts_cladding.pc_name_ar as name ,COUNT(posts.p_id) as countPosts');
        $this->db->from('posts_cladding');
        $this->db->join('posts', 'posts.p_typeOfCladding = posts_cladding.pc_id');
        $this->db->where('posts.p_active!=4');
        $this->db->where('posts.p_active!=0');
        $this->db->group_by('posts_cladding.pc_id');
        $data = $this->db->get();
        $data = $data->result_array();
        return $data;
    }

    private function get_tapu_with_count_posts()
    {

        $this->db->select('posts_tapu.pta_id as id , posts_tapu.pta_name_ar as name ,COUNT(posts.p_id) as countPosts');
        $this->db->from('posts_tapu');
        $this->db->join('posts', 'posts.p_prepareOfTapu = posts_tapu.pta_id');
        $this->db->where('posts.p_active!=4');
        $this->db->where('posts.p_active!=0');
        $this->db->group_by('posts_tapu.pta_id');
        $data = $this->db->get();
        $data = $data->result_array();
        return $data;
    }

    function GetOptionMaps()
    {
        $data = array();
        $data['governorates'] = $this->get_governorates_with_count_posts();
        $data['objective'] = $this->get_objective_whith_coint_posts();
        $data['type'] = $this->get_type_with_count_posts();
        $data['tapu'] = $this->get_tapu_with_count_posts();
        $data['cladding'] = $this->get_cladding_with_count_posts();
        return $data;
    }

    function search_maps($objective = null, $governorates = null, $type = null, $tapu = null, $rooms = null, $bathroom = null, $cladding = null, $limit = null)
    {

//        $this->db->where('p_active !=', 4);
        $this->db->where('p_active !=', 4);
        $this->db->where('p_active !=', 0);
        if (isset($governorates) && $governorates != null) {
            $this->db->where('p_governorate_id', $governorates);
        }
        if (isset($type) && $type != null) {
            $this->db->where('p_type', $type);
        }
        if (isset($tapu) && $tapu != null) {
            $this->db->where('p_prepareOfTapu', $tapu);
        }
        if (isset($cladding) && $cladding != null) {
            $this->db->where('p_typeOfCladding', $cladding);
        }
        if (isset($rooms) && $rooms != null) {
            if ($rooms < 5)
                $this->db->where('p_numOfRooms', $rooms);
            else
                $this->db->where('p_numOfRooms >=', $rooms);

        }
        if (isset($bathroom) && $bathroom != null) {
            if ($bathroom < 3)
                $this->db->where('p_numOfBathRooms', $bathroom);
            else
                $this->db->where('p_numOfBathRooms >=', $bathroom);

        }


        if (isset($limit) && $limit != false) {
            $this->db->limit(16, 16 * ($limit - 1));
        } else if ($limit != false) {
            $this->db->limit(16);

        }

        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
//        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        if (isset($objective) && $objective != null) {
            $this->db->where('po.po_id', $objective);
        }
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        $this->db->order_by('p.p_timestamp', 'DESC');
        return $this->db->get()->result_array();

    }

    function update_price($id, $price)
    {

        $this->db->where('por_post_id', $id)->update('posts_ownership_relation', array('por_price' => $price));
    }

    function get_userInfo($id_user)
    {
        $data = $this->db->select('u_name as name , u_gsm as gsm')->get_where('users', array('u_id' => $id_user))->limit(1)->result_array();
        return $data;
    }

    function get_user_active()
    {
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');

    }

//    select single value ;
    function get_user_value($where, $select)
    {
//        where -> is array
//        select => string
        $data = $this->db->select($select)->where($where)->from('users')->get()->result_array();
//        print_r($data);
        if (isset($data[0][$select]))
            $data = $data[0][$select];
        else
            $data = '';
        return $data;
    }

    function updatePostsGsm($gsm, $post_id = null)
    {

        $data['p_gsm'] = $gsm;
        if (isset($post_id))
            $data['p_id'] = $post_id;
        $dataUser = $this->db->like(array('u_gsm' => $gsm))->get('users')->result_array();

        $dataPosts = $this->db->like($data)->get('posts')->result_array();
        echo $this->db->last_query();
        foreach ($dataPosts as $post) {
            $this->db->where(array('p_id' => $post['p_id']))->update('posts', array(
                'p_user_activtion' => $post['p_user_id'],
                'p_user_id' => $dataUser[0]['u_id']
            ));

        }
        $this->db->where(array('u_id' => $dataUser[0]['u_id']))->update('users', array('u_active_post' => 1));
        return true;
    }

    function get_posts_by_gsm($gsm)
    {
        $this->db->from('posts p');
        $this->db->join('posts_properties pp', 'pp.pp_id = p.p_typeOfProperty');
        $this->db->join('posts_types pt', 'pt.pt_id = p.p_type');
        $this->db->join('posts_cladding pc', 'pc.pc_id = p.p_typeOfCladding');
        $this->db->join('posts_tapu pta', 'pta.pta_id = p.p_prepareOfTapu');
        $this->db->join('posts_ownership_relation por', 'por.por_post_id = p.p_id');
        $this->db->join('posts_ownership po', 'po.po_id = por.por_ownership_id');
        $this->db->where('p.p_gsm', $gsm);
        $this->db->join('governorates g', 'g.g_id = p.p_governorate_id');
        $this->db->join('users u', 'u.u_id = p.p_user_id');
        $Data = $this->db->get()->result_array();
        return $Data;
    }

    function get_count_gsm_posts($gsm){
        $count = $this->db->select('count(*) as cnt')->get_where('posts',array('posts.p_gsm'=>$gsm))->row();
        $count = $count->cnt;
        return $count;
    }



}