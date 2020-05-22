<?php

namespace Mailery\Common\Web;

use Mailery\Web\Controller as WebController;
use Psr\Http\Message\ResponseFactoryInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\View\WebView;
use Mailery\Brand\Service\BrandLocator;
use Cycle\ORM\ORMInterface;

abstract class Controller extends WebController
{
    /**
     * @var ORMInterface
     */
    private ORMInterface $orm;

    /**
     * @var BrandLocator
     */
    private BrandLocator $brandLocator;

    /**
     * @param BrandLocator $brandLocator
     * @param ResponseFactoryInterface $responseFactory
     * @param Aliases $aliases
     * @param WebView $view
     * @param ORMInterface $orm
     */
    public function __construct(
            BrandLocator $brandLocator,
            ResponseFactoryInterface
            $responseFactory,
            Aliases $aliases,
            WebView $view,
            ORMInterface $orm
    ) {
        $this->orm = $orm;
        $this->brandLocator = $brandLocator;
        parent::__construct($responseFactory, $aliases, $view);

        $fileName = (new \ReflectionClass(static::class))->getFileName();
        $this->setBaseViewPath(dirname(dirname(dirname($fileName))) . '/views');
    }

    /**
     * @return ORMInterface
     */
    protected function getOrm(): ORMInterface
    {
        return $this->orm;
    }

    /**
     * @return BrandLocator
     */
    protected function getBrandLocator(): BrandLocator
    {
        return $this->brandLocator;
    }
}
