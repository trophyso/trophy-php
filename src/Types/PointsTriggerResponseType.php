<?php

namespace Trophy\Types;

enum PointsTriggerResponseType: string
{
    case Metric = "metric";
    case Achievement = "achievement";
    case Streak = "streak";
}
