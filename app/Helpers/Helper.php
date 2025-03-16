<?php

if (! function_exists('stringStatus')) {
    function stringStatus($status)
    {
         switch ($status) {
            case 'active':
                return 'مفعل';
            case 'ready_for_cashback':
                return 'جاهز للكاش باك';
            case 'completed':
                return 'مكتمل';
            default:  return 'جديد';
        };
    }
} 