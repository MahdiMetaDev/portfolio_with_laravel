<?php

namespace App\Enums;

enum PermissionEnums: string
{
    // user
    case USERS_ALL = 'users.all';
    case USER_SHOW = 'user.show';
    case USER_CREATE = 'user.create';
    case USER_EDIT = 'user.edit';
    case USER_DELETE = 'user.delete';

    // blog
    case BLOGS_ALL = 'blogs.all';
    case BLOG_SHOW = 'blog.show';
    case BLOG_CREATE = 'blog.create';
    case BLOG_EDIT = 'blog.edit';
    case BLOG_DELETE = 'blog.delete';
}
