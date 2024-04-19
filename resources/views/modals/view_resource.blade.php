<!-- View Resource Modal -->
<div class="modal fade" id="viewResource_{{ $resource->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold fs-5" id="staticBackdropLabel">View Resource</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <label>Thumbnail:</label><br>
                <img src="{{ $resource->thumbnail_path ? Storage::url($resource->thumbnail_path) : asset('assets/img/defaults/default_img.png') }}" class="card-img-top" alt="Thumbnail"> --}}
                <label>Title:</label>
                <h6>{{ $resource->title }}</h6>

                <label>Type:</label>
                <h6>{{ $resource->type }}</h6>
                <!-- Display content based on resource type -->
                <label>Content:</label>
                <br>
                @if ($resource->type == 'Link' || $resource->type == 'Text')
                    <h6>{{ $resource->content }}</h6>
                @elseif ($resource->type == 'Image')
                    <img src="{{  Storage::url($resource->file_path) }}" alt="Image" width="750">
                @elseif ($resource->type == 'Video')
                    <video width="720" height="auto" controls>
                        <source src="{{ Storage::url($resource->file_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @elseif ($resource->type == 'Audio')
                    <audio controls style="width: 750px;">
                        <source src="{{ Storage::url($resource->file_path) }}" type="audio/mp3">
                        Your browser does not support the audio tag.
                    </audio>
                @elseif ($resource->type == 'Document')
                    <iframe src="{{ Storage::url($resource->file_path) }}" width="750" height="400"></iframe>
                @else
                    <p>Unsupported resource type</p>
                @endif

                <hr>
                <div class="timestamps text-muted">
                    <label>Created At:</label>
                    <h6>{{ date('F j, Y, g:i a', strtotime($resource->created_at)) }}</h6>

                    {{-- <label>Updated At:</label>
                    <h6>{{ date('F j, Y, g:i a', strtotime($resource->updated_at)) }}</h6> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-danger rounded-pill fw-bold" type="button" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
