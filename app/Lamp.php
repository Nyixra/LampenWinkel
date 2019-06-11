<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lamp extends Model {
    static public function getLampen($productnr, $wattage) {
        return DB::table('parts')->where('product', '=', $productnr)->where('specs', 'like', '%' . $wattage . 'W%')->get();
    }
}