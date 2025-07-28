@extends('layouts.website')

@section('title', 'Our Team')

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="Meet the passionate and experienced team behind Hiking Nepal. Our dedicated professionals, from expert guides to support staff, work together to provide unforgettable trekking experiences in the Himalayas.">
    <meta name="keywords"
        content="hiking nepal team, nepal trekking guides, himalayan trek guides, professional trekking team nepal, experienced mountain guides nepal">
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="Our Team - Hiking Nepal">
    <meta property="og:description"
        content="Meet the passionate and experienced team behind Hiking Nepal. Our dedicated professionals, from expert guides to support staff, work together to provide unforgettable trekking experiences in the Himalayas.">
    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Our Team - Hiking Nepal">
    <meta name="twitter:description"
        content="Meet the passionate and experienced team behind Hiking Nepal. Our dedicated professionals, from expert guides to support staff, work together to provide unforgettable trekking experiences in the Himalayas.">
@endsection

@section('content')
    <x-yt-header title="Our Team" />

    <section class="container my-5 text-center">
        <h2 class="mb-5">HIKING NEPAL TEAM</h2>
        <p>Hiking Nepal isn't just a company, it's a collective of passionate explorers, dedicated professionals, and cultural storytellers. From Himalayan summits to quiet teahouses, every journey we offer is made possible by this incredible team. Get to know the people who make your dream trek a reality.</p>
    </section>
  @php
    $teams = [
        [
            'name' => 'Ashim Wagle',
            'position' => 'Chairman',
            'comment' => "Ashim Wagle is a young visionary mind who is laying the foundation for Hiking Nepal. With new enthusiasm in the travel and tourism industry, his wisdom guides every major decision. A firm believer in sustainable tourism, Ashim has worked tirelessly to promote Nepal's untouched corners while preserving local cultures and environments. When he's not in meetings, you'll find him travelling in remote areas, staying connected to the land that inspired this journey.",
        ],
        [
            'name' => 'Navaraj Wagle',
            'position' => 'Managing Director',
            'comment' => "The heartbeat of Hiking Nepal's operations, Navaraj Wagle, brings unmatched energy and leadership to the team. With hands-on experience in managing complex trekking logistics and a keen eye for detail, he ensures each trip runs smoothly and efficiently. He's known for his warm hospitality and is often the first to welcome trekkers in Kathmandu. Navaraj also mentors new guides, instilling a culture of respect, safety, and service that defines every Hiking Nepal trip.",
        ],
        [
            'name' => 'Kartavya Basnet',
            'position' => 'Marketing Manager',
            'comment' => "A passionate storyteller and creative strategist, Kartavya is the voice of Hiking Nepal. With a background in media, branding, and tourism promotion, he transforms local experiences into inspiring global narratives. Whether it's crafting compelling social media content or fine-tuning the brand's digital strategy, Kartavya ensures that Hiking Nepal reaches the right audience with authenticity and heart. He's also a trekking enthusiast who believes every post should come from the trail, not a boardroom.",
        ],
        [
            'name' => 'Pem Chhotar Sherpa',
            'position' => 'Expedition Guide',
            'comment' => "If the mountains had a guardian, it would be Pem Chhotar Sherpa. With over 25 years of experience guiding some of the most challenging climbs in Nepal, Pem is a high-altitude expert with nerves of steel and a heart of gold. Known for his calm under pressure and profound knowledge of the mountains, he has guided expeditions to Mera Peak, Island Peak, and beyond. Clients trust him with their lives, and always leave with newfound respect for the Himalayas and the humble man who leads them.",
        ],
        [
            'name' => 'Pampha Shrestha',
            'position' => 'Accounts Manager',
            'comment' => "Precise, reliable, and deeply organised, Pampha is the steward of our financial systems. She handles everything from client payments to team payroll with clarity and accountability. But beyond numbers, Pampha also brings empathy to her role, ensuring our operations are fair, transparent, and supportive of both our clients and guides. Her dedication keeps Hiking Nepal grounded and growing.",
        ],
        [
            'name' => 'Shova Thapa Magar',
            'position' => 'Office Assistant',
            'comment' => "Behind every successful expedition is someone making sure everything is in place, and that's Shova. From coordinating bookings and preparing permits to answering last-minute queries, Shova is the calm, kind presence that holds the office together. Her deep understanding of both logistics and hospitality ensures that every client receives the care and attention they deserve, even before they step on the trail.",
        ],
        [
            'name' => 'Santosh Wagle',
            'position' => 'Trekking Guide',
            'comment' => "Santosh is the guide everyone remembers long after the trek ends. With a deep love for Nepal's landscapes and heritage, he brings every route to life through stories, smiles, and shared moments. Whether leading a sunrise hike in Ghorepani or helping a group navigate the Thorong La pass, he ensures every trekker feels both safe and inspired. His friendly nature and cultural insights turn a trek into a meaningful journey.",
        ],
        [
            'name' => 'Om Prakash Lamichhane',
            'position' => 'Trekking Guide',
            'comment' => "Om is known for his patience, professionalism, and an uncanny ability to make anyone feel at ease on the trail. A veteran of both popular routes and lesser-known paths, he has led treks from Everest to Dolpo with the same calm precision. His guests often say, “We didn’t just get a guide—we made a friend.\" Om ensures every step taken in the Himalayas is filled with confidence and joy.",
        ],
        [
            'name' => 'Shobit Karki',
            'position' => 'Trekking Guide',
            'comment' => "Energetic and encouraging, Shobit thrives on motivating trekkers to push their limits while enjoying every moment. His knowledge of flora, fauna, and local history brings added depth to every hike. Whether it's a quick day trip near Kathmandu or a two-week remote circuit, Shobit adapts to his group's pace and personality, making each trek unique and rewarding.",
        ],
        [
            'name' => 'Padam Katuwal',
            'position' => 'Trekking Guide',
            'comment' => "With years of guiding experience and a personality that calms even the most anxious traveller, Padam is the definition of steady and reliable. He has a deep understanding of terrain and weather patterns, and always ensures the group is well-prepared. Many trekkers say his warm tea and words of encouragement at tough passes are what got them through the hardest days.",
        ],
        [
            'name' => 'Purushottam Neupane',
            'position' => 'Trekking Guide',
            'comment' => "Purushottam combines a love for nature with a deep spiritual connection to the Himalayas. His treks often include quiet moments of reflection, storytelling by firelight, and insights into Nepal's spiritual landscape. He specialises in culturally rich routes like Gosaikunda and Helambu, making him a favourite for travellers who want more than just views, they want meaning.",
        ],
    ];
@endphp

@foreach ($teams as $team)

    @if ($loop->odd)
         <section class="bg-light py-0 py-md-5">
        <div class="container py-5 my-5 section-bg-container">
            <img src="{{ asset('team/team'.$loop->iteration.'.webp') }}" alt="{{$team['name']}}" class="section-bg-img end-0 d-none d-md-block" style="max-width: 500px">

            <div class="row z-1">
                <div class="col-md-8">
                    <div class="brand-shadow px-3 py-5 px-md-5 bg-white">
                        <img src="{{ asset('team/team'.$loop->iteration.'.webp') }}" alt="cover image" class="d-block d-md-none img-fluid">
                        <div class="text-muted mt-4 mt-md-0">{{$team['position']}}</div>
                        <h2 class="mb-5">{{$team['name']}}</h2>

                        <p>
                            {{$team['comment']}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="my-5">
        <div class="container py-5 section-bg-container justify-content-center overflow-hidden">
 <img src="{{ asset('team/team'.$loop->iteration.'.webp') }}" alt="{{$team['name']}}" class="section-bg-img start-0 d-none d-md-block" style="max-width: 500px">
            <div class="row z-1 w-100">
                <div class="col-md-8 offset-md-4">
                    <div class="brand-shadow px-3 py-5 px-md-5 bg-white w-100">
                          <img src="{{ asset('team/team'.$loop->iteration.'.webp') }}" alt="cover image" class="d-block d-md-none img-fluid">
                        <div class="text-muted mt-4 mt-md-0">{{$team['position']}}</div>
                        <h2 class="mb-5">{{$team['name']}}</h2>

                        <p>
                            {{$team['comment']}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endforeach



    @include('inc.discover')
    @include('inc.book-a-call-cta')
@endsection
