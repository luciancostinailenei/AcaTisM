<?php

// src/Acatism/MainBundle/Document/Project.php

namespace Acatism\MainBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Acatism\MainBundle\Document\Project
 * @MongoDB\Document
 */
class Project
{

    /**
    * @MongoDB\Id(strategy="AUTO")
    */

    protected $id;

    /**
    * @MongoDB\Field(type="string")
    * @Assert\NotBlank()
    * @Assert\Length(max = 500)
    */
    protected $name;

    /**
    * @MongoDB\Field(type="string")
    * @Assert\NotBlank()
    */

    protected $description;


    /**
     * @MongoDB\ReferenceOne(targetDocument="Acatism\AuthenticationBundle\Document\User")
     */
    protected $prof;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prof
     *
     * @param Acatism\AuthenticationBundle\Document\User $prof
     * @return self
     */
    public function setProf(\Acatism\AuthenticationBundle\Document\User $prof)
    {
        $this->prof = $prof;
        return $this;
    }

    /**
     * Get prof
     *
     * @return Acatism\AuthenticationBundle\Document\User $prof
     */
    public function getProf()
    {
        return $this->prof;
    }
}
