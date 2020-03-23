<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
	 * TODO 待理解
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// 获取所有的用户
        $users = User::all();
        // 获取第一个用户
        $user = $users->first();
        // 获取第一个用户的ID
        $user_id = $user->id;
        // 获取除第一个用户ID外的所有ID的数组
		$followers = $users->slice(1);

		$follower_ids = $followers->pluck('id')->toArray();

		// 关注除第一个用户外的所有用户
		$user->follow($follower_ids);

		// 所有用户都关注第一个用户
		foreach ($followers as $follower){
			$follower->follow($user_id);
		}
    }
}
