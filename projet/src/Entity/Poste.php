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
     * @ORM\JoinColumn(nullable=true)
     */
    private $batiment;


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




    public function getBatiment(): Batiment
    {
        return $this->batiment;
    }

    public function setBatiment(Category $batiment)
    {
        $this->batiment = $batiment;
    }
}
