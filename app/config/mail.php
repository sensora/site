<?php

return array(
  'driver' => 'smtp',
  'host' => 'smtp.sendgrid.net',
  'port' => 587,
  'from' => array('address' => 'bot@sensora.net', 'name' => 'Sensora, the open data enverioment grid.'),
  'encryption' => 'tls',
  'username' => $_ENV['SEND_GRID_USER'],
  'password' => $_ENV['SEND_GRID_PASSWORD'],
);

?>