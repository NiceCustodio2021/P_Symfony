<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setPrenom('Stef')
            ->setNom('BK')
            ->setAge(50)
            ->setUsername('stefbk')
            ->setEmail('stef@stef.com')
            ->setPassword($this->hasher->hashPassword($user,'Mdp'))
            ->setRoles(["ROLE_ADMIN"])
            ->setVille('VALENCE');

        $manager->persist($user);

        $manager->flush();
    }
}
