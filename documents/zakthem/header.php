<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <title><?php bloginfo('title')?></title>
            <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
            <?wp_head()?>
        </head>
        
        
        <header>
            
            <h1>
                <a href="<?php home_url('/')?>"<?php bloginfo('name')?></a>
            </h1>
            
        </header>
        
        <div id="container">
            header
        </div>
        
    </html>