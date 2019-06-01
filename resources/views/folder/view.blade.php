@extends('master.app')

@section('content')

    {{-- buscamos el view del layout definido en ese content (por el momento deberia ser el simple y el sidebar) --}}
    @include('folder.layout.' . $item->layout->name, ['action' => $action])

@endsection