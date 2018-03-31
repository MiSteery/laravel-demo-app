<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BookRequest;

use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //echo " Hey!! I am book Controller";
        $books = Book::all();
        //dd($books);
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        //
        $book = new Book();
        $book->title = $request['title'];
        $book->description=$request['description'];
        $book->author=$request['author'];
        $book->isbn=$request['isbn'];
        $book->image='book.jpg';
        $filename = '';
        $image=$request->file('image');
        if($image->isvalid()){
            $ext=$image->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $path = public_path().'/uploads/';
            $image->move($path, $filename);
          }
        $book->image=$filename;
        /*if($book->save());*/
        if($book->save()){
            $request->session()->flash('alert-success','Book added successfully.');
        }
        else{
            $request->session()->flash('alert-error','Error on insertion. Please try again.'); 
        }
        return redirect('book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::find($id);
        //dd($book);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        //
        $book=Book::find($id);
        $book->title = $request['title'];
        $book->description=$request['description'];
        $book->author=$request['author'];
        $book->isbn=$request['isbn'];
        $filename = '';
        $image = $request->file('image');

        if ($image ){
            if( $image->isValid() ){
                  $ext = $image->getClientOriginalExtension();
                  $filename = time().'.'.$ext;
                  $path = public_path().'/uploads/';
                  $image->move($path, $filename);
            }

            $book->image = $filename;
        }  
        /*$book->save();
*/        
        if($book->save()){
            $request->session()->flash('alert-success','Book record updated successfully.');
        }
        else{
            $request->session()->flash('alert-error','Error on insertion. Please try again.'); 
        }

        return redirect('book');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        /*Book::find($id)->delete();*/
        $book = Book::find($id);
       $image = $book->image;
       if( $book->delete() ){
            @unlink(public_path().'/uploads/'.$image);
        return redirect('book')->with('alert-success','Record deleted succcessfully.'); 
       }else{
        return redirect('book')->with('alert-error','Error on delet in record. Please try again');
       }
    }
}
 