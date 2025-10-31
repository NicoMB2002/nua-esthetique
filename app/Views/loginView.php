<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;
$page_title = 'Home';
ViewHelper::loadHeader($page_title);
?>

<form class="form-group" method="post" action= "processing">
<label for="username"  >Username:</label>
<input type="text" name="username" class="form-control">
<label for="password" >Password:</label>
<input type="password" name="password" class="form-control">
<br>
<input type="submit" class="btn btn-primary">
</form>

<?= FlashMessage::render()?>
<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>

