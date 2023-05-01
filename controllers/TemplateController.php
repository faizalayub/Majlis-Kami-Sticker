<?php
include_once 'App.php';

class TemplateController extends Controller {

    public function __construct($return_mode){
        parent::__construct($return_mode);
    }

    function landing_metaheader(){
        return '
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Banner for your product by Majlis Kami My">
        <meta name="author" content="MajlisKami">
        <meta name="keywords" content="majliskami, banner kahwin, baner, banner, kahwin, kawin, majlis, kenduri, nikah, pelekat, kad kawin, kad kahwin, stiker, setiker">
        
        <link rel="shortcut icon" href="https://majliskami.my/logo.png">
        <link rel="canonical" href="http://majliskami.my/">
    
        <title>Majlis Kami My</title>
    
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="public/css/dashboard.css">
        ';
    }

    function landing_navigation(){
        return '
        <nav class="navbar navbar-expand navbar-light navbar-bg">

           <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>
            
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">

                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <span class="text-dark">faizalayub29@gmail.com</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="./logout.php"><i class="align-middle me-1" data-feather="log-out"></i> Log Out</a>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>';
    }

    function landing_sidebar(){
        $sidebarMenu  = [];
        $listSidebar  = '';
        $hasActiveTab = false;

        $sidebarMenu[] = (object) ['label' => 'Home', 'icon' => 'home', 'path' => 'cipta-borang.php'];
        $sidebarMenu[] = (object) ['label' => 'Shop', 'icon' => 'shopping-cart', 'path' => 'lihat-borang.php'];
        $sidebarMenu[] = (object) ['label' => 'Bestsellers', 'icon' => 'tag', 'path' => 'lihat-borang.php'];
        $sidebarMenu[] = (object) ['label' => 'Collection', 'icon' => 'box', 'path' => 'lihat-borang.php'];
        $sidebarMenu[] = (object) ['label' => 'Discover', 'icon' => 'airplay', 'path' => 'lihat-borang.php'];

        foreach($sidebarMenu as $menu){
            $isCurrent = ($this->currentFile == $menu->path);
            $isActive  = ($isCurrent ? 'active' : '');

            $listSidebar .= '
            <li class="sidebar-item '.$isActive.'">
                <a class="sidebar-link" href="'.$menu->path.'">
                    <i class="align-middle" data-feather="'.$menu->icon.'"></i>
                    <span class="align-middle">'.$menu->label.'</span>
                </a>
            </li>';
        }

        return '
        <nav id="sidebar" class="sidebar js-sidebar collapsed">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.php">
                    <span class="align-middle">Dashboard</span>
                </a>

                <ul class="sidebar-nav">'.$listSidebar.'</ul>
            </div>
        </nav>
        ';
    }

    function landing_footer(){
        return '
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-12 text-start">
                        <p class="mb-0">Sticker Development Project</p>
                    </div>
                </div>
            </div>
        </footer>
        ';
    }
}
?>