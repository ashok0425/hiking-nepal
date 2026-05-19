<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        Storage::disk('public')->makeDirectory('team_photos');
        $teams = [
            [
                'name' => 'Ashim Wagle',
                'position' => 'Chairman',
                'comment' => "Ashim Wagle is a young visionary mind who is laying the foundation for Hiking Nepal. With new enthusiasm in the travel and tourism industry, his wisdom guides every major decision. A firm believer in sustainable tourism, Ashim has worked tirelessly to promote Nepal's untouched corners while preserving local cultures and environments. When he's not in meetings, you'll find him travelling in remote areas, staying connected to the land that inspired this journey.",
                'sort_order' => 1,
            ],
            [
                'name' => 'Navaraj Wagle',
                'position' => 'Managing Director',
                'comment' => "The heartbeat of Hiking Nepal's operations, Navaraj Wagle, brings unmatched energy and leadership to the team. With hands-on experience in managing complex trekking logistics and a keen eye for detail, he ensures each trip runs smoothly and efficiently. He's known for his warm hospitality and is often the first to welcome trekkers in Kathmandu. Navaraj also mentors new guides, instilling a culture of respect, safety, and service that defines every Hiking Nepal trip.",
                'sort_order' => 2,
            ],
            [
                'name' => 'Kartavya Basnet',
                'position' => 'Marketing Manager',
                'comment' => "A passionate storyteller and creative strategist, Kartavya is the voice of Hiking Nepal. With a background in media, branding, and tourism promotion, he transforms local experiences into inspiring global narratives. Whether it's crafting compelling social media content or fine-tuning the brand's digital strategy, Kartavya ensures that Hiking Nepal reaches the right audience with authenticity and heart. He's also a trekking enthusiast who believes every post should come from the trail, not a boardroom.",
                'sort_order' => 3,
            ],
            [
                'name' => 'Pem Chhotar Sherpa',
                'position' => 'Expedition Guide',
                'comment' => "If the mountains had a guardian, it would be Pem Chhotar Sherpa. With over 25 years of experience guiding some of the most challenging climbs in Nepal, Pem is a high-altitude expert with nerves of steel and a heart of gold. Known for his calm under pressure and profound knowledge of the mountains, he has guided expeditions to Mera Peak, Island Peak, and beyond. Clients trust him with their lives, and always leave with newfound respect for the Himalayas and the humble man who leads them.",
                'sort_order' => 4,
            ],
            [
                'name' => 'Pampha Shrestha',
                'position' => 'Accounts Manager',
                'comment' => "Precise, reliable, and deeply organised, Pampha is the steward of our financial systems. She handles everything from client payments to team payroll with clarity and accountability. But beyond numbers, Pampha also brings empathy to her role, ensuring our operations are fair, transparent, and supportive of both our clients and guides. Her dedication keeps Hiking Nepal grounded and growing.",
                'sort_order' => 5,
            ],
            [
                'name' => 'Shova Thapa Magar',
                'position' => 'Office Assistant',
                'comment' => "Behind every successful expedition is someone making sure everything is in place, and that's Shova. From coordinating bookings and preparing permits to answering last-minute queries, Shova is the calm, kind presence that holds the office together. Her deep understanding of both logistics and hospitality ensures that every client receives the care and attention they deserve, even before they step on the trail.",
                'sort_order' => 6,
            ],
            [
                'name' => 'Santosh Wagle',
                'position' => 'Trekking Guide',
                'comment' => "Santosh is the guide everyone remembers long after the trek ends. With a deep love for Nepal's landscapes and heritage, he brings every route to life through stories, smiles, and shared moments. Whether leading a sunrise hike in Ghorepani or helping a group navigate the Thorong La pass, he ensures every trekker feels both safe and inspired. His friendly nature and cultural insights turn a trek into a meaningful journey.",
                'sort_order' => 7,
            ],
            [
                'name' => 'Om Prakash Lamichhane',
                'position' => 'Trekking Guide',
                'comment' => "Om is known for his patience, professionalism, and an uncanny ability to make anyone feel at ease on the trail. A veteran of both popular routes and lesser-known paths, he has led treks from Everest to Dolpo with the same calm precision. His guests often say, \"We didn't just get a guide—we made a friend.\" Om ensures every step taken in the Himalayas is filled with confidence and joy.",
                'sort_order' => 8,
            ],
            [
                'name' => 'Shobit Karki',
                'position' => 'Trekking Guide',
                'comment' => "Energetic and encouraging, Shobit thrives on motivating trekkers to push their limits while enjoying every moment. His knowledge of flora, fauna, and local history brings added depth to every hike. Whether it's a quick day trip near Kathmandu or a two-week remote circuit, Shobit adapts to his group's pace and personality, making each trek unique and rewarding.",
                'sort_order' => 9,
            ],
            [
                'name' => 'Padam Katuwal',
                'position' => 'Trekking Guide',
                'comment' => "With years of guiding experience and a personality that calms even the most anxious traveller, Padam is the definition of steady and reliable. He has a deep understanding of terrain and weather patterns, and always ensures the group is well-prepared. Many trekkers say his warm tea and words of encouragement at tough passes are what got them through the hardest days.",
                'sort_order' => 10,
            ],
            [
                'name' => 'Purushottam Neupane',
                'position' => 'Trekking Guide',
                'comment' => "Purushottam combines a love for nature with a deep spiritual connection to the Himalayas. His treks often include quiet moments of reflection, storytelling by firelight, and insights into Nepal's spiritual landscape. He specialises in culturally rich routes like Gosaikunda and Helambu, making him a favourite for travellers who want more than just views, they want meaning.",
                'sort_order' => 11,
            ],
        ];

        foreach ($teams as $index => $team) {
            $imageNumber = $index + 1;
            $sourcePath = public_path("team/team{$imageNumber}.webp");

            if (File::exists($sourcePath)) {
                $storagePath = "team_photos/team{$imageNumber}.webp";
                Storage::disk('public')->put($storagePath, File::get($sourcePath));
                $team['photo'] = $storagePath;
            }

            TeamMember::create($team);
        }
    }
}
