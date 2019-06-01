
@extends('master.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="box-404">
                    <div class="box-404__wrapper">
            
                        <div class="box-404__description">
                            <h3 class="box-404__title">Algo salió mal.</h3>
                            <p class="box-404__text">Parece que estás buscando una página<br>que fue eliminada o que nunca existió.</p>
                            <a href="javascript:window.history.back()" class="box-404__link">
                                <span class="box-404__link__text">Volver</span>
                                <span class="box-404__link__arrow"></span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            
            </div>
        </div>
    </div>



@endsection