<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class MDAMPAK extends Model {

    /**
     * Generated
     */

    protected $table = 'M_DAMPAK';
    public $timestamps = false;
    protected $primaryKey = 'ID_DAMPAK';
    public $incrementing = false;
    protected $fillable = ['ID_DAMPAK', 'NAMA_DAMPAK', 'SKOR_DAMPAK'];


    public function rESIKOs() {
        return $this->hasMany(\App\RESIKO::class, 'ID_DAMPAK', 'ID_DAMPAK');
    }


}
