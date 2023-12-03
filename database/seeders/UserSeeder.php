<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createMultipleUsers  = [
            ['name' => 'Alice Johnson', 'phone' => '0187673729', 'email' => 'alice.johnson@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'CyberWarrior', 'team_name' => 'TeamXtreme', 'team_logo' => 'bladintor.png'],
            ['name' => 'Bob Williams', 'phone' => '0187673729', 'email' => 'bob.williams@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'ShadowGamer', 'team_name' => 'PhoenixRiders', 'team_logo' => 'bladintor.png'],
            ['name' => 'Charlie Davis', 'phone' => '0187673729', 'email' => 'charlie.davis@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'SteelAssassin', 'team_name' => 'DarkVortex', 'team_logo' => 'bladintor.png'],
            ['name' => 'David Brown', 'phone' => '0187673729', 'email' => 'david.brown@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'QuantumReaper', 'team_name' => 'EternalTitans', 'team_logo' => 'bladintor.png'],
            ['name' => 'Eva Miller', 'phone' => '0187673729', 'email' => 'eva.miller@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'LunarSpectre', 'team_name' => 'GalacticWarriors', 'team_logo' => 'bladintor.png'],
            ['name' => 'Frank Harris', 'phone' => '0187673729', 'email' => 'frank.harris@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'NebulaDestroyer', 'team_name' => 'StarCrusaders', 'team_logo' => 'bladintor.png'],
            ['name' => 'Grace Jackson', 'phone' => '0187673729', 'email' => 'grace.jackson@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'RogueSorcerer', 'team_name' => 'ThunderWolves', 'team_logo' => 'bladintor.png'],
            ['name' => 'Henry Lee', 'phone' => '0187673729', 'email' => 'henry.lee@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'BlazeChampion', 'team_name' => 'InfernoDragons', 'team_logo' => 'bladintor.png'],
            ['name' => 'Ivy Robinson', 'phone' => '0187673729', 'email' => 'ivy.robinson@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'QuantumSniper', 'team_name' => 'NuclearRebels', 'team_logo' => 'bladintor.png'],
            ['name' => 'Jack Turner', 'phone' => '0187673729', 'email' => 'jack.turner@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'SonicVigilante', 'team_name' => 'VelocitySpartans', 'team_logo' => 'bladintor.png'],
            ['name' => 'Kai Griffin', 'phone' => '0187673729', 'email' => 'kai.griffin@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'NeonPhoenix', 'team_name' => 'DigitalReckoners', 'team_logo' => 'bladintor.png'],
            ['name' => 'Lily Turner', 'phone' => '0187673729', 'email' => 'lily.turner@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'ShadowFox', 'team_name' => 'NightshadeLegends', 'team_logo' => 'bladintor.png'],
            ['name' => 'Max Blaze', 'phone' => '0187673729', 'email' => 'max.blaze@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'InfernoBlitz', 'team_name' => 'BlazingStorms', 'team_logo' => 'bladintor.png'],
            ['name' => 'Nina Steel', 'phone' => '0187673729', 'email' => 'nina.steel@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'SteelWarp', 'team_name' => 'IronGuardians', 'team_logo' => 'bladintor.png'],
            ['name' => 'Oliver Storm', 'phone' => '0187673729', 'email' => 'oliver.storm@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'ThunderRogue', 'team_name' => 'StormRaiders', 'team_logo' => 'bladintor.png'],
            ['name' => 'Penny Swift', 'phone' => '0187673729', 'email' => 'penny.swift@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'SwiftVortex', 'team_name' => 'WindSprinters', 'team_logo' => 'bladintor.png'],
            ['name' => 'Quinn Frost', 'phone' => '0187673729', 'email' => 'quinn.frost@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'FrozenFury', 'team_name' => 'IceCatalysts', 'team_logo' => 'bladintor.png'],
            ['name' => 'Riley Blaze', 'phone' => '0187673729', 'email' => 'riley.blaze@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'BlazeRaptor', 'team_name' => 'FirestormChampions', 'team_logo' => 'bladintor.png'],
            ['name' => 'Sasha Storm', 'phone' => '0187673729', 'email' => 'sasha.storm@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'StormBreaker', 'team_name' => 'ThunderBlitz', 'team_logo' => 'bladintor.png'],
            ['name' => 'Toby Thunder', 'phone' => '0187673729', 'email' => 'toby.thunder@example.com', 'password' => bcrypt('@dmin123'), 'username' => 'ThunderStriker', 'team_name' => 'ElectricTitans', 'team_logo' => 'bladintor.png'],
        ];

        User::insert($createMultipleUsers);
    }
}
