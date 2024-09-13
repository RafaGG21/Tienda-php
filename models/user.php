<?php
 
class User {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $imagen;
    private $rol;
    private $db;

    public function __construct() {
        $this->db = Database::connect(); 
    }
	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 * @return mixed
	 */
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * @param mixed $nombre 
	 * @return self
	 */
	public function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}
	
	/**
	 * @return mixed
	 */
	public function getApellidos() {
		return $this->apellidos;
	}
	
	/**
	 * @param mixed $apellidos 
	 * @return self
	 */
	public function setApellidos($apellidos){
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}
	
	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}
	
	/**
	 * @return mixed
	 */
	public function getPassword() {
		return password_hash ($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}
	
	/**
	 * @param mixed $password 
	 * @return self
	 */
	public function setPassword($password) {
		$this->password = $password;
	}
	
	/**
	 * @return mixed
	 */
	public function getImagen() {
		return $this->imagen;
	}
	
	/**
	 * @param mixed $imagen 
	 * @return self
	 */
	public function setImagen($imagen) {
		$this->imagen = $this->db->real_escape_string($imagen);
	}
	
	/**
	 * @return mixed
	 */
	public function getRol() {
		return $this->rol;
	}
	
	/**
	 * @param mixed $rol 
	 * @return self
	 */
	public function setRol($rol) {
		$this->rol = $this->db->real_escape_string($rol);
	}

    public function save() {
        $sql = "INSERT INTO usuarios VALUES (null, '{$this->getNombre()}' , '{$this->getApellidos()}', 
        '{$this->getEmail()}', '{$this->getPassword()}' , 'user', null)";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        } 
        return $result;
    }

	public function login() {
		$result = false;
		$email = $this->email;
		$password = $this->password;
        $sql = "SELECT * FROM usuarios WHERE email = '{$email}' ";
        $login = $this->db->query($sql);

        if ($login) {
			$usuario = $login->fetch_object();
            $verify = password_verify($password, $usuario->password);

			if ($verify) {
				$result = $usuario;
			}
        } 
		
		return $result;
    }

}