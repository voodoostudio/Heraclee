<?php

namespace App;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use LaravelLocalization;

class Properties extends Model
{
    public $property_count;
    public $all_property_count;
    public $slider_property;

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
            $number_of_pages_on_the_sides = 2;

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
            $array['price_period'] = self::getPricePeriodById($property[0]['price_period']);
            $array['floor'] = self::getFloorByPropertyId($property[0]['property_id']);
            $array['view'] = self::getViewById($property[0]['view']);
            $array['condition'] = self::getConditionById($property[0]['condition']);
            $array['standing'] = self::getStandingById($property[0]['standing']);
            $array['services'] = self::getServicesByIds($property[0]['services']);
            $array['orientations'] = self::getOrientationsByIds($property[0]['orientations']);
            $array['landscape'] = self::getViewByIds($property[0]['landscape']);
            $array['district'] = self::getDistrictByIds($property[0]['district']);
            $array['proximities'] = self::getProximitiesByIds($property[0]['proximities']);
            $array['agreement'] = self::getAgreementsByIds($property[0]['agreement']);
            $array['areas'] = self::getAreasByIds($property[0]['areas']);
            $array['heating'] = self::getHeatingByIds($property[0]['heating']);
            $array['water'] = self:: getWaterByIds($property[0]['water']);
            $array['comments'] = self::getCommentsByIds($property[0]['property_id']);
            $array['regulations'] = self::getRegulationsById($property[0]['property_id']);
        }

        return $array;
    }

    /**
     * @param int $items
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
        $object_equipments = '',
        $object_standing = '',
        $object_view = '',
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
        $country_array = [];
        $country = [];
        $lang = LaravelLocalization::getCurrentLocale();

        preg_match("/[^\/]+$/", $_SERVER["REQUEST_URI"], $matches);

        $check = isset($matches[0]) ? $matches[0] : false;

        if( stristr($check, '?') == true) {
            $country[] = stristr($check, '?', true);
        } else {
            $country[] = $check;
        }

        if($check == false || in_array('results', $country) || $check == $lang) {
            $country_array = ['FR', 'CH', 'US', 'ZA'];
        }

        if(in_array('france', $country)) {
            $country_array = ['FR'];
        }

        if(in_array('swiss', $country)) {
            $country_array = ['CH'];
        }

        if(in_array('usa', $country)) {
            $country_array = ['US'];
        }

        if(in_array('mauritius', $country)) {
            $country_array = ['ZA'];
        }

        if(
            ($_SERVER['REQUEST_URI'] === '/') || ($_SERVER['REQUEST_URI'] === '/fr') || ($_SERVER['REQUEST_URI'] === '/en') ||
            ($_SERVER['REQUEST_URI'] === '/france') || ($_SERVER['REQUEST_URI'] === '/fr/france') || ($_SERVER['REQUEST_URI'] === '/en/france') ||
            ($_SERVER['REQUEST_URI'] === '/swiss') || ($_SERVER['REQUEST_URI'] === '/fr/swiss') || ($_SERVER['REQUEST_URI'] === '/en/swiss') ||
            ($_SERVER['REQUEST_URI'] === '/usa') || ($_SERVER['REQUEST_URI'] === '/fr/usa') || ($_SERVER['REQUEST_URI'] === '/en/usa') ||
            ($_SERVER['REQUEST_URI'] === '/mauritius') || ($_SERVER['REQUEST_URI'] === '/fr/mauritius') || ($_SERVER['REQUEST_URI'] === '/en/mauritius')
        ){
            $sell_type_array = [1, 2, 3, 4, 5, 6];
        } else {
            if ($sell_type == 1) {
                $sell_type_array = [1, 4, 5, 6];
            } else {
                $sell_type_array = [2, 3];
            }
        }

        if ($price_min != '') {
            if(is_numeric($price_min) == true) {
                $conditions_where[] = ['price', '>=', $price_min];
            } else {
                $conditions_where[] = ['price', '>=', '9999999999'];
            }
        };

        if ($price_max != '') {
            if(is_numeric($price_max) == true) {
                $conditions_where[] = ['price', '<=', $price_max];
            } else {
                $conditions_where[] = ['price', '<=', '-1'];
            }
        };

        if ($surface_min != '') {
            if(is_numeric($surface_min) == true) {
                $conditions_where[] = ['area_surface', '>=', $surface_min];
            } else {
                $conditions_where[] = ['area_surface', '>=', '9999999999'];
            }
        };

        if ($surface_max != '') {
            if(is_numeric($surface_max) == true) {
                $conditions_where[] = ['area_surface', '<=', $surface_max];
            } else {
                $conditions_where[] = ['area_surface', '<=', '-1'];
            }
        };

        if ($bedrooms_min != '') {
            if(is_numeric($bedrooms_min) == true) {
                $conditions_where[] = ['bedrooms', '>=', $bedrooms_min];
            } else {
                $conditions_where[] = ['bedrooms', '>=', '9999999999'];
            }
        };

        if ($bedrooms_max != '') {
            if(is_numeric($bedrooms_max) == true) {
                $conditions_where[] = ['bedrooms', '<=', $bedrooms_max];
            } else {
                $conditions_where[] = ['bedrooms', '<=', '-1'];
            }
        };

        if($search_keywords != '') {
            $properties = DB::table('apimo_properties')
                ->where(function($query) {
                    $query->orWhere('reference', 'like', 'HSTP%')
                        ->orWhere('reference', 'like', 'HD%');
                })
                ->where(function ($query) use ($search_keywords) {
                    $lang_short = LaravelLocalization::getCurrentLocale();
                    $lang = LaravelLocalization::getCurrentLocaleRegional();
                    if ($search_keywords != '') {
                        //take reference in the services
                        $services = DB::table('apimo_property_service')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the orientations
                        $orientations = DB::table('apimo_property_orientations')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the condition
                        $conditions = DB::table('apimo_property_condition')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the standing
                        $standing = DB::table('apimo_property_standing')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the subtype
                        $subtype = DB::table('apimo_property_subtype')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the comments
                        $comments = DB::table('apimo_property_comments')
                            ->where('comment', 'like', '%' . $search_keywords . '%')
                            ->where('language', $lang_short)
                            ->get();

                        //property heating
                        $heating_access_reference = DB::table('apimo_property_heating_access')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_device_reference = DB::table('apimo_property_heating_device')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_type_reference = DB::table('apimo_property_heating_type')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_access_check = (!empty($heating_access_reference)) ? $heating_access_reference : '';
                        $heating_device_check = (!empty($heating_device_reference)) ? $heating_device_reference : '';
                        $heating_type_check = (!empty($heating_type_reference)) ? $heating_type_reference : '';

                        $heating_access = DB::table('apimo_heating')
                            ->where('access', 'like', $heating_access_check)
                            ->get()
                            ->groupBy('property_id');

                        $heating_device = DB::table('apimo_heating')
                            ->where('device', 'like', $heating_device_check)
                            ->get()
                            ->groupBy('property_id');

                        $heating_type = DB::table('apimo_heating')
                            ->where('type', 'like', $heating_type_check)
                            ->get()
                            ->groupBy('property_id');

                        //property water
                        $water_access_reference = DB::table('apimo_property_water_hot_access')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_device_reference = DB::table('apimo_property_water_hot_device')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_waste_reference = DB::table('apimo_property_water_waste')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_access_check = (!empty($water_access_reference)) ? $water_access_reference : '';
                        $water_device_check = (!empty($water_device_reference)) ? $water_device_reference : '';
                        $water_waste_check = (!empty($water_waste_reference)) ? $water_waste_reference : '';

                        $water_access = DB::table('apimo_water')
                            ->where('hot_access', 'like', $water_access_check)
                            ->get()
                            ->groupBy('property_id');

                        $water_device = DB::table('apimo_water')
                            ->where('hot_device', 'like', $water_device_check)
                            ->get()
                            ->groupBy('property_id');

                        $water_waste = DB::table('apimo_water')
                            ->where('waste', 'like', $water_waste_check)
                            ->get()
                            ->groupBy('property_id');

                        /**
                         * @param $services_search (services)
                         * @param $orientations_search (orientations)
                         * @param $conditions_search (condition)
                         * @param $conditions_search (condition)
                         * @param $subtype_search (subtype)
                         * @array $commentary (comments)
                         * @array $heating_access_array (heating access)
                         * @array $heating_device_array (heating device)
                         * @array $heating_type_array (heating type)
                         * @array $water_access_array (hot access water)
                         * @array $water_device_array (hot device water)
                         * @array $water_waste_array (waste water)
                         */

                        // arrays
                        $commentary = [];
                        $heating_access_array = [];
                        $heating_device_array = [];
                        $heating_type_array = [];
                        $water_access_array = [];
                        $water_device_array = [];
                        $water_waste_array = [];

                        //check
                        $services_search = (!empty($services)) ? $services : $search_keywords;
                        $orientations_search = (!empty($orientations)) ? $orientations : $search_keywords;
                        $conditions_search = (!empty($conditions)) ? $conditions : $search_keywords;
                        $standing_search = (!empty($standing)) ? $standing : $search_keywords;
                        $subtype_search = (!empty($subtype)) ? $subtype : $search_keywords;

                        foreach ($comments as $comment) {
                            $commentary[] = $comment['property_id'];
                        }

                        // heating
                        foreach ($heating_access as $key => $access) {
                            $heating_access_array[] = $key;
                        }

                        foreach ($heating_device as $key => $device) {
                            $heating_device_array[] = $key;
                        }

                        foreach ($heating_type as $key => $type) {
                            $heating_type_array[] = $key;
                        }

                        // water
                        foreach ($water_access as $key => $access) {
                            $water_access_array[] = $key;
                        }

                        foreach ($water_device as $key => $device) {
                            $water_device_array[] = $key;
                        }

                        foreach ($water_waste as $key => $waste) {
                            $water_waste_array[] = $key;
                        }

                        $query->where('services', 'rlike', '(^|,)' . $services_search . '(,|$)')
                            ->orWhere('orientations', 'rlike', '(^|,)' . $orientations_search . '(,|$)')
                            ->orWhere('standing', 'rlike', '(^|,)' . $standing_search . '(,|$)')
                            ->orWhere('condition', 'rlike', '(^|,)' . $conditions_search . '(,|$)')
                            ->orWhere('subtype', 'rlike', '(^|,)' . $subtype_search . '(,|$)')
                            ->orWhere('property_id', 'like', $search_keywords)
                            ->orWhere('reference', 'like', '%' . $search_keywords . '%')
                            ->orWhere('construction_year', 'like', '%' . $search_keywords . '%')
                            ->orWhere('renovation_year', 'like', '%' . $search_keywords . '%')
                            ->orWhere('style', 'like', '%' . $search_keywords . '%')
                            ->orWhereIn('property_id', $heating_access_array)
                            ->orWhereIn('property_id', $heating_device_array)
                            ->orWhereIn('property_id', $heating_type_array)
                            ->orWhereIn('property_id', $water_access_array)
                            ->orWhereIn('property_id', $water_device_array)
                            ->orWhereIn('property_id', $water_waste_array)
                            ->orWhereIn('property_id', $commentary);
                    }
                })
                ->limit($items)
                ->offset($offset)
                ->orderBy('created_at', 'DESC')
                ->get();


            /* Count items */
            $this->property_count = DB::table('apimo_properties')
                ->where(function($query) {
                    $query->orWhere('reference', 'like', 'HSTP%')
                        ->orWhere('reference', 'like', 'HD%');
                })
                ->where(function($query) use ($search_keywords) {
                    $lang_short = LaravelLocalization::getCurrentLocale();
                    $lang = LaravelLocalization::getCurrentLocaleRegional();
                    if($search_keywords != '') {
                        //dump(explode(" ", $search_keywords));
                        //take reference in the services
                        $services = DB::table('apimo_property_service')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the orientations
                        $orientations = DB::table('apimo_property_orientations')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the condition
                        $conditions = DB::table('apimo_property_condition')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the standing
                        $standing = DB::table('apimo_property_standing')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the subtype
                        $subtype = DB::table('apimo_property_subtype')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the comments
                        $comments = DB::table('apimo_property_comments')
                            ->where('comment', 'like', '%' . $search_keywords . '%')
                            ->where('language', $lang_short)
                            ->get();

                        //property heating
                        $heating_access_reference = DB::table('apimo_property_heating_access')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_device_reference = DB::table('apimo_property_heating_device')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_type_reference = DB::table('apimo_property_heating_type')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_access_check = (!empty($heating_access_reference)) ? $heating_access_reference : '';
                        $heating_device_check = (!empty($heating_device_reference)) ? $heating_device_reference : '';
                        $heating_type_check = (!empty($heating_type_reference)) ? $heating_type_reference : '';

                        $heating_access = DB::table('apimo_heating')
                            ->where('access', 'like',   $heating_access_check )
                            ->get()
                            ->groupBy('property_id');

                        $heating_device = DB::table('apimo_heating')
                            ->where('device', 'like',   $heating_device_check )
                            ->get()
                            ->groupBy('property_id');

                        $heating_type = DB::table('apimo_heating')
                            ->where('type', 'like',   $heating_type_check )
                            ->get()
                            ->groupBy('property_id');

                        //property water
                        $water_access_reference = DB::table('apimo_property_water_hot_access')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_device_reference = DB::table('apimo_property_water_hot_device')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_waste_reference = DB::table('apimo_property_water_waste')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_access_check = (!empty($water_access_reference)) ? $water_access_reference : '';
                        $water_device_check = (!empty($water_device_reference)) ? $water_device_reference : '';
                        $water_waste_check = (!empty($water_waste_reference)) ? $water_waste_reference : '';

                        $water_access = DB::table('apimo_water')
                            ->where('hot_access', 'like',   $water_access_check )
                            ->get()
                            ->groupBy('property_id');

                        $water_device = DB::table('apimo_water')
                            ->where('hot_device', 'like',    $water_device_check )
                            ->get()
                            ->groupBy('property_id');

                        $water_waste = DB::table('apimo_water')
                            ->where('waste', 'like',   $water_waste_check )
                            ->get()
                            ->groupBy('property_id');

                        /**
                         * @param $services_search (services)
                         * @param $orientations_search (orientations)
                         * @param $conditions_search (condition)
                         * @param $conditions_search (condition)
                         * @param $subtype_search (subtype)
                         * @array $commentary (comments)
                         * @array $heating_access_array (heating access)
                         * @array $heating_device_array (heating device)
                         * @array $heating_type_array (heating type)
                         * @array $water_access_array (hot access water)
                         * @array $water_device_array (hot device water)
                         * @array $water_waste_array (waste water)
                         */

                        // arrays
                        $commentary = [];
                        $heating_access_array = [];
                        $heating_device_array = [];
                        $heating_type_array = [];
                        $water_access_array = [];
                        $water_device_array = [];
                        $water_waste_array = [];

                        //check
                        $services_search = (!empty($services)) ? $services : $search_keywords;
                        $orientations_search = (!empty($orientations)) ? $orientations : $search_keywords;
                        $conditions_search = (!empty($conditions)) ? $conditions : $search_keywords;
                        $standing_search = (!empty($standing)) ? $standing : $search_keywords;
                        $subtype_search = (!empty($subtype)) ? $subtype : $search_keywords;

                        foreach ($comments as $comment) {
                            $commentary[] = $comment['property_id'];
                        }

                        // heating
                        foreach ($heating_access as $key => $access) {
                            $heating_access_array[] = $key;
                        }

                        foreach ($heating_device as $key => $device) {
                            $heating_device_array[] = $key;
                        }

                        foreach ($heating_type as $key => $type) {
                            $heating_type_array[] = $key;
                        }

                        // water
                        foreach ($water_access as $key => $access) {
                            $water_access_array[] = $key;
                        }

                        foreach ($water_device as $key => $device) {
                            $water_device_array[] = $key;
                        }

                        foreach ($water_waste as $key => $waste) {
                            $water_waste_array[] = $key;
                        }

                        $query->where('services', 'rlike', '(^|,)' . $services_search . '(,|$)')
                            ->orWhere('orientations', 'rlike',  '(^|,)' . $orientations_search . '(,|$)' )
                            ->orWhere('standing', 'rlike',  '(^|,)' . $standing_search . '(,|$)' )
                            ->orWhere('condition', 'rlike',  '(^|,)' . $conditions_search . '(,|$)' )
                            ->orWhere('subtype', 'rlike',  '(^|,)' . $subtype_search . '(,|$)' )
                            ->orWhere('property_id', 'like',  $search_keywords )
                            ->orWhere('reference', 'like', '%' . $search_keywords . '%')
                            ->orWhere('construction_year', 'like', '%' . $search_keywords . '%')
                            ->orWhere('renovation_year', 'like', '%' . $search_keywords . '%')
                            ->orWhere('style', 'like', '%' . $search_keywords . '%')
                            ->orWhereIn('property_id', $heating_access_array)
                            ->orWhereIn('property_id', $heating_device_array)
                            ->orWhereIn('property_id', $heating_type_array)
                            ->orWhereIn('property_id', $water_access_array)
                            ->orWhereIn('property_id', $water_device_array)
                            ->orWhereIn('property_id', $water_waste_array)
                            ->orWhereIn('property_id', $commentary);
                    }
                })
                ->whereIn('country', $country_array)
                ->get()
                ->count();
        } else {
            $properties = DB::table('apimo_properties')
                ->where($conditions_where)
                ->where(function($query) use ($object_standing) {
                    if($object_standing != '') {
                        $query->where('standing', $object_standing);
                    }
                })
                ->where(function($query) use ($object_view) {
                    if($object_view != '') {
                        $query->where('landscape', 'rlike', '(^|,)' . $object_view . '(,|$)');
                    }
                })
                ->where(function($query) {
                    $query->orWhere('reference', 'like', 'HSTP%')
                        ->orWhere('reference', 'like', 'HD%');
                })
                ->where(function($query) use ($object_equipments) {
                    if($object_equipments != '') {
                        foreach ($object_equipments as $equipments) {
                            $query->where('services', 'rlike', '(^|,)' . $equipments . '(,|$)');
                        }
                    }
                })
                ->whereIn('type', $object_type)
                ->whereIn('category', $sell_type_array)
                ->whereIn('city', $object_place)
                ->whereIn('country', $country_array)
                ->limit($items)
                ->offset($offset)
                ->orderBy('created_at', 'DESC')
                ->get();

            $this->property_count = DB::table('apimo_properties')
                ->where($conditions_where)
                ->where(function($query) use ($object_standing) {
                    if($object_standing != '') {
                        $query->where('standing', $object_standing);
                    }
                })
                ->where(function($query) use ($object_view) {
                    if($object_view != '') {
                        $query->where('landscape', 'rlike', '(^|,)' . $object_view . '(,|$)');
                    }
                })
                ->where(function($query) {
                    $query->orWhere('reference', 'like', 'HSTP%')
                        ->orWhere('reference', 'like', 'HD%');
                })
                ->where(function($query) use ($object_equipments) {
                    if($object_equipments != '') {
                        foreach ($object_equipments as $equipments) {
                            $query->where('services', 'rlike', '(^|,)' . $equipments . '(,|$)');
                        }
                    }
                })
                ->whereIn('type', $object_type)
                ->whereIn('category', $sell_type_array)
                ->whereIn('city', $object_place)
                ->whereIn('country', $country_array)
                ->get()
                ->count();
        }


        $this->all_property_count = DB::table('apimo_properties')
            ->whereIn('country', $country_array)
            ->where(function($query) {
                $query->orWhere('reference', 'like', 'HSTP%')
                    ->orWhere('reference', 'like', 'HD%');
            })
            ->get()
            ->count();

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
                $array[$property['property_id']]['price_period'] = self::getPricePeriodById($property['price_period']);
                $array[$property['property_id']]['floor'] = self::getFloorByPropertyId($property['property_id']);
                $array[$property['property_id']]['view'] = self::getViewById($property['view']);
                $array[$property['property_id']]['condition'] = self::getConditionById($property['condition']);
                $array[$property['property_id']]['standing'] = self::getStandingById($property['standing']);
                $array[$property['property_id']]['services'] = self::getServicesByIds($property['services']);
                $array[$property['property_id']]['orientations'] = self::getOrientationsByIds($property['orientations']);
                $array[$property['property_id']]['landscape'] = self::getViewByIds($property['landscape']);
                $array[$property['property_id']]['district'] = self::getDistrictByIds($property['district']);
                $array[$property['property_id']]['proximities'] = self::getProximitiesByIds($property['proximities']);
                $array[$property['property_id']]['agreement'] = self::getAgreementsByIds($property['agreement']);
                $array[$property['property_id']]['areas'] = self::getAreasByIds($property['areas']);
                $array[$property['property_id']]['heating'] = self::getHeatingByIds($property['heating']);
                $array[$property['property_id']]['water'] = self::getWaterByIds($property['water']);
                $array[$property['property_id']]['comments'] = self::getCommentsByIds($property['property_id']);
            }
        }
        return $array;
    }

    public function getPropertiesForSlider($sell_type)
    {
        $items = 10;
        $page = 1;
        $offset = ($page - 1) * $items;
        $array = [];
        $country_array = [];
        $country = [];
        $lang = LaravelLocalization::getCurrentLocale();

        preg_match("/[^\/]+$/", $_SERVER["REQUEST_URI"], $matches);

        $check = isset($matches[0]) ? $matches[0] : false;

        if( stristr($check, '?') == true) {
            $country[] = stristr($check, '?', true);
        } else {
            $country[] = $check;
        }

        if($check == false || in_array('results', $country) || $check == $lang) {
            $country_array = ['FR', 'CH', 'US', 'ZA'];
        }

        if(in_array('france', $country)) {
            $country_array = ['FR'];
        }

        if(in_array('swiss', $country)) {
            $country_array = ['CH'];
        }

        if(in_array('usa', $country)) {
            $country_array = ['US'];
        }

        if(in_array('mauritius', $country)) {
            $country_array = ['ZA'];
        }

        $properties = DB::table('apimo_properties')
            ->where('reference', 'like', 'HSTP%')
            ->whereIn('country', $country_array)
            ->where('agency', '10338')
            ->whereIn('type', [1,2])
            ->whereIn('category', $sell_type)
            ->limit($items)
            ->offset($offset)
            ->orderBy('created_at', 'DESC')
            ->get();

        $this->all_property_count = DB::table('apimo_properties')
            ->whereIn('country', $country_array)
            ->where(function($query) {
                $query->orWhere('reference', 'like', 'HSTP%')
                    ->orWhere('reference', 'like', 'HD%');
            })
            ->get()
            ->count();

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
                $array[$property['property_id']]['price_period'] = self::getPricePeriodById($property['price_period']);
                $array[$property['property_id']]['floor'] = self::getFloorByPropertyId($property['property_id']);
                $array[$property['property_id']]['view'] = self::getViewById($property['view']);
                $array[$property['property_id']]['condition'] = self::getConditionById($property['condition']);
                $array[$property['property_id']]['standing'] = self::getStandingById($property['standing']);
                $array[$property['property_id']]['services'] = self::getServicesByIds($property['services']);
                $array[$property['property_id']]['orientations'] = self::getOrientationsByIds($property['orientations']);
                $array[$property['property_id']]['landscape'] = self::getViewByIds($property['landscape']);
                $array[$property['property_id']]['district'] = self::getDistrictByIds($property['district']);
                $array[$property['property_id']]['proximities'] = self::getProximitiesByIds($property['proximities']);
                $array[$property['property_id']]['agreement'] = self::getAgreementsByIds($property['agreement']);
                $array[$property['property_id']]['areas'] = self::getAreasByIds($property['areas']);
                $array[$property['property_id']]['heating'] = self::getHeatingByIds($property['heating']);
                $array[$property['property_id']]['water'] = self::getWaterByIds($property['water']);
                $array[$property['property_id']]['comments'] = self::getCommentsByIds($property['property_id']);
            }
        }
        return $array;
    }


    /**
     * @param int $sell_type
     * @return mixed
     */
    public function getAllProperties(
        $sell_type = 1,
        $object_type = '',
        $object_place = '',
        $object_equipments = '',
        $object_standing = '',
        $object_view = '',
        $search_keywords = '',
        $price_min = '',
        $price_max = '',
        $surface_min = '',
        $surface_max = '',
        $bedrooms_min = '',
        $bedrooms_max = ''
    ) {

        $array = [];
        $conditions_where = [];
        $country_array = [];
        $country = [];
        $lang = LaravelLocalization::getCurrentLocale();

        preg_match("/[^\/]+$/", $_SERVER["REQUEST_URI"], $matches);

        $check = isset($matches[0]) ? $matches[0] : false;

        if( stristr($check, '?') == true) {
            $country[] = stristr($check, '?', true);
        } else {
            $country[] = $check;
        }

        if($check == false || in_array('results', $country) || $check == $lang) {
            $country_array = ['FR', 'CH', 'US', 'ZA'];
        }

        if(in_array('france', $country)) {
            $country_array = ['FR'];
        }

        if(in_array('swiss', $country)) {
            $country_array = ['CH'];
        }

        if(in_array('usa', $country)) {
            $country_array = ['US'];
        }

        if(in_array('mauritius', $country)) {
            $country_array = ['ZA'];
        }

        if(
            ($_SERVER['REQUEST_URI'] === '/') || ($_SERVER['REQUEST_URI'] === '/fr') || ($_SERVER['REQUEST_URI'] === '/en') ||
            ($_SERVER['REQUEST_URI'] === '/france') || ($_SERVER['REQUEST_URI'] === '/fr/france') || ($_SERVER['REQUEST_URI'] === '/en/france') ||
            ($_SERVER['REQUEST_URI'] === '/swiss') || ($_SERVER['REQUEST_URI'] === '/fr/swiss') || ($_SERVER['REQUEST_URI'] === '/en/swiss') ||
            ($_SERVER['REQUEST_URI'] === '/usa') || ($_SERVER['REQUEST_URI'] === '/fr/usa') || ($_SERVER['REQUEST_URI'] === '/en/usa') ||
            ($_SERVER['REQUEST_URI'] === '/mauritius') || ($_SERVER['REQUEST_URI'] === '/fr/mauritius') || ($_SERVER['REQUEST_URI'] === '/en/mauritius')
        ){
            $sell_type_array = [1, 2, 3, 4, 5, 6];
        } else {
            if ($sell_type == 1) {
                $sell_type_array = [1, 4, 5, 6];
            } else {
                $sell_type_array = [2, 3];
            }
        }

        if ($price_min != '') {
            if(is_numeric($price_min) == true) {
                $conditions_where[] = ['price', '>=', $price_min];
            } else {
                $conditions_where[] = ['price', '>=', '9999999999'];
            }
        };

        if ($price_max != '') {
            if(is_numeric($price_max) == true) {
                $conditions_where[] = ['price', '<=', $price_max];
            } else {
                $conditions_where[] = ['price', '<=', '-1'];
            }
        };

        if ($surface_min != '') {
            if(is_numeric($surface_min) == true) {
                $conditions_where[] = ['area_surface', '>=', $surface_min];
            } else {
                $conditions_where[] = ['area_surface', '>=', '9999999999'];
            }
        };

        if ($surface_max != '') {
            if(is_numeric($surface_max) == true) {
                $conditions_where[] = ['area_surface', '<=', $surface_max];
            } else {
                $conditions_where[] = ['area_surface', '<=', '-1'];
            }
        };

        if ($bedrooms_min != '') {
            if(is_numeric($bedrooms_min) == true) {
                $conditions_where[] = ['bedrooms', '>=', $bedrooms_min];
            } else {
                $conditions_where[] = ['bedrooms', '>=', '9999999999'];
            }
        };

        if ($bedrooms_max != '') {
            if(is_numeric($bedrooms_max) == true) {
                $conditions_where[] = ['bedrooms', '<=', $bedrooms_max];
            } else {
                $conditions_where[] = ['bedrooms', '<=', '-1'];
            }
        };

        if($search_keywords != '') {
            $properties = DB::table('apimo_properties')
                ->where(function($query) {
                    $query->orWhere('reference', 'like', 'HSTP%')
                        ->orWhere('reference', 'like', 'HD%');
                })
                ->where(function ($query) use ($search_keywords) {
                    $lang_short = LaravelLocalization::getCurrentLocale();
                    $lang = LaravelLocalization::getCurrentLocaleRegional();
                    if ($search_keywords != '') {
                        //take reference in the services
                        $services = DB::table('apimo_property_service')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the orientations
                        $orientations = DB::table('apimo_property_orientations')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the condition
                        $conditions = DB::table('apimo_property_condition')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the standing
                        $standing = DB::table('apimo_property_standing')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the subtype
                        $subtype = DB::table('apimo_property_subtype')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the comments
                        $comments = DB::table('apimo_property_comments')
                            ->where('comment', 'like', '%' . $search_keywords . '%')
                            ->where('language', $lang_short)
                            ->get();

                        //property heating
                        $heating_access_reference = DB::table('apimo_property_heating_access')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_device_reference = DB::table('apimo_property_heating_device')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_type_reference = DB::table('apimo_property_heating_type')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_access_check = (!empty($heating_access_reference)) ? $heating_access_reference : '';
                        $heating_device_check = (!empty($heating_device_reference)) ? $heating_device_reference : '';
                        $heating_type_check = (!empty($heating_type_reference)) ? $heating_type_reference : '';

                        $heating_access = DB::table('apimo_heating')
                            ->where('access', 'like', $heating_access_check)
                            ->get()
                            ->groupBy('property_id');

                        $heating_device = DB::table('apimo_heating')
                            ->where('device', 'like', $heating_device_check)
                            ->get()
                            ->groupBy('property_id');

                        $heating_type = DB::table('apimo_heating')
                            ->where('type', 'like', $heating_type_check)
                            ->get()
                            ->groupBy('property_id');

                        //property water
                        $water_access_reference = DB::table('apimo_property_water_hot_access')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_device_reference = DB::table('apimo_property_water_hot_device')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_waste_reference = DB::table('apimo_property_water_waste')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_access_check = (!empty($water_access_reference)) ? $water_access_reference : '';
                        $water_device_check = (!empty($water_device_reference)) ? $water_device_reference : '';
                        $water_waste_check = (!empty($water_waste_reference)) ? $water_waste_reference : '';

                        $water_access = DB::table('apimo_water')
                            ->where('hot_access', 'like', $water_access_check)
                            ->get()
                            ->groupBy('property_id');

                        $water_device = DB::table('apimo_water')
                            ->where('hot_device', 'like', $water_device_check)
                            ->get()
                            ->groupBy('property_id');

                        $water_waste = DB::table('apimo_water')
                            ->where('waste', 'like', $water_waste_check)
                            ->get()
                            ->groupBy('property_id');

                        /**
                         * @param $services_search (services)
                         * @param $orientations_search (orientations)
                         * @param $conditions_search (condition)
                         * @param $conditions_search (condition)
                         * @param $subtype_search (subtype)
                         * @array $commentary (comments)
                         * @array $heating_access_array (heating access)
                         * @array $heating_device_array (heating device)
                         * @array $heating_type_array (heating type)
                         * @array $water_access_array (hot access water)
                         * @array $water_device_array (hot device water)
                         * @array $water_waste_array (waste water)
                         */

                        // arrays
                        $commentary = [];
                        $heating_access_array = [];
                        $heating_device_array = [];
                        $heating_type_array = [];
                        $water_access_array = [];
                        $water_device_array = [];
                        $water_waste_array = [];

                        //check
                        $services_search = (!empty($services)) ? $services : $search_keywords;
                        $orientations_search = (!empty($orientations)) ? $orientations : $search_keywords;
                        $conditions_search = (!empty($conditions)) ? $conditions : $search_keywords;
                        $standing_search = (!empty($standing)) ? $standing : $search_keywords;
                        $subtype_search = (!empty($subtype)) ? $subtype : $search_keywords;

                        foreach ($comments as $comment) {
                            $commentary[] = $comment['property_id'];
                        }

                        // heating
                        foreach ($heating_access as $key => $access) {
                            $heating_access_array[] = $key;
                        }

                        foreach ($heating_device as $key => $device) {
                            $heating_device_array[] = $key;
                        }

                        foreach ($heating_type as $key => $type) {
                            $heating_type_array[] = $key;
                        }

                        // water
                        foreach ($water_access as $key => $access) {
                            $water_access_array[] = $key;
                        }

                        foreach ($water_device as $key => $device) {
                            $water_device_array[] = $key;
                        }

                        foreach ($water_waste as $key => $waste) {
                            $water_waste_array[] = $key;
                        }

                        $query->where('services', 'rlike', '(^|,)' . $services_search . '(,|$)')
                            ->orWhere('orientations', 'rlike', '(^|,)' . $orientations_search . '(,|$)')
                            ->orWhere('standing', 'rlike', '(^|,)' . $standing_search . '(,|$)')
                            ->orWhere('condition', 'rlike', '(^|,)' . $conditions_search . '(,|$)')
                            ->orWhere('subtype', 'rlike', '(^|,)' . $subtype_search . '(,|$)')
                            ->orWhere('property_id', 'like', $search_keywords)
                            ->orWhere('reference', 'like', '%' . $search_keywords . '%')
                            ->orWhere('construction_year', 'like', '%' . $search_keywords . '%')
                            ->orWhere('renovation_year', 'like', '%' . $search_keywords . '%')
                            ->orWhere('style', 'like', '%' . $search_keywords . '%')
                            ->orWhereIn('property_id', $heating_access_array)
                            ->orWhereIn('property_id', $heating_device_array)
                            ->orWhereIn('property_id', $heating_type_array)
                            ->orWhereIn('property_id', $water_access_array)
                            ->orWhereIn('property_id', $water_device_array)
                            ->orWhereIn('property_id', $water_waste_array)
                            ->orWhereIn('property_id', $commentary);
                    }
                })
                ->whereIn('country', $country_array)
                ->get();
        } else {
            $properties = DB::table('apimo_properties')
                ->where(function($query) use ($object_standing){
                    if($object_standing != '' && ($_SERVER['REQUEST_URI'] !== '/') && ($_SERVER['REQUEST_URI'] !== '/fr') && ($_SERVER['REQUEST_URI'] !== '/en')) {
                        $query->where('standing', $object_standing);
                    }
                })
                ->where(function($query) use ($object_view) {
                    if ($object_view != '' && ($_SERVER['REQUEST_URI'] !== '/') && ($_SERVER['REQUEST_URI'] !== '/fr') && ($_SERVER['REQUEST_URI'] !== '/en')) {
                        $query->where('landscape', 'rlike', '(^|,)' . $object_view . '(,|$)');
                    }
                })
                ->where(function($query) {
                    $query->orWhere('reference', 'like', 'HSTP%')
                        ->orWhere('reference', 'like', 'HD%');
                })
                ->where(function($query) use ($object_equipments) {
                    if($object_equipments != '' && ($_SERVER['REQUEST_URI'] !== '/') && ($_SERVER['REQUEST_URI'] !== '/fr') && ($_SERVER['REQUEST_URI'] !== '/en')) {
                        foreach ($object_equipments as $equipments) {
                            $query->where('services', 'rlike', '(^|,)' . $equipments . '(,|$)');
                        }
                    }
                })
                ->whereIn('type', $object_type)
                ->whereIn('category', $sell_type_array)
                ->whereIn('city', $object_place)
                ->where($conditions_where)
                ->where(function($query) {
                    $query->orWhere('reference', 'like', 'HSTP%')
                        ->orWhere('reference', 'like', 'HD%');
                })
                ->whereIn('country', $country_array)
                ->get();
        }

        //dd($_SERVER['REQUEST_URI'] === '/fr');

        if (count($properties) > 0) {
            foreach ($properties as $property) {
                //if($property['latitude'] == '43.22836')
                $array[$property['property_id']] = $property;
                $array[$property['property_id']]['user'] = self::getUserById($property['user']);
                $array[$property['property_id']]['pictures'] = self::getPicturesByIds($property['pictures']);
                $array[$property['property_id']]['step'] = self::getStepByIds($property['step']);
                $array[$property['property_id']]['category'] = self::getCategoryById($property['category']);
                $array[$property['property_id']]['subcategory'] = self::getSubCategoryById($property['subcategory']);
                $array[$property['property_id']]['type'] = self::getTypeById($property['type']);
                $array[$property['property_id']]['subtype'] = self::getSubTypeById($property['subtype']);
                $array[$property['property_id']]['city'] = self::getCityById($property['city']);
                $array[$property['property_id']]['price_period'] = self::getPricePeriodById($property['price_period']);
                $array[$property['property_id']]['view'] = self::getViewById($property['view']);
                $array[$property['property_id']]['condition'] = self::getConditionById($property['condition']);
                $array[$property['property_id']]['standing'] = self::getStandingById($property['standing']);
                $array[$property['property_id']]['services'] = self::getServicesByIds($property['services']);
                $array[$property['property_id']]['orientations'] = self::getOrientationsByIds($property['orientations']);
                $array[$property['property_id']]['landscape'] = self::getViewByIds($property['landscape']);
                $array[$property['property_id']]['district'] = self::getDistrictByIds($property['district']);
                $array[$property['property_id']]['proximities'] = self::getProximitiesByIds($property['proximities']);
                $array[$property['property_id']]['agreement'] = self::getAgreementsByIds($property['agreement']);
                $array[$property['property_id']]['areas'] = self::getAreasByIds($property['areas']);
                $array[$property['property_id']]['water'] = self::getWaterByIds($property['water']);
                $array[$property['property_id']]['comments'] = self::getCommentsByIds($property['property_id']);
                $array[$property['property_id']]['comments'] = self::getCommentsByIds($property['property_id']);
                ///dump();
            }
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
        return $user[0];
    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getServicesByIds($ids)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $services = DB::table('apimo_property_service')
            ->whereIn("reference", explode(',', $ids))
            ->where('locale', $lang)
            ->get();

        $services_array = [];
        if (!empty($services)) {
            foreach ($services as $service) {
                $services_array[$service['reference']] = $service['value'];
                $services_array[$service['reference']] = $service['locale'];
            }
        }

        return $services_array;
    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getOrientationsByIds($ids)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $orientations = DB::table('apimo_property_orientations')
            ->wherein("reference", explode(',', $ids))
            ->where('locale', $lang)
            ->get();

        $orientations_array = [];
        if (!empty($orientations)) {
            foreach ($orientations as $orientation) {
                $orientations_array[$orientation['reference']] = $orientation['value'];
            }
        }

        return $orientations_array;
    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getViewByIds($ids)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $landscapes = DB::table('apimo_property_view_landscape')
            ->wherein("reference", explode(',', $ids))
            ->where('locale', $lang)
            ->get();

        $landscapes_array = [];
        if (!empty($landscapes)) {
            foreach ($landscapes as $landscape) {
                $landscapes_array[$landscape['reference']] = $landscape['value'];
            }
        }

        return $landscapes_array;
    }

    /**
     * @param $district_id
     *
     * @return mixed
     */
    protected static function getDistrictByIds($district_id)
    {
        $district = DB::table('apimo_district')
            ->where("district_id", $district_id)
            ->value('name');

        return $district;
    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getAreasByIds($ids)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();

        $areas = DB::table('apimo_areas')
            ->select(
                'apimo_areas.id as id',
                'apat.value as type',
                'apimo_areas.number',
                'apimo_areas.area as area',
                'apfg.value as flooring',
                'apf.value as floor_type',
                'apimo_areas.floor_value as floor_value'
            //'apimo_property_orientations.value as orientations'
            )
            ->leftJoin('apimo_property_areas_type as apat', 'apimo_areas.type', '=', 'apat.reference')
            ->leftJoin('apimo_property_flooring as apfg', 'apimo_areas.flooring', '=', 'apfg.reference')
            ->leftJoin('apimo_property_floor as apf', 'apimo_areas.floor_type', '=', 'apf.reference')
            //->leftJoin('apimo_property_orientations', 'apimo_areas.orientations', '=', 'apimo_property_orientations.reference')

            ->whereIn('id', explode(',', $ids))
            ->where('apat.locale', '=', $lang)
            ->where('apfg.locale', '=', $lang)
            ->where('apf.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_areas.type')
            ->where('apfg.locale', '=', $lang)
            ->where('apf.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_areas.flooring')
            ->where('apat.locale', '=', $lang)
            ->where('apf.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_areas.floor_type')
            ->where('apat.locale', '=', $lang)
            ->where('apfg.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_areas.type')
            ->whereNull('apimo_areas.flooring')
            ->where('apf.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_areas.type')
            ->whereNull('apimo_areas.floor_type')
            ->where('apfg.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_areas.flooring')
            ->whereNull('apimo_areas.floor_type')
            ->where('apat.locale', '=', $lang)

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
                // $areas_array[$area['id']]['orientations'] = $area['orientations'];

            }
        }

        sort($areas_array);
        return $areas_array;
    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getHeatingByIds($ids)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();

        $heating = DB::table('apimo_heating')
            ->select(
                'apimo_heating.id as id',
                'apha.value as access',
                'aphd.value as device',
                'apht.value as type'
            )

            ->leftJoin('apimo_property_heating_access as apha', 'apimo_heating.access', '=', 'apha.reference')
            ->leftJoin('apimo_property_heating_device as aphd', 'apimo_heating.device', '=', 'aphd.reference')
            ->leftJoin('apimo_property_heating_type as apht', 'apimo_heating.type', '=', 'apht.reference')

            ->whereIn('id', explode(',', $ids))
            ->where('apha.locale', '=', $lang)
            ->where('aphd.locale', '=', $lang)
            ->where('apht.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_heating.access')
            ->where('aphd.locale', '=', $lang)
            ->where('apht.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_heating.device')
            ->where('apha.locale', '=', $lang)
            ->where('apht.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_heating.type')
            ->where('apha.locale', '=', $lang)
            ->where('aphd.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_heating.access')
            ->whereNull('apimo_heating.device')
            ->where('apht.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_heating.access')
            ->whereNull('apimo_heating.type')
            ->where('aphd.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_heating.device')
            ->whereNull('apimo_heating.type')
            ->where('apha.locale', '=', $lang)

            ->get();

        $heating_array = [];
        if (!empty($heating)) {
            foreach ($heating as $value) {
                $heating_array[$value['id']]['access'] = $value['access'];
                $heating_array[$value['id']]['device'] = $value['device'];
                $heating_array[$value['id']]['type'] = $value['type'];
            }
        }
        // dump($heating_array);
        return $heating_array;


    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getWaterByIds($ids)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();

        $water = DB::table('apimo_water')
            ->select(
                'apimo_water.id as id',
                'apwha.value as hot_access',
                'apwhd.value as hot_device',
                'apww.value as waste'
            )
            ->leftJoin('apimo_property_water_hot_access as apwha', 'apimo_water.hot_access', '=', 'apwha.reference')
            ->leftJoin('apimo_property_water_hot_device as apwhd', 'apimo_water.hot_device', '=', 'apwhd.reference')
            ->leftJoin('apimo_property_water_waste as apww', 'apimo_water.waste', '=', 'apww.reference')

            ->whereIn('id', explode(',', $ids))
            ->where('apwha.locale', '=', $lang)
            ->where('apwhd.locale', '=', $lang)
            ->where('apww.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_water.hot_access')
            ->where('apwhd.locale', '=', $lang)
            ->where('apww.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_water.hot_device')
            ->where('apwha.locale', '=', $lang)
            ->where('apww.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_water.waste')
            ->where('apwha.locale', '=', $lang)
            ->where('apwhd.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_water.hot_access')
            ->whereNull('apimo_water.hot_device')
            ->where('apww.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_water.hot_access')
            ->whereNull('apimo_water.waste')
            ->where('apwhd.locale', '=', $lang)

            ->whereIn('id', explode(',', $ids), 'or')
            ->whereNull('apimo_water.hot_device')
            ->whereNull('apimo_water.waste')
            ->where('apwha.locale', '=', $lang)

            ->get();

        $water_array = [];
        if (!empty($water)) {
            foreach ($water as $value) {
                $water_array[$value['id']]['hot_access'] = $value['hot_access'];
                $water_array[$value['id']]['hot_device'] = $value['hot_device'];
                $water_array[$value['id']]['waste'] = $value['waste'];
            }
        }
        // dump($water_array);
        return $water_array;
    }

    /**
     * @param int $property_id
     * @return array
     */
    protected static function getFloorByPropertyId($property_id)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();

        $floor = DB::table('apimo_floor')
            ->select(['apimo_property_floor.value as type','apimo_floor.value','apimo_floor.levels','apimo_floor.floors'])
            ->leftJoin('apimo_property_floor', 'apimo_floor.type', '=', 'apimo_property_floor.reference')
            ->whereIn('apimo_floor.property_id', explode(',',$property_id))
            ->where('locale', $lang)
            ->get()->toArray();
        if (count($floor) > 0) {
            $floor = $floor[0];
        }

        //dump($floor);
        return $floor;
    }

    /**
     * @param $ids
     *
     * @return mixed
     */
    protected static function getProximitiesByIds($ids)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $proximities = DB::table('apimo_property_proximity')
            ->whereIn("reference", explode(',', $ids))
            ->where('locale', $lang)
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
        $lang = LaravelLocalization::getCurrentLocaleRegional();

        $step = DB::table('apimo_property_step')
            ->where("reference", $step_id)
            ->where("locale", $lang)
            ->get();

        if (!empty($step)) {
            $step_id = $step[0]['reference'];
        }

        return $step_id;
    }

    /**
     * @param $agreement_id
     *
     * @return mixed
     */
    protected static function getAgreementsByIds($agreement_id)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();

        $agreements = DB::table('apimo_property_agreement')
            ->where("reference", $agreement_id)
            ->where("locale", $lang)
            ->get()
            ->toArray();

        if (!empty($agreements)) {
            $agreement_array['value'] = $agreements[0]['value'];
            $agreement_array['reference'] = $agreements[0]['reference'];
            $agreement_id = $agreement_array;
        }

        return  $agreement_id;
    }

    /**
     * @param $cat_id
     *
     * @return mixed
     */
    protected static function getCategoryById($cat_id)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $step = DB::table('apimo_property_category')
            ->where("reference", $cat_id)
            ->where("locale", $lang)
            ->get();

        if (!empty($step)) {
            $category_array['value'] = $step[0]['value'];
            $category_array['reference'] = $step[0]['reference'];
            $cat_id = $category_array;
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
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $sub_cat = '';
        if ($sub_cat_id != 0) {
            $r = DB::table('apimo_property_subcategory')
                ->where("reference", $sub_cat_id)
                ->where("locale", $lang)
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
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        if ($type_id != 0) {
            $r = DB::table('apimo_property_type')
                ->where("reference", $type_id)
                ->where("locale", $lang)
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
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        if ($sub_type_id != 0) {
            $r = DB::table('apimo_property_subtype')
                ->where("reference", $sub_type_id)
                ->where("locale", $lang)
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
     * @param $city_id
     *
     * @return mixed
     */
    protected static function getPricePeriodById($id)
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        if ($id != 0) {
            $r = DB::table('apimo_property_period')
                ->where("reference", $id)
                ->where("locale", $lang)
                ->get();

            if (!empty($r)) {
                $id = $r[0]['value'];
            }
        }

        return $id;
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
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        if ($condition_id != 0) {
            $r = DB::table('apimo_property_condition')
                ->where("reference", $condition_id)
                ->where("locale", $lang)
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
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        if ($standing_id != 0) {
            $r = DB::table('apimo_property_standing')
                ->where("reference", $standing_id)
                ->where("locale", $lang)
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
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        if ($view_id != 0) {
            $r = DB::select(
                "SELECT apvt.value AS type, apvl.value AS landscape FROM apimo_view AS av
                                LEFT JOIN apimo_property_view_type AS apvt ON av.type = apvt.reference
                                LEFT JOIN apimo_property_view_landscape AS apvl ON av.landscape = apvl.reference
                                WHERE av.id = :view_id AND apvt.locale = :locale1 AND apvl.locale = :locale2",
                ['view_id' => $view_id, 'locale1' => $lang, 'locale2' => $lang]
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

    protected static function getRegulationsById($property_id){
        $r = [];
        if ($property_id != 0) {
            $r = DB::select("SELECT value FROM apimo_property_regulations
                                                  WHERE property_id = ? AND type IN (1,2)", [$property_id]);
        }

        return $r;
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
        $lang_short = LaravelLocalization::getCurrentLocale();
        $r = [];
        if ($property_id != 0) {
            $r = DB::select("SELECT * FROM apimo_property_comments 
                                    WHERE property_id = ? AND language = ? ", [$property_id, $lang_short ]);
        }
        if (isset($r[0])) {
            $r = $r[0];
        }
        return $r;
    }

    /**
     * Returns a list of property_id
     *
     * @return array
     */
    public static function getPropertyId(
        $sell_type = '',
        $object_type = '',
        $object_place = '',
        $search_keywords = '',
        $price_min = '',
        $price_max = '',
        $surface_min = '',
        $surface_max = '',
        $bedrooms_min = '',
        $bedrooms_max = ''
    )
    {
        if ($sell_type == 1) {
            $sell_type_array = [1, 4, 5, 6];
        } else {
            $sell_type_array = [2, 3];
        }

        $conditions_where = [];

        if ($price_min != '') {
            if(is_numeric($price_min) == true) {
                $conditions_where[] = ['price', '>=', $price_min];
            } else {
                $conditions_where[] = ['price', '>=', '9999999999'];
            }
        };

        if ($price_max != '') {
            if(is_numeric($price_max) == true) {
                $conditions_where[] = ['price', '<=', $price_max];
            } else {
                $conditions_where[] = ['price', '<=', '-1'];
            }
        };

        if ($surface_min != '') {
            if(is_numeric($surface_min) == true) {
                $conditions_where[] = ['area_surface', '>=', $surface_min];
            } else {
                $conditions_where[] = ['area_surface', '>=', '9999999999'];
            }
        };

        if ($surface_max != '') {
            if(is_numeric($surface_max) == true) {
                $conditions_where[] = ['area_surface', '<=', $surface_max];
            } else {
                $conditions_where[] = ['area_surface', '<=', '-1'];
            }
        };

        if ($bedrooms_min != '') {
            if(is_numeric($bedrooms_min) == true) {
                $conditions_where[] = ['bedrooms', '>=', $bedrooms_min];
            } else {
                $conditions_where[] = ['bedrooms', '>=', '9999999999'];
            }
        };

        if ($bedrooms_max != '') {
            if(is_numeric($bedrooms_max) == true) {
                $conditions_where[] = ['bedrooms', '<=', $bedrooms_max];
            } else {
                $conditions_where[] = ['bedrooms', '<=', '-1'];
            }
        };

        if($search_keywords != '') {
            $property_id = DB::table('apimo_properties')
                ->where(function($query) {
                    $query->orWhere('reference', 'like', 'HSTP%')
                        ->orWhere('reference', 'like', 'HD%');
                })
                ->where(function ($query) use ($search_keywords) {
                    $lang_short = LaravelLocalization::getCurrentLocale();
                    $lang = LaravelLocalization::getCurrentLocaleRegional();
                    if ($search_keywords != '') {
                        //take reference in the services
                        $services = DB::table('apimo_property_service')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the orientations
                        $orientations = DB::table('apimo_property_orientations')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the condition
                        $conditions = DB::table('apimo_property_condition')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the standing
                        $standing = DB::table('apimo_property_standing')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the subtype
                        $subtype = DB::table('apimo_property_subtype')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        //take reference in the comments
                        $comments = DB::table('apimo_property_comments')
                            ->where('comment', 'like', '%' . $search_keywords . '%')
                            ->where('language', $lang_short)
                            ->get();

                        //property heating
                        $heating_access_reference = DB::table('apimo_property_heating_access')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_device_reference = DB::table('apimo_property_heating_device')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_type_reference = DB::table('apimo_property_heating_type')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $heating_access_check = (!empty($heating_access_reference)) ? $heating_access_reference : '';
                        $heating_device_check = (!empty($heating_device_reference)) ? $heating_device_reference : '';
                        $heating_type_check = (!empty($heating_type_reference)) ? $heating_type_reference : '';

                        $heating_access = DB::table('apimo_heating')
                            ->where('access', 'like', $heating_access_check)
                            ->get()
                            ->groupBy('property_id');

                        $heating_device = DB::table('apimo_heating')
                            ->where('device', 'like', $heating_device_check)
                            ->get()
                            ->groupBy('property_id');

                        $heating_type = DB::table('apimo_heating')
                            ->where('type', 'like', $heating_type_check)
                            ->get()
                            ->groupBy('property_id');

                        //property water
                        $water_access_reference = DB::table('apimo_property_water_hot_access')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_device_reference = DB::table('apimo_property_water_hot_device')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_waste_reference = DB::table('apimo_property_water_waste')
                            ->where('value', 'like', '%' . $search_keywords . '%')
                            ->where('locale', $lang)
                            ->value('reference');

                        $water_access_check = (!empty($water_access_reference)) ? $water_access_reference : '';
                        $water_device_check = (!empty($water_device_reference)) ? $water_device_reference : '';
                        $water_waste_check = (!empty($water_waste_reference)) ? $water_waste_reference : '';

                        $water_access = DB::table('apimo_water')
                            ->where('hot_access', 'like', $water_access_check)
                            ->get()
                            ->groupBy('property_id');

                        $water_device = DB::table('apimo_water')
                            ->where('hot_device', 'like', $water_device_check)
                            ->get()
                            ->groupBy('property_id');

                        $water_waste = DB::table('apimo_water')
                            ->where('waste', 'like', $water_waste_check)
                            ->get()
                            ->groupBy('property_id');

                        /**
                         * @param $services_search (services)
                         * @param $orientations_search (orientations)
                         * @param $conditions_search (condition)
                         * @param $conditions_search (condition)
                         * @param $subtype_search (subtype)
                         * @array $commentary (comments)
                         * @array $heating_access_array (heating access)
                         * @array $heating_device_array (heating device)
                         * @array $heating_type_array (heating type)
                         * @array $water_access_array (hot access water)
                         * @array $water_device_array (hot device water)
                         * @array $water_waste_array (waste water)
                         */

                        // arrays
                        $commentary = [];
                        $heating_access_array = [];
                        $heating_device_array = [];
                        $heating_type_array = [];
                        $water_access_array = [];
                        $water_device_array = [];
                        $water_waste_array = [];

                        //check
                        $services_search = (!empty($services)) ? $services : $search_keywords;
                        $orientations_search = (!empty($orientations)) ? $orientations : $search_keywords;
                        $conditions_search = (!empty($conditions)) ? $conditions : $search_keywords;
                        $standing_search = (!empty($standing)) ? $standing : $search_keywords;
                        $subtype_search = (!empty($subtype)) ? $subtype : $search_keywords;

                        foreach ($comments as $comment) {
                            $commentary[] = $comment['property_id'];
                        }

                        // heating
                        foreach ($heating_access as $key => $access) {
                            $heating_access_array[] = $key;
                        }

                        foreach ($heating_device as $key => $device) {
                            $heating_device_array[] = $key;
                        }

                        foreach ($heating_type as $key => $type) {
                            $heating_type_array[] = $key;
                        }

                        // water
                        foreach ($water_access as $key => $access) {
                            $water_access_array[] = $key;
                        }

                        foreach ($water_device as $key => $device) {
                            $water_device_array[] = $key;
                        }

                        foreach ($water_waste as $key => $waste) {
                            $water_waste_array[] = $key;
                        }

                        $query->where('services', 'rlike', '(^|,)' . $services_search . '(,|$)')
                            ->orWhere('orientations', 'rlike', '(^|,)' . $orientations_search . '(,|$)')
                            ->orWhere('standing', 'rlike', '(^|,)' . $standing_search . '(,|$)')
                            ->orWhere('condition', 'rlike', '(^|,)' . $conditions_search . '(,|$)')
                            ->orWhere('subtype', 'rlike', '(^|,)' . $subtype_search . '(,|$)')
                            ->orWhere('property_id', 'like', $search_keywords)
                            ->orWhere('reference', 'like', '%' . $search_keywords . '%')
                            ->orWhere('construction_year', 'like', '%' . $search_keywords . '%')
                            ->orWhere('renovation_year', 'like', '%' . $search_keywords . '%')
                            ->orWhere('style', 'like', '%' . $search_keywords . '%')
                            ->orWhereIn('property_id', $heating_access_array)
                            ->orWhereIn('property_id', $heating_device_array)
                            ->orWhereIn('property_id', $heating_type_array)
                            ->orWhereIn('property_id', $water_access_array)
                            ->orWhereIn('property_id', $water_device_array)
                            ->orWhereIn('property_id', $water_waste_array)
                            ->orWhereIn('property_id', $commentary);
                    }
                })
                ->orderBy('created_at', 'DESC')
                ->pluck('property_id')
                ->toArray();
            return $property_id;
        } else {
            $property_id = DB::table('apimo_properties')
                ->where($conditions_where)
                ->whereIn('type', $object_type)
                ->whereIn('city', $object_place)
                ->whereIn('category', $sell_type_array)
                ->where(function($query) {
                    $query->orWhere('reference', 'like', 'HSTP%')
                        ->orWhere('reference', 'like', 'HD%');
                })
                ->orderBy('created_at', 'DESC')
                ->pluck('property_id')
                ->toArray();
            return $property_id;
        }
    }

    /**
     * Returns a list of equipments with real estate
     *
     * @return array
     */

    public static function getEquipmentsList()
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $equipments_list = DB::table('apimo_property_service')
            ->whereIn('reference', [1, 2, 4, 5, 9, 11, 12, 13, 15, 16, 18, 19, 23, 24, 26, 27, 34, 35, 36, 37, 44, 45, 46, 47, 60, 71, 75])
            ->where('locale', $lang)
            ->orderBy('value', 'ASC')
            ->get();

        return $equipments_list;
    }

    /**
     * Returns a list of standing with real estate
     *
     * @return array
     */

    public static function getStandingList()
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $standing_list = DB::table('apimo_property_standing')
            ->where('locale', $lang)
            ->orderBy('value', 'ASC')
            ->get();

        return $standing_list;
    }

    /**
     * Returns a list of view with real estate
     *
     * @return array
     */

    public static function getViewList()
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $standing_list = DB::table('apimo_property_view_landscape')
            ->where('locale', $lang)
            ->orderBy('value', 'ASC')
            ->get();

        return $standing_list;
    }

    /**
     * Returns a list of cities with real estate
     *
     * @return array
     */
    public static function getCityList()
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $country_array =[];
        $country = [];

        preg_match("/[^\/]+$/", $_SERVER["REQUEST_URI"], $matches);

        $check = isset($matches[0]) ? $matches[0] : false;

        if( stristr($check, '?') == true) {
            $country[] = stristr($check, '?', true);
        } else {
            $country[] = $check;
        }

        if($check == false || in_array('results', $country) || $check == $lang) {
            $country_array[] = ['FR', 'CH', 'US', 'ZA'];
        }

        if(in_array('france', $country)) {
            $country_array[] = ['FR'];
        }

        if(in_array('swiss', $country)) {
            $country_array[] = ['CH'];
        }

        if(in_array('usa', $country)) {
            $country_array[] = ['US'];
        }

        if(in_array('mauritius', $country)) {
            $country_array[] = ['ZA'];
        }

        $properties = DB::table('apimo_properties')
            ->where(function($query) {
                $query->orWhere('reference', 'like', 'HSTP%')
                    ->orWhere('reference', 'like', 'HD%');
            })
            ->whereIn('country', $country_array)->pluck('city');

        $cities = DB::table('apimo_city')->whereIn('city_id', $properties)->get();

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
     * Returns a areas type with real estate
     *
     * @return array
     */
    public static function getAreasTypeIds()
    {
        $areas_ids = [];
        $areas = DB::table('apimo_areas')->select('type')->get()->toArray();
        foreach ($areas as $area) {
            $areas_ids[] = (string)$area['type'];
        }

        return $areas_ids;
    }

    /**
     * Returns the list of available types of real estate
     *
     * @return array
     */
    public static function getAvailablePropertyType()
    {
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $property_type = DB::select("SELECT *
                                            FROM apimo_property_type
                                            WHERE reference IN (
                                              SELECT type
                                              FROM apimo_properties
                                              GROUP BY type
                                            )
                                            AND locale = ?", [$lang]);

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
