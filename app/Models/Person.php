<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    // public function getData()
    // {
        //     $txt = $this->id . ':' . $this->name . '(' . $this->age . ')';
        //     return $txt;
        // }

    use HasFactory;

    protected $fillable = ['name', 'age'];

    public static $rules = array (
        'name' => 'required',
        'age' => 'integer|min:0|max:150',
    );

    public function getData(){
        return $this->id . ':' . $this->name . '(' . $this->age . ')';
    }
}
