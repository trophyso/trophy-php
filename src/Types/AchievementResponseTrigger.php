<?php

namespace Trophy\Types;

enum AchievementResponseTrigger: string
{
    case Metric = "metric";
    case Streak = "streak";
    case Api = "api";
}
