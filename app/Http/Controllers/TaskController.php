<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {
    public function store(Request $request) {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        // Verificar límite de tareas pendientes
        $pendingTasks = Task::where('user_id', $validated['user_id'])
            ->where('is_completed', false)
            ->count();

        if ($pendingTasks >= 5) {
            return response()->json([
                'error' => 'Límite de 5 tareas pendientes por usuario.'
            ], 422);
        }

        $task = Task::create($validated);

        return response()->json([
            'id' => $task->id,
            'name' => $task->name,
            'description' => $task->description,
            'user' => $task->user->name,
            'company' => [
                'id' => $task->company->id,
                'name' => $task->company->name,
            ],
        ], 201);
    }
}