<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service',
        'message',
        'preferred_contact',
        'status',
        'admin_notes',
    ];

    public static array $services = [
        'Painting',
        'Carpet',
        'Sanding',
        'Plastering',
        'Skirting Board',
        'Tiling',
        'Door & Cabinet Installation',
        'Plaster Board',
        'Welding',
        'False Ceiling',
        'Gardening',
        'Insulation',
        'Parquet & Laminate',
        'Fans',
        'Garden Fence',
        'Multiple Services',
    ];

    public static array $statuses = [
        'new'       => 'New',
        'contacted' => 'Contacted',
        'completed' => 'Completed',
    ];
}
