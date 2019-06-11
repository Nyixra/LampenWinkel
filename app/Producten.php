<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producten extends Model {
    static public function getProducten() {
        return DB::table('products')->get();
    }
}
