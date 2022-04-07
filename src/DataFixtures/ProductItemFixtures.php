<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Color;
use App\Entity\Gallery;
use App\Entity\Product;
use App\Entity\ProductItem;
use App\Entity\Size;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductItemFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Category name');
        $category->setCreateAt(new \DateTime("now"));

        $color = new Color();
        $color->setName('Color name');
        $color->setCreateAt(new \DateTime("now"));

        $size = new Size();
        $size->setValue('35');
        $size->setCreateAt(new \DateTime("now"));

        $firstProduct = new Product();
        $firstProduct->setCategory($category);
        $firstProduct->setColor($color);
        $firstProduct->setName('Product name 1');
        $firstProduct->setDescription('Product description 1');
        $firstProduct->setPrice(300000);
        $firstProduct->setCreateAt(new \DateTime("now"));

        $firstProductGallery = new Gallery();
        $firstProductGallery->setProduct($firstProduct);
        $firstProductGallery->setPath('first-cover.jpg');
        $firstProductGallery->setCreateAt(new \DateTime("now"));

        $firstProductItem = new ProductItem();
        $firstProductItem->setProduct($firstProduct);
        $firstProductItem->setSize($size);
        $firstProductItem->setAmount(10);
        $firstProductItem->setCreateAt(new \DateTime("now"));

        $manager->persist($firstProductItem);

        // Second product
        $secondProduct = new Product();
        $secondProduct->setCategory($category);
        $secondProduct->setColor($color);
        $secondProduct->setName('Product name 2');
        $secondProduct->setDescription('Product description 2');
        $secondProduct->setPrice(500000);
        $secondProduct->setCreateAt(new \DateTime("now"));

        $secondProductGallery = new Gallery();
        $secondProductGallery->setProduct($secondProduct);
        $secondProductGallery->setPath('second-cover.jpg');
        $secondProductGallery->setCreateAt(new \DateTime("now"));

        $secondProductItem = new ProductItem();
        $secondProductItem->setProduct($secondProduct);
        $secondProductItem->setSize($size);
        $secondProductItem->setAmount(5);
        $secondProductItem->setCreateAt(new \DateTime("now"));

        $manager->persist($secondProductItem);
        $manager->flush();
    }
}