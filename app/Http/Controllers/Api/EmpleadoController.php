<?php

namespace App\Http\Controllers\Api;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;

class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
        return Empleado::query()
            ->select('id', 'num_empleado', 'name', 'father_lastname', 'mother_lastname', 'deparment_id')
            ->orderBy('num_empleado')
            ->whereIn('deparment_id',['19','27'])
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('name', 'like', "%{$request->search}%")
                    ->orWhere('father_lastname', 'like', "%{$request->search}%")
                    ->orWhere('num_empleado', 'like', "%{$request->search}%")
                    ->whereIn('deparment_id',['19','27'])
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(15)
            )
            ->get()
            ->map(function (Empleado $empleado) {
                  return $empleado;
            });
    }
}
