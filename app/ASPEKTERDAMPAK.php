<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class ASPEKTERDAMPAK extends Model {

    /**
     * Generated
     */

    protected $table = 'ASPEK_TERDAMPAK';
    public $timestamps = false;
    protected $primaryKey = 'ID_ASPEK_TERDAMPAK';
    public $incrementing = false;
    protected $fillable = ['ID_ASPEK_TERDAMPAK', 'NAMA_ASPEK_TERDAMPAK'];


    public function rESIKOs() {
        return $this->hasMany(\App\RESIKO::class, 'ID_ASPEK_TERDAMPAK', 'ID_ASPEK_TERDAMPAK');
    }


}
