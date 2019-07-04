<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

use Webpatser\Uuid\Uuid;

// use Intervention\Image\ImageManagerStatic as Image;

use Auth;

use App\Folder;
use App\Layout;
use App\Component;
use App\ComponentFamily;
use App\Content;
use App\Cover;
use App\Profile;
use App\User;

use View;


class FolderController extends Controller
{

    public function __construct()
    {
        $this->preffix = 'filer_0_';
    }


    
    public function panel($id = null,Request $request)
    {

        $ipp = $request->get('ipp',20);


        $me = Auth::user();

        $picked = $me->picked;
      
        if($id){
            $item = Folder::find($id);
  
            $subfolders = $item->children->filter(function ($i) {
                return $i->hasChildren();
            })->values();
            $subfoldersIds = $subfolders->pluck('id')->toArray();

            $parentId = $id;

            $users = User::whereGod(1)->get();
            foreach($item->profiles as $p){
                $users = $users->merge($p->users);             
            }

        }
        else{
            $item = null;

            $subfolders = Folder::where('parent_id',-1)->get()->filter(function ($i) {
                return $i->hasChildren();
            })->values();
            $subfoldersIds = $subfolders->pluck('id')->toArray();

            $parentId = -1;

            $users = [];
        }


        if($request->get('fullchildren') == '1'){

            if($item){
                $childs = $item->getFullChildren();
                $childsIds = $childs->pluck('id')->toArray();
                $items = Folder::whereIn('id',$childsIds);
            }
            else{
                $items = Folder::where('id','>',0);
            }
            
        }
        else{
            $items = Folder::where('parent_id',$parentId);      
        }
        
        if($request->get('published') == '1'){
            $items = $items->where('published','1');
        }

        if($request->get('pinned') == '1'){
            $items = $items->where('pinned','1');
        }


        $items = $items->orderBy('sort')->paginate($ipp);      





        $recentIds = $me->getConfig('recent-folders',true);

        $recent = Folder::whereIn('id',$recentIds)->get();      


        return view('admin.folder.index' , [
            "picked" => $picked,
            "item" => $item,
            "items" => $items,
            "recent" => $recent,
            "user" => $me,
            "users" => $users,
            "subfolders" => $subfolders,
            "ipp" => $ipp
        ])->render();

    }


    
    public function panelSaveSort(Request $request )
    {
        // $item = Folder::find($id);

        $parentId = $request->get('id');
        $items = $request->get('items');

        $table = Folder::getModel()->getTable();

        $cases = [];
        $ids = [];
        $params = [];

        foreach ($items as $order => $id) {
            $id = (int) $id;
            $cases[] = "WHEN {$id} then ?";
            $params[] = $order+1;
            $ids[] = $id;
        }

        $ids = implode(',', $ids);
        $cases = implode(' ', $cases);
        $params[] = Carbon::now();
        $res = \DB::update("UPDATE `{$table}` SET `sort` = CASE `id` {$cases} END, `updated_at` = ? WHERE `id` in ({$ids}) AND parent_id=" . $parentId, $params);

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }



    public function tree(Request $request)
    {

        $fid = $this->getId($request->get('id'));

        $rsp = [
            'status' => true,
            'prompt' => ''
        ];

        $command = $request->get('cmd');

        if ($command == 'opn') {

            $res = [];

            $items = Folder::where('parent_id',$fid)->orderBy('sort')->get();

            foreach ($items as $i) {

                // si no tiene acceso a esa pagina, saltear
                if(!$i->canHandle()){
                    continue;
                }

                $r = [
                    'id' => $this->preffix . $i->id,
                    'text' => $i->name,
                    'state' => false,
                    'children' => sizeof($i->children)>0,
                    'type' => $i->type,
                    'published' => $i->published
                ];

                array_push($res, $r);

            }

            $rsp['factor'] = $res;

        }
        else if ($command == 'pvw') {

            $item = Folder::findOrFail($fid);

            $rsp['factor'] = [
                'url' => $item->getLink()['href']
            ];

        }
        else if ($command == 'rot') {


            $item = Folder::findOrFail($fid);
            $item->parent_id = -1;
            $item->type = 0;
            $item->save();

            $item->consolidate();

            
            $rsp['factor'] = [
                'url' => $item->getLink()['href']
            ];


        }
        else if ($command == 'edt') {

            $item = Folder::findOrFail($fid);

            $rsp['factor'] = [
                'url' => route('admin.folder.edit',['id' => $item->id])
            ];

        }
        else if ($command == 'cmp') {

            $item = Folder::findOrFail($fid);

            $rsp['factor'] = [
                'url' => route('admin.folder.compose',['id' => $item->id])
            ];

        }
        else if ($command == 'ren') {

            $item = Folder::findOrFail($fid);
            $item->name = urldecode($request->get('idt'));
            $item->slug = null;
            $item->save();

            $item->consolidate();

        }
        else if ($command == 'add') {

        }
        else if ($command == 'new') { // folder

            $parent_id = $this->getId($request->get('pid'));

            $name = urldecode($request->get('idt'));

            $item = $this->put($name, $parent_id);

            $rsp['factor'] = ['id' => $item->id];

        }
        else if ($command == 'cpy') {

            $parentId = $this->getId($request->get('pid'));

            $rsp['factor'] = [];

            foreach ($request->get('id') as $id => $ids) {

                $id = $this->getId($ids[0]);

                // $user = Auth::user();

                $item = Folder::findOrFail($id);

                $new = $this->cloneFolder($item, $parentId);

                $rsp['factor'] = ['id' => $new->id];

            }

        }
        else if ($command == 'mve') {

            $parent_id = $this->getId($request->get('pid'));

            $rsp['factor'] = [];

            foreach ($request->get('id') as $id => $ids) {

                $id = $this->getId($ids[0]);

                $item = Folder::findOrFail($id);
                $item->parent_id = $parent_id;
                $item->sort = 0;
                $item->save();

                $item->consolidate();

                $rsp['factor'][$id] = $ids[0];

            }

        }
        else if($command == 'del') {

            $rsp['factor'] = [];

            foreach ($request->get('id') as $id => $ids) {

                $tmpId = $this->getId($ids);

                $item = Folder::findOrFail($tmpId);

                $item->deleteRecursive();

                // $cover = $item->cover;
                // $cover->delete();

                // foreach ($item->contents as $content) {
                //     $content->delete();
                // }

                // $item->delete();

            }

        }

        return response()->json($rsp);

    }


    private function getId($str){
        return str_replace($this->preffix, '', $str);
    }


    public function addFolder(Request $request){
        
        $name = $request->get('name');
        $description = $request->get('description');
        $parent_id = $request->get('parent_id');

        // var_dump($parent_id)
        // var_dump($name);
        // exit();
        $item = $this->put($name, $parent_id, $name, $description);

        // return $this->composeEdit($item->id);

        $rsp = [
            'status' => 'success', 
            'redirect' => route('admin.folder.panel',['id' => $parent_id])            
        ];

        return response()->json($rsp);


    }


    private function put($name, $parent_id, $coverTitle = null, $coverDescription = '' ){
        
        if(!$coverTitle){
            $coverTitle = $name;
        }

        $item = new Folder();
        $item->parent_id = $parent_id;
        $item->name = $name;
        $item->sort = 0;
        $item->type = 1;
        $item->pinned = 0;
        $item->published = 0;
        $item->rank = 5;
        $item->layout_id = 1;
        $item->external = null;
        $item->blank = 0;
        $item->save();

        $item->consolidate();

        $cover = new Cover();
        $cover->title = $coverTitle;
        $cover->description = $coverDescription;
        $cover->folder_id = $item->id;
        $cover->save();

        return $item;
    }



    public function deleteFolder($id){

        $item = Folder::find($id);
        $me = Auth::user();

        if(!$item->canHandle()){
            abort(403,'No tenés permisos para eliminar esta página.');
        }
        
        $item->deleteRecursive();

        return redirect()->route('admin.folder.panel')->with('success', 'Página Eliminada');;
    }



    public function duplicateFolder($id, Request $request){

        $item = Folder::findOrFail($id);

        $parentId = $item->parent_id;

        $new = $this->cloneFolder($item, $parentId);

        return redirect()->route('admin.folder.panel', ['id' => $parentId])->with('success', 'Página Duplicada');;
    }

    public function cutFolder(Request $request){
        
        $id = $request->get('id');

        $item = Folder::findOrFail($id);

        \Session::put('folder_cut', $item);

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }


    public function cutPasteFolder($id, Request $request){

        $item = \Session::get('folder_cut');

        $parentId = $id;

        $item = Folder::findOrFail($item->id);
        $item->parent_id = $parentId;
        $item->sort = 0;
        $item->save();

        $item->consolidate();

        return redirect()->route('admin.folder.panel', ['id' => $parentId])->with('success', 'Página Movida');;

    }



    // COMPOSE

    public function composeEdit($id)
    {
        $item = Folder::find($id);
        $me = Auth::user();

        View::share('editMode', true);

        if(!$item->canHandle()){
            abort(403,'No tenés permisos para editar esta página.');
        }

        // actualizar recientes
        $recent = $me->getConfig('recent-folders',true);        
        array_unshift($recent, $item->id); // agrego al principio el id del folder actual
        $recent = array_unique($recent); // saco duplicados
        $recent = array_slice($recent, 0, 5); // solo guardo ultimos 5
        saveUserConfig('recent-folders',$recent,true);

        $components = Component::all();
        $families = ComponentFamily::orderBy('order')->get();
        $layouts = Layout::all();
        $availableProfiles = Profile::all()->diff($item->profiles);

        $windows = [
            // "tree",
            "store",
            "bag",
            "trash",
            "clipboard",
            "tools"
        ];

        return view('admin.folder.compose', [
            // "composing" => true,
            "item" => $item,
            "components" => $components,
            "user" => $me,
            "families" => $families,
            "windows" => $windows,
            "layouts" => $layouts,
            'availableProfiles' => $availableProfiles
        ]);

    }


    public function composeSave($id, Request $request )
    {
        $item = Folder::find($id);
        $holders = $request->get('holders');

        $me = Auth::user();

        $table = Content::getModel()->getTable();

        foreach ($holders as $holder => $contents) {

            $cases = [];
            $ids = [];
            $params = [];

            foreach ($contents as $order => $id) {
                $id = (int) $id;
                $cases[] = "WHEN {$id} then ?";
                $params[] = $order+1;
                $ids[] = $id;
            }

            $ids = implode(',', $ids);
            $cases = implode(' ', $cases);

            $params[] = $holder;

            $params[] = $item->id; // necesito actualizarlo porque podría haber contents de valija
            
            if($holder=='clipboard'){
                $params[] = $me->id;
            }
            else{
                $params[] = 0;
            }
            
            $params[] = Carbon::now();

            $res = \DB::update("UPDATE `{$table}` SET `sort` = CASE `id` {$cases} END, `holder` = ?, `folder_id` = ?, `clipboard_user_id` = ?, `updated_at` = ? WHERE `id` in ({$ids})", $params);

        }

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }

    // FIN COMPOSE


    
    public function screenshotSave($id, Request $request )
    {
        $item = Folder::find($id);

        $image = file_get_contents($request->file('image'));
        
        $item->screenshot = $image;;
        $item->save();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }



    public function addContent($id, Request $request )
    {

        // $me = Auth::user();


        $folder = Folder::find($id);

        $component = $request->get('component');
        $holder = $request->get('holder');


        $item = new Content();
        $item->holder = $holder;
        $item->folder_id = $id;
        $item->component_id = $component;
        $item->fields = '{}';
        $item->save();

        View::share('editMode', true);

        $rsp = [
            'status' => 'success',
            'contentId' => $item->id,
            'html' => $item->html() //,
            // 'script' => $item->script()
        ];
        return response()->json($rsp);

    }


    public function removeContent($id, Request $request )
    {
        $folder = Folder::find($id);
        $contents = $request->get('contents', []);

        Content::destroy($contents);

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }

    public function clonContent($id, Request $request )
    {
        $folder = Folder::find($id);

        $contentId = $request->get('contentId');
        
        $content = Content::find($contentId);

        $cloned = $content->replicate();

        $cloned->save();

        View::share('editMode', true);

        $rsp = [
            'status' => 'success',
            'contentId' => $cloned->id,
            'html' => $cloned->html() 
        ];
        return response()->json($rsp);

    }

    public function screenshotContent(Request $request )
    {
        $contentId = $request->get('id');
        
        $item = Content::find($contentId);

        $image = file_get_contents($request->file('image'));
        
        $item->screenshot = $image;
        $item->save();

        $rsp = [
            'status' => 'success',
            'image' => blobToBase64($image)
        ];
        return response()->json($rsp);

    }

    public function editContent($id)
    {
        $item = Content::find($id);

        if(!$item){
            return 'ERROR: No encontramos el contenido con el ID (' . $id . '). Posiblemente el component/print no tenga el attributo data-content-id en su nodo ROOT.';
        }

        // decodifico todos los fields guardados para el contenido (que deberian ser consecuentes con el componente)
        $fields = $item->getFields();

        $params = $item->getParams();


        // fix para el box modal de edit cuando el componente aun no tiene parametros. TODO ver si se debe aplicar en otros lados o en el Model Content getParams()
        if(is_array($params)  && sizeof($params)==0){
            $params = new \stdClass();
        }

        View::share('editMode', true);

        return view('components.' . $item->component->name . '.edit' , [
                    'id' => $item->id,
                    'item' => $item,
                    'fields' => $fields,
                    'params' => $params
                ])->render();

    }


    public function saveContent($id, Request $request )
    {
        $item = Content::find($id);
        $is_ads_row_dynamic = false;
        if ($item->component->name === 'ads-row-dynamic') {
            $is_ads_row_dynamic = true;
        }


        $fieldsJson = new \stdClass();
        if($fields = $request->get('fields')){
            foreach ($fields as $key => $value) {
                $fieldsJson->{$key} = $value;
                if ($is_ads_row_dynamic && $key === 'list') {
                    foreach($value as &$slot) {
                        if(!isset($slot['fields']['uuid']) || empty(trim($slot['fields']['uuid']))) {
                            $slot['fields']['uuid'] = Uuid::generate()->string;
                        }
                    }
                    $fieldsJson->{$key} = $value;
                }
            }
            $fieldsJson = json_encode($fieldsJson);
        }
        else{
            $fieldsJson = "";
        }


        $paramsJson = new \stdClass();
        if($params = $request->get('params')){
            foreach ($params as $key => $value) {
                $paramsJson->{$key} = $value;
            }
            $paramsJson = json_encode($paramsJson);
        }
        else{
            $paramsJson = "";
        }


        $item->fields = $fieldsJson;
        $item->params = $paramsJson;
        $item->save();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }



    // PROPERTIES

    public function propertiesEdit($id)
    {
        $item = Folder::find($id);
        $layouts = Layout::all();

        return view('admin.folder.edit', ['item' => $item,'layouts' => $layouts]);

    }

    public function propertiesSave($id, Request $request )
    {

        $validator = Validator::make($request->all(), [
            'slug' => 'required|unique:folder,slug,' . $id,
            'name' => 'required|max:200',
            // 'layout' => 'required',
        ],[
            'slug.required' => 'El :attribute es necesario.',
            'slug.unique' => 'El :attribute no es único.',
            'name.required' => 'El nombre esta vacio vamoosss.',
            'name.max' => 'El nombre no debe tener mas de 200 caracteres.',
            // 'layout.required' => 'Debe seleccionar una plantilla',
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();

            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];

            return response($rsp, 403);

        }


        $item = Folder::find($id);

        $item->name = $request->get('name');
        $item->slug = $request->get('slug');
        // $item->layout_id = $request->get('layout');
        $item->published = $request->get('published',0);
        $item->pinned = $request->get('pinned',0);
        $item->rank = $request->get('rank',0);
        $item->external = $request->get('external');
        $item->blank = $request->get('blank');

        $item->save();
        $item->consolidate();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }

    // FIN PROPERTIES



    // COVER

    public function coverEdit($id)
    {
        $item = Folder::find($id);

        return view('admin.folder.cover', ['item' => $item]);

    }

    public function coverSave($id, Request $request )
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:250',
        ],[
            'title.required' => 'El título está vacio.',
            'title.max' => 'El título debe tener mas de 200 caracteres.'
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();

            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];

            return response($rsp, 403);

        }


        // return response('Algun error controlado', 501);

        $folder = Folder::find($id);
        $item = $folder->cover;

        $item->title = $request->get('title');
        $item->subtitle = $request->get('subtitle');
        $item->image = $request->get('image');
        $item->description = $request->get('description');

        if($request->get('date') && $request->get('date') != ''){
            $date = Carbon::createFromFormat('d/m/Y', $request->get('date'));
            $item->date = $date;            
        }
        else{
            $item->date = null;            
        }
        
        $item->save();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }

    // FIN COVER



    // otros


    public function search(Request $request) {
        $term = $request->input('term', '');

        $res = [];

        if($term !== '') {
            $items = Folder::where('name', 'like', "%$term%")->get();
            foreach($items as $key => $i) {
                $res[$key]['id'] = $i->id;
                $res[$key]['text'] = $i->name;
                $res[$key]['subtitle'] = $i->fullname;
                $res[$key]['edit'] = $i->getAdminLink();
            }
        }

        return json_encode($res);
    }


    
    public function getById(Request $request) {
        $id = $request->input('id', '0');

        if($i = Folder::find($id)){

            $res = new \stdClass();
            $res->id = $i->id;
            $res->text = $i->name;
            $res->subtitle = $i->fullname;
            
            return json_encode($res);
        }
        else{
            $rsp = [
                'status' => 'not-found'                
            ];

            return response($rsp, 404);

        }
        
    }



    public function setLayout($id, Request $request )
    {

        $validator = Validator::make($request->all(), [
            'layout' => 'required',
        ],[
            'layout.required' => 'Debe seleccionar una plantilla',
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();

            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];

            return response($rsp, 403);

        }

        $item = Folder::find($id);
        $item->layout_id = $request->get('layout');

        $item->save();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

    }






    public function profileSave($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            // 'slug' => 'required|unique:folder,slug,' . $id,
            'profiles' => 'required',
            // 'password' => 'nullable|string|min:6|confirmed',
            // 'layout' => 'required',
        ],[
            // 'slug.required' => 'El :attribute es necesario.',
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();
            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];
            return response($rsp, 403);
        }



        $item = Folder::find($id);

        $item->profiles()->sync(explode(',',$request->get('profiles')));

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }


    // hace una copia de la pagina, con sus contenidos y permisos y copia a todos sus hijos
    private function cloneFolder($item, $parentId){

        $copySuffix = ' copia ' . str_random();

        $user = Auth::user();

        $new = $item->replicate();
        $new->name = $item->name . $copySuffix;
        $new->slug = str_slug($new->name,'-');
        $new->user_id = $user->id; // asigno usuario que esta haciendo la copia al nuevo folder
        $new->parent_id = $parentId; // coloco el clon debajo del padre que me indica el usuario y si fuera recursivo, del elemento que llamo el subclon
        $new->published = 0;
        $new->save();

        $new->consolidate();

        $cover = $item->cover->replicate();
        $cover->folder_id = $new->id;
        $cover->save();

        foreach ($item->contents as $content) {
            $newcontent = $content->replicate();
            $newcontent->folder_id = $new->id;
            $newcontent->save();
        }

        foreach($item->profiles as $p){
            $new->profiles()->attach($p->id);
        }

        foreach ($item->children as $child) {
            $this->cloneFolder($child, $new->id);
        }

        return $new;

    }


}
