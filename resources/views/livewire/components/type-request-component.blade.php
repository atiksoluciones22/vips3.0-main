<div>
    @switch($type)
        @case(\TypesRequest::LICENSE->value)
            <livewire:type-request.license-component :type="$type" />
        @break
        @case(\TypesRequest::VACATION->value)
            <livewire:type-request.vacation-component :type="$type" />
        @break
        @case(\TypesRequest::ABSENCE->value)
            <livewire:type-request.absence-component :type="$type" />
        @break
        @case(\TypesRequest::CHANGE_ACCOMMODATION->value)
            <livewire:type-request.change-accommodation-component :type="$type" />
        @break
        @case(\TypesRequest::UNIFORMITY->value)
            <livewire:type-request.uniformity-component :type="$type" />
        @break
        @case(\TypesRequest::CARD->value)
            <livewire:type-request.card-component :type="$type" />
        @break
    @endswitch
</div>
