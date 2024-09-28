<?php

namespace common\enums;

enum OrderDelayWorkStatusEnum: string
{
    case STATUS_START = 'start';
    case STATUS_REPEAT = 'rpt';
    case STATUS_END = 'end';
}
