<?php

class EntityModel extends CI_Model {

	public function retrieveParents()
	{
                $result = [];

                try
                {
                        $this->db->cache_on();

                        $sql = "SELECT `*` FROM `entity` WHERE `is_active` = ? AND `is_sub_category` = ?";

                        $query = $this->db->query($sql, [1, 0]);

                        $result = $query->result();
                }
                catch(Excpetion $e)
                {
                        $result = [];
                }

                return $result;
        }
        

        public function generateAndPullChildren($subCats)
        {
                $result = [];
                $this->db->db_debug = FALSE;
                try
                {
                        $this->db->insert_batch('entity', $subCats);
                        $likeData = substr($subCats[0]['name'], 0, -1);
                }
                catch(Exception $e)
                {
                        $likeDataExploded = explode(' ', substr($subCats[0]['name'], 0, -1));
                        unset($likeDataExploded[0]);
                        $likeData = implode(' ', $likeDataExploded);
                }
                
                try
                {
                        $this->db->cache_on();
                        
                        $sql = "SELECT `*` FROM `entity` WHERE `is_active` = ? AND `is_sub_category` = ? AND `name` LIKE ?";
                
                        $query = $this->db->query($sql, [1, 1, "$likeData%"]);

                        $result = $query->result();
                }
                catch(Exception $e)
                {
                        $result = [];
                }

                return $result;
        }
}