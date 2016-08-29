# Kirby SVG kirbytag
![Version](https://img.shields.io/badge/version-1.0.0-green.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)
![Kirby Version](https://img.shields.io/badge/Kirby-2.3%2B-red.svg)

A kirbytext extension to inline svg images for [Kirby](http://getkirby.com).

![Kirby SVG Kirbytag](https://github.com/Thiousi/kirby-svg-kirbytag/blob/master/svg.jpg)

## Installation

### 1. Kirby CLI

If you are using the [Kirby CLI](https://github.com/getkirby/cli) you can install this plugin by running the following command in your shell from the root folder of your Kirby installation:

```
kirby plugin:install Thiousi/kirby-svg-kirbytag
```

### 2. Manual
[Download this archive](https://github.com/Thiousi/kirby-svg-kirbytag/archive/master.zip), extract it and rename it to `svg-kirbytag`. Copy the folder to your `site/plugins` folder.

### 3. Git Submodule
If you know your way around git, you can download this as a submodule:

```
$ git submodule add https://github.com/Thiousi/kirby-svg-kirbytag site/plugins/svg-kirbytag
```

## Usage
This kirbytag uses a stripped down version of the image tag as its base. Therefore, it works in a similar fashion but can't accept as many options. Here is the full list:
```
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
```

### class
Class added to the figure wrapping the svg tag. The figure appears if a caption is set or if the otion `kirbytext.image.figure` is set to true in the configuration fo the site.

### caption
Adds a figcaption tag inside the figure containing the svg

### link, linkclass, title, target, rel
Constructs a link that wraps the svg:
```
<a href="link" class="linkclass" title="title" target="target" rel="rel">
```

## Credits
This plugin was created as part of writing up a tutorial on macotuts: https://macotuts.com/tuto/advanced/creating-svg-kirbytag

## License
MIT

## Changelog
### 1.0.0
- Initial release