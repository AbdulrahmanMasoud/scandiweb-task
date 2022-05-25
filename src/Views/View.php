<?php
namespace Scandiweb\Product\Views;

class View
{
    /**
     * View Constructor
     *
     *
     */
    private function __construct()
    {
    }

    /**
     * Render view file
     *
     * @param string $path
     * @param array $data
     * @return string
     */
    public static function render($path, $data = [])
    {
        $path = "views/{$path}.php";
        if (! file_exists($path)) {
            throw new \Exception("The view file {$path} is not exist");
        }

        ob_start();
        extract($data);
        include $path;
        $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    }
}
