<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'genreTitle',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
  ];

  public function product() {
    return $this->hasMany('App\Product', 'genre_id');
  }
}
