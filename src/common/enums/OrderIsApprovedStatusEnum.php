<?php

namespace common\enums;

enum OrderIsApprovedStatusEnum: string
{
    case STATUS_NEW = 'new';
    case STATUS_APPROVED = 'approved';
    case STATUS_DECLINED = 'declined';
}
