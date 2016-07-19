<?php

/* Chat line is used for the chat entries */

class ChatLine extends ChatBase{
	
	protected $text = '', $author = '', $email = '',$project_id = '';
	
	public function save(){
		DB::query("
			INSERT INTO chat_logs (author, email, text, project_id)
			VALUES (
				'".DB::esc($this->author)."',
				'".DB::esc($this->email)."',
				'".DB::esc($this->text)."',
				'".DB::esc($this->project_id)."'
		)");
		
		// Returns the MySQLi object of the DB class
		
		return DB::getMySQLiObject();
	}
}

?>