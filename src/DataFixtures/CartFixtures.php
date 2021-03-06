<?php

namespace App\DataFixtures;

use App\Entity\Cart;
use App\Entity\Category;
use App\Entity\Color;
use App\Entity\Gallery;
use App\Entity\Product;
use App\Entity\ProductItem;
use App\Entity\Size;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CartFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('user@gmail.com');
        $user->setPassword('23abncH');
        $user->setFullName('User full name');
        $user->setPhoneNumber('0908855655');
        $user->setRoles(['ROLE_USER']);

        $category = new Category();
        $category->setName('Category name');

        $color = new Color();
        $color->setName('Color name');

        $size = new Size();
        $size->setValue('35');

        $firstProduct = new Product();
        $firstProduct->setCategory($category);
        $firstProduct->setColor($color);
        $firstProduct->setName('Product name 1');
        $firstProduct->setDescription('Product description 1');
        $firstProduct->setPrice(300000);

        $firstProductGallery = new Gallery();
        $firstProductGallery->setProduct($firstProduct);
        $firstProductGallery->setPath('first-cover.jpg');

        $firstProductItem = new ProductItem();
        $firstProductItem->setProduct($firstProduct);
        $firstProductItem->setSize($size);
        $firstProductItem->setAmount(10);

        $firstCartItem = new Cart();
        $firstCartItem->setProductItem($firstProductItem);
        $firstCartItem->setUser($user);
        $firstCartItem->setAmount(1);
        $firstCartItem->setPrice($firstProduct->getPrice());

        $manager->persist($firstCartItem);

        // Second product
        $secondProduct = new Product();
        $secondProduct->setCategory($category);
        $secondProduct->setColor($color);
        $secondProduct->setName('Product name 2');
        $secondProduct->setDescription('Product description 2');
        $secondProduct->setPrice(500000);

        $secondProductGallery = new Gallery();
        $secondProductGallery->setProduct($secondProduct);
        $secondProductGallery->setPath('second-cover.jpg');

        $secondProductItem = new ProductItem();
        $secondProductItem->setProduct($secondProduct);
        $secondProductItem->setSize($size);
        $secondProductItem->setAmount(5);

        $secondCartItem = new Cart();
        $secondCartItem->setProductItem($secondProductItem);
        $secondCartItem->setUser($user);
        $secondCartItem->setAmount(1);
        $secondCartItem->setPrice($secondProduct->getPrice());

        $manager->persist($secondCartItem);
        $manager->flush();
    }
}
