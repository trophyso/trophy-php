<?php

namespace Trophy\Users\Types;

enum UsersPointsEventSummaryRequestAggregation: string
{
    case Daily = "daily";
    case Weekly = "weekly";
    case Monthly = "monthly";
}
