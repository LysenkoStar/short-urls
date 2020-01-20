<?php

use app\core\Router;

// admin routes
Router::add('^admin$', array('controller' => 'Main', 'action' => 'index', 'prefix' => 'admin'));
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);
// remove link from database
Router::add('^admin/remove/(?P<alias>[0-9]*)/?$', array('controller' => 'Main', 'action' => 'remove', 'prefix' => 'admin'));

// default routes
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::add('^$', array('controller' => 'Main', 'action' => 'index'));

// to rewrite on full link
Router::add('^(?P<alias>[A-Za-z0-9-]+)$', array('controller' => 'Main', 'action' => 'rewrite'));
