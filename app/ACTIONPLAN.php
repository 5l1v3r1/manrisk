<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class ACTIONPLAN extends Model {

    /**
     * Generated
     */

    protected $table = 'ACTION_PLAN';
    public $timestamps = false;
    protected $primaryKey = 'ID_ACTION_PLAN';
    //public $incrementing = false;
    protected $fillable = ['ID_ACTION_PLAN', 'NAMA_ACTION_PLAN', 'ID_RESIKO'];

    public function rESIKO() {
        return $this->belongsTo(\App\RESIKO::class, 'ID_RESIKO', 'ID_RESIKO');
    }


}
