<x-layouts.app>
    <section
        x-cloak
        x-data="{
            back_button_is_hovering: false,
        }"
        x-ref="section"
        x-init="
            () => {
                if (reducedMotion) return
                gsap.fromTo(
                    $refs.section,
                    {
                        autoAlpha: 0,
                        y: 50,
                    },
                    {
                        autoAlpha: 1,
                        y: 0,
                        duration: 0.7,
                        ease: 'circ.out',
                    },
                )
            }
        "
        class="mx-auto w-full max-w-8xl px-5 sm:px-10"
    >
        <div class="flex flex-wrap items-center justify-between gap-5 pt-20">
            {{-- Back Button --}}
            <a
                x-on:mouseenter="back_button_is_hovering = true"
                x-on:mouseleave="back_button_is_hovering = false"
                href="/community"
                class="flex items-center gap-3 p-1 text-dolphin transition duration-300 hover:-translate-x-2 hover:text-evening"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="25"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill="currentColor"
                        d="M2.64 11.917h16.591a.78.78 0 0 1 .769.792a.78.78 0 0 1-.769.791H.771c-.688 0-1.03-.857-.541-1.354L5.549 6.73a.754.754 0 0 1 1.087.006a.808.808 0 0 1-.005 1.119l-3.99 4.063Z"
                    />
                </svg>
                <div class="text-xl font-medium">Community</div>
            </a>
            <div
                class="flex flex-wrap items-center gap-3 transition duration-300 will-change-transform"
                :class="{
                'opacity-60 translate-x-2': back_button_is_hovering,
            }"
            ></div>
        </div>

        {{-- Main Content --}}
        <div
            class="flex flex-col items-start gap-20 pt-7 transition duration-300 will-change-transform lg:flex-row"
            :class="{
                'opacity-60 translate-x-2': back_button_is_hovering,
            }"
        >
            {{-- Left Side --}}
            <div class="w-full">
                {{-- Type --}}
                <div class="flex gap-5">
                    <div
                        @class([
                            'flex items-center justify-center gap-2 rounded-full py-2 pl-4 pr-5 select-none',
                            'bg-violet-100/80 text-violet-700' => $record['type'] === 'Trick',
                            'bg-[#D4FFF0] text-[#4BA284]' => $record['type'] === 'Article',
                        ])
                    >
                        {{-- Stars --}}
                        @if ($record['type'] === 'Trick')
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="18"
                                height="18"
                                viewBox="0 0 24 24"
                                class="text-violet-500"
                            >
                                <path
                                    fill="currentColor"
                                    d="m9 4l2.5 5.5L17 12l-5.5 2.5L9 20l-2.5-5.5L1 12l5.5-2.5L9 4m0 4.83L8 11l-2.17 1L8 13l1 2.17L10 13l2.17-1L10 11L9 8.83M19 9l-1.26-2.74L15 5l2.74-1.25L19 1l1.25 2.75L23 5l-2.75 1.26L19 9m0 14l-1.26-2.74L15 19l2.74-1.25L19 15l1.25 2.75L23 19l-2.75 1.26L19 23Z"
                                />
                            </svg>
                        @endif

                        {{-- Article --}}
                        @if ($record['type'] === 'Article')
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                viewBox="0 0 28 28"
                                class="text-[#47C6A0]"
                            >
                                <path
                                    fill="currentColor"
                                    d="M8 10.25a.75.75 0 0 1 .75-.75h10a.75.75 0 0 1 0 1.5h-10a.75.75 0 0 1-.75-.75Zm0 4.5a.75.75 0 0 1 .75-.75h10a.75.75 0 0 1 0 1.5h-10a.75.75 0 0 1-.75-.75Zm.75 3.75a.75.75 0 0 0 0 1.5h4.5a.75.75 0 0 0 0-1.5h-4.5ZM14 2a.75.75 0 0 1 .75.75V4h3.75V2.75a.75.75 0 0 1 1.5 0V4h.75A2.25 2.25 0 0 1 23 6.25v12.996a.75.75 0 0 1-.22.53l-5.504 5.504a.75.75 0 0 1-.53.22H6.75a2.25 2.25 0 0 1-2.25-2.25v-17A2.25 2.25 0 0 1 6.75 4H8V2.75a.75.75 0 0 1 1.5 0V4h3.75V2.75A.75.75 0 0 1 14 2ZM6 6.25v17c0 .414.336.75.75.75h9.246v-3.254a2.25 2.25 0 0 1 2.25-2.25H21.5V6.25a.75.75 0 0 0-.75-.75h-14a.75.75 0 0 0-.75.75Zm12.246 13.746a.75.75 0 0 0-.75.75v2.193l2.943-2.943h-2.193Z"
                                />
                            </svg>
                        @endif

                        {{-- Type Name --}}
                        <div>
                            {{ $record['type'] }}
                        </div>
                    </div>
                </div>

                {{-- Title --}}
                <div class="pt-5">
                    <div class="text-3xl font-extrabold">
                        {{ $record['title'] }}
                    </div>
                </div>

                {{-- Features and Health Checks --}}
                <div
                    class="grid grid-cols-[repeat(auto-fill,minmax(315px,1fr))] gap-x-16 gap-y-10 pt-7"
                >
                    {{-- Latest Version Compatibility --}}
                    <div class="flex items-center gap-3">
                        @if ($record['isCompatibleWithLatestVersion'])
                            <div
                                class="grid h-9 w-9 place-items-center rounded-full bg-lime-200/50 text-lime-600"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M9 16.17L5.53 12.7a.996.996 0 1 0-1.41 1.41l4.18 4.18c.39.39 1.02.39 1.41 0L20.29 7.71a.996.996 0 1 0-1.41-1.41L9 16.17z"
                                    />
                                </svg>
                            </div>
                        @else
                            <div
                                class="grid h-9 w-9 place-items-center rounded-full bg-rose-200/50 text-rose-600"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v8m.05 4v.1h-.1V18h.1Z"
                                    />
                                </svg>
                            </div>
                        @endif

                        <div>
                            <div class="font-medium">
                                {{ $record['isCompatibleWithLatestVersion'] ? 'Compatible with the latest version' : 'Not compatible with the latest version' }}
                            </div>

                            <div class="text-xs text-dolphin/80">
                                Supported versions:
                                {{ implode(' - ', array_map(fn (int $version): string => $version . '.x', $record['versions'])) }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tags --}}
                <div class="flex flex-wrap items-center gap-3.5 pt-6">
                    @foreach ($record['tags'] as $tag)
                        <div
                            class="select-none rounded-full bg-stone-200/50 px-5 py-2.5 text-sm"
                        >
                            <div class="text-sm">
                                {{ $tag }}
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Content --}}
                <div class="pt-8">
                    <div
                        class="prose prose-blockquote:not-italic prose-code:font-normal prose-code:before:hidden prose-code:after:hidden [&_p]:before:hidden [&_p]:after:hidden"
                    >
                        {{ $record['content'] }}
                    </div>
                </div>
            </div>

            {{-- Right Side --}}
            <div
                class="flex w-full flex-wrap items-center gap-12 lg:max-w-sm xl:max-w-md"
            >
                {{-- Author --}}
                <div class="w-full pt-10 text-evening">
                    <div class="grid w-full place-items-center">
                        {{-- Avatar --}}
                        <div
                            class="h-24 w-24 shrink-0 overflow-hidden rounded-full"
                        >
                            <div
                                style="
                                    background-image: url({{ $record['author']['avatar'] }});
                                "
                                class="aspect-square h-full w-full bg-cover bg-center bg-no-repeat"
                            ></div>
                        </div>

                        {{-- Name --}}
                        <div class="pt-3.5 text-lg font-bold">
                            {{ $record['author']['name'] }}
                        </div>

                        {{-- Social Links --}}
                        <div class="flex items-center gap-4 pt-3">
                            {{-- Twitter --}}
                            @if (filled($record['author']['twitter_url']))
                                <a
                                    target="_blank"
                                    href="{{ $record['author']['twitter_url'] }}"
                                    class="grid h-9 w-9 place-items-center rounded-full bg-merino text-hurricane transition duration-200 hover:scale-110 hover:text-salmon"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill="currentColor"
                                            fill-rule="evenodd"
                                            d="M15.021 3.343c.509-.087 1.078-.116 1.614-.025a4.85 4.85 0 0 1 2.54 1.273c.456.01.905-.08 1.302-.208a5.36 5.36 0 0 0 1.098-.501l.009-.006a.75.75 0 0 1 1.042 1.037c-.207.315-.496.877-.819 1.507l-.155.301c-.185.36-.375.724-.552 1.036c-.111.196-.23.395-.35.567v.274A12.34 12.34 0 0 1 8.287 21.03a12.32 12.32 0 0 1-6.694-1.97a.75.75 0 0 1 .5-1.374a7.471 7.471 0 0 0 4.033-.642a4.858 4.858 0 0 1-2.61-2.922a.75.75 0 0 1 .147-.722l.01-.01A4.848 4.848 0 0 1 2.05 9.793v-.052a.75.75 0 0 1 .553-.724A4.84 4.84 0 0 1 2.09 6.84a4.9 4.9 0 0 1 .65-2.442a.75.75 0 0 1 1.232-.1a10.89 10.89 0 0 0 7.006 3.93a4.85 4.85 0 0 1 2.562-4.406c.402-.214.934-.385 1.482-.479ZM3.743 10.891a3.35 3.35 0 0 0 2.503 2.164a.75.75 0 0 1 .072 1.453c-.272.083-.551.14-.834.173a3.358 3.358 0 0 0 2.59 1.3a.75.75 0 0 1 .45 1.339a8.97 8.97 0 0 1-3.548 1.695a10.82 10.82 0 0 0 3.313.515h.009A10.838 10.838 0 0 0 19.25 8.607v-.535a.75.75 0 0 1 .186-.495c.07-.079.19-.261.36-.56c.16-.282.338-.622.523-.981l.033-.066a4.992 4.992 0 0 1-1.593.097a.75.75 0 0 1-.47-.237a3.35 3.35 0 0 0-1.904-1.032a3.42 3.42 0 0 0-1.11.025a3.605 3.605 0 0 0-1.028.323a3.35 3.35 0 0 0-1.678 3.74a.75.75 0 0 1-.767.925a12.39 12.39 0 0 1-8.149-3.627a3.41 3.41 0 0 0-.063.657v.002a3.34 3.34 0 0 0 1.486 2.785A.75.75 0 0 1 4.64 11a4.798 4.798 0 0 1-.897-.11Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </a>
                            @endif

                            {{-- Github --}}
                            <a
                                target="_blank"
                                href="{{ $record['author']['github_url'] }}"
                                class="grid h-9 w-9 place-items-center rounded-full bg-merino text-hurricane transition duration-200 hover:scale-110 hover:text-salmon"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="22"
                                    height="22"
                                    viewBox="0 0 24 24"
                                >
                                    <g
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                    >
                                        <path
                                            d="M16 22.027v-2.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7a5.44 5.44 0 0 0-1.5-3.75a5.07 5.07 0 0 0-.09-3.77s-1.18-.35-3.91 1.48a13.38 13.38 0 0 0-7 0c-2.73-1.83-3.91-1.48-3.91-1.48A5.07 5.07 0 0 0 5 5.797a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7a3.37 3.37 0 0 0-.94 2.58v2.87"
                                        />
                                        <path d="M9 20.027c-3 .973-5.5 0-7-3" />
                                    </g>
                                </svg>
                            </a>
                        </div>

                        <div
                            class="mt-4 space-y-4 rounded-2xl bg-merino/50 p-6 text-center shadow-lg shadow-black/[0.01]"
                        >
                            {{-- Bio --}}
                            @if ($record['author']['bio'])
                                <div class="prose">
                                    {!! str($record['author']['bio'])->markdown()->sanitizeHtml() !!}
                                </div>
                            @endif

                            {{-- Stats --}}
                            <div
                                class="flex w-full flex-wrap justify-center gap-x-16 gap-y-10"
                            >
                                {{-- Tricks --}}
                                <div class="space-y-0.5">
                                    <div class="text-lg font-extrabold">
                                        {{ number_format($record['author']['tricks_count']) }}
                                    </div>
                                    <div
                                        class="text-sm font-medium text-hurricane/80"
                                    >
                                        Tricks
                                    </div>
                                </div>

                                {{-- Articles --}}
                                <div class="space-y-0.5">
                                    <div class="text-lg font-extrabold">
                                        {{ number_format($record['author']['articles_count']) }}
                                    </div>
                                    <div
                                        class="text-sm font-medium text-hurricane/80"
                                    >
                                        Articles
                                    </div>
                                </div>

                                {{-- Stars --}}
                                <div class="space-y-0.5">
                                    <div class="text-lg font-extrabold">
                                        {{ number_format($record['author']['stars_count']) }}
                                    </div>
                                    <div
                                        class="text-sm font-medium text-hurricane/80"
                                    >
                                        Stars
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
