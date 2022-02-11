<?php

class User
{
    private $id;
    private $name;
    private $authenticated;

    public function __construct()
	{
		$this->id = NULL;
		$this->name = NULL;
		$this->authenticated = FALSE;
	}

	public function __destruct()
	{
		
	}



    //Permet de se logguer
	public function login(string $name, string $passwd): bool
	{

		global $pdo;
		
		$name = trim($name);
		$passwd = trim($passwd);

		if (!$this->isNameValid($name))
		{
			return FALSE;
		}
		
        
		if (!$this->isPasswdValid($passwd))
		{
			return FALSE;
		}
		

		$query = "SELECT * FROM myschema.accounts WHERE (account_name = :name) AND (account_enabled = 1)";
		
		/* Values array for PDO */
		$values = array(':name' => $name);
		
		/* Execute the query */
		try
		{
			$res = $pdo->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e)
		{
		   /* If there is a PDO exception, throw a standard exception */
		   throw new Exception('Database query error');
		}
		
		$row = $res->fetch(PDO::FETCH_ASSOC);
		
		/* If there is a result, we must check if the password matches using password_verify() */
		if (is_array($row))
		{
			if (password_verify($passwd, $row['account_passwd']))
			{
				/* Authentication succeeded. Set the class properties (id and name) */
				$this->id = intval($row['account_id'], 10);
				$this->name = $name;
				$this->authenticated = TRUE;
				
				/* Register the current Sessions on the database */
				$this->registerLoginSession();
				
				/* Finally, Return TRUE */
				return TRUE;
			}
		}
		
		/* If we are here, it means the authentication failed: return FALSE */
		return FALSE;
	}
	
	/* A sanitization check for the account username */
	public function isNameValid(string $name): bool
	{
		/* Initialize the return variable */
		$valid = TRUE;
		
		/* Example check: the length must be between 8 and 16 chars */
		$len = mb_strlen($name);
		
		if (($len < 8) || ($len > 16))
		{
			$valid = FALSE;
		}
		
		/* You can add more checks here */
		
		return $valid;
	}
	
	/* A sanitization check for the account password */
	public function isPasswdValid(string $passwd): bool
	{
		/* Initialize the return variable */
		$valid = TRUE;
		
		/* Example check: the length must be between 8 and 16 chars */
		$len = mb_strlen($passwd);
		
		if (($len < 8) || ($len > 16))
		{
			$valid = FALSE;
		}
		
		/* You can add more checks here */
		
		return $valid;
	}
	
	/* A sanitization check for the account ID */
	public function isIdValid(int $id): bool
	{
		/* Initialize the return variable */
		$valid = TRUE;
		
		/* Example check: the ID must be between 1 and 1000000 */
		
		if (($id < 1) || ($id > 1000000))
		{
			$valid = FALSE;
		}
		
		/* You can add more checks here */
		
		return $valid;
	}
	
	/* Login using Sessions */
	public function sessionLogin(): bool
	{
		/* Global $pdo object */
		global $pdo;
		
		/* Check that the Session has been started */
		if (session_status() == PHP_SESSION_ACTIVE)
		{
			/* 
				Query template to look for the current session ID on the account_sessions table.
				The query also make sure the Session is not older than 7 days
			*/
			$query = 
			
			'SELECT * FROM myschema.account_sessions, myschema.accounts WHERE (account_sessions.session_id = :sid) ' . 
			'AND (account_sessions.login_time >= (NOW() - INTERVAL 7 DAY)) AND (account_sessions.account_id = accounts.account_id) ' . 
			'AND (accounts.account_enabled = 1)';
			
			/* Values array for PDO */
			$values = array(':sid' => session_id());
			
			/* Execute the query */
			try
			{
				$res = $pdo->prepare($query);
				$res->execute($values);
			}
			catch (PDOException $e)
			{
			   /* If there is a PDO exception, throw a standard exception */
			   throw new Exception('Database query error');
			}
			
			$row = $res->fetch(PDO::FETCH_ASSOC);
			
			if (is_array($row))
			{
				/* Authentication succeeded. Set the class properties (id and name) and return TRUE*/
				$this->id = intval($row['account_id'], 10);
				$this->name = $row['account_name'];
				$this->authenticated = TRUE;
				
				return TRUE;
			}
		}
		
		/* If we are here, the authentication failed */
		return FALSE;
	}
	











}