<?php

namespace Application\Service;

class Testimony
{
    /*
     * @var \Doctrine\ORM\EntityManager
     */

    private $_em;

    public function __construct($entityManager)
    {
        $this->_em = $entityManager;
    }

    public function getTestimonies($limit = null)
    {

        $qb = $this->_em->createQueryBuilder();

        $qb->add('select', 't')
                ->add('from', 'Application\Entity\Testimony t')
                ->add('orderBy', 't.id DESC')
                ->add('where', 't.status != 2')
//                ->add('or where', 't.status =  0')
                ->setMaxResults($limit);

        $query = $qb->getQuery();
//        var_dump($query);die;
        $tests = $query->getArrayResult();
        return $tests;
    }

    public function saveTestimony($params)
    {

        $date = new \Zend\Stdlib\DateTime('now');
        $test = new \Application\Entity\Testimony();
        $test->setTitle($params['title']);
        $test->setContent($params['content']);
        $test->setCreated($date);
        $test->setStatus(\Application\Entity\Testimony::temp);
        $test->setAuthor($params['author']);

        $this->_em->persist($test);
        $this->_em->flush();
        return $test;
    }

    public function getTestimony($id)
    {
        $test = $this->_em->find('Application\Entity\Testimony', $id);
        
        
        return $this->getTestimonyArray($test);
    }
    
    private function getTestimonyArray($test)
    {
        $temp =array();
        
        $temp['Author'] = $test->getAuthor()->getUser_name();
        $temp['created']= $test->getCreated();
        $temp['title']= $test->getTitle();
        $temp['content']= $test->getContent();
        $temp['status']= $test->getStatus();
        return array( 0 =>$temp);
    }

}
