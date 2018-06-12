<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users;
use View;
use App\Models\Call;
use App\Models\Locations;
use App\Models\SourcePhoneNumber;
use App\Models\PhoneDestination;
use Illuminate\Support\Facades\Validator;
use App\Models\SystemSetting;
use App\Models\Types;
use App\Models\Actions;
use Carbon\Carbon;
use App\Constants\Constants;
use App\Constants\Messages;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    
    
    public function index() {
        
    }
    
    public function types(Request $request) {
        $types = Types::orderBy('order')
        ->paginate(config('master.ROW_PER_PAGE'));
        
        $paging = $types->toArray();
        
        $output ['types'] = $types;
        $output ['paging'] = $paging;
        
        if ($request->ajax()) {
            return view('admin.backend.types.ajax', $output);
        }
        
        return view('admin.backend.types.index', $output);
    }
    
    public function submitType(Request $request) {
        $type = new Types;
        $route = route('types.add.get');
        if(!empty($request->value)) {
            $type = Types::find($request->value);
            $route = route('types.edit.get',$request->value);
        }
        
        if($request->isMethod('post')) {
            
            $messages = [
                'required'       => 'Vui lòng nhập',
            ];
            
            $validator = Validator::make($request->all(),[
                'name' =>  'required'
            ], $messages);
            
            if(!$validator->fails()) {
                DB::beginTransaction();
                try {
                    
                    $type->name = $request->name;
                    $type->icon = $request->icon;
                    $type->is_sync = 0;
                    $action->user_id    = Auth::id();
                    $type->save();
                    
                    DB::commit();
                    
                    return redirect()->route($route)->with('success', Messages::MSG_SETTING_SUCCESS);
                    
                } catch (\Exception $e) {
                    echo  $e->getMessage();exit;
                    DB::rollback();
                    return redirect()->route($route)->with('error',  Messages::MSG_SETTING_ERROR);
                }
                
            } else {
                
                return redirect()->back()->withErrors($validator)->withInput();
                
            }
        }
        return view('admin.backend.types.form', compact('type'));
    }
    
    public function actions(Request $request, Carbon $dt) {
        
        $actions = Actions::leftJoin('types','types.value','=','actions.type_id')->leftJoin('locations','locations.id','=','actions.location_id')->select('actions.*','types.name AS type_name','locations.name as location_name')->orderBy('created_at','desc')
        ->paginate(config('master.ROW_PER_PAGE'));
        
        $paging = $actions->toArray();
        
        
        if ($request->ajax()) {
            return view('admin.backend.actions.ajax', compact('types','paging','actions'));
        }
        
        return view('admin.backend.actions.index', compact('types','paging','actions'));
    }
    
    public function submitAction(Request $request, Carbon $dt) {
        $action = new Actions;
        $types  = Types::all();
        $locations = Locations::orderBy('created_at', 'desc')->get();
        $route  = route('actions.get');
        if(!empty($request->id)) {
            $action = Actions::leftJoin('locations','locations.id','=','actions.location_id')->select('actions.*','locations.latlong')->where('actions.id', $request->id)->first();
        }
        if($request->isMethod('post')) {
            
            $messages = [
                'required'       => 'Vui lòng nhập',
                'numeric'        => 'Vui lòng nhập số'
            ];
            
            $validator = Validator::make($request->all(),[
                'name' =>  'required',
                'cost' =>  'required|numeric',
            ], $messages);
            
            if(!$validator->fails()) {
                DB::beginTransaction();
                try {
                    $action->name        = $request->name;
                    $action->cost        = $request->cost;
                    $action->time       = $request->year . $request->month . $request->day;
                    $action->location    = $request->location;
                    $action->comment     = $request->comment;
                    $action->type_id     = $request->type_id;
                    $action->is_sync     = 0;
                    $action->user_id    = Auth::id();
                    $action->location_id = $request->location_id;
                    $action->created_at = $request->year . '-' . $request->month . '-' . $request->day . ' ' . $request->hour . ':' . $request->minute . ':' . $request->second;
                    $action->updated_at = $request->year . '-' . $request->month . '-' . $request->day . ' ' . $request->hour . ':' . $request->minute . ':' . $request->second;
                    $action->save();
                    DB::commit();
                    
                    return redirect($route)->with('success', Messages::MSG_SETTING_SUCCESS);
                    
                } catch (\Exception $e) {
                    DB::rollback();
                    return redirect($route)->with('error',  Messages::MSG_SETTING_ERROR);
                }
                
            } else {
                
                return redirect()->back()->withErrors($validator)->withInput();
                
            }
        }
        return view('admin.backend.actions.form', compact('types','action','locations'));
    }
    
    public function locations(Request $request, Carbon $dt) {
        
        $locations = Locations::orderBy('created_at', 'desc')->paginate(config('master.ROW_PER_PAGE'));
        
        $paging = $locations->toArray();
        
        
        if ($request->ajax()) {
            return view('admin.backend.locations.ajax', compact('locations','paging'));
        }
        
        return view('admin.backend.locations.index', compact('locations','paging'));
    }
    
    public function submitLocation(Request $request, Carbon $dt) {
        
        $location = new Locations;
        $route = route('locations.add.get');
        if(!empty($request->id)) {
            $location = Locations::find($request->id);
            $route = route('locations.edit.get',$request->id);
        }
        
        if($request->isMethod('post')) {
            
            $messages = [
                'required'       => 'Vui lòng nhập',
            ];
            
            $validator = Validator::make($request->all(),[
                'name'    =>  'required',
                'latlong' =>  'required',
            ], $messages);
            
            if(!$validator->fails()) {
                
                DB::beginTransaction();
                try {
                    
                    $location->name       = $request->name;
                    $location->latlong    = $request->latlong;
                    $location->is_sync    = 0;
                    $location->desc_image = '';
                    $location->address    = $request->address;
                    $location->user_id    = Auth::id();
                    if($request->hasFile('desc_image')) {
                        $file = $request->desc_image;
                        $fileName = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path(Constants::FOLDER_UPLOADS), $fileName);
                        $location->desc_image = Constants::FOLDER_UPLOADS . $fileName;
                    }
                    $location->save();
                    
                    return redirect($route)->with('success', Messages::MSG_SETTING_SUCCESS);
                    
                } catch (\Exception $e) {
                    DB::rollback();
                    return redirect($route)->with('error',  Messages::MSG_SETTING_ERROR);
                }
                
                
            } else {
                return redirect($route)->with('error',  Messages::MSG_SETTING_ERROR);
            }
        }
        return view('admin.backend.locations.form', compact('location'));
    }
    
    
    
}
