<?php 
namespace Repositories;

use Models\Profile as Profile;

class ProfileRepository {
	
	private $profileList = array();

	public function add(Profile $newProfile){
		$this->retrieveData();
		array_push($this->profileList, $newProfile);
		$this->saveData();
	}

	public function getAll(){
		$this->retrieveData();
		return $this->profileList;
	}
	/*public function delete($idProfile){
		$this->retrieveData();
		$newList = array();
		foreach ($this->profileList as $profile) {
			if($profile->getIdProfile() != $idProfile){
				array_push($newList, $profile);
			}
		}

		$this->profileList = $newList;
		$this->saveData();
	}*/

	public function saveData(){
		$arrayToEncode = array();

		foreach ($this->profileList as $profile) {
			$valueArray['idProfile'] = $profile->getIdProfile();
			$valueArray['firstName'] = $profile->getFirstName();
			$valueArray['lastName'] = $profile->getLastName();
            $valueArray['dni'] = $profile->getDni();

			array_push($arrayToEncode, $valueArray);

		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
		file_put_contents('./Data/profile.json', $jsonContent);
	}

	public function retrieveData(){
		$this->profileList = array();

		//$jsonPath = $this->GetJsonFilePath();

		 $jsonContent = file_get_contents('./Data/profile.json');
		//$jsonContent = file_get_contents($jsonPath);
		
		$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

		foreach ($arrayToDecode as $valueArray) {
			$profile = new Profile($valueArray['idProfile'],$valueArray['firstName'],$valueArray['lastName'],$valueArray['dni']);
			
			array_push($this->profileList, $profile);
		}
	}

	//Es necesario para evitar los problemas de requires por el ruteo
    function GetJsonFilePath(){

        $initialPath = "Data/profile.json";
        if(file_exists($initialPath)){
            $jsonFilePath = $initialPath;
        }else{
            $jsonFilePath = "../".$initialPath;
        }

        return $jsonFilePath;
    }
}

 ?>