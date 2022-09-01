@if(Astrogoat\Zaius\Settings\ZaiusSettings::isEnabled())
    <!-- [Zaius] Start -->
    <script type='text/javascript'>
        var zaius = window['zaius']||(window['zaius']=[]);zaius.methods=["initialize","onload","event","entity","identify","anonymize","dispatch"];zaius.factory=function(e){return function(){var t=Array.prototype.slice.call(arguments);t.unshift(e);zaius.push(t);return zaius}};(function(){for(var i=0;i<zaius.methods.length;i++){var method=zaius.methods[i];zaius[method]=zaius.factory(method)}var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src=("https:"===document.location.protocol?"https://":"http://")+"d1igp3oop3iho5.cloudfront.net/v2/{{ settings(Astrogoat\Zaius\Settings\ZaiusSettings::class, 'public_key') }}/zaius-min.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)})();

        // Edits to this script should only be made below this line.
        zaius.event('pageview');
        @stack('zaius-events')
    </script>
    <!-- [Zaius] End -->
@endif
