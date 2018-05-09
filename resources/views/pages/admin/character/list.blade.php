@extends('pages.admin.home')

@section('content')
    <ul>
        @foreach($characters as $character)
        <li>{{$character->name}}</li>
        @endforeach
    </ul>
@stop