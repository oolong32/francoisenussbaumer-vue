<?php
/**
 * francoisenussbaumer module for Craft CMS 3.x
 *
 * vue props preprocessing and stuff
 *
 * @link      josefrenner.ch
 * @copyright Copyright (c) 2021 Josef Renner
 */

namespace modules\francoisenussbaumermodule\variables;

use modules\francoisenussbaumermodule\FrancoisenussbaumerModule;

use craft\elements\Entry;
use craft\elements\Asset;
use craft\elements\Category;
use craft\helpers\ArrayHelper;
use Craft;

/**
 * francoisenussbaumer Variable
 *
 * Craft allows modules to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.francoisenussbaumerModule }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Josef Renner
 * @package   FrancoisenussbaumerModule
 * @since     1.0.0
 */
class FrancoisenussbaumerModuleVariable
{
  // Public Methods
  // =========================================================================

  /**
   * Whatever you want to output to a Twig template can go into a Variable method.
   * You can have as many variable functions as you want.  From any Twig template,
   * call it like this:
   *
   *     {{ craft.francoisenussbaumerModule.exampleVariable }}
   *
   * Or, if your variable requires parameters from Twig:
   *
   *     {{ craft.francoisenussbaumerModule.exampleVariable(twigValue) }}
   *
   * @param null $optional
   * @return string
   */

  public function categories()
  {
    $myCategoryQuery = Category::find();
    $allCategories = $myCategoryQuery->all();

    $mappedCategories = ArrayHelper::map($allCategories, 'id', function($category) {
      return (object) [
        'title' => $category->title,
        'id' => $category->id,
        'url' => $category->url,
        'slug' => $category->slug
      ];
    });
    return array_values($mappedCategories);
  }

  public function paintings()
  {
    $myAssetQuery = Asset::find()->volume('paintings')->kind('image');
    $paintings = $myAssetQuery->all();

    $enhancedPaintings = ArrayHelper::map($paintings, 'id', function($painting) {
      $categories = $painting->picType->all();
      $mappedCategories = ArrayHelper::map($categories, 'id', function($category) {
        return (object) [
          'title' => $category->title,
          'slug' => $category->slug
        ]; 
      });
      return (object)[
        'title' => $painting->title,
        'categories' => array_values($mappedCategories),
        'id' => $painting->id,
        'thumb' => $painting->getUrl('thumb'),
        'url' => $painting->url,
        'price' => $painting->picPrice,
        'sold' => $painting->picSold,
        'focalPoint' => $painting->hasFocalPoint ? $painting->focalPoint : null
      ];
    });
    return array_values($enhancedPaintings);
  }

  public function painting($assetId)
  {
    $myAssetQuery = Asset::find()->volume('paintings')->kind('image')->id($assetId);
    $painting = $myAssetQuery->one();

    if ($painting) {
      return (object)[
        'title' => $painting->title,
        'technique' => $painting->picTechnique,
        'width' => $painting->picWidth,
        'height' => $painting->picHeight,
        'id' => $painting->id,
        'thumb' => $painting->getUrl('thumb'),
        'url' => $painting->getUrl(),
        'price' => $painting->picPrice,
        'sold' => $painting->picSold,
        'focalPoint' => $painting->hasFocalPoint ? $painting->focalPoint : null
      ];
    } else {
      return null;
    }
  }
}
