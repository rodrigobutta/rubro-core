@extends('admin.master.app')

@section('bodyclass', 'simulation-play-page')

@section('content')

    <div class="container">

        <h2 class="content-heading js-appear-enabled animated fadeIn" data-toggle="appear">                                    
            <a href="{{route('admin.simulation.list')}}" class="btn btn-sm btn-rounded btn-secondary float-right d-print-none">X</a>
            <div id="name">{{$item->name}}</div>
        </h2>

        <div class="block d-print-block d-none">            
            <div class="block-content">
                <h4 class="font-w300"><small>TIPO DE NEGOCIO</small> {{$item->business->name}}</h4>
                <h4 class="font-w300"><small>ZONA</small> {{$item->zone->name}}</h4>
                <h4 class="font-w300"><small>FAMILIA</small> {{$item->family->name}}</h4>
                <h4 class="font-w300"><small>SEGMENTO</small> {{$item->segment->name}}</h4>
            </div>
        </div>
        
        <div class="row d-print-none">
            <div class="col-4 col-md-4 col-xl-4">
                <div class="block block-link-pop22 text-center">
                    <div class="block-content">
                        
                        <div class="dropdown">
                            <button type="button" class="btn-block-option " data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding: 0px">
                                <p class="font-size-h4">
                                    <strong>{{$item->business->name}}</strong> 
                                    @if($item->canEdit() && count($business)>1)
                                        &nbsp;<i class="fa fa-chevron-down fa-sm d-print-none text-success" style="font-size:16px"></i>
                                    @endif
                                </p>
                            </button>

                            @if($item->canEdit() && count($business)>1)
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                    
                                    @foreach($business as $s)
                                        <a class="dropdown-item sel-business" data-id="{{$s->id}}" data-name="{{$s->name}}" href="#">
                                            <i class="fa fa-fw {!! $s->id==$item->business_id?'fa-circle':'fa-circle-o' !!}  mr-5"></i>{{$s->name}}
                                        </a>
                                    @endforeach
                                                                                                                              
                                </div>
                            @endif

                        </div>

                        <p class="font-w600 text-primary">TIPO DE NEGOCIO</p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-4 col-xl-4">
                <div class="block block-link-pop22 text-center">
                    <div class="block-content">
                      
                        <div class="dropdown">
                            <button type="button" class="btn-block-option " data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding: 0px">
                                <p class="font-size-h4">
                                    <strong>{{$item->zone->name}}</strong> 
                                    @if($item->canEdit() && count($zones)>1)
                                        &nbsp;<i class="fa fa-chevron-down fa-sm d-print-none text-success" style="font-size:16px"></i>
                                    @endif
                                </p>
                            </button>

                            @if($item->canEdit() && count($zones)>1)
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                    
                                    @foreach($zones as $s)
                                        <a class="dropdown-item sel-zone" data-id="{{$s->id}}" data-name="{{$s->name}}" href="#">
                                            <i class="fa fa-fw {!! $s->id==$item->zone_id?'fa-circle':'fa-circle-o' !!}  mr-5"></i>{{$s->name}}
                                        </a>
                                    @endforeach
                                                                                                                              
                                </div>
                            @endif

                        </div>

                        <p class="font-w600 text-primary">ZONA</p>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-4 col-xl-4">
                <div class="block block-link-pop22 text-center">
                    <div class="block-content">
                        

                        <div class="dropdown">
                            <button type="button" class="btn-block-option " data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding: 0px">
                                <p class="font-size-h4">
                                    <strong>{{$item->family->name}}</strong> 
                                    @if($item->canEdit() && count($families)>1)
                                        &nbsp;<i class="fa fa-chevron-down fa-sm d-print-none text-success" style="font-size:16px"></i>
                                    @endif
                                </p>
                            </button>

                            @if($item->canEdit() && count($families)>1)
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                    
                                    @foreach($families as $s)
                                        <a class="dropdown-item sel-family" data-id="{{$s->id}}" data-name="{{$s->name}}" href="#">
                                            <i class="fa fa-fw {!! $s->id==$item->family_id?'fa-circle':'fa-circle-o' !!}  mr-5"></i>{{$s->name}}
                                        </a>
                                    @endforeach
                                                                                                                              
                                </div>
                            @endif

                        </div>
                        
                        <p class="font-w600 text-primary">FAMILIA</p>
                    </div>
                </div>
            </div>               
        
        </div>

        <div class="row">

            <div class="col-12 col-md-12 col-xl-12">

                <div class="block">
                    <div class="block-content">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Totales de la Simulación</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            
                                <table class="table table-bordered2 table-vcenter">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>Segmento</th>
                                            <th class="text-center">Universo</th>
                                            <th class="text-center">Δ Cantidad Clientes</th>
                                            <th class="text-center">Δ Facturación Estimada Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($totalArray as $t)
                                            <tr>
                                                <td><strong>{{ $t['name'] }}<strong></td>
                                                <td class="text-center">{{ printNumber($t['SumCantActual'])  }}</td>
                                                <td class="text-center"  style="background-color:#fffcef">{{ printNumber($t['SumCantResult']) }}</td>
                                                <td class="text-center"  style="background-color:#fffcef">${{ printNumber($t['SumBillingResult']) }}</td>                                              
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>

                            
                            </div>
                        </div>

                    </div>

                </div>


            </div>

        </div>


        <div class="row d-print-none">
        
            <div class="col-12 col-md-12 col-xl-12">
                <div class="block block-link-pop22 text-center">
                    <div class="block-content">
                        
                        <div class="dropdown">
                            <button type="button" class="btn-block-option " data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding: 0px">
                                <p class="font-size-h4">
                                    <strong>{{$item->segment->name}}</strong> 
                                    @if($item->canEdit())
                                        &nbsp;<i class="fa fa-chevron-down fa-sm d-print-none text-success" style="font-size:16px"></i>
                                    @endif
                                </p>
                            </button>

                            @if($item->canEdit())
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                    
                                    @foreach($segments as $s)
                                        <a class="dropdown-item sel-segment" data-id="{{$s->id}}" data-name="{{$s->name}}" href="#">
                                            <i class="fa fa-fw {!! $s->id==$item->segment_id?'fa-circle':'fa-circle-o' !!}  mr-5"></i>{{$s->name}}
                                        </a>
                                    @endforeach
                                                                                    
                                </div>
                            @endif

                        </div>
                        <p class="font-w600 text-primary">SEGMENTO</p>
                    </div>
                </div>

            </div>    
        </div>


        <div class="row">        
            <div class="col-12 col-md-12 col-xl-12">

                <div class="block">
                    <div class="block-content">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h5><strong>UNIVERSO</strong> {{getUniversoTable($item->segment_id)->name}}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            
                                <table class="table table-bordered2 table-vcenter table-striped fixed-columns 2 table-sm">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th style="width:200px">Rubro</th>

                                            @foreach ($item->companysizes as $cs)
                                                <th class="text-center">{{$cs->name}}</th>
                                            @endforeach

                                            <th class="text-center">Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php($universo_table_id =  $item->getTableId(getUniversoTable($item->segment_id)->code))
                                        @foreach ($itemAreas as $area)
                                            <tr>
                                                <td style="width:200px">{{$area->name}}</td>
                                                
                                                @foreach ($item->companysizes as $cs)
                                                    <td class="text-center row-value">
                                                        {!! printNumber($item->base->getValue($area->id, $cs->id, $universo_table_id ))  !!}
                                                    </td>
                                                @endforeach

                                                <td class="text-center">{!! printNumber($item->base->getSum($area->id, '*', $universo_table_id ))  !!}</td>
                                                
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td style="width:200px">Total</td>
                                            
                                            @foreach ($item->companysizes as $cs)
                                                <td class="text-center">{!! printNumber($item->base->getSum('*', $cs->id, $universo_table_id ))  !!}</td>
                                            @endforeach

                                            <td class="text-center">{!! printNumber($item->base->getSum('*', '*', $universo_table_id ))  !!}</td>

                                        </tr>
    
                                    </tbody>
                                </table>
                            
                            </div>
                        </div>

                        <br>


                        @if(1==1)


                        <div class="row">
                            <div class="col-md-12">
                                <h5><strong>MEDIANA</strong> {{getMedianaTable($item->segment_id)->name}}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            
                                <table class="table table-bordered2 table-vcenter table-striped fixed-columns 2 table-sm">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th style="width:200px">Rubro</th>

                                            @foreach ($item->companysizes as $cs)
                                                <th class="text-center">{{$cs->name}}</th>
                                            @endforeach

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php($mediana_table_id =  $item->getTableId(getMedianaTable($item->segment_id)->code))
                                        @foreach ($itemAreas as $area)
                                            <tr>
                                                <td style="width:200px">{{$area->name}}</td>
                                                
                                                @foreach ($item->companysizes as $cs)
                                                    <td class="text-center row-value">
                                                        ${!! printNumber($item->base->getValue($area->id, $cs->id, $mediana_table_id ))  !!}
                                                    </td>
                                                @endforeach
                                                
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td style="width:200px">Total</td>
                                            
                                            @foreach ($item->companysizes as $cs)
                                                <td class="text-center">${!! printNumber($item->base->getSum('*', $cs->id, $mediana_table_id ))  !!}</td>
                                            @endforeach

                                        </tr>
    
                                    </tbody>
                                </table>
                            
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <h5><strong>MAD</strong> {{getMadTable($item->segment_id)->name}}</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            
                                <table class="table table-bordered2 table-vcenter table-striped fixed-columns 2 table-sm">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th style="width:200px">Rubro</th>

                                            @foreach ($item->companysizes as $cs)
                                                <th class="text-center">{{$cs->name}}</th>
                                            @endforeach

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php($mad_table_id =  $item->getTableId(getMadTable($item->segment_id)->code))
                                        @foreach ($itemAreas as $area)
                                            <tr>
                                                <td style="width:200px">{{$area->name}}</td>
                                                
                                                @foreach ($item->companysizes as $cs)
                                                    <td class="text-center row-value">
                                                        ${!! printNumber($item->base->getValue($area->id, $cs->id, $mad_table_id ))  !!}
                                                    </td>
                                                @endforeach
                                                
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td style="width:200px">Total</td>
                                            
                                            @foreach ($item->companysizes as $cs)
                                                <td class="text-center">${!! printNumber($item->base->getSum('*', $cs->id, $mad_table_id ))  !!}</td>
                                            @endforeach

                                        </tr>
    
                                    </tbody>
                                </table>
                            
                            </div>
                        </div>

                        @endif



                                            
                    </div>
                </div>
                
                <div class="row" id="output">
                    <div class="col-12 col-md-12 col-xl-12">

                        <div class="block" >
                            <div class="block-content">



                        <form name="formSimulationPlay" method="POST" action="" aria-label="">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id or '0' }}" />
                            <input type="hidden" name="_method" value="PATCH" />

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Simulator:  Δ%</h5>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                
                                    <table class="table table-bordered2 table-vcenter table-striped fixed-columns table-sm">
                                        <thead class="thead-primary">
                                            <tr>
                                                <th style="width:200px">Rubro</th>
                                                
                                                @foreach ($item->companysizes as $cs)
                                                    <th class="text-center">{{$cs->name}}</th>
                                                @endforeach

                                                <th style="width:150px" class="text-center">Escenario</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($itemAreas as $area)
                                                <tr>
                                                    <td>{{$area->name}}</td>
                                                    
                                                    @if($item->canEdit())

                                                        @foreach ($item->companysizes as $cs)
                                                            <td class="text-center">
                                                                <div class="percent">
                                                                    <input type="number" max="100" pattern="^\d*(\.\d{0,2})?$" class="form-control text-center input-value input-success"  name="value[{{$area->id}}][{{$cs->id}}]" value="{!! $item->getValue($area->id,$cs->id) !!}"  />
                                                                </div>
                                                            </td>
                                                        @endforeach

                                                    @else

                                                        @foreach ($item->companysizes as $cs)
                                                            <td class="text-center">
                                                                <span>{!! printNumber($item->getValue($area->id,$cs->id)) !!}</span>
                                                            </td>
                                                        @endforeach
                                                        
                                                    @endif 

                                                    <td>

                                                        @if($item->canEdit())

                                                            <select class="form-control input-success" name="scenarios[{{$area->id}}]">                                                    
                                                                @foreach($scenarios as $s)
                                                                    <option value="{{$s->id}}" {!! $s->id==$area->pivot->scenario_id?'selected="selected"':'' !!}>{{$s->name}}</option>
                                                                @endforeach
                                                            </select>      

                                                        @else
                                                        
                                                            {{$area->scenario->name}}
                        
                                                        @endif
                                                        
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                
                                </div>
                            </div>

                            @if($item->canEdit())
                                <div class="form-group text-md-right d-print-none" style="clear:both">                                
                                    <button id="btn-save" type="submit" class="btn btn-alt-success action-button" on="rest" disabled22><i class="fa fa-spin fa-asterisk on-working"></i><span class="on-rest">Guardar y recalcular Δs</span></button>
                                </div>
                            @endif
            
                        </div>
                    </div>

                </form>

            
            </div>
        </div>
        
        <div class="row" id="output">
            <div class="col-12 col-md-12 col-xl-12">

                <div class="block" style="background-color:#fffcef">
                    <div class="block-content">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Δ Cantidad Clientes</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            
                                <table class="table table-bordered2 table-vcenter table-striped fixed-columns table-sm">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th style="width:350px">Rubro</th>


                                            @foreach ($item->companysizes as $cs)
                                                <th class="text-center">{{$cs->name}}</th>
                                            @endforeach

                                            <th class="text-center">Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($itemAreas as $area)
                                            <tr>
                                                <td>{{$area->name}}</td>
                                                
                                                @foreach ($item->companysizes as $cs)
                                                    <td class="text-center row-value">
                                                        @php($val=round($item->getResultClientCount($area->id,$cs->id)))
                                                        @php($cota=$item->base->getValue($area->id, $cs->id, $cotaTableId))
                                                        {!! printNumber($val) !!}
                                                        {!! ($val > $cota)?'<i style="font-size: 0.7rem; position: absolute; margin-left: 4px; margin-top: 6px;" class="fa fa-circle text-warning" data-toggle="tooltip" title="" data-original-title="El valor ' . $val . ' supera a la cota de ' . $cota . '"></i>':''   !!}                                                        
                                                    </td>
                                                @endforeach

                                                <td class="text-center">{{ printNumber($item->getResultClientCountTotalBySegment($area->id,'*')) }}</td>

                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td>Total</td>
                                            
                                            @foreach ($item->companysizes as $cs)
                                                <td class="text-center">{{ printNumber($item->getResultClientCountTotalBySegment('*',$cs->id)) }}</td>
                                            @endforeach

                                            <td class="text-center">{{ printNumber($item->getResultClientCountTotalBySegment('*','*')) }}</td>

                                        </tr>

                                    </tbody>
                                </table>
                            
                            </div>
                        </div>
                    
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Δ Facturación Estimada Total</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            
                                <table class="table table-bordered2 table-vcenter table-striped fixed-columns table-sm">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th style="width:200px">Rubro</th>
                                            <th style="width:150px">Escenario</th>

                                            @foreach ($item->companysizes as $cs)
                                                <th class="text-center">{{$cs->name}}</th>
                                            @endforeach

                                            <th class="text-center">Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($itemAreas as $area)
                                            <tr>
                                                <td style="width:200px">{{$area->name}}</td>
                                                <td>{{$area->scenario->name}}</td>
                                                
                                                @foreach ($item->companysizes as $cs)
                                                    <td class="text-center row-value">
                                                        ${!! printNumber($item->getResultBilling($area->id,$cs->id)) !!}
                                                    </td>
                                                @endforeach

                                                <td class="text-center">${{ printNumber($item->getResultBillingTotalBySegment($area->id,'*')) }}</td>

                                            </tr>
                                        @endforeach
                                        
                                        <tr>
                                            <td style="width:200px">Total</td>
                                            <td></td>
                                            
                                            @foreach ($item->companysizes as $cs)
                                                <td class="text-center">${{ printNumber($item->getResultBillingTotalBySegment('*',$cs->id)) }}</td>
                                            @endforeach

                                            <td class="text-center">${{ printNumber($item->getResultBillingTotalBySegment('*','*')) }}</td>

                                        </tr>
                
                                    </tbody>
                                </table>

                                <br>
                            
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        
        <div class="row">
            <div class="col-12 col-md-12 col-xl-12">
    
                <div class="block">
                    <div class="block-content">
    
                        <div class="form-group text-md-right d-print-none" style="clear:both">                                
                            <button id="btn_print" type="button" class="btn btn-alt-primary " onclick="window.print();"><i class="fa fa-print"></i>&nbsp;Imprimir</button>
                        </div>
                    
                    </div>
                </div>
    
            </div>
        </div>

        

    </div>




    <!-- Set Modal -->
    <div class="modal fade" id="modal_set" tabindex="-1" role="dialog" aria-labelledby="modal_set" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header">
                        <h3 class="block-title">Cambiar....</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Todos los cambios que se hayan hecho en esta pantalla y no hayan sido parte del último calculo, se van a perder.</p>
                        <p>Tener en cuenta que cambiar el segmento de calculo de la simulación, implica que algunas tablas de la base que se utilizan para el calculo, van a cambiar.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-alt-success action-button" on="rest"><i class="fa fa-spin fa-asterisk on-working"></i><span class="on-rest">Aceptar</span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Set Modal -->



    

    <!-- Name Modal -->
    <div class="modal fade" id="modal_properties" tabindex="-1" role="dialog" aria-labelledby="modal_properties" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header">
                        <h3 class="block-title">Propiedades</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        
                        <div class="form-group">                                
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" placeholder="" value="{{ $item->name }}">                                
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-12" for="sidenotes">Notas</label>
                            <div class="col-12">
                                <textarea class="form-control" name="sidenotes" rows="6" placeholder="">{{ $item->sidenotes }}</textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-alt-success action-button" on="rest"><i class="fa fa-spin fa-asterisk on-working"></i><span class="on-rest">Aceptar</span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Name Modal -->


@endsection


@section('js')

<script type="text/javascript">


    var doc = new jsPDF();

    var elementHandler = {
        '#ignorePDF': function (element, renderer) {
            return true;
        }
    };

    
    $(document).ready(function() {
      
        $('#btn_pdf').click(function () {

        
            doc.fromHTML(
                $('#output').html(),
                15,
                0.5,
                {
                    'width': 900,
                    'elementHandlers': elementHandler
                }
            );
                
            doc.save('{{$item->name}}.pdf');

        });



    });


    var formInit = function() {
        var form = $('form[name="formSimulationPlay"]');
        var submitButton = form.find('#btn-save');
        var cancelButton = form.find('#btn-cancel');
        var submitUrl = '{{ route('admin.simulation.play',[ 'id' => $item->id] ) }}';

        // Validaciones del lado del cliente que dejo de lado (aunque funcionan bien), porque meto todas las validaciones en el controller, salvo forms que puedan ser pesados y quiera agarrarlos antes de que el usiuario se clave uploads
        // Forms Validation https://github.com/jzaefferer/jquery-validation
        // var formValidationInit = function(){
        //     form.validate({
        //         ignore: [],
        //         errorClass: 'invalid-feedback animated fadeInDown',
        //         errorElement: 'div',
        //         errorPlacement: function(error, e) {
        //             $(e).parents('.form-group').append(error);
        //         },
        //         highlight: function(e) {
        //             $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        //         },
        //         success: function(e) {
        //             $(e).closest('.form-group').removeClass('is-invalid');
        //             $(e).remove();
        //         },
        //         rules: {
        //             // 'name': {
        //             //     required: true,
        //             //     minlength: 3
        //             // },
        //             // 'slug': {
        //             //     required: true,
        //             //     pattern: /^[A-Za-z\d-.]+$/
        //             // },
        //             // 'layout': {
        //             //     required: true
        //             // }
        //         },
        //         messages: {
        //             // 'name': {
        //             //     required: 'Debe ingresar un nombre',
        //             //     minlength: 'El nombre debe tener al menos 3 caracteres'
        //             // },
        //             // 'slug': {
        //             //     required: 'Debe ingresar un slug',
        //             //     pattern: 'El slug contiene caracteres inválidos'
        //             // },
        //             // 'layout': 'Debe seleccionar una plantilla'
        //         }
        //     });
        // };


        var formSubmit = function(){

            if(submitButton.attr('on')=='working') return false;
            submitButton.attr('on','working');


            // agregar campo sort a todos los elementos del repeater
            form.find('div[data-repeater-list]').each(function(){                
                var sort = 0  
                $(this).find('div[data-repeater-item]').each(function(){
                    sort++;
                    $(this).find('input[data-name="sort"]').val(sort);
                })                
            })


            // corro las validaciones y si me da ok, es que podemos enviar el form
            if(form.valid()){

                var formdata = false;
                if (window.FormData){
                    formdata = new FormData(form[0]);
                }

                var data = formdata ? formdata : form.serialize();

                $.ajax({
                    url: submitUrl,
                    type: 'POST',
                    data: data,
                    cache       : false,
                    contentType : false,
                    processData : false,
                    dataType: 'JSON',
                    success: function (response) {
                        submitButton.attr('on','rest');

                        formSubmitedOk(response);

                    },
                    error: function (response) {
                        submitButton.attr('on','rest');
                        // console.log(response);

                        if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION

                            formHasValidations(response);

                        }
                        else{ // ERROR

                            formHasErrors(response);

                        }

                    }
                });

            }
            else{
                submitButton.attr('on','rest');
            }

        };

        // el formulario se envió y volvio OK
        var formSubmitedOk = function(response){

            location.reload();

            setTimeout(function() {

                $.notify({
                    message: 'Todo perfecto!',
                },{
                    type: 'success',
                    placement: { from: 'top', align: 'center'}
                });

            }, 500);


        };

        // el formulario se enviópero surgieron validaciones del lado del controller
        var formHasValidations = function(response){

            if(typeof response.responseJSON.validations != 'undefined'){

                // el controller nos está informando validaciones del lado del server
                var validations = response.responseJSON.validations;
                Object.keys(validations).forEach(function(k){
                    // console.log(k + ' - ' + validations[k]);

                    var fieldGroup = form.find('*[name="'+k+'"]').closest('.form-group');
                        fieldGroup.addClass('is-invalid');
                        fieldGroup.append('<div id="slug-error" class="invalid-feedback animated fadeInDown">'+validations[k]+'</div>');

                });

            }

            $.notify({
                message: 'Mejor revisemos antes de enviar',
            },{
                type: 'danger',
                placement: { from: 'top', align: 'center'}
            });

        };

        // el formulario al enviarse devolvió algún error (controlado o no)
        var formHasErrors = function(response){

            // Veo si es un error de Laravel, devuelve un Json con la info de debug, caso contrario, asumo que es un texto que devuelvo desde el Controller
            var errorDescription = '';
            if(typeof response.responseJSON != 'undefined'){
                errorDescription = '<strong>Error:</strong> '  + response.responseJSON.message + '<br /><strong>Lugar:</strong> ' + response.responseJSON.file + '<br /><strong>Linea:</strong> ' + response.responseJSON.line;
            }
            else{
                errorDescription = response.responseText;
            }

            swal('Mmm.. tenemos un problema', errorDescription, 'error');

        };


        var initComponents = function(){



            $('#name').on('click',function(e){
                e.preventDefault();

                modal = $('#modal_properties');

                var modalButtonSubmit = modal.find('.btn-alt-success');

                modalButtonSubmit.off('click').on('click',function(){

                    if(modalButtonSubmit.attr('on')=='working') return false;
                    modalButtonSubmit.attr('on','working');

                    $.ajax({
                        url: '{{ route('admin.simulation.play.properties',[ 'id' => $item->id] ) }}',
                        type: 'POST',
                        data: {
                            name: modal.find('input[name="name"]').val(),
                            sidenotes: modal.find('textarea[name="sidenotes"]').val()
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            // modalButtonSubmit.attr('on','rest');

                            location.reload();

                        },
                        error: function (response) {
                            modalButtonSubmit.attr('on','rest');                            
                            if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION
                                formHasValidations(response);
                            }
                            else{ // ERROR
                                formHasErrors(response);
                            }
                        }
                    });


                })
             
                modal.modal('show');

            })



            $('.sel-segment').on('click',function(e){
                e.preventDefault();

                var name = $(this).attr('data-name')
                var id = $(this).attr('data-id')

                // modal = $('#modal_set');
                // modal.find('.block-title').html('Cambiar Segmento a ' + name)

                // var modalButtonSubmit = modal.find('.btn-alt-success');

                // modalButtonSubmit.off('click').on('click',function(){

                //     if(modalButtonSubmit.attr('on')=='working') return false;
                //     modalButtonSubmit.attr('on','working');
                
                    $.ajax({
                        url: '{{ route('admin.simulation.play.set',[ 'id' => $item->id] ) }}',
                        type: 'POST',
                        data: {
                            segment_id: id
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            // modalButtonSubmit.attr('on','rest');

                            location.reload();

                        },
                        error: function (response) {
                            modalButtonSubmit.attr('on','rest');                            
                            if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION
                                formHasValidations(response);
                            }
                            else{ // ERROR
                                formHasErrors(response);
                            }
                        }
                    });


                // })
                // modal.modal('show');

            })




            $('.sel-family').on('click',function(e){
                e.preventDefault();

                var name = $(this).attr('data-name')
                var id = $(this).attr('data-id')

                modal = $('#modal_set');
                modal.find('.block-title').html('Cambiar Familia a ' + name)

                var modalButtonSubmit = modal.find('.btn-alt-success');

                modalButtonSubmit.off('click').on('click',function(){

                    if(modalButtonSubmit.attr('on')=='working') return false;
                    modalButtonSubmit.attr('on','working');
                
                    $.ajax({
                        url: '{{ route('admin.simulation.play.set',[ 'id' => $item->id] ) }}',
                        type: 'POST',
                        data: {
                            family_id: id
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            // modalButtonSubmit.attr('on','rest');

                            location.reload();

                        },
                        error: function (response) {
                            modalButtonSubmit.attr('on','rest');                            
                            if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION
                                formHasValidations(response);
                            }
                            else{ // ERROR
                                formHasErrors(response);
                            }
                        }
                    });


                })
                modal.modal('show');

            })



            $('.sel-zone').on('click',function(e){
                e.preventDefault();

                var name = $(this).attr('data-name')
                var id = $(this).attr('data-id')

                modal = $('#modal_set');
                modal.find('.block-title').html('Cambiar Zona a ' + name)

                var modalButtonSubmit = modal.find('.btn-alt-success');

                modalButtonSubmit.off('click').on('click',function(){

                    if(modalButtonSubmit.attr('on')=='working') return false;
                    modalButtonSubmit.attr('on','working');
                
                    $.ajax({
                        url: '{{ route('admin.simulation.play.set',[ 'id' => $item->id] ) }}',
                        type: 'POST',
                        data: {
                            zone_id: id
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            // modalButtonSubmit.attr('on','rest');

                            location.reload();

                        },
                        error: function (response) {
                            modalButtonSubmit.attr('on','rest');                            
                            if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION
                                formHasValidations(response);
                            }
                            else{ // ERROR
                                formHasErrors(response);
                            }
                        }
                    });


                })
                modal.modal('show');

            })


            $('.sel-business').on('click',function(e){
                e.preventDefault();

                var name = $(this).attr('data-name')
                var id = $(this).attr('data-id')

                modal = $('#modal_set');
                modal.find('.block-title').html('Cambiar Tipo de Negocio a ' + name)

                var modalButtonSubmit = modal.find('.btn-alt-success');

                modalButtonSubmit.off('click').on('click',function(){

                    if(modalButtonSubmit.attr('on')=='working') return false;
                    modalButtonSubmit.attr('on','working');
                
                    $.ajax({
                        url: '{{ route('admin.simulation.play.set',[ 'id' => $item->id] ) }}',
                        type: 'POST',
                        data: {
                            business_id: id
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            // modalButtonSubmit.attr('on','rest');

                            location.reload();

                        },
                        error: function (response) {
                            modalButtonSubmit.attr('on','rest');                            
                            if(typeof response.status != 'undefined' && response.status == 403){ // VALIDACION
                                formHasValidations(response);
                            }
                            else{ // ERROR
                                formHasErrors(response);
                            }
                        }
                    });


                })
                modal.modal('show');

            })



            // $('.input-value').NumBox({
            //     type: 'percent',
            //     places: '2',
            //     step: 'decimal 2',                                
            // });


            $(document).on('keydown', 'input[pattern]', function(e){
                var input = $(this);
                var oldVal = input.val();
                var regex = new RegExp(input.attr('pattern'), 'g');

                setTimeout(function(){
                    var newVal = input.val();
                    if(!regex.test(newVal)){
                    input.val(oldVal); 
                    }
                }, 0);

            });

            $(document).on('keydown', 'input[max]', function(e){
                var input = $(this);
                var oldVal = input.val();
                var maxVal = parseInt(input.attr('max'));
                
                setTimeout(function(){
                    var newVal = input.val();
                    if(newVal>maxVal){
                        input.val(oldVal); 
                    }
                }, 0);
                
            });


        
        };





        return {
            init: function () {

                // formValidationInit();

                submitButton.on('click', function(e){
                    e.preventDefault();
                    formSubmit();
                })

                cancelButton.on('click', function(e){
                    e.preventDefault();

                    // document.location = '{{route('admin.simulation.list')}}';
                    window.history.back();
                    // closeModal();
                })

                initComponents();

            }
        };
    }();
    $(function(){
        formInit.init();
    });

</script>


@endsection
