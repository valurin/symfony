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

	/*
	1	$id
	0	$machine	class::machine
	0	$personne	class::personne
	1	$date (rele) DateTime
	1	$descr	varchar2()
	1	$close	bool
	0	$type	class::Type
	1	$urg	int
	1	$nb_red int

	*/






}
