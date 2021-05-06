<?php
  // file: controllers/BooksController.php

  

  class BooksController extends Controller {

    public function index() {  
      $users = DB::table('Book')->get();
      return view('book',
       ['books'=> $users,'login'=>Auth::check()
        ]);
    }

    public function show($id) {

      $user = DB::table('Book')->where('id', $id)->first();

     
      return view('books',
        ['books'=>$user,
         'title'=>'books Detail']);
    }

    public function create() {
      if (!Auth::check()) return redirect('/inicio');
      return view('Agregar_Book',
        ['title'=>'Books Create']);
    }  
  
    public function store() {
      if (!Auth::check()) return redirect('/inicio');
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $pages = Input::get('pages');
      $item = ['title'=>$title,'edition'=>$edition,
               'copyright'=>$copyright,'pages'=>$pages];
       DB::table('Book')->insert($item);
      return redirect('/');
    }  

    public function edit($id) {
      if (!Auth::check()) return redirect('/inicio');
      $user = DB::table('Book')->where('id', $id)->first();
      return view('Editar_Book',
        ['books'=>$user,
         'title'=>'Books Edit']);
    }  

    public function update($_,$id) {
      if (!Auth::check()) return redirect('/inicio');
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $pages = Input::get('pages');
      $item = ['title'=>$title,'edition'=>$edition,
               'copyright'=>$copyright,'pages'=>$pages];
               DB::table('Book')->update($id,$item);
      return redirect('/');
    }  

    public function destroy($id) {  
      if (!Auth::check()) return redirect('/inicio');
      DB::table('Book')->delete($id);
      return redirect('/');
    }
  }
?>