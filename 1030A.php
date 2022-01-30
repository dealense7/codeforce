<?php
$participants = fgets(STDIN);
$answers = explode(' ', fgets(STDIN));

echo is_int(array_search(1, $answers)) ? 'HARD' : 'EASY';
