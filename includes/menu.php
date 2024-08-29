<?php

$role = "admin";

$menuItems = [
    [
        'title' => 'MENU',
        'items' => [
            [
                'icon' => './public/assets/home.png',
                'label' => 'Home',
                'href' => '/',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
            [
                'icon' => './public/assets/teacher.png',
                'label' => 'Teachers',
                'href' => '/list/teachers',
                'visible' => ['admin', 'teacher']
            ],
            [
                'icon' => './public/assets/student.png',
                'label' => 'Students',
                'href' => '/list/students',
                'visible' => ['admin', 'teacher']
            ],
            [
                'icon' => './public/assets/parent.png',
                'label' => 'Parents',
                'href' => '/list/parents',
                'visible' => ['admin', 'teacher']
            ],
            [
                'icon' => './public/assets/subject.png',
                'label' => 'Subjects',
                'href' => '/list/subjects',
                'visible' => ['admin']
            ],
            [
                'icon' => './public/assets/class.png',
                'label' => 'Classes',
                'href' => '/list/classes',
                'visible' => ['admin', 'teacher']
            ],
            [
                'icon' => './public/assets/lesson.png',
                'label' => 'Lessons',
                'href' => '/list/lessons',
                'visible' => ['admin', 'teacher']
            ],
            [
                'icon' => './public/assets/exam.png',
                'label' => 'Exams',
                'href' => '/list/exams',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
            [
                'icon' => './public/assets/assignment.png',
                'label' => 'Assignments',
                'href' => '/list/assignments',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
            [
                'icon' => './public/assets/result.png',
                'label' => 'Results',
                'href' => '/list/results',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
            [
                'icon' => './public/assets/attendance.png',
                'label' => 'Attendance',
                'href' => '/list/attendance',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
            [
                'icon' => './public/assets/calendar.png',
                'label' => 'Events',
                'href' => '/list/events',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
            [
                'icon' => './public/assets/message.png',
                'label' => 'Messages',
                'href' => '/list/messages',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
            [
                'icon' => './public/assets/announcement.png',
                'label' => 'Announcements',
                'href' => '/list/announcements',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
        ],
    ],
    [
        'title' => 'OTHER',
        'items' => [
            [
                'icon' => './public/assets/profile.png',
                'label' => 'Profile',
                'href' => '/profile',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
            [
                'icon' => './public/assets/setting.png',
                'label' => 'Settings',
                'href' => '/settings',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
            [
                'icon' => './public/assets/logout.png',
                'label' => 'Logout',
                'href' => '/logout',
                'visible' => ['admin', 'teacher', 'student', 'parent']
            ],
        ],
    ],
];
?>
<div class="w-[14%] md:w-[8%] lg:w-[16%] xl:w-[14%] p-4">
    <a href="/" class="flex items-center justify-center lg:justify-start gap-2">
        <img src="./public/assets/logo.png" alt="logo" width="32" height="32">
        <span class="hidden lg:block font-bold">SchoolDashboard</span>
    </a>

    <div class="mt-4 text-sm">
        <?php foreach ($menuItems as $menu): ?>
            <div class="flex flex-col gap-2">
                <span class="hidden lg:block text-gray-400 font-light my-4"><?= htmlspecialchars($menu['title']) ?></span>
                <?php foreach ($menu['items'] as $item): ?>
                    <?php if (in_array($role, $item['visible'])): ?>
                        <a href="<?= htmlspecialchars($item['href']) ?>" class="flex items-center justify-center lg:justify-start gap-4 text-gray-500 py-2 md:px-2 rounded-md hover:bg-lamaSkyLight">
                            <img src="<?= htmlspecialchars($item['icon']) ?>" alt="<?= htmlspecialchars($item['label']) ?>" width="20" height="20">
                            <span class="hidden lg:block"><?= htmlspecialchars($item['label']) ?></span>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>