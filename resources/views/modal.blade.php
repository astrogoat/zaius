@if(\Astrogoat\Zaius\Settings\ZaiusSettings::isEnabled())
    <!-- [Zaius] Modal Start -->
    <script>
        function openZaiusModal(contentId) {
            zaius.onload(() => {
                zaius._tracker.web.hasShownModal(false);
                zaius.dispatch(
                    'web',
                    'showContent',
                    {
                        contentId: contentId,
                        target: {
                            selector: '',  // empty string for modals
                            position: '{{ 'modal' }}' // modal | before | after | inside | replace
                        }
                    }
                );
            })
        }
    </script>
    <!-- [Zaius] Modal End -->
@endif
