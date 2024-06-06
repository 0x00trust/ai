<?php
$wrapper_classname = 'px-12 pt-7 pb-11 rounded-3xl text-center';

if ($featured) {
    $wrapper_classname .= ' border';
}

$currencySymbol = $currency ?? currency()->symbol;
?>

<div class="{{ $wrapper_classname }} max-xl:px-6 max-lg:px-4">
    <h6 class="mb-6 rounded-md border p-[0.35rem] text-[11px] text-opacity-80">{{ __($title) }}</h6>
    <p class="mb-1 text-[45px] font-medium leading-none -tracking-wide text-heading-foreground">

        @if (currencyShouldDisplayOnRight($currencySymbol))
            {{ $price }}<sup class="text-[0.53em]">{{ $currency }}</sup>
        @else
            <sup class="text-[0.53em]">{{ $currency }}</sup>{{ $price }}
        @endif

    </p>
    <p class="mb-4 text-sm opacity-60">{{ __('per ' . $period) }}</p>
    <a
        class="mb-6 block w-full rounded-lg bg-black bg-opacity-[0.03] p-3 font-medium text-heading-foreground transition-colors hover:bg-black hover:text-white"
        href="{{ $buttonLink }}"
    >{{ __($buttonLabel) }}</a>
    <ul class="px-3 text-left max-lg:p-0">
        @if ($trialDays > 0)
            <li class="mb-4 flex items-center">
                <span class="mr-3 inline-grid h-[22px] w-[22px] shrink-0 place-content-center rounded-xl bg-[#684AE2] bg-opacity-10 text-[#684AE2]">
                    <svg
                        width="13"
                        height="10"
                        viewBox="0 0 13 10"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path d="M3.952 7.537L11.489 0L12.452 1L3.952 9.5L1.78814e-07 5.545L1 4.545L3.952 7.537Z" />
                    </svg>
                </span>
                {{ number_format($trialDays) . ' ' . __('Days of free trial.') }}
            </li>
        @endif
        @if (!empty($activeFeatures))
            @foreach (explode(',', $activeFeatures) as $feature)
                <li class="mb-4 flex items-center">
                    <span class="mr-3 inline-grid h-[22px] w-[22px] shrink-0 place-content-center rounded-xl bg-[#684AE2] bg-opacity-10 text-[#684AE2]">
                        <svg
                            width="13"
                            height="10"
                            viewBox="0 0 13 10"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path d="M3.952 7.537L11.489 0L12.452 1L3.952 9.5L1.78814e-07 5.545L1 4.545L3.952 7.537Z" />
                        </svg>
                    </span>
                    {{ trim(__($feature)) }}
                </li>
            @endforeach
        @endif
        <li class="mb-[0.625em]">
            <span class="mr-3 inline-grid h-[22px] w-[22px] shrink-0 place-content-center rounded-xl bg-[#684AE2] bg-opacity-10 text-[#684AE2]">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="14"
                    height="14"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path
                        stroke="none"
                        d="M0 0h24v24H0z"
                        fill="none"
                    />
                    <path d="M5 12l5 5l10 -10" />
                </svg>
            </span>
            @if ((int) $totalWords >= 0)
                <strong>@formatNumber($totalWords)</strong> {{ __('Word Tokens') }}
            @else
                <strong>{{ __('Unlimited') }}</strong> {{ __('Word Tokens') }}
            @endif
        </li>
        <li class="mb-[0.625em]">
            <span class="mr-3 inline-grid h-[22px] w-[22px] shrink-0 place-content-center rounded-xl bg-[#684AE2] bg-opacity-10 text-[#684AE2]">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="14"
                    height="14"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path
                        stroke="none"
                        d="M0 0h24v24H0z"
                        fill="none"
                    />
                    <path d="M5 12l5 5l10 -10" />
                </svg>
            </span>
            @if ((int) $totalImages >= 0)
                <strong> @formatNumber($totalImages) </strong> {{ __('Image Tokens') }}
            @else
                <strong>{{ __('Unlimited') }}</strong> {{ __('Image Tokens') }}
            @endif
        </li>
        @if (!empty($inactiveFeatures))
            @foreach (explode(',', $inactiveFeatures) as $feature)
                <li class="mb-4 flex items-center opacity-25">
                    <span class="mr-3 inline-grid h-[22px] w-[22px] shrink-0 place-content-center rounded-xl bg-[#684AE2] bg-opacity-10 text-[#684AE2]">
                        <svg
                            width="5"
                            height="2"
                            viewBox="0 0 5 2"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path d="M0 0.00299835H4.167V1.539H0V0.00299835Z" />
                        </svg>
                    </span>
                    {{ trim(__($feature)) }}
                </li>
            @endforeach
        @endif
    </ul>
</div>
