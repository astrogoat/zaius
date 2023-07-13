@if($timerIsRunning())
    <div
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


                daysBlockOne.textContent = String(Math.floor(this.timer.days / 10));
                daysBlockTwo.textContent = String(this.timer.days % 10);
                hoursBlockOne.textContent = String(Math.floor(this.timer.hours / 10));
                hoursBlockTwo.textContent = String(this.timer.hours % 10);
                minutesBlockOne.textContent = String(Math.floor(this.timer.minutes / 10));
                minutesBlockTwo.textContent = String(this.timer.minutes % 10);
                secondsBlockOne.textContent = String(Math.floor(this.timer.seconds / 10));
                secondsBlockTwo.textContent = String(this.timer.seconds % 10);


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

                daysBlockOne.textContent = String(Math.floor(this.timer.days / 10));
                daysBlockTwo.textContent = String(this.timer.days % 10);
                hoursBlockOne.textContent = String(Math.floor(this.timer.hours / 10));
                hoursBlockTwo.textContent = String(this.timer.hours % 10);
                minutesBlockOne.textContent = String(Math.floor(this.timer.minutes / 10));
                minutesBlockTwo.textContent = String(this.timer.minutes % 10);
                secondsBlockOne.textContent = String(Math.floor(this.timer.seconds / 10));
                secondsBlockTwo.textContent = String(this.timer.seconds % 10);

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
        <div class="flex gap-2 justify-center mt-4 md:mt-0 timer-container" x-show="timerIsRunning">
            @if ($slot->isEmpty())
            <div class="flex flex-col" x-show="timerType === 'regular'">
                <div class="flex days-block gap-1 font-bold">
                    <span class="countdown-block px-2 rounded-sm" id="daysBlockOne">-</span>
                    <span class="countdown-block px-2 rounded-sm" id="daysBlockTwo">-</span>
                </div>
                <span class="text-xs  font-bold block-info">Days</span>
            </div>

            <div class="flex flex-col">
                <div class="flex months-block gap-1 font-bold">
                    <span class="countdown-block px-2 rounded-sm" id="hoursBlockOne">-</span>
                    <span class="countdown-block px-2 rounded-sm" id="hoursBlockTwo">-</span>
                </div>
                <span class="text-xs font-bold block-info">Hours</span>
            </div>

            <div class="flex flex-col">
                    <div class="flex minutes-block gap-1  font-bold">
                        <span class="countdown-block px-2 rounded-sm" id="minutesBlockOne">-</span>
                        <span class="countdown-block px-2 rounded-sm" id="minutesBlockTwo">-</span>
                    </div>
                    <span class="text-xs font-bold block-info">Mins</span>
            </div>

            <div class="flex flex-col">
                <div class="flex seconds-block gap-1 rounded-sm font-bold">
                    <span class="countdown-block px-2 rounded-sm" id="secondsBlockOne">-</span>
                    <span class="countdown-block px-2 rounded-sm" id="secondsBlockTwo">-</span>
                </div>
                <span class="text-xs font-bold block-info">Secs</span>
            </div>
            @else
                {{ $slot }}
            @endif
        </div>
    </div>
@endif
