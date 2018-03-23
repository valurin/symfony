<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PosteRepository")
 */
class Poste
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Batiment", inversedBy="postes")
     */
    private $batiment;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="postes")
     */
    private $ticket;

        public function __construct()
    {
        $this ->tickets = new ArrayCollection();
    }
    /**
     * @return Collection|Poste[]
     */
    public function getTickets()
    {
        return $this->tickets;
    }



    /**
	* Get id
	* @return int
	*/
	public function getId(){
		return $this->id;
	}

    

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

    // add your own fields




    public function getBatiment()
    {
        return $this->batiment;
    }

    public function setBatiment(Batiment $batiment)
    {
        $this->batiment = $batiment;
    }

    public function __toString(){
		return $this->batiment->getName()." - ".$this->name;
	}
	
}
