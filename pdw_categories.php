<?php

if (!defined('_PS_VERSION_')) {
exit;
}

class Pdw_Categories extends Module
{

    public function __construct()
    {
        $this->name = 'pdw_categories';
        $this->version = '1.0.0';
        $this->author = 'Produweb';

        parent::__construct();
        $this->displayName = $this->l('pdw_categories');

    }

    public function install()
    {
        $this->registerHook('header');
        $this->registerHook('home');
        return parent::install();
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->_path.'views/css/style.css', 'all');
    }

    public function hookDisplayHome($params)
    {

        $query = "select * from ps_category c
            INNER JOIN ps_category_lang cl ON c.id_category = cl.id_category";
        $result = Db::getInstance()->ExecuteS($query) ;
        $categories = [];
        $apart = ['Racine', 'Accueil', 'Root', 'Home', 'Stammverzeichnis', 'Startseite'];
        foreach ( $result as $temp):
            if (
                (!in_array($temp['name'], $apart)) &&
                (!$key = array_search($temp['name'], array_column( $categories,'name')))
            ){
                $_cat['id_category'] = $temp['id_category'];
                $_cat['name'] = $temp['name'];
                $_cat['link_rewrite'] = $temp['link_rewrite'];

//                echo '<img src="/img/src/'.$temp['id_category'].'" />';
                array_push($categories, $_cat);
            }
        endforeach;

        $this->smarty->assign(['categories'=>$categories]);

        return $this->display(__FILE__, 'pdw_categories.tpl');

    }


}