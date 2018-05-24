@extends('layouts.admin')
@section('content')
    {!! Form::model($item, ['route' => ['books.update', $item->id], 'method' => 'PUT']) !!}
        @include('books::shared._form')
        {!! Form::submit('Update') !!}
    {!! Form::close() !!}
@endsection