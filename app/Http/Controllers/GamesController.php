<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Videogame;
use App\Models\Category;
use App\Mail\VideogameMail;

class GamesController extends Controller
{
    public function index(){
        
        $videogames = Videogame::orderBy('id','desc')->get();
        return view('index', ['games'=>$videogames]);
    }

    public function create(){
        
        $categorias = Category::all();
        return view('create', ['categorias'=>$categorias]);
    }

    public function help($name_game, $categoria=null){
        
        $date = now();
        return view('show', ['nameVideogame'=>$name_game,
                            'categoryGame'=>$categoria,
                            'fecha'=>$date]);
     
    }

    public function storeVideogame(Request $request){

        // $request->validate([
        //     'name'=>'required|min:5'
        // ]);

        // $game = new Videogame;
        // $game->name = $request->name;
        // $game->category_id = $request->category_id;
        // $game->active = 1;
        // $game->save();

        //si los campos input de los formularios tiene el mismo nombre que los atributos del objeto en la base de datos,
        // cuando pasamos $request->all() va a reconocer automaticamente los datos y grabarlos en la columna correspondiente
        
        Videogame::create($request->all());

        foreach (['ncialone@gmail.com'] as $recipient){
            Mail::to($recipient)->send(new VideogameMail());
        }

        return redirect()->route('games');
    }

    public function view($game_id){
        $game = Videogame::find($game_id);
        $categorias = Category::all();
        return view('update', ['categorias'=>$categorias, 'game'=>$game]);
    }

    public function updateVideogame(Request $request){

        $request->validate([
            'name'=>'required|min:5'
        ]);

        $game = Videogame::find($request->game_id);
        $game->name = $request->name;
        $game->category_id = $request->category_id;
        $game->active = 1;
        $game->save();
        return redirect()->route('games');
    }

    public function delete($game_id){
        $game = Videogame::find($game_id);
        $game->delete();
        return redirect()->route('games');
    }
}
