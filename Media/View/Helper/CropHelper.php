<?PHP
class CropHelper extends AppHelper{
    
    public $helpers=array('Html');
    
    public function url($url=null,$width=100,$height=100) {
        if($url[0]=='/') $url=substr ($url, 1);
        return "/media/crop/{$width}x{$height}/$url";
    }
    
    public function image($url,$width=100,$height=100,$options=array()){
        $url=$this->url($url,$width,$height);
        return $this->Html->image($url,$options);
    }
    
}