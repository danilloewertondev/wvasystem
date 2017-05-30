<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">WVA System</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Opções <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="../">Visualizar site</a></li>
              <li><a href="javascript:;">Adicionar Usuários</a></li>
              <li><a href="javascript:;">Site em Manutenção</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i><?php echo $nomeLogado;?>  <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Perfil</a></li>
              <li><a href="?sair" onClick="return confirm('Deseja realmente sair do sistema?')">Sair</a></li>
            </ul>
          </li>
        </ul>
        <form action="home.php?acao=ver-postagens" method="post" enctype="multipart/form-data" class="navbar-search pull-right">
          <input type="text" class="search-query" name="palavra-busca" placeholder="pesquisar">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
    <?php 
	if(isset($_GET['acao'])){$acao = $_GET['acao'];}else {$acao= 'home';}?>
    
      <ul class="mainnav">
        <li <?php if($acao == "welcome"||$acao=="home"){echo'class="active"';}?>><a href="home.php"><i class="icon-dashboard"></i><span>Homepage</span> </a> </li>
        <li class="<?php if($acao=="ver-postagens" || ($acao=="cad-postagem")){echo "active";}?>dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-file"></i><span>Postagens</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="home.php?acao=ver-postagens">Visualizar</a></li>
            <li><a href="home.php?acao=cad-postagem">Cadastrar</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>Usuários</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Visualizar</a></li>
            <li><a href="#">Cadastrar</a></li>
            <li><a href="#">Editar Perfil</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="icon-globe"></i><span>Manut. Site</span> </a></li>
        <li></li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
