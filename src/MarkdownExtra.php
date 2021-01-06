<?php

namespace Gabrieliuga\Markdownextra;

use Laravel\Nova\Fields\Markdown;

class MarkdownExtra extends Markdown
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'markdownextra';
}
