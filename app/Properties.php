<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Properties extends Model
{
    public static $lang = 'fr_FR';
    public static $lang_short = 'fr';
    private $property_count;

    /**
     * @param int $items
     * @param int $curPage
     * @param string $url_page
     * @return mixed
     */
    public function paginations($items = 10, $curPage = 1, $url_page = '/results?page=')
    {
        $count = $this->property_count;
        $listPage = [];
        if ($count != 0) {
            $countPages = (int)ceil($count / $items);
            $number_of_pages_on_the_sides = 30;

            $listPage['next'] = (($curPage < $countPages) ? ($curPage + 1) : '');
            $listPage['back'] = (($curPage > 1) ? ($curPage - 1) : '');

            $listPage['correntPage'] = $curPage;
            $listPage['url_page'] = $url_page;

            for ($i = ($curPage - $number_of_pages_on_the_sides); $i <= ($curPage + $number_of_pages_on_the_sides); $i++) {
                if ($i > 0 && $i <= $countPages) {
                    $listPage['listPages'][] = $i;
                }
            }
        }

        return $listPage;
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public static function getProperty($id)
    {
        $array = [];
        $property = DB::select("SELECT * FROM `apimo_properties` WHERE property_id = ?", [$id]);

        if (!empty($property)) {
            $array = $property[0];
            $array['user'] = self::getUserById($property[0]['user']);
            $array['pictures'] = self::getPicturesByIds($property[0]['pictures']);
            $array['step'] = self::getStepByIds($property[0]['step']);
            $array['category'] = self::getCategoryById($property[0]['category']);
            $array['subcategory'] = self::getSubCategoryById($property[0]['subcategory']);
            $array['type'] = self::getTypeById($property[0]['type']);
            $array['subtype'] = self::getSubTypeById($property[0]['subtype']);
            $array['city'] = self::getCityById($property[0]['city']);
            $array['view'] = self::getViewById($property[0]['view']);
            $array['condition'] = self::getConditionById($property[0]['condition']);
            $array['standing'] = self::getStandingById($property[0]['standing']);
            $array['services'] = self::getServicesByIds($property[0]['services']);
            $array['proximities'] = self::getProximitiesByIds($property[0]['proximities']);
            $array['areas'] = self::getAreasByIds($property[0]['areas']);
            $array['comments'] = self::getCommentsByIds($property[0]['property_id']);
        }

        return $array;
    }

    /**
     * @param int $items
     *
     * @param int $page
     * @param int $sell_type
     * @param string|array $object_type
     * @param string|array $object_place
     * @param string $search_keywords
     * @param string $price_min
     * @param string $price_max
     * @param string $surface_min
     * @param string $surface_max
     * @param string $bedrooms_min
     * @param string $bedrooms_max
     * @return mixed
     */
    public function getProperties(
        $items = 10,
        $page = 1,
        $sell_type = 1,
        $object_type = '',
        $object_place = '',
        $search_keywords = '',
        $price_min = '',
        $price_max = '',
        $surface_min = '',
        $surface_max = '',
        $bedrooms_min = '',
        $bedrooms_max = ''
    ) {
        $offset = ($page - 1) * $items;
        $array = [];
        $conditions_where = [];

        $conditions_where[] = ['category', '=', $sell_type];

//        if ($search_keywords != '') {
//            $conditions_where[] = ['category', '=', $search_keywords];
//        };

        if ($price_min != '') {
            $conditions_where[] = ['price', '>=', $price_min];
        };

        if ($price_max != '') {
            $conditions_where[] = ['price', '<=', $price_max];
        };

        if ($surface_min != '') {
            $conditions_where[] = ['area_surface', '>=', $surface_min];
        };

        if ($surface_max != '') {
            $conditions_where[] = ['area_surface', '<=', $surface_max];
        };

        if ($bedrooms_min != '') {
            $conditions_where[] = ['area_surface', '>=', $bedrooms_min];
        };

        if ($bedrooms_max != '') {
            $conditions_where[] = ['area_surface', '<=', $bedrooms_max];
        };

        $properties = DB::table('apimo_properties')
            ->where($conditions_where)
            ->whereIn('type', $object_type)
            ->whereIn('city', $object_place)
            ->limit($items)
            ->offset($offset)
            ->get();


        $this->property_count = DB::table('apimo_properties')
            ->whereIn('type', $object_type)
            ->whereIn('city', $object_place)
            ->where($conditions_where)
            ->get()->count();

        if (count($properties) > 0) {
            foreach ($properties as $property) {
                $array[$property['property_id']] = $property;
                $array[$property['property_id']]['user'] = self::getUserById($property['user']);
                $array[$property['property_id']]['pictures'] = self::getPicturesByIds($property['pictures']);
                $array[$property['property_id']]['step'] = self::getStepByIds($property['step']);
                $array[$property['property_id']]['category'] = self::getCategoryById($property['category']);
                $array[$property['property_id']]['subcategory'] = self::getSubCategoryById($property['subcategory']);
                $array[$property['property_id']]['type'] = self::getTypeById($property['type']);
                $array[$property['property_id']]['subtype'] = self::getSubTypeById($property['subtype']);
                $array[$property['property_id']]['city'] = self::getCityById($property['city']);
                $array[$property['property_id']]['view'] = self::getViewById($property['view']);
                $array[$property['property_id']]['condition'] = self::getConditionById($property['condition']);
                $array[$property['property_id']]['standing'] = self::getStandingById($property['standing']);
                $array[$property['property_id']]['services'] = self::getServicesByIds($property['services']);
                $array[$property['property_id']]['proximities'] = self::getProximitiesByIds($property['proximities']);
                $array[$property['property_id']]['areas'] = self::getAreasByIds($property['areas']);
                $array[$property['property_id']]['comments'] = self::getCommentsByIds($property['property_id']);
            }
        }
//        dump($array);
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
     * @param int $id
     *
     * @return mixed
     */
    protected static function getUserById($id)
    {
        $user = DB::table('apimo_users')
            ->where("user_id", $id)
            ->get()
            ->toArray();
        return $user;
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
            ->where('locale', self::$lang)
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
            ->select(
                'apimo_areas.id as id',
                'apimo_property_area.value as type',
                'apimo_areas.number',
                'apimo_areas.area as area',
                'apimo_property_flooring.value as flooring',
                'apimo_property_floor.value as floor_type',
                'apimo_areas.floor_value as floor_value',
                'apimo_property_orientations.value as orientations'
            )
            ->leftJoin('apimo_property_area', 'apimo_areas.type', '=', 'apimo_property_area.reference')
            ->leftJoin('apimo_property_flooring', 'apimo_areas.flooring', '=', 'apimo_property_flooring.reference')
            ->leftJoin('apimo_property_floor', 'apimo_areas.floor_type', '=', 'apimo_property_floor.reference')
            ->leftJoin(
                'apimo_property_orientations',
                'apimo_areas.orientations',
                '=',
                'apimo_property_orientations.reference'
            )
            ->whereIn('apimo_areas.id', explode(',', $ids))
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
            ->where('locale', self::$lang)
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
            ->where("locale", self::$lang)
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
            ->where("locale", self::$lang)
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
                ->where("locale", self::$lang)
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
                ->where("locale", self::$lang)
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
                ->where("locale", self::$lang)
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
                ->where("locale", self::$lang)
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
                ->where("locale", self::$lang)
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
            $r = DB::select(
                "SELECT apvt.value AS type, apvl.value AS landscape FROM apimo_view AS av
                                LEFT JOIN apimo_property_view_type AS apvt ON av.type = apvt.reference
                                LEFT JOIN apimo_property_view_landscape AS apvl ON av.landscape = apvl.reference
                                WHERE av.id = :view_id AND apvt.locale = :locale1 AND apvl.locale = :locale2",
                ['view_id' => $view_id, 'locale1' => self::$lang, 'locale2' => self::$lang]
            );

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
        $area = [];
        if ($area_id != 0) {
            $r = DB::select("SELECT apa.value AS value,aa.value AS surface, aa.total AS surface_total FROM apimo_area AS aa
                 LEFT JOIN apimo_property_area AS apa ON aa.unit = apa.reference
                    WHERE aa.id = ?", [$area_id]);
            if (!empty($r)) {
                $area['value'] = $r[0]['value'];
                $area['surface'] = $r[0]['surface'];
                if ($area['surface'] < $r[0]['surface_total']) {
                    $area['surface'] = $r[0]['surface_total'];
                }
            }
        }

        return $area;
    }

    /**
     * Returns a list of comments with property
     *
     * @param int $property_id
     *
     * @return mixed
     */
    protected static function getCommentsByIds($property_id)
    {
        $r = [];
        if ($property_id != 0) {
            $r = DB::select("SELECT * FROM apimo_property_comments 
                                    WHERE property_id = ? AND language = ?", [$property_id, self::$lang_short]);
        }
        if (isset($r[0])) {
            $r = $r[0];
        }
        return $r;
    }

    /**
     * Returns a list of cities with real estate
     *
     * @return array
     */
    public static function getCityList()
    {
        $cities = DB::table('apimo_city')->get()->toArray();

        return $cities;
    }

    /**
     * Returns a list of cities with real estate
     *
     * @return array
     */
    public static function getCityListIds()
    {
        $cities_ids = [];
        $cities = DB::table('apimo_city')->select('city_id')->get()->toArray();
        foreach ($cities as $city) {
            $cities_ids[] = (string)$city['city_id'];
        }

        return $cities_ids;
    }

    /**
     * Returns the list of available types of real estate
     *
     * @return array
     */
    public static function getAvailablePropertyType()
    {
        $property_type = DB::select("SELECT *
                                            FROM apimo_property_type
                                            WHERE reference IN (
                                              SELECT type
                                              FROM apimo_properties
                                              GROUP BY type
                                            )
                                            AND locale = ?", [self::$lang]);

        return $property_type;
    }

    /**
     * Returns the list of available types of real estate
     *
     * @return array
     */
    public static function getAvailablePropertyTypeIds()
    {
        $res = [];
        $property_types = DB::select(
            "SELECT type FROM apimo_properties GROUP BY type"
        );
        foreach ($property_types as $property_type) {
            $res[] = (string)$property_type['type'];
        }


        return $res;
    }
}
