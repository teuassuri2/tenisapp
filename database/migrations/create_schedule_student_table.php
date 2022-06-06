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
                        Schema::create("schedule_student", function (Blueprint $table) {
                            $table->id();$table->date("date"); 
 
$table->integer("presence_absence"); 
 
$table->integer("status"); 
 
$table->unsignedBigInteger("user_id"); 
 
$table->foreign("user_id")->references("id")->on("user"); 
 
$table->unsignedBigInteger("group_student_id"); 
 
$table->foreign("group_student_id")->references("id")->on("group_student"); 
 
$table->unsignedBigInteger("schedule_student_id"); 
 
$table->foreign("schedule_student_id")->references("id")->on("schedule_student"); 
 

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
                        Schema::dropIfExists("schedule_student");
                    }
                };
                