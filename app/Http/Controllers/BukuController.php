<?php
  
namespace App\Http\Controllers;
  
use App\Buku;
use Illuminate\Http\Request;
  
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::latest()->paginate(5);
  
        return view('bukus.index',compact('bukus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bukus.create');
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
  
        Buku::create($request->all());
   
        return redirect()->route('bukus.index')
                        ->with('success','Buku created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('bukus.show',compact('buku'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('bukus.edit',compact('buku'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'id_buku' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
        ]);
  
        $buku->update($request->all());
  
        return redirect()->route('bukus.index')
                        ->with('success','Buku updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
  
        return redirect()->route('bukus.index')
                        ->with('success','Buku deleted successfully');
    }
}
