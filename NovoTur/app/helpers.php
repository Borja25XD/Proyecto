<?php

function setActive($route_name)
{
    return request()->routeIs($route_name) ? "active actual disabled" : "";
}

function setActiveT($route_name)
{
    return request()->is($route_name) ? "active actual btn disabled" : "";
}