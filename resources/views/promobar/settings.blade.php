<div>
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
</div>
