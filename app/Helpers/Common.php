<?php

// Funciones para customizar los valores (simil cookie en el servidor)

if (! function_exists('saveUserConfig')) {
    function saveUserConfig($name, $value='', $expectsJson=false){ 

        $user = Auth::user();

        if($expectsJson){
            $value = json_encode($value);
        }

        $userConfig = \App\UserConfig::firstOrNew(['user_id' => $user->id,'name' => $name]);
        $userConfig->timestamps = false;
        $userConfig->user_id = $user->id;
        $userConfig->name = $name;
        $userConfig->value = $value;
        $userConfig->save();

        return true;

    }
}


if (! function_exists('getUserConfig')) {
    function getUserConfig($name, $default=null){ 

        if($user = Auth::user()){
            if($res = $user->getConfig($name)){
                return $res;
            }
            else{
                return $default;
            }
        }
        else{
            return $default;
        }

    }
}




if (! function_exists('justForProfile')) {
    function justForProfile($code, $me=null){ 

        if(!$me){
            $me = Auth::user();
        }

        if($me){
            if(!$me->hasProfile($code)){
                abort(403,"Como " . $me->name . " no tenés los permisos necesarios para lo que intentás hacer.");
            }
            else{
                return true;
            }
        }
        else{
            abort(403,"No hay usuario logueado para poder verificar permisos.");   
        }

    }
}



// En base a todas las columnas, genero un id compuesto que se guarda en la tabla base_value
if (! function_exists('getTableIdField')) {
    function getTableIdField($base_id, $business_id, $zone_id, $family_id, $source_id){ 
        $res = $base_id . '_' . $business_id . '_' . $zone_id . '_' . $family_id . '_' . $source_id;
        return $res;
    }
}


// En base al table_id (tacito), genero un objeto que tiene todas las relaciones necesarias para imprimir
if (! function_exists('getTableProperties')) {
    function getTableProperties($table_id){ 

        
        $e = explode('_',$table_id);

        $res = new \stdClass();        
        $res->id = $table_id;
        $res->base = \App\Base::find($e[0]);
        $res->business = \App\Business::find($e[1]);
        $res->zone = \App\Zone::find($e[2]);
        $res->family = \App\Family::find($e[3]);
        $res->source = \App\Source::find($e[4]);

        return $res;
    }
}


// ARRAY[AREA][COMPANY_SIZE]=VALUE
if (! function_exists('getTableMatrix')) {
    function getTableMatrix($table_id){ 
 
        $res = DB::table('base_value')        
        ->select('area_id','company_size_id','value')
        ->where('table_id', '=', $table_id)        
        ->orderBy('area_id')    
        ->get();

        $matrix = [];
        $prevArea = 0;
        foreach ($res as $r) {

            if( $prevArea != $r->area_id ){
                $matrix[ $r->area_id ] = array();
            }
            $prevArea = $r->area_id;

            $matrix[ $r->area_id ][ $r->company_size_id ] = $r->value;

        }

        return $matrix;
    }
}





// Forma rápida de obtener el id de un source (tabla de exc el)
if (! function_exists('getSourceId')) {
    function getSourceId($code){ 
        
        $rs = \App\Source::whereCode($code)->first();

        $res = $rs->id;

        return $res;
    }
}




// Forma rápida de obtener el id de un source (tabla de exc el)
if (! function_exists('getLastBase')) {
    function getLastBase(){ 
        
        $res = \App\Base::whereActive(1)->orderBy('id','desc')->first();

        return $res;
    }
}






// Formatea los numeros para imprimir final, con comas como separador de miles y sin decimales
if (! function_exists('printNumber')) {
    function printNumber($res){ 
        
        $res = round($res);

        return number_format($res,0,'.',',');;
    }
}




// Formatea los numeros para imprimir final, con comas como separador de miles y sin decimales

if (! function_exists('safeValue')) {
    function safeValue(&$res){ 
        
        if(isset($res)){
            return $res;
        }
        else{
            return '';
        }

    }
}


// Esta tabla depende del segmento que se esté usando para sacar la simulación, así que pongo método con esa mini lógica.
if (! function_exists('getUniversoTable')) {
    function getUniversoTable($segment_id){ 
        
        $tableName = '';
        switch ($segment_id) {
            case 1:
                // Clientes
                $tableName = 'clientes_ultimos_5_anos';
                break;
            case 2:
                // Recovery
                $tableName = 'pot_ab';
                break;
            case 3:
                // Cross
                $tableName = 'cross';
                break;
            case 4:
                // Prospect
                $tableName = 'prospect'; 
                break;
            default:
                break;
        }

        $res = \App\Source::whereCode($tableName)->first();

        return $res;

    }
}



// Esta tabla depende del segmento que se esté usando para sacar la simulación, así que pongo método con esa mini lógica.
if (! function_exists('getMedianaTable')) {
    function getMedianaTable($segment_id){ 
        
        $tableName = 'mediana_general';

        // $tableName = '';
        // switch ($segment_id) {
        //     case 1:
        //         // Clientes
        //         $tableName = 'clientes_ultimos_5_anos_mediana_facturacion';
        //         break;
        //     case 2:
        //         // Recovery
        //         $tableName = 'pot_ab_mediana_facturacion';
        //         break;
        //     case 3:
        //         // Cross
        //         $tableName = 'clientes_ultimos_5_anos_mediana_facturacion'; // fake
        //         break;
        //     case 4:
        //         // Prospect
        //         $tableName = 'clientes_ultimos_5_anos_mediana_facturacion'; // fake
        //         break;
        //     default:
        //         break;
        // }

        $res = \App\Source::whereCode($tableName)->first();

        return $res;

    }
}



// Esta tabla depende del segmento que se esté usando para sacar la simulación, así que pongo método con esa mini lógica.
if (! function_exists('getMadTable')) {
    function getMadTable($segment_id){ 
        
        $tableName = 'mad_general';
        
        // $tableName = '';        
        // switch ($segment_id) {
        //     case 1:
        //         // Clientes
        //         $tableName = 'clientes_ultimos_5_anos_mad_facturacion';
        //         break;
        //     case 2:
        //         // Recovery
        //         $tableName = 'pot_ab_mad_facturacion';
        //         break;
        //     case 3:
        //         // Cross
        //         $tableName = 'clientes_ultimos_5_anos_mad_facturacion'; // fake
        //         break;
        //     case 4:
        //         // Prospect
        //         $tableName = 'clientes_ultimos_5_anos_mad_facturacion'; // fake
        //         break;
        //     default:
        //         break;
        // }

        $res = \App\Source::whereCode($tableName)->first();

        return $res;

    }
}





// Esta tabla depende del segmento que se esté usando para sacar la simulación, así que pongo método con esa mini lógica.
if (! function_exists('getCotaTable')) {
    function getCotaTable($segment_id){ 
        
        $tableName = '';
        switch ($segment_id) {
            case 1:
                // Clientes
                $tableName = 'cotas_clientes_mediana';
                break;
            case 2:
                // Recovery
                $tableName = 'cotas_recuperados_mediana';
                break;
            case 3:
                // Cross
                $tableName = 'cotas_prospectos_mediana';
                break;
            case 4:
                // Prospect
                $tableName = 'cotas_clientes_mediana'; // fake
                break;
            default:
                break;
        }

        $res = \App\Source::whereCode($tableName)->first();

        return $res;

    }
}











// usada en los print de los componentes para imprimir campos que pudieran tener saltos de linea y necesitenb el br y en caso de no existir, mandar default
if (! function_exists('activeAlerts')) {
    function activeAlerts(){ // necesito el & de pasar por referencia para que no muera si la variable no está seteada

        $res = \App\Alert::wherePublished(1)->orderBy('id','desc')->get();

        return $res;


    }
}


// BLOB a BASE64 que uso para los screenshots
if (! function_exists('blobToBase64')) {
    function blobToBase64($var){ // necesito el & de pasar por referencia para que no muera si la variable no está seteada

        if(isset($var)&&$var!=''){
            return 'data:image/png;base64,'. chunk_split(base64_encode($var))  ; 
        }
        else{
            return "data:image/png;base64,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";
        }

    }
}


// En base al group del route donde estoy, intuyo si estoy dentro de la zona de admin o no
if (! function_exists('isInAdmin')) {
    function isInAdmin(){        
        return  \Route::current()->action['prefix'] == '/admin';
    }
}





// usada en los print de los componentes para imprimir campos que pudieran tener saltos de linea y necesitenb el br y en caso de no existir, mandar default
if (! function_exists('field')) {
    function field(&$str, $default=''){ // necesito el & de pasar por referencia para que no muera si la variable no está seteada

        if(isset($str) && $str !== null){
            return nl2br($str);
        }
        else{
            return $default;
        }


    }
}


// busca si existe la variable y la retorna o retorna el valor default
if (! function_exists('gg')) {
    function gg(&$var, $default=''){ // necesito el & de pasar por referencia para que no muera si la variable no está seteada

        if(isset($var) && $var !== null){
            return $var;
        }
        else{
            return $default;
        }


    }
}


// busca si existe la variable y si es distinto a '' y va a true or false (es par los IF de los blades por campos que pueden no existir)
if (! function_exists('has')) {
    function has(&$var){ // necesito el & de pasar por referencia para que no muera si la variable no está seteada

        if(isset($var) && $var !== null && $var != ''){
            return true;
        }
        else{
            return false;
        }


    }
}





// cuando traia la lista de elementos (paginas en general) con un array de ids desde el field, me ordenaba cualquier cosa, con esto, mantengo el orden del array.
// $items = fieldObjectsOfArray($fields->folders,\App\Folder::class)
if (! function_exists('fieldObjectsOfArray')) {
    function fieldObjectsOfArray($idsArray, $model){

        $ids_ordered = implode(',', $idsArray);

        return $model::whereIn('id', $idsArray)
         ->orderByRaw(DB::raw("FIELD(id, $ids_ordered)"))
         ->get();

    }
}


// usada en los print de los componentes para imprimir campos que pudieran tener saltos de linea y necesitenb el br y en caso de no existir, mandar default
if (! function_exists('getLink')) {
    function getLink(&$link){ // necesito el & de pasar por referencia para que no muera si la variable no está seteada

        if (isset($link) && $link !== null && $link != '') {
            if (is_numeric($link)) {
                if ($i = App\Folder::find($link)) {
                    return $i->getLink()['href']; /// TODO podria querer meter logica de target _blank para paginas linkeadas que vayan para afuera
                } else {
                    return $link;    
                }                
            } else {
                $scheme = parse_url($link, PHP_URL_SCHEME);
                if (empty($scheme)) {
                    $link = 'http://' . ltrim($link, '/');
                }
                return $link;
            }
        } else {
            return '#';    
        }

    }
}


