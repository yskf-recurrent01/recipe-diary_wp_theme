<?php
$args = [
    'mid_size' => 2,
    'prev_text' => '前へ',
    'next_text' => '次へ',
    'type' => 'list',
];
echo paginate_links($args);
