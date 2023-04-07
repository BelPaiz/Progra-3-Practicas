<?php
$formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);
echo $formatterES->format(123.45);

?>