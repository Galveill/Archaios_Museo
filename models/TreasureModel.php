<?php

/*
	Model to access to the Treasure data.
*/
class TreasureModel {

	//Server
	private const SERVER = "localhost";
	//Port
	private const PORT = "3306";
	//Database
	private const BD = "archaios";
	//User
	private const BD_USER = "hermes";
	//Pass
	private const BD_PASS = "godoflogistics00";

	//La conexión a la bd;
	private $conn = null;
	//La instancia
	private static $instance = null;

	//Prepared Statements
	private const I_USER = 'INSERT INTO user (name) VALUES (?)';
	private $stmIUser = null;
	private const Q_USER = 'SELECT name FROM user WHERE id_user = ? LIMIT 1';
	private $stmQUser = null;
	private const Q_USER_ID = 'SELECT id_user FROM user WHERE name = ? LIMIT 1';
	private $stmQUserId = null;
	private const Q_ALL_USER = 'SELECT name FROM user';
	private $stmQAllUser = null;

	private const I_TREASURE = 'INSERT INTO treasure (id_user, code, quantity) VALUES (?, ?, 1)';
	private $stmITreasure = null;
	private const U_TREASURE = 'UPDATE treasure SET quantity = ? WHERE id_treasure = ?';
	private $stmUTreasure = null;
	private const Q_TREASURE = 'SELECT id_treasure, quantity FROM treasure WHERE id_user = ? AND code LIKE ?';
	private $stmQTreasure = null;

	private const Q_CODE = 'SELECT DISTINCT code FROM treasure WHERE code LIKE ? ORDER BY code DESC';
	private $stmQCode = null;

	private const Q_TREASURE_INFO = 'SELECT name, code, quantity FROM treasure JOIN user ON treasure.id_user = user.id_user WHERE code LIKE ? ORDER BY code';
	private $stmQTreasureInfo = null;

	/*
		Basic constructor.
	*/
	private function __construct()
	{
		try{
			$this->conn = new PDO('mysql:host=' . TreasureModel::SERVER . ':' . TreasureModel::PORT . ';dbname=' . TreasureModel::BD . '',
							TreasureModel::BD_USER,
							TreasureModel::BD_PASS,
							array(PDO::ATTR_PERSISTENT => true)
						);
			
			$this->stmIUser = $this->conn->prepare(TreasureModel::I_USER);
			$this->stmQUser = $this->conn->prepare(TreasureModel::Q_USER);
			$this->stmQUserId = $this->conn->prepare(TreasureModel::Q_USER_ID);
			$this->stmQAllUser = $this->conn->prepare(TreasureModel::Q_ALL_USER);

			$this->stmITreasure = $this->conn->prepare(TreasureModel::I_TREASURE);
			$this->stmUTreasure = $this->conn->prepare(TreasureModel::U_TREASURE);
			$this->stmQTreasure = $this->conn->prepare(TreasureModel::Q_TREASURE);

			$this->stmQCode = $this->conn->prepare(TreasureModel::Q_CODE);

			$this->stmQTreasureInfo = $this->conn->prepare(TreasureModel::Q_TREASURE_INFO);
		} catch(PDOException $e) {
			print "Error al abrir la conexión con la base de datos del sistema Museo: " . $e->getMessage() . "<br/>";
			die();
		}
	}

	/*
		Returns the model instance.
	*/
	public static function getInstance()
	{
		if(self::$instance === null)
		{
			self::$instance = new TreasureModel();
		}

		return self::$instance;
	}

	/*
		Close the model.
	*/
	public function close()
	{
		$this->stmIUser = null;
		$this->stmQUser = null;
		$this->stmQUserId = null;
		$this->stmQAllUser = null;

		$this->stmITreasure = null;
		$this->stmUTreasure = null;
		$this->stmQTreasure = null;

		$this->stmQCode = null;

		$this->stmQTreasureInfo = null;

		$this->conn = null;
		self::$instance = null;
	}

	/*
		Returns the connection status;
	*/
	public function getStatus()
	{
		return $this->conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);
	}

	/*
		Gets the user name by id.
		Params:
			$id: The user id.
		Return:
			The user name.
	*/
	public function getUserById($id)
	{
		$this->stmQUser->execute([$id]);
		$row = $this->stmQUser->fetch(PDO::FETCH_ASSOC);
		return $row['name'];
	}

	/*
		Gets the user id by its name.
		Params:
			$name: The user name.
		Return:
			The user id.
	*/
	public function getUserId($name)
	{
		$this->stmQUserId->execute([$name]);
		$row = $this->stmQUserId->fetch(PDO::FETCH_ASSOC);
		return $row['id_user'];
	}

	/*
		Gets the assoc array with all users.
		Return:
			The assoc array with all users name
	*/
	public function getAllUsers()
	{
		$this->stmQAllUser->execute();
		return $this->stmQAllUser->fetchAll(PDO::FETCH_ASSOC);
	}

	/*
		Adds an user.
		Params:
			$name: The user name.
	*/
	public function addUser($name)
	{
		$this->stmIUser->execute([$name]);
	}

	/*
		Adds a treasure.
		Params:
			$user: The user name.
			$code: The treasure code.
	*/
	public function addTreasure($user, $code)
	{
		$this->stmQUserId->execute([$user]);
		if($this->stmQUserId->rowCount() > 0)
		{
			$id = $this->stmQUserId->fetch(PDO::FETCH_ASSOC);
			$id = $id['id_user'];
		}else{
			$this->stmIUser->execute([$user]);
			$id = $this->conn->lastInsertId();
		}

		$this->stmQTreasure->execute([$id, $code]);
		if($this->stmQTreasure->rowCount() > 0)
		{
			$data = $this->stmQTreasure->fetch(PDO::FETCH_ASSOC);
			$this->stmUTreasure->execute([$data['quantity'] + 1, $data['id_treasure']]);
		}else{
			$this->stmITreasure->execute([$id, $code]);
		}
	}

	/*
		Returns all the treasures sended by the user that matches the code.
		Params:
			$user: The user name.
			$code: The treasure code. RRR_TTT_NNN_PPPP or any reduced version
		Return:
			All the treasures sended by the user that matches the code.
	*/
	public function getUserTreasures($user, $code)
	{
		$this->stmQUserId->execute([$user]);
		if($this->stmQUserId->rowCount() > 0)
		{
			$id = $this->stmQUserId->fetch(PDO::FETCH_ASSOC);
			$id = $id['id_user'];
			$this->stmQTreasure->execute([$id, $code . '%']);
			return $this->stmQTreasure->fetchAll(PDO::FETCH_ASSOC);
		}else{
			return array();
		}
	}

	/*
		Deletes all the treasures sended by the user.
		Params:
			$user: The user name.
	*/
	public function deleteUserTreasures($user)
	{
		$this->stmQUserId->execute([$user]);
		if($this->stmQUserId->rowCount() > 0)
		{
			$id = $this->stmQUserId->fetch(PDO::FETCH_ASSOC);
			$id = $id['id_user'];
			$this->conn->query('DELETE FROM treasure WHERE id_user = ' . $id);
		}
	}

	/*
		Deletes all the treasures.
	*/
	public function truncateTreasures()
	{
		$this->conn->query('DELETE FROM treasure');
	}

	/*
		Gets all the treasures that matchs the code or subcode.
		Params:
			$code: The treasure code. RRR_TTT_NNN_PPPP or any reduced version
		Return:
			All the distinct codes that matchs the code or subcode.
	*/
	public function getTreasuresByCode($code)
	{
		$this->stmQCode->execute([$code . '%']);
		return $this->stmQCode->fetchAll(PDO::FETCH_ASSOC);
	}

	/*
		Gets all the info of the treasures that matchs the code or subcode.
		Params:
			$code: The treasure code. RRR_TTT_NNN_PPPP or any reduced version
		Return:
			All the treasure data (user name, code and quantity) that matchs the code or subcode. Ordered by code.
	*/
	public function getFullTreasureInfo($code)
	{
		$this->stmQTreasureInfo->execute([$code . '%']);
		return $this->stmQTreasureInfo->fetchAll(PDO::FETCH_ASSOC);
	}
}