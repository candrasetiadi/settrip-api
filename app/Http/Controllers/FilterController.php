<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    /**
     * Get trip custom list
     *
     * @param $request Request
     */
    public function category($type)
    {
        if ($type == 'destination') {
            $data = DB::table('destination_categories')
                        ->get();
        } elseif ($type == 'restaurant') {
            $data = DB::table('resto_categories')
                        ->get();
        } else {
            $data = null;
        }
        

        if ( $data ) {
            $results['categories'] = $data;

            $res['status'] = 2000;
            $res['message'] = 'This is '. $type .' categories data!';
            $res['data'] = $results;
            return response($res);

        } else {

            $res['status'] = 4004;
            $res['message'] = 'Failed, data is empty!';
            $res['data'] = new \stdClass;
            return response($res);

        }
    }

    public function tag($type)
    {
        $tags = DB::table('tags')
                        ->where('type', $type)
                        ->get();

        if ( $tags ) {
            $results['tags'] = $tags;
            
            $res['status'] = 2000;
            $res['message'] = 'This is '. $type .' tags data!';
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