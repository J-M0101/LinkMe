<?php
class Business
{
    private string $firstName;
    private string $lastName;
    private $businessName;
    private $role;
    private $password;
    private $email;

    /**
     * @param $firstName
     * @param $lastName
     * @param $businessName
     * @param $role
     * @param $password
     * @param $email
     */

    public function __construct($firstName, $lastName, $businessName, $role, $password,$email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->businessName = $businessName;
        $this->role = $role;
        $this->password = $password;
        $this->email= $email;
    }

    /**
     * @return $businessName
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }
    
    /**
     * @param mixed $businessName
     */
    public function setBusinessName($businessName): void
    {
        $this->businessName= $businessName;
    }

    /**
     * @return $firstName and $lastName
     */
    public function getFullName() :string { //used for login
        return $this->firstName . " " . $this->lastName;
    }

    /**
     * @return string $firstName
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed $password
     */
    public function getPassword()
    {
        return $this->password;
    }

     /**
     * @return mixed $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }
}
?>