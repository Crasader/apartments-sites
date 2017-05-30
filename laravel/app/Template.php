<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    //
    protected $table = 'templates';
    /**
    * @return string Returns the path to the given file
    * @param string $template_dir_name
    * @param string $template_file_name
    */
    static function getEmailTemplatePath($template_dir_name, $template_file_name)
    {
        if(!is_string($template_dir_name)){
            //assuming that this is actually an entity.
            $template_dir_name = $template_dir_name->getTemplateName();
        }
        return "layouts/{$template_dir_name}/email/{$template_file_name}";
    }
    static function getEmailTemplateView($template_dir_name, $template_file_name, $content)
    {
        return view(
            self::getEmailTemplatePath($template_dir_name, $template_file_name),
            $content
        );
    }
    static function getPageTemplatePath($template_dir_name, $template_file_name)
    {
        if(!is_string($template_dir_name)){
            //assuming that this is actually an entity.
            $template_dir_name = $template_dir_name->getTemplateName();
        }
        return "layouts/{$template_dir_name}/pages/$template_file_name";
    }
    static function getPageTemplateView($template_dir_name, $template_file_name, $content)
    {
        return view(
            self::getPageTemplatePath($template_dir_name, $template_file_name),
            $content
        );
    }
}
