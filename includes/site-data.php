<?php

return [
    'navLinks' => [
        ['label' => 'Home', 'href' => 'index.php#home', 'page' => 'home'],
        ['label' => 'About', 'href' => 'about.php', 'page' => 'about'],
        ['label' => 'Programs', 'href' => 'classes.php', 'page' => 'classes'],
        ['label' => 'Contact', 'href' => 'contact.php', 'page' => 'contact'],
        ['label' => 'Stories', 'href' => 'index.php#stories', 'page' => 'stories'],
    ],
    'contactInfo' => [
        'phone' => '+94715449509',
        'phone_display' => '071 544 9509',
        'address' => 'Wallawaththa, Colombo',
        'email' => 'info@fitnesstime.com',
    ],
    'services' => [
        [
            'number' => '01',
            'title' => 'Strength Training',
            'description' => 'Build lean muscle with progressive programming and hands-on coaching in every session.',
        ],
        [
            'number' => '02',
            'title' => 'Mobility Reset',
            'description' => 'Restore your range of motion and stay injury free with guided mobility and recovery work.',
        ],
        [
            'number' => '03',
            'title' => 'Performance Tracking',
            'description' => 'Smart dashboards help you see progress, celebrate wins, and adjust your plan with your coach.',
        ],
        [
            'number' => '04',
            'title' => 'Nutrition Coaching',
            'description' => 'Dial in your fueling with practical guidance so your training, sleep, and recovery align.',
        ],
    ],
    'popularClasses' => [
        ['title' => 'Strength Foundations', 'subtitle' => 'Perfect for new members'],
        ['title' => 'HIIT Burn', 'subtitle' => 'Fast-paced interval work'],
        ['title' => 'Powerlifting Club', 'subtitle' => 'Coached heavy lifts'],
        ['title' => 'Engine Ride', 'subtitle' => 'High-energy spin'],
        ['title' => 'Pilates Core', 'subtitle' => 'Mindful strength work'],
        ['title' => 'Metabolic Conditioning', 'subtitle' => 'Full-body circuits'],
        ['title' => 'Sunday Recovery', 'subtitle' => 'Mobility and breathwork'],
        ['title' => 'Strength For Women', 'subtitle' => 'Coached lifting crew'],
    ],
    'mentors' => [
        ['name' => 'David Williams', 'role' => 'Bodybuilding Coach', 'image' => 'assets/mentor-1.jpg'],
        ['name' => 'Rosy Rivera', 'role' => 'Cardio & Conditioning', 'image' => 'assets/mentor-2.jpg'],
        ['name' => 'Matt Stonie', 'role' => 'Performance Coach', 'image' => 'assets/mentor-3.jpeg'],
    ],
    'stories' => [
        [
            'name' => 'Avery James',
            'result' => 'Lost 28 lbs in 4 months',
            'quote' => 'I thought lifting was intimidating until I met the coaches here. The confidence I feel now spills into every part of my life.',
            'image' => 'assets/mentor-1.jpg',
        ],
        [
            'name' => 'Mia Patel',
            'result' => 'First pull-up and counting',
            'quote' => 'Nutrition coaching plus the right program finally broke my plateau. I feel strong, mobile, and supported by this crew.',
            'image' => 'assets/mentor-2.jpg',
        ],
        [
            'name' => 'Jonas Reed',
            'result' => 'Half marathon PR',
            'quote' => 'Cross-training with the coaches kept me healthy through a big running season. The accountability makes all the difference.',
            'image' => 'assets/mentor-3.jpeg',
        ],
    ],
    'aboutHighlights' => [
        [
            'pill' => 'Personal coaching',
            'title' => 'Coaching with a plan',
            'description' => 'Every member receives a baseline assessment and custom program to match lifestyle, schedule, and goals.',
        ],
        [
            'pill' => 'Recovery',
            'title' => 'Mobility & breathwork',
            'description' => 'We integrate recovery sessions, guided breathwork, and mobility flows so you can keep moving pain free.',
        ],
        [
            'pill' => 'Community',
            'title' => 'Accountability built in',
            'description' => 'Small class sizes and coach-led groups give you accountability, encouragement, and a trusted crew.',
        ],
        [
            'pill' => 'Data driven',
            'title' => 'Progress you can see',
            'description' => 'We track strength, conditioning, and recovery so you know exactly how every session moves you forward.',
        ],
    ],
    'stats' => [
        ['value' => '15', 'label' => 'Years coaching in Colombo'],
        ['value' => '70+', 'label' => 'Weekly classes'],
        ['value' => '25', 'label' => 'Certified coaches'],
        ['value' => '4', 'label' => 'Dedicated recovery zones'],
    ],
    'values' => [
        ['title' => 'Community first', 'description' => 'We greet every member by name and build programs that meet them where they are.'],
        ['title' => 'Progress over perfection', 'description' => 'Small consistent steps win every time. We chase mastery, not quick fixes.'],
        ['title' => 'Inclusive training', 'description' => 'Different backgrounds, bodies, and goals all belong here. We celebrate that diversity.'],
    ],
    'classSpotlights' => [
        ['pill' => 'Strength', 'title' => 'Engine Build', 'description' => 'Foundational lifts and accessory work for anyone looking to move better and lift with confidence.', 'category' => 'strength'],
        ['pill' => 'Conditioning', 'title' => 'HIIT Burn', 'description' => 'Short bursts, smart intervals, and the accountability of a small group to keep your intensity high.', 'category' => 'conditioning'],
        ['pill' => 'Skills', 'title' => 'Olympic Lifting Lab', 'description' => 'Technical coaching, video feedback, and mobility work for safe, powerful barbell lifting.', 'category' => 'skills'],
        ['pill' => 'Recovery', 'title' => 'Mobility Reset', 'description' => 'Guided stretching, soft tissue work, and breath drills that keep you training without pain.', 'category' => 'recovery'],
        ['pill' => 'Community', 'title' => 'Strength For Women', 'description' => 'Coach-led small groups focused on confident lifting and progressive overload.', 'category' => 'strength'],
        ['pill' => 'Endurance', 'title' => 'Engine Ride', 'description' => 'High-energy cycling sessions that push power, cadence, and pacing strategy.', 'category' => 'conditioning'],
    ],
    'plans' => [
        [
            'tier' => 'Starter',
            'name' => '3 Classes / Week',
            'price' => 'Rs 12,500',
            'perks' => ['Any group class', 'Baseline assessment', 'Progress tracking app'],
        ],
        [
            'tier' => 'Unlimited',
            'name' => 'All Access',
            'price' => 'Rs 18,900',
            'perks' => ['Unlimited classes', 'Monthly goal review', 'Guest passes'],
        ],
        [
            'tier' => 'Premium',
            'name' => 'Coaching+',
            'price' => 'Rs 24,500',
            'perks' => ['Unlimited classes', '2 personal training sessions', 'Nutrition coaching'],
        ],
    ],
    'schedule' => [
        ['day' => 'Monday', 'sessions' => [['time' => '6:00 AM', 'name' => 'HIIT Burn'], ['time' => '5:30 PM', 'name' => 'Engine Build']]],
        ['day' => 'Tuesday', 'sessions' => [['time' => '7:00 AM', 'name' => 'Strength Foundations'], ['time' => '6:30 PM', 'name' => 'Mobility Reset']]],
        ['day' => 'Wednesday', 'sessions' => [['time' => '6:30 AM', 'name' => 'Spin & Climb'], ['time' => '7:00 PM', 'name' => 'Olympic Lifting Lab']]],
        ['day' => 'Thursday', 'sessions' => [['time' => '6:00 AM', 'name' => 'Strength For Women'], ['time' => '6:00 PM', 'name' => 'Engine Build']]],
        ['day' => 'Friday', 'sessions' => [['time' => '6:15 AM', 'name' => 'Metabolic Conditioning'], ['time' => '5:00 PM', 'name' => 'Powerlifting Club']]],
        ['day' => 'Weekend', 'sessions' => [['time' => 'Saturday 8 AM', 'name' => 'Community Run'], ['time' => 'Sunday 9 AM', 'name' => 'Recovery Flow']]],
    ],
    'contactCards' => [
        [
            'pill' => 'Visit us',
            'title' => 'Downtown Studio',
            'body' => 'Wallawaththa, Colombo',
            'items' => ['Mon - Fri: 5am - 11pm', 'Sat: 6am - 9pm', 'Sun: 6am - 1pm'],
        ],
        [
            'pill' => 'Member services',
            'title' => 'Talk to a real coach',
            'items' => [
                ['type' => 'phone', 'label' => '071 544 9509', 'href' => 'tel:+94715449509'],
                ['type' => 'email', 'label' => 'info@fitnesstime.com', 'href' => 'mailto:info@fitnesstime.com'],
                ['type' => 'map', 'label' => 'Get directions', 'href' => 'https://maps.google.com/?q=Wallawaththa,+Colombo'],
            ],
        ],
    ],
    'contactEvents' => [
        ['title' => 'Coach office hours', 'description' => 'Drop in every Thursday at 6 PM for programming Q&A and technique check-ins.'],
        ['title' => 'Community workouts', 'description' => 'Monthly charity workouts and neighborhood runs keep training fun and purposeful.'],
        ['title' => 'New member tours', 'description' => 'Book a personal walkthrough of the facility any day of the week and meet the team.'],
    ],
    'gymHours' => [
        'Monday 5am - 11pm',
        'Tuesday 5am - 11pm',
        'Wednesday 5am - 11pm',
        'Thursday 5am - 11pm',
        'Friday 5am - 11pm',
        'Saturday 6am - 9pm',
        'Sunday 6am - 1pm',
    ],
];
