<?php
  
namespace App\Http\Controllers;
  
use App\Book;
use App\Penerbit;

use Illuminate\Http\Request;
  
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);
  
        return view('books.index',compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerbits = Penerbit::all();
        return view('books.create', compact('penerbits', $penerbits));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',

        ]);
  
        Book::create($request->all());
   
        return redirect()->route('books.index')
                        ->with('success','Book created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $penerbits = Penerbit::all();
        return view('books.edit',compact('book','penerbits', $penerbits));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'id_buku' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
        ]);
  
        $book->update($request->all());
  
        return redirect()->route('books.index')
                        ->with('success','Book updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
  
        return redirect()->route('books.index')
                        ->with('success','Book deleted successfully');
    }
}