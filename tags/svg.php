<?php
/* 
* SVG tag v0.1
* Creates an SVG tag from a kirbytext tag
* Built by Thiousi for macotuts.com
*/
kirbytext::$tags['svg'] = array(
  'attr' => array(
    'class',
    'caption',
    'link',
    'linkclass',
    'title',
    'target',
    'rel',
  ),
  'html' => function($tag) {
    $url     = $tag->attr('svg');
    $title   = $tag->attr('title');
    $link    = $tag->attr('link');
    $caption = $tag->attr('caption');
    $file    = $tag->file($url);
    // use the file url if available and otherwise the given url
    $url = $file ? $file->url() : url($url);
    // link builder
    $_link = function($svg) use($tag, $url, $link, $file) {
      if(empty($link)) return $svg;
      // build the href for the link
      if($link == 'self') {
        $href = $url;
      } else if($file and $link == $file->filename()) {
        $href = $file->url();
      } else if($tag->file($link)) {
        $href = $tag->file($link)->url();
      } else {
        $href = $link;
      }
      return html::a(url($href), $svg, array(
        'rel'    => $tag->attr('rel'),
        'class'  => $tag->attr('linkclass'),
        'title'  => $tag->attr('title'),
        'target' => $tag->target()
      ));
    };
    // SVG builder. Reads the content of the SVG file
    $_svg = function($file) {
      return f::read($file);
    };
    if(kirby()->option('kirbytext.image.figure') or !empty($caption)) {
      $svg  = $_link($_svg($file));
      $figure = new Brick('figure');
      $figure->addClass($tag->attr('class'));
      $figure->append($svg);
      if(!empty($caption)) {
        $figure->append('<figcaption>' . html($caption) . '</figcaption>');
      }
      return $figure;
    } else {
      return $_link($_svg($file));
    }
  }
);