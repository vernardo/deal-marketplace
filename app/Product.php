<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'author', 'condition', 'format', 'publisher', 'genre_id', 'language', 'isbn', 'description', 'price', 'thumbnail',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
  ];



  public function genre() {
    return $this->belongsTo('App\Genre', 'genre_id');
  }

  // public function order() {
  //   return $this->belongsToMany('App\Order');
  // }

}
