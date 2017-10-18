<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class UNITKERJA extends Model {

    /**
     * Generated
     */

    protected $table = 'UNIT_KERJA';
    public $timestamps = false;
    protected $primaryKey = 'ID_UNIT_KERJA';
    public $incrementing = false;
    protected $fillable = ['ID_UNIT_KERJA', 'NM_UNIT_KERJA', 'DESKRIPSI_UNIT_KERJA', 'TYPE_UNIT_KERJA', 'ID_PROGRAM_STUDI', 'ID_FAKULTAS', 'ID_UNIT_KERJA_INDUK', 'NM_SINGKATAN_UNIT', 'KODE'];



}
