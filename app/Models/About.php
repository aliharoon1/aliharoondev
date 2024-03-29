<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'abouts';
    // protected $fillable = ['title','section' ,'phone' ,'email','address','short_description','birth_date','website_url','detail','freelance'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function age()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }
}
