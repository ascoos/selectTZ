<?php 
require_once('..\kernel\coreTimezones.php');

$objTZ = new \ASCOOS\CMS\KERNEL\CORE\Timezones\TTimezonesHandler();

$params = [
    'class="default"', 
    'data-role="timezones"'
];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ASCOOS - Test timezones select box</title>
    
    <link rel="icon" href="../favicon.ico" />
  </head>

  <body>
    <form>
        <label for="timezones">Choose a PHP Timezone:</label>
        <?php 
          $start = microtime(true);
          echo $objTZ->getHtmlSelect('timezones', $params); 
          $profile_ascoos = number_format(microtime(true) - $start, 25);
          unset($start);
          ?>
    </form>
    <div>
      <p>The list of timezones was created in : <?php echo $profile_ascoos; unset($profile_ascoos); ?></p>
    </div>
  </body>
</html>
