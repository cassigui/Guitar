@extends('layouts.site')

@section('meta_title')
    {{ $seo->title }}
@endsection
@section('meta_description')
    {{ $seo->description }}
@endsection
@section('meta_image')
    @if (!empty($seo->image))
        {{ config('filesystems.disks.s3.url') . $seo->image['path'] }}
    @endif
@endsection
@section('title')
    {{ $seo->title }}
@endsection

@section('content')

    @include('site.index.banner')
    @include('site.index.about')
    @include('site.index.popularProducts')
    @include('site.index.comments')
    @include('site.index.soldBrands')
    
@endsection

@push('linkscripts')
@endpush

@push('scripts')
@endpush
