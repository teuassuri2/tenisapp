<?php

                use Illuminate\Database\Migrations\Migration;
                use Illuminate\Database\Schema\Blueprint;
                use Illuminate\Support\Facades\Schema;

                return new class extends Migration
                {
                    /**
                     * Run the migrations.
                     *
                     * @return void
                     */
                    public function up()
                    {
                        Schema::create("group_day", function (Blueprint $table) {
                            $table->id();$table->integer("day"); 
 
$table->unsignedBigInteger("group_id"); 
 
$table->foreign("group_id")->references("id")->on("group"); 
 

                            $table->timestamps();
                        });
                    }

                    /**
                     * Reverse the migrations.
                     *
                     * @return void
                     */
                    public function down()
                    {
                        Schema::dropIfExists("group_day");
                    }
                };
                