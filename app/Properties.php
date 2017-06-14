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
            $array[$property['property_id']]['step'] = self::getServicesByIds($property['step']);
            $array[$property['property_id']]['category'] = self::getCategoryById($property['category']);
            $array[$property['property_id']]['subcategory'] = self::getSubCategoryById($property['subcategory']);
            $array[$property['property_id']]['type'] = self::getTypeById($property['type']);
            $array[$property['property_id']]['subtype'] = self::getSubTypeById($property['subtype']);
            $array[$property['property_id']]['city'] = self::getCityById($property['city']);
            $array[$property['property_id']]['area'] = self::getAreaById($property['area']);
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
                $pictures_array[$picture['picture_id']] = $picture['url'];
            }
        }

        return $pictures_array;
    }

    /**
     * @param $step_id
     *
     * @return mixed
     */
    protected static function getServicesByIds($step_id)
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
