<?php namespace StatusHub;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'status'];

    /**
     * Relationships
     */

    public function user()
    {
        return $this->belongsTo('StatusHub\User');
    }

}
