<?php

namespace Trophy\Users\Types;

enum UsersMetricEventSummaryRequestAggregation: string
{
    case Daily = "daily";
    case Weekly = "weekly";
    case Monthly = "monthly";
}
