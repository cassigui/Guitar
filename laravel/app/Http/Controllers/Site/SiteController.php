<?php

namespace App\Http\Controllers\Site;

use App\Modules\Seos\SeoService;
use App\Http\Controllers\Controller;
use App\Modules\Banners\BannerService;
use App\Modules\Comments\CommentService;

class SiteController extends Controller
{
    public function __construct(SeoService $seo_service, CommentService $comment_service, BannerService $banner_service)
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $this->seo_service = $seo_service;
        $this->comment_service = $comment_service;
        $this->banner_service = $banner_service;

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
        
        $banners =$this->banner_service->model->take(2)->orderBy('id', 'desc')->get()->load('image');
        // dd($banners->toArray());

        return view(('site.index.index'), compact('seo', 'comments', 'banners'));
    }

    public function contact()
    {
        $seo = $this->seo_service->model
            ->where('slug', 'index')
            ->first()
            ->load('image');

        return view(('site.contact.index'), compact('seo'));
    }

}
