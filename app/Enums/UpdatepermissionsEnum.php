<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UpdatepermissionsEnum extends Enum
{
    // const Actions 
    const VIEW_ANY = 'view-any'; #this is for admin of the site 
    const VIEW_OWN= 'view-own'; #for a content creator or seller for example 
    const VIEW = 'view';   #this may be used in a specific case  
    const CREATE = 'create';
    const UPDATE = 'update';
    const DELETE = 'delete';

    // const Elements (models to control)
    const USERS = 'users';
    const ROLES = 'roles';
    const CUSTOMERS = 'customers';
    const LANGUAGES = 'languages';
    const SETTINGS = 'settings';

    // const Main Permissions 
    const ADMIN_MAIN_PERMISSION = 'Admin';
    const MANAGER_MAIN_PERMISSION = 'Manager';
    const CUSTOMER_MAIN_PERMISSION = 'Customer';

    //const Main Roles
    const ADMIN_ROLE = 'ADMIN';
    const MANAGER_ROLE = 'MANAGER';
    const CUSTOMER_ROLE = 'CUSTOMER';


    public static function get_Admin_role()
    {
        return self::ADMIN_ROLE;
    }
    public static function get_Manager_role()
    {
        return self::MANAGER_ROLE;
    }
    public static function get_Customer_role()
    {
        return self::CUSTOMER_ROLE;
    }


    public static function get_Admin_permission()
    {
        return self::ADMIN_MAIN_PERMISSION;
    }
    public static function get_Manager_permission()
    {
        return self::MANAGER_MAIN_PERMISSION;
    }
    public static function get_Customer_permission()
    {
        return self::CUSTOMER_MAIN_PERMISSION;
    }

    public static function getActions()
    {
        return [
            self::VIEW_ANY,
            self::VIEW_OWN,
            self::VIEW,
            self::CREATE,
            self::DELETE,
            self::UPDATE
        ];
    }

    public static function getAdminActions()
    {
        return [
            self::VIEW_ANY,
            self::CREATE,
            self::DELETE,
            self::UPDATE
        ];
    }

    public static function getCustomerActions()
    {
        return [
            self::VIEW_OWN,
            self::CREATE,
            self::DELETE,
            self::UPDATE
        ];
    }
    public static function getMainPermissions()
    {
        return [
            self::ADMIN_MAIN_PERMISSION,
            self::MANAGER_MAIN_PERMISSION,
            self::CUSTOMER_MAIN_PERMISSION,
        ];
    }
  

    public static function getElements()
    {
        return [
            self::USERS,
            self::ROLES,
            self::SETTINGS,
            self::LANGUAGES,
            self::CUSTOMERS,
        ];
    }
    public static function getClientElements()
    {
        return [];
    }

    public static function getAdminElements()
    {
        return [
            self::USERS,
            self::SETTINGS,
            self::LANGUAGES,
            self::ROLES,
            self::CUSTOMERS,
        ];
    }
    public static function getMainRoles()
    {
        return [
            self::ADMIN_ROLE,
            self::MANAGER_ROLE,
            self::CUSTOMER_ROLE,
        ];
    }

    public static function getRolesActions()
    {
        return [
            self::VIEW_ANY,
            self::VIEW,
            self::CREATE,
            self::DELETE,
            self::UPDATE
        ];
    }

    // all permissions under Role modele

    public static function Role_permissions(){
        $permissions=[];
        foreach(self::getRolesActions() as $action){
            array_push($permissions,$action . ' ' . self::ROLES);
        }
        return $permissions;
    }
}
