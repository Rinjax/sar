<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'firstname' => 'Steve',
                'surname' => 'Temple',
                'email' => 'steve.temple@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD03',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Steve',
                'surname' => 'Ball',
                'email' => 'steve.ball@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD24',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Steve',
                'surname' => 'Woods',
                'email' => 'steve.Woods@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD09',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Steve',
                'surname' => 'Bavin',
                'email' => 'steve.bavin@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD00',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'June',
                'surname' => 'Felstead',
                'email' => 'june.felstead@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD14',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Sharon',
                'surname' => 'Plowright',
                'email' => 'sharon.plowright@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD10',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Lu',
                'surname' => 'Dash',
                'email' => 'lu.dash@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD16',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Darren',
                'surname' => 'Yeates',
                'email' => 'darren.yeates@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD12',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Scot',
                'surname' => 'Grant',
                'email' => 'scot.grant@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD20',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Jeff',
                'surname' => 'Sasse',
                'email' => 'jeff.sasse@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD10',
                'active' => 1,
                'status' => 'Non Operational'
            ],[
                'firstname' => 'Jae',
                'surname' => 'Wilkes',
                'email' => 'jae.wilkes@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD00',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Sally',
                'surname' => 'Bourn',
                'email' => 'sall.bourn@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD00',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Vicky',
                'surname' => 'Grylls',
                'email' => 'vicky.grylls@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD23',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Justine',
                'surname' => 'Miller',
                'email' => 'justine.miller@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD01',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Nigel',
                'surname' => 'Kingston',
                'email' => 'nigel.kingston@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD25',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Anna',
                'surname' => 'Nussey',
                'email' => 'anna.nussey@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD00',
                'active' => 1,
                'status' => 'Training'
            ],[
                'firstname' => 'Cathy',
                'surname' => 'Neylan',
                'email' => 'cathy.neylan@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD00',
                'active' => 1,
                'status' => 'Non Operational'
            ],[
                'firstname' => 'Richard',
                'surname' => 'Betts',
                'email' => 'richard.betts@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD00',
                'active' => 1,
                'status' => 'Operational'
            ],[
                'firstname' => 'Liz',
                'surname' => 'Daddy',
                'email' => 'liz.daddy@searchdogssussex.com',
                'contact' => '07777777777',
                'callsign' => 'SD00',
                'active' => 1,
                'status' => 'Operational'
            ]
        ]);

        DB::table('dogs')->insert([
            [
                'member_id' => 1,
                'name' => 'Merlin',
                'profile_pic' => 'default.png',
                'breed' => 'Border Collie',
                'started' => date('Y-m-d'),
                'level' => 1,
                'status' => 'Training',
                'active' => 1
            ],[
                'member_id' => 2,
                'name' => 'Cain',
                'profile_pic' => 'default.png',
                'breed' => 'Border Collie',
                'started' => date('Y-m-d'),
                'level' => 2,
                'status' => 'Operational',
                'active' => 1
            ],[
                'member_id' => 5,
                'name' => 'Molly',
                'profile_pic' => 'default.png',
                'breed' => 'Border Collie',
                'started' => date('Y-m-d'),
                'level' => 2,
                'status' => 'Operational',
                'active' => 1
            ],[
                'member_id' => 3,
                'name' => 'Ace',
                'profile_pic' => 'default.png',
                'breed' => 'Border Collie',
                'started' => date('Y-m-d'),
                'level' => 2,
                'status' => 'Operational',
                'active' => 1
            ],[
                'member_id' => 8,
                'name' => 'Millie',
                'profile_pic' => 'default.png',
                'breed' => 'Springer Spaniel',
                'started' => date('Y-m-d'),
                'level' => 3,
                'status' => 'Operational',
                'active' => 1
            ],[
                'member_id' => 12,
                'name' => 'Harley',
                'profile_pic' => 'default.png',
                'breed' => 'Springer Spaniel',
                'started' => date('Y-m-d'),
                'level' => 1,
                'status' => 'Training',
                'active' => 1
            ],[
                'member_id' => 1,
                'name' => 'Spice',
                'profile_pic' => 'default.png',
                'breed' => 'Vizsla',
                'started' => date('Y-m-d'),
                'level' => 1,
                'status' => 'Training',
                'active' => 1
            ],[
                'member_id' => 1,
                'name' => 'Rowan',
                'profile_pic' => 'default.png',
                'breed' => 'Flat Coat',
                'started' => date('Y-m-d'),
                'level' => 1,
                'status' => 'Training',
                'active' => 1
            ]
        ]);

        DB::table('roles')->insert([
            [
                'role' => 'admin'
            ],[
                'role' => 'Assessor'
            ],[
                'role' => 'Callout CoOrdinator'
            ],[
                'role' => 'Chairman'
            ],[
                'role' => 'Dog Handler'
            ],[
                'role' => 'Equipment Officer'
            ],[
                'role' => 'Fund Raising Officer'
            ],[
                'role' => 'Medical Officer'
            ],[
                'role' => 'Operational Training Officer'
            ],[
                'role' => 'Search Planner'
            ],[
                'role' => 'Search Technician'
            ],[
                'role' => 'Secretary'
            ],[
                'role' => 'Team Leader'
            ],[
                'role' => 'Technology Officer'
            ],[
                'role' => 'Training Officer'
            ]
        ]);

        DB::table('training_locations')->insert([
            [
                'name' => 'Ambersham Common',
                'gridRef' => 'SU 01340 19523',
                'postcode' => 'GU29 0BZ',
                'lat' => '50.9713286',
                'lng' => '-0.7225869297981262'
            ],[
                'name' => 'Duncton Common',
                'gridRef' => 'SU 94918 18705',
                'postcode' => 'GU28 0QP',
                'lat' => '50.9600206',
                'lng' => '-0.6503445'
            ],[
                'name' => 'Iping Common',
                'gridRef' => 'SU 85253 22002',
                'postcode' => 'GU29 0JT',
                'lat' => '50.9713286',
                'lng' => '-0.7225869297981262'
            ],[
                'name' => 'Great Walstead',
                'gridRef' => 'TQ 36567 24879',
                'postcode' => 'RH16 2QLZ',
                'lat' => '51.0069941',
                'lng' => '-0.0572117'
            ],[
                'name' => 'Eartham Common',
                'gridRef' => 'SU 93852 10685',
                'postcode' => 'PO18 0NA',
                'lat' => '50.8880396',
                'lng' => '-0.6658524'
            ],[
                'name' => 'Ashdown Forest - Box',
                'gridRef' => ' 	TQ 2222 2222',
                'postcode' => 'RH18 5JL',
                'lat' => '51.0401114',
                'lng' => '0.0813023'
            ],[
                'name' => 'Ashdown Forest - Twyford',
                'gridRef' => ' 	TQ 2222 2222',
                'postcode' => 'RH18 5JL',
                'lat' => '51.0401114',
                'lng' => '0.0813023'
            ],[
                'name' => 'Loxwood',
                'gridRef' => ' 	TQ 2222 2222',
                'postcode' => 'RH14 0RP',
                'lat' => '51.076135',
                'lng' => '-0.494550'
            ],[
                'name' => 'Parham',
                'gridRef' => ' 	TQ 2222 2222',
                'postcode' => 'RH20 4HR',
                'lat' => '50.926487',
                'lng' => '-0.490225'
            ]
        ]);

        DB::table('calendar_types')->insert([
            [
                'name' => 'Training',
                'type_id' => 0,
            ],[
                'name' => 'Mock Assessments',
                'type_id' => 1,
            ],[
                'name' => 'Fund Raising',
                'type_id' => 2,
            ]
        ]);

        DB::table('assessment_types')->insert([
            [
                'name' => 'L2 Day Mock',
                'type_id' => 0,
            ],[
                'name' => 'L2 Night Mock',
                'type_id' => 1,
            ],[
                'name' => 'L3 Day Mock',
                'type_id' => 2,
            ],[
                'name' => 'L3 Night Mock',
                'type_id' => 3,
            ]
        ]);

        DB::table('member_roles')->insert([
            [
                'member_id' => 1,
                'roles_id' => 9
            ]
        ]);

        DB::table('permissions')->insert([
            [
                'permission' => 'dev',
                'permission' => 'admin',
                'permission' => 'dog',
                'permission' => 'calendar admin',
                'permission' => 'location admin',

            ]
        ]);
        
    }
}
