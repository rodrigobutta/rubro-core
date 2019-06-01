<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model{

	protected $table = 'content';

    public function component(){
        return $this->belongsTo(Component::class, 'component_id');
    }

    // convierto a objeto el json del campo fields para tratatlo como si fuera una relacion normal
    public function getFields(){
        if($fields = json_decode($this->fields)){

            // si la variable es un array, tengo que concatenar sus valores porque el component/slot no admite paso de arrays
            // foreach ($fields as &$value) {
            //     if(is_array($value) && sizeof($value)){

            //         if(!is_object($value[0])){ // tengo que dejar tranquilos a los arrays que tienen objetos dentro, que son del repeater y no de un select2 multiple por ej
            //             $value = implode($value,',');
            //         }

            //     }
            // }

            return $fields;
        }
        else{
            return [];
        }
    }

    // si necesitase levantar un campo determinado del fields, lo busco aca. por el momento no lo uso
    public function getField($fieldKey){
        $fields = $this->getFields();
        return $fields->{$fieldKey};
    }

    // convierto a objeto el json del campo fields para tratatlo como si fuera una relacion normal
    public function getParams(){
        if($params = json_decode($this->params)){

            // si la variable es un array, tengo que concatenar sus valores porque el component/slot no admite paso de arrays
            foreach ($params as &$value) {
                if(is_array($value)){
                    $value = implode($value,',');
                }
            }

            return $params;
        }
        else{
            return [];
        }
    }

    // si necesitase levantar un campo determinado del params, lo busco aca. por el momento no lo uso
    public function getParam($fieldKey){
        $params = $this->getParams();
        if(isset($params->{$fieldKey})){
            return $params->{$fieldKey};
        }
        else{
            return '';
        }

    }


    // METODO ALTERNATIVO AL DEL BLADE
    // devuelve el html impreso del content (en base a su component y sus fields). Se usa por ej para el compose.blade, cuando arrastro un componente del store, previo llenado de fields
    public function html(){

        $all = [];
        $all['id'] = $this->id;
        $all['item'] = $this;
        $all['fields'] = $this->getFields();

        foreach ($this->getParams() as $key => $value) {
            $all['p_' . $key] = $value;
        }

        return view('components.' . $this->component->name . '.print' , $all)->render();
    }



    // busca en el param
    public function getOriginAttribute(){
        if($origin = $this->getParam('origin')){
            return $origin;
        }
        else{
            return 0;
        }
    }

    public function folder() {
        return $this->belongsTo(Folder::class);
    }

    public function getRealFolderAttribute() {
        if($this->folder->published) {
            return $this->folder;
        } else {
            $content = Content::where('fields', 'like', '%tabs%')->where('fields', 'like', "%{$this->folder_id}%")->first();
            if($content) {
                return $content->folder;
            }
        }
        return null;
    }

    public function scopeDynamicAds($query)
    {
        $component = Component::whereName('ads-row-dynamic')->firstOrFail();
        return $query->where('component_id', $component->id)->where('holder', '!=', 'trash');
    }



    public function getScreenshot(){

        if(isset($this->screenshot)&&$this->screenshot!=''){
            return 'data:image/png;base64,'. chunk_split(base64_encode($this->screenshot))  ; // paso de blob a bas64
        }
        else{
            return "data:image/png;base64,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";
        }

    }



}