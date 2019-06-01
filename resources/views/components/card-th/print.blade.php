<section class="component component-card-th" data-component="" data-content-id="{{$id}}">
    @include('admin.master.component.common')
    
    @if(has($fields->title) || has($fields->body))

        <h3 class="component-card-th__title">{!! field($fields->title, '') !!}</h3>
        <p class="component-card-th__text">{!! field($fields->body, '') !!}</p>

    @else

        <h3 class="component-card-th__title">The standard Lorem Ipsum passage</h3>
        <p class="component-card-th__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<a href="mailto:matriculas@consejo.org.ar">matriculas@consejo.org.ar</a>.</p>

    @endif


</section>