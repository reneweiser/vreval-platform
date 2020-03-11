<div id="delete-project-{{$project->id}}" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete "{{ $project->name }}"?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>This will also delete all it's components permanently:</p>
                <ul>
                    <li>Forms</li>
                    <li>Models that were uploaded</li>
                    <li>Checkpoints</li>
                    <li>Playlists</li>
                    <li>Results</li>
                </ul>
                <p>Are you sure you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('project.destroy', $project) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>