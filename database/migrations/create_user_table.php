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
                        Schema::create("user", function (Blueprint $table) {
                            $table->id();$table->string("name"); 
 
$table->string("phone"); 
 
$table->string("email"); 
 
$table->string("remember_token"); 
 
$table->string("password"); 
 
 
 
$table->unsignedBigInteger("client_id"); 
 
$table->foreign("client_id")->references("id")->on("client"); 
 

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
                        Schema::dropIfExists("user");
                    }
                };
                