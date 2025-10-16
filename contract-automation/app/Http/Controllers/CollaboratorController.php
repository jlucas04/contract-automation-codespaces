<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CollaboratorSyncService;
use App\Models\Collaborator;

class CollaboratorController extends Controller
{
    public function sync(CollaboratorSyncService $service)
    {
        $service->sync();
        return response()->json(['message' => 'Colaboradores sincronizados com sucesso']);
    }

    public function index()
    {
        return Collaborator::all();
    }

    public function listView()
    {
        $collaborators = Collaborator::all();
        return view('collaborators.list', compact('collaborators'));    
    }
}
