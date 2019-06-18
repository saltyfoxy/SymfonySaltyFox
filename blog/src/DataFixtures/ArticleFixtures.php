<?php


namespace App\DataFixtures;


use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;


class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('en_FR');
        for ($i=0; $i<50 ; $i++) {
            $article = new Article();
            $article->setTitle(mb_strtolower($faker->catchPhrase));
            $article->setCategory($this->getReference('categorie_' . $faker->numberBetween(0, 4)));
            $article->setContent($faker->realText($maxNbChars = 100, $indexSize = 2));
            $manager->persist($article);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}