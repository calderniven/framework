<?php

namespace Tests;

final class RouterTest extends TestCase
{
    public function test_routes_can_be_registered()
    {
        $this->assertCount(0, app()->router);

        app()->boot();

        $this->assertCount(2, app()->router);
    }

    public function test_output_when_route_exists()
    {
        ob_start();
        app()->boot();
        app()->run();
        $output = ob_get_contents();
        ob_end_clean();

        $this->assertStringContainsString('Homepage', $output);
    }

    public function test_404_when_route_is_absent()
    {
        ob_start();
        app()->run();
        $output = ob_get_contents();
        ob_end_clean();
        $this->assertStringContainsString('404 page not found', $output);
    }
}