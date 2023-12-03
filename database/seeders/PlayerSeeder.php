<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Player;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 0 - EXP, 1 - Jungler, 2 - Mid, 3 - Gold, 4 - Roamer
        $players = [

            // EXP LANER (ROLE 0)
            ['name' => 'Markinho', 'team' => 1, 'nationality' => 'Argentina', 'role' => 0, 'picture' => 'https://drive.google.com/file/d/1l54oq9p5UN1HWDLbmKQ-LBilQynJ9k3b/view?usp=drive_link'],
            ['name' => 'Smooth', 'team' => 2, 'nationality' => 'Malaysia', 'role' => 0, 'picture' => 'https://drive.google.com/file/d/1-C8apvhLz6Q-7x8BZ5h2tqqFPff3yKPe/view?usp=drive_link'],
            ['name' => 'Castle', 'team' => 3, 'nationality' => 'Russia', 'role' => 0, 'picture' => 'https://drive.google.com/file/d/1l_y12ltVgr3KKYaUZmQk9nX39psQrC6L/view?usp=drive_link'],
            ['name' => 'Masarap', 'team' => 4, 'nationality' => 'Nepal', 'role' => 0, 'picture' => 'https://drive.google.com/file/d/1WrvmjIxRErbTrZ-ORW3benR-NIT0BO3P/view?usp=drive_link'],
            ['name' => 'Juviana', 'team' => 5, 'nationality' => 'Laos', 'role' => 0, 'picture' => 'https://drive.google.com/file/d/1F-QiPeiTC9gLRlfcgTBCXxv5f0iaW7Db/view?usp=drive_link'],
            ['name' => 'JVCKKK', 'team' => 5, 'nationality' => 'Laos', 'role' => 0, 'picture' => 'https://drive.google.com/file/d/1mv1xZppKYihFzADDxuc_ThumPIfJup89/view?usp=drive_link'],
            ['name' => 'Aizn', 'team' => 6, 'nationality' => 'Mongolia', 'role' => 0, 'picture' => 'https://drive.google.com/file/d/1lJ4dcMrmjdjfugT4X68h-eA81q5h_PMI/view?usp=drive_link'],
            ['name' => 'Hulk', 'team' => 7, 'nationality' => 'Saudi Arabia', 'role' => 0, 'picture' => 'https://drive.google.com/file/d/1MiZcHbncNstSKHrWknNkAyud7OVM0I17/view?usp=drive_link'],
            ['name' => 'Siyu', 'team' => 8, 'nationality' => 'China', 'role' => 0, 'picture' => 'https://drive.google.com/file/d/1Klwf-jV7QTXzTUvemuXk9WO5T5NDpljv/view?usp=drive_link'],
            ['name' => 'MrLi', 'team' => 6, 'nationality' => 'Mongolia', 'role' => 0, 'picture' => ''],
            

            // JUNGLER (ROLE 1)
            ['name' => 'AURORAA', 'team' => 1, 'nationality' => 'Argentina', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1lLWjoSkzjs0JbQiHH5e7QdGrvyQ5JSFS/view?usp=drive_link'],
            ['name' => 'RANSSIO', 'team' => 1, 'nationality' => 'Argentina', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1FXh5De-GAZDxhxTb4IYmUkXI_amonoT4/view?usp=drive_link'],
            ['name' => 'Saxa', 'team' => 2, 'nationality' => 'Philippines', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1kYa1rm-tN50FjTDC2mER58T-m-mlfPMn/view?usp=drive_link'],
            ['name' => 'Subway', 'team' => 2, 'nationality' => 'Malaysia', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1Q7sxh4fio-nUycn_ncyySTyRRtVk7KaA/view?usp=drive_link'],
            ['name' => 'Marl', 'team' => 3, 'nationality' => 'Russia', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1Fc3yGOdqQhQbrkVEgeG9g5M0FU9pQTpb/view?usp=drive_link'],
            ['name' => 'Fangor', 'team' => 3, 'nationality' => 'Russia', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1_4Tk2jOuAYviyad6lrNNCIGVuczWn4le/view?usp=drive_link'],
            ['name' => 'LunaticPanda', 'team' => 4, 'nationality' => 'Nepal', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1NqCEt9WDl-7hBnvaXzLe5eQiUeiCLGkz/view?usp=drive_link'],
            ['name' => '2Ez4Lexxy', 'team' => 5, 'nationality' => 'Laos', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1vOSmo5qz07HwaS1M47aRUTy0Y57jxWrv/view?usp=drive_link'],
            ['name' => 'Zxaura', 'team' => 6, 'nationality' => 'Mongolia', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1khWJLWixLIMSMNFq8xrUlbMhQ5RogUR8/view?usp=drive_link'],
            ['name' => 'MrLi', 'team' => 6, 'nationality' => 'Mongolia', 'role' => 1, 'picture' => ''],
            ['name' => 'Lio', 'team' => 7, 'nationality' => 'Egypt', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1hkNdbfFRDApn5GCNeJGs9gc-ttucR2He/view?usp=drive_link'],
            ['name' => 'Simba', 'team' => 8, 'nationality' => 'China', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/1n6Dtjr625ovaIqfLrs0vE4_uEcQ1IF_D/view?usp=drive_link'],
            ['name' => 'Past', 'team' => 8, 'nationality' => 'China', 'role' => 1, 'picture' => 'https://drive.google.com/file/d/16urRROejT_MXJmAeObDqkLGodkWG6H8p/view?usp=drive_link'],

            // MIDLANER (ROLE 2)
            ['name' => 'FESHIN', 'team' => 1, 'nationality' => 'Argentina', 'role' => 2, 'picture' => 'https://drive.google.com/file/d/1b0xa1qsHwsarB7AS5i_TG5D1PmW404mI/view?usp=drive_link'],
            ['name' => 'Mirror', 'team' => 1, 'nationality' => 'Argentina', 'role' => 2, 'picture' => 'https://drive.google.com/file/d/1-OwUDKefo9GhZc3IeCkfnSdZA2ygBzj1/view?usp=drive_link'],
            ['name' => 'Stormie', 'team' => 2, 'nationality' => 'Malaysia', 'role' => 2, 'picture' => 'https://drive.google.com/file/d/1OILpp8gmxbNIz1Zh7NLpO-0DRKNPdxwx/view?usp=drive_link'],
            ['name' => 'Troublemaker', 'team' => 3, 'nationality' => 'Russia', 'role' => 2, 'picture' => 'https://drive.google.com/file/d/1KKmGtvJibgHB0wDIQGDyzOJZge86LXEA/view?usp=drive_link'],
            ['name' => 'Xerox', 'team' => 4, 'nationality' => 'Nepal', 'role' => 2, 'picture' => 'https://drive.google.com/file/d/1t0Lix_Ldl1KDZLB0lpar3PmPU6rrCMi9/view?usp=drive_link'],
            ['name' => 'Sosoul', 'team' => 5, 'nationality' => 'Laos', 'role' => 2, 'picture' => 'https://drive.google.com/file/d/1kYa1rm-tN50FjTDC2mER58T-m-mlfPMn/view?usp=drive_link'],
            ['name' => 'Forbid', 'team' => 6, 'nationality' => 'Mongolia', 'role' => 2, 'picture' => 'https://drive.google.com/file/d/1lJ4dcMrmjdjfugT4X68h-eA81q5h_PMI/view?usp=drive_link'],
            ['name' => 'MrLi', 'team' => 6, 'nationality' => 'Mongolia', 'role' => 2, 'picture' => ''],
            ['name' => 'Goodnight', 'team' => 7, 'nationality' => 'Philippines', 'role' => 2, 'picture' => 'https://drive.google.com/file/d/1iaNj4PZVqjrw9ZVdwBB7xjmsVvXeqKs-/view?usp=drive_link'],
            ['name' => 'Ramez', 'team' => 7, 'nationality' => 'Saudi Arabia', 'role' => 2, 'picture' => 'https://drive.google.com/file/d/1b0xa1qsHwsarB7AS5i_TG5D1PmW404mI/view?usp=drive_link'],
            ['name' => 'LMU', 'team' => 8, 'nationality' => 'China', 'role' => 2, 'picture' => 'https://drive.google.com/file/d/1F4CFBbTmdGiNOfRj2J6QWN0IwmthM0d_/view?usp=drive_link'],

            // GOLD LANER (ROLE 3)
            ['name' => 'Yur', 'team' => 1, 'nationality' => 'Argentina', 'role' => 3, 'picture' => 'https://drive.google.com/file/d/1HpI5MkiPDbd61Q74kzEs9p9JkbdhV1Ay/view?usp=drive_link'],
            ['name' => 'SaSa', 'team' => 2, 'nationality' => 'Malaysia', 'role' => 3, 'picture' => 'https://drive.google.com/file/d/1FhNml5YYSXfJylFP8Id4NagvKozSMI7I/view?usp=drive_link'],
            ['name' => 'BlackMarch', 'team' => 3, 'nationality' => 'Russia', 'role' => 3, 'picture' => 'https://drive.google.com/file/d/1B4DqrwSDX659-fAF_YkTuduV2SHeGPsR/view?usp=drive_link'],
            ['name' => 'Yahiko', 'team' => 4, 'nationality' => 'Nepal', 'role' => 3, 'picture' => 'https://drive.google.com/file/d/1NqCEt9WDl-7hBnvaXzLe5eQiUeiCLGkz/view?usp=drive_link'],
            ['name' => 'Hybrid', 'team' => 4, 'nationality' => 'Nepal', 'role' => 3, 'picture' => 'https://drive.google.com/file/d/1t0Lix_Ldl1KDZLB0lpar3PmPU6rrCMi9/view?usp=drive_link'],
            ['name' => 'Khammy', 'team' => 5, 'nationality' => 'Laos', 'role' => 3, 'picture' => 'https://drive.google.com/file/d/1bkMiRBNLU0V7greW5d9Q3Q_hwe8v8TVT/view?usp=drive_link'],
            ['name' => 'Bebex', 'team' => 6, 'nationality' => 'Mongolia', 'role' => 3, 'picture' => 'https://drive.google.com/file/d/1khWJLWixLIMSMNFq8xrUlbMhQ5RogUR8/view?usp=drive_link'],
            ['name' => 'MrLi', 'team' => 6, 'nationality' => 'Mongolia', 'role' => 3, 'picture' => 'https://drive.google.com/file/d/1uu2Xr4o4NvIQENBH4P_qKsNnJaW2X0GJ/view?usp=drive_link'],
            ['name' => 'Lawtrick', 'team' => 7, 'nationality' => 'Philippines', 'role' => 3, 'picture' => ''],
            ['name' => 'Godyang', 'team' => 8, 'nationality' => 'China', 'role' => 3, 'picture' => 'https://drive.google.com/file/d/1WBDA-6QtjY1RQHONoKpSz5S3utZnmgec/view?usp=drive_link'],

            // ROAMER (ROLE 4)
            ['name' => 'Stephe', 'team' => 1, 'nationality' => 'Peru', 'role' => 4, 'picture' => 'https://drive.google.com/file/d/1F4CFBbTmdGiNOfRj2J6QWN0IwmthM0d_/view?usp=drive_link'],
            ['name' => 'Mikko', 'team' => 2, 'nationality' => 'Philippines', 'role' => 4, 'picture' => 'https://drive.google.com/file/d/1-C8apvhLz6Q-7x8BZ5h2tqqFPff3yKPe/view?usp=drive_link'],
            ['name' => 'AFK', 'team' => 3, 'nationality' => 'Russia', 'role' => 4, 'picture' => 'https://drive.google.com/file/d/1f9hvY5kGo-XtjToVxEX9C8T34_qbxFal/view?usp=drive_link'],
            ['name' => 'EvilKing', 'team' => 3, 'nationality' => 'Russia', 'role' => 4, 'picture' => 'https://drive.google.com/file/d/1yqH9RytxhLkB3YSjWx4ov8DOrfo4Aa2S/view?usp=drive_link'],
            ['name' => 'Clock', 'team' => 4, 'nationality' => 'Nepal', 'role' => 4, 'picture' => 'https://drive.google.com/file/d/1WrvmjIxRErbTrZ-ORW3benR-NIT0BO3P/view?usp=drive_link'],
            ['name' => 'J4zBin', 'team' => 5, 'nationality' => 'Laos', 'role' => 4, 'picture' => 'https://drive.google.com/file/d/1s0bMQsH8P44Nz-l7seI6S5OGAT9mQxN0/view?usp=drive_link'],
            ['name' => 'Ethan', 'team' => 6, 'nationality' => 'Mongolia', 'role' => 4, 'picture' => 'https://drive.google.com/file/d/1vOSmo5qz07HwaS1M47aRUTy0Y57jxWrv/view?usp=drive_link'],
            ['name' => 'MrLi', 'team' => 6, 'nationality' => 'Mongolia', 'role' => 4, 'picture' => ''],
            ['name' => 'Super', 'team' => 7, 'nationality' => 'Jordan', 'role' => 4, 'picture' => 'https://drive.google.com/file/d/1l54oq9p5UN1HWDLbmKQ-LBilQynJ9k3b/view?usp=drive_link'],
            ['name' => 'Tides', 'team' => 8, 'nationality' => 'China', 'role' => 4, 'picture' => 'https://drive.google.com/file/d/1q4DdIHzAzKeamv1cvYRi4H4BuEcsYwfG/view?usp=drive_link'],
        ];


        Player::insert($players);
        
        
    }
}
