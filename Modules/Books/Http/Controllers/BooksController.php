<?php

namespace Modules\Books\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Books\Requests\CreateBookRequest;
use Modules\Books\Requests\EditBookRequest;
use Modules\Books\Services\BookServiceContract;

class BooksController extends Controller
{
    protected $service;
    public function __construct(BookServiceContract $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $items = $this->service->paginate();
        return view('books::index', compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('books::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  CreateBookRequest $request
     * @return Response
     */
    public function store(CreateBookRequest $request)
    {
        $this->service->store($request->all());
        flash('Book created!')->success();
        return redirect()->route('books.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $item = $this->service->find($id);
        return view('books::show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $item = $this->service->find($id);
        return view('books::edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     * @param  EditBookRequest $request
     * @return Response
     */
    public function update(EditBookRequest $request, $id)
    {
        $this->service->update($id, $request->all());
        flash('Book updated!')->success();
        return redirect()->route('books.index');
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        flash('Book deleted!')->important();
        return redirect()->route('books.index');
    }
}
