<?php namespace StatusHub;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function statuses()
	{
		return $this->hasMany('StatusHub\Status');
	}

	public function friendsIAdded()
	{
		return $this->belongsToMany('StatusHub\User', 'friends_users', 'user_id', 'friend_id');
	}

	public function friendsWhoAddedMe()
	{
		return $this->belongsToMany('StatusHub\User', 'friends_users', 'friend_id', 'user_id');
	}

	public function addFriend(User $friend)
	{
		$this->friends()->attach($friend->id);
	}

	public function removeFriend(User $friend)
	{
		$this->friends()->detach($friend->id);
	}

	public function getAllFriends()
	{
		return $this->friendsWhoAddedMe->merge($this->friendsIAdded);
	}

	public function verifyFriendship($friendId)
	{
		$allFriendsIds = $this->getAllFriends()->lists('id');

		return in_array($friendId, $allFriendsIds);
	}

}

