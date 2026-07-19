<?php 

namespace App\Enums;

enum CategoryType: string
{
    case BLOG = 'blog';
    case PROJECT = 'project';
    case BOTH = 'both';
}