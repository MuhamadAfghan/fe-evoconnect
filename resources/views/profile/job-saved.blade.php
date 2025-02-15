@extends('layouts.templates')

@section('content')
    <div class="box mb-3 rounded border bg-white shadow-sm">
        <div class="box-title border-bottom p-3">
            <h6 class="m-0">Jobs Saved</h6>
        </div>
        <div class="box-body p-3">
            @if ($savedJobs->isEmpty())
                <p class="text-muted text-center">Belum ada pekerjaan yang disimpan.</p>
            @else
                @foreach ($savedJobs as $savedJob)
                    @if ($savedJob->job)
                        <div class="col-md-6">
                            <a href="{{ route('jobs-profile', $savedJob->job->id) }}">
                                <div class="job-item mb-3 border">
                                    <div class="d-flex align-items-center job-item-header p-3">
                                        <div class="overflow-hidden">
                                            <h6 class="font-weight-bold text-dark text-truncate mb-0">
                                                {{ $savedJob->job->title }}
                                            </h6>
                                            <div class="text-truncate text-primary">
                                                {{ $savedJob->job->company->name }}
                                            </div>
                                            <div class="small text-gray-500">
                                                <i class="feather-map-pin"></i> {{ $savedJob->job->location }}
                                            </div>
                                        </div>
                                        <img src="{{ $savedJob->job->job_photo_path ? asset('storage/' . $savedJob->job->job_photo_path) : auth()->user()->getProfileImage() }}"
                                            class="img-fluid rounded-circle job-photo ml-auto" alt="Job Image">
                                    </div>
                                    <div class="d-flex align-items-center border-top border-bottom job-item-body p-3">
                                        <span class="text-warning">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @php echo ($i <= $savedJob->job->rating) ? '<i class="feather-star"></i>' : '<i class="feather-star text-gray-500"></i>'; @endphp
                                            @endfor
                                        </span>
                                        <span class="text-dark font-weight-bold ml-2">{{ $savedJob->job->rating }}</span>
                                        <span class="text-muted">(567 reviews)</span>
                                    </div>
                                    <div class="job-item-footer p-3">
                                        <small class="text-gray-500">
                                            <i class="feather-clock"></i> Posted
                                            {{ $savedJob->job->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
@endsection
