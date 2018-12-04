<?php

namespace EventBundle\Repository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends \Doctrine\ORM\EntityRepository
{
    public function mefind($name){
        $query=$this->getEntityManager()
            ->createQuery("select m from EventBundle:Event m where m.nomevent like :name ");
        $query->setParameter(":name",'%'.$name.'%');
        return $query->getResult();
    }
    public function myFindByNewDate()
    {
        $query  = $this->getEntityManager()->createQuery("SELECT R FROM EventBundle:Event R WHERE R.dateevent > :today")
            ->setParameter("today", new \DateTime());
        return $query->getResult();
    }
    public function myfindByOldDate()
    {
        $query  = $this->getEntityManager()->createQuery("SELECT R FROM ExcursionBundle:Event R WHERE R.dateevent < :today")
            ->setParameter("today", new \DateTime());
        return $query->getResult();
    }
    public function countNewEvent()
    {
        $query  = $this->getEntityManager()->createQuery("SELECT count(R.idevent) as nm FROM EventBundle:Event R WHERE R.dateevent > :today")
            ->setParameter("today", new \DateTime());
        return $query->getResult();
    }

    public function countOldEvent()
    {
        $query  = $this->getEntityManager()->createQuery("SELECT count(R.idevent) as nm FROM EventBundle:Event R WHERE R.dateevent <= :today")
            ->setParameter("today", new \DateTime());
        return $query->getResult();
    }

    public function countAllEvent()
    {
        $query  = $this->getEntityManager()->createQuery("SELECT count(R.idevent) as nm FROM EventBundle:Event R");
        return $query->getResult();
    }
    public function getAllAboutEvent($id)
    {
        $query  = $this->getEntityManager()->createQuery("SELECT R FROM EventBundle:Event R WHERE R.idevent = :id");
        $query->setParameter('id', $id);
        return $query->getResult();
    }

    public function getAllMyEvents($idUser)
    {
        $query  = $this->getEntityManager()->createQuery("SELECT R.idevent FROM EventBundle:Reservationevent R WHERE R.idclient = :id");
        $query->setParameter('id', $idUser);
        return $query->getResult();
    }

    public function myFindEvent($idEvent)
    {
        $query  = $this->getEntityManager()->createQuery("SELECT R FROM EventBundle:Event R WHERE R.idevent IN (:id)");
        $query->setParameter(':id', $idEvent);
        return $query->getResult();
    }


    public function topEvent()
    { //CURRENT_TIMESTAMP()
        $query  = $this->getEntityManager()
            ->createQuery('SELECT R FROM EventBundle:Event R WHERE R.nbrepersonnes=
                               (SELECT MAX(C.nbrepersonnes) FROM EventBundle:Event C where (C.dateevent) > CURRENT_TIMESTAMP() )');
        return $query->getResult();
    }

    public function gainOld()
    {
        $query  = $this->getEntityManager()
            ->createQuery('SELECT R FROM EventBundle:Event R WHERE NOT(R.nbrepersonnes=0) AND (R.dateevent) < CURRENT_TIMESTAMP()');
        return $query->getResult();
    }

    public function gainNew()
    {
        $query  = $this->getEntityManager()
            ->createQuery('SELECT R FROM EventBundle:Event R WHERE NOT(R.nbrepersonnes=0) AND (R.dateevent) > CURRENT_TIMESTAMP()');
        return $query->getResult();
    }

}
