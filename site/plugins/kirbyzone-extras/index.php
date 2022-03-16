<?php

Kirby::plugin('kirbyzone/kirbyzone-extras', [
    'hooks' => [
        'page.create:after' => function ($page) {
            // this method will check whether a page has 'autobuild' settings,
            // and will autobuild sub-pages, if needed, when the page is created.
            $page->autobuildSubPages();
        }
    ],
    'pageMethods' => [
        /*
            this function returns the last modified date for a page,
            taking into consideration the page's children and files, recursively.
            PARAMS
            $format string the format of the date to be returned, as per PHP's date() function.
        */
        'lastModified' => function ($format = 'U') {
            // get the modification date of current page
             $date = $this->modified();
             // compare with modification date of any existing files on the page
             if($this->hasFiles()){
                foreach($this->files() as $file){
                    $date = max($date, $file->modified());
                }
            }
            // compare with modification date of any children
            if($this->hasChildren()){
                foreach($this->children() as $child){
                    $date = max($date, $child->lastModified());
                }
            }
             return date($format,$date);
        },
        /*
            This function auto-generates page titles.
            It returns the site title on the home page. On other pages, it tries
            to find a 'page_title_override' field, and return that. Otherwise, it
            auto-generates a title using the page title &  site title together.
        */
        'pageTitle' => function() {
            if($this->intendedTemplate() == 'home' ){
                if($this->page_title_override()->isNotEmpty()){
                    return $this->page_title_override();
                }else{
                    return Str::unhtml(site()->title()->kirbytextinline());
                }
            }
            if($this->page_title_override()->exists() && $this->page_title_override()->isNotEmpty()) {
                return $this->page_title_override();
            }
            return  Str::unhtml( $this->title()->kirbytextinline() ) . ' | ' .  Str::unhtml( site()->title()->kirbytextinline() );
        },
        /*
            This function looks for 'autobuild' settings in a pages's blueprint,
            and builds sub-pages automatically, as required. It has been setup following:
            https://getkirby.com/docs/cookbook/extensions/subpage-builder

            The 'autobuild' setting should contain a list of pages to be built.
            Each list entry should contain a 'title', 'uid', and 'template'. It can
            optionally contain also a 'num' - Example:

            autobuild:
              - title: Hero Banner
                uid: hero
                template: landing_hero
                num: 1
              - title: Contact
                uid: contact
                template: global_contact
                num: 2

            If a page does not have 'autobuild' settings, nothing happens.
            If a page has the appropriate 'autobuild' data, sub-pages are creagted, recursively.
        */
        'autobuildSubPages' => function() {
            // check whether the blueprint has autobuild settings:
            $children = $this->blueprint()->autobuild();
            if(empty($children)) { return; }

            foreach($children as $child){
                // check that our autobuild page has all the required info:
                $missing = A::missing($child, ['title', 'template', 'uid']);
                if(!empty($missing)){ continue; } // skip to the next one

                try {
                    // the new page is created as a draft
                    $subPage = $this->createChild([
                        'content'  => [
                            'title' => $child['title']
                        ],
                        'slug'     => $child['uid'],
                        'template' => $child['template'],
                    ]);
                } catch (Exception $error) {
                    throw new Exception($error);
                }

                // if the new page was created successfully...:
                if($subPage){
                    //... we must run it recursively through the autobuilder, too:
                    $subPage->autobuildSubPages();

                    // ...then publish the page, so that if the parent page
                    // is published, it will be published, too:
                    $subPage->publish();

                    //...and last of all, if the 'num' has been set, we sort it:
                    if (isset($child['num'])) { $subPage->sort($child['num']); }
                }
            }
        }
    ],
    'fieldMethods' => [
        /*
            This function calculates an estimated reading time based on an average of 3 words/second.
            It should return a string in the format 'X min Y sec'.
​        */
        'readingTime' => function ($field): string {
          $count = $field->words();
          if($count < 3) return '< 1 sec';

          $min = intdiv($count, 180);
          $sec = intdiv(($count % 180), 3);

          $str ='';
          if($min > 0) $str .= $min . ' min';
          if($min > 0 and $sec > 0) $str .= ' ';
          if($sec > 0) $str .= $sec . ' sec';

          return $str;
        }

    ]
]);
