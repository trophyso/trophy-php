<?php

namespace Trophy\Types;

enum LeaderboardResponseRankBy: string
{
    case Points = "points";
    case Streak = "streak";
    case Metric = "metric";
}
