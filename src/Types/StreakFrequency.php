<?php

namespace Trophy\Types;

enum StreakFrequency: string
{
    case Daily = "daily";
    case Weekly = "weekly";
    case Monthly = "monthly";
    case Yearly = "yearly";
}
