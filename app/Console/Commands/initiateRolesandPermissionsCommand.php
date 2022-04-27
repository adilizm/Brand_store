<?php

namespace App\Console\Commands;

use App\Enums\UpdatepermissionsEnum;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class initiateRolesandPermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will update rolles with the default permissions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //create all permissions 
       foreach(UpdatepermissionsEnum::getElements() as $element ){
           foreach(UpdatepermissionsEnum::getActions() as $action){
                Permission::firstOrCreate([
                    'name'=>$action.' '.$element
                ]);
                $this->info('creat permission : "'.$action.' '.$element .'"');
           }
       }
       //create Main permissions (like admin ,manager ...)
       foreach(UpdatepermissionsEnum::getMainPermissions() as $Main_permission ){
                Permission::firstOrCreate([
                    'name'=>$Main_permission
                ]);
                $this->info('creat Main permission : "'.$Main_permission.'"');
       }
       
       //create main Roles
       foreach(UpdatepermissionsEnum::getMainRoles() as $Main_Role ){
            $role= Role::firstOrCreate([
                'name'=>$Main_Role
            ]);
             // affect Admin Role with Admin permission
             if($Main_Role == UpdatepermissionsEnum::get_Admin_role()){
                $role->givePermissionTo(UpdatepermissionsEnum::get_Admin_permission());
            }
             // affect MANAGER Role with Manager permission
             if($Main_Role == UpdatepermissionsEnum::get_Manager_role()){
                $role->givePermissionTo(UpdatepermissionsEnum::get_Manager_permission());
            }
             // affect MANAGER Role with Manager permission
             if($Main_Role == UpdatepermissionsEnum::get_Customer_role()){
                $role->givePermissionTo(UpdatepermissionsEnum::get_Customer_permission());
            }
            $this->info('creat Main Role : "'.$Main_Role.'"');
        }

        #create permission : assign user permission 
        if(Permission::where('name','assign user permission')->first() == null){
            Artisan::call('create:permission --name="assign user permission"');
            $this->info('creat permission : assign user permission');
        }
        
        #create permission : update user auth 
        if(Permission::where('name','update user auth')->first() == null){
            Artisan::call('create:permission --name="update user auth"');
            $this->info('creat permission : update user auth');
        }

        #create permission : ban-unban user
        if(Permission::where('name','ban-unban user')->first() == null){
            Artisan::call('create:permission --name="ban-unban user"');
            $this->info('creat permission : ban-unban user');
        }

        #create permission : create manager
        if(Permission::where('name','create manager')->first() == null){
            Artisan::call('create:permission --name="create manager"');
            $this->info('creat permission : create manager');
        }

        Artisan::call('cache:clear');
    }
}
