 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plan_id');
            $table->string('cnpj')->unique();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();

            //Tenant status(If it was inactive "N" it has no access anymore)
            $table->enum('active', ['Y', 'N'])->default('Y');

            //Subscription
            $table->date('subscription')->nullable(); //Date that was subscribed
            $table->date('expires_at')->nullable(); //Date the access expires
            $table->string('subscription_id', 255)->nullable(); //Indentify of Geteway
            $table->boolean('subscription_active')->default(false); //Active subscription by default
            $table->boolean('subscription_suspended')->default(false); //Subscription canceled

            $table->timestamps();

            //FK
            $table->foreign('plan_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
