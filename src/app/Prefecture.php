<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prefectures';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'surfix' => '',
    ];
}
