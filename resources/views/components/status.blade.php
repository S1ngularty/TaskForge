<div class="w-full h-16 bg-white text-gray-800 flex items-center px-6 shadow-sm">
    <!-- Left: User Profile & Stats -->
    <div class="flex items-center space-x-4 w-full">
        <!-- Avatar -->
        <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="w-10 h-10 object-cover border border-gray-300">

        <!-- Username & Bars -->
        <div class="flex flex-col w-full space-y-1">
            <!-- Username -->
            <div class="text-sm font-semibold">{{ $username ?? 'PlayerOne' }}</div>

            <!-- HP Bar -->
            <div class="w-full bg-red-100 rounded h-2">
                <div class="bg-red-500 h-2 rounded" style="width: {{ $hpPercent ?? 75 }}%;"></div>
            </div>

            <!-- EXP + Level -->
            <div class="flex items-center text-xs text-gray-600">
                <span class="mr-2">LVL {{ $level ?? 5 }}</span>
                <div class="flex-1 bg-blue-100 rounded h-1.5">
                    <div class="bg-blue-500 h-1.5 rounded" style="width: {{ $expPercent ?? 45 }}%;"></div>
                </div>
                <span class="ml-2">{{ $expPercent ?? 45 }}%</span>
            </div>
        </div>
    </div>
</div>
