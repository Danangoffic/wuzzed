<?php

namespace App\Models;

use App\Models\Page;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentWidget extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'page_id',
        'type',
        'content',
        'status',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
