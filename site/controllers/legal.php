<?php
return function ($kirby,$page, $pages, $site) {
    $content = $page->privacy();
    $title = $page->privacy_title();
    if($type = get('q',false)){
        if($type == 'terms'){
            $content = $page->terms();
            $title = $page->terms_title();
        }
        if($type == 'usage'){
            $content = $page->usage();
            $title = $page->usage_title();
        }
        if($type == 'privacy'){
            $content = $page->privacy();
            $title = $page->privacy_title();
        }
        if($type == 'cookie'){
            $content = $page->cookies();
            $title = $page->cookies_title();
        }
        if($type == 'dpa'){
            $content = $page->dpa();
            $title = $page->dpa_title();
        }
        if($type == 'euscc'){
            $content = $page->eu_scc();
            $title = $page->eu_scc_title();
        }
    }

    return [
        '_content_' => $content,
        '_title_' => $title
    ];
};