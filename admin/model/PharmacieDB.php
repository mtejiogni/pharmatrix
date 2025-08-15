<?php
require_once 'Database.php';

class PharmacieDB {
    private $db;
    private $tablename;
    private $tableid;

    public function __construct() {
        $this->db= new Database();
        $this->tablename= 'pharmacie';
        $this->tableid= 'pharmacie_id';
    }

    public function create($name, $location, $phone) {
        $sql= "insert into $this->tablename set name=?, location=?, phone=?";
        $params= array($name, $location, $phone);
        $this->db->prepare($sql, $params);
    }

    public function update($id, $name, $location, $phone) {
        $sql= "update $this->tablename set name=?, location=?, phone=? where $this->tableid=?";
        $params= array($name, $location, $phone, $id);
        $this->db->prepare($sql, $params);
    }

    public function delete($id) {
        $sql= "delete from $this->tablename where $this->tableid=?";
        $params= array($id);
        $this->db->prepare($sql, $params);
    }

    public function read($id) {
        $sql= "select * from $this->tablename where $this->tableid=?";
        $params= array($id);
        $req= $this->db->prepare($sql, $params);
        return $this->db->getDatas($req, true);
    }

    public function readAll() {
        $sql= "select * from $this->tablename order by $this->tableid desc";
        $params= null;
        $req= $this->db->prepare($sql, $params);
        return $this->db->getDatas($req, false);
    }
}

?>