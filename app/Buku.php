<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Buku extends Model
{
    protected $fillable = [
        'id_buku', 'judul', 'id_penerbit', 'pengarang'
    ];
}