<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class MKEMUNGKINANTERJADI extends Model {

    /**
     * Generated
     */

    protected $table = 'M_KEMUNGKINAN_TERJADI';
    public $timestamps = false;
    protected $primaryKey = 'ID_KEMUNGKINAN';
    public $incrementing = false;
    protected $fillable = ['ID_KEMUNGKINAN', 'NAMA_KEMUNGKINAN', 'SKOR_KEMUNGKINAN'];


    public function rESIKOs() {
        return $this->hasMany(\App\RESIKO::class, 'ID_KEMUNGKINAN', 'ID_KEMUNGKINAN');
    }


}
