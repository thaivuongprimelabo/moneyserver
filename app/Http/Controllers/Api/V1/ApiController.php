<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constants\Constants;
use App\Constants\Messages;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Actions;
use App\Models\Types;
use App\Models\Settings;
use App\Models\Users;
use App\Models\Locations;
use Twilio\Rest\Client;
class ApiController extends Controller
{
    
    public function __construct() {
    }
    
    public function authentication(Request $request) {
        $loginid = $request->loginid;
        $password = $request->password;
        $userdata = array(
            'loginid' => $loginid,
            'password' => $password
        );
        if (Auth::attempt($userdata)) {
            $request->clear = true;
            $request->user_id = Auth::id();
            return $this->sync($request);
        }
        
        $output['code'] = 404;
        $output['message'] = 'Tài khoản hoặc mật khẩu không chính xác';
        return response()->json($output);
    }
    
    public function settings() {
        $settings = Settings::get();
        
        $data = [
            'settings' => $settings
        ];
        
        $output = [
            'code' => 200,
            'data' => json_encode($data)
        ];
        return response()->json($output);
    }
    
    //
    public function backup(Request $request) {
        $output = [];
        if($request->data) {
            $arrData = $request->data;
            DB::beginTransaction();
            try {
                foreach($arrData as $key=>$value) {
                    if(count($arrData[$key]) > 0) {
                        //DB::table($key)->delete();
                        DB::table($key)->insert($value);
                    }
                }
                DB::commit();
                
                $output['code'] = 200;
                $output['message'] = '';
                
            } catch (\Exception $e) {
                DB::rollback();
                
                $output['code'] = 500;
                $output['message'] = $e->getMessage();
                \Log::error($e->getMessage());
            }
        } else {
            $output['code'] = 404;
            $output['message'] = 'Not found!';
        }
        return response()->json($output);
    }
    
    public function sync(Request $request) {
        $types = $actions = $settings = [];
        
        $wheres = [
            ['user_id', '=', $request->user_id],
            ['is_sync', '=', 0]
        ];
        
        if($request->clear) {
            $wheres = [
                ['user_id', '=', $request->user_id]
            ];
        }
        $types = Types::where($wheres)->orWhere('user_id', 9999)->orderBy('order')->get();
        $actions = Actions::where($wheres)->get();
        $locations = Locations::where($wheres)->get();
        Actions::where('user_id', $request->user_id)->update(['is_sync' => 1]);
        Types::where('user_id', $request->user_id)->update(['is_sync' => 1]);
        Locations::where('user_id', $request->user_id)->update(['is_sync' => 1]);
        $settings = Settings::get();
        
        $data = [
            'types' => $types,
            'actions' => $actions,
            'settings' => $settings,
            'locations' => $locations,
            'user_info' => Auth::user()
        ];
        
        $output = [
            'code' => 200,
            'data' => json_encode($data)
        ];
        return response()->json($output);
    }
    
    public function addLocation(Request $request) {
        
        $output = [];
        
        if ($_SERVER["CONTENT_TYPE"] !== 'application/json; charset=utf-8' && $_SERVER["CONTENT_TYPE"] !== 'application/json; charset=UTF-8') {
            $output['code'] = 404;
            $output['message'] = Messages::MSG_SETTING_ERROR;
            $output['content-type'] = $_SERVER["CONTENT_TYPE"];
            return response()->json($output);
        }
        
        DB::beginTransaction();
        try {
            
            if(empty($request->name)) {
                $output['code'] = 404;
                $output['message'] = 'no_parameter_request';
                return response()->json($output);
            }
            
            $location = new Locations;
            $location->name       = $request->name;
            $location->latlong    = $request->latlong;
            $location->is_sync    = 0;
            $location->desc_image = '';
            $location->address    = $request->address;
            $location->save();
            DB::commit();
            $output['code'] = 200;
            $output['message'] = Messages::MSG_SETTING_SUCCESS;
            $output['insertId'] = $location->id;
        } catch (\Exception $e) {
            DB::rollback();
            $output['code'] = 404;
            $output['message'] = Messages::MSG_SETTING_ERROR;
        }
        
        return response()->json($output);
    }
    
    public function call() {
        $sid    = "AC2e2a8068531fd4105c1d482af0d82d64";
        $token  = "3970339517a2e8fcc417273ece6961e5";
        $twilio = new Client($sid, $token);
        
        $call = $twilio->calls
        ->create("+14108675310",
            "+15005550006",
            array("url" => "http://demo.twilio.com/docs/voice.xml")
            );
        
        print($call->sid);
    }
}
