<?php
require_once 'src/kippt-bootstrap.php';

\unusorin\Kippt\Kippt::initialize('<your_username>', '<your_api_token>');

echo "<pre>";
print_r(\unusorin\Kippt\Models\Clip::getAll());
echo "</pre>";