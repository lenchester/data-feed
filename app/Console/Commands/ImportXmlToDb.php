<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\DataStorageInterface;
use Illuminate\Support\Facades\Log;

class ImportXmlToDb extends Command
{
    protected $signature = 'import:xml';
    protected $description = 'Imports data from xml file';

    protected $storage;

    public function __construct(DataStorageInterface $storage)
    {
        parent::__construct();
        $this->storage = $storage;
    }

    public function handle()
    {
        $file_name = $this->ask('Enter file name in storage');

        $file = storage_path('app/data-import/' . $file_name);

        if (!file_exists($file)) {
            Log::error("File not found: $file");
            $this->error("File not found: $file");
            return;
        }

        try {
            $data = $this->parseXmlFile($file);

            if (!empty($data)) {
                $tableName = 'catalog';

                foreach ($data as $record) {
                    $this->storage->store($tableName, $record);
                }
                $this->info('Data imported successfully');
            } else {
                $this->info('Empty file');
            }
        } catch (\Exception $e) {
            Log::error('Error processing file: ' . $e->getMessage());
            $this->error('Error processing file: ' . $e->getMessage());
        }
    }

    private function parseXmlFile(string $filePath): array
    {
        $xml = simplexml_load_file($filePath);
        $data = [];

        foreach ($xml->item as $record) {
            $recordData = [];
            foreach ($record as $key => $value) {
                if($value == '')
                {
                    $recordData[$key] = NULL;
                }
                else
                {
                    $recordData[$key] = $value;
                }
            }
            $data[] = $recordData;
        }

        return $data;
    }
}
