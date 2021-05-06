<?php
  // file: controllers/BooksController.php



  class publisherController extends Controller {

    public function index() {  
      $users = DB::table('Publisher')->get();
      return view('publisher',
       ['publisher'=>$users,'login'=>Auth::check()
        ]);
    }

    public function show($id) {
      $prof = DB::table('Publisher')->where('id', $id)->first();
      return view('publisher',
        ['publisher'=>$prof,
         'title'=>'author Detail']);
    }

    public function create() {
      if (!Auth::check()) return redirect('/inicio');
      return view('Agregar_Publisher',
        ['title'=>'author Create']);
    }  
  
    public function store() {
      if (!Auth::check()) return redirect('/inicio');
      $name = Input::get('name');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['name'=>$name,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
               DB::table('Publisher')->insert($item);
      return redirect('/list_Publisher');
    }  

    public function edit($id) {
      if (!Auth::check()) return redirect('/inicio');
      $prof = DB::table('Publisher')->where('id', $id)->first();
      return view('Editar_Publisher',
        ['publisher'=>$prof,
         'title'=>'Books Edit']);
    }  

    public function update($_,$id) {
      if (!Auth::check()) return redirect('/inicio');
      $name = Input::get('name');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['name'=>$name,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
               DB::table('Publisher')->update($id,$item);
      return redirect('/list_Publisher');
    }  

    public function destroy($id) { 
      if (!Auth::check()) return redirect('/inicio'); 
      DB::table('Publisher')->delete($id);
      return redirect('/list_Publisher');
    }
  }
?>