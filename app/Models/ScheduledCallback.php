<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledCallback extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';

    const STATUS_SCHEDULED = 'scheduled';

    const STATUS_IN_PROGRESS = 'in progress';

    const STATUS_COMPLETED = 'completed';

    const STATUS_CANCELLED = 'cancelled';

    const STATUS_NO_ANSWER = 'no answer';

    const STATUS_RESCHEDULED = 'rescheduled';

    const STATUS_MISSED = 'missed';

    const STATUS_INVALID = 'invalid';

    const STATUS_DUPLICATE = 'duplicate';

    public static function getStatuses(): array
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_SCHEDULED => 'Scheduled',
            self::STATUS_IN_PROGRESS => 'In Progress',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_CANCELLED => 'Cancelled',
            self::STATUS_NO_ANSWER => 'No Answer',
            self::STATUS_RESCHEDULED => 'Rescheduled',
            self::STATUS_MISSED => 'Missed',
            self::STATUS_INVALID => 'Invalid Contact',
            self::STATUS_DUPLICATE => 'Duplicate',
        ];
    }

    protected $fillable = [
        'status',
        'first_name',
        'last_name',
        'email',
        'comments',
        'callback_date',
        'callback_time',
        'callback_message',
    ];
}
