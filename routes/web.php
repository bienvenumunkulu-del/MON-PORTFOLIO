<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Models\Message;
use Illuminate\Http\Request;

// Affiche ton portfolio
Route::get('/', [PortfolioController::class, 'index']);

// Enregistre les messages de contact
Route::post('/contact', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'content' => 'required',
    ]);

    Message::create($request->all());

    return back()->with('success', 'Ton message a été bien reçu Novic !');
});