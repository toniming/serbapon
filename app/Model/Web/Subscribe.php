<?php
namespace App\Model\Web;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Subscribe extends Eloquent
{
    protected $collection           = 'subscribe';
    public $timestamps              = true;
    public $primaryKey              = '_id';
    
    protected $fillable             =   [
                                            'email',
                                            'name',
                                            'is_subscribe',
                                            'unsubscribe_token'
                                        ];
    /**
     * Timestamp field
     *
     * @var array
     */
    protected $dates                =   [
                                            'created_at'                    , 
                                            'updated_at'                    , 
                                            'deleted_at'                    ,
                                            'published_at'
                                        ];
    /**
     * Basic rule of database
     *
     * @var array
     */
    protected $rules                =   [
                                            'published_at'                  => 'required|date',
                                            'email'                         => 'required|email',
                                        ];
    /**
     * Basic error message of rule
     *
     * @var array
     */
    protected $message              =   []; 
}