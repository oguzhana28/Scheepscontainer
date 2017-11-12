<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    function __construct() {
        $this->userTbl = 'users';
    }
    /*
     * get rows from the users table
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $query->num_rows();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
            }else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        var_dump($result);
        //return fetched data
        return $result;
    }
    function getShips(){
        $this->db->select('*');
        $this->db->from('ships');
        $this->db->join('routes', 'ships.id = routes.ship_id', 'left');
        $query = $this->db->get();
        $ships = $query->result_array();
        return $ships;
        }
    
    /*
     * Insert user information
     */
    public function insert($data = array()) {
        //add created and modified data if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }
        public function insertBoat($data = array(),$route = array()) {
        //add created and modified data if not include
        
        //insert user data to users table
        $insertBoat = $this->db->insert('ships', $data);
        $insertRout = $this->db->insert('routes', $route);
        
        //return the status
        if($insertBoat && $insertRout){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    public function deleteBoat($d){
        $this->db->where('id', $d);
        $this->db->delete('ships');
    }
    public function getDataBoat($d){
        $this->db->select('*');
        $this->db->from('ships');
        $this->db->where('id' , $d);
        $query = $this->db->get();
        $boat = $query->result_array();
        return $boat;
        
    }    
    public function updateBoat($d , $POST){

        $this->db->where('id' , $d);
        $this->db->update('ships' , $POST);
        $query = $this->db->get();
        $boat = $query->result_array();
        return $boat;
        
    }

}