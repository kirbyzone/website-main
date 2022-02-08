<?php
return function ($kirby,$page, $pages, $site) {

    $image_url_mobile = asset('assets/img/mobile-preview.svg')->url();
    $image_url_desktop = asset('assets/img/desktop-preview.svg')->url();
    if( $img = $page->mobile_img()->toFile() ){
        if($img->extension() === 'svg'){
            $image_url_mobile = $img->url();
        }
    }
    if( $img = $page->desktop_img()->toFile() ){
        if($img->extension() === 'svg'){
            $image_url_desktop = $img->url();
        }
    }

    $heroImage = [
        '_image_url_mobile_' => $image_url_mobile,
        '_image_url_desktop_' => $image_url_desktop
    ];

    return [
        '_heroImage_' => $heroImage
    ];
};