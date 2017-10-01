<?php namespace App\Modules\Testmodule\Utils;

use App\Models\Setting;
use DB;
use Illuminate\Database\Schema\Blueprint;
use Schema;
use Sroutier\LESKModules\Contracts\ModuleMaintenanceInterface;
use Sroutier\LESKModules\Traits\MaintenanceTrait;

class TestmoduleMaintenance implements ModuleMaintenanceInterface
{

    use MaintenanceTrait;


    static public function initialize()
    {
        DB::transaction(function () {

            /////////////////////////////////////////////////
            // Build database or run migration.
//            self::buildDB();
//            self::migrate('testmodule');

            /////////////////////////////////////////////////
            // Seed the database.
//            self::seed('testmodule');


            //////////////////////////////////////////
            // Create permissions.
            $permUseTestmodule = self::createPermission(  'use-testmodule',
                'Use the Testmodule module',
                'Allows a user to use the Testmodule module.');
            ///////////////////////////////////////
            // Register routes.
            $routeHome = self::createRoute( 'testmodule.index',
                'testmodule',
                'App\Modules\Testmodule\Http\Controllers\TestmoduleController@index',
                $permUseTestmodule );

            ////////////////////////////////////
            // Create roles.
            self::createRole( 'testmodule-users',
                'Testmodule Users',
                'Users of the Testmodule module.',
                [$permUseTestmodule->id] );

            ////////////////////////////////////
            // Create menu system for the module
            $menuToolsContainer = self::createMenu( 'tools-container', 'Tools', 10, 'fa fa-folder', 'home', true );
            self::createMenu( 'testmodule.index', 'Testmodule', 0, 'fa fa-file', $menuToolsContainer, false, $routeHome );
        }); // End of DB::transaction(....)
    }


    static public function unInitialize()
    {
        DB::transaction(function () {

            self::destroyMenu('testmodule.index');
            self::destroyMenu('tools-container');

            self::destroyRole('testmodule-users');

            self::destroyRoute('testmodule.index');

            self::destroyPermission('use-testmodule');

            /////////////////////////////////////////////////
            // Destroy database or rollback migration.
//            self::rollbackMigration('testmodule');
//            self::destroyDB();

        }); // End of DB::transaction(....)
    }


    static public function enable()
    {
        DB::transaction(function () {
            self::enableMenu('testmodule.index');
        });
    }


    static public function disable()
    {
        DB::transaction(function () {
            self::disableMenu('testmodule.index');
        });
    }


    static public function buildDB()
    {
        // Add code to build database and tables as needed.
    }


    static public function destroyDB()
    {
        // Add code to destroy database and tables as needed.
    }

}