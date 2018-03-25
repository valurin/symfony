<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * 
	 * @ORM\Column(type="text", length=255)
	 */
	protected $firstName;
	
	/**
     * 
	 * @ORM\Column(type="text", length=255)
	 */
	protected $lastName;
	
	/**
     * 
	 * @ORM\Column(type="text", length=255)
	 */
	protected $username;
	
	/**
     * 
	 * @ORM\Column(type="text", length=255)
	 */
	protected $password;

	/**
     * 
	 * @ORM\Column(type="text", length=255)
	 */
	protected $role;



	public function getId(){
		return $this->id;
	}
	
	public function getFirstName(){
		return $this->firstName;
	}

	public function setFirstName($name){
		$this->firstName = $name;
	}
	
	public function getLastName(){
		return $this->lastName;
	}

	public function setLastName($name){
		$this->lastName = $name;
	}
	
	public function getUsername(){
		return $this->username;
	}

	public function setUsername($user){
		$this->username = $user;
	}
	
	public function getPassword(){
		return $this->password;
	}

	public function setPassword($pass){
		$this->password = $pass;
	}

	public function getRole(){
		return $this->role;
	}
	public function setRole($role){
		$this->role = $role;
	}
	
	
	public function getSalt(){
		return null;
	}


	public function getRoles(){
		return array($this->role);
	}
	public function eraseCredentials(){

	}
	
	
	
	
	
}
