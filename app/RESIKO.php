<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class RESIKO extends Model {

    /**
     * Generated
     */

    protected $table = 'RESIKO';
    //public $timestamps = false;
    protected $primaryKey = 'ID_RESIKO';
    //public $incrementing = false;
    protected $fillable = ['ID_RESIKO', 'ID_KEMUNGKINAN', 'ID_DAMPAK', 'ID_ASPEK_TERDAMPAK', 'TOTAL_SKOR', 'TGL_RESIKO', 'CREATED_AT', 'UPDATED_AT', 'CREATED_BY'];


    public function aSPEKTERDAMPAK() {
        return $this->belongsTo(\App\ASPEKTERDAMPAK::class, 'ID_ASPEK_TERDAMPAK', 'ID_ASPEK_TERDAMPAK');
    }

    public function mDAMPAK() {
        return $this->belongsTo(\App\MDAMPAK::class, 'ID_DAMPAK', 'ID_DAMPAK');
    }

    public function mKEMUNGKINANTERJADI() {
        return $this->belongsTo(\App\MKEMUNGKINANTERJADI::class, 'ID_KEMUNGKINAN', 'ID_KEMUNGKINAN');
    }

    public function dETAILPROGRAMs() {
        return $this->hasMany(\App\DETAILPROGRAM::class, 'ID_RESIKO', 'ID_RESIKO');
    }


}
