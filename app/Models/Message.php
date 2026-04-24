<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Ajoute cette ligne pour autoriser l'enregistrement de ces champs
    protected $fillable = ['name', 'email', 'content'];
}