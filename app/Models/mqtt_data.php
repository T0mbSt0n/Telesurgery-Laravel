<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class mqtt_data extends Model
{
  protected $fillable = ['topic', 'message','published_at'];
}