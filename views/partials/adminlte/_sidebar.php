<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php url('/node_modules/admin-lte/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php auth('name').auth('lastname'); ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Buscar...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
  <!-- /.search form -->

  

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">NAVEGAÇÃO</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="<?php classActiveUrl('/'); ?>"><a href="<?php url('/'); ?>"><i class="fa fa-link"></i> <span>Home</span></a></li>
    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Clientes</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php classActiveUrl('/clientes'); ?>"><a href="<?php url('/clientes'); ?>">Todos os Clientes</a></li>
        <li class="<?php classActiveUrl('/clientes/create'); ?>"><a href="<?php url('/clientes/create'); ?>">Adicionar Cliente</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Dívidas</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php classActiveUrl('/dividas'); ?>"><a href="<?php url('/dividas'); ?>">Todas as Dívidas</a></li>
        <li class="<?php classActiveUrl('/dividas/create'); ?>"><a href="<?php url('/dividas/create'); ?>">Adicionar Dívida</a></li>
      </ul>
    </li>
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>