<?php
/**
 * Created by PhpStorm.
 * User: Andrian Iliev
 * Date: 09.06.2017
 * Time: 15:10
 */

namespace App\Libraries;

use Curl\Curl;
use Illuminate\Support\Facades\DB;

class SyncWithApimo
{
    /**
     * Sets the limit on the number of simultaneously requested objects.
     * API from Apimo allows you to request a maximum of 200 objects at a time.
     *
     * @var int
     */
    public static $limit = 200;

    /**
     * Initiate the receipt of data via the API from Apimo
     */
    public static function update()
    {
        if (self::checkIfSpecifiedTimePassed()) {
            DB::table('apimo_properties')->truncate();
            self::addOrEditPropertiesToDB(self::getAllRealEstate('properties'));
        }
    }

    /**
     * Adds a new object or updates an existing object (only if the object has changed)
     *
     * @param array $properties
     */
    protected static function addOrEditPropertiesToDB($properties)
    {

        if (is_array($properties) && !empty($properties)) {
            foreach ($properties['properties'] as $property) {
                $checkExistence = DB::select(
                    "SELECT `property_id` FROM `apimo_properties` WHERE property_id = ?",
                    [$property['id']]
                );
                if (empty($checkExistence)) {
                    DB::insert(
                        'INSERT INTO `apimo_properties` ( `property_id`, `reference`, `status`, `user`, `step`, `parent`, `category`, `subcategory`, `name`, `type`, `subtype`, `agreement`, `block_name`, `address`, `address_more`, `publish_address`, `country`, `city`, `district`, `longitude`, `latitude`, `radius`, `area_unit`, `area_surface`, `rooms`, `bedrooms`, `sleeps`, `price`, `price_currency`, `residence`, `view`, `floor`, `heating`, `water`, `condition`, `standing`, `style`, `construction_year`, `renovation_year`, `available_at`, `delivered_at`, `activities`, `orientations`, `services`, `proximities`, `tags`, `tags_customized`, `pictures`, `areas`, `regulations`, `created_at`, `updated_at`)
                                VALUES ( :property_id, :reference, :status, :user, :step, :parent, :category, :subcategory, :name, :type, :subtype, :agreement, :block_name, :address, :address_more, :publish_address, :country, :city, :district, :longitude, :latitude, :radius, :area_unit, :area_surface, :rooms, :bedrooms, :sleeps, :price, :price_currency, :residence, :view, :floor, :heating, :water, :condition, :standing, :style, :construction_year, :renovation_year, :available_at, :delivered_at, :activities, :orientations, :services, :proximities, :tags, :tags_customized, :pictures, :areas, :regulations, :created_at, :updated_at)',
                        [
                            'property_id' => $property['id'],
                            'reference' => $property['reference'],
                            'status' => $property['status'],
                            'user' => $property['user']['id'],
                            'step' => $property['step'],
                            'parent' => $property['parent'],
                            'category' => $property['category'],
                            'subcategory' => $property['subcategory'],
                            'name' => $property['name'],
                            'type' => $property['type'],
                            'subtype' => $property['subtype'],
                            'agreement' => $property['agreement']['type'],
                            'block_name' => $property['block_name'],
                            'address' => $property['address'],
                            'address_more' => $property['address_more'],
                            'publish_address' => $property['publish_address'],
                            'country' => $property['country'],
                            'city' => self::addOrUpdateCity($property['city']),
                            'district' => self::addOrUpdateDistrict($property['district']),
                            'longitude' => $property['longitude'],
                            'latitude' => $property['latitude'],
                            'radius' => $property['radius'],
                            'area_unit' => $property['area']['unit'],
                            'area_surface' => ((!empty($property['area']['value']) || !empty($property['area']['total'])) ? (($property['area']['value'] < $property['area']['total']) ? $property['area']['total'] : $property['area']['value']) : 0),
                            'rooms' => $property['rooms'],
                            'bedrooms' => $property['bedrooms'],
                            'sleeps' => $property['sleeps'],
                            'price' => ((isset($property['price']['value']) && !empty($property['price']['value'])) ? $property['price']['value'] : 0),
                            'price_currency' => ((isset($property['price']['currency'])) ? $property['price']['currency'] : ''),
                            'residence' => self::addOrUpdateResidence($property['residence']),
                            'view' => self::addOrUpdateView($property['view'], $property['id']),
                            'floor' => self::addOrUpdateFloor($property['floor'], $property['id']),
                            'heating' => self::addOrUpdateHeating($property['heating'], $property['id']),
                            'water' => self::addOrUpdateWater($property['water'], $property['id']),
                            'condition' => $property['condition'],
                            'standing' => $property['standing'],
                            'style' => $property['style']['name'],
                            'construction_year' => $property['construction_year'],
                            'renovation_year' => $property['renovation_year'],
                            'available_at' => $property['available_at'],
                            'delivered_at' => $property['delivered_at'],
                            'activities' => (!empty($property['activities']) ? implode(
                                ',',
                                $property['activities']
                            ) : ''),
                            'orientations' => (!empty($property['orientations']) ? implode(
                                ',',
                                $property['orientations']
                            ) : ''),
                            'services' => (!empty($property['services']) ? implode(',', $property['services']) : ''),
                            'proximities' => (!is_null($property['proximities']) ? implode(
                                ',',
                                $property['proximities']
                            ) : ''),
                            'tags' => (!empty($property['tags']) ? implode(',', $property['tags']) : ''),
                            'tags_customized' => (!empty($property['tags_customized']) ? implode(
                                ',',
                                $property['tags_customized']
                            ) : ''),
                            'pictures' => self::addOrUpdatePictures($property['pictures']),
                            'areas' => self::addOrUpdateAreas($property['areas'], $property['id']),
                            'regulations' => self::addOrUpdateRegulations($property['regulations'], $property['id']),
                            'created_at' => $property['created_at'],
                            'updated_at' => $property['updated_at'],
                        ]
                    );
                    self::addOrUpdateUser($property['user']);
                    self::addOrUpdateComments($property['comments'], $property['id']);
                    self::setPropertyHash($property);
                } else {
                    if (self::checkPropertyUpdateByHash($property)) {
                        DB::update(
                            'UPDATE `apimo_properties` SET 
                                `reference`= :reference, 
                                `status`= :status, 
                                `user` = :user, 
                                `step` = :step, 
                                `parent` = :parent, 
                                `category` = :category, 
                                `subcategory` = :subcategory, 
                                `name` = :name, 
                                `type` =  :type, 
                                `subtype` = :subtype,
                                 `agreement` = :agreement, 
                                 `block_name` = :block_name, 
                                 `address` = :address, 
                                 `address_more` = :address_more, 
                                 `publish_address` = :publish_address, 
                                 `country` = :country, 
                                 `city` = :city, 
                                 `district` = :district, 
                                 `longitude` = :longitude, 
                                 `latitude` = :latitude, 
                                 `radius` = :radius, 
                                 `area_unit` = :area_unit, 
                                 `area_surface` = :area_surface, 
                                 `rooms` = :rooms, 
                                 `bedrooms` = :bedrooms, 
                                 `sleeps` =  :sleeps, 
                                 `price` = :price, 
                                 `price_currency` = :price_currency, 
                                 `residence` = :residence, 
                                 `view` = :view, 
                                 `floor` = :floor, 
                                 `heating` = :heating, 
                                 `water` = :water, 
                                 `condition` = :condition, 
                                 `standing` = :standing, 
                                 `style` = :style, 
                                 `construction_year` = :construction_year, 
                                 `renovation_year` = :renovation_year, 
                                 `available_at` = :available_at, 
                                 `delivered_at` = :delivered_at, 
                                 `activities` = :activities, 
                                 `orientations` = :orientations, 
                                 `services` = :services, 
                                 `proximities` = :proximities, 
                                 `tags` = :tags, 
                                 `tags_customized` = :tags_customized, 
                                 `pictures` = :pictures, 
                                 `areas` = :areas, 
                                 `regulations` =:regulations,
                                 `created_at` = :created_at, 
                                 `updated_at` = :updated_at 
                                 WHERE property_id = :property_id',
                            [
                                'property_id' => $property['id'],
                                'reference' => $property['reference'],
                                'status' => $property['status'],
                                'user' => $property['user']['id'],
                                'step' => $property['step'],
                                'parent' => $property['parent'],
                                'category' => $property['category'],
                                'subcategory' => $property['subcategory'],
                                'name' => $property['name'],
                                'type' => $property['type'],
                                'subtype' => $property['subtype'],
                                'agreement' => $property['agreement']['type'],
                                'block_name' => $property['block_name'],
                                'address' => $property['address'],
                                'address_more' => $property['address_more'],
                                'publish_address' => $property['publish_address'],
                                'country' => $property['country'],
                                'city' => self::addOrUpdateCity($property['city']),
                                'district' => self::addOrUpdateDistrict($property['district']),
                                'longitude' => $property['longitude'],
                                'latitude' => $property['latitude'],
                                'radius' => $property['radius'],
                                'area_unit' => $property['area']['unit'],
                                'area_surface' => ((!empty($property['area']['value']) || !empty($property['area']['total'])) ? (($property['area']['value'] < $property['area']['total']) ? $property['area']['total'] : $property['area']['value']) : 0),
                                'rooms' => $property['rooms'],
                                'bedrooms' => $property['bedrooms'],
                                'sleeps' => $property['sleeps'],
                                'price' => ((isset($property['price']['value']) && !empty($property['price']['value'])) ? $property['price']['value'] : 0),
                                'price_currency' => ((isset($property['price']['currency'])) ? $property['price']['currency'] : ''),
                                'residence' => self::addOrUpdateResidence($property['residence']),
                                'view' => self::addOrUpdateView($property['view'], $property['id']),
                                'floor' => self::addOrUpdateFloor($property['floor'], $property['id']),
                                'heating' => self::addOrUpdateHeating($property['heating'], $property['id']),
                                'water' => self::addOrUpdateWater($property['water'], $property['id']),
                                'condition' => $property['condition'],
                                'standing' => $property['standing'],
                                'style' => $property['style']['name'],
                                'construction_year' => $property['construction_year'],
                                'renovation_year' => $property['renovation_year'],
                                'available_at' => $property['available_at'],
                                'delivered_at' => $property['delivered_at'],
                                'activities' => (!empty($property['activities']) ? implode(
                                    ',',
                                    $property['activities']
                                ) : ''),
                                'orientations' => (!empty($property['orientations']) ? implode(
                                    ',',
                                    $property['orientations']
                                ) : ''),
                                'services' => (!empty($property['services']) ? implode(
                                    ',',
                                    $property['services']
                                ) : ''),
                                'proximities' => (!is_null($property['proximities']) ? implode(
                                    ',',
                                    $property['proximities']
                                ) : ''),
                                'tags' => (!empty($property['tags']) ? implode(
                                    ',',
                                    $property['tags']
                                ) : ''),
                                'tags_customized' => (!empty($property['tags_customized']) ? implode(
                                    ',',
                                    $property['tags_customized']
                                ) : ''),
                                'pictures' => self::addOrUpdatePictures($property['pictures']),
                                'areas' => self::addOrUpdateAreas($property['areas'], $property['id']),
                                'regulations' => self::addOrUpdateRegulations($property['regulations'], $property['id']),
                                'created_at' => $property['created_at'],
                                'updated_at' => $property['updated_at'],
                            ]
                        );
                        self::addOrUpdateUser($property['user']);
                        self::addOrUpdateComments($property['comments'], $property['id']);
                    }
                }
            }
        }
        self::setSyncLastTime();
    }

    /**
     * Records the time of the last synchronization with Apimo
     */
    protected static function setSyncLastTime()
    {
        DB::update("UPDATE `sync_last_time` SET timestamp = ? WHERE id=?", [time(), 1]);
    }

    /**
     * Creates a hash of the object and writes it to a database tied to the object id
     *
     * @param array $property
     */
    protected static function setPropertyHash($property)
    {
        DB::insert(
            "INSERT INTO `sync_hash` (property_id, hash) VALUES (?,?)",
            [$property['id'], md5(json_encode($property))]
        );
    }

    /**
     * Checks by hash if there are changes in the layout or not
     * If there is no change, the function returns FALSE
     * If there is a change, the function returns TRUE
     *
     * @param array $property
     *
     * @return bool
     */
    protected static function checkPropertyUpdateByHash($property)
    {
        $hash = DB::select(
            "SELECT `hash` FROM `sync_hash` WHERE `property_id` = ? AND hash = ?",
            [
                $property['id'],
                md5(json_encode($property)),
            ]
        );
        if (empty($hash)) {
            $updateStatus = true;
        } else {
            $updateStatus = false;
        }

        return $updateStatus;
    }


    /**
     * Add or update areas on DB
     *
     * @param array $areas
     *
     * @param int $property_id
     *
     * @return int
     */
    protected static function addOrUpdateAreas($areas, $property_id)
    {
        $areas_ids = null;
        if (is_array($areas) && !empty($areas)) {
            DB::table("apimo_areas")->where('property_id', '=', $property_id)->delete();
            foreach ($areas as $area) {
                DB::insert(
                    'REPLACE INTO apimo_areas SET property_id = ?, type = ?, number=?, area=?, flooring=?, floor_type=?, floor_value=?,orientations=?,comments=?',
                    [
                        $property_id,
                        $area['type'],
                        $area['number'],
                        $area['area'],
                        $area['flooring'],
                        $area['floor']['type'],
                        $area['floor']['value'],
                        json_encode($area['orientations']),
                        json_encode($area['comments']),
                    ]
                );
                $areas_ids[] = DB::connection()->getPdo()->lastInsertId();
            }

        }

        $areas_ids = (!is_null($areas_ids) ? implode(',', $areas_ids) : '');

        return $areas_ids;
    }

    /**
     * Add or update pictures on DB
     *
     * @param array $pictures
     *
     * @return string|null
     */
    protected static function addOrUpdatePictures($pictures)
    {
        $pictures_ids = null;
        if (is_array($pictures) && !empty($pictures)) {
            foreach ($pictures as $picture) {
                $pictures_ids[] = $picture['id'];
                DB::insert(
                    'REPLACE INTO apimo_pictures SET picture_id = ?, 
                                                      rank = ?, 
                                                      url=?, 
                                                      width_max=?, 
                                                      height_max=?, 
                                                      comments=?',
                    [
                        $picture['id'],
                        $picture['rank'],
                        $picture['url'],
                        $picture['width_max'],
                        $picture['height_max'],
                        json_encode($picture['comments']),
                    ]
                );
            }

        }

        $pictures_ids = (!is_null($pictures_ids) ? implode(',', $pictures_ids) : '');

        return $pictures_ids;
    }

    /**
     * Add or update comments on DB
     *
     * @param array $comments
     * @param int $property_id
     *
     * @return null|string
     */
    protected static function addOrUpdateComments($comments, $property_id)
    {

        if (is_array($comments) && !empty($comments)) {
            foreach ($comments as $comment) {
                DB::insert(
                    'REPLACE INTO apimo_property_comments SET property_id = ?, 
                                                      language = ?, 
                                                      title=?, 
                                                      subtitle=?, 
                                                      comment=?, 
                                                      comment_full=?,
                                                      hash=?',
                    [
                        $property_id,
                        $comment['language'],
                        $comment['title'],
                        $comment['subtitle'],
                        $comment['comment'],
                        $comment['comment_full'],
                        $property_id . '_' . $comment['language']
                    ]
                );
            }

        }
    }

    protected static function addOrUpdateRegulations($regulations,$property_id)
    {
        if (is_array($regulations) && !empty($regulations)) {
            foreach ($regulations as $regulation) {
                DB::insert(
                    'REPLACE INTO apimo_property_regulations SET property_id = ?,
                                                      type = ?, 
                                                      value = ?,
                                                      date =?',
                    [
                        $property_id,
                        $regulation['type'],
                        $regulation['value'],
                        $regulation['date'],
                    ]
                );
            }
        }
    }

    /**
     * Add or update price on DB
     *
     * @param array $price
     * @param int $property_id
     *
     * @return int
     */
    protected static function addOrUpdatePrice($price, $property_id)
    {
        $price_id = null;
        if (is_array($price) && !empty($price)) {
            DB::insert(
                'REPLACE INTO apimo_price SET property_id = ?, 
                                              value = ?, 
                                              max=?,
                                              fees=?,
                                              hide=?,
                                              inventory=?,
                                              deposit=?,
                                              currency=?,
                                              commission=?, 
                                              commission_owner=?,
                                              commission_customer=?,
                                              sold=?,
                                              sold_at=?',
                [
                    $property_id,
                    $price['value'],
                    $price['max'],
                    $price['fees'],
                    $price['hide'],
                    $price['inventory'],
                    $price['deposit'],
                    $price['currency'],
                    $price['commission'],
                    $price['commission_owner'],
                    $price['commission_customer'],
                    $price['sold'],
                    $price['sold_at'],
                ]
            );
            $price_id = DB::connection()->getPdo()->lastInsertId();
        }

        return $price_id;
    }

    /**
     * Add or update area on DB
     *
     * @param array $area
     * @param integer $property_id
     *
     * @return int
     */
    protected static function addOrUpdateArea($area, $property_id)
    {
        $area_id = null;
        if (is_array($area) && !empty($area)) {
            DB::insert(
                'REPLACE INTO apimo_area SET property_id = ?, unit = ?, value=?,total=?,weighted=?',
                [
                    $property_id,
                    $area['unit'],
                    (($area['value'] < $area['total']) ? $area['total'] : $area['value']),
                    $area['total'],
                    $area['weighted']
                ]
            );
            $area_id = DB::connection()->getPdo()->lastInsertId();
        }

        return $area_id;
    }

    /**
     * Add or update residence on DB
     *
     * @param array $residence
     *
     * @return int
     */
    protected static function addOrUpdateResidence($residence)
    {
        $residence_id = null;
        if (is_array($residence) && !empty($residence)) {
            $residence_id = $residence['id'];
            if (!is_null($residence_id)) {
                DB::insert(
                    'REPLACE INTO apimo_residence SET id = ?, type = ?, fees =?, lots=?',
                    [$residence['id'], $residence['type'], $residence['fees'], $residence['lots']]
                );
            }
        }

        return $residence_id;
    }

    /**
     * Add or update view on DB
     *
     * @param array $view
     *
     * @return int
     */
    protected static function addOrUpdateView($view, $property_id)
    {
        $view_id = null;
        if (is_array($view) && !empty($view)) {
            if (!is_null($view['type']) || !empty($view['landscape'])) {
                DB::insert(
                    'REPLACE INTO apimo_view SET property_id = ?, type = ?, landscape =?',
                    [$property_id, $view['type'], (!empty($view['landscape']) ? implode(',', $view['landscape']) : '')]
                );

                $view_id = DB::connection()->getPdo()->lastInsertId();
            }
        }

        return $view_id;
    }

    /**
     * Add or update floor on DB
     *
     * @param array $floor
     *
     * @param int $property_id
     *
     * @return int
     */
    protected static function addOrUpdateFloor($floor, $property_id)
    {
        $floor_id = null;
        if (is_array($floor)) {
            if (!is_null($floor['type'])
                || !is_null($floor['value'])
                || !is_null($floor['levels'])
                || !is_null($floor['floors'])
            ) {
                DB::insert(
                    'REPLACE INTO apimo_floor SET property_id = ?, type = ?, value =?, levels=?,floors=?',
                    [$property_id, $floor['type'], $floor['value'], $floor['levels'], $floor['floors']]
                );

                $floor_id = DB::connection()->getPdo()->lastInsertId();
            }
        }

        return $floor_id;
    }

    /**
     * Add or update heating on DB
     *
     * @param array $heating
     *
     * @param int $property_id
     *
     * @return int
     */
    protected static function addOrUpdateHeating($heating, $property_id)
    {
        $floor_id = null;
        if (is_array($heating)) {
            if (!is_null($heating['device']) || !is_null($heating['access']) || !is_null($heating['type'])) {
                DB::insert(
                    'REPLACE INTO apimo_heating SET property_id = ?, type = ?, access =?, device=?',
                    [$property_id, $heating['type'], $heating['access'], $heating['device']]
                );

                $floor_id = DB::connection()->getPdo()->lastInsertId();
            }
        }

        return $floor_id;
    }

    /**
     * Add or update water on DB
     *
     * @param array $water
     *
     * @param int $property_id
     *
     * @return int
     */
    protected static function addOrUpdateWater($water, $property_id)
    {
        $water_id = null;
        if (is_array($water)) {
            if (!is_null($water['hot_device']) || !is_null($water['hot_access']) || !is_null($water['waste'])) {
                DB::insert(
                    'REPLACE INTO apimo_water SET property_id = ?, hot_device = ?, hot_access =?, waste=?',
                    [$property_id, $water['hot_device'], $water['hot_access'], $water['waste']]
                );

                $water_id = DB::connection()->getPdo()->lastInsertId();
            }
        }

        return $water_id;
    }

    /**
     * Add or update district on DB
     *
     * @param array $district
     *
     * @return int
     */
    protected static function addOrUpdateDistrict($district)
    {
        $district_id = null;
        if (is_array($district) && !empty($district)) {
            $district_id = (int)$district['id'];
            DB::insert(
                'REPLACE INTO apimo_district SET district_id = ?, name = ?',
                [$district['id'], $district['name']]
            );
        }

        return $district_id;
    }

    /**
     * Add or update city on DB
     *
     * @param array $city
     *
     * @return int
     */
    protected static function addOrUpdateCity($city)
    {
        $city_id = 0;
        if (is_array($city) && !empty($city)) {
            $city_id = (int)$city['id'];
            DB::insert(
                'REPLACE INTO apimo_city SET city_id = ?, name = ?, zipcode = ?',
                [$city['id'], $city['name'], $city['zipcode']]
            );
        }

        return $city_id;
    }

    /**
     * Add or update city on DB
     *
     * @param array $user
     * @return int
     */
    protected static function addOrUpdateUser($user)
    {
        if (is_array($user) && !empty($user)) {
            DB::insert(
                'REPLACE INTO apimo_users 
                                SET user_id = ?, 
                                    active = ?, 
                                    firstname = ?, 
                                    lastname = ?, 
                                    language = ?, 
                                    `group` = ?, 
                                    email = ?, 
                                    phone = ?, 
                                    fax = ?, 
                                    mobile = ?, 
                                    birthday_at = ?, 
                                    timezone = ?, 
                                    picture = ?',
                [
                    $user['id'],
                    $user['active'],
                    (isset($user['firstname']) ? $user['firstname'] : ''),
                    (isset($user['lastname']) ? $user['lastname'] : ''),
                    (isset($user['language']) ? $user['language'] : ''),
                    (isset($user['group']) ? $user['group'] : ''),
                    (isset($user['email']) ? $user['email'] : ''),
                    (isset($user['phone']) ? $user['phone'] : ''),
                    (isset($user['fax']) ? $user['fax'] : ''),
                    (isset($user['mobile']) ? $user['mobile'] : ''),
                    (isset($user['birthday_at']) ? $user['birthday_at'] : ''),
                    (isset($user['timezone']) ? $user['timezone'] : ''),
                    (isset($user['picture']) ? $user['picture'] : '')
                ]
            );
        }
    }

    /**
     * Check if the specified time in seconds from the last synchronization
     *
     * @return bool
     */
    protected static function checkIfSpecifiedTimePassed()
    {
        $passed = false;
        $specified_time = env('APIMO_TIME_SYNC');
        $now = time();
        $last_sync_time = self::queryLastSyncTimeOnDb();
        if (($now - $specified_time) > $last_sync_time) {
            $passed = true;
        }

        return $passed;
    }

    /**
     * Returns the time of the last synchronization with Apimo
     *
     * @return mixed
     */
    protected static function queryLastSyncTimeOnDb()
    {
        $sync_last_time = DB::table("sync_last_time")->value('timestamp');

        return ($sync_last_time);
    }

    /**
     * Returns all objects received via API from Apimo
     *
     * @param string $type_real_estate
     *
     * @return array
     */
    private static function getAllRealEstate($type_real_estate = 'properties')
    {
        $allRealEstate = [];
        $realEstate = self::getRealEstate($type_real_estate);

        $countAllRealEstate = $realEstate['total_items'];
        $allRealEstate['properties'] = $realEstate['properties'];
        $allRealEstate['timestamp'] = $realEstate['timestamp'];
        for ($i = count($realEstate['properties']); $i < $countAllRealEstate; ($i = $i + count($estate['properties']))) {
            $estate = self::getRealEstate($type_real_estate, $i);
            $allRealEstate['properties'] = array_merge($allRealEstate['properties'], $estate['properties']);
            $allRealEstate['timestamp'] = $estate['timestamp'];
        }
        $allRealEstate['total_items'] = $countAllRealEstate;


        return $allRealEstate;
    }

    /**
     * Returns a limited list of objects
     * Limitations are imposed by APIMO
     *
     * @param int $offset
     * @param string $type_real_estate
     *
     * @return array
     */
    protected static function getRealEstate($type_real_estate, $offset = 0)
    {
        $curl = new Curl();
        $curl->setBasicAuthentication(env('APIMO_PROVIDER'), env('APIMO_TOKEN'));
        $curl->setHeader('Content-Type', 'application/json');
        $curl->get(
            'https://api.apimo.pro/agencies/' . env('APIMO_AGENCY') . '/' . $type_real_estate,
            ['limit' => self::$limit, 'offset' => $offset]
        );
        $response = json_encode($curl->response);
        $properties_array = json_decode($response, true);
        return $properties_array;
    }
}
