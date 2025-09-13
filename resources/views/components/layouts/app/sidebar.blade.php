<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('home') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('My Beauty Device')" class="grid">
                <flux:navlist.item icon="sparkles" :href="route('home')" :current="request()->routeIs('home')"
                    wire:navigate>{{ __('美容家電診断') }}</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="heart" href="https://www.beeracle.jp/" target="_blank">
                {{ __('BEERACLE レンタルサイト') }}
            </flux:navlist.item>

            <flux:navlist.item icon="information-circle" href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank">
                {{ __('アプリについて') }}
            </flux:navlist.item>
        </flux:navlist>
    </flux:sidebar>

    <!-- モバイルヘッダー -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <div class="flex items-center">
            <h1 class="text-lg font-semibold text-zinc-900 dark:text-white">My Beauty Device</h1>
        </div>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
