<div>
    <!-- イントロ画面 -->
    @if ($currentPhase === 'intro')
        <div class="max-w-2xl mx-auto">
            <!-- タイトル -->
            <div class="text-center mb-8 fade-in-up">
                <div class="title-bg inline-block mb-4">
                    <h1 class="text-3xl md:text-4xl font-bold text-white">あなただけの美容家電診断</h1>
                </div>
                <p class="text-xl text-white font-medium mb-6">自分に合った美容家電って何だろう？</p>
            </div>

            <!-- アプリの説明 -->
            <div class="relative bg-white rounded-3xl p-8 mb-12 shadow-lg bounce-in" style="animation-delay: 0.3s;">
                <!-- モバイル用：縦レイアウト -->
                <div class="md:hidden text-center">
                    <p class="text-lg text-gray-700 mb-4 font-medium">
                        どの美容家電を使ったら<br>
                        悩みやコンプレックスが解消できるのかな？
                    </p>

                    <!-- キャラクター画像（下） -->
                    <div class="character-overlay float-animation">
                        <img src="/storage/MBD_app_material/真顔.png" alt="キャラクター"
                            class="w-60 h-60 object-contain mx-auto">
                    </div>
                </div>

                <!-- デスクトップ用：横レイアウト -->
                <div class="hidden md:flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-lg text-gray-700 mb-4 text-center font-medium">
                            どの美容家電を使ったら<br>
                            悩みやコンプレックスが解消できるのかな？
                        </p>
                    </div>

                    <!-- キャラクター画像を右側に配置 -->
                    <div class="ml-4 character-overlay float-animation">
                        <img src="/storage/MBD_app_material/真顔.png" alt="キャラクター" class="w-60 h-60 object-contain">
                    </div>
                </div>
            </div>

            <!-- 診断スタートボタン -->
            <div class="text-center scroll-reveal">
                <button wire:click="startDiagnosis"
                    class="cloud-button px-8 md:px-12 py-3 md:py-4 text-lg md:text-2xl font-bold text-gray-700 hover:text-gray-900 transition-colors duration-300">
                    🌟 診断スタート
                </button>
            </div>
        </div>
    @endif

    <!-- 第1設問 -->
    @if ($currentPhase === 'category')
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-8 fade-in-up">
                <h2 class="text-3xl font-bold text-white mb-6">Q1. 悩みはどれ？</h2>
            </div>

            <div class="space-y-6">
                @foreach ($categories as $categoryKey => $category)
                    <button wire:click="selectCategory('{{ $categoryKey }}')"
                        class="w-full cloud-button p-6 text-left stagger-animation">
                        <span class="text-xl font-bold text-gray-700">{{ $category['title'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>
    @endif

    <!-- 第2設問 -->
    @if ($currentPhase === 'subcategory')
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-8 fade-in-up">
                <h2 class="text-3xl font-bold text-white mb-6">Q2. 気になる部分は？</h2>
            </div>

            <div class="space-y-6">
                @if (isset($categories[$selectedCategory]['subcategories']))
                    @foreach ($categories[$selectedCategory]['subcategories'] as $subCategoryKey => $subCategory)
                        <button wire:click="selectSubCategory('{{ $subCategoryKey }}')"
                            class="w-full cloud-button p-6 text-left stagger-animation">
                            <span class="text-lg font-medium text-gray-700">{{ $subCategory }}</span>
                        </button>
                    @endforeach
                @endif
            </div>
        </div>
    @endif

    <!-- 診断結果 -->
    @if ($currentPhase === 'result')
        <div class="max-w-4xl mx-auto">
            <!-- おすすめアイテム -->
            <div class="text-center mb-8 fade-in-up">
                <div class="relative inline-block">
                    <div class="ribbon-bg px-8 py-4 rounded-lg">
                        <h2 class="text-3xl font-bold text-white mb-0">🌟 あなたにおすすめのアイテム 🌟</h2>
                    </div>
                    <!-- リボンの装飾 -->
                    <div class="ribbon-decoration"></div>
                </div>
            </div>

            <!-- 商品レコメンド -->
            <div class="space-y-8 mb-12">
                @if (!empty($recommendations))
                    @foreach ($recommendations as $index => $product)
                        @if ($product !== null && is_array($product) && isset($product['name']) && !empty($product['name']))
                            <div class="product-card p-6 stagger-animation relative">
                                <!-- モバイル用：縦レイアウト -->
                                <div class="md:hidden">
                                    <!-- キャラクター画像（上） -->
                                    <div class="text-center mb-4 character-overlay">
                                        <img src="/storage/MBD_app_material/{{ $index % 2 === 0 ? '指差しウインク.png' : 'ジャンプ.png' }}"
                                            alt="キャラクター" class="w-60 h-60 object-contain float-animation mx-auto">
                                    </div>

                                    <!-- 商品画像（中央） -->
                                    <div class="text-center mb-4">
                                        <img src="/storage/MBD_app_material/{{ $product['image'] ?? 'no-image.jpg' }}"
                                            alt="{{ $product['name'] }}"
                                            class="w-48 h-48 object-contain rounded-lg mx-auto">
                                    </div>

                                    <!-- 商品情報（下） -->
                                    <div class="text-center">
                                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $product['name'] }}</h3>
                                        <div class="cloud-speech mb-4">
                                            <p class="text-gray-700 font-medium">こんな人におすすめだよ！</p>
                                        </div>
                                        <a href="{{ $product['url'] ?? '#' }}" target="_blank"
                                            class="cloud-button inline-block px-6 py-3 text-gray-700 font-bold hover:text-gray-900 transition-colors duration-300">
                                            詳細を見る
                                        </a>
                                    </div>
                                </div>

                                <!-- デスクトップ用：横レイアウト -->
                                <div class="hidden md:flex items-center gap-6">
                                    <!-- 左側のキャラクター画像 -->
                                    <div class="flex-shrink-0 character-overlay">
                                        <img src="/storage/MBD_app_material/{{ $index % 2 === 0 ? '指差しウインク.png' : 'ジャンプ.png' }}"
                                            alt="キャラクター" class="w-60 h-60 object-contain float-animation">
                                    </div>

                                    <!-- 中央の商品画像 -->
                                    <div class="flex-shrink-0 w-48">
                                        <img src="/storage/MBD_app_material/{{ $product['image'] ?? 'no-image.jpg' }}"
                                            alt="{{ $product['name'] }}" class="w-full h-48 object-contain rounded-lg">
                                    </div>

                                    <!-- 右側の商品情報 -->
                                    <div class="flex-1">
                                        <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $product['name'] }}</h3>
                                        <div class="cloud-speech mb-4">
                                            <p class="text-gray-700 font-medium">こんな人におすすめだよ！</p>
                                        </div>
                                        <a href="{{ $product['url'] ?? '#' }}" target="_blank"
                                            class="cloud-button inline-block px-6 py-3 text-gray-700 font-bold hover:text-gray-900 transition-colors duration-300">
                                            詳細を見る
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="text-center text-white">
                        <p class="text-xl">商品情報を読み込み中...</p>
                    </div>
                @endif
            </div>

            <!-- レンタル誘導セクション -->
            <div class="bg-white rounded-3xl p-8 shadow-lg mb-12">
                <div class="text-center space-y-6">
                    <!-- 悩みの表現 -->
                    <div class="space-y-4">
                        <p class="text-lg text-gray-600 font-medium">
                            でも正直、高いから買うのに勇気がいるな....
                        </p>
                        <div class="character-overlay">
                            <img src="/storage/MBD_app_material/悲しげ.png" alt="悲しげなキャラクター"
                                class="w-60 h-60 md:w-52 md:h-52 object-contain mx-auto">
                        </div>
                    </div>

                    <!-- レンタル提案 -->
                    <div class="rental-text inline-block font-bold text-xl">
                        そんな方はまずレンタル！
                    </div>

                    <!-- BEERACLE誘導ボタン -->
                    <div>
                        <a href="https://www.beeracle.jp/" target="_blank"
                            class="beeracle-button inline-block px-6 md:px-8 py-3 md:py-4 text-lg md:text-xl font-bold rounded-2xl">
                            美容家電レンタルサイト「BEERACLE」へ
                        </a>
                    </div>

                    <!-- 感謝の表現 -->
                    <div class="space-y-4">
                        <p class="text-xl text-pink-500 font-bold">私でもできる美容見つけた♡</p>
                        <div class="character-overlay">
                            <img src="/storage/MBD_app_material/ありがとう涙.png" alt="感謝のキャラクター"
                                class="w-60 h-60 md:w-52 md:h-52 object-contain mx-auto">
                        </div>
                    </div>
                </div>
            </div>

            <!-- もう一度診断ボタン -->
            <div class="text-center">
                <button wire:click="resetDiagnosis"
                    class="cloud-button px-6 md:px-8 py-3 md:py-4 text-base md:text-lg font-bold text-gray-700 hover:text-gray-900">
                    🔄 もう一度診断する
                </button>
            </div>
        </div>
    @endif
</div>
