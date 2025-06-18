<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thunder Hawks Baseball</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        border: "hsl(240 5.9% 90%)",
                        input: "hsl(240 5.9% 90%)",
                        ring: "hsl(240 4.9% 83.9%)",
                        background: "hsl(0 0% 100%)",
                        foreground: "hsl(240 10% 3.9%)",
                        primary: {
                            DEFAULT: "hsl(221 83% 53%)",
                            foreground: "hsl(0 0% 98%)"
                        },
                        secondary: {
                            DEFAULT: "hsl(240 4.8% 95.9%)",
                            foreground: "hsl(240 5.9% 10%)"
                        },
                        destructive: {
                            DEFAULT: "hsl(0 84.2% 60.2%)",
                            foreground: "hsl(0 0% 98%)"
                        },
                        muted: {
                            DEFAULT: "hsl(240 4.8% 95.9%)",
                            foreground: "hsl(240 3.8% 46.1%)"
                        },
                        accent: {
                            DEFAULT: "hsl(240 4.8% 95.9%)",
                            foreground: "hsl(240 5.9% 10%)"
                        },
                        popover: {
                            DEFAULT: "hsl(0 0% 100%)",
                            foreground: "hsl(240 10% 3.9%)"
                        },
                        card: {
                            DEFAULT: "hsl(0 0% 100%)",
                            foreground: "hsl(240 10% 3.9%)"
                        }
                    },
                    borderRadius: {
                        lg: "0.5rem",
                        md: "calc(0.5rem - 2px)",
                        sm: "calc(0.5rem - 4px)"
                    }
                }
            }
        }
    </script>
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-button.active { background-color: hsl(221 83% 53%); color: white; }
        .gradient-bg { background: linear-gradient(135deg, hsl(222 47% 31%) 0%, hsl(221 83% 53%) 100%); }
        .card-hover { transition: all 0.2s ease; border: 1px solid hsl(240 5.9% 90%); }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
        
        /* Shadcn-inspired styles */
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            color: hsl(240 10% 3.9%);
            background-color: hsl(0 0% 98%);
        }
        
        button, input, select, textarea {
            font-family: inherit;
        }
        
        /* Button styles */
        .shadcn-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            height: 2.5rem;
            padding-left: 1rem;
            padding-right: 1rem;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }
        
        .shadcn-btn-primary {
            background-color: hsl(221 83% 53%);
            color: white;
        }
        
        .shadcn-btn-secondary {
            background-color: hsl(240 4.8% 95.9%);
            color: hsl(240 5.9% 10%);
        }
        
        .shadcn-btn-ghost {
            background-color: transparent;
            color: hsl(240 10% 3.9%);
        }
        
        .shadcn-btn:hover {
            opacity: 0.9;
        }
        
        /* Card styles */
        .shadcn-card {
            border-radius: 0.75rem;
            background-color: white;
            border: 1px solid hsl(240 5.9% 90%);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        /* Form control styles */
        .shadcn-input {
            height: 2.5rem;
            width: 100%;
            border-radius: 0.5rem;
            border: 1px solid hsl(240 5.9% 90%);
            background-color: white;
            padding-left: 0.75rem;
            padding-right: 0.75rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        
        .shadcn-input:focus {
            outline: none;
            border-color: hsl(221 83% 53%);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
        }
    </style>
</head>
<body class="bg-background font-sans">
    <!-- Header -->
    <header class="gradient-bg text-white shadow-sm border-b border-primary/10">
        <div class="container mx-auto px-4 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm">
                        <span class="text-primary font-bold text-xl">⚾</span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold tracking-tight">Thunder Hawks</h1>
                        <p class="text-primary/80 text-sm">Baseball Club</p>
                    </div>
                </div>
                <div class="hidden md:flex space-x-3">
                    <span class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-md text-sm font-medium border border-white/10">Season 2024</span>
                    <span class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-md text-sm font-medium border border-white/10">Record: 18-7</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-background shadow-sm border-b border-border sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex">
                <button onclick="showTab('roster')" class="tab-button px-4 py-3 text-foreground hover:text-primary hover:bg-muted transition-colors text-sm font-medium active border-b-2 border-transparent data-[active=true]:border-primary">
                    Team Roster
                </button>
                <button onclick="showTab('stats')" class="tab-button px-4 py-3 text-foreground hover:text-primary hover:bg-muted transition-colors text-sm font-medium border-b-2 border-transparent data-[active=true]:border-primary">
                    Player Stats
                </button>
                <button onclick="showTab('schedule')" class="tab-button px-4 py-3 text-foreground hover:text-primary hover:bg-muted transition-colors text-sm font-medium border-b-2 border-transparent data-[active=true]:border-primary">
                    Schedule
                </button>
                <button onclick="showTab('results')" class="tab-button px-4 py-3 text-foreground hover:text-primary hover:bg-muted transition-colors text-sm font-medium border-b-2 border-transparent data-[active=true]:border-primary">
                    Game Results
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-10 max-w-6xl">
        <!-- Team Roster Tab -->
        <div id="roster" class="tab-content active">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-foreground mb-2 tracking-tight">Coaching Staff</h2>
                <div class="grid md:grid-cols-3 gap-6 mb-12">
                    <div class="shadcn-card p-6 card-hover">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-primary/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <span class="text-primary text-xl font-medium">MJ</span>
                            </div>
                            <h3 class="text-lg font-semibold text-foreground">Mike Johnson</h3>
                            <p class="text-emerald-600 text-sm font-medium">Head Coach</p>
                            <p class="text-muted-foreground text-sm mt-2">15 years experience<br>Former MLB player</p>
                        </div>
                    </div>
                    <div class="shadcn-card p-6 card-hover">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-emerald-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <span class="text-emerald-600 text-xl font-medium">DP</span>
                            </div>
                            <h3 class="text-lg font-semibold text-foreground">Dave Peterson</h3>
                            <p class="text-emerald-600 text-sm font-medium">Pitching Coach</p>
                            <p class="text-muted-foreground text-sm mt-2">Former college pitcher<br>Specializes in mechanics</p>
                        </div>
                    </div>
                    <div class="shadcn-card p-6 card-hover">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-orange-500/10 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <span class="text-orange-600 text-xl font-medium">RS</span>
                            </div>
                            <h3 class="text-lg font-semibold text-foreground">Robert Smith</h3>
                            <p class="text-orange-600 text-sm font-medium">Hitting Coach</p>
                            <p class="text-muted-foreground text-sm mt-2">Former college All-American<br>Batting average specialist</p>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="text-3xl font-bold text-foreground mb-6 tracking-tight">Players</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center">
                            <span class="text-primary font-medium text-lg">#23</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">Alex Martinez</h3>
                            <p class="text-primary text-sm font-medium">Shortstop</p>
                        </div>
                    </div>
                    <div class="text-sm text-muted-foreground space-y-1">
                        <p><span class="font-medium text-foreground">Age:</span> 24</p>
                        <p><span class="font-medium text-foreground">Height:</span> 5'11"</p>
                        <p><span class="font-medium text-foreground">Bats:</span> Right</p>
                        <p><span class="font-medium text-foreground">Throws:</span> Right</p>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-green-600 font-bold text-lg">#8</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">Tommy Chen</h3>
                            <p class="text-emerald-600 text-sm font-medium">Pitcher</p>
                        </div>
                    </div>
                    <div class="text-sm text-muted-foreground space-y-1">
                        <p><span class="font-medium text-foreground">Age:</span> 22</p>
                        <p><span class="font-medium text-foreground">Height:</span> 6'3"</p>
                        <p><span class="font-medium text-foreground">Bats:</span> Left</p>
                        <p><span class="font-medium text-foreground">Throws:</span> Left</p>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                            <span class="text-purple-600 font-bold text-lg">#3</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">Jake Williams</h3>
                            <p class="text-purple-600 font-medium">Shortstop</p>
                        </div>
                    </div>
                    <div class="text-sm text-muted-foreground space-y-1">
                        <p><span class="font-medium text-foreground">Age:</span> 26</p>
                        <p><span class="font-medium text-foreground">Height:</span> 5'10"</p>
                        <p><span class="font-medium text-foreground">Bats:</span> Right</p>
                        <p><span class="font-medium text-foreground">Throws:</span> Right</p>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                            <span class="text-red-600 font-bold text-lg">#21</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">Marcus Johnson</h3>
                            <p class="text-destructive text-sm font-medium">First Base</p>
                        </div>
                    </div>
                    <div class="text-sm text-muted-foreground space-y-1">
                        <p><span class="font-medium text-foreground">Age:</span> 28</p>
                        <p><span class="font-medium text-foreground">Height:</span> 6'2"</p>
                        <p><span class="font-medium text-foreground">Bats:</span> Left</p>
                        <p><span class="font-medium text-foreground">Throws:</span> Left</p>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center">
                            <span class="text-yellow-600 font-bold text-lg">#15</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">Ryan O'Connor</h3>
                            <p class="text-yellow-600 font-medium">Center Field</p>
                        </div>
                    </div>
                    <div class="text-sm text-muted-foreground space-y-1">
                        <p><span class="font-medium text-foreground">Age:</span> 23</p>
                        <p><span class="font-medium text-foreground">Height:</span> 6'0"</p>
                        <p><span class="font-medium text-foreground">Bats:</span> Right</p>
                        <p><span class="font-medium text-foreground">Throws:</span> Right</p>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                            <span class="text-indigo-600 font-bold text-lg">#7</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-foreground">Carlos Mendez</h3>
                            <p class="text-indigo-600 font-medium">Third Base</p>
                        </div>
                    </div>
                    <div class="text-sm text-muted-foreground space-y-1">
                        <p><span class="font-medium text-foreground">Age:</span> 25</p>
                        <p><span class="font-medium text-foreground">Height:</span> 5'11"</p>
                        <p><span class="font-medium text-foreground">Bats:</span> Right</p>
                        <p><span class="font-medium text-foreground">Throws:</span> Right</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Player Stats Tab -->
        <div id="stats" class="tab-content">
            <h2 class="text-3xl font-bold text-foreground tracking-tight mb-6">Player Statistics</h2>
            
            <!-- Batting Stats -->
            <div class="shadcn-card p-6 mb-8">
                <h3 class="text-2xl font-semibold text-foreground mb-4 tracking-tight">Batting Statistics</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-muted">
                            <tr>
                                <th class="text-left p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">Player</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">AVG</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">AB</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">H</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">HR</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">RBI</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">BB</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">SO</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-muted/50">
                                <td class="p-3 font-medium text-foreground">Alex Martinez</td>
                                <td class="p-3 text-center">.312</td>
                                <td class="p-3 text-center">89</td>
                                <td class="p-3 text-center">28</td>
                                <td class="p-3 text-center">4</td>
                                <td class="p-3 text-center">18</td>
                                <td class="p-3 text-center">12</td>
                                <td class="p-3 text-center">15</td>
                            </tr>
                            <tr class="hover:bg-muted/50">
                                <td class="p-3 font-medium text-foreground">Jake Williams</td>
                                <td class="p-3 text-center">.289</td>
                                <td class="p-3 text-center">94</td>
                                <td class="p-3 text-center">27</td>
                                <td class="p-3 text-center">2</td>
                                <td class="p-3 text-center">14</td>
                                <td class="p-3 text-center">18</td>
                                <td class="p-3 text-center">21</td>
                            </tr>
                            <tr class="hover:bg-muted/50">
                                <td class="p-3 font-medium text-foreground">Marcus Johnson</td>
                                <td class="p-3 text-center">.324</td>
                                <td class="p-3 text-center">91</td>
                                <td class="p-3 text-center">29</td>
                                <td class="p-3 text-center">7</td>
                                <td class="p-3 text-center">23</td>
                                <td class="p-3 text-center">15</td>
                                <td class="p-3 text-center">18</td>
                            </tr>
                            <tr class="hover:bg-muted/50">
                                <td class="p-3 font-medium text-foreground">Ryan O'Connor</td>
                                <td class="p-3 text-center">.301</td>
                                <td class="p-3 text-center">86</td>
                                <td class="p-3 text-center">26</td>
                                <td class="p-3 text-center">3</td>
                                <td class="p-3 text-center">16</td>
                                <td class="p-3 text-center">9</td>
                                <td class="p-3 text-center">12</td>
                            </tr>
                            <tr class="hover:bg-muted/50">
                                <td class="p-3 font-medium text-foreground">Carlos Mendez</td>
                                <td class="p-3 text-center">.278</td>
                                <td class="p-3 text-center">79</td>
                                <td class="p-3 text-center">22</td>
                                <td class="p-3 text-center">5</td>
                                <td class="p-3 text-center">19</td>
                                <td class="p-3 text-center">11</td>
                                <td class="p-3 text-center">16</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pitching Stats -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-2xl font-semibold text-foreground mb-4 tracking-tight">Pitching Statistics</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-muted">
                            <tr>
                                <th class="text-left p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">Player</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">W-L</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">ERA</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">IP</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">H</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">ER</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">BB</th>
                                <th class="text-center p-3 text-xs font-medium text-muted-foreground uppercase tracking-wider">SO</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-muted/50">
                                <td class="p-3 font-medium text-foreground">Tommy Chen</td>
                                <td class="p-3 text-center">5-2</td>
                                <td class="p-3 text-center">2.84</td>
                                <td class="p-3 text-center">38.0</td>
                                <td class="p-3 text-center">32</td>
                                <td class="p-3 text-center">12</td>
                                <td class="p-3 text-center">14</td>
                                <td class="p-3 text-center">41</td>
                            </tr>
                            <tr class="hover:bg-muted/50">
                                <td class="p-3 font-medium text-foreground">Mike Patterson</td>
                                <td class="p-3 text-center">4-1</td>
                                <td class="p-3 text-center">3.12</td>
                                <td class="p-3 text-center">31.2</td>
                                <td class="p-3 text-center">28</td>
                                <td class="p-3 text-center">11</td>
                                <td class="p-3 text-center">9</td>
                                <td class="p-3 text-center">34</td>
                            </tr>
                            <tr class="hover:bg-muted/50">
                                <td class="p-3 font-medium text-foreground">Dave Rodriguez</td>
                                <td class="p-3 text-center">3-3</td>
                                <td class="p-3 text-center">4.05</td>
                                <td class="p-3 text-center">26.2</td>
                                <td class="p-3 text-center">29</td>
                                <td class="p-3 text-center">12</td>
                                <td class="p-3 text-center">11</td>
                                <td class="p-3 text-center">22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Schedule Tab -->
        <div id="schedule" class="tab-content">
            <h2 class="text-3xl font-bold text-foreground tracking-tight mb-6">Upcoming Games</h2>
            <div class="space-y-4">
                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">23</div>
                                <div class="text-sm text-gray-600">JUN</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">vs Lightning Bolts</h3>
                                <p class="text-gray-600">Home Game • Sunset Stadium</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-foreground">2:00 PM</div>
                            <div class="text-sm text-green-600 font-medium">CONFIRMED</div>
                        </div>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">26</div>
                                <div class="text-sm text-gray-600">JUN</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">@ Storm Riders</h3>
                                <p class="text-gray-600">Away Game • City Park Field</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-foreground">7:00 PM</div>
                            <div class="text-sm text-green-600 font-medium">CONFIRMED</div>
                        </div>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">30</div>
                                <div class="text-sm text-gray-600">JUN</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">vs Fire Dragons</h3>
                                <p class="text-gray-600">Home Game • Sunset Stadium</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-foreground">1:00 PM</div>
                            <div class="text-sm text-green-600 font-medium">CONFIRMED</div>
                        </div>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">3</div>
                                <div class="text-sm text-gray-600">JUL</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">@ Silver Eagles</h3>
                                <p class="text-gray-600">Away Game • Eagle's Nest Stadium</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-foreground">6:30 PM</div>
                            <div class="text-sm text-yellow-600 font-medium">PENDING</div>
                        </div>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">7</div>
                                <div class="text-sm text-gray-600">JUL</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">vs Wildcats</h3>
                                <p class="text-gray-600">Home Game • Sunset Stadium</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-foreground">2:00 PM</div>
                            <div class="text-sm text-green-600 font-medium">CONFIRMED</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Tab -->
        <div id="results" class="tab-content">
            <h2 class="text-3xl font-bold text-foreground tracking-tight mb-6">Recent Game Results</h2>
            <div class="space-y-4">
                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-600">16</div>
                                <div class="text-sm text-gray-600">JUN</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">vs Iron Bulls</h3>
                                <p class="text-gray-600">Home Game • Sunset Stadium</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-green-600">W</div>
                            <div class="text-lg font-bold text-gray-800">8-5</div>
                            <div class="text-sm text-gray-600">Thunder Hawks Win</div>
                        </div>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-600">13</div>
                                <div class="text-sm text-gray-600">JUN</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">@ Lightning Bolts</h3>
                                <p class="text-gray-600">Away Game • Bolt Field</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-green-600">W</div>
                            <div class="text-lg font-bold text-gray-800">12-7</div>
                            <div class="text-sm text-gray-600">Thunder Hawks Win</div>
                        </div>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-600">9</div>
                                <div class="text-sm text-gray-600">JUN</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">vs Storm Riders</h3>
                                <p class="text-gray-600">Home Game • Sunset Stadium</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-red-600">L</div>
                            <div class="text-lg font-bold text-gray-800">3-6</div>
                            <div class="text-sm text-gray-600">Storm Riders Win</div>
                        </div>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-600">5</div>
                                <div class="text-sm text-gray-600">JUN</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">@ Fire Dragons</h3>
                                <p class="text-gray-600">Away Game • Dragon Stadium</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-green-600">W</div>
                            <div class="text-lg font-bold text-gray-800">9-4</div>
                            <div class="text-sm text-gray-600">Thunder Hawks Win</div>
                        </div>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-600">2</div>
                                <div class="text-sm text-gray-600">JUN</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">vs Silver Eagles</h3>
                                <p class="text-gray-600">Home Game • Sunset Stadium</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-green-600">W</div>
                            <div class="text-lg font-bold text-gray-800">11-3</div>
                            <div class="text-sm text-gray-600">Thunder Hawks Win</div>
                        </div>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-600">28</div>
                                <div class="text-sm text-gray-600">MAY</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">@ Wildcats</h3>
                                <p class="text-gray-600">Away Game • Wildcat Park</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-red-600">L</div>
                            <div class="text-lg font-bold text-gray-800">7-10</div>
                            <div class="text-sm text-gray-600">Wildcats Win</div>
                        </div>
                    </div>
                </div>

                <div class="shadcn-card p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-600">25</div>
                                <div class="text-sm text-gray-600">MAY</div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-foreground">vs Thunder Bolts</h3>
                                <p class="text-gray-600">Home Game • Sunset Stadium</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-green-600">W</div>
                            <div class="text-lg font-bold text-gray-800">14-6</div>
                            <div class="text-sm text-gray-600">Thunder Hawks Win</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Season Summary -->
            <div class="mt-12 grid md:grid-cols-4 gap-4">
                <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg p-6 text-white text-center shadcn-card border-0">
                    <div class="text-3xl font-bold">18</div>
                    <div class="text-emerald-50">Wins</div>
                </div>
                <div class="bg-gradient-to-br from-destructive to-destructive/90 rounded-lg p-6 text-white text-center shadcn-card border-0">
                    <div class="text-3xl font-bold">7</div>
                    <div class="text-destructive/80">Losses</div>
                </div>
                <div class="bg-gradient-to-br from-primary to-primary/90 rounded-lg p-6 text-white text-center shadcn-card border-0">
                    <div class="text-3xl font-bold">.720</div>
                    <div class="text-primary/80">Win %</div>
                </div>
                <div class="bg-gradient-to-br from-violet-500 to-violet-600 rounded-lg p-6 text-white text-center shadcn-card border-0">
                    <div class="text-3xl font-bold">2nd</div>
                    <div class="text-violet-50">League Position</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="gradient-bg text-white mt-16">
        <div class="container mx-auto px-4 py-10 max-w-6xl">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <span class="text-blue-600 font-bold">⚾</span>
                        </div>
                        <h3 class="text-xl font-bold">Thunder Hawks</h3>
                    </div>
                    <p class="text-blue-200">Building champions on and off the field since 2010.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Contact Info</h4>
                    <div class="space-y-2 text-blue-200">
                        <p>📧 info@thunderhawks.com</p>
                        <p>📞 (555) 123-4567</p>
                        <p>📍 123 Stadium Way, Baseball City</p>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <button class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors border border-white/10">
                            <span class="text-sm">📘</span>
                        </button>
                        <button class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors border border-white/10">
                            <span class="text-sm">🐦</span>
                        </button>
                        <button class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors border border-white/10">
                            <span class="text-sm">📷</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-white/10 mt-8 pt-6 text-center text-primary/80">
                <p class="text-sm">&copy; 2024 Thunder Hawks Baseball Club. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => {
                content.classList.remove('active');
            });
            
            // Remove active class from all buttons
            const buttons = document.querySelectorAll('.tab-button');
            buttons.forEach(button => {
                button.classList.remove('active');
                button.removeAttribute('data-active');
            });
            
            // Show selected tab content
            document.getElementById(tabName).classList.add('active');
            
            // Add active class to clicked button
            event.target.classList.add('active');
            event.target.setAttribute('data-active', 'true');
        }

        // Add smooth scrolling and animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add fade-in animation to cards
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>