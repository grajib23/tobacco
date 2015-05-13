<?php
/**
 * Created by PhpStorm.
 * User: jabedbangali
 * Date: 5/14/15
 * Time: 2:24 AM
 */

namespace App\Repositories\User;


use App\Models\User;
use App\Repositories\BaseRepository;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class EloquentUserRepository extends BaseRepository implements UserRepository{

    function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function create(array $attributes)
    {
        try
        {
            $user = Sentry::createUser(array(
                'email'     => $attributes['email'],
                'password'  => $attributes['password'],
                'activated' => true,
            ));
            $adminGroup = Sentry::findGroupById($attributes['group_id']);
            $user->addGroup($adminGroup);
            return $user;
        }
        catch(\Exception $e){}
    }

    public function update($id,array $attributes)
    {
        try
        {
            // Find the user using the user id
            $user = Sentry::findUserById($id);
            $group_id = 0;
            foreach($user->groups as $group) {
                $group_id =  $group->id;
            }

            if( ( $group_id > 0) && ($group_id != $attributes['group_id'] )){

                // User is  Assigned , So Remove Old Group and Re-assigned New Group

                // Find Old the group using the group id
                $oldGroup = Sentry::findGroupById($group_id);
                $user->removeGroup($oldGroup);

                // Find New the group using the group id
                $newGroup = Sentry::findGroupById($attributes['group_id']);
                $user->addGroup($newGroup);

            }
            else if( ($group_id == 0) && $attributes['group_id'] > 0 ){

                // User is Not Assigned , So Assigned New Group

                // Find New the group using the group id
                $newGroup = Sentry::findGroupById($attributes['group_id']);
                $user->addGroup($newGroup);
            }
            $user->email = $attributes['email'];
            $user->save();
            return true;
        }
        catch(\Exception $e){
            return false;
        }
    }

}