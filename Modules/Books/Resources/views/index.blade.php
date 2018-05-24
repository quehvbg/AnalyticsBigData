@extends('layouts.admin')
@section('content')
    <h1>Book List</h1>
    <div>
        {!! link_to_route('books.create', 'Create') !!}
    </div>
    <ul>
        @foreach($items as $item)
            <li>
                {{ $item->title }} - {{ $item->author }}
                {!! link_to_route('books.show', 'show', [$item->id]) !!}
                {!! link_to_route('books.edit', 'edit', [$item->id]) !!}
                {!! Form::open(['route' => ['books.destroy', $item->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('delete') !!}
                {!! Form::close() !!}
            </li>
        @endforeach
    </ul>
    <div>{{ $items->links() }}</div>
@endsection