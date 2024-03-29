<?php

namespace Astrogoat\Zaius\View\Components;

use DateInterval;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Countdown extends Component
{
    public string $id;

    public Carbon $endsAt;
    public ?Carbon $startsAt;
    public ?string $timerType;
    public ?string $endsAtTime;

    public function __construct(protected array $payload)
    {
        $this->id = 'timer-'.Str::random(6);
        $this->startsAt = isset($this->payload['countdown_timer_start_date'])
            ? Carbon::parse($this->payload['countdown_timer_start_date'])
            : null;
        $this->endsAt = Carbon::parse($this->payload['countdown_timer_end_date'] ?? null);
        $this->timerType = $this->payload['countdown_timer_type'] ?? "";
        $this->endsAtTime = isset($this->endsAt) ? Carbon::parse($this->endsAt)->format('H:i:s') : "";
    }

    public function days(): string
    {
        return sprintf('%02d', $this->difference()->d);
    }

    public function hours(): string
    {
        return sprintf('%02d', $this->difference()->h);
    }

    public function minutes(): string
    {
        return sprintf('%02d', $this->difference()->i);
    }

    public function seconds(): string
    {
        return sprintf('%02d', $this->difference()->s);
    }

    public function difference(): DateInterval
    {
        return $this->endsAt->diff(now());
    }

    public function timerIsRunning(): bool
    {
        if (! is_null($this->startsAt) && $this->startsAt->isFuture()) {
            return false;
        }

        return $this->endsAt->isFuture();
    }

    public function render()
    {
        return view('zaius::components.countdown');
    }
}
