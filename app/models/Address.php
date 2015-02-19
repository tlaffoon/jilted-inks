<?php

class Address extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
        'address' => 'required', 
        'street_number' => 'required', 
        'street_name' => 'required', 
        'city' => 'required', 
        'state' => 'required', 
        'zip' => 'required', 
        'country' => 'required', 
        'latitude' => 'required', 
        'longitude' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['address', 'street_number', 'street_name', 'city', 'state', 'zip', 'country', 'latitude', 'longitude'];

    // Distance raw query
    public function scopeDistance($query, $lat, $lng, $radius, $unit = "mi")
    {

        $unit = ($unit === "mi") ? 3963.17 : 6378.10;
        $lat = (float) $lat;
        $lng = (float) $lng;
        $radius = (double) $radius;
        return $query->select(DB::raw("*
                        FROM (
                            SELECT *,
                                   ($unit * ACOS(COS(RADIANS($lat))
                                             * COS(RADIANS(lat))
                                             * COS(RADIANS($lng) - RADIANS(lng))
                                             + SIN(RADIANS($lat))
                                             * SIN(RADIANS(lat)))) AS distance")
                     )
                    ->whereRaw("lat
                          BETWEEN $lat  - ($radius / 69)
                              AND $lat  + ($radius / 69)
                           AND lng
                          BETWEEN $lng - ($radius / (69 * COS(RADIANS($lat))))
                              AND $lng + ($radius / (69 * COS(RADIANS($lat))))
                          ) d WHERE distance <= $radius");
    }

    // CONTROLLER
    // $items = Model::distance($lat, $lng, $radius, "mi")
    //           ->orderBy("distance")
    //           ->get();

}