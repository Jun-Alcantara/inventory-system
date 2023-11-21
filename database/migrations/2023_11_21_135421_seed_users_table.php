<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        User::create([
            'name' => 'Cornelio Ganancial',
            'username' => 'cornelio.ganancial',
            'email' => 'cornelio.ganancial@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::whereUsername('cornelio.ganancial')
            ->delete();
    }
};
