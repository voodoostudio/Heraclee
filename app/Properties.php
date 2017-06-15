<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PDO;

class Properties extends Model
{
    /**
     * @param int $page
     * @param int $quantity
     *
     * @return mixed
     */
    public static function getProperties($quantity = 10, $page = 1)
    {
        $offset = ($page - 1) * $quantity;
        $array = [];
        $properties = DB::select(
            "SELECT * FROM `apimo_properties` ORDER BY property_id DESC LIMIT :offset,:limit",
            ['limit' => $quantity, 'offset' => $offset]
        );

        foreach ($properties as $property) {
            $array[$property['property_id']] = $property;
            $array[$property['property_id']]['pictures'] = self::getPicturesByIds($property['pictures']);
            $array[$property['property_id']]['step'] = self::getStepByIds($property['step']);
            $array[$property['property_id']]['category'] = self::getCategoryById($property['category']);
            $array[$property['property_id']]['subcategory'] = self::getSubCategoryById($property['subcategory']);
            $array[$property['property_id']]['type'] = self::getTypeById($property['type']);
            $array[$property['property_id']]['subtype'] = self::getSubTypeById($property['subtype']);
            $array[$property['property_id']]['city'] = self::getCityById($property['city']);
            $array[$property['property_id']]['area'] = self::getAreaById($property['area']);
            $array[$property['property_id']]['price'] = self::getPriceById($property['price']);
            $array[$property['property_id']]['view'] = self::getViewById($property['view']);
            $array[$property['property_id']]['condition'] = self::getConditionById($property['condition']);
            $array[$property['property_id']]['standing'] = self::getStandingById($property['standing']);
            $array[$property['property_id']]['services'] = self::getServicesByIds($property['services']);
            $array[$property['property_id']]['proximities'] = self::getProximitiesByIds($property['proximities']);
            $array[$property['property_id']]['areas'] = self::getAreasByIds($property['areas']);
        }

        return $array;
    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getPicturesByIds($ids)
    {
        $pictures = DB::table('apimo_pictures')
            ->wherein("picture_id", explode(',', $ids))
            ->get();
        $pictures_array = [];
        if (!empty($pictures)) {
            foreach ($pictures as $picture) {
                $pictures_array[$picture['picture_id']]['rank'] = $picture['rank'];
                $pictures_array[$picture['picture_id']]['url'] = $picture['url'];
            }
        }

        return $pictures_array;
    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getServicesByIds($ids)
    {
        $services = DB::table('apimo_property_service')
            ->wherein("reference", explode(',', $ids))
            ->where('locale','fr_FR')
            ->get();

        $services_array = [];
        if (!empty($services)) {
            foreach ($services as $service) {
                $services_array[$service['reference']] = $service['value'];
            }
        }

        return $services_array;
    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getAreasByIds($ids)
    {
        $areas = DB::table('apimo_areas')
            ->leftJoin('apimo_property_area','apimo_areas.type','=','apimo_property_area.reference')
            ->leftJoin('apimo_property_flooring','apimo_areas.flooring','=','apimo_property_flooring.reference')
            ->leftJoin('apimo_property_floor','apimo_areas.floor_type','=','apimo_property_floor.reference')
            ->leftJoin('apimo_property_orientations','apimo_areas.orientations','=','apimo_property_orientations.reference')
            ->whereIn('apimo_areas.id',explode(',',$ids))
            ->get();

        $areas_array = [];
        if (!empty($areas)) {
            foreach ($areas as $area) {
                $areas_array[$area['id']]['type'] = $area['type'];
                $areas_array[$area['id']]['number'] = $area['number'];
                $areas_array[$area['id']]['area'] = $area['area'];
                $areas_array[$area['id']]['flooring'] = $area['flooring'];
                $areas_array[$area['id']]['floor_type'] = $area['floor_type'];
                $areas_array[$area['id']]['floor_value'] = $area['floor_value'];
                $areas_array[$area['id']]['orientations'] = $area['orientations'];

            }
        }

        return $areas_array;
    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getProximitiesByIds($ids)
    {
        $proximities = DB::table('apimo_property_proximity')
            ->wherein("reference", explode(',', $ids))
            ->where('locale','fr_FR')
            ->get();

        $proximities_array = [];
        if (!empty($proximities)) {
            foreach ($proximities as $proximity) {
                $proximities_array[$proximity['reference']] = $proximity['value'];
            }
        }

        return $proximities_array;
    }

    /**
     * @param $step_id
     *
     * @return mixed
     */
    protected static function getStepByIds($step_id)
    {
        $step = DB::table('apimo_property_step')
            ->where("reference", $step_id)
            ->where("locale", "fr_FR")
            ->get();

        if (!empty($step)) {
            $step_id = $step[0]['value'];
        }

        return $step_id;
    }

    /**
     * @param $cat_id
     *
     * @return mixed
     */
    protected static function getCategoryById($cat_id)
    {
        $step = DB::table('apimo_property_category')
            ->where("reference", $cat_id)
            ->where("locale", "fr_FR")
            ->get();

        if (!empty($step)) {
            $cat_id = $step[0]['value'];
        }

        return $cat_id;
    }

    /**
     * @param $sub_cat_id
     *
     * @return mixed
     */
    protected static function getSubCategoryById($sub_cat_id)
    {
        $sub_cat = '';
        if ($sub_cat_id != 0) {
            $r = DB::table('apimo_property_subcategory')
                ->where("reference", $sub_cat_id)
                ->where("locale", "fr_FR")
                ->get();

            if (!empty($r)) {
                $sub_cat = $r[0]['value'];
            }
        }

        return $sub_cat;
    }

    /**
     * @param $type_id
     *
     * @return mixed
     */
    protected static function getTypeById($type_id)
    {
        if ($type_id != 0) {
            $r = DB::table('apimo_property_type')
                ->where("reference", $type_id)
                ->where("locale", "fr_FR")
                ->get();

            if (!empty($r)) {
                $type_id = $r[0]['value'];
            }
        }

        return $type_id;
    }

    /**
     * @param $sub_type_id
     *
     * @return mixed
     */
    protected static function getSubTypeById($sub_type_id)
    {
        if ($sub_type_id != 0) {
            $r = DB::table('apimo_property_subtype')
                ->where("reference", $sub_type_id)
                ->where("locale", "fr_FR")
                ->get();

            if (!empty($r)) {
                $sub_type_id = $r[0]['value'];
            }
        }

        return $sub_type_id;
    }

    /**
     * @param $city_id
     *
     * @return mixed
     */
    protected static function getCityById($city_id)
    {
        if ($city_id != 0) {
            $r = DB::table('apimo_city')
                ->where("city_id", $city_id)
                ->get();

            if (!empty($r)) {
                $city_id = $r[0]['name'];
            }
        }

        return $city_id;
    }

    /**
     * @param $price_id
     *
     * @return mixed
     */
    protected static function getPriceById($price_id)
    {
        if ($price_id != 0) {
            $r = DB::table('apimo_price')
                ->where("id", $price_id)
                ->get();

            if (!empty($r)) {
                $price_array['value'] = $r[0]['value'];
                $price_array['currency'] = $r[0]['currency'];

                $price_id = $price_array;
            }
        }

        return $price_id;
    }

    /**
     * @param $condition_id
     *
     * @return mixed
     */
    protected static function getConditionById($condition_id)
    {
        if ($condition_id != 0) {
            $r = DB::table('apimo_property_condition')
                ->where("reference", $condition_id)
                ->where("locale", 'fr_FR')
                ->get();
            if (isset($r[0]) && !empty($r[0]['value'])) {
                $condition_id = $r[0]['value'];
            }
        }

        return $condition_id;
    }

    /**
     * @param $standing_id
     *
     * @return mixed
     */
    protected static function getStandingById($standing_id)
    {
        if ($standing_id != 0) {
            $r = DB::table('apimo_property_standing')
                ->where("reference", $standing_id)
                ->where("locale", 'fr_FR')
                ->get();
            if (isset($r[0]) && !empty($r[0]['value'])) {
                $standing_id = $r[0]['value'];
            }
        }

        return $standing_id;
    }

    /**
     * @param $view_id
     *
     * @return mixed
     */
    protected static function getViewById($view_id)
    {
        if ($view_id != 0) {
            $r = DB::select("SELECT apvt.value as type, apvl.value as landscape FROM apimo_view as av
                                LEFT JOIN apimo_property_view_type as apvt ON av.type = apvt.reference
                                LEFT JOIN apimo_property_view_landscape as apvl ON av.landscape = apvl.reference
                                WHERE av.id = :view_id AND apvt.locale = :locale1 AND apvl.locale = :locale2",['view_id'=>$view_id,'locale1'=>'fr_FR','locale2'=>'fr_FR']);

            if (!empty($r)) {
                $view_array['type'] = $r[0]['type'];
                $view_array['landscape'] = $r[0]['landscape'];
                $view_id = $view_array;
            }
        }

        return $view_id;
    }

    /**
     * @param $area_id
     *
     * @return mixed
     */
    protected static function getAreaById($area_id)
    {
        if ($area_id != 0) {
            $r = DB::select(
                "SELECT apa.value as value FROM apimo_area as aa
                 LEFT JOIN apimo_property_area as apa ON aa.unit = apa.reference
                    WHERE aa.id = ?",
                [$area_id]
            );

            if (!empty($r)) {
                $area_id = $r[0]['value'];
            }
        }

        return $area_id;
    }
}
