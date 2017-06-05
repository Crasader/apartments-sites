<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Property\Site;

class Template extends Model
{
    public static function getTemplateName($template_dir_name)
    {
        if (!is_string($template_dir_name)) {
            if (!$template_dir_name) {
                //if null, add entity
                $site = app()->make('App\Property\Site');
                $template_dir_name = $site->getEntity();
            }
            if ($template_dir_name) {
                //assuming that this is actually an entity.
                $template_dir_name = $template_dir_name->getTemplateName();
            }
        }
        return $template_dir_name;
    }
    //
    protected $table = 'templates';
    /**
    * @return string Returns the path to the given file
    * @param string $template_dir_name
    * @param string $template_file_name
    */
    public static function getEmailTemplatePath($template_dir_name, $template_file_name)
    {
        $template_dir_name = self::getTemplateName($template_dir_name);
        return "layouts/{$template_dir_name}/email/{$template_file_name}";
    }
    public static function getEmailTemplateView($template_dir_name, $template_file_name, $content)
    {
        return view(
            self::getEmailTemplatePath($template_dir_name, $template_file_name),
            $content
        );
    }
    public static function getPageTemplatePath($template_dir_name, $template_file_name)
    {
        $template_dir_name = self::getTemplateName($template_dir_name);
        return "layouts/{$template_dir_name}/pages/$template_file_name";
    }
    public static function getPageTemplateView($template_dir_name, $template_file_name, $content)
    {
        return view(
            self::getPageTemplatePath($template_dir_name, $template_file_name),
            $content
        );
    }
}
