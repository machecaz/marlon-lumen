<?php

namespace Marlon\Lumen\Helpers;

use Marlon\Lumen\Enums\RoleEnum;

class Auth
{
    /**
     * Get id of current user.
     *
     * @return string|null
     */
    public static function id()
    {
        return request()->header('x-user-id');
    }

    /**
     * Get role of current user.
     *
     * @return string|null
     */
    public static function role()
    {
        return request()->header('x-role-id');
    }

    /**
     * Check if current user is an admin.
     *
     * @return boolean
     */
    public static function isSuperAdmin(): boolean
    {
        return self::is(RoleEnum::SUPER_ADMIN());
    }

    /**
     * Check role of user.
     *
     * @param RoleEnum $role
     * @return boolean
     */
    public static function is(RoleEnum $role): boolean
    {
        return self::getRole() === string ($role);
    }

    /**
     * Check if there is a user.
     *
     * @return boolean
     */
    public static function exists(): boolean
    {
        return self::getId() !== null;
    }
}
