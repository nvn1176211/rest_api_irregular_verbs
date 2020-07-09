<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;

class VerbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        preg_match_all("|<tr>\r\n\t\t\t([\s\S]*)\r\n\t\t</tr>\r\n|U",
        Cache::get('raw1'),
        $out1, PREG_PATTERN_ORDER);
        unset($out1[1][0]);
        $out2 = [];        
        // dd($out1[1]);
        foreach($out1[1] as $v){
            preg_match_all("|<td><span style=\"color:teal\">([\s\S]*)</span></td>\r\n\t\t\t<td><span style=\"color:#3366ff\">([\s\S]*)</span></td>\r\n\t\t\t<td><span style=\"color:fuchsia\">([\s\S]*)</span></td>\r\n\t\t\t<td>([\s\S]*)</td>|U",
            $v,
            $i, PREG_PATTERN_ORDER);

            if(!isset($i[1][0]) || !isset($i[2][0]) || !isset($i[3][0]) || !isset($i[4][0])){
                preg_match_all("|<td><span style=\"color:teal\">([\s\S]*)</span>([\s\S]*)</td>\r\n\t\t\t<td><span style=\"color:#3366ff\">([\s\S]*)</span><span style=\"color:#3366ff\">([\s\S]*)</span></td>\r\n\t\t\t<td><span style=\"color:fuchsia\">([\s\S]*)</span><span style=\"color:#ff00ff\">([\s\S]*)</span></td>\r\n\t\t\t<td>([\s\S]*)</td>|U",
                $v,
                $i, PREG_PATTERN_ORDER);
                if(!isset($i[1][0]) || !isset($i[3][0]) || !isset($i[5][0]) || !isset($i[7][0])){
                    preg_match_all("|<td><span style=\"color:teal\">([\s\S]*)</span>([\s\S]*)</td>\r\n\t\t\t<td><span style=\"color:#3366ff\">([\s\S]*)</span></td>\r\n\t\t\t<td><span style=\"color:fuchsia\">([\s\S]*)</span>([\s\S]*)</td>\r\n\t\t\t<td>([\s\S]*)</td>|U",
                    $v,
                    $i, PREG_PATTERN_ORDER);
                    array_push($out2, ['v1'=>$i[1][0],'v2'=>$i[3][0],'v3'=>$i[4][0],'mean'=>$i[6][0]]);
                }
                array_push($out2, ['v1'=>$i[1][0],'v2'=>$i[3][0],'v3'=>$i[5][0],'mean'=>$i[7][0]]);
            }
            array_push($out2, ['v1'=>$i[1][0],'v2'=>$i[2][0],'v3'=>$i[3][0],'mean'=>$i[4][0]]);
        }
        dd($out2);
        
        // preg_match_all("|<table([\s\S]*)</table|U",
        // Cache::get('raw1'),
        // $out2, PREG_PATTERN_ORDER);
        // dd($out1, $out2);
        return Cache::get('raw1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
