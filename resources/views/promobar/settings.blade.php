<x-fab::forms.editor
    class="mt-6"
    label="Desktop content"
    name="payload[content_desktop]"
    wire:model="payload.content_desktop"
    wire:key="promobar_content_desktop"
/>

<x-fab::forms.editor
    class="mt-6"
    label="Mobile content"
    name="payload[content_mobile]"
    wire:model="payload.content_mobile"
    wire:key="promobar_content_mobile"
/>

<x-fab::forms.checkbox
    label="Center align content"
    class="mt-6"
    name="payload[center_align_content]"
    wire:model="payload.center_align_content"
/>

<div class="flex mt-6">
    <x-fab::forms.range
        label="Padding top"
        class="mr-4"
        hint="In pixels (px)"
        trailing="px"
        max="25"
        name="payload[padding_top]"
        wire:model="payload.padding_top"
    />

    <x-fab::forms.range
        label="Padding bottom"
        class="ml-4"
        hint="In pixels (px)"
        trailing="px"
        max="25"
        name="payload[padding_bottom]"
        wire:model="payload.padding_bottom"
    />
</div>

<div class="flex mt-6">
    <x-fab::forms.range
        label="Padding left"
        class="mr-4"
        hint="In pixels (px)"
        step="5"
        trailing="px"
        name="payload[padding_left]"
        wire:model="payload.padding_left"
    />

    <x-fab::forms.range
        label="Padding right"
        class="ml-4"
        hint="In pixels (px)"
        step="5"
        trailing="px"
        name="payload[padding_right]"
        wire:model="payload.padding_right"
    />
</div>

<div class="flex mt-6">
    <x-fab::forms.input
        label="Background color"
        class="mr-4 w-full"
        name="payload[background_color]"
        wire:model="payload.background_color"
        type="color"
    />

    <x-fab::forms.input
        label="Text color"
        class="ml-4 w-full"
        name="payload[text_color]"
        wire:model="payload.text_color"
        type="color"
    />
</div>

<x-fab::forms.editor
    class="mt-6"
    label="Button"
    name="payload[button]"
    wire:model="payload.button"
/>


<div class="flex flex-col mt-6 items-start space-y-4 mt-8">
    <x-fab::forms.toggle
        id="enable_countdown_timer"
        label="Enable countdown timer"
        wire:model="payload.countdown_timer_enabled"
        wire:key="promobar_countdown_timer_enabled"
        :toggled="$payload['countdown_timer_enabled'] ?? false"
    />

    <div
        x-cloak

    >
     <x-fab::forms.select
        x-show="payload.countdown_timer_enabled === true"
        wire:model="payload.countdown_timer_type"
        wire:key="promobar_countdown_timer_type"
        name="payload[countdown_timer_type]"
        label="Countdown Timer Type"
    >
        <option value="regular">Regular Countdown</option>
        <option value="24">24 Hours Countdown</option>
    </x-fab::forms.select>
    </div>

    <div
        class="grid grid-cols-2 w-full fab-space-x-4"
        x-cloak
        x-show="payload.countdown_timer_enabled === true"
    >
        <x-fab::forms.date-picker
            label="Count down until"
            wire:model="payload.countdown_timer_end_date"
            wire:key="promobar_countdown_timer_end_date"
            hint="Required"
            :options="[
                'altInput' => true,
                'altFormat' => 'D, M J, Y - G:i K',
                'enableTime' => true
            ]"
        />

        <x-fab::forms.date-picker
            label="Show timer after"
            wire:model="payload.countdown_timer_start_date"
            wire:key="promobar_countdown_timer_start_date"
            hint="Optional"
            :options="[
                'altInput' => true,
                'altFormat' => 'D, M J, Y - G:i K',
                'enableTime' => true
            ]"
        />
    </div>
</div>

<x-fab::forms.input
    class="mt-6"
    label="Zaius content ID"
    name="payload[zaius_content_id]"
    wire:model="payload.zaius_content_id"
/>

<x-fab::layouts.panel
    class="mt-6"
    title="Preview"
>
    @include('zaius::promobar.component')
</x-fab::layouts.panel>
