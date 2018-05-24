@extends('layouts.admin')
@section('content')
    {!! Form::open(['route' => ['books.store'], 'method' => 'POST']) !!}
        @include('books::shared._form')
        {!! Form::submit('Add') !!}
    {!! Form::close() !!}
@endsection