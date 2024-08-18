<?php

namespace App\Traits;

use Carbon\Carbon;

trait FormatTime
{
    public function formatTime($timestamp)
    {
        $commentTime = Carbon::parse($timestamp);
        $currentTime = Carbon::now();

        $diffInMinutes = (int) $commentTime->diffInMinutes($currentTime);
        $diffInHours = (int) $commentTime->diffInHours($currentTime);
        $diffInDays = (int) $commentTime->diffInDays($currentTime);

        if ($diffInMinutes == 0) {
            return 'Vừa xong';
        } elseif ($diffInMinutes < 60) {
            return $diffInMinutes . ' phút trước';
        } elseif ($diffInHours < 24) {
            return $diffInHours . ' giờ trước';
        } elseif ($diffInDays < 30) {
            return $diffInDays . ' ngày trước';
        } else {
            return $commentTime->format('d') . ' tháng ' . $commentTime->format('m') . ', ' . $commentTime->format('Y');
        }
    }

}
