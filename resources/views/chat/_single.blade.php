@foreach ($getChat as $value)
    @if ($value->sender_id == Auth::user()->id)
        <li class="clearfix">
            <div class="message-data text-right">
                <span class="message-data-time">{{ Carbon\Carbon::parse($value->created_date)->diffForHumans() }}</span>
                <img style="height: 40px;" src="{{ $value->getSender->getProfileDirect() }}" alt="pic">
            </div>
            <div class="message other-message float-right">{!! $value->message !!}</div>
        </li>
    @else
    <li class="clearfix">
        <div class="message-data text-left">
            <span class="message-data-time">{{ Carbon\Carbon::parse($value->created_date)->diffForHumans() }}</span>
            <img style="height: 40px;" src="{{ $value->getSender->getProfileDirect() }}" alt="pic">
        </div>
        <div class="message other-message float-left">
            {!! $value->message !!}
            @if(!empty($value->getFile()))
            
            <div>
                <a href="{{$value->getFile() }}" download="" target="_blank">Attachment</a>
            </div>
            
            @endif
        </div>
    </li>
    @endif
@endforeach