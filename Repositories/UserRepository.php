<?php 
namespace Repositories;

use Models\User as User;

class UserRepository {
	
	private $userList = array();

	public function add(User $newUser){
		$this->retrieveData();
		array_push($this->userList, $newUser);
		$this->saveData();
	}

	public function getAll(){
		$this->retrieveData();
		return $this->userList;
	}
	/*public function delete($idUser){
		$this->retrieveData();
		$newList = array();
		foreach ($this->userList as $user) {
			if($user->getIdUser() != $idUser){
				array_push($newList, $user);
			}
		}

		$this->userList = $newList;
		$this->saveData();
	}*/

	public function saveData(){
		$arrayToEncode = array();

		foreach ($this->userList as $user) {
			$valueArray['idUser'] = $user->getIdUser();
			$valueArray['idProfile'] = $user->getIdProfile();
			$valueArray['email'] = $user->getEmail();
            $valueArray['password'] = $user->getPassword();

			array_push($arrayToEncode, $valueArray);

		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
		file_put_contents('./Data/user.json', $jsonContent);
	}

	public function retrieveData(){
		$this->userList = array();

		//$jsonPath = $this->GetJsonFilePath();

		 $jsonContent = file_get_contents('./Data/user.json');
		//$jsonContent = file_get_contents($jsonPath);
		
		$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

		foreach ($arrayToDecode as $valueArray) {
			$user = new User($valueArray['idUser'],$valueArray['idProfile'],$valueArray['email'],$valueArray['password']);
			
			array_push($this->userList, $user);
		}
	}

	//Es necesario para evitar los problemas de requires por el ruteo
    function GetJsonFilePath(){

        $initialPath = "Data/user.json";
        if(file_exists($initialPath)){
            $jsonFilePath = $initialPath;
        }else{
            $jsonFilePath = "../".$initialPath;
        }

        return $jsonFilePath;
    }
}

 ?>