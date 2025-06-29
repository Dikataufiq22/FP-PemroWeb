<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign key to products table
            $table->string('product_name'); // Name of the product
            $table->decimal('product_price', 10, 2); // Price of the product
            $table->integer('quantity'); // Quantity of the product
            $table->date('start_date'); // Booking start date
            $table->date('end_date'); // Booking end date
            $table->enum('pickup_method', ['pickup', 'delivery']); // Pickup method
            $table->string('delivery_address')->nullable(); // Delivery address (nullable)
            $table->string('store_location')->nullable(); // Store location (nullable)
            $table->string('full_name'); // Full name of the customer
            $table->string('email'); // Email of the customer
            $table->string('phone'); // Phone number of the customer
            $table->string('id_number'); // ID number of the customer
            $table->text('address'); // Address of the customer
            $table->string('emergency_name'); // Emergency contact name
            $table->string('emergency_phone'); // Emergency contact phone
            $table->text('special_notes')->nullable(); // Special notes (nullable)
            $table->enum('status', ['pending', 'confirmed', 'canceled']); // Booking status
            $table->decimal('total_price', 10, 2); // Total price of the booking
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
