<button title="Close" class="btn btn--close close-modal">
    <span class="close_span"></span>
    <span class="close_span"></span>
</button>
<h2 class="modal__title">{{$date}}</h2>
<ul class="modal__list-events">
    @foreach ($events as $event)
    <li class="modal__list-item"><strong class="tag -color-blue">{{$event->title}}</strong> {{$event->description}}</li>
    @endforeach
</ul>