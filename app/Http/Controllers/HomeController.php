<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Get destination list
     *
     * @param $request Request
     */
    public function getDestination()
    {
        $destinations = DB::table('destinations as a')
                        ->select('b.name')
                        ->leftJoin('regencies as b', 'a.id_regencies', '=', 'b.id')
                        ->get();

        if ( $destinations ) {

            $results['destinations'] = $destinations;

            $res['status'] = 2000;
            $res['message'] = 'This is destinations data!';
            $res['data'] = $results;
            return response($res);

        } else {

            $res['status'] = 4004;
            $res['message'] = 'Failed, data is empty!';
            $res['data'] = new \stdClass;
            return response($res);

        }
    }

    public function getBanner()
    {
        $banners = DB::table('banners')
                        ->get();

        if ( $banners ) {

            $results['banners'] = $banners;

            $res['status'] = 2000;
            $res['message'] = 'This is banners data!';
            $res['data'] = $results;
            return response($res);

        } else {

            $res['status'] = 4004;
            $res['message'] = 'Failed, data is empty!';
            $res['data'] = new \stdClass;
            return response($res);

        }
    }

    public function getHowitwork()
    {
        $howItsWorks = DB::table('how_its_works')
                        ->get();

        if ( $howItsWorks ) {

            $results['howItsWorks'] = $howItsWorks;

            $res['status'] = 2000;
            $res['message'] = 'This is banners data!';
            $res['data'] = $results;
            return response($res);

        } else {

            $res['status'] = 4004;
            $res['message'] = 'Failed, data is empty!';
            $res['data'] = new \stdClass;
            return response($res);

        }
    }

    public function getBestAttraction()
    {
        $bestAttractions = DB::table('destinations as a')
                        ->select('a.name as title', 'ticket_local_publish_rate', 'image_path', 'description', 'b.name as city')
                        ->leftJoin('regencies as b', 'a.id_regencies', '=', 'b.id')
                        ->get();

        if ( $bestAttractions ) {

            $results['bestAttractions'] = $bestAttractions;

            $res['status'] = 2000;
            $res['message'] = 'This is best attraction data!';
            $res['data'] = $results;
            return response($res);

        } else {

            $res['status'] = 4004;
            $res['message'] = 'Failed, data is empty!';
            $res['data'] = new \stdClass;
            return response($res);

        }
    }

    public function getTopDestination()
    {
        $topDestinations = DB::table('destinations as a')
                        ->select('b.name as city', 'a.image_path')
                        ->leftJoin('regencies as b', 'a.id_regencies', '=', 'b.id')
                        ->get();

        if ( $topDestinations ) {

            $results['topDestinations'] = $topDestinations;

            $res['status'] = 2000;
            $res['message'] = 'This is top destination data!';
            $res['data'] = $results;
            return response($res);

        } else {

            $res['status'] = 4004;
            $res['message'] = 'Failed, data is empty!';
            $res['data'] = new \stdClass;
            return response($res);

        }
    }
}