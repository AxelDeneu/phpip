<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassifierTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classifier_type', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->char('code', 5)->primary();
			$table->string('type', 45);
			$table->boolean('main_display')->default(0)->comment('Indicates whether to display as main information');
			$table->char('for_category', 5)->nullable()->comment('For showing in the pick-lists of only the selected category');
			$table->boolean('display_order')->nullable()->default(127);
			$table->string('notes', 160)->nullable();
			$table->string('creator', 20)->nullable();
			$table->timestamp('updated')->nullable()->useCurrent();
			$table->string('updater', 20)->nullable();
			$table->unique(['for_category','code'], 'for_category');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('classifier_type');
	}

}
