<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

use Auth;

use App\UserConfig;
use App\User;
use App\Profile;
use App\Zone;
use App\Business;
use App\Family;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveConfig(Request $request)
    {

        
        // $user = Auth::user();
        $name = $request->get('name');
        $value = $request->get('value');

        saveUserConfig($name,$value);
        
        // $userConfig = UserConfig::firstOrNew(['user_id' => $user->id,'name' => $name]);
        // $userConfig->timestamps = false;
        // $userConfig->user_id = $user->id;
        // $userConfig->name = $name;
        // $userConfig->value = $value;
        // $userConfig->save();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }

    public function addUser(Request $request)
    {  
        $item = new User;
        $item->id = 0;

        justForProfile('admin');

        $availableProfiles = Profile::all();

        $zones = Zone::where('id','>',0)->get();
        $families = Family::all();
        $business = Business::all();

        return view('admin.user.profile',[
            'item'=>$item,
            'availableProfiles'=>$availableProfiles,
            'zones'=>$zones,
            'business'=>$business,
            'families'=>$families
        ]);
    }


    public function list(Request $request)
    {

        // $items = [];

        $me = Auth::user();

        // $query = User::where('id', '<>', $me->id)->orderBy('id', 'desc');
        $query = User::orderBy('id', 'desc');
        
        if($request->input('q')) {
            $query->where('name', 'like' ,"%{$request->input('q')}%")->orWhere('email', 'like', "%{$request->input('q')}%");
        }
        
        $items = $query->paginate(10)->appends($request->input());



        justForProfile('admin');

        return view('admin.user.list',[
            'items'=>$items,
            'q' => $request->input('q', '')
        ]);
    }



    // Mostrar pantalla de perfil del usuario
    public function editProfile($id = 0, Request $request)
    {

        justForProfile('admin');

        if($item = User::find($id)){

        }
        else{
            $item = Auth::user();
        }

        $availableProfiles = Profile::all()->diff($item->profiles);

        $zones = Zone::all();
        $families = Family::all();
        $business = Business::all();

        return view('admin.user.profile',[
            'item'=>$item,
            'availableProfiles'=>$availableProfiles,
            'zones'=>$zones,
            'business'=>$business,
            'families'=>$families
        ]);

    }


    public function patchProfile(Request $request)
    {

        $id = $request->get('id');


        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:user,email,' . $id,
            'name' => 'required|max:200',
            // 'password' => 'nullable|string|min:6|confirmed',
            // 'layout' => 'required',
        ],[ 
            'email.required' => 'El E-mail es requerido',
            'email.unique' => 'El E-mail ya existe en el sistema',           
            'name.required' => 'El nombre esta vacio vamoosss',
            'name.max' => 'El nombre no debe tener mas de 200 caracteres',
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();
            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];
            return response($rsp, 403);
        }


        if($id==0){
            $item = new User;

            $item->password = \Hash::make($request->get('email')); // el password inicial es el mismo mail
    
        }
        else{
            $item = User::find($id);
        }


        $item->email = $request->get('email');
        $item->name = $request->get('name');
        $item->lastname = $request->get('lastname');
        // $item->document_type = $request->get('document_type');
        // $item->document_number = $request->get('document_number');
        $item->phone = $request->get('phone');

        $item->save();

        $profiles = explode(',',$request->get('profiles'));
        if(sizeof($profiles)>0 && $profiles[0] > 0  ){
            $item->profiles()->sync($profiles);
        }
        else{
            $item->profiles()->sync([]);;
        }
        

        $item->zones()->sync($request->get('zones'));
        $item->business()->sync($request->get('business'));
        $item->families()->sync($request->get('families'));


        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }


    

    public function deleteUser($id = 0, Request $request)
    {

        if($item = User::find($id)){

            $item->zones()->delete();
            $item->business()->detach();
            $item->families()->detach();
            
            $item->delete();
        }
      
        return $this->list($request);
    }




    public function editPassword($id = 0, Request $request)
    {

        if($item = User::find($id)){

        }
        else{
            $item = Auth::user();
        }

        return view('admin.user.password',['item'=>$item]);
    }


    public function patchPassword($id = 0, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ],[
            'password.required' => 'Debe ingresar la nueva contraseña',
            'password.string' => 'La contraseña tiene caracteres no permitidos',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden. Volvé a escribirlas',
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();
            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];
            return response($rsp, 403);
        }

        $item = User::find($id);
        $item->password = \Hash::make($request->get('password'));
        $item->save();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }







    
    public function search(Request $request) {
        $term = $request->input('term', '');

        $res = [];

        if($term !== '') {
            $items = User::where('name', 'like', "%$term%")->get();
            foreach($items as $key => $i) {
                $res[$key]['id'] = $i->id;
                $res[$key]['name'] = $i->fullname;                
                // $res[$key]['edit'] = $i->getAdminLink();
            }
        }

        return json_encode($res);
    }


    
    public function getById(Request $request) {
        $id = $request->input('id', '0');

        if($i = User::find($id)){

            $res = new \stdClass();
            $res->id = $i->id;
            $res->name = $i->fullname;
            // $res->subtitle = $i->fullname;
            
            return json_encode($res);
        }
        else{
            $rsp = [
                'status' => 'not-found'                
            ];

            return response($rsp, 501);

        }
        
    }




}
