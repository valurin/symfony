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
	protected $close = '0';

	/**
	* Get releaseOn
	* @return int
	*/

	public function getClose(){
		return $this->close;
	}

	/**
	* Set close
	* @param int $Close 
	* @return Ticket
	*/

	public function setClose($close){
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
	/**
	 * 
	 * @ORM\Column(type="integer")
	 */
	protected $numberReturn='0';

	/**
	* Get numberReturn
	* @return int
	*/

	public function getNumberReturn(){
		return $this->numberReturn;
	}

	/**
	* Set numberReturn
	* @param int $NumberReturn 
	* @return Ticket
	*/

	public function setNumberReturn($numberReturn){
		$this ->numberReturn = $numberReturn;
	}

	/*
	0	$machine	class::machine
	0	$personne	class::personne
	0	$type	class::Type
	1	$nb_red int

	*/






}
