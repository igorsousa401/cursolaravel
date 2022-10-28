<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\User;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {

        $usuarios = User::all()->count();

        /* Gráfico 1 */
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total'),
        ])->groupBy('ano')->orderBy('ano', 'asc')->get();

        // Preparando arrays

        foreach($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        // Formatando para o Chart.js

        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        // gráfico 2
        $catData = Categoria::with('produtos')->get();

        // Preparando o Array

        foreach($catData as $cat){
            $catNome[] = "'".$cat->nome."'";
            $catTotal[] = $cat->produtos->count();
        }

        // Formatando para chartjs
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
