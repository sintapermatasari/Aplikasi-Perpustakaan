<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Penerbit extends Model
{
    protected $fillable = [
        'id_penerbit', 'penerbit'
    ];
}