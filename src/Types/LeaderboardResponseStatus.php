<?php

namespace Trophy\Types;

enum LeaderboardResponseStatus: string
{
    case Active = "active";
    case Scheduled = "scheduled";
    case Finished = "finished";
}
