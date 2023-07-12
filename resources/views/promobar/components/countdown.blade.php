@if($timerIsRunning())
    <span
        x-data="
    {
        timer: {
            days: '{{ $days() }}',
            hours: '{{ $hours() }}',
            minutes: '{{ $minutes() }}',
            seconds: '{{ $seconds() }}',
        },
        timerType: '{{ $timerType }}',
        endsAtTime: '{{ $endsAtTime }}',
        startCounter: function () {

            if(this.timerType === '24'){
                let runningCounter = setInterval(() => {
                let countDownDate = new Date({{ $endsAt->timestamp }} * 1000).getTime();
                let timeDistance = countDownDate - new Date().getTime();

                if (timeDistance < 0 ) {
                    clearInterval(runningCounter);
                    return;
                }

                const [hours, minutes, seconds] = this.endsAtTime.split(':');
                const now = new Date();
                const endTime = new Date(now.getFullYear(), now.getMonth(), now.getDate(), hours, minutes, seconds);

                if(now > endTime){
                    endTime.setDate(endTime.getDate() + 1);
                }

                const currentTime = new Date();
                let tomorrowEndTimeDistance = endTime.getTime() - currentTime.getTime();

                if(tomorrowEndTimeDistance <= 0){
                    runningCounter = setInterval(resetCounter,1000);
                }

                this.timer.days = this.formatCounter(Math.floor(tomorrowEndTimeDistance / (1000 * 60 * 60 * 24)));
                this.timer.hours = this.formatCounter(Math.floor((tomorrowEndTimeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
                this.timer.minutes = this.formatCounter(Math.floor((tomorrowEndTimeDistance % (1000 * 60 * 60)) / (1000 * 60)));
                this.timer.seconds = this.formatCounter(Math.floor((tomorrowEndTimeDistance % (1000 * 60)) / 1000));

                function resetCounter() {
                    const now = new Date();
                    const endTime = new Date(now.getFullYear(), now.getMonth(), now.getDate(), hours, minutes, seconds);
                    let tomorrowEndTimeDistance = endTime.getTime() - now.getTime();
                    if (tomorrowEndTimeDistance <= 0) {
                      clearInterval(runningCounter);
                      runningCounter = setInterval(resetCounter, 1000);
                    }
                }
            }, 1000);
        }else{
            let runningCounter = setInterval(() => {
                let countDownDate = new Date({{ $endsAt->timestamp }} * 1000).getTime();
                let timeDistance = countDownDate - new Date().getTime();
                if (timeDistance < 0) {
                    clearInterval(runningCounter);
                    return;
                }
                this.timer.days = this.formatCounter(Math.floor(timeDistance / (1000 * 60 * 60 * 24)));
                this.timer.hours = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
                this.timer.minutes = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60)) / (1000 * 60)));
                this.timer.seconds = this.formatCounter(Math.floor((timeDistance % (1000 * 60)) / 1000));
            }, 1000);
        }

        },
        formatCounter: function (number) {
            return number.toString().padStart(2, '0');
        },
        timerIsRunning: function () {
            return this.timer.days != 0 || this.timer.hours != 0 || this.timer.minutes != 0 || this.timer.seconds != 0;
        }
    }
    "
        x-init="startCounter()"
        {{ $attributes }}
    >
        <span x-show="timerIsRunning">
            @if ($slot->isEmpty())
                <span x-text="timer.days">{{ $days() }}</span> :
                <span x-text="timer.hours">{{ $hours() }}</span> :
                <span x-text="timer.minutes">{{ $minutes() }}</span> :
                <span x-text="timer.seconds">{{ $seconds() }}</span>
            @else
                {{ $slot }}
            @endif
        </span>
    </span>
@endif
