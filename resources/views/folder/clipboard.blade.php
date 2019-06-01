
{{-- recorro todos los contenidos del folder ordenados por el sort --}}
@foreach($user->contentClipboard() as $c)

    @isset($c->component)

        @if($c->getParam('hidden')!='1' || isset($editMode)) {{-- Parametro cross a cualquier componente para poder ocultarlo, pero si mostrar si estoy en editar obviamente --}}

            @if(View::exists('components.' . $c->component->name . '.print'))
                {{-- levanto el view que le corresponde al componente definido para cada contenido --}}
                @component('components.' . $c->component->name . '.print', ['id' => $c->id, 'item' => $c, 'fields' => $c->getFields()])

                    {{-- recorro todos los params guardados en el contenido esperando que tengan su slot en el view del componente --}}
                    @foreach($c->getParams() as $paramName => $paramValue)
                        @slot('p_' . $paramName)
                            {{$paramValue}} {{-- ojo que solo se levantan string, nada de arrays se permite ;( --}}
                        @endslot
                    @endforeach

                @endcomponent
            @endif

        @endif

    @endif

@endforeach