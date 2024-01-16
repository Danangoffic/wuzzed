<?php

namespace App\Models;

use App\Models\Page;
use App\Models\User;
use App\Models\ContentWidget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    public static $type = [
        'banner', 'card', 'gallery', 'text', 'video', 'image', 'slider',
        'course_list', 'course_detail', 'course_review', 'course_faq', 'course_curriculum', 'course_instructor'
    ];

    protected $fillable= [
        'page_id',
        'type',
        'status',
        'is_featured',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function contents()
    {
        return $this->hasMany(ContentWidget::class);
    }

    public function createdBy()
    {
        $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        $this->belongsTo(User::class, 'deleted_by');
    }
}
