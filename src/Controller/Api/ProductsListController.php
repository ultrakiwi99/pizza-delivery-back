<?php


namespace App\Controller\Api;


use App\Products\ProductsListService;
use App\Entity\Category;
use App\Values\Currency\Euro;
use App\Values\Currency\Usd;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductsListController extends AbstractController
{
    private ProductsListService  $productsList;

    public function __construct()
    {
        $this->productsList = new ProductsListService($this->getDoctrine()->getConnection());
    }

    /**
     * @Route("/api/products", methods={"GET"}, name="app_api_products")
     * @return JsonResponse
     */
    public function productsList(): JsonResponse
    {

        return $this->json($categoriesAndProducts);
    }
}