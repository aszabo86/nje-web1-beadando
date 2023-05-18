<?php
    require_once('config.inc.php');

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="media/favicon.ico" alt="favicon" height="24" width="24">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php foreach( $menu as $key => $menu_item ) { ?>
            <li class="nav-item">
                <a 
                    class="nav-link active" 
                    aria-current="page" 
                    href="<?php echo $menu_item['link'] ?>"
                >
                    <?php echo $menu_item['text'] ?>
                </a>
            </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
