<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Notifications\Notifiable;

class Form extends Model
{
    use HasFactory;  
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'project_name',
        'project_priority',
        'project_status',
        'project_person',
        'attachment'
    ];
}
