<?
	require_once 'model.php';
	
	class User extends Model{
		protected static $table = 'users';
	}

    $user = new User();
    $user->name = "zach attack";
    $user->email = 'myemail@ayyy.lmao2';
    $user->save();
    echo "-------Find user-------" . PHP_EOL;
    print_r($user->find(1));
    echo "/.-----Find user" . PHP_EOL;
    echo PHP_EOL;
    echo "-------Find all-------" . PHP_EOL;
    print_r($user->all());
    echo "/.-----Find all" . PHP_EOL;

?>