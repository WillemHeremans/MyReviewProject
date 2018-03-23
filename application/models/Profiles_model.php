<?php 
   Class Profiles_model extends CI_Model { 
	
      public function __construct() 
      { 
        $this->load->database(); 
      } 
      public function get_profiles($pseudo = FALSE)
      {
      if ($pseudo === FALSE)
      {
              $query = $this->db->get('profils');
              return $query->result_array();
      }

      $query = $this->db->get_where('profils', array('pseudo' => $pseudo));
      return $query->row_array();
      }
   } 
?> 