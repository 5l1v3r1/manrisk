<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class MASTERRESIKO extends Model {

    /**
     * Generated
     */

    protected $table = 'MASTER_RESIKO';
    public $timestamps = false;
    protected $primaryKey = 'ID_MASTER_RESIKO';
    protected $fillable = ['ID_MASTER_RESIKO', 'NM_MASTER_RESIKO'];

    public function rESIKOs() {
        return $this->hasMany(\App\RESIKO::class, 'ID_MASTER_RESIKO', 'ID_MASTER_RESIKO');
    }

}
