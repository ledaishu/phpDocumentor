<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link https://phpdoc.org
 */

namespace phpDocumentor\Guides\Renderers\LaTeX;

use phpDocumentor\Guides\Nodes\CodeNode;
use phpDocumentor\Guides\Renderer;
use phpDocumentor\Guides\Renderers\NodeRenderer;

class CodeNodeRenderer implements NodeRenderer
{
    /** @var CodeNode */
    private $codeNode;

    /** @var Renderer */
    private $renderer;

    public function __construct(CodeNode $codeNode)
    {
        $this->codeNode = $codeNode;
        $this->renderer = $codeNode->getEnvironment()->getRenderer();
    }

    public function render() : string
    {
        return $this->renderer->render(
            'code.tex.twig',
            [
                'codeNode' => $this->codeNode,
            ]
        );
    }
}
