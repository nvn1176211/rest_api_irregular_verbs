<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;
use Database;
use Illuminate\Support\Facades\Validator;

class VerbsController extends Controller
{
    private $db_file_path = 'C:\xampp\htdocs\rest_api_irregular_verbs\app\Database.php';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty(Database::IRREGULAR_VERBS)){
            return response(Database::IRREGULAR_VERBS, 200);
        }else{
            $result['error'] = [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => 'Database is empty',
            ];
            return response($result, 500);
        }
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

        $new_v1 = $request['v1'];
        $new_v2 = $request['v2'];
        $new_v3 = $request['v3'];
        if(!empty(Database::IRREGULAR_VERBS[$new_v1])){
            return response("V1 isn't exist. Please pass a valid v1", 400);   
        }

        $new_group_text_verb = '"'.$new_v1.'"=>["v2"=>"'.$new_v2.'","v3"=>"'.$new_v3.'"],];';

        if(!file_exists($this->db_file_path)){
            $result['error'] = [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => 'Database file path is wrong',
            ];
            return response($result, 500);
        }

        $old_file_content = file_get_contents($this->db_file_path);
        $new_file_content = str_replace('];', $new_group_text_verb, $old_file_content);

        $db_file = fopen($this->db_file_path, "w") or die(json_encode([
            'error' => [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => "Database file can't be opened",
            ]
        ]));
        fwrite($db_file, $new_file_content);
        fclose($db_file);
        return response('Create ok', 200);
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
     * @param  int  $v1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $v1)
    {
        $result = [];
        $validator = Validator::make($request->all(), [
            'v2' => 'alpha|max:20',
            'v3' => 'alpha|max:20',
        ]);

        if($validator->fails()){
            $result['error'] = [
                'message' => 'Validate is false. Please check again!',
                'errors' => $validator->errors(),
            ];
            return response($result, 400);
        }

        if( !isset($request['v2']) && !isset($request['v3']) ){
            return response('At least one in v1 and v2 must be exist!', 400);
        }
        if(isset($request['v2'])){
            $new_v2 = $request['v2'];
        }
        if(isset($request['v3'])){
            $new_v3 = $request['v3'];
        }

        if(empty(Database::IRREGULAR_VERBS[$v1])){
            return response("V1 isn't exist. Please pass a valid v1", 400);   
        }

        if( !isset(Database::IRREGULAR_VERBS[$v1]['v2']) || !isset(Database::IRREGULAR_VERBS[$v1]['v3']) ){
            $result['error'] = [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => 'Database is wrong at '.$v1,
            ];
            return response($result, 500);
        }

        if(!file_exists($this->db_file_path)){
            $result['error'] = [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => 'Database file path is wrong',
            ];
            return response($result, 500);
        }

        $old_file_content = file_get_contents($this->db_file_path);

        $v2 = Database::IRREGULAR_VERBS[$v1]['v2'];
        $v3 = Database::IRREGULAR_VERBS[$v1]['v3'];
        $group_text_verb = '"'.$v1.'"=>["v2"=>"'.$v2.'","v3"=>"'.$v3.'"],';
        $new_group_text_verb = '"'.$v1.'"=>["v2"=>"'.($new_v2 ?? $v2).'","v3"=>"'.($new_v3 ?? $v3).'"],';
        $new_file_content = str_replace($group_text_verb, $new_group_text_verb, $old_file_content);
        $db_file = fopen($this->db_file_path, "w") or die(json_encode([
            'error' => [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => "Database file can't be opened",
            ]
        ]));
        fwrite($db_file, $new_file_content);
        fclose($db_file);
        return response('Update ok', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $v1
     * @return \Illuminate\Http\Response
     */
    public function destroy($v1)
    {
        if(empty(Database::IRREGULAR_VERBS[$v1])){
            return response("V1 isn't exist. Please pass a valid v1", 400);   
        }

        if(!file_exists($this->db_file_path)){
            $result['error'] = [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => 'Database file path is wrong',
            ];
            return response($result, 500);
        }

        $old_file_content = file_get_contents($this->db_file_path);

        $v2 = Database::IRREGULAR_VERBS[$v1]['v2'];
        $v3 = Database::IRREGULAR_VERBS[$v1]['v3'];
        $group_text_verb = '"'.$v1.'"=>["v2"=>"'.$v2.'","v3"=>"'.$v3.'"],';
        $new_file_content = str_replace($group_text_verb, '', $old_file_content);
        $db_file = fopen($this->db_file_path, "w") or die(json_encode([
            'error' => [
                'message' => 'Wrong database. Please contact the admin!',
                'errors' => "Database file can't be opened",
            ]
        ]));
        fwrite($db_file, $new_file_content);
        fclose($db_file);
        return response('Delete ok', 200);
    }
}
