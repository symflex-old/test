<?php

namespace App\DataFixtures;

use App\Entity\Master;
use App\Entity\Slave;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 20; ++$i) {
            $name = 'slave ' . $i;

            $gender = array_rand(Slave::GENDER, 1);
            $color = array_rand(Slave::COLORS, 1);
            $weight = 10 + $i;
            $age = 40 + $i;
            $location = 'location ' . $i;
            $price = 10 + $i;
            $priceHourlyLease = 10 + $i;
            $description = 'description ' . $i;

            $slave = new Slave(
                $name,
                $age,
                $gender,
                $color,
                $weight,
                $price,
                $priceHourlyLease,
                $location,
                $description
            );

            $manager->persist($slave);

        }

        for ($i = 1; $i < 5; ++$i) {
            $name = 'master ' . $i;
            $isVip = (bool)random_int(0, 1);
            $master = new Master($name, $isVip);

            $manager->persist($master);
        }

        $manager->flush();
    }
}
