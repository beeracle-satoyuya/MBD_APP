<?php

namespace App\Livewire;

use Livewire\Component;

class BeautyDiagnosis extends Component
{
    public string $currentPhase = 'intro';
    public string $selectedCategory = '';
    public string $selectedSubCategory = '';
    public array $recommendations = [];

    // 診断カテゴリとサブカテゴリの定義
    public array $categories = [
        'hair' => [
            'title' => '髪の毛や頭皮などのヘアケア',
            'subcategories' => [
                'dryness' => '髪や頭皮の乾燥もしくは乾燥後の広がりが気になる',
                'itchy' => '頭皮のかゆみが気になる！',
                'frizz' => 'ブラッシングしても髪のうねりが抑えられない'
            ]
        ],
        'face' => [
            'title' => 'たるみや毛穴やくすみなどのフェイスケア',
            'subcategories' => [
                'wrinkles' => '顔のしわやたるみが気になる',
                'pores' => '毛穴の広がりや黒ずみが気になる',
                'dullness' => '何だか顔がくすんでしまっている（くすみ）'
            ]
        ],
        'body' => [
            'title' => '肩周りやお腹や脚部などのボディケア',
            'subcategories' => [
                'diet' => '全体的もしくは部分的なダイエット',
                'massage' => '疲労回復やスタイルの調整などのマッサージ',
                'hair_removal' => '顔やVIOなどの脱毛'
            ]
        ]
    ];

    // レコメンド商品データ
    public array $productData = [
        'hair' => [
            'dryness' => [
                ['name' => 'ミラブルplus', 'image' => 'ミラブルplus.jpg', 'url' => 'https://www.beeracle.jp/i/SM2101_N'],
                ['name' => 'ReFa（リファ）リファ ビューテック ドライヤープロ', 'image' => 'リファ ビューテックドライヤー スマート.jpg', 'url' => 'https://www.beeracle.jp/i/refadpro_spb'],
                ['name' => '絹女（KINUJO） ヘアドライヤー', 'image' => '絹女（KINUJO） ヘアドライヤー.jpg', 'url' => 'https://www.beeracle.jp/i/KH203_spb']
            ],
            'itchy' => [
                ['name' => 'TILLET W-GEAR（ティレットダブルギア)', 'image' => 'ティレットダブルギア.jpg', 'url' => 'https://www.beeracle.jp/i/17-P_sbplp'],
                ['name' => 'YA-MAN（ヤーマン）ミーゼスカルプリフト アクティブ', 'image' => 'ヤーマンミーゼスカルプリフトアクティブ.jpg', 'url' => 'https://www.beeracle.jp/i/MS-80G_spb'],
                ['name' => 'Panasonic(パナソニック)頭皮エステ サロンタッチタイプ〈スパイラル&スライド〉 EH-HE0G', 'image' => 'Panasonic(パナソニック)頭皮エステ サロンタッチタイプ〈スパイラル&スライド〉 EH-HE0G.jpg', 'url' => 'https://www.beeracle.jp/i/EH-HE0G_spb']
            ],
            'frizz' => [
                ['name' => 'ReFa（リファ）リファビューテックストレートアイロン', 'image' => 'ReFa（リファ）リファビューテックストレートアイロン.jpg', 'url' => 'https://www.beeracle.jp/i/refairon_spb'],
                ['name' => 'Panasonic(パナソニック)ストレートアイロンナノケア　EH-HN50', 'image' => 'Panasonic(パナソニック)ストレートアイロン ナノケア EH-HS0J-K(ブラック).jpg', 'url' => 'https://www.beeracle.jp/i/EH-HS0J_spb'],
                ['name' => '絹女（KINUJO）ストレートアイロン', 'image' => '絹女（KINUJO）ストレートアイロン.jpg', 'url' => 'https://www.beeracle.jp/i/kinujo_spb']
            ]
        ],
        'face' => [
            'wrinkles' => [
                ['name' => 'Panasonic(パナソニック)リフトケア美顔器バイタリフトブラシ EH-SP60', 'image' => 'EH-SP60.jpg', 'url' => 'https://www.beeracle.jp/i/EH-SP60_spb'],
                ['name' => 'Brighte(ブライト)エレキリフト リフト美顔器　BRT-FL170', 'image' => 'エレキリフト.jpg', 'url' => 'https://www.beeracle.jp/i/BRT-FL170_spb'],
                ['name' => 'CORE FIT　 Face-Pointer（フェイスポインター）', 'image' => 'CORE FIT　 Face-Pointer（フェイスポインター）.jpg', 'url' => 'https://www.beeracle.jp/i/FP_spb']
            ],
            'pores' => [
                ['name' => 'ReFa（リファ）リファクリア', 'image' => 'ReFa（リファ）リファクリア.jpg', 'url' => 'https://www.beeracle.jp/i/RF-CL2123B_N'],
                ['name' => '光美顔器 フォト ブライトショット EH-SL85', 'image' => 'フォトブライトショット.jpg', 'url' => 'https://www.beeracle.jp/i/SL85_spb'],
                ['name' => 'Panasonic(パナソニック)スチーマー ナノケア EH-SA70', 'image' => 'Panasonic(パナソニック)スチーマー ナノケア EH-SA70.jpg', 'url' => 'https://www.beeracle.jp/i/EH-SA70_sbp']
            ],
            'dullness' => [
                ['name' => 'Panasonic(パナソニック)バイタリフトRF EH-SR85-K', 'image' => 'バイタリフトRF EH-SR85-K.jpg', 'url' => 'https://www.beeracle.jp/i/EH-SR85_sbp'],
                ['name' => 'Panasonic(パナソニック)リフトケア美顔器 ソニック RF リフト EH-SR75', 'image' => 'Panasonic(パナソニック)リフトケア美顔器 ソニック RF リフト EH-SR75.jpg', 'url' => 'https://www.beeracle.jp/i/EH-SR75_sbp'],
                ['name' => 'モテリフト', 'image' => 'モテリフト.jpg', 'url' => 'https://www.beeracle.jp/i/BM2101BK_sbp0']
            ]
        ],
        'body' => [
            'diet' => [
                ['name' => 'パイラナイト', 'image' => 'パイラナイト　サムネ.jpg', 'url' => 'http://xn--beeracle-s0a.jp/i/PK-BR01_spb'],
                ['name' => '筋膜スクレイパー', 'image' => '筋膜スクレイパー.jpg', 'url' => 'https://www.beeracle.jp/i/PHSC_sbp'],
                ['name' => 'ブレストEMS器 HONO', 'image' => 'ブレストEMS器 HONO.jpg', 'url' => 'https://www.beeracle.jp/i/HONO_sbp']
            ],
            'massage' => [
                ['name' => 'マッスルパーカッションガン', 'image' => 'マッスルパーカッションガン.jpg', 'url' => 'https://www.beeracle.jp/i/HM190_sbp'],
                ['name' => 'CORE FIT　Body-Driver（ボディドライバー）', 'image' => 'body driver.jpg', 'url' => 'https://www.beeracle.jp/i/BD_spb'],
                ['name' => 'ReFa（リファ）リファフォーカラットレイ', 'image' => 'リファフォーカラットレイ.jpg', 'url' => 'https://www.beeracle.jp/i/RF-FR2306B_Y']
            ],
            'hair_removal' => [
                ['name' => '光エステ スムースエピ ES-WP9A', 'image' => 'スムースエピ ES-WP9A-H_サムネ.jpg', 'url' => 'https://www.beeracle.jp/i/ES-WP9A_sbp'],
                ['name' => 'Panasonic（パナソニック）光エステ ES-WP97', 'image' => 'ES-WP97　サムネ.jpg', 'url' => 'https://www.beeracle.jp/i/ES-WP97_sbp'],
                ['name' => 'YA-MAN（ヤーマン） レイボーテヴィーナス', 'image' => 'ヤーマンレイボーテヴィーナス_サムネイル.jpg', 'url' => 'https://www.beeracle.jp/i/STA-209L_sbp']
            ]
        ]
    ];

    public function startDiagnosis()
    {
        $this->currentPhase = 'category';
    }

    public function selectCategory(string $category)
    {
        $this->selectedCategory = $category;
        $this->currentPhase = 'subcategory';
    }

    public function selectSubCategory(string $subCategory)
    {
        $this->selectedSubCategory = $subCategory;
        $this->recommendations = $this->productData[$this->selectedCategory][$subCategory] ?? [];
        $this->currentPhase = 'result';
    }

    public function resetDiagnosis()
    {
        $this->currentPhase = 'intro';
        $this->selectedCategory = '';
        $this->selectedSubCategory = '';
        $this->recommendations = [];
    }

    public function render()
    {
        return view('livewire.beauty-diagnosis');
    }
}
