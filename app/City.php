<?php

namespace app;

class City
{
    public function getCitiesFromCountry($country_code, $limit = null)
    {
        $query = "
            SELECT *
            FROM `city`
            WHERE `CountryCode` = ?
            " . ($limit ? "LIMIT {$limit}" : "") . "
        ";
        return db::select($query);
    }
}