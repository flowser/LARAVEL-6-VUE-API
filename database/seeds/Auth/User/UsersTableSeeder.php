<?php


use App\Models\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // teif senior staff
        //1
        User::create([
            'first_name'        => 'Eng. Felix',
            'last_name'         => 'Nyachio',
            'email'             => 'felixnyachio@gmail.com',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
        ]); //2
        User::create([
            'first_name'        => 'Dr. Fred',
            'last_name'         => 'Mwamba',
            'email'             => 'fredmwamba6teen@gmail.com',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
        ]); //3
        User::create([
            'first_name'        => 'Ben',
            'last_name'         => 'Otieno',
            'email'             => 'benotieno@gmail.com',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
        ]); //4
        User::create([
            'first_name'        => 'james',
            'last_name'         => 'Oliz',
            'email'             => 'jamesoliz@gmail.com',
            'password'          => Hash::make('flx4life'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
        ]); //5
    }
}

// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: ruthmutinda@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: lewismichira@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: ogurokoth@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: konditi@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: mary@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: jumakim@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: josephnyakundi@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: josephkaruri@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: mugo@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: elly@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: dancunmaina@teiffoundation.tukenya.ac.ke
//      password: secret
// Kindly login and change your password effectively and update your profile as it's live online, upload your good image, and other details, let me know if anything comes up,
// let us join hands in the marketing strategy, I will form a WhatsApp group where we can discuss the way forward with our forward on how we can all gain together
// the foundation domain link= https://teiffoundation.tukenya.ac.ke
// your email: jerentabo@teiffoundation.tukenya.ac.ke
//      password: secret
