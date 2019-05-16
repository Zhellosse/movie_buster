<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Votre nom ne peut contenir moins de {{ limit }} lettres",
     *      maxMessage = "Votre nom ne peut contenir plus de {{ limit }} lettres"
     * )
     */
    protected $name;

    /**
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    protected $email;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "Votre message ne peut contenir moins de {{ limit }} lettres",
     *      maxMessage = "Votre message ne peut contenir plus de {{ limit }} lettres"
     * )
     */
    protected $content;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    } 
    
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
}
