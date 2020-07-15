<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;
use Database;
use Illuminate\Support\Facades\Validator;

class VerbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Database::IRREGULAR_VERBS['choose']);
        $v1 = 'choose';
        if( !isset(Database::IRREGULAR_VERBS[$v1]['v2']) ){
            die('V2 not found!');
        }
        if( !isset(Database::IRREGULAR_VERBS[$v1]['v3']) ){
            die('V3 not found!');
        }
        $group_text_verb = '"choose"=>["v2"=>"'.Database::IRREGULAR_VERBS[$v1]['v2'].'","v3"=>"'.Database::IRREGULAR_VERBS[$v1]['v3'].'"],';
        dd($group_text_verb);
        
        $new_v2 = 'chosewww';
        $v1 = 'choose';
        $patten = '|\"'.$v1.'\"=>\[\"v2\"=>\"(.*)\",\"v3\"=>\"(.*)\"\]|U';
        // dd($patten);
        preg_match_all(
            $patten,
            file_get_contents('C:\xampp\htdocs\rest_api_irregular_verbs\app\Database.php'),
            $out1,
            PREG_PATTERN_ORDER
        );
        if(empty($out1[0][0])){
            die("V1 isn't exist. Please check again!");
        }
        $fullItem = $out1[0];
        dd($out1);

        // readfile('C:\xampp\htdocs\rest_api_irregular_verbs\app\Database.php');
        
        // $myfile = fopen('C:\xampp\htdocs\rest_api_irregular_verbs\app\Database.php', "r") or die("Unable to open file!");
        // echo fread($myfile,filesize('C:\xampp\htdocs\rest_api_irregular_verbs\app\Database.php'));
        // fclose($myfile);

        // die("Unable to open file!");
        // dd(readfile('C:\xampp\htdocs\rest_api_irregular_verbs\app\Database.php'));
        // preg_match_all(
        //     "|const IRREGULAR_VERBS = (.*);|U",
        //     readfile('C:\xampp\htdocs\rest_api_irregular_verbs\app\Database.php'),
        //     $out1,
        //     PREG_PATTERN_ORDER
        // );
        // dd($out1);
        
        // dd(Database::IRREGULAR_VERBS);
        // return response(Database::IRREGULAR_VERBS, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), [
            'v1' => 'required|alpha|max:20',
            'v2' => 'required|alpha|max:20',
            'v3' => 'required|alpha|max:20',
        ]);
        if($validator->fails()){
            $result['error'] = [
                'message' => 'Validate is false. Please check again!',
                'errors' => $validator->errors(),
            ];
            return response($result, 400);
        }

        $new_v2 = $request['v2'];
        $new_v3 = $request['v3'];
        $new_v1 = $request['v1'];
        if(empty(Database::IRREGULAR_VERBS[$new_v1])){
            return response("V1 is exist. Please pass a valid v1", 400);   
        }

        if( !isset(Database::IRREGULAR_VERBS[$new_v1]['v2']) || !isset(Database::IRREGULAR_VERBS[$new_v1]['v3']) ){
            $result['error'] = [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => 'Database is wrong at '.$new_v1,
            ];
            return response($result, 500);
        }

        $v2 = Database::IRREGULAR_VERBS[$new_v1]['v2'];
        $v3 = Database::IRREGULAR_VERBS[$new_v1]['v3'];
        $group_text_verb = '"'.$new_v1.'"=>["v2"=>"'.$v2.'","v3"=>"'.$v3.'"],';
        $new_group_text_verb = '"'.$new_v1.'"=>["v2"=>"'.($new_v2 ?? $v2).'","v3"=>"'.($new_v3 ?? $v3).'"],';

        $old_file_content = file_get_contents('C:\xampp\htdocs\rest_api_irregular_verbs\app\Database.php');
        $new_file_content = str_replace($group_text_verb, $new_group_text_verb, $old_file_content);

        if(!file_exists('C:\xampp\htdocs\rest_api_irregular_verbs\app\Database.php')){
            $result['error'] = [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => 'Database file path is wrong',
            ];
            return response($result, 500);
        }

        $db_file = fopen('C:\xampp\htdocs\rest_api_irregular_verbs\app\Database.php', "w") or die(json_encode([
            'error' => [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => "Database file can't be opened",
            ]
        ]));
        fwrite($db_file, $new_file_content);
        fclose($db_file);
        return response('ok', 200);   
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $v1
     * @return \Illuminate\Http\Response
     */
    public function show($v1)
    {
        if(!empty(Database::IRREGULAR_VERBS[$v1])){
            $result[$v1] = Database::IRREGULAR_VERBS[$v1];
            return response($result, 200);   
        }else{
            return response('V1 not valid. Please pass a valid v1', 400);       
        }
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

    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, "https://www.englishclub.com/vocabulary/irregular-verbs-list.htm");
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $out1 = curl_exec($ch);
    // curl_close($ch);

   
}
