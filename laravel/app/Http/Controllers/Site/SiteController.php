<?php

namespace App\Http\Controllers\Site;

use App\Modules\Seos\SeoService;
use App\Http\Controllers\Controller;
use App\Modules\Brands\BrandService;
use App\Modules\Banners\BannerService;
use App\Modules\Comments\CommentService;
use App\Modules\Products\ProductService;

class SiteController extends Controller
{
    public function __construct(
        SeoService $seo_service,
        CommentService $comment_service,
        BannerService $banner_service,
        ProductService $product_service,
        BrandService $brand_service
    ) {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $this->seo_service = $seo_service;
        $this->comment_service = $comment_service;
        $this->banner_service = $banner_service;
        $this->product_service = $product_service;
        $this->brand_service = $brand_service;
    }

    public function index()
    {
        $seo = $this->seo_service->model
            ->where('slug', 'index')
            ->first()
            ->load('image');

        // take(10)->orderBy('id', 'desc')
        $comments = $this->comment_service->model->get()->load('image');
        // dd($comments->toArray());

        $banners = $this->banner_service->model->take(2)->orderBy('id', 'desc')->get()->load('image');
        // dd($banners->toArray());

        $products = $this->product_service->model->take(3)->orderBy('id', 'desc')->get()->load('image');

        if(isset($products)){
            foreach ($products as $product) {
                $product->price = str_replace('.', ',', $product->price);
                $product->promo_price = str_replace('.', ',', $product->promo_price);
            }
        }

        // dd($products->toArray());

        $brands = $this->brand_service->model->get()->load('image');
        // dd($brands->toArray());

        return view(('site.index.index'), compact('seo', 'comments', 'banners', 'products', "brands"));
    }

    public function contact()
    {
        $seo = $this->seo_service->model
            ->where('slug', 'index')
            ->first()
            ->load('image');

        return view(('site.contact.index'), compact('seo'));
    }

    public function products()
    {
        $seo = $this->seo_service->model
            ->where('slug', 'index')
            ->first()
            ->load('image');

        $products = $this->product_service->model->get()->load('brand');

         if(isset($products)){
            foreach ($products as $product) {
                $product->price = str_replace('.', ',', $product->price);
                $product->promo_price = str_replace('.', ',', $product->promo_price);
            }
        }

        // dd($products->toArray());

        return view(('site.products.index'), compact('seo', 'products'));
    }

    public function product($slug, $id)
    {
   
        $seo = $this->seo_service->model
            ->where('slug', 'index')
            ->first()
            ->load('image');
    

        $product = $this->product_service->model
            ->where('slug', $slug)
            ->where('id', $id)
            ->with('images')
            ->firstOrFail(); 
            $product->price = str_replace('.', ',', $product->price);
            $product->promo_price = str_replace('.', ',', $product->promo_price);
         
        // dd($product->toArray());    
    
        return view('site.product.index', compact('seo', 'product'));
    }

}
