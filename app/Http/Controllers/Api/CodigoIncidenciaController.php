<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CodigosIncidencias;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CodigoIncidenciaController extends Controller
{
    public function index(Request $request)
    {
        return CodigosIncidencias::query()
            ->select('id', 'code', 'description')
            ->orderBy('code')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('code', 'like', "%{$request->search}%")
                    ->orWhere('description', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(15)
            )
            ->get()
            ->map(function (CodigosIncidencias $codigos) {
                  return $codigos;
            });
    }
}
