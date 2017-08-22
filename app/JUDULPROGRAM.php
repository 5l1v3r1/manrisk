<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class JUDULPROGRAM extends Model {

    /**
     * Generated
     */

    protected $table = 'JUDUL_PROGRAM';
    public $timestamps = false;
    protected $primaryKey = 'ID_JUDUL_PROGRAM';
    //public $incrementing = false;
    protected $fillable = ['ID_JUDUL_PROGRAM', 'NAMA_JUDUL_PROGRAM'];


    public function dETAILPROGRAMs() {
        return $this->hasMany(\App\DETAILPROGRAM::class, 'ID_JUDUL_PROGRAM', 'ID_JUDUL_PROGRAM');
    }


}
