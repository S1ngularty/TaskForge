<div class="player-status w-full h-20 bg-white text-gray-900 flex items-center px-6 shadow-sm transition-colors duration-300">
    <!-- Left: User Profile & Stats -->
    <div class="flex items-center space-x-4 w-full">
        
        <!-- Avatar -->
        <img 
            src="{{ asset('images/avatar.png') }}" 
            alt="Avatar" 
            class="w-10 h-10 object-cover border border-gray-300 rounded-full ring-2 ring-gray-200 transition-all duration-300"
        >
        
        <!-- Username & Bars -->
        <div class="flex flex-col w-full space-y-1.5">
            
            <!-- Username -->
            <div class="name text-sm font-semibold truncate text-gray-900">
                {{ $username ?? 'PlayerOne' }}
            </div>

            <!-- HP Bar -->
            <div class="w-full bg-red-100 rounded h-2 overflow-hidden">
                <div 
                    class="life-bar bg-red-500 h-2 rounded transition-all duration-500 ease-in-out"
                    style="width: {{ $hpPercent ?? 0 }}%;"
                ></div>
            </div>

            <!-- EXP + Level -->
            <div class="flex items-center text-xs text-gray-800">
                
                <!-- Level -->
                <span class="player-lvl mr-2 font-bold">
                    LVL {{ $level ?? 5 }}
                </span>
                
                <!-- EXP Bar -->
                <div class="flex-1 bg-blue-100 rounded h-1.5 overflow-hidden">
                    <div 
                        class="exp-bar bg-blue-500 h-1.5 rounded transition-all duration-500 ease-in-out"
                        style="width: {{ $expPercent ?? 0 }}%;"
                    ></div>
                </div>

                <!-- EXP Percentage -->
                <span class="exp-percent ml-2 font-medium">
                    {{ $expPercent ?? 0 }}%
                </span>
            </div>
        </div>
    </div>
</div>
