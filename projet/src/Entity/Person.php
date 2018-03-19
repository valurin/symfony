<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
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
	protected $userName;
	
	/**
     * 
	 * @ORM\Column(type="text", length=255)
	 */
	protected $password;


	/**
	* Get Id
	* @return integer
	*/
	public function getId(){
		return $this->id;
	}
	
	/**
	* Get firstName
	* @return string
	*/
	public function getFirstName(){
		return $this->name;
	}

	/**
	* Set firstName
	* @param string $name
	* @return Person
	*/
	public function setFirstName($name){
		$this ->firstName = $name;
	}
	
	/**
	* Get lastName
	* @return string
	*/
	public function getLastName(){
		return $this->lastName;
	}

	/**
	* Set lastName
	* @param string $name
	* @return Person
	*/
	public function setLastName($name){
		$this ->lastName = $name;
	}
	
	/**
	* Get userName
	* @return string
	*/
	public function getUserName(){
		return $this->userName;
	}

	/**
	* Set userName
	* @param string $name
	* @return Person
	*/
	public function setUserName($user){
		$this ->userName = $user;
	}
	
	/**
	* Get password
	* @return string
	*/
	public function getPassword(){
		return $this->password;
	}

	/**
	* Set userName
	* @param string $name
	* @return Person
	*/
	public function setPassword($pass){
		$this ->password = $pass;
	}
	
	
	
	
	
	
	
	
	
	
	
	
}
