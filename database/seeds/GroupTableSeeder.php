<?php

use Illuminate\Database\Seeder;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class GroupTableSeeder extends Seeder
{
    public function run()
    {
        $groups = [
                'Administrator' => ['create'=> 1,'update' => 1, 'delete' => 1, 'view' => 1],
                'Moderator'     => ['create'=> 0,'update' => 1, 'delete' => 0, 'view' => 1],
                'General'       => ['create'=> 0,'update' => 0, 'delete' => 0, 'view' => 1],
        ];
        foreach($groups as $key => $group){
            try
            {
                // Create the group
                Sentry::createGroup(array(
                    'name'        => $key,
                    'permissions' =>$group,
                ));
            }
            catch (Exception $e) {}

        }
    }
}
