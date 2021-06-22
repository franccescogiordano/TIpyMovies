<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trivia extends Model
{
    public $id;
    public $imdbID;
    public $pregunta;
    public $res1;
    public $res2;
    public $res3;
    public $res4;

    use HasFactory;
}
