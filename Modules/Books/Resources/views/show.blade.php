@extends('layouts.admin')
@section('content')
    <div>Title: {{ $item->title}}</div>
    <div>Author: {{ $item->author }}</div>
    <div>{!! link_to_route('books.index', 'Back') !!}</div>
@endsection