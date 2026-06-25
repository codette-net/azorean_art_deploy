<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
case PENDING = 'pending';
case EMAIL_PENDING = 'pending_email_verification';
case PROCESSING = 'processing';
case SHIPPED = 'shipped';
case DELIVERED = 'delivered';
case CANCELLED = 'cancelled';

}
