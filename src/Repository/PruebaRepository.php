<?php

namespace App\Repository;

use App\Entity\Prueba;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;





/**
 * @method Prueba|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prueba|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prueba[]    findAll()
 * @method Prueba[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PruebaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prueba::class);
    }


    
    public function consulta($nombre,$clave){

        $qb = $this->createQueryBuilder('p')
        ->where('p.nombre = :nombre and p.clave = :clave')
        ->setParameter('nombre', $nombre)
        ->setParameter('clave', $clave);

        $query = $qb->getQuery();

        return $query->execute();
    }



    public function consulta_sql($nombre,$clave)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Prueba p
            WHERE p.nombre = :nombre and p.clave = :clave' 
        )->setParameter('nombre', $nombre)->setParameter('clave', $clave);

        return $query->getResult();
    }

    // /**
    //  * @return Prueba[] Returns an array of Prueba objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Prueba
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
