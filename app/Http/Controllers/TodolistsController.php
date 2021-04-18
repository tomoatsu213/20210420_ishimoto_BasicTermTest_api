<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodolistsController extends Controller
{
    public function post(Request $request)
    {
        $param = [
            "todo" => $request->todo,
        ];
        DB::table('todolists')->insert($param);
        return response()->json([
            'message' => 'Todo created successfully',
            'data' => $param
        ], 200);
    }

    public function put(Request $request)
    {
        $param = [
            "todo" => $request->todo,
        ];
        DB::table('todolists')->where('todo', $request->todo)->update($param);
        return response()->json([
            'message' => 'Todo updated successfully',
            'data' => $param
        ], 200);
    }

    public function delete(Request $request)
    {
        DB::table('todolists')->where('todo', $request->todo)->delete();
        return response()->json([
            'message' => 'Todo deleted successfully',
        ], 200);
    }
}
