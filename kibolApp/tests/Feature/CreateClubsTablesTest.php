<?php

namespace Tests\Feature\Migrations;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class CreateClubsTablesTest extends TestCase
{
    use RefreshDatabase;

    private $clubs = [
        'miedzlegnica', 'cracoviakrakow', 'zniczpruszkow', 'gornikzabrze', 'jagielloniabialystok',
        'koronakielce', 'lechpoznan', 'zaglebiesosnowiec', 'gkstychy', 'gkskatowice', 'arkagdynia',
        'brukbettermalicanieciecza', 'chrobryglogow', 'slaskwroclaw', 'wartapoznan', 'widzewlodz',
        'ruchchorzow', 'legiawarszawa', 'odraopole', 'lechiagdansk', 'radomiakradom', 'rakowczestochowa',
        'stalmielec', 'zaglebielubin',
    ];

    private $NonExistingclubs = [
        'spojniakepy', 'lakers', 'ChicagoBulls', 'barcelona', 'torontoraptors'
    ];

    public function testItCreatesClubsTables()
    {
        foreach ($this->clubs as $table) {
            $this->assertTrue(Schema::hasTable($table));
            $this->assertTrue(Schema::hasColumns($table, [
                'id', 'name', 'positive', 'negative', 'url_logo', 'created_at', 'updated_at'
            ]));
        }
    }
    public function testItThrowsExceptionForNonExistingTable()
    {
        foreach ($this->NonExistingclubs as $table) {
            $this->assertFalse(Schema::hasTable($table));
            $this->assertFalse(Schema::hasColumns($table, [
                'id', 'name', 'positive', 'negative', 'url_logo', 'created_at', 'updated_at'
            ]));
        }
    }
}
