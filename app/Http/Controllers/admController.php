<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Jogadores;

use Redirect;

class admController extends Controller
{
    
public function __construct()
{
   // $this->middleware('auth');
}

  
    public function sorteio() //
    {   
        $participantes = jogadores::get();
        return view('sorteio')->with('jogadores', $participantes);
    }
  

    public function timesMontados($status) 
    {   
        // Config
        $qtdJogadoresTime = 5; // numeros de jogadores incluindo goleiro
        $qtdPartida = 1; // Quantidade de Partidas
        $qtdMin = 12;
        $sortear = $status;

        if($sortear == 'sim'){

            $participantes = jogadores::where('check_confirmacao', 1)->inRandomOrder()->get();
            $totalJogadoresPresentes = $participantes->count();  // Quantidade de Jogadores que Presentes
            $jogadores = $participantes->where('tipo', 'jogador')->shuffle();
            $goleiros = $participantes->where('tipo', 'goleiro')->shuffle();

        }elseif($sortear == 'nao'){

            $participantes = jogadores::where('check_confirmacao', 1)->get();
            $totalJogadoresPresentes = $participantes->count();  // Quantidade de Jogadores que Presentes
            $jogadores = $participantes->where('tipo', 'jogador');
            $goleiros = $participantes->where('tipo', 'goleiro');   
        }   

            if($totalJogadoresPresentes >= $qtdMin){
                $times = $jogadores->chunk($qtdJogadoresTime);
                    // Adicionar goleiros aos times
                    foreach ($times as $indiceTime => &$time) {
                        $time[] = $goleiros->shift();
                    }
                $statusPartida = '';
            }else{
                $times = [];
                $time = [];
                $statusPartida = 'Não tem Jogadores Suficiente para partida de hoje';
            }
        
            return view('timesMontados')
            ->with('statusPartida', $statusPartida)
            ->with('times', $times)
            ->with('time', $time);
    }





    public function check(Request $request) 
    {
        $itemId  = $request->itemId;
        $newStatus  = $request->newStatus;
        DB::table('jogadores')->where('jogadores_id', '=', $itemId) ->update(['check_confirmacao' =>  $newStatus, ]);
        return response()->json(['status' => $newStatus]);

    }













}