<?php
  // file: controllers/BooksController.php

  

  class AuthorController extends Controller {

    public function index() {  
      $users = DB::table('Author')->get();
      return view('author',
       ['author'=> $users,'login'=>Auth::check()
        ]);
    }

    public function show($id) {
      $prof = DB::table('Author')->where('id', $id)->first();
      return view('author',
        ['author'=>$prof,
         'title'=>'author Detail']);
    }

    public function create() {
      if (!Auth::check()) return redirect('/inicio');
      return view('Agregar_author',
        ['title'=>'author Create']);
    }  
  
    public function store() {
      if (!Auth::check()) return redirect('/inicio');
      $name = Input::get('name');
      $nationality = Input::get('nationality');
      $birth = Input::get('birth');
      $fields = Input::get('fields');
      $item = ['name'=>$name,'nationality'=>$nationality,
               'birth'=>$birth,'fields'=>$fields];
               DB::table('Author')->insert($item);
      return redirect('/list_Author');
    }  

    public function edit($id) {
      if (!Auth::check()) return redirect('/inicio');
      $user = DB::table('Author')->where('id', $id)->first();
      return view('Editar_Author',
        ['author'=>$user,
         'title'=>'Books Edit']);
    }  

    public function update($_,$id) {
      if (!Auth::check()) return redirect('/inicio');
      $name = Input::get('name');
      $nationality = Input::get('nationality');
      $birth = Input::get('birth');
      $fields = Input::get('fields');
      $item = ['name'=>$name,'nationality'=>$nationality,
               'birth'=>$birth,'fields'=>$fields];
               DB::table('Author')->update($id,$item);
      return redirect('/list_Author');
    }  

    public function destroy($id) { 
      if (!Auth::check()) return redirect('/inicio'); 
      DB::table('Author')->delete($id);
      return redirect('/list_Author');
    }
  }
?>