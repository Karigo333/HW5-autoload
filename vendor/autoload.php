<?php


class Autoloader
{
    protected $namespaces = array();

    public function register()
    {
        spl_autoload_register(array($this, 'getClasses'));
    }

    public function addNamespaces($prefix, $base_dir){

        if(preg_match('/[\/#$%|\*]/sui', $prefix) > 0) {
            throw new Exception('Bad namespace prefix');
        }
        elseif (preg_match('/[\\#$%|*]/sui', $base_dir) > 0) {
            throw new Exception('Bad base_dir path');
        }

        if (!isset($this->namespaces[$prefix])) {
            $this->namespaces[$prefix] = array();
        }
        if (substr($base_dir, -1) != '/') {
            $base_dir .= '/';
        }

        array_push($this->namespaces[$prefix], $base_dir);
    }

    public function getClasses($class) {
        $class_explode = explode('\\', $class);
        $filename = array_pop($class_explode);
        $namespace = implode('\\', $class_explode);

        foreach ($this->namespaces[$namespace] as $key => $basedir) {
            $file = $basedir . $filename . ".php";

            if (file_exists(main_dir.$file)) {
                require main_dir . $file;
                return true;
            }
        }
    }
}