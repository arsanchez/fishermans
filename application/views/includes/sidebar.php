<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title"><?php echo (isset($header_title)) ? $header_title : 'HOME'; ?></span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
          
          </div>
          
        </div>
</header>
<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
  <header class="demo-drawer-header">
    <div class="demo-avatar-dropdown">
      Fishermans
    </div>
  </header>
  <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
    <a class="mdl-navigation__link" href="<?php echo base_url('index.php/home'); ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
    <a class="mdl-navigation__link" href="<?php echo base_url('index.php/owner'); ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i><?php echo $this->lang->line('owners'); ?></a>
     <a class="mdl-navigation__link" href="<?php echo base_url('index.php/ship'); ?>"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i><?php echo $this->lang->line('ship'); ?></a>

  </nav>
</div>