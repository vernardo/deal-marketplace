<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      //'quantity', 'user_id', 'product_id', 'subtotal', 'total', 'sameOrder_id',
      'user_id', 'cart',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
  ];

  public function user() {
    //return $this->hasOne('App\User', 'user_id');
    return $this->belongsTo('App\User', 'user_id'); // one-to-many relationship cos 1 users may have several orders
  }

  // public function product() {
  //   return $this->hasOne('App\Product', 'product_id');
  // }
}
