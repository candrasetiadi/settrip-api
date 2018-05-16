<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    /**
     * Get trip custom list
     *
     * @param $request Request
     */
    public function destination()
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

    public function hotel()
    {
        $hotels = DB::table('lodgings as a')
                        ->get();

        if ( $hotels ) {

            $results['hotels'] = $hotels;

            $res['status'] = 2000;
            $res['message'] = 'This is hotel data!';
            $res['data'] = $results;
            return response($res);

        } else {

            $res['status'] = 4004;
            $res['message'] = 'Failed, data is empty!';
            $res['data'] = new \stdClass;
            return response($res);

        }
    }

    public function transportation()
    {
        $transportations = DB::table('transportations as a')
                        ->select('a.*', 'b.name as type', 'b.ship_type')
                        ->leftJoin('transportation_types as b', 'a.id_transportation_type', '=', 'b.id')
                        ->get();

        if ( $transportations ) {

            $results['transportations'] = $transportations;

            $res['status'] = 2000;
            $res['message'] = 'This is transportation data!';
            $res['data'] = $results;
            return response($res);

        } else {

            $res['status'] = 4004;
            $res['message'] = 'Failed, data is empty!';
            $res['data'] = new \stdClass;
            return response($res);

        }
    }

    public function guide()
    {
        $guides = DB::table('guides as a')
                        ->get();

        if ( $guides ) {

            $results['guides'] = $guides;

            $res['status'] = 2000;
            $res['message'] = 'This is guides data!';
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