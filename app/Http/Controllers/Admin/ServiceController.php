<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requests\FileUploadRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use Validator;


class ServiceController extends Controller
{

    public function uploadImage(Request $request){

        // validaciones definidas del lado del cliente
        if($request->has('validation_rules')){

            $messages = [];
            $rules = [];

            if($validationRules = json_decode($request->get('validation_rules', []), true)){
                foreach ($validationRules as $it) {
                    foreach ($it as $key => $value) {
                        $rules[$key] = $value;
                    }
                }
            }

            if($validationMessages = json_decode($request->get('validation_messages', []), true)){
                foreach ($validationMessages as $it) {
                    foreach ($it as $key => $value) {
                        $messages[$key] = $value;
                    }
                }
            }


            // Estas son las validaciones puestas del lado del backend
            // $validator = Validator::make($request->all(), [
            //     'image' => 'required|image|max:10240|dimensions:min_width=100,min_height=100',
            // ],[
            //     'image.required' => 'Necesitas seleccionar una imagen.',
            //     'image.image' => 'El archivo seleccionado no es una imagen.',
            //     'image.mimes' => 'La imagen debe ser jpeg,png,jpg,gif o svg.',
            //     'image.dimensions' => 'La imagen debe tener al menos 100px de ancho X 100px de alto.',
            //     'image.max' => 'La imagen debe pesar 10MB como máximo.'
            // ]);

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                $validations = $validator->errors()->getMessages();

                $rsp = [
                    'status' => 'with-validations',
                    'validations' => $validations
                ];

                return response($rsp, 403);

            }

        }


        if($request->hasFile('image')){

            $image = $request->file('image');
            $filename = str_random(10) . '.' . $image->getClientOriginalExtension();

            // https://laravel.com/docs/5.6/filesystem

            // si viene parametro archive es porque quiero ponerlo en una carpeta especifica dentro del \storage\app\public\ (en caso de ser local)
            if($request->has('archive')){
                $archive = $request->get('archive');
            }
            else{
                $archive = 'common';
            }

            // guardo la imagen en \storage\app\public\***** (previo correr php artisan storage:link para que genere el syslink)
            $path = $image->storeAs('public/' . $archive, $filename);

            // devuelvo la url de la imagen (en caso de local es facil, agrega el "storage", pero si fuera bucket u otra cosa, devuelve url real)
            $url = Storage::url($path);

        };

        $rsp = [
            'status' => 'success',
            'url' => $url
        ];
        return response()->json($rsp);


    }





    public function uploadFile(Request $request){

        // validaciones definidas del lado del cliente
        if($request->has('validation_rules')){

            $rules = [];
            $messages = [];

            if($validationRules = json_decode($request->get('validation_rules', []), true)){
                foreach ($validationRules as $it) {
                    foreach ($it as $key => $value) {
                        $rules[$key] = $value;
                    }
                }
            }

            if($validationMessages = json_decode($request->get('validation_messages', []), true)){
                foreach ($validationMessages as $it) {
                    foreach ($it as $key => $value) {
                        $messages[$key] = $value;
                    }
                }
            }


            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                $validations = $validator->errors()->getMessages();

                $rsp = [
                    'status' => 'with-validations',
                    'validations' => $validations
                ];

                return response($rsp, 403);

            }


        }


        if($request->hasFile('file')){

            $file = $request->file('file');
            $originalfilename = $file->getClientOriginalName();
            $newfilename = substr($originalfilename, 0, 40);
            $filename = $newfilename . '-' . str_random(10) . '.' . $file->getClientOriginalExtension();

            // https://laravel.com/docs/5.6/filesystem

            // si viene parametro archive es porque quiero ponerlo en una carpeta especifica dentro del \storage\app\public\ (en caso de ser local)
            if($request->has('archive')){
                $archive = $request->get('archive');
            }
            else{
                $archive = 'common';
            }

            $url  = Storage::putFileAs( $archive, $file, $filename);

        };

        $rsp = [
            'status' => 'success',
            'url' => $url,
            'name' => $filename
        ];
        return response()->json($rsp);


    }








}
