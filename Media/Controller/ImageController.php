<?PHP

class ImageController extends MediaAppController {

    public $uses = array('Media.Image');
    public $autoRender = false;
    private $folder = "media_cache";
    private $mimes = array('jpg' => 'image/jpeg','png' => 'image/png','gif' => 'image/gif');
    private $quality = 90;
    private $image;
    private $thumb;
    private $sizes;
    private $hash;
    private $cache;
    private $width = 150;
    private $height = 150;

    public function beforeFilter(){
        parent::beforeFilter();
        if(Configure::read('Media.quality')) $this->quality=Configure::read('Media.quality');
        $params = $this->request->params['pass'];
        $sizes = array_shift($params);
        $action = $this->request->params['action'];
        $this->image = implode(DS, $params);
        $this->thumb = "img" . DS . $this->folder . DS . $action . DS . $sizes . DS . $this->image;
        if (!file_exists(dirname($this->thumb))) mkdir(dirname($this->thumb), 0777, true);        
        $this->hash = md5(file_get_contents($this->image));
        $this->cache = $this->Image->find('first', array('conditions' => array('image' => $this->image, 'thumb' => $this->thumb, 'hash' => $this->hash)));
        if (count($this->cache) <= 0)  $this->Image->deleteAll(array('image' => $this->image, 'thumb' => $this->thumb));
        list($this->width, $this->height) = explode('x', $sizes);        
        $extension = strtolower(pathinfo($this->image, PATHINFO_EXTENSION));        
        header("Content-Type: " . $this->mimes[$extension]);
        if (count($this->cache) > 0 && file_exists($this->thumb)) $this->output();
        $this->Image->deleteAll(array('image' => $this->image,'thumb' => $this->thumb,'hash' => $this->hash));
    }

    public function crop() {        
        $canvas = new canvas($this->image);
        $canvas->redimensiona($this->width, $this->height, 'crop');
        $canvas->grava($this->thumb, $this->quality);
        $this->Image->save(array('image' => $this->image,'thumb' => $this->thumb,'hash' => $this->hash));
        $this->output();
    }

    public function resize() {
        $canvas = new canvas($this->image);
        $canvas->redimensiona($this->width, $this->height, 'proporcional');
        $canvas->grava($this->thumb, $this->quality);
        $this->Image->save(array('image' => $this->image,'thumb' => $this->thumb,'hash' => $this->hash));
        $this->output();
    }
    
    private function output(){
        echo file_get_contents($this->thumb);
        exit;
    }
}