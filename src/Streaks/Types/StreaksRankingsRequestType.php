<?php

namespace Trophy\Streaks\Types;

enum StreaksRankingsRequestType: string
{
    case Active = "active";
    case Longest = "longest";
}
