<?php namespace Ds\Site;

use Backend;
use RainLab\Blog\Models\Post;
use System\Classes\PluginBase;
use System\Classes\PluginManager;
use RainLab\Pages\Controllers\Index as StaticPageController;

/**
 * Site Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Site',
            'description' => 'No description provided yet...',
            'author'      => 'Ds',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        $this->hideStaticPageSecondaryTabs();
        $this->extendBlogPostModel();
    }

    public function hideStaticPageSecondaryTabs()
    {
        // Adds CSS file to hide secondary tab from Static Pages if set in site settings
        if(PluginManager::instance()->hasPlugin('RainLab.Pages')) {
            StaticPageController::extend(function($widget) {
                $widget->addCss('/plugins/ds/site/assets/css/backend.css');
            });
        }
    }

    public function extendBlogPostModel()
    {
        Post::extend(function($model) {
            $model->addDynamicMethod('getImageAttribute', function() use($model) {
                $image = $model->featured_images->first();

                if ($image) {
                    return $image->getThumbUrl(570, 350, ['mode' => 'crop']);
                }

                return false;
            });
        });
    }
}
