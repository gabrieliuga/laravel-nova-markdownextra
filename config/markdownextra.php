<?php

return [
    'image_folder' => env('MARKDOWN_IMAGE_FOLDER', 'uploads'),
    'disk' => env('MARKDOWN_FILESYSTEM_DRIVER', env('FILESYSTEM_DRIVER', 'local')),
];
