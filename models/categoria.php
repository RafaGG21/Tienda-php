<?php

class Categoria {
    private $id;
    private $nombre;

    private $db;

    public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

    public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * @param mixed $nombre 
	 * @return self
	 */
	public function setNombre($nombre): self {
		$this->nombre = $nombre;
		return $this;
	}

    public function __construct() {
        $this->db = Database::connect(); 
    }

    public function getCategorias() {
        $sql = "SELECT * FROM categorias";
        return $this->db->query($sql);
    }

    public function save($nombre) {
        $sql = "INSERT INTO categorias VALUES (null, '$nombre')";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        } 
        return $result;
    }
}