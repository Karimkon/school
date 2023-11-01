@foreach ($getChat as $value)
    @if ($value->sender_id == Auth::user()->id)
        <li class="clearfix">
            <div class="message-data text-right">
                <span class="message-data-time">{{ Carbon\Carbon::parse($getReceiver->created_date)->diffForHumans() }}</span>
                <img style="height: 40px;" src="{{ $value->getSender->getProfileDirect() }}" alt="pic">
            </div>
            <div class="message other-message float-right">{!! $value->message !!}</div>
        </li>
    @else
    <li class="clearfix">
        <div class="message-data text-right">
            <span class="message-data-time">{{ Carbon\Carbon::parse($getReceiver->created_date)->diffForHumans() }}</span>
            <img style="height: 40px;" src="{{ $value->getSender->getProfileDirect() }}" alt="pic">
        </div>
        <div class="message other-message float-right">{!! $value->message !!}</div>
    </li>
    @endif
@endforeach