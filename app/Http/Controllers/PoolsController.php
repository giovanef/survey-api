<?php

namespace App\Http\Controllers;

use App\Pool;
use App\Option;
use Illuminate\Http\Request;

class PoolsController extends Controller
{
    public function index()
    {
        $pools = Pool::all();
        return response()->json($pools);
    }

    public function show($id)
    {
		$pool = Pool::find($id);

        if (!$pool) {
			return response()->json([
				'message' => 'Registro não encontrado.',
			], 404);
		}

		return response()->json($pool);
    }

    public function stats($id)
    {
        $pool = Pool::find($id);

        if (!$pool) {
			return response()->json([
				'message' => 'Registro não encontrado.',
			], 404);
		}

		return response()->json($pool);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'description' => 'required',
        //     'options' => 'required',
        // ], [
        //     'description.required' => 'O campo "description" é obrigatório.',
        //     'options.required' => 'O campo "options" é obrigatório.',
        // ]);

        if (!$request->has('description') || !$request->filled('description')) {
            return response()->json([
				'message' => 'O campo "description" é obrigatório.',
			], 400);
        }

        if (!$request->has('options') || !$request->filled('options')) {
            return response()->json([
				'message' => 'O campo "options" é obrigatório.',
			], 400);
        }

        foreach ($request->input('options') as $option) {
            if (!$option) {
                return response()->json([
                    'message' => 'Não são permitidas descrições vazias no campo "options".',
                ], 400);
            }
        }

        try {
            $pool = new Pool();
            $pool->description = $request->input('description');
            $pool->save();

            $options = [];
            foreach ($request->input('options') as $option) {
                $options[] = new Option(['description' => $option]);
            }
            $pool->options()->saveMany($options);

            return response()->json([
                'id' => $pool->id
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
				'message' => $e->getMessage(),
			], 500);
        }
    }

    public function vote(Request $request, $id)
    {
        if (!$request->has('id') || !$request->filled('id')) {
            return response()->json([
				'message' => 'O campo "id" é obrigatório.',
			], 400);
        }

        try {
            $option = Option::find($request->input('id'));
            $option->votes = $option->votes + 1;
            $option->save();

            return response()->json([
                'id' => $option->id,
            ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
