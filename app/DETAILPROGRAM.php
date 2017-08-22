<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class DETAILPROGRAM extends Model {

    /**
     * Generated
     */

    protected $table = 'DETAIL_PROGRAM';
    public $timestamps = false;
    protected $primaryKey = 'ID_DETAIL_PROGRAM';
    public $incrementing = false;
    protected $fillable = ['ID_DETAIL_PROGRAM', 'ID_JUDUL_PROGRAM', 'ID_ACTION_PLAN', 'ID_RESIKO', 'UNIT_SASARAN', 'RENCANA_ANGGARAN', 'WAKTU_PELAKSANAAN', 'INDIKATOR_KEGIATAN', 'LUARAN_DAMPAK', 'STATUS_CAPAIAN', 'TAHUN', 'CREATED_AT', 'CREATED_BY'];


    public function aCTIONPLAN() {
        return $this->belongsTo(\App\ACTIONPLAN::class, 'ID_ACTION_PLAN', 'ID_ACTION_PLAN');
    }

    public function jUDULPROGRAM() {
        return $this->belongsTo(\App\JUDULPROGRAM::class, 'ID_JUDUL_PROGRAM', 'ID_JUDUL_PROGRAM');
    }

    public function rESIKO() {
        return $this->belongsTo(\App\RESIKO::class, 'ID_RESIKO', 'ID_RESIKO');
    }


}
