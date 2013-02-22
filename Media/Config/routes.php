<?PHP
Router::connect('/media/crop/*',array('plugin'=>'media','controller'=>'image','action'=>'crop'));
Router::connect('/media/resize/*',array('plugin'=>'media','controller'=>'image','action'=>'resize'));