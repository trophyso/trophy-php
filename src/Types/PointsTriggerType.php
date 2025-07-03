<?php

namespace Trophy\Types;

enum PointsTriggerType: string
{
    case Metric = "metric";
    case Achievement = "achievement";
    case Streak = "streak";
}
