<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=254)
     */
    protected $type;

    /**
	* Get type
	* @return string
	*/
	public function getType(){
		return $this->type;
	}

	/**
	* Set type
	* @param string $type
	* @return Ticket
	*/
	public function setType($type){
		$this ->type = $type;
	}

    // add your own fields
}
