<?php


namespace App\Controller\Api;


use App\Entity\Category;
use App\Values\Currency\Euro;
use App\Values\Currency\Usd;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    /**
     * @Route("/api/products", methods={"GET"}, name="app_api_products")
     * @return JsonResponse
     */
    public function products(): JsonResponse
    {
        $categories = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Category::class)
            ->findAll();

        $categoriesAndProducts = [];

        /** @var Category $category */
        foreach ($categories as $category) {
            $categoryInfo = [];
            $categoryInfo['name'] = $category->name();
            foreach ($category->products() as $product) {
                $categoryInfo['products'][] = [
                    'name' => $product->name(),
                    'priceEur' => (new Euro($product->price()))->value(),
                    'priceUsd' => (new Usd($product->price()))->value()
                ];
            }

            $categoriesAndProducts[] = $categoryInfo;
        }

        return $this->json($categoriesAndProducts);
    }
}