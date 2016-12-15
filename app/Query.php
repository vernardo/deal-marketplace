<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'lastName', 'email', 'queryContent', 'user_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'updated_at',
  ];

  public function user() {
    return $this->belongsTo('App\User', 'user_id');
  }
}
