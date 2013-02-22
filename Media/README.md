<h1>Media plugin</h1>
<p>Este plugin ainda está em desenvolvimento e terá recursos para manipulação de mídias em geral (vídeos, imagens, audio, etc), e terá como finalidade compor um CMS que já faz um tempo que estou desenvolvendo (faz um tempo pois incorporo algo sempre que algum cliente tem uma necessidade diferenciada).</p>
<p>Apesar de ainda estar em desenvolvimento estou compartilhando o que já está pronto neste plugin, que é o sistema de criação de Thumbnails. Com este plugin você pode gerar thumbnails através de dois métodos &quot;resize&quot; e &quot;crop&quot;. O método resize redimensiona a imagem proporcionamente sem cortar nenhuma parte da imagem, e o método crop gera a imagem do tamanho exato que você selecionar porém pode cortar parte da imagem.</p>
<h1>Como instalar</h1>
<p>1. Faça o download do zip (<a href="https://github.com/andrecavallari/CakePlugins/archive/master.zip">https://github.com/andrecavallari/CakePlugins/archive/master.zip</a>) e extraia o conteúdo da pasta &quot;CakePlugin-master&quot; para a sua pasta de plugins do projeto Cake, ficando assim: &quot;app/Plugins/Media&quot;.</p>
<p>2. Pegue o arquivo tb_media_images.sql de dentro da pasta &quot;SQL&quot; do plugin e restaure como backup, ou gere a tabela no banco de dados usando a mesma estrutura que está no arquivo.</p>
<p>3. Se o seu servidor não tem permissão de escrita nas pastas, crie a pasta media_cache dentro da pasta webroot/img, ficando webroot/img/media_cache, com as permissões 0777 (Leitura + escrita + exec.), caso tenha permissão então o plugin irá gerar automaticamente esta pasta.</p>
<h1>Como usar?</h1>
<p>1. Chame as helpers no Controller que for usar (preferencialmente no AppController se for utilizar pelo site inteiro).</p>
<p><code>
  public $helpers=array('Media.Crop','Media.Resize');
</code></p>
<p>2. Na view basta utilizar as funções para criar os links para as imagens.</p>
<p><code>
$width=150;<br>
$height=150;<br>
echo $this->Crop->image('/img/imagem1.jpg',$width,$height);<br> //Retorna &lt;img src="/media/crop/150x150/img/imagem1.jpg" alt="" /&gt;<br>
echo $this->Resize->image('/img/imagem1.jpg',200,200,array('alt'=>'Imagem 01'));<br> //Retorna &lt;img src="/media/resize/200x200/img/imagem1.jpg" alt="Imagem 01" /&gt;<br><br>
echo $this->Crop->url('/img/imagem1.jpg',$width,$height);<br> //Retorna apenas o caminho do thumb "/media/crop/150x150/img/imagem1.jpg", pode ser usado em um link por exemplo
</code>
</p>
<h1>Créditos</h1>
<p>Eu (desenvolvimento do plugin, e não ligo muito para créditos).</p>
<p>Davi Ferreira (<a href="http://www.daviferreira.com" target="_blank">http://www.daviferreira.com</a>), desenvolvimento da classe canvas, utilizada para gerar as imagens reduzidas, praticamente o &quot;coração&quot; do plugin. Mais sobre a classe <a href="http://www.daviferreira.com/posts/canvas-nova-classe-para-manipulacao-e-redimensionamento-de-imagens-com-php" target="_blank">aqui</a>.</p>
