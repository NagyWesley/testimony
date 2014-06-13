<?php

namespace Application\Service;

use Zend\Crypt\Password\Apache;

class User
{
    /*
     * @var \Doctrine\ORM\EntityManager
     */

    private $_em;

    public function __construct($entityManager)
    {
        $this->_em = $entityManager;
    }

    public function saveUser($params)
    {

        $user = new \Application\Entity\User();
        
        $user->setUser_name($params['userName']);
        $user->setFull_name($params['fullname']);
        $user->setEmail($params['email']);
        $encryptedPassword = $this->encryptPassword($params['password']);
        $user->setPassword($encryptedPassword);
        $user->setRole(\Application\Entity\User::User);
        $user->setStatus(\Application\Entity\User::Active);

        $this->_em->persist($user);
        $this->_em->flush();
        return $user;
    }

    private function encryptPassword($password)
    {
        return md5($password);
//        $bcrypt = new Apache(array(
//            'format' => 'md5'
//        ));
//        $securePass = $bcrypt->create($password);
//        return $securePass;
    }

    public function getUsers()
    {
        $con = $this->_em->getConnection();
        $sql = "SELECT id,full_name,email,status,role FROM User";
        $stmt = $con->query($sql);
        $users = $stmt->fetchAll();

        return $users;
    }

    public function getUser($userName)
    {
         $qb = $this->_em->createQueryBuilder();

        $qb->add('select', 'u')
                ->add('from', 'Application\Entity\User u')
                 ->add('where', 'u.user_name = ?1')
                ->setParameter(1, $userName);
        
        $query = $qb->getQuery();
        $user = $query->getSingleResult();
        return $user;
    }

}
