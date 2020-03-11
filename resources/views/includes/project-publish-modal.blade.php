@php
    $title = $project->isPublished() ? 'Unpublish' : 'Publish';
    $newPublishedState = $project->isPublished() ? '0' : '1';
@endphp

<div id="publish-project-{{$project->id}}" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }} "{{ $project->name }}"?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($project->isPublished())
                    <p>Unpublishing this project will have the following effects:</p>
                    <ul>
                        <li>The project will no longer be available for public walkthroughs</li>
                        <li>Walkthroughs will no longer generate results</li>
                        <li>You will be able to edit the project</li>
                        <li>It will be possible to delete the project</li>
                    </ul>
                @else
                    <p>Publishing this project will have the following effects:</p>
                    <ul>
                        <li>The project will be available for public walkthroughs</li>
                        <li>Walkthroughs will start to generate results</li>
                        <li>You will not be able to edit the project while it is published</li>
                        <li>It will not be possible to delete the project while it is published</li>
                    </ul>
                @endif
                <p>Do you want to continue?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('projects.publisher.edit', ['project' => $project->id])}}"
                    method="post"
                >
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="published" value="{{ $newPublishedState }}">
                    <button class="btn btn-primary" type="submit">{{ $title }}</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>