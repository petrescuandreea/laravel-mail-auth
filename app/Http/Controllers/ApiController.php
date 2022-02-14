<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use App\Videogame;
use App\Mail\VideogameDeleteMail;

class ApiController extends Controller
{
    public function getVideogames() {

        $videogames = Videogame::all();
        return json_encode($videogames);
    }

    public function deleteVideogame($id) {

        $videogame = Videogame::findOrFail($id);
        $videogame -> delete();
        
        // invio mail 
        $this -> sendDeleteMail($videogame);

        return json_encode($videogame);
    }

    private function sendDeleteMail($videogame) {

        // mail inviata all'utente registrato
        Mail::to(Auth::user() -> email) -> send(new VideogameDeleteMail($videogame));
        // mail inviata all'amministratore
        Mail::to('admin@miosito.com') -> send(new VideogameDeleteMail($videogame));
    }
}
