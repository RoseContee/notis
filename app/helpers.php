<?php
    if (! function_exists('user_profile_helper')) {
        function user_profile_helper($user, $subscription){
            $maxProfiles = $subscription->number_of_profiles;
            $userProfiles = $user->profiles()->count();
            if ($userProfiles <= 0){
                $user->profiles()->create(['name' => 'Profile 1']);
            }elseif ($userProfiles > $maxProfiles){
                $difference = $userProfiles - $maxProfiles;
                App\Models\Profile::where('user_id', $user->id)->orderBy('id', 'desc')->limit($difference)->delete();
            }
        }
    }
?>