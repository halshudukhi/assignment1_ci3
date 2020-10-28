<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entity extends CI_Controller {
        
	public function retrieveParents()
	{
                $this->load->model('entityModel', '', TRUE);
                
                $entities = $this->entityModel->retrieveParents();

                echo json_encode($entities);
        }
        
        public function generateChildren()
        {
                $subCats = $this->namingSubs($_POST['parent']);

                $this->load->model('entityModel', '', TRUE);

                $children = $this->entityModel->generateAndPullChildren($subCats);

                echo json_encode($children);
        }

        private function namingSubs($key)
        {
                $initialSubCreation = true;

                $subCat = "SUB $key";

                $keyAsArray = explode(' ', $subCat);

                if(isset($keyAsArray[0]) && isset($keyAsArray[1]) && $keyAsArray[0] == $keyAsArray[1])
                {
                        $initialSubCreation = false;
                }

                $subCats = [
                        [
                                'name' => $initialSubCreation? $subCat . '1' : $subCat . '-1',
                                'is_sub_category' => 1
                        ],
                        [
                                'name' => $initialSubCreation? $subCat . '2' : $subCat . '-2',
                                'is_sub_category' => 1
                        ]
                ];

                return $subCats;
        }
}