@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="single">
            <div class="row">
                <div class="col-sm-4 follow_left">
                    <div class="jobs-item with-thumb">
                        <div class="thumb">
                            <a href="">
                                <img src="" class="img-responsive" alt="" />
                            </a>
                        </div>
                        <div class="jobs_right">
                            <div class="date">{{ $job->created_at->format('d') }}
                                <span>{{ $job->created_at->format('M') }}</span>
                            </div>
                            <div class="date_desc">
                                <h6 class="title">
                                    <a href="">{{ $job->title }}</a>
                                </h6>
                                <span class="meta">{{ $job->company->address }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 follow_left">
                    <h4>@lang('job.listapply')</h4>
                    <div class="follow_jobs">
                        @foreach ($users as $user)
                            <div class="featured"></div>
                            <img src="" alt="" class="img-circle">
                            <div class="title">
                                <h5>{{ $user->name }}</h5>
                                @switch ($user->pivot->status)
                                    @case (config('job_config.waiting'))
                                        <p>
                                            <a href="{{ route('accept_reject', ['user_id' => $user->id, 'job_id' => $job->id, 'status' => config('job_config.accepted')]) }}">@lang('job.accept')</a>
                                            <a href="{{ route('accept_reject', ['user_id' => $user->id, 'job_id' => $job->id, 'status' => config('job_config.rejected')]) }}">@lang('job.reject')</a>
                                        </p>
                                        @break
                                    @case (config('job_config.accepted'))
                                        <p>@lang('job.accepted')</p>
                                        @break
                                    @default
                                        <p>@lang('job.rejected')</p>
                                @endswitch
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
@endsection
