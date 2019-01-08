<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Router
 */

class RouterTest extends TestCase
{
    /** @var Router */
    private $router;
    /** @var Factory | PHPUnit_Framework_MockObject_MockObject */
    private $factory;
    /** @var Request | \PHPUnit_Framework_MockObject_MockObject */
    private $request;

    protected function setUp()
    {
        $this->factory = $this->createMock(Factory::class);
        $this->request = $this->createMock(Request::class);

        $this->router = new Router($this->factory);
    }

    /** @dataProvider routeProvider */
    public function testRoutingUsingDataProvider(string $uri, string $expectedFactoryMethod): void
    {
        $this->request->expects($this->once())->method('getURI')->willReturn($uri);

        $page = $this->createMock(Page::class);
        $this->factory
            ->expects($this->once())
            ->method($expectedFactoryMethod)
            ->willReturn($page);

        $dom = $this->createMock(DOMDocument::class);
        $page->expects($this->once())->method('getPage')->willReturn($dom);

        $this->assertSame($dom, $this->router->route($this->request));
    }

    public function routeProvider(): array
    {
        return [
            ['/', 'createIndexPage'],
            ['/create', 'createRecordCreatorPage'],
            ['/invalid-uri', 'createErrorPage'],
        ];
    }


}
