<?php

namespace App\Models;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;
    protected $fillable=[
      'user_id',
      'name',
      'surname',
      'last_name',
      'email',
      'specialization_id',
      'phone_number',
      'nationality',
      'place_of_birth',
      'education_level',
      'atestat_bal',
      'date_of_end',
      'language',
      'registered',
      'snils',
      'living',
      'parent_info',
      'parent_phone',
      'parent_other',
      'count_education',
      'pasport_seria',
      'accept_1',
      'accept_2',
      'accept_3',
      'special_condition',
      'pasport_number',
      'birthsday_date',
      'dormitory',
      'status',
      'image_1',
      'image_2',
      'image_3',
      'image_4',
      'issued',

    ];
    public function specialization ()
    {
        return $this->belongsTo(Specialization::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   public function scopeFilter(Builder $builder, QueryFilter $filter)
   {
    return $filter->apply($builder);
   }
}
