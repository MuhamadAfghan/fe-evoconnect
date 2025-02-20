<style>
    .badge-hover {
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    /* Efek Saat Diklik */
    .badge-active {
        transform: scale(1.2) !important;
        font-weight: bold;
    }
</style>
<form method="POST" onsubmit="handleSubmitPost(event)"
    class="box osahan-share-post mb-3 rounded border bg-white shadow-sm">
    @csrf
    <ul class="nav nav-justified border-bottom osahan-line-tab" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="story-tab" data-toggle="tab" href="#story" role="tab" aria-controls="story"
                aria-selected="true"><i class="feather-edit"></i> Share an
                update</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="article-tab" data-toggle="tab" href="#article" role="tab"
                aria-controls="article" aria-selected="false"><i class="feather-clipboard"></i> Write an
                article</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="story" role="tabpanel" aria-labelledby="story-tab">
            <div class="d-flex align-items-center w-100 p-3" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{ auth()->user()->getProfileImage() }}" alt="">
                    <div class="status-indicator {{ auth()->user()->isOnline() ? 'bg-success' : 'bg-secondary' }}">
                    </div>
                </div>
                <div class="w-100">
                    <textarea name="story_content" id="story_content" placeholder="Write your thoughts..."
                        class="form-control mb-2 border-0 p-0 shadow-none" rows="1"></textarea>
                    <span class="badge badge-primary badge-hover m-1 p-1">Public</span>
                    <span class="badge badge-secondary badge-hover m-1 p-1">Private</span>
                    <span class="badge badge-success badge-hover m-1 p-1">Only Connection</span>
                    <span class="text-muted" data-toggle="tooltip" data-placement="right"
                        title="Your post will be visible to everyone.">
                        <i class="feather-help-circle"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="w-100 p-3">
                <textarea placeholder="Write your thoughts..." class="form-control border-0 p-0 shadow-none" rows="3"></textarea>
            </div>
        </div>
        <div class="tab-pane fade" id="article" role="tabpanel" aria-labelledby="article-tab">
            <div class="w-100 p-3">
                <input id="article_content" type="hidden" name="content">
                <trix-editor input="article_content"></trix-editor>
                <span class="badge badge-primary badge-hover p-1">Public</span>
                <span class="badge badge-secondary badge-hover m-1 p-1">Private</span>
                <span class="badge badge-success badge-hover m-1 p-1">Only Connection</span>
                <span class="text-muted" data-toggle="tooltip" data-placement="right"
                    title="Your post will be visible to everyone.">
                    <i class="feather-help-circle"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="border-top d-flex align-items-center p-3">
        <div class="flex-shrink-1">
            <button type="submit" id="btn-submit-post" class="btn btn-primary btn-sm" disabled>Share an update</button>
        </div>
    </div>
</form>
