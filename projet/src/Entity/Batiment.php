<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BatimentRepository")
 */
class Batiment
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
     * @ORM\OneToMany(targetEntity="App\Entity\Poste", mappedBy="batiment")
     */
    private $postes;

    public function __construct()
    {
        $this ->postes = new ArrayCollection();
    }
    /**
     * @return Collection|Poste[]
     */
    public function getPostes()
    {
        return $this->postes;
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
}
