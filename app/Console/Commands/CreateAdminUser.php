<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create {--email=} {--password=} {--name=}';

    protected $description = 'Create a new admin user for the application';

    public function handle()
    {
        $this->info('Creating Admin User...');
        $this->newLine();

        // Get user input
        $name = $this->option('name') ?: $this->ask('Enter admin name', 'Admin');
        $email = $this->option('email') ?: $this->ask('Enter admin email', 'admin@csaeducation.in');
        $password = $this->option('password') ?: $this->secret('Enter admin password (min 8 characters)');

        // Validate input
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            $this->error('Validation failed:');
            foreach ($validator->errors()->all() as $error) {
                $this->error('- ' . $error);
            }
            return 1;
        }

        // Create user
        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]);

            $this->newLine();
            $this->info('✓ Admin user created successfully!');
            $this->newLine();
            $this->table(
                ['Field', 'Value'],
                [
                    ['Name', $user->name],
                    ['Email', $user->email],
                    ['Password', str_repeat('*', strlen($password))],
                ]
            );
            $this->newLine();
            $this->info('You can now login at: ' . url('/admin'));
            $this->warn('Please keep these credentials safe!');

            return 0;
        } catch (\Exception $e) {
            $this->error('Failed to create admin user: ' . $e->getMessage());
            return 1;
        }
    }
}
