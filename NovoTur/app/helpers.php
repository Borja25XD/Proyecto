<?php

function setActive($route_name)
{
    return request()->routeIs($route_name) ? "active text-success btn disabled" : "";
}
