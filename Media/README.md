<h1>Media plugin</h1>
<p>Este plugin ainda est� em desenvolvimento e ter� recursos para manipula��o de m�dias em geral (v�deos, imagens, audio, etc), e ter� como finalidade compor um CMS que j� faz um tempo que estou desenvolvendo (faz um tempo pois incorporo algo sempre que algum cliente tem uma necessidade diferenciada).</p>
<p>Apesar de ainda estar em desenvolvimento estou compartilhando o que j� est� pronto neste plugin, que � o sistema de cria��o de Thumbnails. Com este plugin voc� pode gerar thumbnails atrav�s de dois m�todos &quot;resize&quot; e &quot;crop&quot;. O m�todo resize redimensiona a imagem proporcionamente sem cortar nenhuma parte da imagem, e o m�todo crop gera a imagem do tamanho exato que voc� selecionar por�m pode cortar parte da imagem.</p>
<h1>Como instalar</h1>
<p>1. Fa�a o download do zip (<a href="https://github.com/andrecavallari/CakePlugins/archive/master.zip">https://github.com/andrecavallari/CakePlugins/archive/master.zip</a>) e extraia o conte�do da pasta &quot;CakePlugin-master&quot; para a sua pasta de plugins do projeto Cake, ficando assim: &quot;app/Plugins/Media&quot;.</p>
<p>2. Pegue o arquivo tb_media_images.sql de dentro da pasta &quot;SQL&quot; do plugin e restaure como backup, ou gere a tabela no banco de dados usando a mesma estrutura que est� no arquivo.</p>
<p>3. Se o seu servidor n�o tem permiss�o de escrita nas pastas, crie a pasta media_cache dentro da pasta webroot/img, ficando webroot/img/media_cache, com as permiss�es 0777 (Leitura + escrita + exec.), caso tenha permiss�o ent�o o plugin ir� gerar automaticamente esta pasta.</p>
<h1>Como usar?</h1>
<p>1. Chame as helpers no Controller que for usar (preferencialmente no AppController se for utilizar pelo site inteiro).</p>
<p><code>
  public $helpers=array('Media.Crop','Media.Resize');
</code></p>
<p>2. Na view basta utilizar as fun��es para criar os links para as imagens.</p>
<p><code>
$width=150;<br>
$height=150;<br>
echo $this->Crop->image('/img/imagem1.jpg',$width,$height);<br> //Retorna &lt;img src="/media/crop/150x150/img/imagem1.jpg" alt="" /&gt;<br>
echo $this->Resize->image('/img/imagem1.jpg',200,200,array('alt'=>'Imagem 01'));<br> //Retorna &lt;img src="/media/resize/200x200/img/imagem1.jpg" alt="Imagem 01" /&gt;<br><br>
echo $this->Crop->url('/img/imagem1.jpg',$width,$height);<br> //Retorna apenas o caminho do thumb "/media/crop/150x150/img/imagem1.jpg", pode ser usado em um link por exemplo
</code>
</p>
<h1>Cr�ditos</h1>
<p>Eu (desenvolvimento do plugin, e n�o ligo muito para cr�ditos).</p>
<p>Davi Ferreira (<a href="http://www.daviferreira.com" target="_blank">http://www.daviferreira.com</a>), desenvolvimento da classe canvas, utilizada para gerar as imagens reduzidas, praticamente o &quot;cora��o&quot; do plugin. Mais sobre a classe <a href="http://www.daviferreira.com/posts/canvas-nova-classe-para-manipulacao-e-redimensionamento-de-imagens-com-php" target="_blank">aqui</a>.</p>
