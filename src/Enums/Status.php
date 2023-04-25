<?php

namespace NickBeen\RickAndMortyPhpApi\Enums;

enum Status: string
{
    case Alive = 'Alive';
    case Dead = 'Dead';
    case Unknown = 'Unknown';
}
