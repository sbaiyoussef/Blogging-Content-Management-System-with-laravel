<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;
  protected  $fillable=[
      'title','description','content','image','category_id','user_id'
  ];

  /**
   * @return void
   */
  public function deleteImage(){
    Storage::delete($this->image);
  }

  public function category(){
    return $this->belongsTo(Category::class);
  }

  public function tags(){
    return $this->belongsToMany(Tag::class);
  }

  /** 
  *
  * @return bool
  */
  public function hastag($tagid){
    return in_array($tagid,$this->tags->pluck('id')->toArray());
  }

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function scopeSearched($query)
  {
    $search=request()->query('search');

    if(!$search){
      return $query;

    }
    return $query->where('title' , 'LIKE' , "%{$search}%");
  }
}
