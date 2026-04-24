<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; // On importe le modèle Project

class PortfolioController extends Controller
{
    public function index()
    {
        // On récupère tous les projets de la base de données
        $projects = Project::all();
        
        // On les envoie à la vue "welcome"
        return view('welcome', compact('projects'));
    }
}