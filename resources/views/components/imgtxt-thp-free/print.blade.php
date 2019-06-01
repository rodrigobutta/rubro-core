<section class="component component-imgtxt-thp-free" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')

     @if(has($fields->body))

        <div class="component-imgtxt-thp-free__text">
            @if(has($fields->title))
                <h3 class="component-imgtxt-thp-free__title">{!! field($fields->title, '') !!}</h3>
            @endif
            @if(has($fields->body))
                <p class="component-imgtxt-thp-free__desc">{!! field($fields->body, '') !!}</p>
            @endif

            <div class="component-imgtxt-thp-free__img visible-md">
                <img src="{{Resizer::widen(800,gg($fields->image,''))}}" alt="">
            </div>

            @if(has($fields->subbody) || has($fields->subtitle))
            <div class="component-imgtxt-thp-free__highlighted">
                @if(has($fields->subtitle))
                    <h4 class="component-imgtxt-thp-free__highlighted-title">{!! field($fields->subtitle, '') !!}</h4>
                @endif
                @if(has($fields->subbody))
                    <p class="component-imgtxt-thp-free__highlighted-text">{!! field($fields->subbody, '') !!}</p>
                @endif
            </div>
            @endif
        </div>

        @if(has($fields->image))
            <div class="component-imgtxt-thp-free__img hidden-md">
                <img src="{{Resizer::widen(800,gg($fields->image,''))}}" alt="">
            </div>
        @endif

    @else

        <div class="component-imgtxt-thp-free__text">
           <h3 class="component-imgtxt-thp-free__title">Sinopsis</h3>
           <p class="component-imgtxt-thp-free__desc">Daphne, es una adolescente rebelde que tras la ausencia de sus padres y sin ningún lugar a donde ir, vive robando celulares a punta de navaja. Un día la detienen y la llevan a la cárcel mixta de menores. Estando allí, no le afecta enfrentarse con otras jóvenes detenidas ni parece preocuparle el encierro hasta que alguien, al otro lado de la valla, llama su atención. Es Josh, en el correccional masculino. La amistad se consolida a través de cartas que los jóvenes se intercambian mediante las carretillas del comedor. Comienza como resultado de esto una transformación afectiva en ambos jóvenes. </p>

           <div class="component-imgtxt-thp-free__img visible-md">
                <img src="images/imgtxt-thp-free__img.png" alt="">
            </div>

           <div class="component-imgtxt-thp-free__highlighted">
               <h4 class="component-imgtxt-thp-free__highlighted-title">Entrada gratuita</h4>
               <p class="component-imgtxt-thp-free__highlighted-text">Capacidad Limitada - El Consejo se reserva el derecho de admisión.</p>
               <p class="component-imgtxt-thp-free__highlighted-text">Por razones de seguridad una vez colmada la capacidad del Salón Auditorio “Juan A. Arévalo" no se permitirá el acceso al mismo. Los matriculados y sus familiares tendrán prioridad de acceso hasta 15 minutos antes de la hora de inicio del espectáculo.</p>
           </div>
       </div>

       <div class="component-imgtxt-thp-free__img hidden-md">
            <img src="images/imgtxt-thp-free__img.png" alt="">
       </div>

    @endif

</section>
