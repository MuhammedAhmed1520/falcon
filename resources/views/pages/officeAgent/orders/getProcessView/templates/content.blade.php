<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="bg-gray mb-2 p-1">
                    <div class="row">
                        <div class="col-md-3">
                            <p>
                                المعاملات الخاصة بـ <strong>{{$companyName}}</strong>

                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered" id="data_table">
                <thead>
                <tr>
                    <th>{{__('office_agent.status')}}</th>
                    <th>{{__('office_agent.date')}}</th>
                    <th>{{__('office_agent.user')}}</th>
                    <th>{{__('office_agent.notes')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($processes as $process)
                    <tr>
                        <td>{{$process->status->name ?? $process->status_text ?? ''}}</td>
                        <td>{{$process->created_at}}</td>
                        <td>{{$process->from_user->name ?? ''}}
                            => {{$process->to_user->name ?? ''}}</td>
                        <td>{{$process->comment}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
