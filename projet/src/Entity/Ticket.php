<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
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
	protected $name;

	/**
	* Get name
	* @return string
	*/
	public function getName(){
		return $this->name;
	}

	/**
	* Set name
	* @param string $name
	* @return Ticket
	*/
	public function setName($name){
		$this ->name = $name;
	}

	/**
	 * 
	 * @ORM\Column(type="datetime")
	 */
	protected $releaseOn;

	/**
	* Get releaseOn
	* @return date
	*/

	public function getReleaseOn(){
		return $this->releaseOn;
	}

	/**
	* Set releaseOn
	* @param date $releaseOn 
	* @return Ticket
	*/

	public function setReleaseOn(\DateTime $releaseOn = null){
		$this ->releaseOn = $releaseOn;
	}
	/**
	 * 
	 * @ORM\Column(type="boolean")
	 */
	protected $close;

	/**
	* Get releaseOn
	* @return string
	*/

	public function getClose(){
		return $this->close;
	}

	/**
	* Set close
	* @param string $Close 
	* @return Ticket
	*/

	public function setClose($close = 0){
		$this ->close = $close;
	}
	/**
	 * 
	 * @ORM\Column(type="text", length=255)
	 */
	protected $description;

	/**
	* Get description
	* @return string
	*/

	public function getDescription(){
		return $this->description;
	}

	/**
	* Set description
	* @param string $Description 
	* @return Ticket
	*/

	public function setDescription($description){
		$this ->description = $description;
	}







	/**
	 * 
	 * @ORM\Column(type="integer")
	 */
	protected $urgence;

	/**
	* Get urgence
	* @return int
	*/

	public function getUrgence(){
		return $this->urgence;
	}

	/**
	* Set urgence
	* @param int $Urgence 
	* @return Ticket
	*/

	public function setUrgence($urgence){
		$this ->urgence = $urgence;
	}



	/*
	0	$machine	class::machine
	0	$personne	class::personne
	1	$descr	varchar2()
	0	$type	class::Type
	1	$urg	int
	1	$nb_red int

	*/






}
