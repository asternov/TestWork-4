<?php

use Illuminate\Database\Migrations\Migration;

class RunSeeds extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

      Artisan::call('db:seed', [
          '--class' => \Database\Seeders\PostsTableSeeder::class,
          '--force' => true,
      ]);

      Artisan::call('db:seed', [
          '--class' => \Database\Seeders\UsersTableSeeder::class,
          '--force' => true,
      ]);
  }
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
  }
}
