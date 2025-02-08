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
                    <img class="rounded-circle" src="img/user.png" alt="">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div class="w-100">
                    <textarea name="story_content" id="story_content" placeholder="Write your thoughts..."
                        class="form-control mb-2 border-0 p-0 shadow-none" rows="1"></textarea>
                    <span class="badge badge-primary p-1" style="cursor: pointer;">Public</span>
                    <span class="badge badge-secondary p-1" style="cursor: pointer;">Private</span>
                    <span class="badge badge-success p-1" style="cursor: pointer;">Only
                        Connection</span>
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
            </div>
        </div>
    </div>

    <div class="border-top d-flex align-items-center p-3">
        <div class="flex-shrink-1">
            <button type="submit" id="btn-submit-post" class="btn btn-primary btn-sm">Post
                Status</button>
        </div>
    </div>
</form>
<script>
    let isSubmittingPost = false;

    function handleSubmitPost(event) {
        event.preventDefault();

        if (isSubmittingPost) {
            return;
        } else {
            isSubmittingPost = true;

            document.getElementById('btn-submit-post').innerHTML = 'Loading...';
            document.getElementById('btn-submit-post').setAttribute('disabled', 'disabled');
        }
        let form = event.target;
        let formData = new FormData(form);

        // Ambil tab yang sedang aktif
        let activeTab = document.querySelector('.nav-link.active').getAttribute('href');

        let content = '';
        let type = '';
        if (activeTab === '#story') {
            content = document.getElementById('story_content').value;
            type = 'story';
        } else if (activeTab === '#article') {
            content = document.getElementById('article_content').value;
            type = 'article';
        }

        formData.set('content', content);
        formData.set('type', type);
        formData.set('visibility', 'public');
        console.log("Content: ", content);

        // Kirim data dengan axios atau fetch jika diperlukan
        axios.post('{{ route('posts.store') }}', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            console.log(response.data);
            form.reset();
        }).catch(error => {
            console.log(error.response.data);
        }).finally(() => {
            isSubmittingPost = false;
            document.getElementById('btn-submit-post').innerHTML = 'Post Status';
            document.getElementById('btn-submit-post').removeAttribute('disabled');
        });
    }
</script>
