<?php 

namespace app\Http\controllers;

use \polakjan\mvc\db;

class IndexController
{
    public function index()
    {
        // ----------------------------------------------------------
        // 1. PREPARE ALL INFORMATION WE WILL NEED TO RENDER THE PAGE
        // (no echo or HTML including in this phase)
        // ----------------------------------------------------------

        define('IN_PRODUCTION', true);

        // setup everything we need for the project
        $site_url = SITE_URL;

        // set the content
        $content = 'homepage/layout.php';

        // ---------------------------------
        // 2. RENDER THE PAGE!
        // echoing and including HTML begins
        // ---------------------------------
        
        // db::query("
        //     INSERT 
        //     INTO `region`
        //     (`name`, `slug`)
        //     VALUES
        //     (?, ?)
        // ", [
        //     'Northern Africa', 
        //     'northern-africa'
        // ]);

        // $query = "
        //     SELECT *
        //     FROM `city`
        //     WHERE `CountryCode` = ?
        // ";
        // $cities = db::select($query, ['CZE']);

        // $query = "
        //     SELECT *
        //     FROM `city`
        //     WHERE `Name` = ?
        //     LIMIT 1
        // ";
        // $prague = db::find($query, ['Prague']);

        $red_marker = new \app\Product();
        $red_marker->name = 'Red marker';
        $red_marker->description = 'A marker that has the red color';
        $red_marker->price = '19';
        $red_marker->amount_in_stock = 2;
        $red_marker->insert();

        echo 'I just inserted product nr ' . $red_marker->id;

        // when we are ready with setup, include the wrapper
        include __DIR__ . '/../../../resources/views/html-wrapper.php'; 
    }


    /**
     * get one page of cities
     * 
     * @param integer $page_nr - the number of the page to be displayed
     * @return array - array of cities
     */
    protected function getCities($page_nr = 1)
    {
        // find the offset based on the page size (20)
        $offset = ($page_nr-1) * 20;
        
        $query = "
            SELECT *
            FROM `city`
            ORDER BY `id` ASC
            LIMIT {$offset}, 20
        ";

        return db::select($query);
    }
}

    
