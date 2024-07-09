<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Services\DataStorageInterface;
use App\Models\Catalog;

class ImportXmlToDbCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_imports_xml_data_to_db()
    {
        $this->artisan('import:xml')
            ->expectsQuestion('Enter file name in storage', 'test.xml')
            ->expectsOutput('Data imported successfully')
            ->assertExitCode(0);

        // Assert
        $this->assertDatabaseHas('catalog', [
            'entity_id' => 340,
            'CategoryName' => 'Green Mountain Ground Coffee',
            'sku' => 20,
            'name' => 'Green Mountain Coffee French Roast Ground Coffee 24 2.2oz Bag',
        ]);
    }

    /** @test */
    public function it_shows_error_when_file_not_found()
    {
        // Arrange
        $expectedMessage = 'File not found: ' . storage_path('app/data-import/nonexistent.xml');
        Log::shouldReceive('error')
            ->once()
            ->with($expectedMessage);

        // Act
        $this->artisan('import:xml')
            ->expectsQuestion('Enter file name in storage', 'nonexistent.xml')
            ->expectsOutput($expectedMessage)
            ->assertExitCode(0);
    }
}
