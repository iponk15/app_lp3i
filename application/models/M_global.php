<?php

class M_global extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	
	public function get( $table, $join = NULL, $where = NULL, $select = '*', $where_e = NULL, $order = NULL, $start = 0, $tampil = NULL, $group = NULL, $array = null ){
        
		// mulai m_global get data
		$this->db->select($select)->from($table);

        if ( ! is_null( $join ) )
        {
            foreach ($join as $key => $value) {
                $tipe = ( @$value[2] != '' ) ? $value[2] : 'INNER';
                $this->db->join( $value[0], $value[1], $tipe );
            }
        }

        if( ! is_null( $order )){
            if(is_array($order[0])){
                foreach ($order as $key => $value) {
                    $this->db->order_by( $value[0], $value[1]);
                }
            }else{
                $this->db->order_by( $order[0], $order[1]);
            }
              
        } 
        ( ! is_null( $tampil ) 
            ? $this->db->limit( $tampil, $start) 
            : ''
        );
        ( ! is_null( $where ) 
            ? $this->db->where( $where) 
            : ''
        );
        ( ! is_null( $where_e ) 
            ? $this->db->where( $where_e, NULL, FALSE) 
            : ''
        );
        ( ! is_null( $group ) 
            ? $this->db->group_by( $group, NULL, FALSE) 
            : ''
        );

        $query  = $this->db->get();

        $err = $this->db->error();
        if ( $err['code'] != 0 ) {
            pre('lastdb');
            pre($err, 1);
        }

        ( ! is_null( $array ) 
            ? $result = $query->result_array()
            : $result = $query->result()
        );
        
        return $result;
    }
	
	public function insert( $table, $data = NULL )
    {
        $result    = $this->db->insert( $table, $data );

        if ( $result == TRUE )
        {
            $result             = [];
            $result['status']   = TRUE;
            $result['id']       = $this->db->insert_id();
        }
            else
        {
            $result             = [];
            $result['status']   = FALSE;
        }

        return $result;
    }

    public function update( $table, $data = NULL, $where = NULL, $where_e = NULL )
    {
        ( ! is_null($where_e) 
            ? $this->db->where($where_e, NULL, FALSE) 
            : ''
        );

        $result    = $this->db->update( $table, $data, $where );

        return $result;
    }

    public function delete( $table, $where = NULL, $where_e = NULL )
    {
        ( ! is_null($where_e) 
            ? $this->db->where($where_e, NULL, FALSE) 
            : ''
        );

        $result    = $this->db->delete( $table, $where );

        return $result;
    }
	
}