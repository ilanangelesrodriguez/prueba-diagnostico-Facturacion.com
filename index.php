<?php

$name = getenv('NAME', true) ?: 'World';
echo sprintf('Hola %s!', $name);