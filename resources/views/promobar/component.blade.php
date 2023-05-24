<style>
    .zaius-promobar {
        color: {{ $payload['text_color'] ?? '#FFF'}};
        background-color: {{ $payload['background_color'] ?? '#000' }};
        padding: {{ $payload['padding_top'] ?? 10 }}px {{ $payload['padding_right'] ?? 0 }}px {{ $payload['padding_bottom'] ?? 10 }}px {{ $payload['padding_left'] ?? 0 }}px;
    }

    .zaius-promobar .no-wrap {
        white-space: nowrap;
    }

    @media (min-width: 768px) {
        .zaius-promobar .md\:justify-center {
            justify-content: center;
        }
    }

    .zaius-promobar .text-center {
        text-align: center;
    }

    .zaius-promobar .zaius-promobar__content {
        margin: auto;
    }

    .zaius-promobar .hidden {
        display: none;
    }

    .zaius-promobar .flex {
        display: flex;
    }

    .zaius-promobar .ml-4 {
        margin-left: 1rem;
    }

    @media (min-width: 768px) {
        .zaius-promobar .md\:hidden {
            display: none;
        }

        .zaius-promobar .md\:flex {
            display: flex;
        }
    }
    .zaius-promobar .container {
        width: 100%;
    }
    @media (min-width: 640px) {
        .zaius-promobar .container {
            max-width: 640px;
        }
    }
    @media (min-width: 768px) {
        .zaius-promobar .container {
            max-width: 768px;
        }
    }
    @media (min-width: 1024px) {
        .zaius-promobar .container {
            max-width: 1024px;
        }
    }
    @media (min-width: 1280px) {
        .zaius-promobar .container {
            max-width: 1280px;
        }
    }
    @media (min-width: 1536px) {
        .zaius-promobar .container {
            max-width: 1536px;
        }
    }
</style>

<div class="zaius-promobar">
    <div class="zaius-promobar__content container flex flex-col md:flex-row @if($payload['center_align_content'] ?? false) items-center md:justify-center @endif">
        <div class="flex md:hidden @if($payload['center_align_content'] ?? false) text-center @endif">{!! $payload['content_mobile'] ?? '' !!}</div>
        <div class="hidden md:flex">{!! $payload['content_desktop'] ?? '' !!}</div>


        @if($payload['countdown_timer_enabled'] ?? false)
        <div class="px-2">
            <x-promobar::countdown :payload="$payload" class="astrogoat_promobar_countdown" />
        </div>
        @endif


        @if($payload['zaius_content_id'] ?? null)
            <button type="button" class="ml-4 no-wrap promobar-cta" onclick="openZaiusModal('{{ $payload['zaius_content_id'] ?? '' }}')">{!! $payload['button'] ?? '' !!}</button>
        @endif
    </div>
</div>

@include('zaius::modal')
