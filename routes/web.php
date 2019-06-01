<?php
use App\Http\Controllers\Admin\CalendarController;

use Illuminate\Routing\Router;


// HOME
Route::get('/', 'HomeController@index')->name('home');

// AUTH
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



// CALENDARIOS
Route::view('/calendar', 'calendar');
Route::get('/calendar_vencimientos', function(){
    $types = CalendarController::$b_types;
    return view('calendar_vencimientos', compact('types'));
});

// BUSQUEDA
Route::get('/resultados', 'SearchController@index')->name('search_results');







////////////////////
// ADMIN
////////////////////

Route::group([
        'namespace' => 'Admin',
        'prefix'    => 'admin',
        'middleware' => 'auth'
        ], function () {


    Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@index']);


    // USER CONFIG
    Route::post('user/config', ['as' => 'admin.user.config', 'uses' => 'UserController@saveConfig']);


    // USER 
    Route::get('user/list', ['as' => 'admin.user.list', 'uses' => 'UserController@list']);
    Route::get('user/{id?}/edit', ['as' => 'admin.user.edit', 'uses' => 'UserController@editProfile']);
    Route::patch('user/patch', ['as' => 'admin.user.patch', 'uses' => 'UserController@patchProfile']);
    Route::get('user/password/{id?}', ['as' => 'admin.user.password', 'uses' => 'UserController@editPassword']);
    Route::patch('user/password/{id?}', ['as' => 'admin.user.password', 'uses' => 'UserController@patchPassword']);
    Route::get('user/add', ['as' => 'admin.user.add', 'uses' => 'UserController@addUser']);
    Route::post('user/{id}/delete', ['as' => 'admin.user.delete', 'uses' => 'UserController@deleteUser']);
    Route::any('user/search', ['as' => 'admin.user.search', 'uses' => 'UserController@search']); // lo usan los select2 de los componentes    
    Route::any('user/getby/id', ['as' => 'admin.user.getby.id', 'uses' => 'UserController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado

    // BUSINESS
    Route::get('business/list', ['as' => 'admin.business.list', 'uses' => 'BusinessController@list']);
    Route::get('business/{id?}/edit', ['as' => 'admin.business.edit', 'uses' => 'BusinessController@edit']);
    Route::patch('business/patch', ['as' => 'admin.business.patch', 'uses' => 'BusinessController@patch']);
    Route::get('business/add', ['as' => 'admin.business.add', 'uses' => 'BusinessController@add']);
    Route::post('business/{id}/delete', ['as' => 'admin.business.delete', 'uses' => 'BusinessController@delete']);
    Route::any('business/search', ['as' => 'admin.business.search', 'uses' => 'BusinessController@search']); // lo usan los select2 de los componentes    
    Route::any('business/getby/id', ['as' => 'admin.business.getby.id', 'uses' => 'BusinessController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado

    // PRODUCT FAMILY
    Route::get('family/list', ['as' => 'admin.family.list', 'uses' => 'FamilyController@list']);
    Route::get('family/{id?}/edit', ['as' => 'admin.family.edit', 'uses' => 'FamilyController@edit']);
    Route::patch('family/patch', ['as' => 'admin.family.patch', 'uses' => 'FamilyController@patch']);
    Route::get('family/add', ['as' => 'admin.family.add', 'uses' => 'FamilyController@add']);
    Route::post('family/{id}/delete', ['as' => 'admin.family.delete', 'uses' => 'FamilyController@delete']);
    Route::any('family/search', ['as' => 'admin.family.search', 'uses' => 'FamilyController@search']); // lo usan los select2 de los componentes    
    Route::any('family/getby/id', ['as' => 'admin.family.getby.id', 'uses' => 'FamilyController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado

    // COMPANY SIZE
    Route::get('company_size/list', ['as' => 'admin.company_size.list', 'uses' => 'CompanySizeController@list']);
    Route::get('company_size/{id?}/edit', ['as' => 'admin.company_size.edit', 'uses' => 'CompanySizeController@edit']);
    Route::patch('company_size/patch', ['as' => 'admin.company_size.patch', 'uses' => 'CompanySizeController@patch']);
    Route::get('company_size/add', ['as' => 'admin.company_size.add', 'uses' => 'CompanySizeController@add']);
    Route::post('company_size/{id}/delete', ['as' => 'admin.company_size.delete', 'uses' => 'CompanySizeController@delete']);
    Route::any('company_size/search', ['as' => 'admin.company_size.search', 'uses' => 'CompanySizeController@search']); // lo usan los select2 de los componentes    
    Route::any('company_size/getby/id', ['as' => 'admin.company_size.getby.id', 'uses' => 'CompanySizeController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado

    // SIMULATION
    Route::get('simulation/list', ['as' => 'admin.simulation.list', 'uses' => 'SimulationController@list']);
    Route::get('simulation/{id?}/edit', ['as' => 'admin.simulation.edit', 'uses' => 'SimulationController@edit']);
    Route::patch('simulation/patch', ['as' => 'admin.simulation.patch', 'uses' => 'SimulationController@patch']);
    Route::get('simulation/add', ['as' => 'admin.simulation.add', 'uses' => 'SimulationController@add']);
    Route::post('simulation/{id}/delete', ['as' => 'admin.simulation.delete', 'uses' => 'SimulationController@delete']);
    Route::any('simulation/search', ['as' => 'admin.simulation.search', 'uses' => 'SimulationController@search']); // lo usan los select2 de los componentes    
    Route::any('simulation/getby/id', ['as' => 'admin.simulation.getby.id', 'uses' => 'SimulationController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado
    
    Route::get('simulation/{id}/play', ['as' => 'admin.simulation.play', 'uses' => 'SimulationController@play']);
    Route::patch('simulation/{id}/play', ['as' => 'admin.simulation.play', 'uses' => 'SimulationController@playSave']);
    Route::get('simulation/{id}/clon', ['as' => 'admin.simulation.clon', 'uses' => 'SimulationController@clon']);
    
    Route::post('simulation/{id}/play/set', ['as' => 'admin.simulation.play.set', 'uses' => 'SimulationController@playSet']);
    Route::post('simulation/{id}/play/properties', ['as' => 'admin.simulation.play.properties', 'uses' => 'SimulationController@playProperties']);


    // BASE
    Route::get('base/list', ['as' => 'admin.base.list', 'uses' => 'BaseController@list']);
    Route::get('base/{id?}/edit', ['as' => 'admin.base.edit', 'uses' => 'BaseController@edit']);
    Route::patch('base/patch', ['as' => 'admin.base.patch', 'uses' => 'BaseController@patch']);
    Route::get('base/add', ['as' => 'admin.base.add', 'uses' => 'BaseController@add']);
    Route::post('base/{id}/delete', ['as' => 'admin.base.delete', 'uses' => 'BaseController@delete']);
    Route::any('base/search', ['as' => 'admin.base.search', 'uses' => 'BaseController@search']); // lo usan los select2 de los componentes    
    Route::any('base/getby/id', ['as' => 'admin.base.getby.id', 'uses' => 'BaseController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado
    
    Route::get('base/{id}/data', ['as' => 'admin.base.data', 'uses' => 'BaseController@data']);
    Route::post('base/{id}/data', ['as' => 'admin.base.data', 'uses' => 'BaseController@data']); // usar para filtros
    Route::put('base/{id}/data/universo', ['as' => 'admin.base.data.universo', 'uses' => 'BaseController@importExcelUniverso']); // procesar upload
    Route::put('base/{id}/data/mad', ['as' => 'admin.base.data.mad', 'uses' => 'BaseController@importExcelMad']); // procesar upload MAD
    Route::put('base/{id}/data/mediana', ['as' => 'admin.base.data.mediana', 'uses' => 'BaseController@importExcelMediana']); // procesar upload Mediana
    
    Route::get('base/{id}/table/{tableId}', ['as' => 'admin.base.table', 'uses' => 'BaseController@table']);
    Route::patch('base/{id}/table/{tableId}', ['as' => 'admin.base.table', 'uses' => 'BaseController@tablePatch']);


    // ZONE
    Route::get('zone/list', ['as' => 'admin.zone.list', 'uses' => 'ZoneController@list']);
    Route::get('zone/{id?}/edit', ['as' => 'admin.zone.edit', 'uses' => 'ZoneController@edit']);
    Route::patch('zone/patch', ['as' => 'admin.zone.patch', 'uses' => 'ZoneController@patch']);
    Route::get('zone/add', ['as' => 'admin.zone.add', 'uses' => 'ZoneController@add']);
    Route::post('zone/{id}/delete', ['as' => 'admin.zone.delete', 'uses' => 'ZoneController@delete']);
    Route::any('zone/search', ['as' => 'admin.zone.search', 'uses' => 'ZoneController@search']); // lo usan los select2 de los componentes    
    Route::any('zone/getby/id', ['as' => 'admin.zone.getby.id', 'uses' => 'ZoneController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado

    // AREA
    Route::get('area/list', ['as' => 'admin.area.list', 'uses' => 'AreaController@list']);
    Route::get('area/{id?}/edit', ['as' => 'admin.area.edit', 'uses' => 'AreaController@edit']);
    Route::patch('area/patch', ['as' => 'admin.area.patch', 'uses' => 'AreaController@patch']);
    Route::get('area/add', ['as' => 'admin.area.add', 'uses' => 'AreaController@add']);
    Route::post('area/{id}/delete', ['as' => 'admin.area.delete', 'uses' => 'AreaController@delete']);
    Route::any('area/search', ['as' => 'admin.area.search', 'uses' => 'AreaController@search']); // lo usan los select2 de los componentes    
    Route::any('area/getby/id', ['as' => 'admin.area.getby.id', 'uses' => 'AreaController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado

    // SCENARIO
    Route::get('scenario/list', ['as' => 'admin.scenario.list', 'uses' => 'ScenarioController@list']);
    Route::get('scenario/{id?}/edit', ['as' => 'admin.scenario.edit', 'uses' => 'ScenarioController@edit']);
    Route::patch('scenario/patch', ['as' => 'admin.scenario.patch', 'uses' => 'ScenarioController@patch']);
    Route::get('scenario/add', ['as' => 'admin.scenario.add', 'uses' => 'ScenarioController@add']);
    Route::post('scenario/{id}/delete', ['as' => 'admin.scenario.delete', 'uses' => 'ScenarioController@delete']);
    Route::any('scenario/search', ['as' => 'admin.scenario.search', 'uses' => 'ScenarioController@search']); // lo usan los select2 de los componentes    
    Route::any('scenario/getby/id', ['as' => 'admin.scenario.getby.id', 'uses' => 'ScenarioController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado

    // SEGMENT
    Route::get('segment/list', ['as' => 'admin.segment.list', 'uses' => 'SegmentController@list']);
    Route::get('segment/{id?}/edit', ['as' => 'admin.segment.edit', 'uses' => 'SegmentController@edit']);
    Route::patch('segment/patch', ['as' => 'admin.segment.patch', 'uses' => 'SegmentController@patch']);
    Route::get('segment/add', ['as' => 'admin.segment.add', 'uses' => 'SegmentController@add']);
    Route::post('segment/{id}/delete', ['as' => 'admin.segment.delete', 'uses' => 'SegmentController@delete']);
    Route::any('segment/search', ['as' => 'admin.segment.search', 'uses' => 'SegmentController@search']); // lo usan los select2 de los componentes    
    Route::any('segment/getby/id', ['as' => 'admin.segment.getby.id', 'uses' => 'SegmentController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado

    // SOURCE
    Route::get('source/list', ['as' => 'admin.source.list', 'uses' => 'SourceController@list']);
    Route::get('source/{id?}/edit', ['as' => 'admin.source.edit', 'uses' => 'SourceController@edit']);
    Route::patch('source/patch', ['as' => 'admin.source.patch', 'uses' => 'SourceController@patch']);
    Route::get('source/add', ['as' => 'admin.source.add', 'uses' => 'SourceController@add']);
    Route::post('source/{id}/delete', ['as' => 'admin.source.delete', 'uses' => 'SourceController@delete']);
    Route::any('source/search', ['as' => 'admin.source.search', 'uses' => 'SourceController@search']); // lo usan los select2 de los componentes    
    Route::any('source/getby/id', ['as' => 'admin.source.getby.id', 'uses' => 'SourceController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado
   
    



    // ALTER
    Route::get('alerts', ['as' => 'admin.alert.list', 'uses' => 'AlertController@list']);
    Route::get('alert/edit/{id?}', ['as' => 'admin.alert.edit', 'uses' => 'AlertController@edit']);
    Route::patch('alert/patch', ['as' => 'admin.alert.patch', 'uses' => 'AlertController@patch']);
    Route::get('alert/add', ['as' => 'admin.alert.add', 'uses' => 'AlertController@add']);
    Route::post('alert/delete/{id}', ['as' => 'admin.alert.delete', 'uses' => 'AlertController@delete']);


    // FOLDER

    Route::post('folder/tree', ['as' => 'admin.folder.tree', 'uses' => 'FolderController@tree']); // todas las acciones que vienen del tree. no lleva ID porque es transversal

    Route::get('folder/search', ['as' => 'admin.folder.search', 'uses' => 'FolderController@search']); // lo usan los select2 de los componentes    
    Route::post('folder/getby/id', ['as' => 'admin.folder.getby.id', 'uses' => 'FolderController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado

    Route::get('folder/panel/{id?}', ['as' => 'admin.folder.panel', 'uses' => 'FolderController@panel']);
    Route::post('folder/panel/sort', ['as' => 'admin.folder.panel.sort', 'uses' => 'FolderController@panelSaveSort']);


    Route::post('folder/add', ['as' => 'admin.folder.add', 'uses' => 'FolderController@addFolder']);
    
    Route::get('folder/{id}/compose', ['as' => 'admin.folder.compose', 'uses' => 'FolderController@composeEdit']);
    Route::post('folder/{id}/compose', ['as' => 'admin.folder.compose', 'uses' => 'FolderController@composeSave']);
    Route::post('folder/{id}/screenshot', ['as' => 'admin.folder.screenshot', 'uses' => 'FolderController@screenshotSave']);
    Route::post('folder/{id}/edit', ['as' => 'admin.folder.edit', 'uses' => 'FolderController@propertiesSave']);
    Route::post('folder/{id}/cover', ['as' => 'admin.folder.cover', 'uses' => 'FolderController@coverSave']);
    Route::post('folder/{id}/profile', ['as' => 'admin.folder.profile', 'uses' => 'FolderController@profileSave']);
    Route::get('folder/{id?}/delete', ['as' => 'admin.folder.delete', 'uses' => 'FolderController@deleteFolder']);

    Route::get('folder/{id}/duplicate', ['as' => 'admin.folder.duplicate', 'uses' => 'FolderController@duplicateFolder']);
    Route::post('folder/cut', ['as' => 'admin.folder.cut', 'uses' => 'FolderController@cutFolder']);
    Route::get('folder/{id}/cut/paste', ['as' => 'admin.folder.cut.paste', 'uses' => 'FolderController@cutPasteFolder']);
    // Route::post('folder/copy', ['as' => 'admin.folder.copy', 'uses' => 'FolderController@copyFolder']);    
    // Route::get('folder/{id}/copy/paste', ['as' => 'admin.folder.copy.paste', 'uses' => 'FolderController@copyPasteFolder']);


    Route::post('folder/{id}/set/layout', ['as' => 'admin.folder.set.layout', 'uses' => 'FolderController@setLayout']); // todas las acciones que vienen del tree

    Route::post('folder/{id}/content/add', ['as' => 'admin.folder.content.add', 'uses' => 'FolderController@addContent']);
    Route::post('folder/{id}/content/remove', ['as' => 'admin.folder.content.remove', 'uses' => 'FolderController@removeContent']);
    Route::post('folder/{id}/content/clon', ['as' => 'admin.folder.content.clon', 'uses' => 'FolderController@clonContent']);
    

    Route::get('content/{id}/edit', ['as' => 'admin.content.edit', 'uses' => 'FolderController@editContent']);
    Route::post('content/{id}/save', ['as' => 'admin.content.save', 'uses' => 'FolderController@saveContent']);
    Route::post('content/screenshot', ['as' => 'admin.content.screenshot', 'uses' => 'FolderController@screenshotContent']);


    // CALENDARIO
    Route::get('calendar', ['as' => 'admin.calendar.index', 'uses' => 'CalendarController@index']);
    Route::get('calendar/new', ['as' => 'admin.calendar.add', 'uses' => 'CalendarController@add']);
    Route::get('calendar/{id}/edit', ['as' => 'admin.calendar.edit', 'uses' => 'CalendarController@edit']);
    Route::post('calendar', ['as' => 'admin.calendar.post', 'uses' => 'CalendarController@post']);
    Route::post('calendar/{id}/edit', ['as' => 'admin.calendar.put', 'uses' => 'CalendarController@put']);
    Route::post('calendar/{id}/delte', ['as' => 'admin.calendar.delete', 'uses' => 'CalendarController@delete']);

    // CALENDARIO VENCIMIENTOS
    Route::get('calendar_vencimientos', ['as' => 'admin.calendar_vencimientos.index', 'uses' => 'CalendarController@index']);
    Route::get('calendar_vencimientos/new', ['as' => 'admin.calendar_vencimientos.add', 'uses' => 'CalendarController@add']);
    Route::get('calendar_vencimientos/{id}/edit', ['as' => 'admin.calendar_vencimientos.edit', 'uses' => 'CalendarController@edit']);
    Route::post('calendar_vencimientos', ['as' => 'admin.calendar_vencimientos.post', 'uses' => 'CalendarController@post']);
    Route::post('calendar_vencimientos/{id}/edit', ['as' => 'admin.calendar_vencimientos.put', 'uses' => 'CalendarController@put']);
    Route::post('calendar_vencimientos/{id}/delte', ['as' => 'admin.calendar_vencimientos.delete', 'uses' => 'CalendarController@delete']);

    // CAMPAÑAS
    Route::get('campanias', ['as' => 'admin.campanias.index', 'uses' => 'CampaignController@index']);

    Route::get('campanias/new', ['as' => 'admin.campanias.add', 'uses' => 'CampaignController@add']);
    Route::post('campanias', ['as' => 'admin.campanias.post', 'uses' => 'CampaignController@post']);

    Route::get('campanias/{id}/edit', ['as' => 'admin.campanias.edit', 'uses' => 'CampaignController@edit']);
    Route::post('campanias/{id}/edit', ['as' => 'admin.campanias.put', 'uses' => 'CampaignController@put']);

    Route::post('campanias/{id}/delte', ['as' => 'admin.campanias.delete', 'uses' => 'CampaignController@delete']);

    Route::get('/campanias/{campaign_id}/slot/{slot_uuid}/edit', ['as' => 'admin.campanias.slot.edit', 'uses' => 'CampaignController@slotEdit']);
    Route::post('/campanias/{campaign_id}/slot/{slot_uuid}/save', ['as' => 'admin.campanias.slot.save', 'uses' => 'CampaignController@slotSave']);
    Route::post('/campanias/{campaign_id}/slot/{slot_uuid}/delete', ['as' => 'admin.campanias.slot.delete', 'uses' => 'CampaignController@slotDelete']);

    // PARAMETROS CONFIGURABLES
    Route::get('campos', ['as' => 'admin.fields.index', 'uses' => 'FieldsController@index']);
    Route::post('campos', ['as' => 'admin.fields.save', 'uses' => 'FieldsController@save']);







    // SERVICE (POSIBLE API LUEGO)

    //FILE UPLOAD
    Route::post('service/upload/file', ['as' => 'service.uploader.file.upload', 'uses' => 'ServiceController@uploadFile']);
    Route::get('service/upload/image', ['as' => 'service.uploader.image.display', 'uses' => 'ServiceController@displayImage']);
    Route::post('service/upload/image', ['as' => 'service.uploader.image.upload', 'uses' => 'ServiceController@uploadImage']);


});





Route::get('/print/{url?}', ['as' => 'folder.print', 'uses' => 'FolderController@printFolder'])->where('url', '(.*)'); // solo imprime los contenidos (layout y contenidos), sin el marco del sitio

Route::get('content/{id}/print', ['as' => 'admin.content.print', 'uses' => 'FolderController@printContent']); // devuelve el html del contenido pedido por ID (responde al componente + sus datos)

Route::get('/{url?}', ['as' => 'folder.view', 'uses' => 'FolderController@viewFolder'])->where('url', '(.*)'); // imprime el folder con layout y marco del sitio