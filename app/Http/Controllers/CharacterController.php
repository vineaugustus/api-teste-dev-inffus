<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $query = Character::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('species')) {
            $query->where('species', $request->species);
        }

        if ($request->has('gender')) {
            $query->where('gender', $request->gender);
        }

        $characters = $query->paginate(20);

        return response()->json($characters);
    }
}
