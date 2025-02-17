<div class="modal-body">
    <div class="product-card">
        <div class="row">
            <div class="col-6">
                <div class="detail-group">
                    <h6>{{__('Date')}}</h6>
                    <p class="mb-20">{{dateFormat($reminder->date)}}</p>
                </div>
            </div>
            <div class="col-6">
                <div class="detail-group">
                    <h6>{{__('Time')}}</h6>
                    <p class="mb-20">{{timeFormat($reminder->time)}}</p>
                </div>
            </div>
            <div class="col-6">
                <div class="detail-group">
                    <h6>{{__('Created By')}}</h6>
                    <p class="mb-20"> {{ !empty($reminder->createdBy)?$reminder->createdBy->name:'-' }} </p>
                </div>
            </div>
            <div class="col-6">
                <div class="detail-group">
                    <h6>{{__('Assign User')}}</h6>
                    <p class="mb-20">
                        @foreach($reminder->users() as $user)
                            {{$user->name}}<br>
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="detail-group">
                    <h6>{{__('Subject')}}</h6>
                    <p class="mb-20">{{ $reminder->subject }}</p>
                </div>
            </div>
            <div class="col-12">
                <div class="detail-group">
                    <h6>{{__('Message')}}</h6>
                    <p class="mb-20">{{ $reminder->message }} </p>
                </div>
            </div>

        </div>
    </div>
</div>
