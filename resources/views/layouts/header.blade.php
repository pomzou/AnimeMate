<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimeMate</title>
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        [x-cloak] { display: none !important; }
        .search-icon { top: 50%; transform: translateY(-50%); }
    </style>
</head>
<body x-data="{
    isSidebarOpen: false,
    isSearchOpen: false,
    activeDropdown: null,
    searchQuery: '',
    toggleDropdown(dropdown) {
        this.activeDropdown = this.activeDropdown === dropdown ? null : dropdown;
    },
    handleSearch(e) {
        e.preventDefault();
        console.log('Searching for:', this.searchQuery);
        this.isSearchOpen = false;
    }
}" class="bg-gray-100 min-h-screen">
    <!-- サイドバー -->
    <div x-cloak
         :class="{'translate-x-0': isSidebarOpen, '-translate-x-full': !isSidebarOpen}"
         class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out">
        <div class="flex items-center justify-between p-4 border-b">
            <h2 class="text-xl font-semibold text-gray-800">メニュー</h2>
            <button @click="isSidebarOpen = false"
                    class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        <div class="p-4">
            <form @submit.prevent="handleSearch" class="mb-4">
                <div class="flex items-center border border-gray-300 rounded-md">
				<input type="text"
                   placeholder="アニメを検索..."
                   x-model="searchQuery"
                   class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <button type="submit"
                    class="absolute right-6 search-icon text-gray-400 hover:text-blue-500 transition-colors duration-200">
                <i data-lucide="search" class="w-5 h-5"></i>
                </div>
            </form>
        </div>
        <nav class="mt-4">
            <ul class="space-y-2">
                <li>
                    <a href="/" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/japanese-anime" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                        日本のアニメ
                    </a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                        Pricing
                    </a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                        Contact
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- ヘッダー -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <button @click="isSidebarOpen = !isSidebarOpen"
                            class="text-gray-500 hover:text-gray-700 transition-colors duration-200"
                            aria-label="メニューを開く">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <a href="/" class="ml-4 text-2xl font-bold text-blue-600">
                        AnimeMate
                    </a>
                </div>

                <!-- 中央のナビゲーション -->
                <nav class="hidden md:flex items-center space-x-8">
                    <div class="relative group">
                        <button @click="toggleDropdown('season')"
                                class="text-gray-700 hover:text-blue-600 transition-colors duration-200 flex items-center">
                            Season
                            <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                        </button>
                        <div x-show="activeDropdown === 'season'" x-cloak
                             class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                            <template x-for="season in ['春', '夏', '秋', '冬']" :key="season">
                                <a href="#" x-text="season"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"></a>
                            </template>
                        </div>
                    </div>
                    <template x-for="item in ['Browse', 'Ranking']" :key="item">
                        <div class="relative group">
                            <button @click="toggleDropdown(item)"
                                    class="text-gray-700 hover:text-blue-600 transition-colors duration-200 flex items-center">
                                <span x-text="item"></span>
                                <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                            </button>
                            <div x-show="activeDropdown === item" x-cloak
                                 class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 1</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 2</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 3</a>
                            </div>
                        </div>
                    </template>
                </nav>

                <div class="flex items-center space-x-4">
                    <!-- 検索アイコン -->
                    <button @click="isSearchOpen = !isSearchOpen"
                            class="text-gray-500 hover:text-gray-700 transition-colors duration-200"
                            aria-label="検索">
                        <i data-lucide="search" class="w-6 h-6"></i>
                    </button>

                    <!-- ログイン状態に応じて表示を変更 -->
                    <div class="flex items-center space-x-4">
                        @auth
                            <!-- ログイン済みの場合 -->
                            <div class="relative group">
                        <button @click="toggleDropdown('user')"
                                class="flex items-center text-gray-700 hover:text-blue-600 transition-colors duration-200">
                            <img src="{{ asset('images/default-icon.png') }}"
                                 alt="User avatar"
                                 class="w-8 h-8 rounded-full mr-2">
                            <span class="hidden md:inline">{{ Auth::user()->name }}</span>
                            <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                        </button>
                        <div x-show="activeDropdown === 'user'" x-cloak
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
							 <div class="px-4 py-3 bg-blue-50 border-b border-blue-100">
									<p class="text-sm font-medium text-blue-800 truncate">
										こんにちは、{{ Auth::user()->name }}さん
									</p>
								</div>
                            <a href="/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i data-lucide="user" class="w-4 h-4 mr-2"></i>
                                プロフィール
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i data-lucide="settings" class="w-4 h-4 mr-2"></i>
                                設定
                            </a>

							<div class="py-1 bg-gray-50">
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<button type="submit" class="flex items-center w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
											<i data-lucide="log-out" class="w-4 h-4 mr-2"></i>ログアウト
										</button>
									</form>
								</div>
                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- 未ログインの場合 -->
                            <a href="{{ route('login') }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded mr-2">ログイン</a>
                            <a href="{{ route('register') }}" class="text-blue-500 border border-blue-500 hover:bg-blue-100 px-4 py-2 rounded">登録</a>
                        @endauth

						<!-- 検索バー -->
    <div x-show="isSearchOpen" x-cloak 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-y-0"
         x-transition:enter-end="opacity-100 transform scale-y-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform scale-y-100"
         x-transition:leave-end="opacity-0 transform scale-y-0"
         class="absolute top-16 left-1/2 transform -translate-x-1/2 w-1/3 bg-white shadow-md z-50">
        <form @submit.prevent="handleSearch" class="flex items-center p-4 relative">
            <input type="text"
                   placeholder="アニメを検索..."
                   x-model="searchQuery"
                   class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <button type="submit"
                    class="absolute right-6 search-icon text-gray-400 hover:text-blue-500 transition-colors duration-200">
                <i data-lucide="search" class="w-5 h-5"></i>
            </button>
        </form>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
                    </div>
                </div>
            </div>
        </div>
    </header>
