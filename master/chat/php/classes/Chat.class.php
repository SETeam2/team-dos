<?php

/* The Chat class exploses public static methods, used by ajax.php */

class Chat{
	
	public static function login($name,$email){
		if(!$name || !$email){
			throw new Exception('Fill in all the required fields.');
		}
		
		if(!filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
			throw new Exception('Your email is invalid.');
		}
		
		// Preparing the email hash:
		$email = md5(strtolower(trim($email)));
		
		$user = new ChatUser(array(
			'name'		=> $name,
			'email'	=> $email
		));
		

		
		$_SESSION['user']	= array(
			'name'		=> $name,
			'email'	=> $email
		);
		
		return array(
			'status'	=> 1,
			'name'		=> $name,
			'email'	=> Chat::emailFromHash($email)
		);
	}
	
	public static function checkLogged(){
		$response = array('logged' => false);
			
		if($_SESSION['user']['name']){
			$response['logged'] = true;
			$response['loggedAs'] = array(
				'name'		=> $_SESSION['user']['name'],
				'email'	=> $_SESSION['user']['email']
			);
		}
		
		return $response;
	}
	
	public static function logout(){
		//DB::query("DELETE FROM users WHERE name = '".DB::esc($_SESSION['user']['name'])."'");
		
		$_SESSION = array();
		unset($_SESSION);

		return array('status' => 1);
	}
	
	public static function submitChat($chatText,$projectID){
		if(!$_SESSION['user']){
			throw new Exception('You are not logged in');
		}
		
		if(!$chatText){
			throw new Exception('You haven\' entered a chat message.');
		}
		if(isset($projectID)){
			$chat = new ChatLine(array(
				'author'	=> $_SESSION['user']['name'],
				'email'	    => $_SESSION['user']['email'],
				'text'		=> $chatText,
				'project_id'=> $projectID
			));
		}else{
			$chat = new ChatLine(array(
				'author'	=> $_SESSION['user']['name'],
				'email'	    => $_SESSION['user']['email'],
				'text'		=> $chatText
			));
		}
	

	
		// The save method returns a MySQLi object
		$insertID = $chat->save()->insert_id;
	
		return array(
			'status'	=> 1,
			'insertID'	=> $insertID
		);
	}
	
	public static function getUsers(){
		if($_SESSION['user']['name']){
			$user = new ChatUser(array('name' => $_SESSION['user']['name']));
			$user->update();
		}
		
		// Deleting chats older than 5 minutes and users inactive for 30 seconds
		
		//DB::query("DELETE FROM chat_logs WHERE ts < SUBTIME(NOW(),'0:5:0')");
		//DB::query("DELETE FROM users WHERE last_activity < SUBTIME(NOW(),'0:0:30')");
		
		$result = DB::query('SELECT * FROM users ORDER BY name ASC LIMIT 20');
		
		$users = array();
		while($user = $result->fetch_object()){
			$user->email = Chat::emailFromHash($user->email,30);
			$users[] = $user;
		}
	
		return array(
			'users' => $users,
			'total' => DB::query('SELECT COUNT(*) as cnt FROM users')->fetch_object()->cnt
		);
	}
	
	public static function getChats($lastID,$projectID){
		$lastID    = (int)$lastID;

		if(isset($projectID)){
			$projectID = (int)$projectID;	
			
		}else{
			$projectID = 0;	
		}		

		$result = DB::query('SELECT * FROM ( SELECT * FROM chat_logs WHERE id > '.$lastID.' AND project_id = '.$projectID.' ORDER BY id DESC LIMIT 20 ) sub ORDER BY id ASC');
	
		$chats = array();
		while($chat = $result->fetch_object()){
			
			// Returning the GMT (UTC) time of the chat creation:
			
			$chat->time = array(
				'ddmmyyyy'	=> gmdate('m/d/Y',strtotime($chat->ts)),
				'hours'		=> gmdate('H',strtotime($chat->ts)),
				'minutes'	=> gmdate('i',strtotime($chat->ts))
			);
			
			$chat->email = Chat::emailFromHash($chat->email);
			
			$chats[] = $chat;
		}
	
		return array('chats' => $chats);
	}
	
	public static function emailFromHash($hash, $size=23){
		return 'http://www.email.com/avatar/'.$hash.'?size='.$size.'&amp;default='.
				urlencode('http://www.email.com/avatar/ad516503a11cd5ca435acc9bb6523536?size='.$size);
	}
}


?>